<?php
/*
 * Con esta clase solo retorno una lista de carreras, no me sirve (aun) para dar de alta el registro de las mismas
 * El registro de carreras no fue solicitado para esta tarea, sin embargo queria crear un catalogo en la Base de datos 
 */
 
class Carreras {
	private static $sql_tabla = db_prefix."carreras";
	private $id;
	private $acronimo;
	private $nombre;
	
	function __construct($id, $acronimo, $nombre){ 
		$this->setId($id);
		$this->setAcronimo($acronimo);
		$this->setNombre($nombre);
	}

	/* Setters y Getters */

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getAcronimo(){
		return $this->acronimo;
	}

	public function setAcronimo($acronimo){
		$this->acronimo = $acronimo;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	//Metodo para retornar lista de carreras
	public static function mostrar(){
		$db=DataBase::getConnect();
		$listaCarreras=[];
			$select=$db->query('SELECT * FROM '.self::$sql_tabla.' ORDER BY id');
			#$select
			#'SELECT * FROM '.self::$sql_tabla.' ORDER BY id'
		foreach($select->fetchAll() as $carrera){
			$listaCarreras[]=new Carreras($carrera['id'], $carrera['acronimo'], $carrera['nombre']);
		}
		return $listaCarreras;
	}

	//A diferencia del metodo anterior, este devuelve informacion de forma individual
	public static function showCarrera($id){
		$db=DataBase::getConnect();
		$select=$db->prepare('SELECT acronimo FROM '.self::$sql_tabla.' WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();
		$alumnoDataBase=$select->fetch();
		$alumno = [];#test
		$alumno = new carreras(NULL,$alumnoDataBase['acronimo'],NULL);		
		echo $alumno->acronimo;
	}
} ?>