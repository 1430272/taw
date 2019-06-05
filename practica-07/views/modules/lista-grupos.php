<?php Nucleo::require_session(); /* Requiere una $_SESSION valida */ ?>

                <div class="col-lg-12">
                    <h1 class="page-header">GRUPOS</h1>
                </div>
				
	<table class="dTables display" style="width:100%">
		<thead>
			<tr>
				<th>id</th>
				<th>clave</th>
				<th>nombre</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vistaUsuario = new GruposController();
			$vistaUsuario -> mostrar_grupos();
			$vistaUsuario -> borrar_grupo();
			?>
		</tbody>
	</table>

<?php/*
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		Nucleo::Alerta("Cambio exitoso");
	}
}*/ ?>