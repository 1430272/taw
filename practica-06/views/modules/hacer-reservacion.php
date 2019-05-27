<h1>HACER RESERVACION</h1>

<?php
$precio = new HabitacionesController();
$costo = $precio -> obtener_precio();
?>

<form method="post">
	<input type="date" placeholder="Fecha inicio" name="fecha_inicio" required>
	<input type="date" placeholder="Fecha fin" name="fecha_fin" required>
	<input type="text" placeholder="ID Cliente" name="id_cliente" required>
	<input type="text" value="<?php if(isset($_GET["id"])){ echo $_GET["id"]; } ?>" name="id_habitacion" hidden>
	<input type="text" value="<?php echo $costo; ?>" name="monto_pagado" hidden>
	<input type="text" value="<?php echo date("Y-m-d"); ?>" name="fecha_registro" hidden>
	<input type="submit" value="Enviar">

</form>

<?php

$registro = new ReservacionesController();
$registro -> hacer_reservacion();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		Nucleo::Alerta("Registro Exitoso");
	}
}

?>
