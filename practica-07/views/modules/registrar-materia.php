<h1>REGISTRO DE MATERIA</h1>

<form method="post">
	<input type="text" placeholder="clave" name="clave" required>
	<input type="text" placeholder="nombre" name="nombre" required>
	<input type="submit" value="Enviar">

</form>

<?php

$registro = new MateriasController();
$registro -> registrar_materia();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		Nucleo::Alerta("Registro Exitoso");
	}
}

?>

