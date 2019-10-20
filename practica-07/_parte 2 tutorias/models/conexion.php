<?php

class Conexion{
	public function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=tut-bd","root","root");
			echo "dseee";
		return $link;

	}

}


//Verificar conexión correcta
//$a= new Conexion();
//$a -> conectar();

?>
