<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Profesores</h1>
                </div>
				
	<table class="dTables display" style="width:100%">
		<thead>
			<tr>
				<th>#No empleado</th>
				<th>ID carrera</th>
				<th>Nombre completo</th>
				<th>Email</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vistaUsuario = new ProfesoresController();
			$vistaUsuario -> mostrar_profefores();
			$vistaUsuario -> borrar_profesor();
			?>
		</tbody>
	</table>

<?php/*
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		Nucleo::Alerta("Cambio exitoso");
	}
}*/ ?>