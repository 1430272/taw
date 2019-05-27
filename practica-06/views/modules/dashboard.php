<?php Nucleo::require_session(); ?>

<style>
.btn-sq-lg {
  width: 150px !important;
  height: 150px !important;
}

.btn-sq {
  width: 100px !important;
  height: 100px !important;
  font-size: 10px;
}

.btn-sq-sm {
  width: 50px !important;
  height: 50px !important;
  font-size: 10px;
}

.btn-sq-xs {
  width: 25px !important;
  height: 25px !important;
  padding:2px;
}


</style>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

      <div class="row">
        <div class="col-lg-12">
          <center>
            <a href="index.php?action=lista-usuarios" class="btn btn-sq-lg btn-primary" >
                <i class="fa fa-user fa-5x"></i><br/>
                Usuarios <br><?php echo CRUD::estadistica("practica_05_users", null, null); ?>
            </a>
            <a href="index.php?action=lista-clientes" class="btn btn-sq-lg btn-success">
              <i class="fa fa-user fa-5x"></i><br/>
              Clientes <br><?php echo CRUD::estadistica("practica_06_clientes", null, null); ?>
            </a>
            <a href="index.php?action=lista-habitaciones" class="btn btn-sq-lg btn-info">
              <i class="fa fa-bed fa-5x"></i><br/>
              Habitaciones <br><?php echo CRUD::estadistica("practica_06_habitaciones", null, null); ?>
            </a>
            <a href="index.php?action=lista-reservaciones" class="btn btn-sq-lg btn-warning">
              <i class="fa fa-calendar fa-5x"></i><br/>
              Reservaciones <br><?php echo CRUD::estadistica("practica_06_reservaciones", null, null); ?>
            </a>
          </center>
        </div>
	</div>
<hr>
	<div class="row">
        <div class="col-lg-12">
			<h3>Ganancias Por Mes</h3>

<?php
//Por cada mes, llamo un metodo que sume las ganancias de cada mes
//El unico problema es que tarda demasiado tiempo en ejecusion
echo '<table border="1"><tr><th>#Mes</th><th>Ganancias</th></tr>';
for ($i=0; $i<=12; $i++) {
	echo '<tr>
			<th>'.date('m', strtotime("-$i month")).'</th>
			<td> $'.CRUD::ganancias(date('m', strtotime("-$i month"))).'</td>
		</tr>';
 }
echo '</table>'; ?>
        </div>
	</div>
 