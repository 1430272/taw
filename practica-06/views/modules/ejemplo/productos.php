<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>PRODUCTOS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>id</th>
				<th>nombre</th>
				<th>precio unitario</th>
				<th>Acciones</th>
			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> ver_productos_ctrl();
			$vistaUsuario -> borrarUsuarioController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>




