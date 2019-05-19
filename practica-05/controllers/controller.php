<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "username"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      //"email"=>$_POST["emailRegistro"]
									  );

			$respuesta = Datos::registroUsuarioModel($datosController, "practica_05_users");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{
				echo '<script>alert("error");</script>';
				header("location:index.php");
			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "username"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "practica_05_users");

			if($respuesta["username"] == $_POST["usuarioIngreso"] && $respuesta["password"] == md5($_POST["passwordIngreso"])
				){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");

			}

			else{
				echo '<script>alert("'.$respuesta["password"].'");</script>';
				#header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("practica_05_users");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["username"].'</td>
				<td>'.$item["password"].'</td>

				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

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
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	
	//productos
	public static function registrar_productos_ctrl(){
		if(isset($_POST["nombre"])){
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "precio"=>$_POST["precio"],
									  );
			$respuesta = Datos::registrar_productos_model($datosController, "practica_05_productos");
			if($respuesta == "success"){
				echo '<script>alert("guardado");</script>';
				header("location:index.php?action=productos");
				exit();
			}
			else{
				echo '<script>alert("error");</script>';
				//header("location:index.php");
			}
		}
	}

	public static function ver_productos_ctrl(){
		$respuesta = Datos::ver_productos_model("practica_05_productos");
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>$'.$item["precio"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a> - <a href="index.php?action=productos&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}

	public static function vender_productos_ctrl(){
		if(isset($_POST["producto_id"])){
			$datosController = array( "producto_id"=>$_POST["producto_id"], 
								      "cantidad"=>$_POST["cantidad"],
									  );
			$respuesta = Datos::venderModel($datosController, "practica_05_ventas");
			if($respuesta == "success"){
				echo '<script>alert("vendido");</script>';
				header("location:index.php?action=ventas");
				exit();
			}
			else{
				echo '<script>alert("error");</script>';
				//header("location:index.php");
			}
		}
	}
	
	
	public static function ver_ventas_ctrl(){
						//stats
						$cantidad_total_vendidos = "";
						$total = "";
		
		$respuesta = Datos::ver_ventas_model("practica_05_ventas","practica_05_productos");
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["precio"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td>'.$item["precio"] * $item["cantidad"].'</td>
				<td>'.$item["fecha"].'</td>
			</tr>';
							$cantidad_total_vendidos += $item['cantidad'];	//Sumatoria de cantidad de productos vendidos
							$total += $item['precio']*$item['cantidad']; //Aqui sumo los precios*canitdad, osea el monto de cada venta	
		}
		echo '<tfoot>
			<tr><td colspan="2">Total vendidos</td><td colspan="1">'.$cantidad_total_vendidos.'<td colspan="1"></td></tr>
			<tr><td colspan="2">Total $</td><td colspan="1"><b></b><td colspan="1">'.$total.'</td></tr>
			</tfoot>';
	}

}

?>