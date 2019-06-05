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
                Usuarios <br><?php echo CRUD::estadistica("practica_07_users", null, null); ?>
            </a>
            <a href="index.php?action=lista-profesores" class="btn btn-sq-lg btn-success">
              <i class="fa fa-chalkboard-teacher fa-5x"></i><br/>
              Profesores <br><?php echo CRUD::estadistica("practica_07_profesores", null, null); ?>
            </a>
            <a href="index.php?action=lista-alumnos" class="btn btn-sq-lg btn-info">
              <i class="fa fa-user-graduate fa-5x"></i><br/>
              Alumnos <br><?php echo CRUD::estadistica("practica_07_alumnos", null, null); ?>
            </a>
            <a href="index.php?action=lista-materias" class="btn btn-sq-lg btn-danger">
              <i class="fa fa-tag fa-5x"></i><br/>
              Materias <br><?php echo CRUD::estadistica("practica_07_materias", null, null); ?>
            </a>
            <a href="index.php?action=lista-grupos" class="btn btn-sq-lg btn-warning">
              <i class="fa fa-school fa-5x"></i><br/>
              Grupos <br><?php echo CRUD::estadistica("practica_07_grupos", null, null); ?>
            </a>
          </center>
        </div>
	</div>
 