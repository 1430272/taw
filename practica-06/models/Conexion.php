<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=taw_1430272","root","root");
		return $link;

	}

}

?>