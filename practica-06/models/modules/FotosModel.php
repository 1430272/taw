<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

#Antes Datos ahora UsuariosModel, un modelo por modulo

class FotosModel extends Conexion{

	private $id;

	public function getId(){
		return $this->id;
	}

	#VISTA HABITACIONES
	#-------------------------------------
//"practica_06_tipo_habitaciones"
	public static function ver_fotos($datosModel, $tabla){
		$q = $_GET['id'];	//Query
		$db=Conexion::conectar();
			$sql = "SELECT * FROM $tabla WHERE id_habitacion = '$datosModel'";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$rows = $stmt->fetchAll();
			foreach ($rows as $row) {
				echo '<a href="'.$row["ruta"].'" target="_blank"><img src="'.$row["ruta"].'" alt="foto" width="30%" height="20%"></a> &nbsp;';
			}
	}
} ?>