<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Reservaciones</h1>
                </div>

				<p>Las reservaciones se hacen desde la lista de habitaciones al presionar el boton de "reservar"</p>
				
	<table class="dTables display" style="width:100%">
		<thead>
			<tr>
				<th>Fecha inicial</th>
				<th>Fecha final</th>
				<th>Cliente</th>
				<th>Habitacion ID</th>
				<th>Total pagado</th>
				<th>Fecha de registro</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vistaUsuario = new ReservacionesController();
			$vistaUsuario -> mostrar_reservaciones();
			$vistaUsuario -> borrar_reservacion();
			?>
		</tbody>
	</table>

<?php/*
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		Nucleo::Alerta("Cambio exitoso");
	}
}*/ ?>