<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Habitaciones</h1>
                </div>
				<hr>

				<div class="col-lg-12">
					<div style="border:1px solid; width:100%; padding:10px; text-align:center; margin: 20px;"><label>Filtros</label>
						Tipos
						
						<table>
							  <tr>
								<th>Tipos de habitacion: </th>
								<td><a href="index.php?action=lista-habitaciones&filtrar-tipo=1">Simple</a> / <a href="index.php?action=lista-habitaciones&filtrar-tipo=2">Doble</a> / <a href="index.php?action=lista-habitaciones&filtrar-tipo=3">Matrimonial</a></td>
							  </tr>
							  <tr>
								<th>Estatus de la habitacion: </th>
								<td><a href="index.php?action=lista-habitaciones&filtrar-disponibilidad=1">ocupado</a> / <a href="index.php?action=lista-habitaciones&filtrar-disponibilidad=0">desocupado</a><br>&nbsp;</td>
							  </tr>
							  <tr>
								<th>Rango de precios: </th>
								<td>
									<form  action="index.php?action=lista-habitaciones" method="post">
										<input type="text" name="precio-min" placeholder="desde $">
										<input type="text" name="precio-max" placeholder="hasta $">
										<input type="submit" hidden>
									</form>
									PD. el form no funciono pero se puede filtrar con los parametros <br> "precio-min" y/o "precio-max" en la URL, ejemplo:
									<br><a href="index.php?action=lista-habitaciones&precio-max=200">Hasta $200</a> - 
									<a href="index.php?action=lista-habitaciones&precio-min=200">Desde $200</a> - 
									<a href="index.php?action=lista-habitaciones&precio-min=200&precio-max=300">Entre $200 y $300</a>
								</td>
							  </tr>
						</table>
						
					</div>
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