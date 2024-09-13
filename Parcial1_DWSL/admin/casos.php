<?php
session_start();
if($_SESSION['usuario'] == ""){
    header('Location: ../index.php');
}
// Donde está el archivo de conexión a la db
include_once("../conf/conf.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Casos Jurídicos</title>
</head>
<body>
    
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#"><?php echo "Bienvenid@ ". $_SESSION['usuario']; ?></a>
        <a class="flex-sm-fill text-sm-center nav-link " href="index.php">Ver Abogados</a> 
        <a class="flex-sm-fill text-sm-center nav-link" href="salir.php">Salir</a>
    </nav> 
    

    <h1 class="bg-success p-2 text-white text-center">CASOS</h1>
    <br><br>
    
    <div class="container-sm">
        <form action="" method="get">
            <!-- Búsqueda -->
            <div class="input-group mb-3">
                <input type="text" name="busqueda" class="form-control" placeholder="nombre de caso o abogado" aria-label="Buscar" aria-describedby="button-addon2">
                <button class="btn btn-info" type="submit" name="enviar" value="buscar">Buscar</button>
                <a href="registrarCaso.php" class="btn btn-success" style="margin-left:10px">Agregar Caso</a>
            </div>
        </form>
    </div>
    <br><br>

    <?php 
    // Si se ha enviado el formulario de búsqueda
    if (isset($_GET['enviar']) && $_GET['enviar'] == 'buscar' && !empty($_GET['busqueda'])) {
        $busqueda = mysqli_real_escape_string($con, $_GET['busqueda']);
        
        // Consulta SQL preparada para buscar por nombre de caso o nombre de abogado
        $consulta = "SELECT Caso.CasoID, Caso.NombreCaso, Caso.FechaInicio, Caso.Estado, Abogado.Nombre, Caso.Descripcion
                     FROM Caso
                     INNER JOIN Abogado ON Caso.AbogadoId = Abogado.AbogadoID
                     WHERE Caso.NombreCaso LIKE '%$busqueda%' OR Abogado.Nombre LIKE '%$busqueda%'";

        $ejecutar = mysqli_query($con, $consulta);

        // Mostrar solo los resultados de búsqueda
        if (mysqli_num_rows($ejecutar) > 0) {
            echo '<br><h3>Resultados de Búsqueda</h3>';
            echo '<br>'; 
            echo '<table class="table table-hover">';
            echo '<tr>';
            echo '<th>Cod</th>';
            echo '<th>Nombre Caso</th>';
            echo '<th>Fecha Inicio</th>';
            echo '<th>Estado</th>';
            echo '<th>Abogado</th>';
            echo '<th>Descripción</th>';
            echo '<th>Opciones</th>';
            echo '</tr>'; 

            while ($row = mysqli_fetch_array($ejecutar)) {
                echo '<tr>';
                echo '<td>' . $row[0] . '</td>';
                echo '<td>' . $row[1] . '</td>';
                echo '<td>' . $row[2] . '</td>';
                echo '<td>' . $row[3] . '</td>';
                echo '<td>' . $row[4] . '</td>';
                echo '<td>' . $row[5] . '</td>';
                echo '<td>
                    <a href="modificarCaso.php?CasoID='. $row[0].'" class="btn btn-primary">Modificar</a>
                    <a href="controlesCaso.php?CasoID='.$row[0].'&opcion=3" class="btn btn-danger">Eliminar</a>
                </td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning" role="alert">No se encontraron resultados para la búsqueda.</div>';
        }
    } else {
        // Consulta a la db para mostrar todos los datos si no hay búsqueda
        $consulta = "SELECT Caso.CasoID, Caso.NombreCaso, Caso.FechaInicio, Caso.Estado, Abogado.Nombre, Caso.Descripcion
                     FROM Caso
                     INNER JOIN Abogado ON Caso.AbogadoId = Abogado.AbogadoID;";
        $ejecutar = mysqli_query($con, $consulta);
        
        // Mostrar la tabla con todos los datos
        echo '<table class="table">';
        echo '<tr>';
        echo '<th>Cod</th>';
        echo '<th>Nombre Caso</th>';
        echo '<th>Fecha Inicio</th>';
        echo '<th>Estado</th>';
        echo '<th>Abogado</th>';
        echo '<th>Descripción</th>';
        echo '<th>Opciones</th>';
        echo '</tr>';

        while($row = mysqli_fetch_array($ejecutar)) {
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "<td>".$row[3]."</td>";
            echo "<td>".$row[4]."</td>";
            echo "<td>".$row[5]."</td>";
            echo "<td><a href='modificarCaso.php?CasoID=".$row[0]."' class='btn btn-primary'>Modificar</a>
                  <a href='controlesCaso.php?CasoID=".$row[0]."&opcion=3' class='btn btn-danger'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo '</table>';
    }
    ?>

    
</body>
</html>
