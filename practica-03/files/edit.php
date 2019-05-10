<?php
include ("database.php");
$clientes =  new Database();
$message="";
if(isset($_POST) && !empty($_POST)){
	$nombres = $clientes->sanitize($_POST['nombres']);
	$apellidos = $clientes->sanitize($_POST['apellidos']);
	$telefono = $clientes->sanitize($_POST['telefono']);
	$direccion= $clientes->sanitize($_POST['direccion']);
	$correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
	
	$res = $clientes->update($nombres, $apellidos, $telefono, $direccion, $correo_electronico, $_GET["id"]);
	if($res) {
		header("location: index.php?msg=update-success");
	}else{
		$message="No se pudieron insertar los datos";
		$class="alert alert-danger";
	}
}
?><!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible"content = "IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>CRUD con PHP usando Programación Orientada a Objetos</title>
    <link rel="stylesheet" href="http://fonts.googlapis.com/css?family=|Roboto+Round|Open+Sans">
    <link rel="stylesheet" href="http://fonts.googlapis.com/css?family=Material+Icons">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script crs="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script crs="https://maxcdn.bootsrtapcdn.com/bootrstrap/3.3.7/js/bootrstrap.min.js"></script>
    
</head>
<body>
    <div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Modificar Cliente</h2></div>
                      <div class="col-sm-4">
                           <a href="index.php" class="btn btn-danger add-new"><i class="fa fa-arrow-left"></i>Cancelar</a> 
                      </div>
                </div>
            </div>
		<br>
          <div class="<?php echo $class; ?>">
            <?php echo $message;?>
          </div>
<?php
if(isset($_GET["id"])){
	$res = $clientes->single_record($_GET["id"]);
	//Comprobacion de que el cliente exista
	if(!$res){ ?>
		<div class="alert alert-danger">
			El cliente solicitado no existe
		</div>
<?php
	} else { //* Si realmente existe, procedemos a mostrar la info */ ?>
     <div class="row">
         <form action="" method="post">
            <div class="col-md-6">
               <label>Nombres:</label>
               <input type="text" name="nombres" id="nombres" class='form-control' maxlenght="100" required value="<?php echo $res->nombres; ?>" >
            </div>
            <div class="col-md-6">
                 <label>Apellidos:</label>
                 <input type="text" name="apellidos" id="apellidos" class='form-control' maxlenght="100" required value="<?php echo $res->apellidos; ?>" >
            </div>
            <div class="col-md-12">
               <label>Dirección:</label> 
               <textarea name="direccion" id="direccion" class='form-control' maxlenght="255" required><?php echo $res->direccion; ?></textarea>
            </div>
            <div class="col-md-6">
               <label>Teléfono:</label>
               <input type="text" name="telefono" id="telefono" class='form-control' maxlenght="15" required value="<?php echo $res->telefono; ?>">
            </div>
            <div class="col-md-6">
              <label>Correo electrónico:</label>
              <input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlenght ="64" required value="<?php echo $res->correo_electronico; ?>">
            </div>
            <div class ="col-md-12 pull-right">
              <hr>
                 <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
         </form>
     </div>
<?php
	}
	
} else { ?>	
		<div class="alert alert-danger">
			No hay nada por aqu&iacute;
		</div>
<?php } ?>


     </div>
     </div>
</body>
</html>