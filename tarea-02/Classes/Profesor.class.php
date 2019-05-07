<?php 
/*
 * Clase para el registro de un profesor
 */

class Profesor {
	private static $sql_tabla = db_prefix."profesores";
	private $id;
	private $id_carrera;
	private $no_empleado;
	private $nombre;
	private $apellido_paterno;
	private $apellido_materno;
	private $correo_electronico;
	private $telefono;	
	private $estatus;

	
	function __Construct($id, $id_carrera, $no_empleado, $nombre, $apellido_paterno, $apellido_materno, $correo_electronico, $telefono, $estatus){
		$this->setId($id);
		$this->setId_carrera($id_carrera);
		$this->setNo_empleado($no_empleado);
		$this->setNombre($nombre);
		$this->setApellido_paterno($apellido_paterno);
		$this->setApellido_materno($apellido_materno);
		$this->setCorreo_electronico($correo_electronico);
		$this->setTelefono($telefono);
		$this->setEstatus($estatus);
	}

	/* Setters y Getters */

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_carrera(){
		return $this->id_carrera;
	}

	public function setId_carrera($id_carrera){
		$this->id_carrera = $id_carrera;
	}

	public function getNo_empleado(){
		return $this->no_empleado;
	}

	public function setNo_empleado($no_empleado){
		$this->no_empleado = $no_empleado;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellido_paterno(){
		return $this->apellido_paterno;
	}

	public function setApellido_paterno($apellido_paterno){
		$this->apellido_paterno = $apellido_paterno;
	}

	public function getApellido_materno(){
		return $this->apellido_materno;
	}

	public function setApellido_materno($apellido_materno){
		$this->apellido_materno = $apellido_materno;
	}

	public function getCorreo_electronico(){
		return $this->correo_electronico;
	}

	public function setCorreo_electronico($correo_electronico){
		$this->correo_electronico = $correo_electronico;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getEstatus(){
		return $this->estatus;
	}

	public function setEstatus($estatus){
		if (strcmp($estatus, 'on')==0) {
			$this->estatus=1;
		} elseif(strcmp($estatus, '1')==0) {
			$this->estatus='checked';
		}elseif (strcmp($estatus, '0')==0) {
			$this->estatus='off';
		}else {
			$this->estatus=0;
		}
	}

	//Metodo que recive datos de un formulario POST para guardar en la Base de Datos
	public static function registro($profesor){
		$db=DataBase::getConnect();
		$insert=$db->prepare('INSERT INTO '.self::$sql_tabla.' VALUES (NULL, :id_carrera, :no_empleado, :nombre, :apellido_paterno, :apellido_materno, :correo_electronico, :telefono, :estatus)');
		$insert->bindValue('id_carrera',$profesor->getId_carrera());
		$insert->bindValue('no_empleado',$profesor->getNo_empleado());
		$insert->bindValue('nombre',$profesor->getNombre());
		$insert->bindValue('apellido_paterno',$profesor->getApellido_paterno());
		$insert->bindValue('apellido_materno',$profesor->getApellido_materno());
		$insert->bindValue('correo_electronico',$profesor->getCorreo_electronico());
		$insert->bindValue('telefono',$profesor->getTelefono());
		$insert->bindValue('estatus',$profesor->getEstatus());
		$insert->execute();
		//var_dump($profesor);	#test
	}

	//Metodo que devuelve datos de la tabla para mostrarlos en pantalla en forma de lista
	public static function mostrar(){
		$db=DataBase::getConnect();
		$listaProfesores=[];
		$select=$db->query('SELECT * FROM '.self::$sql_tabla.' ORDER BY id');
		foreach($select->fetchAll() as $profesor){
			$listaProfesores[]=new Profesor($profesor['id'],$profesor['id_carrera'],$profesor['no_empleado'],$profesor['nombre'],$profesor['apellido_paterno'],$profesor['apellido_materno'],$profesor['email'],$profesor['telefono'],$profesor['estatus']);
		}
		return $listaProfesores;	//Me devuelve una lista dentro de un array
	}
	
} ?>