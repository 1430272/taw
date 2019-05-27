<?php Class ReservacionesController {
	
	#Hacer reservaciones
	#------------------------------------
	public function hacer_reservacion(){
		if(isset($_POST["id_cliente"])){
			$datosController = array( "fecha_inicio"=>$_POST["fecha_inicio"], 
								      "fecha_fin"=>$_POST["fecha_fin"],
								      "id_cliente"=>$_POST["id_cliente"],
								      "id_habitacion"=>$_POST["id_habitacion"],
								      "monto_pagado"=>$_POST["monto_pagado"],
								      "fecha_registro"=>$_POST["fecha_registro"]
									  );
			$respuesta = ReservacionesModel::hacer_reservacion($datosController, "practica_06_reservaciones");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-reservaciones");
			} else {
				Nucleo::Alerta("Error al registrar");
#				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}
	
	#VISTA DE CLIENTES
	#------------------------------------
	public function mostrar_reservaciones(){
					$cliente = new ClientesController();
		
		$respuesta = ReservacionesModel::mostrar_reservaciones("practica_06_reservaciones");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
			//cliente_nombre es alias de una relacion para no mostrar su ID
		echo'<tr>
				<td>'.$item["fecha_inicio"].'</td>
				<td>'.$item["fecha_fin"].'</td>
				<td>'.$cliente -> cliente_por_id($item["id_cliente"]).'</td>
				<td>'.$item["id_habitacion"].'</td>
				<td>'.$item["monto_pagado"].'</td>
				<td>'.$item["fecha_registro"].'</td>
				<td><a href="index.php?action=editar-reservacion&id='.$item["id"].'"><button>Editar</button></a> - <a href="index.php?action=lista-reservaciones&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#EDITAR CLIENTE
	#------------------------------------
	public function editar_reservacion(){
		$datosController = $_GET["id"];
		$respuesta = ReservacionesModel::editar_reservacion($datosController, "practica_06_reservaciones");
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			 <input type="text" value="'.$respuesta["nombre_completo"].'" name="nombre_completo" required>
			 <input type="email" value="'.$respuesta["email"].'" name="email" required>
			 <input type="text" value="'.$respuesta["telefono"].'" name="telefono" required>
			 <input type="submit" value="Actualizar">';
	}


	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizar_reservacion(){
		if(isset($_POST["nombre_completo"])){
			$datosController = array( "id"=>$_POST["id"],
							          "nombre_completo"=>$_POST["nombre_completo"],
				                      "email"=>$_POST["email"],
				                      "telefono"=>$_POST["telefono"]);
			$respuesta = ReservacionesModel::actualizar_reservacion($datosController, "practica_06_reservaciones");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-reservaciones");
			} else{
				Nucleo::Alerta("Error");
			}
		}
	}

	
	#BORRAR CLIENTE
	#------------------------------------
	public static function borrar_reservacion(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = ReservacionesModel::borrar_reservacion($datosController, "practica_06_reservaciones");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-reservaciones");
			}
		}
	}

}