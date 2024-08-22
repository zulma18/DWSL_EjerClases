<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
<!--Ejecuta el POST dentro del mismo archivo-->
    <form action="app3.php" method="post">
        <table>
            <tr>
                <th>MATEMATICAS</th>
                <th>LENGUAJE</th>
                <th>CIENCIAS</th>
                <th>SOCIALES</th>
                <th>MORAL</th>
            </tr>
            <tr>
            <td><input type="number" name="m" value="<?php echo isset($_POST['m']) && !isset($_POST['limpiar']) ? $_POST['m'] : ''; ?>"></td>
                <td><input type="number" name="l" value="<?php echo isset($_POST['l']) && !isset($_POST['limpiar']) ? $_POST['l'] : ''; ?>"></td>
                <td><input type="number" name="c" value="<?php echo isset($_POST['c']) && !isset($_POST['limpiar']) ? $_POST['c'] : ''; ?>"></td>
                <td><input type="number" name="s" value="<?php echo isset($_POST['s']) && !isset($_POST['limpiar']) ? $_POST['s'] : ''; ?>"></td>
                <td><input type="number" name="mo" value="<?php echo isset($_POST['mo']) && !isset($_POST['limpiar']) ? $_POST['mo'] : ''; ?>"></td>
            </tr>
        </table>
        <br>
        <!--btn promediar-->
        <input type = "submit" name="promediar" value="Promediar">
        <!--btn limpiar-->
        <input type = "submit" name = "limpiar" value="Nuevo Promedio">
    </form>
    <br>

</body>
</html>

<?php
//si el (SERVER) resive un post, en la solicitud submit, se ejecuta el if
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_POST['promediar'])){
        //recibiendo los dts
        $matematicas = isset($_POST['m']) ? $_POST['m']:"";
        $lenguaje = isset($_POST['l']) ? $_POST['l']:"";
        $ciencias = isset($_POST['c']) ? $_POST['c']:"";
        $sociales = isset($_POST['s']) ? $_POST['s']:"";
        $moral = isset($_POST['mo']) ? $_POST['mo']:"";
    
        //verifica que las 5 notas esten ingresadas
        if($matematicas != "" && $lenguaje!= "" && $ciencias != "" && $sociales != "" && $moral != ""){
            $promedio = ($matematicas + $lenguaje + $ciencias + $sociales + $moral) / 5;
            echo "EL PROMEDIO DEL ESTUDIANTE ES: ".$promedio;

        }else{
            echo "Debe ingresar las 5 notas...";
        }
    }

}
?>