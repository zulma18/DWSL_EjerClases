
<?php
session_start();
if($_SESSION['usuario']==""){
    header('Location: ../index.php');
}
//dnd esta el arch de conexion a la db -->
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
    <a class="flex-sm-fill text-sm-center nav-link" href="salir.php">Salir</a>
    </nav>
<br><br>
    <a href="registrocliente.php" class="btn btn-success" style="margin-left:10px">Agregar Cliente</a>
    <br> 
    <?php 
    $consulta = "SELECT * FROM client;";
    $ejecutar = mysqli_query($con,$consulta);
    ?>
    <br>
    <table class="table">
        <tr>
            <th>Cod</th>
            <th>Name</th>
            <th>Telefono</th>
            <th>DUI</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>Opciones</th>
        </tr>
        <?php
        //row = datos
        while($row = mysqli_fetch_array($ejecutar)) {
            echo "<tr>";
                echo "<td>".$row[0]."</td>"; //Los puntos indican concatenacion de código
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "<td>".$row[3]."</td>";
                echo "<td>".$row[4]."</td>";
                echo "<td>".$row[5]."</td>";
                //La variable id, es enviada por el metodo GET, el id cuando pasa el cursor por el btn del la fila
                echo "<td><a href='modificarcliente.php?ClientID=".$row[0]."' class='btn btn-primary'>Modificar</a>
                <a href='controles.php?ClientID=".$row[0]."&opcion=3' class='btn btn-danger'>Eliminar</a></td>";  //para los btns
            echo "</tr>";
        }
        ?>
        
    </table>
    
    <!--<br>
    <a href="registrocliente.php" class="btn btn-success" style="margin-left:10px">Agregar cliente</a>
    <br> -->
</body>
</html>