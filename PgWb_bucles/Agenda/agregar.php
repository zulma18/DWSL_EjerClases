<?php
    // Verificar si se ha enviado un número
    if (isset($_POST['cantidad'])) {
        $cantidad = $_POST['cantidad'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <!-- <h1>Agenda Personal Diaria</h1>-->

        <?php if (isset($cantidad)) : ?>
            <h1>Actividades a ingresar:</h1>
            <form action="verActividades.php" method="post">
                <?php for ($i = 1; $i <= $cantidad; $i++) : ?>
                    <label for="campo<?= $i ?>">Actividad <?= $i ?>:</label>
                    <input type="text" id="campo<?= $i ?>" name="campo<?= $i ?>"><br><br>
                <?php endfor; ?>
                <input type="hidden" name="cantidad" value="<?= $cantidad ?>">
                <input type="submit" name="guardar" value="Guardar Actividades" class="btn">
                <br><br>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>



