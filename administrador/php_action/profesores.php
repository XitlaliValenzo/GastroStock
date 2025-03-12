<?php 
    include '../../conf/config.php';

    function agregar($con, $nombre, $email,$telefono,$activo){
        $sqlInsert = "INSERT INTO profesores (nombre, email, telefono, activo) VALUES ('$nombre','$email','$telefono', '$activo')";
        return $sqlInsert;
    }

    function editar($con, $nombre, $email, $telefono,$id_profesor){
        $sqlUpdate = "UPDATE profesores SET nombre = '$nombre', email = '$email', telefono = '$telefono' WHERE id_profesor = '$id_profesor' ";
        return $sqlUpdate;
    }

    function eliminar($con, $id_profesor,$activo){
        $sqlDelete = "UPDATE profesores SET activo = '$activo' WHERE id_profesor = '$id_profesor' ";
        return $sqlDelete;
    }

    if ($_POST){
        if (isset($_POST['eliminar'])){
            $id_profesor = $_POST['id_profesor'];
            $activo = 2;
            $sqlDelete = eliminar($con, $id_profesor,$activo);

            if ($con->query($sqlDelete) === TRUE){
                header("Location: ../profesores.php?m=4");
            } else {
                echo "Error al eliminar al profesor " . $con->error;
            }

            
        } else if(isset($_POST['editar'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $id_profesor = $_POST['id_profesor'];

            $sqlUpdate = editar($con, $nombre, $email, $telefono,$id_profesor);

            if ($con->query($sqlUpdate) === TRUE){
                header("Location: ../profesores.php?m=2");
            } else {
                echo "Error al actualizar al profesor " . $con->error;
            }

        } else if(isset($_POST['agregar'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $activo = 1;
            $sqlInsert = agregar($con, $nombre, $email,$telefono,$activo);

            if ($con->query($sqlInsert) === TRUE){
                header("Location: ../profesores.php?m=1");
            } else {
                echo "Error al agregar al profesor " . $con->error;
            }
        } 
    }

    mysqli_close($con);
?>