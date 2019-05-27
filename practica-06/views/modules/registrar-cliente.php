<h1>REGISTRO DE CLIENTE</h1>

<form method="post">
	<input type="text" placeholder="Nombre completo" name="nombre_completo" required>
	<input type="email" placeholder="email" name="email" required>
	<input type="telefono" placeholder="telefono" name="telefono" required>
	<input type="submit" value="Enviar">

</form>

<?php

$registro = new ClientesController();
$registro -> registrar_cliente();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		Nucleo::Alerta("Registro Exitoso");
	}
}

?>
