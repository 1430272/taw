<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

//Antes Datos ahora UsuariosModel, un modelo por modulo

class UsuariosModel extends Conexion{
	
	#VISTA productos
	#-------------------------------------
	public static function registrar_productos_model($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, precio) VALUES (:nombre, :precio)");
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}
	
	public static function ver_productos_model($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}
	
	#VISTA productos
	#-------------------------------------
	public static function ver_ventas_model($tabla_ventas,$tabla_productos){
		//por si se filtra por fecha de venta
		$add_filter_date = '';
		if(isset($_GET["date"])){
			$add_filter_date = "AND v.fecha='".$_GET["date"]."'";
		}
		$stmt = Conexion::conectar()->prepare("SELECT v.*, p.* FROM $tabla_ventas AS v, $tabla_productos AS p WHERE p.id = v.producto_id {$add_filter_date} ORDER BY venta_id asc");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function venderModel($datosModel,$tabla){
		$fecha = date("Y-m-d");
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
		(producto_id, cantidad, fecha) 
		VALUES (:producto_id, :cantidad, :fecha)");	
		$stmt->bindParam(":producto_id", $datosModel["producto_id"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}

} ?>