<?php
include_once('conexion.php');
$conexion = new Conexion();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrarMateria") {

        $idCurso = $_POST['grado'];
        $nombreMateria = $_POST['materia'];
        $nombreDocente = $_POST['docente'];

        $queryGrado = "INSERT INTO curso(ID_curso) VALUES (?,?)";
        $queryMateria = "INSERT INTO materia(Nombre) VALUES(?,?)";
        $queryDocente = "INSERT INTO docente(Nombre) VALUES(?,?)";

        $reg = $conexion->prepare($queryGrado);
        $reg = $conexion->prepare($queryMateria);
        $reg = $conexion->prepare($queryDocente);

        $reg->bindParam(1, $idCurso);
        $reg->bindParam(1, $nombreMateria);
        $reg->bindParam(1, $nombreDocente);

        if ($reg->execute()) {
            echo 1;
        } else {
            echo 0;
        }
    }
}