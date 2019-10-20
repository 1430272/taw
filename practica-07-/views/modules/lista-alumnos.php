<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Alumnos</h1>
                </div>
				
	<table class="dTables display" style="width:100%">
		<thead>
			<tr>
				<th>Matricula</th>
				<th>ID carrera</th>
				<th>Nombre completo</th>
				<th>Email</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vistaUsuario = new AlumnosController();
			$vistaUsuario -> mostrar_alumnos();
			$vistaUsuario -> borrar_alumno();
			?>
		</tbody>
	</table>

<?php/*
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		Nucleo::Alerta("Cambio exitoso");
	}
}*/ ?>