<?php
//codigo inperativo espageti

$automovil1 = (object) ["marca"=>"Chevrolet","modelo"=>"chevy"];
$automovil2 = (object) ["marca"=>"ford","modelo"=>"lobo"];
$automovil3 = (object) ["marca"=>"honda","modelo"=>"cvr"];


//fincion con parametros para imprimir determinado automovil
function mostrar($automovili){

	echo"<p>hola soy un $automovili->marca, modelo $automovili->modelo</p>";
}



mostrar ($automovil1);
mostrar ($automovil2);
mostrar ($automovil3);




?>