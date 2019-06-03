<?php Class AlumnosController {
	
	#REGISTRO DE CLIENTES
	#------------------------------------
	public function registrar_alumno(){
		if(isset($_POST["matricula"])){	//con que se mande cualquier campo, no importa cual sea
			$datosController = array( "matricula"=>$_POST["matricula"], 
								      "id_carrera"=>$_POST["id_carrera"],
								      "nombre"=>$_POST["nombre"],
								      "apellido_paterno"=>$_POST["apellido_paterno"],
								      "apellido_materno"=>$_POST["apellido_materno"],
								      "email"=>$_POST["email"],
									  );
			$respuesta = AlumnosModel::registrar_alumno($datosController, "practica_07_alumnos");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-alumnos");
			} else {
				Nucleo::Alerta("Error al registrar");
#				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}
	
	#VISTA DE CLIENTES
	#------------------------------------
	public function mostrar_alumnos(){
		$respuesta = AlumnosModel::mostrar_alumnos("practica_07_alumnos");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["id_carrera"].'</td>
				<td>'.$item["nombre"].' '.$item["apellido_paterno"].' '.$item["apellido_materno"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar-alumno&id='.$item["id"].'"><button>Editar</button></a> - <a href="index.php?action=lista-alumnos&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#EDITAR CLIENTE
	#------------------------------------
	public function editar_alumno(){
		$datosController = $_GET["id"];
		$respuesta = AlumnosModel::editar_alumno($datosController, "practica_07_alumnos");
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			 <input type="text" value="'.$respuesta["matricula"].'" name="matricula" required>
			 <input type="text" value="'.$respuesta["id_carrera"].'" name="id_carrera" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombre" required>
			 <input type="text" value="'.$respuesta["apellido_paterno"].'" name="apellido_paterno" required>
			 <input type="text" value="'.$respuesta["apellido_materno"].'" name="apellido_materno" required>
			 <input type="email" value="'.$respuesta["email"].'" name="email" required>
			 <input type="submit" value="Actualizar">';
	}

	#Cliente por ID	// Como se llama el alumno que tiene esta ID
	#------------------------------------
	public static function alumno_por_id($idc){
		$datosController = $idc;
		$respuesta = AlumnosModel::editar_alumno($datosController, "practica_07_alumnos");
		return $respuesta["nombre"].' '.$respuesta["apellido_paterno"].' '.$respuesta["apellido_materno"];
	}


	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizar_alumno(){
		if(isset($_POST["matricula"])){
			$datosController = array( "id"=>$_POST["id"],
				                      "matricula"=>$_POST["matricula"],
				                      "id_carrera"=>$_POST["id_carrera"],
							          "nombre"=>$_POST["nombre"],
							          "apellido_paterno"=>$_POST["apellido_paterno"],
							          "apellido_materno"=>$_POST["apellido_materno"],
				                      "email"=>$_POST["email"]);
			$respuesta = AlumnosModel::actualizar_alumno($datosController, "practica_07_alumnos");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-alumnos");
			} else {
				Nucleo::Alerta("Error");
			}
		}
	}

	
	#BORRAR CLIENTE
	#------------------------------------
	public static function borrar_alumno(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = AlumnosModel::borrar_alumno($datosController, "practica_06_recuperacion_alumnos");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-alumnos");
			}
		}
	}

}