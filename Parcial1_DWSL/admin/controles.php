<?php
    include_once("../conf/conf.php");

    $opcion = isset( $_POST['bandera']) ? $_POST['bandera'] :"";
    $opciong = isset( $_GET['opcion']) ? $_GET['opcion'] :"";
    $nombre = isset( $_POST['nombre']) ? $_POST['nombre'] :"";
    $especialidad = isset( $_POST['especialidad']) ? $_POST['especialidad'] :"";
    $tel = isset( $_POST['telefono']) ? $_POST['telefono'] :"";
    $correo = isset( $_POST['correo']) ? $_POST['correo'] :"";
    $AbogadoID = isset( $_POST['AbogadoID']) ? $_POST['AbogadoID'] :"";
    $AbogadoIDg = isset( $_GET['AbogadoID']) ? $_GET['AbogadoID'] :"";


    if( $opcion == 1){
        $consulta = "INSERT INTO Abogado (AbogadoID, Nombre, Especialidad, Telefono, Correo)
        VALUES (NULL, '$nombre', '$especialidad',$tel, '$correo');";
    
    $ejecutar = mysqli_query($con, $consulta);
    if($ejecutar){
        header('Location: index.php');
    }

    }elseif( $opcion == 2){
        //como estan definidos en tbl 
        $consulta = "UPDATE Abogado SET
                        Nombre='$nombre',
                        Especialidad='$especialidad',
                        Telefono=$tel,
                        Correo='$correo'
                        WHERE AbogadoID=".$AbogadoID;

        $ejecutar=mysqli_query($con, $consulta);
        if($ejecutar){
            header('Location: index.php'); //retorna 
        }else{
            echo "Error en la consulta";
        }
    }else if($opciong == 3){
        $consulta="DELETE FROM Abogado WHERE AbogadoID=".$AbogadoIDg;
        $ejecutar= mysqli_query($con, $consulta);
        if($ejecutar){
            header('Location: index.php'); 
        }else{
            echo "No se pudo eliminar el registro";
        }

    }
    
    $con -> close();
?>