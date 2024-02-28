<?php
require_once 'conexion.php';
$conexion = new Conexion();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar"){

        $idCurso = $_POST['idCurso'];
        $grado = $_POST['Grado'];

        $query = "INSERT INTO curso(ID_curso, Grado) VALUES (?,?)";
        $reg = $conexion->prepare($query);

        $reg->bindParam(1, $idCurso);
        $reg->bindParam(2, $grado);

        if($reg->execute()){
            echo 1;
        }else{
            echo 0;
        }
    }
}
?>