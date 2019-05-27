<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo _sitename_; ?></title>
    <!-- Core CSS - Include with every page -->
    <link href="themes/sb-admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="themes/sb-admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
	<!-- Para los iconos use Font Awesome en la version mas reciente, Nota: requiere Internet -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="themes/sb-admin/assets/css/sb-admin.css" rel="stylesheet">
	
	<!-- DataTables - Requiere Internet -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.css"/>
</head>

<body>

<?php function view_login(){ ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form"method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre de usuario" name="username" type="text" required value="admin">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" autofocus required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Ingresar">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
//ignoramos la vista "views/modules/ingresar-usuario.php" y cargamos el ctrlr aqui mismo para iniciar sesion
$ingreso = new UsuariosController();
$ingreso -> ingresoUsuarioController();
?>
	
<?php } ?>

<?php function view_general(){ ?>
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?action=salir"><i class="fa fa-sign-out-alt fa-fw"></i> Salir</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search... No sirve">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="./"><i class="fa fa-tachometer-alt fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="index.php?action=reportes"><i class="fa fa-chart-bar fa-fw"></i> Reportes</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?action=registrar-usuario">Agregar nuevo</a>
                                </li>
                                <li>
                                    <a href="index.php?action=lista-usuarios">Lista</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Clientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?action=registrar-cliente">Agregar nuevo</a>
                                </li>
                                <li>
                                    <a href="index.php?action=lista-clientes">Lista</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bed fa-fw"></i> Habitaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?action=registrar-habitacion">Agregar nueva</a>
                                </li>
                                <li>
                                    <a href="index.php?action=lista-habitaciones">Lista</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> Reservaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?action=hacer-reservacion">Agregar nueva</a>
                                </li>
                                <li>
                                    <a href="index.php?action=lista-reservaciones">Lista</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
				
				<?php Nucleo::Ruteador(); ?>
				
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php } ?>

    <!-- Core Scripts - Include with every page -->
    <script src="themes/sb-admin/assets/js/jquery-1.10.2.js"></script>
<!--    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
	
    <script src="themes/sb-admin/assets/js/bootstrap.min.js"></script>


    <!-- Page-Level Plugin Scripts - Blank -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="themes/sb-admin/assets/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Blank - Use for reference -->

	<!-- DataTables - Requiere Internet -->
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-1.10.12/dt-1.10.18/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('.dTables').DataTable();
	} );
	</script>
	
	    <script src="themes/sb-admin/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>
</html>