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
    <title>Registrar Abogado</title>
</head>
<body>
<h1 class="bg-success p-2 text-white text-center">Agregar Informacion Abogado</h1>
    <form action="controles.php" method="POST">
        <div class="form-control">
            <input type="text" name="bandera" value="1" hidden>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" required><br>
            <input class="form-control" type="text" name="especialidad" placeholder="Especialidad" required><br>
            <input class="form-control" type="text" name="telefono" placeholder="Telefono" required><br>
            <input class="form-control" type="text" name="correo" placeholder="Correo" required><br>
            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="index.php" class="btn btn-secondary" style="margin-left:10px">Regresar</a>

        </div>
    </form>
</body>
</html>