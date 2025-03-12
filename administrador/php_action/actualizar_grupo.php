<?php 
    require_once '../../conf/config.php';
    

    function actualizar_cuatri ($nuevo_cuatri,$con,$id){
        $sql = "UPDATE usuarios SET cuatrimestre = '$nuevo_cuatri' WHERE id = '$id' ";

        if ($con->query($sql) === TRUE){
            header("Location: ../alumnos.php?m=8");
            
        } else {
            echo "Error al actualizar";
        }

    }

    function actualizar_grupo($grupo_actual,$con,$id,$cuatri_actual,$nuevo_cuatri){
        if ($cuatri_actual>=10){
            $grupo1 = substr($grupo_actual,0,-4);
            echo $grupo1;
            $grupo2 = substr($grupo_actual, -1,1);
            $nuevo_grupo = $grupo1.$nuevo_cuatri.'-'.$grupo2;
        

        } else{
            $grupo1 = substr($grupo_actual,0,-3);
            $grupo2 = substr($grupo_actual, -1,1);
            $nuevo_grupo = $grupo1.$nuevo_cuatri.'-'.$grupo2;
        
        }
        

        $sql2 = "UPDATE usuarios SET grupo = '$nuevo_grupo' WHERE id = '$id' ";
        if ($con->query($sql2) === TRUE){
            echo "Grupo actualizado";
        } else {
            echo "Error al actualizar";
        }
        

    }

    //ver el grupo de cada alumno
    $grupo = "SELECT cuatrimestre, id, grupo FROM usuarios WHERE activo=1 AND role='alumno'";
    $result = $con->query($grupo);

			if ($result ->num_rows > 0) {
				while ($row = $result ->fetch_assoc()) {

					$cuatri_actual = $row['cuatrimestre'];
                    $id = $row['id'];
                    $grupo_actual = $row['grupo'];

                    if ($cuatri_actual == 11){
                        $nuevo_cuatri = $cuatri_actual;
                    } else {
                        $nuevo_cuatri = $cuatri_actual+1;
                    }
					

                    actualizar_cuatri($nuevo_cuatri,$con,$id);
                    actualizar_grupo($grupo_actual,$con,$id,$cuatri_actual,$nuevo_cuatri);
				}
            }

 		

 		
 		
	$con ->close();
 	

    
?>