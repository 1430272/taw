<?php

//clase que se utiliza para crear objetos que comparten un mismo comportamiento estado e identidad
class Automovil{
//propiedades son las caracteristicas que puede tener un modelo
	public $marca;
	public $modelo;
	//METODOS: es el algoritmo asociado a un objeto que oncida la capacidad de lo que este puede hacer la unica diferencia entre el metodo y funcion es que llamamos al metodo Funciones de una clase en POO , mientras que llamamos finciones a los algoritmos de la programacion estructurada
	public function mostrar(){
		echo "<p>hola soy una $this->marca, modelo $this->modelo</p>";
	}


}



//OBJETO:Es una entidad provista de una metodos o mensajes a los cuales responde propiedades en valores concretos
$a = new Automovil();
$a-> marca="chevrolet";
$a-> modelo="chevy";
$a-> mostrar();

$a = new Automovil();
$a-> marca="ford";
$a-> modelo="lobo";
$a-> mostrar();


$a = new Automovil();
$a-> marca="honda";
$a-> modelo="cvr";
$a-> mostrar();

//

?>