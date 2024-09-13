<?php
session_start();
if($_SESSION['usuario']==""){
    header('Location: ../index.php');
}
//cerrar sesion- destruirla
session_destroy();
header('Location: ../index.php');


?>