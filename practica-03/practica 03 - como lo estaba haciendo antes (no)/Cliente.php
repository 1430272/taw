<?php 
/*
 * Clase para el registro de un cliente
 */

class Profesor {
	private static $sql_tabla = db_prefix."clientes";
	private $id;
	private $nombres;
	private $apellidos;
	private $telefono;
	private $direccion
	private $correo_electronico;
	
	function __Construct($id, $nombres, $apellidos, $telefono, $direccion, $correo_electronico){
		$this->setId($id);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setTelefono($telefono);
		$this->setDireccion($direccion);
		$this->setCorreo_electronico($correo_electronico);
	}

	/* Setters y Getters */

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}
	
	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getCorreo_electronico(){
		return $this->correo_electronico;
	}

	public function setCorreo_electronico($correo_electronico){
		$this->correo_electronico = $correo_electronico;
	}

	//Metodo que recive datos de un formulario POST para guardar en la Base de Datos
	public static function registro($cliente){
		$db=DataBase::getConnect();
		$insert=$db->prepare('INSERT INTO '.self::$sql_tabla.' VALUES (NULL, :nombres, :apellidos, :telefono, :direccion, :correo_electronico)');
		$insert->bindValue('nombres',$cliente->getNombre());
		$insert->bindValue('apellidos',$cliente->getApellidos());
		$insert->bindValue('telefono',$cliente->getTelefono());
		$insert->bindValue('direccion',$cliente->getDireccion());
		$insert->bindValue('correo_electronico',$cliente->getCorreo_electronico());
		$insert->execute();
		//var_dump($cliente);	#test
	}

	//Metodo que devuelve datos de la tabla para mostrarlos en pantalla en forma de lista
	public static function mostrar(){
		$db=DataBase::getConnect();
		$listaClientes=[];
		$select=$db->query('SELECT * FROM '.self::$sql_tabla.' ORDER BY id');
		foreach($select->fetchAll() as $cliente){
		}
		$listaClientes[]=new Profesor($cliente['id'],$cliente['nombres'],$cliente['apellidos'],$cliente['telefono'],$cliente['direccion'],$cliente['correo_electronico']);
		return $listaClientes;	//Me devuelve una lista dentro de un array, que posteriormente sera volcada usnado un foreach en una vista fuera de esta clase
	}
	
} ?>