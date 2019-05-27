<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Clientes</h1>
                </div>

				<p>El tipo de cliente se calcula dependiendo de su cantidad de reservaciones</p>
				
	<table class="dTables display" style="width:100%">
		<thead>
			<tr>
				<th>Nombre completo</th>
				<th>Email</th>
				<th>Telefono</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vistaUsuario = new ClientesController();
			$vistaUsuario -> mostrar_clientes();
			$vistaUsuario -> borrar_cliente();
			?>
		</tbody>
	</table>

<?php/*
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		Nucleo::Alerta("Cambio exitoso");
	}
}*/ ?>