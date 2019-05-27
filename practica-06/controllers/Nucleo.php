<?php
ob_start();
class Nucleo {
	
	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function init_layout(){
		#include "views/template.php";
		
		/* Se incluira el tema configurado como definicion en "index.php".
		 * Cada plantilla de la carpeta "themes" debera contener un fichero llamado "layout.php"
		 */
		include "themes/"._theme_."/layout.php";
		
			if(isset($_GET['action'])  && $_GET['action']=="ingresar-usuario"){ echo view_head(); echo view_login(); echo view_foot(); } else {
				echo view_head(); echo view_general(); echo view_foot();
			}
	}

	#ENLACES
	#-------------------------------------
	public static function enlacesPaginasController(){
		if(isset( $_GET['action'])){
				$enlaces = $_GET['action'];
		} else {
			$enlaces = "dashboard";
		}
		
		if(isset($_GET['action'])  && $_GET['action']=="ingresar-usuario"){ echo view_head(); echo view_login(); echo view_foot(); } else {			
			$respuesta = Enlaces::enlacesPaginasModel($enlaces);
			include $respuesta;
		}
	}

	# INCLUIR LOS DEMAS CONTROLADORES
	public static function init_all_ctrlrs(){
		foreach(glob("controllers/modules/*.php") as $filename){
			require_once $filename;
		}
	}

	/*
	 * Los siguientes metodos estan pensados como un EXTRA para evitar repetir lineas de codigo, como notificar (alertas),
	 * header(location...), o hacer metodos con nombres mas cortos
	 * Para que haga bulto en el controlador principal
	 */
	public static function Ruteador(){
		//El metodo ruteador debera saber que vista debe cargar, es una llamada al metodo de arriba
		//Este metodo se llama dentro de un fichero "layout.php" que se encuentra en cada plantilla
		/* por si el profesor pide diferentes plantillas a lo largo del curso con el mismo MVC */
		return self::enlacesPaginasController();
	}

	#Redireccionar sin escribir todo el "include ..."
	//Si recive un entero se dirigira por default a index.php en SEGUNDOS especificados en el parametro, sino manda a la vista especificada
/*
	public static function Redirigir($vista){
		if(is_int($vista)){
			echo "<script>setTimeout(function(){location.href='index.php'},".$vista.");</script>";
		} else {
			ob_start();
			header('Location: index.php?action='.$vista);
			exit();
		}
	}
*/
	public static function Redirigir($vista){
			ob_start();
			header('Location: index.php?action='.$vista);
			exit();
	}


	public static function Alerta($mensaje=""){
		echo '<script>alert("'.$mensaje.'");</script>';
	}
	
	public static function require_session(){
		//A cado rato veia que en las vistas comprueban la session y usaban header(Loc...)...
		session_start();
		if(!$_SESSION["validar"]){
			return self::Redirigir("ingresar-usuario");	//Si no hay session redirigir a la vista "ingresar-usuario"
		} else {
			#echo view_login();	// error: provoca incluir login en cualquier vista donde se incluya el metodo de require_session
		}
	}

} ?>