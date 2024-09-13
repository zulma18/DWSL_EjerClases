<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modificar Caso</title>
</head>
<body>
    <?php
    //Abriendo conexion
    include_once'../conf/conf.php';

    //resiviendo la variable id, que se esta enviando por el metd GET
    $CasoID=isset($_GET['CasoID']) ? $_GET['CasoID']:""; 

    //variable para hacer la consulta
    $consultadevCaso = "SELECT * FROM Caso WHERE CasoID=".$CasoID;

    //variable para ejecutar la consulta
    $ejecutarCaso=mysqli_query($con, $consultadevCaso);

    //variable para obtener la info del caso seleccionado
    $rows = mysqli_fetch_array($ejecutarCaso);

    // Consulta para obtener los abogados disponibles
    $consulta_tblAbogado = "SELECT AbogadoID, Nombre FROM Abogado";
    $ejecutar_consultaAbogado = mysqli_query($con, $consulta_tblAbogado);

    // Obtiene el abogado actual del caso 
    $abogadoActualID = $rows['AbogadoID']; 
    
    ?>
    <h1 class="bg-primary p-2 text-white text-center">Modificar caso</h1>
    <form action="controlesCaso.php" method="POST">
        <div class="form-control">
            <!-- Campo oculto para identificar que es una actualización -->
            <input type="text" name="bandera" value="2" hidden>
            <input type="text" name="CasoID" value="<?php echo $CasoID; ?>" hidden>
            <label for="caso">Nombre Caso:</label>
            <input class="form-control" type="text" name="nombreCaso" value="<?php echo $rows['NombreCaso']; ?>" required><br> <!--Con row, se pasa el nm de la colm, para que muestre la info ingresada -->
            <label for="caso">Fecha Inicio: </label>
            <input class="form-control" type="date" name="fechaInicio" value="<?php echo $rows['FechaInicio']; ?>" required><br> 
            <label for="caso">Estado Caso:</label>
            <input class="form-control" type="text" name="estado" value="<?php echo $rows['Estado']; ?>" required><br> 
            <label for="caso"> Abogado encargado:</label>
            <select  class="form-select mb-3"  name="abogadoid" required>
                <option value="" disabled>Seleccione un abogado</option>
                <?php
                // Genera las opciones del select con los abogados disponibles
                while ($rowAbogado = mysqli_fetch_assoc($ejecutar_consultaAbogado)) {
                    // Si el abogado actual es el mismo que el seleccionado, lo marcar como seleccionado
                    $selected = ($rowAbogado['AbogadoID'] == $abogadoActualID) ? "selected" : "";
                    echo "<option value='" . $rowAbogado['AbogadoID'] . "' " . $selected . ">" . $rowAbogado['Nombre'] . "</option>";
                }
                ?>
            </select><br>
            <label for="caso">Descripcion del caso:</label>
            <input class="form-control" type="text" name="descripcion" value="<?php echo $rows['Descripcion']; ?>" required><br>
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="casos.php" class="btn btn-secondary" style="margin-left:10px">Regresar</a>

        </div>
    </form>

</body>
</html>
    
