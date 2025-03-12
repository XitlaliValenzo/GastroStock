<?php

include '../../conf/config.php'; // Incluye tu archivo de configuración de la base de datos

// Requerir las librerías para leer archivos Excel
require 'excelReader/excel_reader2.php';
require 'excelReader/SpreadsheetReader.php';

function maxId($con){
    // Obtener el ID máximo de la tabla de artículos
    $sql_id = "SELECT MAX(id_articulo) AS max_id FROM articulos"; 
    $result_id = $con->query($sql_id);
    $idUltimoArticulo = 0;
    if ($rowId = $result_id->fetch_assoc()) {
        $idUltimoArticulo = $rowId['max_id'];
    }

    return $idUltimoArticulo;
}

function insertarFechaAdq($con, $idUltimoArticulo, $cantidad) {
    $sqlFecha = "INSERT INTO fecha_adquiridos (articulo_adquirido, cantidad) VALUES (?, ?)";
    $stmtFecha = $con->prepare($sqlFecha);
    $stmtFecha->bind_param("ii", $idUltimoArticulo, $cantidad);
    $stmtFecha->execute();
    $stmtFecha->close();
}

function insertarFechaDon($con, $idUltimoArticulo, $cantidad, $tipo_donante, $nombre_donante) {
    $sqlFechaDon = "INSERT INTO fecha_donados (articulo_donado, cantidad, tipo_donante, nombre_donante) VALUES (?, ?, ?, ?)";
    $stmtFechaDon = $con->prepare($sqlFechaDon);
    $stmtFechaDon->bind_param("iiss", $idUltimoArticulo, $cantidad, $tipo_donante, $nombre_donante);
    $stmtFechaDon->execute();
    $stmtFechaDon->close();
}

if (isset($_POST["import"])) {
    // Verificar si el archivo ha sido subido correctamente
    if (isset($_FILES['excel']) && $_FILES['excel']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES["excel"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
        $targetDirectory = "uploads/" . $newFileName;

        // Mover el archivo a la carpeta de destino
        if (!move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory)) {
            die("Error al mover el archivo subido.");
        }

        // Habilitar la visualización de errores para depuración
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Leer el archivo Excel
        $reader = new SpreadsheetReader($targetDirectory);

        $isFirstRow = true; // Variable para identificar la primera fila

        foreach ($reader as $key => $row) {
            if ($isFirstRow) {
                $isFirstRow = false; // Saltar la primera fila
                continue;
            }

            // Escapar los datos para prevenir SQL Injection
            $nombre = mysqli_real_escape_string($con, $row[0]);
            $descripcion = mysqli_real_escape_string($con, $row[1]);
            $cantidad = intval($row[2]);
            $tipo = mysqli_real_escape_string($con, $row[3]);
            $tipo_material = mysqli_real_escape_string($con, $row[4]);
            $estatus = 'activo';

            // Verificar si el artículo ya existe
            $checkQuery = "SELECT * FROM articulos WHERE nombre = ?";
            if ($checkStmt = $con->prepare($checkQuery)) {
                $checkStmt->bind_param("s", $nombre);
                $checkStmt->execute();
                $checkStmt->store_result();
                
                if ($checkStmt->num_rows > 0) {
                    $checkStmt->close();
                    continue; // Si el artículo existe, saltar a la siguiente iteración
                }
                $checkStmt->close();
            }

            // Verificar si el tipo es donativo y obtener datos adicionales
            if ($tipo == 'donativo') {
                $tipo_donante = mysqli_real_escape_string($con, $row[5]);
                $nombre_donante = mysqli_real_escape_string($con, $row[6]);

                $sql = "INSERT INTO articulos (nombre, cantidad, descripcion, tipo, estatus) VALUES (?, ?, ?, ?, ?)";
                if ($stmt = $con->prepare($sql)) {
                    $stmt->bind_param("sisss", $nombre, $cantidad, $descripcion, $tipo, $estatus);
                    if ($stmt->execute()) {
                        $idUltimoArticulo = maxId($con);

                        // Insertar en la tabla de artículos donados
                        $sql2 = "INSERT INTO articulos_donados (articulo_donado, cantidad, tipo_material) VALUES (?, ?, ?)";
                        if ($stmt2 = $con->prepare($sql2)) {
                            $stmt2->bind_param("iis", $idUltimoArticulo, $cantidad, $tipo_material);
                            if ($stmt2->execute()) {
                                // Insertar el artículo en la tabla de fecha_donados
                                insertarFechaDon($con, $idUltimoArticulo, $cantidad, $tipo_donante, $nombre_donante);
                            } else {
                                $message = "Error al insertar en la base de datos de artículos donados: " . $stmt2->error;
                            }
                            $stmt2->close();
                        }
                    } else {
                        $message = "Error al insertar en la base de datos: " . $stmt->error;
                    }
                    $stmt->close();
                }
            } else {
                $sql = "INSERT INTO articulos (nombre, cantidad, descripcion, tipo, estatus) VALUES (?, ?, ?, ?, ?)";
                if ($stmt = $con->prepare($sql)) {
                    $stmt->bind_param("sisss", $nombre, $cantidad, $descripcion, $tipo, $estatus);
                    if ($stmt->execute()) {
                        $idUltimoArticulo = maxId($con);

                        // Insertar en la tabla de artículos adquiridos
                        $sql2 = "INSERT INTO articulos_adquiridos (articulo_adquirido, cantidad, tipo_material) VALUES (?, ?, ?)";
                        if ($stmt2 = $con->prepare($sql2)) {
                            $stmt2->bind_param("iis", $idUltimoArticulo, $cantidad, $tipo_material);
                            if ($stmt2->execute()) {
                                // Insertar el artículo en la tabla de fecha_adquiridos
                                insertarFechaAdq($con, $idUltimoArticulo, $cantidad);
                            } else {
                                $message = "Error al insertar en la base de datos de artículos adquiridos: " . $stmt2->error;
                            }
                            $stmt2->close();
                        }
                    } else {
                        $message = "Error al insertar en la base de datos: " . $stmt->error;
                    }
                    $stmt->close();
                }
            }
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($con);

        echo "<script>
        alert('Successfully Imported');
        document.location.href = '../materiales.php';
        </script>";
    } else {
        die("Error al subir el archivo.");
    }
} else {
    header("Location: ../form_material.php?m=4");
}
?>
