                <div class ="row">
                      <div class="col-sm-8"><h2>Agregar Cliente</h2></div>
                      <div class="col-sm-4">
                           <a href="./" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a> 
                      </div>
                </div>
            <?php
      include ("database.php");
      $clientes =  new Database();
      if (isset($_POST) && !empty($_POST)) {
          $nombres = $clientes->sanitize($_POST['nombres']);
          $apellidos = $clientes->sanitize($_POST['apellidos']);
          $telefono = $clientes->sanitize($_POST['telefono']);
          $direccion= $clientes->sanitize($_POST['direccion']);
          $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);

          $res = $clientes->create($nombres, $apellidos, $telefono, $direccion, $correo_electronico);
          if ($res) {
              $message = "Datos insertados con &eacute;xito";
              $class = "alert alert-success";
          }else{
              $message="No se pudieron insertar los datos";
              $class="alert alert-danger";
          }

          ?>
          <div class="<?php echo $class; ?>">
            <?php echo $message;?>
          </div>
             <?php
      }

    ?>
     <div class="row">
         <form method="post">
            <div class="col-md-6">
               <label>Nombres:</label>
               <input type="text" name="nombres" id="nombres" class='form-control' maxlenght="100" required >
            </div>
            <div class="col-md-6">
                 <label>Apellidos:</label>
                 <input type="text" name="apellidos" id="apellidos" class='form-control' maxlenght="100" required>  
            </div>
            <div class="col-md-12">
               <label>Dirección:</label> 
               <textarea name="direccion" id="direccion" class='form-control' maxlenght="255" required></textarea>
            </div>
            <div class="col-md-6">
               <label>Teléfono:</label>
               <input type="text" name="telefono" id="telefono" class='form-control' maxlenght="15" required>
            </div>
            <div class="col-md-6">
              <label>Correo electrónico:</label>
              <input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlenght ="64" required>
            </div>
            <div class ="col-md-12 pull-right">
              <hr>
                 <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
         </form>
     </div>