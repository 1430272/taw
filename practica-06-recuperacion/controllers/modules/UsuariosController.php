<?php Class UsuariosController {
	
	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){
		if(isset($_POST["usuarioRegistro"])){
			$datosController = array( "username"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      //"email"=>$_POST["emailRegistro"]
									  );
			$respuesta = UsuariosModel::registroUsuarioModel($datosController, "practica_05_users");
			if($respuesta == "success"){
				Nucleo::Redirigir("lista-usuarios");
			} else {
				Nucleo::Alerta("Error al registrar");
				Nucleo::Redirigir("");	//Ir a index
			}
		}
	}


	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){
		if(isset($_POST["username"])){
			$datosController = array( "username"=>$_POST["username"], 
								      "password"=>$_POST["password"]);
			$respuesta = UsuariosModel::ingresoUsuarioModel($datosController, "practica_05_users");
			if($respuesta["username"] == $_POST["username"] && $respuesta["password"] == md5($_POST["password"])){
				session_start();
				$_SESSION["validar"] = true;
				Nucleo::Redirigir("dashboard");	//Mandamos a la vista de usuarios
			} else {
							Nucleo::Alerta("Los datos de ingreso no coinciden o el usuario no existe");
				#echo '<script>alert("'.$respuesta["password"].'");</script>';
				#header("location:index.php?action=fallo");
			}
		}
	}

	
	#VISTA DE USUARIOS
	#------------------------------------
	public function vistaUsuariosController(){
		$respuesta = UsuariosModel::vistaUsuariosModel("practica_05_users");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["username"].'</td>
				<td>'.$item["password"].'</td>
				<td><a href="index.php?action=editar-usuario&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=lista-usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#EDITAR USUARIO
	#------------------------------------
	public function editarUsuarioController(){
		$datosController = $_GET["id"];
		$respuesta = UsuariosModel::editarUsuarioModel($datosController, "usuarios");
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
			 <input type="submit" value="Actualizar">';
	}


	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){
		if(isset($_POST["usuarioEditar"])){
			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			$respuesta = UsuariosModel::actualizarUsuarioModel($datosController, "usuarios");
			if($respuesta == "success"){
				Nucleo::Redirigir("cambio");
			} else{
				Nucleo::Alerta("Error");
			}
		}
	}

	
	#BORRAR USUARIO
	#------------------------------------
	public static function borrarUsuarioController(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = UsuariosModel::borrarUsuarioModel($datosController, "usuarios");
			if($respuesta == "success"){
				Nucleo::Redirigir("usuarios");
			}
		}
	}
	
	#Cerrar sesion, borre la vista salir.php porque me parece inecesaria asi que ahora destruye la sesion y solo redirige al login}
	public static function salir(){
		session_start();
		session_destroy();
		Nucleo::Redirigir("ingresar-usuario");
		#Nucleo::Redirigir(5);
	}
}