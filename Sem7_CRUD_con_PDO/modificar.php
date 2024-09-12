<?php
// Conexión a la base de datos
include_once("./conf/conf.php");
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// obteniendo el id, que se esta enviando por el metd GET(URL)
$ClientID = isset($_GET['ClientID']) ? $_GET['ClientID'] : "";

//por si no se encuentra el id
if ($ClientID != "") {
    // Consulta para obtener los datos del cliente
    $consulta = "SELECT * FROM client WHERE ClientID = :ClientID";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':ClientID', $ClientID, PDO::PARAM_INT);
    $resultado->execute();
    $client = $resultado->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontraron los datos del cliente
    if (!$client) {
        echo "No se encontraron los datos del cliente.";
        exit();
    }
} else {
    echo "ID del cliente no exite.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
</head>
<body>
    <h2>Modificar Cliente</h2>
<!--envia el form a procesos.php-->
    <form action="procesos.php" method="post">
        <!-- value=2, indica actualizacion de procesos.php-->
        <input type="hidden" name="bandera" value="2">
        <!-- ClientID oculto para identificar qué cliente se está modificando -->
        <input  name="ClientID" value="<?php echo $client['ClientID']; ?>" type="hidden">

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $client['Name']; ?>" required><br><br>

        <label for="tel">Teléfono:</label><br>
        <input type="text" name="tel" value="<?php echo $client['Tel']; ?>" required><br><br>

        <label for="dui">DUI:</label><br>
        <input type="text" name="dui" value="<?php echo $client['DUI']; ?>" required><br><br>

        <label for="correo">Correo:</label><br>
        <input type="email" name="correo" value="<?php echo $client['Mail']; ?>" required><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" name="direccion" value="<?php echo $client['Address']; ?>" required><br><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
