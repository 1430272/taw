<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REPORTE DE VENTAS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>producto</th>
				<th>precio unitario</th>
				<th>cantidad vendido</th>
				<th>precio * cantidad</th>
				<th>fecha de venta</th>
			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> ver_ventas_ctrl();
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




