<h1>REGISTRO DE CLIENTE</h1>

<form method="post">
	<input type="date" placeholder="Fecha inicio" name="fecha_inicio" required>
	<input type="date" placeholder="Fecha fin" name="fecha_fin" required>
	<input type="text" placeholder="ID Cliente" name="id_cliente" required>
	<input type="text" value="<?php if(isset($_GET["id"])){ echo $_GET["id"]; } ?>" name="id_habitacion" hidden>
	<input type="text" value="<?php date("m"); ?>" name="fecha_registro" hidden>
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
