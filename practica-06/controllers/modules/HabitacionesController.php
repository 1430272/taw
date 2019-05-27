<?php Class HabitacionesController {
	
	#REGISTRO DE HABITACIONES
	#------------------------------------
	public function registrar_habitacion(){
		if(isset($_POST["piso"])){
			$datosController = array( "piso"=>$_POST["piso"], 
								      "tipo"=>$_POST["tipo"],
								      "precio"=>$_POST["precio"]
									  );
			$respuesta = HabitacionesModel::registrar_habitacion($datosController, "practica_06_habitaciones");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-habitaciones");
			} else {
				Nucleo::Alerta("Error al registrar");
#				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}
	
	#VISTA DE HABITACIONES
	#------------------------------------
	public function mostrar_habitaciones(){
		$respuesta = HabitacionesModel::mostrar_habitaciones("practica_06_habitaciones","practica_06_tipo_habitaciones");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
			
			if($item["estatus"]==0){	//Si la habitacion esta disponible -> mostrar boton
				$boton_reserva = '<a href="index.php?action=hacer-reservacion&id='.$item["id"].'"><button>RESERVAR</button></a>';
			} else {
				$boton_reserva = "[Habitacion ocupada]";
			}
			
		echo'<tr>
				<td>'.$item["piso"].'</td>
				<td>'.$item["categoria"].'</td>
				<td>$'.$item["precio"].'</td>
				<td><a href="index.php?action=ver-fotos&id='.$item["id"].'"><button>Ver fotos</button></a> - 
					<a href="index.php?action=editar-habitacion&id='.$item["id"].'"><button>Editar</button></a> - 
					<a href="index.php?action=lista-habitaciones&idBorrar='.$item["id"].'"><button>Borrar</button></a> - 
					'.$boton_reserva.'</td>
			</tr>';
		}
	}


	#EDITAR HABITACION
	#------------------------------------
	public function editar_habitacion(){
		$datosController = $_GET["id"];
		$respuesta = HabitacionesModel::editar_habitacion($datosController, "practica_06_habitaciones", "practica_06_tipo_habitaciones");
		
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			 <input type="text" value="'.$respuesta["piso"].'" name="piso" required>';
					global $tipo_habitacion; $tipo_habitacion = $respuesta["tipo"];	TipoHabitacionesController::mostrar_tipo_habitaciones();
		echo'<input type="text" value="'.$respuesta["precio"].'" name="precio" required>
			 <input type="submit" value="Actualizar">';
	}

	#VER_precio individual //Para pagar la reservacion
	#------------------------------------
	public function obtener_precio(){
		$datosController = $_GET["id"];
		$respuesta = HabitacionesModel::editar_habitacion($datosController, "practica_06_habitaciones", "practica_06_tipo_habitaciones");
		return $respuesta["precio"];
	}


	#ACTUALIZAR HABITACION
	#------------------------------------
	public function actualizar_habitacion(){
		if(isset($_POST["piso"])){
			$datosController = array( "id"=>$_POST["id"],
							          "piso"=>$_POST["piso"],
				                      "tipo"=>$_POST["tipo"],
				                      "precio"=>$_POST["precio"]);
			$respuesta = HabitacionesModel::actualizar_habitacion($datosController, "practica_06_habitaciones");
			if($respuesta == "success"){
				Nucleo::Alerta("Guardado");
				Nucleo::Redirigir("lista-habitaciones");
			} else{
				Nucleo::Alerta("Error");
			}
		}
	}
	
	#DESOCUPAR HABITACION - al borrar reservacion
	#------------------------------------
	public static function estatus_desocupar($idh){
			$datosController = array( "id"=>$idh,
							          "estatus"=>"0");
			$respuesta = HabitacionesModel::estatus_desocupar($datosController, "practica_06_habitaciones");
	}

	#OCUPAR HABITACION - al reservar
	#------------------------------------
	public static function estatus_ocupar($idh){
			$datosController = array( "id"=>$idh,
							          "estatus"=>"1");
			$respuesta = HabitacionesModel::estatus_ocupar($datosController, "practica_06_habitaciones");
	}
	

	
	#BORRAR HABITACION
	#------------------------------------
	public static function borrar_habitacion(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = HabitacionesModel::borrar_habitacion($datosController, "practica_06_habitaciones");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-habitaciones");
			}
		}
	}

}