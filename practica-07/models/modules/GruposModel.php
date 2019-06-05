<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

#Antes Datos ahora UsuariosModel, un modelo por modulo

class GruposModel extends Conexion {

	#REGISTRO DE materia
	#-------------------------------------
	public static function registrar_grupo($datosModel, $tabla){
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_carrera, id_materia, id_profesor) VALUES (:id_carrera, :id_materia, :id_profesor)");
		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);
		$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}

	#VISTA materias
	#-------------------------------------

	public static function mostrar_grupos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#EDITAR materia- este no actualiza, muestra la info sobre el form de editar
	#-------------------------------------

	public static function editar_grupo($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR ateria
	#-------------------------------------

	public static function actualizar_grupo($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_carrera = :id_carrera, id_materia = :id_materia, id_profesor = :id_profesor WHERE id = :id");
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);
		$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			Nucleo::Alerta("Error al registrar");
			return "error";
		}
		$stmt->close();
	}


	#BORRAR MATERIA
	#------------------------------------
	public static function borrar_grupo($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute()){
			return "success";
		} else{
			return "error";
		}
		$stmt->close();
	}
} ?>