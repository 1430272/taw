<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

#Antes Datos ahora UsuariosModel, un modelo por modulo

class AlumnosModel extends Conexion {

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public static function registrar_alumno($datosModel, $tabla){
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, id_carrera, nombre, apellido_paterno, apellido_materno, email) VALUES (:matricula, :id_carrera, :nombre, :apellido_paterno, :apellido_materno, :email)");
		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_paterno", $datosModel["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datosModel["apellido_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}

	#VISTA USUARIOS
	#-------------------------------------

	public static function mostrar_alumnos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#EDITAR USUARIO	- este no actualiza, muestra la info sobre el form de editar
	#-------------------------------------

	public static function editar_alumno($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#Cliente por ID
	#-------------------------------------

	public static function alumno_por_id($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public static function actualizar_alumno($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula = :matricula, id_carrera = :id_carrera, nombre = :nombre, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, email = :email WHERE id = :id");
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_paterno", $datosModel["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datosModel["apellido_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "success";
		} else {
							Nucleo::Alerta("Error al registrar");
			return "error";
		}
		$stmt->close();
	}


	#BORRAR USUARIO
	#------------------------------------
	public static function borrar_alumno($datosModel, $tabla){
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