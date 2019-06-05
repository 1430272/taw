<?php Class CarrerasController {
	
	#Cliente por ID	// Como se llama el alumno que tiene esta ID
	#------------------------------------
	public static function carrera_por_id($idc){
		$datosController = $idc;
		$respuesta = carrerasModel::carrera_por_id($datosController, "practica_07_carreras");
		return $respuesta["acronimo"];
	}

}