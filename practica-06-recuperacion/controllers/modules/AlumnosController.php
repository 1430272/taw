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
								      "email"=>$_POST["apellido_materno"],
									  );
			$respuesta = ClientesModel::registrar_cliente($datosController, "practica_06_clientes");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-clientes");
			} else {
				Nucleo::Alerta("Error al registrar");
#				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}
	
	#VISTA DE CLIENTES
	#------------------------------------
	public function mostrar_clientes(){
		$respuesta = ClientesModel::mostrar_clientes("practica_06_clientes");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre_completo"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["telefono"].'</td>
				<td><a href="index.php?action=editar-cliente&id='.$item["id"].'"><button>Editar</button></a> - <a href="index.php?action=lista-clientes&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#EDITAR CLIENTE
	#------------------------------------
	public function editar_cliente(){
		$datosController = $_GET["id"];
		$respuesta = ClientesModel::editar_cliente($datosController, "practica_06_clientes");
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			 <input type="text" value="'.$respuesta["nombre_completo"].'" name="nombre_completo" required>
			 <input type="email" value="'.$respuesta["email"].'" name="email" required>
			 <input type="text" value="'.$respuesta["telefono"].'" name="telefono" required>
			 <input type="submit" value="Actualizar">';
	}

	#Cliente por ID
	#------------------------------------
	public static function cliente_por_id($idc){
		$datosController = $idc;
		$respuesta = ClientesModel::editar_cliente($datosController, "practica_06_clientes");
		return $respuesta["nombre_completo"];
	}


	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizar_cliente(){
		if(isset($_POST["nombre_completo"])){
			$datosController = array( "id"=>$_POST["id"],
							          "nombre_completo"=>$_POST["nombre_completo"],
				                      "email"=>$_POST["email"],
				                      "telefono"=>$_POST["telefono"]);
			$respuesta = ClientesModel::actualizar_cliente($datosController, "practica_06_clientes");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-clientes");
			} else{
				Nucleo::Alerta("Error");
			}
		}
	}

	
	#BORRAR CLIENTE
	#------------------------------------
	public static function borrar_cliente(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = ClientesModel::borrar_cliente($datosController, "practica_06_clientes");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-clientes");
			}
		}
	}

}