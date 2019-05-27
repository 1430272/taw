<?php Class TipoHabitacionesController {
	
	#VISTA DE HABITACIONES
	#------------------------------------
	public static function mostrar_tipo_habitaciones(){
		$respuesta = TipoHabitacionesModel::mostrar_tipo_habitaciones("practica_06_tipo_habitaciones");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		echo'<select name="tipo" required>';
			echo'<option value="">Seleccionar Tipo</option>';
		foreach($respuesta as $row => $item){
			
				#Por si se edita
				global $tipo_habitacion;
				if(isset($_GET["id"])){	//se esta editando
					if($item["id"] === $tipo_habitacion){
						$selected = 'selected';
					} else {
						$selected = '';
					}
				}
				# / Por si se edita
			
			echo'<option value="'.$item["id"].'" '.$selected.'>'.$item["categoria"].'</option>';
		}
		echo'</select>';
	}

}