<?php
session_start();
if($_SESSION['usuario']==""){
    header('Location: ../index.php');
}
//donde está el archivo de conexión a la db -->
include_once("../conf/conf.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Principal</title>
</head>
<body>
    <nav class="nav nav-pills flex-column flex-sm-row">
    <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#"><?php echo "Bienvenid@ ". $_SESSION['usuario']; ?></a>
    <a class="flex-sm-fill text-sm-center nav-link" href="casos.php">Ver Casos</a> 
    <a class="flex-sm-fill text-sm-center nav-link" href="salir.php">Salir</a>
    </nav>

    <h1 class="bg-success p-2 text-white text-center">ABOGADOS</h1>

    <br><br>
    <div class="container-sm">
        <form action="" method="get">
            <!--BUSQUEDA--->
            <div class="input-group mb-3">
            <input type="text" name="busqueda" class="form-control" placeholder="Nombre o Especialidad" aria-label="Recipient's username" aria-describedby="button-addon2">            
            <button class="btn btn-info" type="submit" name="enviar" value="buscar">Buscar</button>
            <a href="registrarAbogado.php" class="btn btn-success" style="margin-left:10px">Agregar Abogado</a>
            </div>
        </form>
    </div>
    <br><br>

    <?php 
    // Si se ha enviado el formulario de búsqueda
    if (isset($_GET['enviar']) && $_GET['enviar'] == 'buscar' && !empty($_GET['busqueda'])) {
        $busqueda = mysqli_real_escape_string($con, $_GET['busqueda']);
        //consulta sql
        $consulta = "SELECT * FROM Abogado WHERE Nombre LIKE '%$busqueda%' OR Especialidad LIKE '%$busqueda%'";
        $ejecutar = mysqli_query($con, $consulta);

        // Mostrar solo los resultados de búsqueda
        if (mysqli_num_rows($ejecutar) > 0) {
            echo '<br><h3>Resultados de Búsqueda</h3>';
            echo '<br>'; 
            echo '<table class="table table-hover">';
            echo '<tr>';
            echo '<th>Cod</th>';
            echo '<th>Nombre</th>';
            echo '<th>Especialidad</th>';
            echo '<th>Teléfono</th>';
            echo '<th>Correo</th>';
            echo '<th>Opciones</th>';
            echo '</tr>'; 

            while ($row = mysqli_fetch_array($ejecutar)) {
                echo '<tr>';
                echo '<td>' . $row[0] . '</td>';
                echo '<td>' . $row[1] . '</td>';
                echo '<td>' . $row[2] . '</td>';
                echo '<td>' . $row[3] . '</td>';
                echo '<td>' . $row[4] . '</td>';
                echo '<td>
                    <a href="modificarAbogado.php?AbogadoID='. $row[0].'" class="btn btn-primary">Modificar</a>
                    <a href="controles.php?AbogadoID='.$row[0].'&opcion=3" class="btn btn-danger">Eliminar</a>
                </td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning" role="alert">No se encontraron resultados para la búsqueda.</div>';
        }
    } else {
        // Consulta a la db para mostrar todos los datos
        $consulta = "SELECT * FROM Abogado;";
        $ejecutar = mysqli_query($con, $consulta);
        
        // Mostrar la tabla con todos los datos
        echo '<div class="container">';
        echo '<table class="table">';
        echo '<tr>';
        echo '<th>Cod</th>';
        echo '<th>Nombre</th>';
        echo '<th>Especialidad</th>';
        echo '<th>Teléfono</th>';
        echo '<th>Correo</th>';
        echo '<th>Opciones</th>';
        echo '</tr>';
        echo '</div>';
        

        while($row = mysqli_fetch_array($ejecutar)) {
            echo "<tr>";
                echo "<td>".$row[0]."</td>"; //Los puntos indican concatenación de código
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "<td>".$row[3]."</td>";
                echo "<td>".$row[4]."</td>";
                //La variable id, es enviada por el método GET, el id cuando pasa el cursor por el botón de la fila
                echo "<td><a href='modificarAbogado.php?AbogadoID=".$row[0]."' class='btn btn-primary'>Modificar</a>
                <a href='controles.php?AbogadoID=".$row[0]."&opcion=3' class='btn btn-danger'>Eliminar</a></td>";  //para los botones
            echo "</tr>";
        }
        echo '</table>';
    }
    ?>
</body>
</html>
