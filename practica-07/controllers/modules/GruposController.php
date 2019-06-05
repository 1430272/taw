<?php Class GruposController {
	
	#REGISTRO DE grupos
	#------------------------------------
	public function registrar_grupo(){
		if(isset($_POST["id_materia"])){	//con que se mande cualquier campo, no importa cual sea
			$datosController = array( "id_carrera"=>$_POST["id_carrera"], 
								      "id_materia"=>$_POST["id_materia"],
									  "id_profesor"=>$_POST["id_profesor"]
									);
			$respuesta = GruposModel::registrar_grupo($datosController, "practica_07_grupos");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-grupos");
			} else {
				Nucleo::Alerta("Error al registrar");
#				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}
	
	#VISTA DE grupos
	#------------------------------------
	public function mostrar_grupos(){
		$respuesta = GruposModel::mostrar_grupos("practica_07_grupos");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.CarrerasController::carrera_por_id($item["id_carrera"]).'</td>
				<td>'.MateriasController::materia_por_id($item["id_materia"]).'</td>
				<td>'.ProfesoresController::profesor_por_id($item["id_profesor"]).'</td>
				<td><a href="index.php?action=editar-grupo&id='.$item["id"].'"><button>Editar</button></a> - <a href="index.php?action=lista-grupos&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#EDITAR materia
	#------------------------------------
	public function editar_grupo(){
		$datosController = $_GET["id"];
		$respuesta = GruposModel::editar_grupo($datosController, "practica_07_grupos");
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			 <input type="text" value="'.$respuesta["id_carrera"].'" name="id_carrera" required>
			 <input type="text" value="'.$respuesta["id_materia"].'" name="id_materia" required>
			 <input type="text" value="'.$respuesta["id_profesor"].'" name="id_profesor" required>
			 <input type="submit" value="Actualizar">';
	}

	#Cliente por ID	// Como se llama el alumno que tiene esta ID para imprimir los nombres de varios id
	#------------------------------------
	/*public static function alumno_por_id($idc){
		$datosController = $idc;
		$respuesta = AlumnosModel::editar_alumno($datosController, "practica_07_alumnos");
		return $respuesta["nombre"].' '.$respuesta["apellido_paterno"].' '.$respuesta["apellido_materno"];
	}*/


	#ACTUALIZAR materia
	#------------------------------------
	public function actualizar_grupo(){
		if(isset($_POST["id_materia"])){
			$datosController = array( "id"=>$_POST["id"],
				                      "id_carrera"=>$_POST["id_carrera"],
				                      "id_materia"=>$_POST["id_materia"],
				                      "id_profesor"=>$_POST["id_profesor"]);
			$respuesta = GruposModel::actualizar_grupo($datosController, "practica_07_grupos");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-grupos");
			} else {
				Nucleo::Alerta("Error");
			}
		}
	}

	
	#BORRAR MATERIA
	#------------------------------------
	public static function borrar_grupo(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = GruposModel::borrar_grupo($datosController, "practica_07_grupos");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-grupos");
			}
		}
	}

}