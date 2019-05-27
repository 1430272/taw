<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

<h1>EDITAR PROFESOR</h1>

<form method="post">
	<?php
	$editarUsuario = new ProfesorController();
	$editarUsuario -> editar_profesor();
	$editarUsuario -> actualizar_profesor();
	?>
</form>
