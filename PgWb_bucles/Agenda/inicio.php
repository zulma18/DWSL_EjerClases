<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agenda Diaria</title>
</head>
<body>
    <div class="contenedor">
        <h1>Agenda Personal Diaria</h1>
        
        <form action="agregar.php" method="post">
            <label for="cantidad">Ingresa un número para generar los espacios: </label>
            <input type="number" id="cantidad" name="cantidad" min="1" required><br><br>
            <input type="submit" value="Añadir" class="btn">
        </form>
        <br><br>
    </div>
</body>
</html>
