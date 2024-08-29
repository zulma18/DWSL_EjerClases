<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mostrar Meses</title>
</head>
<body>
    <div class="contenedor">
        <h1>Selecciona los meses que quieres mostrar</h1>
        <form action="" method="post">
            <label for="meses">Ingrese los numeros de los meses que desea obervar<br>
            (números separados por comas, ej: 1,3,10):</label><br><br>
            <input type="text" id="meses" name="meses" required><br><br>
            <input type="submit" value="Mostrar Meses" class="btn"><br><br>
        </form>
    </div>

</body>
</html>

<?php
// Arreglo con los nombres de los meses
$mesesDelAnio = [
    1 => "Enero", 
    2 => "Febrero", 
    3 => "Marzo", 
    4 => "Abril", 
    5 => "Mayo", 
    6 => "Junio", 
    7 => "Julio", 
    8 => "Agosto", 
    9 => "Septiembre", 
    10 => "Octubre", 
    11 => "Noviembre", 
    12 => "Diciembre"
];

// Verificar si se enviaron los meses
if (isset($_POST['meses'])) {
    $mesesSeleccionados = $_POST['meses'];
    
    // Convertir la cadena en un arreglo de números
    $mesesArray = array_map('intval', explode(',', $mesesSeleccionados));

    echo "<h1>Meses seleccionados:</h1><ul>";

    // Recorrer y mostrar los meses válidos
    foreach ($mesesArray as $mes) {
        if (isset($mesesDelAnio[$mes])) {
            echo "<li>" . $mesesDelAnio[$mes] . "</li>";
        } else {
            echo "<li>Mes $mes no es válido</li>";
        }
    }
    
} else {
    echo "<p>No se recibieron meses.</p>";
}
?>

