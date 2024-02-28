<?php
include_once("../Modelo/verMaterias.php");
include_once('../Modelo/verCursosId.php');
include_once('../Modelo/verDocentes.php');
$verMaterias = new misMaterias();
$verCursos = new misCursos();
$verDocentes = new misDocentes();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
</head>

<body>
    <div class="container">
        <h1>Lista Materias</h1>
        <table>
            <thead>
                <tr>
                    <th>Items</th>
                    <th>IdMateria</th>
                    <th>Materia</th>
                    <th>Docente</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cant = 1;
                $respMaterias = $verMaterias->verMaterias();
                foreach ($respMaterias as $fila) {
                    $nomDocente = $verDocentes->verDocentes();
                    $grado = $verCursos->verCursosId($fila['curso_id']);
                    ?>
                    <tr>
                        <td>
                            <?php echo ($cant); ?>
                        </td>
                        <td>
                            <?php echo ($fila['ID_materia']); ?>
                        </td>
                        <td>
                            <?php echo ($fila['Materia']); ?>
                        </td>
                        <td>
                            <?php echo ($nomDocente[0]['Nombre']); ?>
                        </td>
                        <td>
                            <?php echo ($grado[0]['grado']); ?>
                        </td>
                    </tr>
                    <?php
                    $cant++;
                }
                ?>
            </tbody>
        </table>
        <form action="" method=" POST">
            <input type="text" name="materia" id="materia" placeholder="Nombre Materia">
            <input type="text" name="docente" id="docente" placeholder="Nombre Docente"><br>
            <input type="text" name="grado" id="grado" placeholder="Grado">
            <input type="button" value="Enviar" name="registrarMateria" id="registrarMateria">
        </form>
        <script src="../Controlador/funcionMateria.js"></script>
        <?php
        include_once('../Librerias/libreriaCSS.php');
        include_once('../Librerias/libreriaJS.php');
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                iniciarPagina();
            })
        </script>
    </div>
</body>

</html>