<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

<h1>EDITAR CLIENTE</h1>

<form method="post">
	
	<?php

	$editarUsuario = new ClientesController();	//Antes MvcController() [ahora nucleo] pero ya se pusieron cada ctrlr en clases individuales
	$editarUsuario -> editar_cliente();
	$editarUsuario -> actualizar_cliente();

	?>

</form>
