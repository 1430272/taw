<?php 
/*
 * Clase para el registro de un alumno
 */

 class Alumno {
	private static $sql_tabla = db_prefix."alumnos";
	private $id;
	private $id_carrera;
	private $matricula;
	private $nombre;
	private $apellido_paterno;
	private $apellido_materno;
	private $correo_electronico;
	private $telefono;
	private $estatus;

	//Constructor
	function __Construct($id, $id_carrera, $matricula, $nombre, $apellido_paterno, $apellido_materno, $correo_electronico, $telefono,  $estatus){
		$this->setId($id);
		$this->setId_carrera($id_carrera);
		$this->setMatricula($matricula);
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

	public function getMatricula(){
		return $this->matricula;
	}

	public function setMatricula($matricula){
		$this->matricula = $matricula;
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

	public function setEstatus($estado){
		if (strcmp($estado, 'on')==0) {
			$this->estatus=1;
		} elseif(strcmp($estado, '1')==0) {
			$this->estatus='checked';
		}elseif (strcmp($estado, '0')==0) {
			$this->estatus='off';
		}else {
			$this->estatus=0;
		}
	}

	//Metodo que recive datos de un formulario POST para guardar en la Base de Datos
	public static function registro($alumno){
		$db=DataBase::getConnect();
		$insert=$db->prepare('INSERT INTO '.self::$sql_tabla.' VALUES (NULL, :id_carrera, :matricula, :nombre, :apellido_paterno, :apellido_materno, :correo_electronico, :telefono, :estatus)');
		$insert->bindValue('id_carrera',$alumno->getId_carrera());
		$insert->bindValue('matricula',$alumno->getMatricula());
		$insert->bindValue('nombre',$alumno->getNombre());
		$insert->bindValue('apellido_paterno',$alumno->getApellido_paterno());
		$insert->bindValue('apellido_materno',$alumno->getApellido_materno());
		$insert->bindValue('correo_electronico',$alumno->getCorreo_electronico());
		$insert->bindValue('telefono',$alumno->getTelefono());
		$insert->bindValue('estatus',$alumno->getEstatus());
		$insert->execute();
		//var_dump($alumno);	#test
	}

	//Metodo que devuelve datos de la tabla para mostrarlos en pantalla en forma de lista
	public static function mostrar(){
		$db=DataBase::getConnect();
		$listaAlumnos=[];
		$select=$db->query('SELECT * FROM '.self::$sql_tabla.' ORDER BY id');
		foreach($select->fetchAll() as $alumno){
			$listaAlumnos[]=new Alumno($alumno['id'],$alumno['id_carrera'],$alumno['matricula'],$alumno['nombre'],$alumno['apellido_paterno'],$alumno['apellido_materno'],$alumno['email'],$alumno['telefono'],$alumno['estatus']);
		}
		return $listaAlumnos;	//Me devuelve una lista dentro de un array
	}
	
} ?>