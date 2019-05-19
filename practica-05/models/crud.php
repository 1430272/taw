<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

#		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario,:password,:email)");	
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (username, password) VALUES (:username,:password)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", md5($datosModel["password"]), PDO::PARAM_STR);
#		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT username,password FROM $tabla WHERE username = :username AND password = :password");
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", md5($datosModel["password"]), PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA USUARIOS
	#-------------------------------------

	public static function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public static function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	
	
	
	
	#VISTA productos
	#-------------------------------------
	public static function registrar_productos_model($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
		(nombre, precio) 
		VALUES (:nombre, :precio)");	
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

}

?>