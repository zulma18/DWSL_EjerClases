
<?php
    // Cuando se de clic en el btn guardar
    if (isset($_POST['guardar'])) {
        $cantidad = $_POST['cantidad'];

        echo "<h1>Actividades Guardadas:</h1>";
        echo "<ul>";
        for ($i = 1; $i <= $cantidad; $i++) {
            $campo = $_POST["campo$i"];
            echo "<li>Actividad $i: $campo</li>";
        }
        echo "</ul>";
    }

?>