<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

#Antes Datos ahora UsuariosModel, un modelo por modulo

class ReservacionesModel extends Conexion {

	#reservar
	#-------------------------------------
	public static function hacer_reservacion($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha_inicio, fecha_fin, id_cliente, id_habitacion, monto_pagado, fecha_registro) VALUES (:fecha_inicio, :fecha_fin, :id_cliente, :id_habitacion, :monto_pagado, :fecha_registro)");
		$stmt->bindParam(":fecha_inicio", $datosModel["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datosModel["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cliente", $datosModel["id_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":id_habitacion", $datosModel["id_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":monto_pagado", $datosModel["monto_pagado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}

	#ver
	#-------------------------------------

	public static function mostrar_reservaciones($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#EDITAR
	#-------------------------------------

	public static function editar_reservacion($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR
	#-------------------------------------

	public static function actualizar_reservacion($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_completo = :nombre_completo, email = :email, telefono = :telefono WHERE id = :id");
		$stmt->bindParam(":nombre_completo", $datosModel["nombre_completo"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "success";
		} else {
							Nucleo::Alerta("Error al registrar");
			return "error";
		}
		$stmt->close();
	}


	#BORRAR
	#------------------------------------
	public static function borrar_reservacion($datosModel, $tabla){
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