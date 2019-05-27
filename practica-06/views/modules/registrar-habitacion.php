<h1>REGISTRO DE HABITACION</h1>

<form method="post">
	<input type="text" placeholder="Piso" name="piso" required>
<?php
$tipo = new TipoHabitacionesController();
$tipo -> mostrar_tipo_habitaciones();
?>
	<input type="text" placeholder="Precio" name="precio" required>
	<input type="submit" value="Enviar">

</form>

<?php

$registro = new HabitacionesController();
$registro -> registrar_habitacion();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		Nucleo::Alerta("Registro Exitoso");
	}
}

?>
