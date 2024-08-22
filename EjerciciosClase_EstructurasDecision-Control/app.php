<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY APP</title>
</head>
<body>
    <form action="proceso.php" method= "POST">
        <label for="n1">Digite el 1 número</label>
        <br>
        <input type="number" name="n1" id="">
        <br>
        <br>
        <select name="operador" id="">
        <option value="0">Seleccione</option>
        <option value="+">Sumar</option>
        <option value="-">Restar</option>
        <option value="*">Multiplicar</option>
        <option value="/">Dividir</option>
        </select>
        <br>
        <br>
        <label for="n2">Digite número 2</label>
        <br>
        <input type="number" name="n2" id="">
        <br>
        <br>              
        <input type="submit" value="Calcular">
    </form>
</body>
</html>

<!-- <?php
// ** EJERCICIO 1 **//
//variables para las operaciones con valor de inicializacion
$num1=2;
$num2=5;
//operador de las variables
$operador='+';

switch($operador){
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
        $respuesta = $num1 / $num2;
        break;   

    //cuando no es un operador valido
    default:
    echo $respuesta = "no existe esa condicion";
    break; 

}

echo "La respuesta de la operacion es: ".$respuesta;
?> -->