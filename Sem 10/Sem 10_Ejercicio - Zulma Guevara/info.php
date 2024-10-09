<?php
$conexion= new mysqli('localhost', 'root', '1234', 'northwind');

$buscar=$_POST['seleccion'];

$consulta = "Select * FROM supplier where companyName LIKE '%$buscar%'";

$ex = mysqli_query($conexion, $consulta);
    while($filas=mysqli_fetch_array($ex)){
        echo $filas[1]."<br>";
    }
?>
