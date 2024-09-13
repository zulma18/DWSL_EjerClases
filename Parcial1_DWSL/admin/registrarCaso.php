<?php
session_start();
if($_SESSION['usuario']==""){
    header('Location: ../index.php');
}

// Conexión a la base de datos
include_once("../conf/conf.php");

// Consulta para obtener los abogados
$consulta_tblAbogado = "SELECT AbogadoID, Nombre FROM Abogado";
$ejecutar_consultaAbogado = mysqli_query($con, $consulta_tblAbogado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registrar Caso</title>
</head>
<body>
    <h1 class="bg-success p-2 text-white text-center">Agregar caso</h1>
    <form action="controlesCaso.php" method="POST">
        <div class="form-control">
            <input type="text" name="bandera" value="1" hidden><br>
            <label for="caso">Nombre Caso:</label>
            <input class="form-control" type="text" name="nombreCaso" required><br>
            <label for="caso">Fecha Inicio: </label>
            <input class="form-control" type="date" name="fechaInicio" required><br>
            <label for="caso">Estado Caso:</label>
            <input class="form-control" type="text" name="estado" required><br>
            
            <!-- Select para mostrar los nombres de los abogados -->
            <select class="form-select mb-3" name="abogadoid" required> <!--abogadoId cmabie-->
                <option value="" disabled selected>--Seleccione un abogado--</option>
                <?php
                // Ciclo para mostrar los abogados en el select
                while($row_abogado = mysqli_fetch_array($ejecutar_consultaAbogado)) {
                    echo "<option value='".$row_abogado['AbogadoID']."'>".$row_abogado['Nombre']."</option>";
                }
                ?>
            </select><br>
            <label for="caso">Descripcion del caso:</label>
            <input class="form-control" type="text" name="descripcion" required><br>
            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="casos.php" class="btn btn-secondary" style="margin-left:10px">Regresar</a>

        </div>
    </form>
</body>
</html>