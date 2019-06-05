<h1>REGISTRO DE GRUPO</h1>

<form method="post">
	<input type="text" placeholder="id_carrera" name="id_carrera" required>
	<input type="text" placeholder="id_materia" name="id_materia" required>
	<input type="text" placeholder="id_profesor" name="id_profesor" required>
	<input type="submit" value="Enviar">

</form>

<?php

$registro = new GruposController();
$registro -> registrar_grupo();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		Nucleo::Alerta("Registro Exitoso");
	}
}

?>

