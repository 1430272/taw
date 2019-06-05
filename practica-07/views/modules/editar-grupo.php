<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

<h1>EDITAR GRUPO</h1>

<form method="post">
	<?php
	$editarUsuario = new GruposController();
	$editarUsuario -> editar_grupo();
	$editarUsuario -> actualizar_grupo();
	?>
</form>
