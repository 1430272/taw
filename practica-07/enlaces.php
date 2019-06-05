

<?php 
class Enlaces {
	
	/*
	 * Esta clase toma el rol de un "ruteador", pues sabe a donde redirigir segun la peticion en la URL
	 */

	public static function enlacesPaginasModel($enlaces){
		
		
		if(
		
			$enlaces == "registrar-usuario" || 
			$enlaces == "editar-usuario" || 
#			$enlaces == "ingresar-usuario" || #ignoramos esta vista porque ahora el form de login viene el layout.php (antes template.phpd)
			$enlaces == "lista-usuarios" || 
			$enlaces == "dashboard" ||
#			$enlaces == "salir" ||	#ignoramos esta vista porque ahora solo se llama a un metodo que destruye la $_session

			$enlaces == "registrar-profesor" || 
			$enlaces == "editar-profesor" || 
			$enlaces == "lista-profesores" || 

			$enlaces == "registrar-alumno" || 
			$enlaces == "editar-alumno" || 
			$enlaces == "lista-alumnos" ||

			$enlaces == "registrar-materia"||
			$enlaces == "lista-materias"||
			$enlaces == "editar-materia" ||
			
			$enlaces == "registrar-grupo"||
			$enlaces == "lista-grupos"||
			$enlaces == "editar-grupo"

		){
			if($enlaces == "ingresar-usuario"){
				#Nucleo::Redirigir("ingresar-usuario");
			} else {				
				$module =  "views/modules/".$enlaces.".php";
			}
		} else if($enlaces == "index"){
			$module =  "views/modules/dashboard.php";
			Nucleo::require_session();
#			$enlaces = "dashboard";
		}
		 else if($enlaces == "salir"){
			UsuariosController::salir();	//No es necesario una vista, basta con que el controlador cierre la sesion
		} else if($enlaces == "ok"){
			$module =  "views/modules/registro.php";
		} else if($enlaces == "fallo"){
			//$module =  "views/modules/ingresar.php";
			Nucleo::Alerta("fallo");
		} else if($enlaces == "cambio"){
			$module =  "views/modules/lista-usuarios.php";
		} #else {	//Esta es la vista que esta dejando por Default, lo correcto es un index simple de presentacion
			//$module =  "views/modules/ingresar-usuario.php";
			//if(isset($_GET["action"])){ $_GET["action"]= "ingresar-usuario";}
			#Nucleo::Redirigir("ingresar-usuario");
		#}
		return $module;
	}
}
?>