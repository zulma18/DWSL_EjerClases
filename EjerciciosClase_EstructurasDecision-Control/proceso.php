<?php
//se ve la info
/*
echo $num1 =isset($_GET['n1']) ? $_GET['n1']:"";
echo $num1 =isset($_GET['n2']) ? $_GET['n2']:"";
echo $operador =isset($_GET['$operador']) ? $_GET['$operador']:""; 
*/

//no se ve la info
/*$num1 =isset($_POST['n1']) ? $_POST['n1']:"";
$num2 =isset($_POST['n2']) ? $_POST['n2']:"";
$operador =isset($_POST['$operador']) ? $_POST['$operador']:"";
*/

//si el (SERVER) resive un post, en la solicitud submit, se ejecuta el if
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
// recibiendo los valores
$num1 = $_POST['n1'];
$num2 = $_POST['n2'];
$operador = $_POST['operador'];

switch ($operador) {
    case '+':
        $respuesta = $num1 + $num2;
        break;
    case '-':
        $respuesta = $num1 - $num2;
        break;
    case '*':
        $respuesta = $num1 * $num2;
        break;
    case '/':
        // Verificar que no haya división por cero
        if ($num2 != 0) {
            $respuesta = $num1 / $num2;
        } else {
            $respuesta = "Error: No se puede dividir por cero.";
        }
        break;
    default:
        $respuesta = "No existe esa condicion";
        break;
}
// Mostrar el resultado
 echo "La respuesta de la operación es: " . $respuesta;
}
















/*
switch($operador){
    case '+':
        $respuesta= $num1+$num2;
         echo "La respuesta de la operacion es: ".$respuesta;
        break;

    default:
        echo $respuesta = "No existe esa condicion";
    break;
}*/
?>

