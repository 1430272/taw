<?php Class FotosController {
	
	#VISTA DE HABITACIONES
	#------------------------------------
	public static function ver_fotos(){
		$datosController = $_GET["id"];
		$respuesta = FotosModel::ver_fotos($datosController, "practica_06_habitaciones_img");
	}
} ?>