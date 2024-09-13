<?php
    include_once("../conf/conf.php");

    $opcion = isset( $_POST['bandera']) ? $_POST['bandera'] :"";
    $opciong = isset( $_GET['opcion']) ? $_GET['opcion'] :"";
    $nombreCaso = isset( $_POST['nombreCaso']) ? $_POST['nombreCaso'] :"";
    $fechaInicio = isset( $_POST['fechaInicio']) ? $_POST['fechaInicio'] :"";
    $estado = isset( $_POST['estado']) ? $_POST['estado'] :"";
    $abogadoid = isset( $_POST['abogadoid']) ? $_POST['abogadoid'] :"";
    $descripcion = isset( $_POST['descripcion']) ? $_POST['descripcion'] :"";
    $CasoID = isset( $_POST['CasoID']) ? $_POST['CasoID'] :"";
    $CasoIDg = isset( $_GET['CasoID']) ? $_GET['CasoID'] :"";


    if( $opcion == 1){
        //nm iguales a cm estan en la db
        $consulta = "INSERT INTO Caso (CasoID, NombreCaso, FechaInicio, Estado, AbogadoId, Descripcion)
        VALUES (NULL, '$nombreCaso', '$fechaInicio', '$estado','$abogadoid', '$descripcion');";
    
    $ejecutar = mysqli_query($con, $consulta);
    if($ejecutar){
        header('Location: casos.php');
    }

    }elseif( $opcion == 2){
        $consulta = "UPDATE Caso SET
                        NombreCaso='$nombreCaso',
                        FechaInicio='$fechaInicio',
                        Estado='$estado',
                        AbogadoId=$abogadoid,
                        Descripcion='$descripcion'
                        WHERE CasoID=".$CasoID;

        $ejecutar=mysqli_query($con, $consulta);
        if($ejecutar){
            header('Location: casos.php'); //retorna 
        }else{
            echo "Error en la consulta";
        }
    }else if($opciong == 3){
        $consulta="DELETE FROM Caso WHERE CasoID=".$CasoIDg;
        $ejecutar= mysqli_query($con, $consulta);
        if($ejecutar){
            header('Location: casos.php'); 
        }else{
            echo "No se pudo eliminar el registro";
        }

    }
    
    $con -> close();
?>