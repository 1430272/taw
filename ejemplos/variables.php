<?php
  //variable numerica
  $numero=5;
  echo "esto es un numero: $numero<br>";
  var_dump($numero);
  echo "<br><br>";



  //palabra 

  $palabra = "ITI";

  echo "esto es una palabra $palabra <br>";
  var_dump($palabra);
  echo  "<br><br>";

  $booleana = true;
  echo "esto es una variable booleana: $booleana <br>";

  //arreglos unidimencionales
  $arregloColores = array("rojo","amarillo");
  echo "esto es una variable de array: $arregloColores[1] <br>";
  var_dump($arregloColores);
  echo "<br><br>";

  //variable arreglo con propiedades
  $arregloVerduras = array("verdura1"=>"lechuga", "verdura2"=>"cebolla");
  echo "esto es un array con propiedades: $arregloVerduras[verdura1] <br>";
  var_dump($arregloVerduras);
  echo "<br><br>";

  //variables del tipo objeto

  $frutas = (object)["fruta1"=>"pera","fruta2"=>"manzana"];
  echo "esto es una variable del tipo objeto:  $frutas->fruta1 <br>";
  var_dump($frutas);

?>