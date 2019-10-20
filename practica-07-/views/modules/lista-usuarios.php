<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Usuarios</h1>
                </div>

	<table class="dTables display" style="width:100%">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vistaUsuario = new UsuariosController();
			$vistaUsuario -> vistaUsuariosController();
			$vistaUsuario -> borrarUsuarioController();
			?>
		</tbody>
	</table>

<?php
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		Nucleo::Alerta("Cambio exitoso");
	}
} ?>