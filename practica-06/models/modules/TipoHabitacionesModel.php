<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

#Antes Datos ahora UsuariosModel, un modelo por modulo

class TipoHabitacionesModel extends Conexion{

	#VISTA HABITACIONES
	#-------------------------------------
//"practica_06_tipo_habitaciones"
	public static function mostrar_tipo_habitaciones($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

} ?>