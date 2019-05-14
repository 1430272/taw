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
	if($res) { ?>
<script>
    // Your application has indicated there's an error
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "./index.php?msg=update-success";

    }, 0);
</script>
<?php
	}else{
		$message="No se pudieron insertar los datos";
		$class="alert alert-danger";
	}
}
?>
                <div class ="row">
                      <div class="col-sm-8"><h2>Modificar Cliente</h2></div>
                      <div class="col-sm-4">
                           <a href="./" class="btn btn-danger add-new"><i class="fa fa-arrow-left"></i> Cancelar</a> 
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
