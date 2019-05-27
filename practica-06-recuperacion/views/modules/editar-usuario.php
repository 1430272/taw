<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

<h1>EDITAR USUARIO (pendiente)</h1>

<form method="post">
	
	<?php

	$editarUsuario = new UsuariosController();	//Antes MvcController() [ahora nucleo] pero ya se pusieron cada ctrlr en clases individuales
	$editarUsuario -> editar_usuario();
	$editarUsuario -> actualizar_usuario();

	?>

</form>
