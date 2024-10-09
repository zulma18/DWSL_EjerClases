<?php
$valor=$_POST['seleccion'];
if( $valor == 0){
    echo "Seleccione una opción valida";
}else {
    echo "El valor seleccionado es: ".$valor;
}
?>