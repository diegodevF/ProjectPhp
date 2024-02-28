<?php
    class misCursos{
        function verCursosId($id){
            require_once('conexion.php');
            $conexion = new Conexion();
            $arreglo = array();
    
            $consulta = "SELECT ID_curso, grado FROM curso WHERE ID_curso = :id";
            
            $modulo = $conexion->prepare($consulta);
            $modulo->bindParam(":id", $id);
            $modulo->execute();
            $total = $modulo->rowCount();
    
            if($total > 0){
                $i = 0;
                while($data = $modulo->fetch(PDO::FETCH_ASSOC)){
                    $arreglo[$i] = $data;
                    $i++;
                }
            }
            return $arreglo;
        }
    }
?>