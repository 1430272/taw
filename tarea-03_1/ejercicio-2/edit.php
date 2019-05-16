<?php
	$title = "Ejercicio 2";
	include("menus.php");
	include("functions.php");
	include("../include/tpl/header.php");
?>
	<div class="row">
	<p><br /></p>
      <div class="large-12 columns">
        <h5>Editar</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">

				<table id="user_data" class="table table-bordered table-striped">
					<tbody>

			<?php
			//MOSTRAR ROW POR ID
			
			if(isset($_GET["id"]) && isset($_GET["lista"])){
			$id=$_GET["id"];
			$lista=$_GET["lista"];
			$output = array();
			$statement = $pdo->prepare("SELECT jf.*, c.*, e.* FROM torneo_jugadores_$lista AS jf, torneo_carreras AS c, torneo_equipos AS e WHERE jf.carrera_id = c.id_carrera AND jf.equipo_id = e.id_equipo AND id='$id' LIMIT 1");
			$statement->execute();
			$result = $statement->fetchAll();
			?>
					<?php
						foreach ($result as $row) {
							$msg="'Seguro que quieres borrar?'";
							echo '
							<form action="?id='.$id.'&task=edit&lista='.$lista.'" method="post">
							<tr>
								<th>Nombre</th>				<td><input name="nombre" value="'.$row['nombre'].'" /></td> <td><input name="apellido" value="'.$row['apellido'].'" /></td>
							</tr><tr>
								<th>Email</th>				<td><input name="matricula" value="'.$row['matricula'].'"/></td> <td>@upv.edu.mx</td>
							</tr><tr>
								<th>Carrera</th>			<td>'.$row['nombre_carrera'].'</td><td></td>
							</tr><tr>
								<th>Equipo</th>				<td>'.$row['nombre_equipo'].'</td><td></td>
							</tr><tr>
								<th>#</th>					<td><input name="no_torso" value="'.$row['no_torso'].'"/></td> <td></td>
							</tr><tr>
								<th>Posici&oacute;n</th>	<td><input name="posicion" value="'.$row['posicion'].'"/></td> <td></td>
							</tr><tr>
						<td>&nbsp;</td><td><input type="submit" name="update" value="Actualizar" /></td><td></td>
							</tr></form>';
						}
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