<?php
	$title = "Ejercicio 2";
	include("menus.php");
	include("functions.php");
	include("../include/tpl/header.php");
?>
	<div class="row">
	<p><br /></p>
      <div class="large-12 columns">
        <h5>Agregar</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">

				<table id="user_data" class="table table-bordered table-striped">
					<tbody>
					<?php if(isset($_GET["lista"])){ $lista = $_GET["lista"]; } ?>
					<form action="?task=add&lista=<?=$lista;?>" method="post">
							<tr>
								<th>Nombre</th>				<td><input name="nombre"/></td> <td><input name="apellido"/></td>
							</tr><tr>
								<th>Email</th>				<td><input name="matricula"/></td> <td>@upv.edu.mx</td>
							</tr><tr>
								<th>Carrera</th>			<td><input name="carrera_id"/></td><td></td>
							</tr><tr>
								<th>Equipo</th>				<td><input name="equipo_id"placeholder="por mientras numerico"/></td><td></td>
							</tr><tr>
								<th>#</th>					<td><input name="no_torso"/></td> <td></td>
							</tr><tr>
								<th>Posici&oacute;n</th>	<td><input name="posicion"/></td> <td></td>
							</tr><tr>
						<td>&nbsp;</td><td><input type="submit" name="add" value="Agregar" /></td><td></td>
							</tr>
					</form>	
					</tbody>
				</table>
			
            </div>
          </section>
        </div>
      </div>
	</div>
	
<?php include("../include/tpl/footer.php"); ?>