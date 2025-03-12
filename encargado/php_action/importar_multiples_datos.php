<?php
//Conf. de la bd
require '../../conf/config.php';

//Verifica si el formulario fue enviado
if (isset($_POST['import'])) {
    //Verifica si el archivo fue subido sin errores
    if (isset($_FILES['excel']) && $_FILES['excel']['error'] == 0) {
        //Libreria PHPExcel para leer el archivo Excel
        require_once '../../administrador/php_action/Classes/PHPExcel.php';

        //Se obtienen los datos del archivo subido
        $file = $_FILES['excel']['tmp_name'];
        //Se crea el lector de excel
        $excelReader = PHPExcel_IOFactory::createReaderForFile($file);
        //Se carga el archivo de excel
        $excelObj = $excelReader->load($file);
        //Se obtiene la primera hoja del archivo excel
        $sheet = $excelObj->getSheet(0);
        //Se obtiene el numero de filas y columnas en la hoja
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //Se inicializan los contadores para registros insertados y duplicados
        $insertedCount = 0;
        $duplicatedCount = 0;

        //Se recorre cada fila del archivo Excel
        for ($row=2; $row <= $highestRow ; $row++) { 
            //Se obtienen los valores de las celdas en la fila actual
            $nombre = $sheet->getCell('A' . $row)->getValue();
            $email = $sheet->getCell('B' . $row)->getValue();
            $matricula = $sheet->getCell('C' . $row)->getValue();
           
            
            //Verifica si el registro ya existe en la bd
            $checkQuery = "SELECT * FROM usuarios WHERE matricula = '$matricula'";
            $result = $con->query($checkQuery);

            //Si el registro no existe, inserta los datos en la bd
            if ($result->num_rows == 0) {
                $password = 12345678; //Contraseña predeterminada
                $passHash = password_hash($password, PASSWORD_DEFAULT);
                $insertQuery = "INSERT INTO usuarios (nombre, email, password, matricula, role, activo) VALUES ('$nombre', '$email', '$passHash', '$matricula', 'alumno',1)";
                if ($con->query($insertQuery) === TRUE) {
                    $insertedCount++;
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }
            } else {
                //Si el registro ya existe, incrementa el contador de duplicados
                $duplicatedCount++;
                
            }
        }

        //Mensaje alert js
        /*echo "<script>
            alert('Registros insertados: $insertedCount.Registros duplicados: $duplicatedCount. ');
            window.location.href = '../alumnos.php';
            </script>";*/
            if ($insertedCount > 0) {
                header("Location: ../alumnos.php?m=6");
            }elseif($insertedCount <= 0){
                header("Location: ../alumnos.php?m=7");
            }
            
    } else {
        //Mensaje de error si hubo un problema al subir el archivo 
        echo "Error al subir el archivo";
    }
}

//Cierra la conexión a la bd
$con->close();
?>