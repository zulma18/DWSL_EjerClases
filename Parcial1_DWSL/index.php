<?php
// Para la conexión a la base de datos
include_once './conf/conf.php';

// Manejo del inicio de sesión
$error = ""; // Inicializar la variable de error
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";

    // Consulta para validar el usuario y la contraseña
    $consulta = "SELECT nombre, usuario, pwd 
    FROM usuario WHERE usuario='".$usuario."' AND pwd='".md5($pwd)."'"; //md5, xq esta encriptada la pwd
    $ejecutar = mysqli_query($con, $consulta);

    // Verificación de las credenciales
    if ($ejecutar && $ejecutar->num_rows == 1) {
        session_start();
        while ($user = mysqli_fetch_assoc($ejecutar)) {
            $_SESSION['usuario'] = $user['nombre'];
        }
        header('Location: ./admin/casos.php');
    } else {
        // msj de error cuando el usuario o contraseña son incorrectos
        $error = '<div class="alert alert-danger" role="alert"> Usuario o contraseña incorrectos. </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Bufete de Abogados - Inicio de Sesión</title>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4 login-card">
        <div class="card-body">
            <div class="text-center">
                <h2 class="mb-4">Bufete de Abogados</h2>
                <img src="img/logo-web.png" alt="Logo del Bufete">
            </div>
            <h5 class="text-center mb-4"><strong>Inicio de Sesión</strong></h5>

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" id="contrasena" name="pwd" class="form-control" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </div>

                <!-- Muestra un msj de error -->
                <?php if (!empty($error)) { ?>
                    <div class="mt-3">
                        <?= $error ?>
                    </div>
                <?php } ?>

            </form>
        </div>
    </div>
</div>

</body>
</html>
