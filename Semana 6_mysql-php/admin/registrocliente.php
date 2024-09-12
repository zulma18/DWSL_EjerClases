<?php
session_start();
if($_SESSION['usuario']==""){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registrar cliente</title>
</head>
<body>
    <form action="controles.php" method="POST">
        <div class="form-control">
            <input type="text" name="bandera" value="1" hidden>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre"><br>
            <input class="form-control" type="text" name="telefono" placeholder="Telefono"><br>
            <input class="form-control" type="text" name="dui" placeholder="DUI"><br>
            <input class="form-control" type="text" name="correo" placeholder="Correo"><br>
            <input class="form-control" type="text" name="direccion" placeholder="Dirección"><br>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>
</body>
</html>