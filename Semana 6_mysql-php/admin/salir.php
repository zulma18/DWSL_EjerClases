<?php
session_start();
if($_SESSION['usuario']==""){
    header('Location: ../index.php');
}
session_destroy();
header('Location: ../index.php');


?>