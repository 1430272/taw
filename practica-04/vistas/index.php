                <div class ="row">
                      <div class="col-sm-8"><h2>Listado de Clientes</h2></div>
                      <div class="col-sm-4">
                           <a href="?vista=create" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar cliente</a> 
                      </div>
                </div>
				<hr><br>
				

<?php
if(isset($_GET["msg"])){
	//Alertas y Errores del sistema
	if($_GET["msg"] == "delete-success"){
		$message = "Datos eliminados con &eacute;xito";
		$class = "alert alert-success";
	}
	if($_GET["msg"] == "delete-error"){
		$message="No se pudieron eliminar los datos";
		$class="alert alert-danger";
	}
	if($_GET["msg"] == "update-success"){
		$message = "Datos actualizados con &eacute;xito";
		$class = "alert alert-success";
	}
	if($_GET["msg"] == "update-error"){
		$message="No se pudieron actualizar los datos";
		$class="alert alert-danger";
	}
?><br>
<div class="<?php echo $class; ?>">
	<?php echo $message;?>
</div>
<?php } ?>

            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Telefono</th>
                        <th>Direcci&oacute;n</th>
                        <th>E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<?php include ("database.php");
$clientes = new Database();
$res = $clientes->read();
foreach($res as $row){ ?>
                    <tr>
                        <td><?php echo $row["nombres"].' '.$row["apellidos"]; ?></td>
                        <td><?php echo $row["telefono"]; ?></td>
                        <td><?php echo $row["direccion"]; ?></td>
                        <td><?php echo $row["correo_electronico"]; ?></td>
                        <td>
							<a href="?vista=edit&id=<?php echo $row["id"]; ?>"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; 
							<a href="delete.php?id=<?php echo $row["id"]; ?>" class="delete-row"><i class="fa fa-trash"></i></a>
						</td>
                    </tr>
<?php } ?>
                </tbody>
            </table>