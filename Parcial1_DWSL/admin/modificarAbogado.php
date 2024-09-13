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
    $AbogadoID=isset($_GET['AbogadoID']) ? $_GET['AbogadoID']:""; 

    //variable para hacer la consulta
    $consultadev = "SELECT * FROM Abogado WHERE AbogadoID=".$AbogadoID;

    //variable para ejecutar la consulta
    $ejecutar=mysqli_query($con, $consultadev);
    
    //Retornar la info ingresada 
    //rows = dato
    while($rows=mysqli_fetch_array($ejecutar)){
    ?>
    
    <!--Form trae los campos ya ingresados, para modif solo el que convenga-->
    <h1 class="bg-primary p-2 text-white text-center">Modificar Informacion Abogado</h1>
    <form action="controles.php" method="POST">
        <div class="form-control">
            <!--value=2, para el if de controles-->
            <input type="text" name="bandera" value="2" hidden>
            <input type="text" name="AbogadoID" value="<?php echo $AbogadoID; ?>" hidden> <!--Imprimiendo el dato-->
            <!--Agregar el required, para validar el ingrespo de los campos obligatorio-->
            <input class="form-control" type="text" name="nombre" value="<?php echo $rows[1]; ?>"><br> <!---value="pasa el dato ongesado por el usuario"--->
            <input class="form-control" type="text" name="especialidad" value="<?php echo $rows[2]; ?>"><br>
            <input class="form-control" type="text" name="telefono" value="<?php echo $rows[3]; ?>"><br>
            <input class="form-control" type="text" name="correo" value="<?php echo $rows[4]; ?>"><br>
            <?php
    }
    ?>    
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="index.php" class="btn btn-secondary" style="margin-left:10px">Regresar</a>

        </div>
    </form>

</body>
</html>
