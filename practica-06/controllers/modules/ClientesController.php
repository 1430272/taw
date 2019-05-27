<?php Class ClientesController {
	
	#REGISTRO DE CLIENTES
	#------------------------------------
	public function registrar_cliente(){
		if(isset($_POST["nombre_completo"])){
			$datosController = array( "nombre_completo"=>$_POST["nombre_completo"], 
								      "email"=>$_POST["email"],
								      "telefono"=>$_POST["telefono"]
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