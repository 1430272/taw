<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

<h1>EDITAR MATERIA</h1>

<form method="post">
	<?php
	$editarUsuario = new MateriasController();
	$editarUsuario -> editar_materia();
	$editarUsuario -> actualizar_materia();
	?>
</form>
