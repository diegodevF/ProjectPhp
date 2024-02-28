<?php
require_once("../Modelo/verCursos.php");
$misCursos = new misCursos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Lista Cursos</h1>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Items</th>
                <th>Id Cursos</th>
                <th>Grado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cant = 1;
            $respCursos = $misCursos->verCursos();
            foreach( $respCursos as $fila){ ?>
            <tr>
                <th><?php echo($cant);?></th>
                <th><?php echo($fila['ID_curso']);?></th>
                <th><?php echo($fila['Grado'])?></th>   
            </tr>
            <?php
            $cant++;
            }
            ?>
        </tbody>
        </table>
        <form action="" method="POST">
            <input type="text" name="idCurso" id="idCurso" placeholder="Ingresar ID Curso"> <br>
            <input type="text" name="Grado" id="Grado" placeholder="Ingresar Grado"> <br>
            <input type="button" value="Agregar Curso" id="registrarCurso">

           
        </form>
        <script src="../Controlador/funcionCurso.js"></script>
        <?php
            include("../Librerias/libreriaJS.php");
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                iniciarPagina()
            })
        </script>
    </div>
</body>
</html>