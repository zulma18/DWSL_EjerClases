<!--LOGIN-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bienvenidos</title>
</head>
<body>
<form action="index.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
  </div>
  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
</form>
<?
echo isset($error);
?>
</body>
</html>
<?php
//Para la conexion
include_once'./conf/conf.php';
//Para el inicio de sesion, si existe el usuario
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario=isset($_POST['usuario'])? $_POST['usuario']:"";
    $pwd=isset($_POST['pwd'])? $_POST['pwd']:"";
    $consulta = "SELECT nombre, usuario, pwd FROM usuario WHERE usuario='".$usuario."' AND pwd='".md5($pwd)."'"; //md5, xq esta encriptada la pwd
    $ejecutar = mysqli_query($con, $consulta);
    if($ejecutar->num_rows == 1){
      
      session_start();
      while($user=mysqli_fetch_assoc($ejecutar)){
        $_SESSION['usuario']=$user['nombre'];
      }
        header('Location: ./admin/index.php');
    }else{
        $error ="Error en el inicio de sesion";
    }

}
?>
