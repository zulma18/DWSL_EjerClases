<?php
$conexion= new mysqli('localhost', 'root', '1234', 'db_elecciones');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Inicio</title>
</head>
<body>
    <?php
$consulta= "SELECT * FROM dt_partidospoliticos";
$ex=mysqli_query($conexion,$consulta);
    ?>
    <select name="seleccion" id="seleccion">
        <option value="0">Seleccione..</option>
        <?php
        while($filas=mysqli_fetch_array($ex))
        {
            echo "<option value='".$filas['id_partido']."'>".$filas['NombrePartido']."</option>";
        }
        ?>
    </select>
    <button onclick="evaluar()">Evaluar</button>
    <div id="dato">

    </div>
</body>
</html>
<script src="evaluacion.js"></script>