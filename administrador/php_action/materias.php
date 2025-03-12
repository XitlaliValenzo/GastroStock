<?php 
    include '../../conf/config.php';

    function agregar($con, $nivel, $cuatrimestre, $materia, $activo){
        $sqlInsert = "INSERT INTO materias (materia, cuatrimestre, nivel, activo) VALUES ('$materia','$cuatrimestre','$nivel', '$activo')";
        return $sqlInsert;
    }

    function editar($con, $nivel, $materia, $id_materia,$cuatrimestre){
        $sqlUpdate = "UPDATE materias SET materia = '$materia', cuatrimestre = '$cuatrimestre' ,nivel = '$nivel' WHERE id_materia = '$id_materia' ";
        return $sqlUpdate;
    }

    function eliminar($con, $id_materia, $activo){
        $sqlDelete = "UPDATE materias SET activo = '$activo' WHERE id_materia = '$id_materia' ";
        return $sqlDelete;
    }

    function asignar($con,$id_materia,$id_profesor){
        $sqlAsignar = "INSERT INTO profesores_materias (materia, profesor) VALUES ('$id_materia','$id_profesor')";
        return $sqlAsignar;
    }

    function cambiar($con,$grupo_nuevo,$id_alumno){
        $sqlCambiar = "UPDATE usuarios SET grupo = '$grupo_nuevo' WHERE id = '$id_alumno' ";
        return $sqlCambiar;
    }

    if ($_POST){
        if (isset($_POST['eliminar'])){
            $id_materia = $_POST['id_materia'];
            $activo = 2;
            $sqlDelete = eliminar($con, $id_materia, $activo);

            if ($con->query($sqlDelete) === TRUE){
                header("Location: ../materias.php?m=3");
            } else {
                echo "Error al eliminar la materia " . $con->error;
            }

            
        } else if(isset($_POST['editar'])){
            $nivel = $_POST['nivel'];
            $cuatrimestre = $_POST['cuatrimestre'];
            $materia = $_POST['materia'];
            $id_materia = $_POST['id_materia'];

            $sqlUpdate = editar($con, $nivel, $materia, $id_materia,$cuatrimestre);

            if ($con->query($sqlUpdate) === TRUE){
                header("Location: ../materias.php?m=2");
            } else {
                echo "Error al actualizar la materia " . $con->error;
            }

        } else if(isset($_POST['agregar'])){
            $nivel = $_POST['nivel'];
            $cantidad = $_POST['cantidad_materia'];
            $activo = 1;

            for($i=1; $i<=$cantidad; $i++){
                $materia = $_POST['materia_'.$i];
                $cuatrimestre = $_POST['cuatrimestre'.$i];
    
                $sqlInsert = agregar($con, $nivel, $cuatrimestre, $materia, $activo); 

                if (!$con->query($sqlInsert)) {
                    echo "Error al insertar las materias " . $con->error;
                    exit; 
                }
            }
            header("Location: ../materias.php?m=1");
            exit;
        } else if(isset($_POST['asignar'])){
            $profesores = $_POST['profesores'];
            $id_materia = $_POST['id_materia'];
            foreach ($profesores as $valor) {
                $id_profesor = $valor;
                $sqlAsignar = asignar($con,$id_materia,$id_profesor);

                if (!$con->query($sqlAsignar)) {
                    echo "Error al asignar profesor " . $con->error;
                    exit; 
                }
            }
            header("Location: ../materias.php?m=4");
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