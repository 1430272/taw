<?php
    //defnir clase persona
	class persona{
		//definir propiedades
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

		//index.php Ya no va a llamar ninguno de los metodos anteriores de forma directa, usare _tooString()
		public function __toString(){
			//imprimir resultados
			return "<h2>Resultados</h2> <b>Edad: </b>" .$this->edad. " a&ntilde;os<br> <b>Altura: </b>" .$this->altura. " cm<br> <b>Peso:</b> " .$this->peso. " kg<br> <b>IMC:</b> "
			. self::imc();	//Llamar a un metodo declarado dentro de la misma clase
		}
	}
?>