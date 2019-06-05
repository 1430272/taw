<?php Class MateriasController {
	
	#REGISTRO DE materias
	#------------------------------------
	public function registrar_materia(){
		if(isset($_POST["clave"])){	//con que se mande cualquier campo, no importa cual sea
			$datosController = array( "clave"=>$_POST["clave"], 
								      "nombre"=>$_POST["nombre"]);
			$respuesta = MateriasModel::registrar_materia($datosController, "practica_07_materias");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-materias");
			} else {
				Nucleo::Alerta("Error al registrar");
#				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}
	
	#VISTA DE materia
	#------------------------------------
	public function mostrar_materias(){
		$respuesta = MateriasModel::mostrar_materias("practica_07_materias");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["clave"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><a href="index.php?action=editar-materia&id='.$item["id"].'"><button>Editar</button></a> - <a href="index.php?action=lista-materias&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#EDITAR materia
	#------------------------------------
	public function editar_materia(){
		$datosController = $_GET["id"];
		$respuesta = MateriasModel::editar_materia($datosController, "practica_07_materias");
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			 <input type="text" value="'.$respuesta["clave"].'" name="clave" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombre" required>
			 <input type="submit" value="Actualizar">';
	}

	#Cliente por ID	// Como se llama el alumno que tiene esta ID para imprimir los nombres de varios id
	#------------------------------------
	public static function materia_por_id($idc){
		$datosController = $idc;
		$respuesta = AlumnosModel::editar_alumno($datosController, "practica_07_alumnos");
		return $respuesta["nombre"];
	}


	#ACTUALIZAR materia
	#------------------------------------
	public function actualizar_materia(){
		if(isset($_POST["clave"])){
			$datosController = array( "id"=>$_POST["id"],
				                      "clave"=>$_POST["clave"],
				                      "nombre"=>$_POST["nombre"]);
			$respuesta = MateriasModel::actualizar_materia($datosController, "practica_07_materias");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-materias");
			} else {
				Nucleo::Alerta("Error");
			}
		}
	}

	
	#BORRAR MATERIA
	#------------------------------------
	public static function borrar_materia(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = MateriasModel::borrar_materia($datosController, "practica_07_materias");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-materias");
			}
		}
	}

}