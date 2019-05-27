<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>VENDER</h1>

	<form method="post">
		
		<input type="text" placeholder="ID producto" name="producto_id" required>

		<input type="text" placeholder="cantidad" name="cantidad" required>

		<input type="submit" value="Enviar">

	</form>

<?php

$ingreso = new MvcController();
$ingreso -> vender_productos_ctrl();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>



