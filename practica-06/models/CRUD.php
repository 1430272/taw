<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

//Antes Datos, ahora CRUD. Un modelo por modulo, todos los modelos de cada modulo se inicializan desde Nucleo (antes clase llamada "MvcController")
//Para no dejar este modelo vacio, decidi incluir metodos para CRUDS rapidos de llamar

/*	## Parametros
 * $table = Nombre de la tabla (Obviamente)
 * $value = Array de campos para insertar, actualizar
 * $filter= Array de campos para clausula WHERE
 */

 #Sigue en desarrollo, No utilizar

include_once "Conexion.php";

class CRUD extends Conexion {

	#Insertar 
	public static function create_record($table, $values=array()){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (username, password) VALUES (:username,:password)");
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", md5($datosModel["password"]), PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt->close();
	}

	#Leer
	public static function read_record($table, $filter=array()){
		
	}

	#Actualizar
	public static function update_record($table, $values=array(), $filter=array()){
		
	}

	#Borrar
	public static function delete_record($table, $filter=array()){
		
	}

	#Buscar	
	public static function find_record($table, $filter=array()){
		
	}

	//Estadisticas para el Dashboard, hace un conteo de registros de cada modulo, recive por parametro el nombre de tabla y retorna el total
	public static function estadistica($table,$field,$value){

		if($field!==NULL || $value!==NULL){
			$stmt_q = "SELECT COUNT(*) AS count_total FROM {$table} WHERE {$field} = '{$value}' ";
		} else {
			$stmt_q = "SELECT COUNT(*) AS count_total FROM {$table} ";		
		}
	
		$stmt = Conexion::conectar()->prepare($stmt_q);
		$stmt->execute();
/*		if($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
	*/	
		$results = $stmt->fetchall();
		$getCount = $results[0]['count_total'];
		return $getCount;
		
#		$stmt->close();
	}
	
	#CRUD
	//No me parece correcto que el fichero crud.php tenga todos los modelos de cada modulo revueltos en uno solo
	//En su lugar el directorio "models", tendra solo los modelos pero desde ete metodo se eligira el que se desee segun la action en la URL
	public static function init_all_models(){
		foreach(glob("models/modules/*.php") as $filename){
			require_once $filename;
		}
	}

} ?>