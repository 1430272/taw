<?php
include_once("Classes/Config.class.php");
include_once("Classes/Carreras.class.php");
include_once("Classes/Alumno.class.php");

if(isset($_POST["reg_alumno"])){
	if (!isset($_POST['estatus'])) {
		$estatus="off";
	} else {
		$estatus="on";
	}
		
	//Creamos un objeto, envia la peticion POST como parametros al constructor y el objeto llama al metodo de registro
	$alumno= new Alumno(null, $_POST['id_carrera'], $_POST['matricula'], $_POST['nombre'], $_POST['apellido_paterno'], $_POST['apellido_materno'], $_POST['correo_electronico'], $_POST['telefono'], $estatus);
	Alumno::registro($alumno);
	echo '<script>alert("Hecho!");</script>';
}
?>

<div class="container">
  <h2>Registro de Alumno</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="text">Nombre(s):</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" name="nombre" required>
    </div>
    <div class="form-group">
      <label for="text">Apellido Paterno</label>
      <input type="text" name="apellido_paterno" class="form-control" placeholder="Ingrese su apellido paterno" required>
    </div>
    <div class="form-group">
      <label for="text">Apellido Materno</label>
      <input type="text" name="apellido_materno" class="form-control" placeholder="Ingrese su apellido materno" required>
    </div>
    <div class="form-group">
      <label for="text">Matricula</label>
      <input type="text" name="matricula" class="form-control" placeholder="matricula" required>
    </div>
    <div class="form-group">
      <label for="text">Carrera</label>
      <select name="id_carrera" class="form-control" required>
	  <?php
		$carreras = New Carreras(null,null,null);	//Mi constructor en la clase carreras recive parametros cuando se va a registrar datos nuevos, por eso para mostrar he anulado dichos parametros
		$listaCarreras=Carreras::mostrar();
		foreach($listaCarreras as $carrera){
			echo '<option value="'.$carrera->getId().'">'.$carrera->getAcronimo().'</option>';
		}
	  ?>
	  </select>
    </div>
    <div class="form-group">
      <label for="text">Email</label>
      <input type="text" name="correo_electronico" class="form-control" placeholder="correo electronico" required>
    </div>
    <div class="form-group">
      <label for="text">Telefono</label>
      <input type="text" name="telefono" class="form-control" placeholder="telefono" required>
    </div>
    <div class="check-box">
      <label>Activo <input type="checkbox" name="estatus">  </label>
    </div>
    <input type="submit" class="btn btn-primary" name="reg_alumno" value="registrar">
  </form>
</div>

<hr />
<?php
$alumno = New Alumno(null,null,null,null,null,null,null,null,null);	//Mi constructor en la clase carreras recive parametros cuando se va a registrar datos nuevos, por eso para mostrar he anulado dichos parametros
$listaAlumnos=Alumno::mostrar();
foreach($listaAlumnos as $alumno){
	echo $alumno->getNombre().'<br>';
}
?>