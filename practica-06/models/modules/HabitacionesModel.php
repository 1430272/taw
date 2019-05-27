<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

#Antes Datos ahora UsuariosModel, un modelo por modulo

class HabitacionesModel extends Conexion{

	#REGISTRO DE HABITACIONES
	#-------------------------------------
	public static function registrar_habitacion($datosModel, $tabla){
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (piso, tipo, precio) VALUES (:piso,:tipo,:precio)");
		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":piso", $datosModel["piso"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}

	#VISTA HABITACIONES
	#-------------------------------------

	public static function mostrar_habitaciones($tabla_1, $tabla_2){
		
		
		// .../index.php?action=lista-habitaciones 		& filtrar-disponibilidad=0 & filtrar-tipo=1 & precio-min = 100 & precio-max = 200
		
		if(isset($_GET["filtrar-disponibilidad"])){
			if($_GET["filtrar-disponibilidad"]=="0"){	//0 = desocupado
				$filtro_estatus = " AND t1.estatus = '0' ";
			}
			if($_GET["filtrar-disponibilidad"]=="1"){	//1 = ocupado
				$filtro_estatus = " AND t1.estatus = '1' ";
			}
		} else {
			$filtro_estatus = "";	//Default = NULL
		}

		if(isset($_GET["filtrar-tipo"])){
			if($_GET["filtrar-tipo"]=="1"){	//1 = Simple
				$filtro_tipo = " AND t2.id = '1' ";
			}
			if($_GET["filtrar-tipo"]=="2"){	//2 = Doble
				$filtro_tipo = " AND t2.id = '2' ";
			}
			if($_GET["filtrar-tipo"]=="3"){	//3 = Matrimonial
				$filtro_tipo = " AND t2.id = '3' ";
			}
		} else {
			$filtro_tipo = "";	//Default = NULL
		}

		if(isset($_GET["precio-min"])){		//o precio minimo
			$filtro_precio = " AND t1.precio >= '".$_GET["precio-min"]."' ";
		} else if(isset($_GET["precio-max"])){	//o precio maximo
			$filtro_precio = " AND t1.precio <= '".$_GET["precio-max"]."' ";
		} else if(isset($_GET["precio-min"]) && isset($_GET["precio-max"])){	//o ambos rangos de precio
			$filtro_precio = " AND t1.precio BETWEEN '".$_GET["precio-min"]."' AND '".$_GET["precio-max"]."' ";
		} else {
			$filtro_precio = "";	//Default = NULL
		}
		

		
		$stmt = Conexion::conectar()->prepare("SELECT t1.*, t1.id as t1_id, t2.id as t2_id, t2.categoria as categoria 
		FROM $tabla_1 AS t1, $tabla_2 AS t2 WHERE t1.tipo = t2.id $filtro_estatus $filtro_tipo $filtro_precio ");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#EDITAR HABITACION
	#-------------------------------------

	public static function editar_habitacion($datosModel, $tabla_1, $tabla_2){
		$stmt = Conexion::conectar()->prepare("SELECT t1.*, t1.id as t1_id, t2.id as t2_id, t2.categoria as t2_categoria FROM $tabla_1 AS t1, $tabla_2 AS t2 WHERE t1.id = :id AND t1.tipo = t2.id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR HABITACION
	#-------------------------------------

	public static function actualizar_habitacion($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET piso = :piso, tipo = :tipo, precio = :precio WHERE id = :id");
		$stmt->bindParam(":piso", $datosModel["piso"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}


	#BORRAR HABITACION
	#------------------------------------
	public static function borrar_habitacion($datosModel, $tabla){
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