<?php
    //defnir clase persona
    class persona{
        //definir propiedades
        public $edad;
        public $altura;
        public $peso;

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

    }
?>