<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

<h1>EDITAR HABITACION</h1>

<form method="post">
	
	<?php

	$editarUsuario = new HabitacionesController();
	$editarUsuario -> editar_habitacion();
	$editarUsuario -> actualizar_habitacion();

	?>

</form>
