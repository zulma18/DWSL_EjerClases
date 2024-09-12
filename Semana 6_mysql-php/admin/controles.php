<?php
    include_once("../conf/conf.php");

    $opcion = isset( $_POST['bandera']) ? $_POST['bandera'] :"";
    $opciong = isset( $_GET['opcion']) ? $_GET['opcion'] :"";
    $nombre = isset( $_POST['nombre']) ? $_POST['nombre'] :"";
    $tel = isset( $_POST['telefono']) ? $_POST['telefono'] :"";
    $dui = isset( $_POST['dui']) ? $_POST['dui'] :"";
    $correo = isset( $_POST['correo']) ? $_POST['correo'] :"";
    $direccion = isset( $_POST['direccion']) ? $_POST['direccion'] :"";
    $ClientID = isset( $_POST['ClientID']) ? $_POST['ClientID'] :"";
    $ClientIDg = isset( $_GET['ClientID']) ? $_GET['ClientID'] :"";


    if( $opcion == 1){
        //CAMPOS DE LA TBL EXACTAMENTE IGUAL EL NM
        $consulta = "INSERT INTO client (ClientID, Name, Tel, DUI, Mail, Address)
        VALUES (NULL, '$nombre', $tel, $dui, '$correo', '$direccion');";
    
    $ejecutar = mysqli_query($con, $consulta);
    if($ejecutar){
        header('Location: index.php');
    }

    }elseif( $opcion == 2){
        //como estan definidos en tbl 
        $consulta = "UPDATE client SET
                        Name='$nombre',
                        Tel=$tel,
                        DUI=$dui,
                        Mail='$correo',
                        Address='$direccion'
                        WHERE ClientID=".$ClientID;
        //Para encontrar el error
        //var_dump($consulta);
        $ejecutar=mysqli_query($con, $consulta);
        if($ejecutar){
            header('Location: index.php'); //retorna 
        }else{
            echo "Error en la consulta";
        }
    }else if($opciong == 3){
        $consulta="DELETE FROM client WHERE ClientID=".$ClientIDg;
        $ejecutar= mysqli_query($con, $consulta);
        if($ejecutar){
            header('Location: index.php'); //eventos alert, en JS, como validacion para confirmar si queremos eliminarlo
        }else{
            echo "No se pudo eliminar el registro";
        }

    }
    
    $con -> close();
?>