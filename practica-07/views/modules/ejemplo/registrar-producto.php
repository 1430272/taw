<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRAR PRODUCTO</h1>

	<form method="post">
		
		<input type="text" placeholder="nombre" name="nombre" required>

		<input type="text" placeholder="precio" name="precio" required>

		<input type="submit" value="Enviar">

	</form>

<?php

$ingreso = new MvcController();
$ingreso -> registrar_productos_ctrl();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>



