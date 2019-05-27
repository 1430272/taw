<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Habitaciones</h1>
                </div>

	<table class="dTables display" style="width:100%">
		<thead>
			<tr>
				<th>Piso</th>
				<th>Tipo</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vistaUsuario = new HabitacionesController();
			$vistaUsuario -> mostrar_habitaciones();
			$vistaUsuario -> borrar_habitacion();
			?>
		</tbody>
	</table>

<?php/*
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		Nucleo::Alerta("Cambio exitoso");
	}
}*/ ?>