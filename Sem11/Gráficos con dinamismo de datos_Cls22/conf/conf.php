<?php

$server = "localhost";
$pass = "1234";
$user = "root";
$db = "northwind";

$con = mysqli_connect($server, $user, $pass, $db);
if ($con) {
   // echo"Conexión realizada";
}
else {
    echo "Error de conexión";
}

?>