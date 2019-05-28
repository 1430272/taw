<h1>REGISTRO DE ALUMNO</h1>

<form method="post">
	<input type="text" placeholder="Matricula" name="matricula" required>
	<input type="text" placeholder="ID carrera" name="id_carrera" required>
	<input type="text" placeholder="Nombre completo" name="nombre" required>
	<input type="text" placeholder="Apellido paterno" name="apellido_paterno" required>
	<input type="text" placeholder="Apellido materno " name="apellido_materno" required>
	<input type="email" placeholder="email" name="email" required>
	<input type="submit" value="Enviar">

</form>

<?php

$registro = new AlumnosController();
$registro -> registrar_alumno();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		Nucleo::Alerta("Registro Exitoso");
	}
}

?>
