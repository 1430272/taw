<?php Class ProfesoresController {
	
	#REGISTRO DE CLIENTES
	#------------------------------------
	public function registrar_profesor(){
		if(isset($_POST["no_empleado"])){	//con que se mande cualquier campo, no importa cual sea
			$datosController = array( "no_empleado"=>$_POST["no_empleado"], 
								      "id_carrera"=>$_POST["id_carrera"],
								      "nombre"=>$_POST["nombre"],
								      "apellido_paterno"=>$_POST["apellido_paterno"],
								      "apellido_materno"=>$_POST["apellido_materno"],
								      "email"=>$_POST["email"],
									  );
			$respuesta = ProfesoresModel::registrar_profesor($datosController, "practica_06_recuperacion_profesores");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-profesores");
			} else {
				Nucleo::Alerta("Error al registrar");
#				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}
	
	#VISTA DE CLIENTES
	#------------------------------------
	public function mostrar_profesores(){
		$respuesta = ProfesoresModel::mostrar_profesores("practica_06_recuperacion_profesores");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["no_empleado"].'</td>
				<td>'.$item["id_carrera"].'</td>
				<td>'.$item["nombre"].' '.$item["apellido_paterno"].' '.$item["apellido_materno"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar-profesor&id='.$item["id"].'"><button>Editar</button></a> - <a href="index.php?action=lista-profesores&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#EDITAR CLIENTE
	#------------------------------------
	public function editar_profesor(){
		$datosController = $_GET["id"];
		$respuesta = ProfesoresModel::editar_profesor($datosController, "practica_06_recuperacion_profesores");
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			 <input type="text" value="'.$respuesta["no_empleado"].'" name="no_empleado" required>
			 <input type="text" value="'.$respuesta["id_carrera"].'" name="id_carrera" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombre" required>
			 <input type="text" value="'.$respuesta["apellido_paterno"].'" name="apellido_paterno" required>
			 <input type="text" value="'.$respuesta["apellido_materno"].'" name="apellido_materno" required>
			 <input type="email" value="'.$respuesta["email"].'" name="email" required>
			 <input type="submit" value="Actualizar">';
	}

	#Cliente por ID	// Como se llama el alumno que tiene esta ID
	#------------------------------------
	public static function profesor_por_id($idc){
		$datosController = $idc;
		$respuesta = ProfesoresModel::editar_profesor($datosController, "practica_06_recuperacion_profesores");
		return $respuesta["nombre"].' '.$respuesta["apellido_paterno"].' '.$respuesta["apellido_materno"];
	}


	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizar_profesor(){
		if(isset($_POST["no_empleado"])){
			$datosController = array( "id"=>$_POST["id"],
				                      "no_empleado"=>$_POST["no_empleado"],
				                      "id_carrera"=>$_POST["id_carrera"],
							          "nombre"=>$_POST["nombre"],
							          "apellido_paterno"=>$_POST["apellido_paterno"],
							          "apellido_materno"=>$_POST["apellido_materno"],
				                      "email"=>$_POST["email"]);
			$respuesta = ProfesoresModel::actualizar_profesor($datosController, "practica_06_recuperacion_profesores");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-profesores");
			} else {
				Nucleo::Alerta("Error");
			}
		}
	}

	
	#BORRAR CLIENTE
	#------------------------------------
	public static function borrar_profesor(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = ProfesoresModel::borrar_profesor($datosController, "practica_06_recuperacion_profesores");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-profesores");
			}
		}
	}

}