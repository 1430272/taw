<?php
	$title = "Ejercicio 2";
	include("menus.php");
	include("functions.php");
	include("../include/tpl/header.php");
?>
	<div class="row">
	<p><br /></p>
      <div class="large-12 columns">
        <h5>FootBall</h5>
		<a href="add.php?lista=basketball" class="button">Agregar</a>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">

				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="20%">Nombre completo</th>
							<th width="20%">Email</th>
							<th width="5%">Carrera</th>
							<th width="20%">Equipo</th>
							<th width="5%">#</th>
							<th width="15%">Posici&oacute;n</th>
							<th width="25%">Acciones</th>
						</tr>
					</thead>
					<tbody>
					
					<?php	
						$sql = "SELECT jf.*, c.*, e.* FROM torneo_jugadores_basketball AS jf, torneo_carreras AS c, torneo_equipos AS e WHERE  jf.carrera_id = c.id_carrera AND jf.equipo_id = e.id_equipo";
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						$rows = $stmt->fetchAll();
						foreach ($rows as $row) {
							$msg="'Seguro que quieres borrar?'";
							echo '
							<tr>
								<td>'.$row['nombre'].' '.$row['apellido'].'</td>
								<td>'.$row['matricula'].'@upv.edu.mx</td>
								<td>'.$row['nombre_carrera'].'</td>
								<td>'.$row['nombre_equipo'].'</td>
								<td>'.$row['no_torso'].'</td>
								<td>'.$row['posicion'].'</td>
								<td><a href="edit.php?id='.$row["id"].'&lista=basketball" class="link"><span>Editar</span></a> - <a href="?task=delete&id='.$row["id"].'&lista=basketball" class="link"><span name="delete" id="delete" onclick="return confirm('.$msg.')">Borrar</span></a></td>
							</tr>';
						}
					?>
					
					</tbody>
				</table>
			
            </div>
          </section>
        </div>
      </div>
	</div>
	
<?php include("../include/tpl/footer.php"); ?>