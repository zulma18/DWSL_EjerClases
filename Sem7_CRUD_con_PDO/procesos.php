<?php
//conexion db
include_once("./conf/conf.php");
$objeto = new Conexion();
$conexion= $objeto->Conectar();

//recibiendo los datos
$nombre = isset($_POST['nombre']) ? $_POST['nombre']:"";
$tel = isset($_POST['tel']) ? $_POST['tel']:"";
$dui = isset($_POST['dui']) ? $_POST['dui']:"";
$correo = isset($_POST['correo']) ? $_POST['correo']:"";
$direccion = isset($_POST['direccion']) ? $_POST['direccion']:"";
$bandera = isset($_POST['bandera']) ? $_POST['bandera']:"";

if($bandera == 1){
    //consulta preparada
    $consulta = "INSERT INTO client (Name, Tel, DUI, Mail, Address) VALUES (:nombre, :tel, :dui, :correo, :direccion)"; //parametros "values"
    $resultado= $conexion->prepare($consulta); //preparar consulta
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':tel', $tel);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);
    $resultado->bindParam(':nombre', $nombre);

    if($resultado->execute()){
        header("Location: index.php");
    }else{
        echo "error en la consulta";
    }

}else if ($bandera == 2){
    //recibiendo el id
    $ClientID = isset($_POST['ClientID']) ? $_POST['ClientID'] : "";
    //consulta preparada
    $consultaUp = "UPDATE client SET 
                Name = :nombre, 
                Tel = :tel, 
                DUI = :dui, 
                Mail = :correo, 
                Address = :direccion 
                WHERE ClientID = :ClientID";

    $resultado = $conexion->prepare($consultaUp);
    $resultado->bindParam(':nombre', $nombre); //asocia el valor del parámetro a la consulta
    $resultado->bindParam(':tel', $tel);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);
    $resultado->bindParam(':ClientID', $ClientID);

    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "error en la consulta";
    }

}else{
    //recibiendo los datos
    $ClientID = isset($_GET['ClientID']) ? $_GET['ClientID']:"";
    $consultita="DELETE FROM client WHERE ClientID = :ClientID";
    $resultado= $conexion->prepare($consultita);
    $resultado->bindParam(':ClientID', $ClientID );

    if($resultado->execute()){
        header("Location: index.php");
    }else {
        echo "error de consulta";
    }

}

?>