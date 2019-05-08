<?php
    //defnir clase persona
    class primedio{
        //definir propiedades
		public $array;
        public $nombre;
        public $unidad_1;
        public $unidad_2;
        public $unidad_3;

		public function __Construct(array $array){
			$this->TheArray = $array;
		}
		
        //definir metodo obtencion de datos
        //getters
        public function getNombre(){
            return $this->nombre;
        }

        public function getUnidad_1(){
            return $this->unidad_1;
        }
		
        public function getUnidad_2(){
            return $this->unidad_2;
        }
		
        public function getUnidad_3(){
            return $this->unidad_3;
        }
    
        //definir metodos asignacion de datos
        //setters

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setUnidad_1($unidad_1){
            $this->unidad_1 = $unidad_1;
        }

        public function setUnidad_2($unidad_2){
            $this->unidad_2 = $unidad_2;
        }

        public function setUnidad_3($unidad_3){
            $this->unidad_3 = $unidad_3;
        }


        //metodo para el calculo del promedio
        /*public function promedio($u1,$u2,$u3){
			$promedio = 0;
			if($this->unidad_1 < 70 || $this->unidad_2 < 70 || $this->unidad_3 < 70){
				$promedio = 60;
			} else {
				$promedio = ($this->unidad_1 + $this->unidad_2 + $this->unidad_3) / 3;
				if($promedio < 70){
					$promedio = 60;
				} else {
					$promedio = $promedio;
				}
			}
			#return '<br>'.$promedio.'<br>';
        } */

		//metodo para preparar el array
		public function manejar_array($TheArray=array()){
			//print_r($this->TheArray);
			foreach($this->TheArray as $cols =>$col){
				//echo $col[1].' '.$col[2].' '.$col[3].'<br>';
				$promedio = 0;
//				if($this->unidad_1 < 70 || $this->unidad_2 < 70 || $this->unidad_3 < 70){ //usando las propiedades
				if($col[1] < 70 || $col[2] < 70 || $col[3] < 70){	//usando valores del array
					$promedio = 60;
				} else {
					#$promedio = ($this->unidad_1 + $this->unidad_2 + $this->unidad_3) / 3;	//Usando propiedades
					$promedio = ($col[1] + $col[2] + $col[3]) / 3;	//Usando los valores del array
					if($promedio < 70){
						$promedio = 60;
					} else {
						$promedio = $promedio;
					}
				}
				//Creo que desperdicie el metodo 'promedio' de arriba y las propiedades de esta clase
				//se me agotaba el tiempo
				
		echo '<table><thead><tr><th colspan="2">Nombre del alumno</th><th>Unidad 1</th><th>Unidad 2</th><th>Unidad 3</th><th>Promedio</th></tr></thead><tbody>';
		echo '<tr><td>'.$col[0].'</td><td>'.$col[1].'"</td><td>'.$col[2].'</td><td>'.$col[3].'</td><td>'.$promedio.'</td></tr>';
		echo '</tbody></table></form>';
				
#				echo $col[1].' '.$col[2].' '.$col[3].' '.$promedio.'<br>';
				//Pude haber utilizado un metodo __toString()
			}
		}

    }
?>
