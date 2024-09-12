<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="registro.php">Nuevo registro</a>
    <?php
        include_once("./conf/conf.php");
        $objeto = new Conexion();
        $conexion= $objeto->Conectar();

        $consulta= "SELECT * FROM client";
        $preparacion = $conexion->prepare($consulta);
        $preparacion->execute();

        //recibir los datos
        $clientes= $preparacion->fetchAll(PDO::FETCH_ASSOC);
        //encabezados tbl
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>TELEFONO</th>";
        echo "<th>DUI</th>";
        echo "<th>CORREO</th>";
        echo "<th>DIRECCION</th>";
        echo "<th>OPCIONES</th>";
        echo "</tr>";        

        foreach($clientes as $client) {
            //nm exactos cm estan el colm de la db
            echo "<tr>";
            echo "<td>".$client['ClientID']."</td>";
            echo "<td>".$client['Name']."</td>";
            echo "<td>".$client['Tel']."</td>";
            echo "<td>".$client['DUI']."</td>";
            echo "<td>".$client['Mail']."</td>";
            echo "<td>".$client['Address']."</td>";
            //para los btn
            echo "<td><a href='modificar.php?ClientID=".$client['ClientID']."'>Modificar</a> <a href='procesos.php?ClientID=".$client['ClientID']."'>Eliminar</a></td>";
            echo "</tr>";

        }


    ?>
</body>
</html>