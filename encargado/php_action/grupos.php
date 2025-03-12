<?php 
    include '../../conf/config.php';

    function agregar($con, $grupo, $nivel,$cuatrimestre){
        $sqlInsert = "INSERT INTO grupo (grupo, cuatrimestre, nivel, estatus) VALUES ('$grupo','$cuatrimestre','$nivel', 1)";
        return $sqlInsert;
    }

    function editar($con, $nivel, $grupo, $id, $cuatrimestre){
        $sqlUpdate = "UPDATE grupo SET grupo = '$grupo', cuatrimestre = '$cuatrimestre' ,nivel = '$nivel' WHERE id_grupo = '$id' ";
        return $sqlUpdate;
    }

    function eliminar($con,$id){
        $sqlDelete = "UPDATE grupo SET estatus = 2 WHERE id_grupo = '$id' ";
        return $sqlDelete;
    }

    function asignar($con,$id_grupo,$id_alumno){
        $sqlAsignar = "UPDATE usuarios SET grupo = '$id_grupo' WHERE id = '$id_alumno' ";
        return $sqlAsignar;
    }

    function cambiar($con,$grupo_nuevo,$id_alumno){
        $sqlCambiar = "UPDATE usuarios SET grupo = '$grupo_nuevo' WHERE id = '$id_alumno' ";
        return $sqlCambiar;
    }

    if ($_POST){
        if (isset($_POST['eliminar'])){
            $id = $_POST['id'];
            $sqlDelete = eliminar($con, $id);

            if ($con->query($sqlDelete) === TRUE){
                header("Location: ../grupos.php?m=3");
            } else {
                echo "Error al eliminar el grupo " . $con->error;
            }

            
        } else if(isset($_POST['editar'])){
            $nivel = $_POST['nivel'];
            $cuatrimestre = $_POST['cuatrimestre'];
            $grupo = $_POST['grupo'];
            $id = $_POST['id'];

            $sqlUpdate = editar($con, $nivel, $grupo, $id,$cuatrimestre);

            if ($con->query($sqlUpdate) === TRUE){
                header("Location: ../grupos.php?m=2");
            } else {
                echo "Error al actualizar el grupo " . $con->error;
            }

        } else if(isset($_POST['agregar'])){
            $nivel = $_POST['nivel'];
            $cantidad = $_POST['cantidad_grupo'];

            for($i=1; $i<=$cantidad; $i++){
                $grupo = $_POST['nombre_grupo'.$i];
                $cuatrimestre = $_POST['cuatrimestre'.$i];
                $sqlInsert = agregar($con, $grupo, $nivel,$cuatrimestre); 

                if (!$con->query($sqlInsert)) {
                    echo "Error al insertar el grupo " . $con->error;
                    exit; 
                }
            }
            header("Location: ../grupos.php?m=1");
            exit;
        } else if(isset($_POST['asignar'])){
            $alumnos = $_POST['alumnos'];
            $id_grupo = $_POST['id_grupo'];
            foreach ($alumnos as $valor) {
                $id_alumno = $valor;
                $sqlAsignar = asignar($con,$id_grupo,$id_alumno);

                if (!$con->query($sqlAsignar)) {
                    echo "Error al asignar grupo " . $con->error;
                    exit; 
                }
            }
            header("Location: ../grupos.php?m=4");
            exit;
        } else if(isset($_POST['cambiar'])){
            $alumnos = $_POST['alumnos'];
            $grupo_nuevo = $_POST['grupo_nuevo'];

            foreach ($alumnos as $valor) {
                $id_alumno = $valor;
                $sqlCambiar = cambiar($con,$grupo_nuevo,$id_alumno);

                if (!$con->query($sqlCambiar)) {
                    echo "Error al cambiar alumnos de grupo " . $con->error;
                    exit; 
                }
            }
            header("Location: ../grupos.php?m=5");
            exit;
        }
    }

    mysqli_close($con);
?>