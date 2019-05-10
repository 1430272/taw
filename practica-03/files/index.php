<?php ob_start(); /* para evitar problemas con la redireccion */ ?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete-row").click(function(e){
        if(!confirm('Estas seguro de querer eliminar?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Listado de Clientes</h2></div>
                      <div class="col-sm-4">
                           <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i>Agregar cliente</a> 
                      </div>
                </div>
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
            </div>
            <table class="table table-striped" id="mytable">
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
							<a href="edit.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; 
							<a href="delete.php?id=<?php echo $row["id"]; ?>" class="delete-row"><i class="fa fa-trash"></i></a>
						</td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
<!--            <div class="text-center">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-long-arrow-left"></i> Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next <i class="fa fa-long-arrow-right"></i></a></li>
                </ul>
            </div> -->
        </div>
    </div>     
</body>
</html>                            