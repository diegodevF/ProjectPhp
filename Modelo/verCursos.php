<?php
require_once('../App/Curso.php');

class misCursos{
    function verCursos(){
        require_once('conexion.php');
        $conexion = new Conexion();
        $arreglo = array();
        
        $consulta  = "SELECT ID_curso, Grado  FROM curso";
        $modulos = $conexion -> prepare($consulta);
        $modulos -> execute();

        $total = $modulos -> rowCount(); //Cant Datos
        if($total > 0){
            $a = 0;
            while($data = $modulos->fetch(PDO::FETCH_ASSOC)){
                $arreglo[$a] = $data;
                $a++;
            }
        }
        return $arreglo;
    }
}