<?php
    //defnir clase persona
	class persona{
		//definir propiedades
		private static $sql_tabla = db_prefix."imc";
		public $id; public $imc;
		public $edad;
		public $altura;
		public $peso;

		public function __Construct($edad,$altura,$peso){
			$this -> edad = $edad;
			$this -> altura = $altura;
			$this -> peso = $peso;
		}

		//definir metodo obtencion de datos
		//getters
		public function getId(){
			return $this->id;
		}
		public function getImc(){
			return $this->imc;
		}

		public function getEdad(){
			return $this->edad;
		}

		public function getAltura(){
			return $this->altura;
		}
		
		public function getPeso(){
			return $this->peso;
		}

		//definir metodos asignacion de datos
		//setters

		public function setEdad($valor){
			$this->edad = $valor;
		}
		
		public function setPeso($valor){
			$this->peso = $valor;
		}
		
		public function setAltura($valor){
			$this->altura = $valor;
		}

		//metodo de calculo de IMC accediendo a las propiedaes
		public function imc(){
			return $this-> peso / ($this->altura * $this->altura);
		}

		public function imc2(){
			return $this-> getPeso() / ($this->getAltura() * $this->getAltura());
		}

		public static function registro($id, $edad, $altura, $peso, $imc){	//Guardar en la BD
			$imc = $peso / ($altura * $altura);
			$db=DataBase::getConnect();
			$insert=$db->prepare('INSERT INTO '.self::$sql_tabla.' VALUES (NULL, :edad, :altura, :peso, :imc)');
			$insert->bindValue('edad',$edad);		//uso el $objeto-> en lugar de $this-> ...porque objeto se uso como parametro para tomar sus datos
			$insert->bindValue('altura',$altura);
			$insert->bindValue('peso',$peso);
			$insert->bindValue('imc',$imc);	//aqui continuo usando una variable local, el metodo que ya hizo el calculo
			$insert->execute();
			//var_dump($persona);	#test
		}

		public static function mostrar(){ //Volcado de la BD
			$db=DataBase::getConnect();
			$listaResultados=[];
			$select=$db->query('SELECT * FROM '.self::$sql_tabla.' ORDER BY id');
			foreach($select->fetchAll() as $persona){
				$listaResultados[]=new Persona($persona['id'],$persona['edad'],$persona['altura'],$persona['peso'],$persona['imc']);
			}
			return $listaResultados;	//Me devuelve una lista dentro de un array
		}

		//index.php Ya no va a llamar ninguno de los metodos anteriores de forma directa, usare _tooString()
		public function __toString(){
			//imprimir resultados
			return "<h2>Resultados</h2> <b>Edad: </b>" .$this->edad. " a&ntilde;os<br> <b>Altura: </b>" .$this->altura. " cm<br> <b>Peso:</b> " .$this->peso. " kg<br> <b>IMC:</b> "
			. self::imc();// . self::registro() ;	//Llamar a un metodo declarado dentro de la misma clase
		}
    }
?>