<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

<h1>EDITAR ALUMNO</h1>

<form method="post">
	<?php
	$editarUsuario = new AlumnosController();
	$editarUsuario -> editar_alumno();
	$editarUsuario -> actualizar_alumno();
	?>
</form>
