<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<body>
    <?php
    //Abriendo conexion
    include_once'../conf/conf.php';

    //resiviendo la variable id, que se esta enviando por el metd GET
    $ClientID=isset($_GET['ClientID']) ? $_GET['ClientID']:""; 

    //variable para hacer la consulta
    $consultadev = "SELECT * FROM client WHERE ClientID=".$ClientID;

    //variable para ejecutar la consulta
    $ejecutar=mysqli_query($con, $consultadev);
    
    //Retornar la info ingresada 
    //rows = dato
    while($rows=mysqli_fetch_array($ejecutar)){
    ?>
    
    <!--Form trae los campos ya ingresados, para modif solo el que convenga-->
    <form action="controles.php" method="POST">
        <div class="form-control">
            <!--value=2, para el if de controles-->
            <input type="text" name="bandera" value="2" hidden>
            <input type="text" name="ClientID" value="<?php echo $ClientID; ?>" hidden> <!--Imprimiendo el dato-->
            <!--Agregar el required, para validar el ingrespo de los campos obligatorio-->
            <input class="form-control" type="text" name="nombre" value="<?php echo $rows[1]; ?>"><br> <!---value="pasa el dato ongesado por el usuario"--->
            <input class="form-control" type="text" name="telefono" value="<?php echo $rows[2]; ?>"><br>
            <input class="form-control" type="text" name="dui" value="<?php echo $rows[3]; ?>"><br>
            <input class="form-control" type="text" name="correo" value="<?php echo $rows[4]; ?>"><br>
            <input class="form-control" type="text" name="direccion" value="<?php echo $rows[5]; ?>"-><br>
            <?php

    }
    ?>    
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>

</body>
</html>