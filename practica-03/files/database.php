<?php

class Database{

	private $con;
	private $dbhost="localhost";
	private $dbuser="root";
	private $dbpass="root";
	private $dbname="taw_1430272";

	function __construct(){
		$this->connect_db();
	}

	public function connect_db(){
		$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

		if(mysqli_connect_error() ){
			die("Conexion a la base de datos fallo " . mysqli_connect_error() . mysqli_connect_errno());
		}
		
		#return $this->con;
	}

	public function sanitize($var){
		$return = mysqli_real_escape_string($this->con, $var);
		return $return;
  }
  
  public function create ($nombres,$apellidos,$telefono,$direccion,$correo_electronico){

#    $sql = "INSERT INTO 'practica_03_clientes' (nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres', '$apellidos', '$telefono', '$direccion', '$correo_electronico')";
    $sql = "INSERT INTO practica_03_clientes SET nombres='".$nombres."', apellidos='".$apellidos."', telefono='".$telefono."', direccion='".$direccion."', correo_electronico='".$correo_electronico."' ";
    $res = mysqli_query($this->con, $sql);
    if($res){
      return true;
    }else{
      return false;
    }
  }

  public function read(){
    $sql = "SELECT * FROM practica_03_clientes";
    $res = mysqli_query($this->con, $sql);
    return $res;
  }

  public function single_record($id){
    $sql = "SELECT * FROM practica_03_clientes WHERE id='$id'";
    $res = mysqli_query($this->con, $sql);
//    $result = mysqli_fetch_assoc($res);	//antes _object  ...ahora es $res["var"];
    $result = mysqli_fetch_object($res);
    return $result;
  }

  public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id){
    $sql = "UPDATE practica_03_clientes SET 
				nombres='".$nombres."', 
				apellidos='".$apellidos."', 
				telefono='".$telefono."', 
				direccion='".$direccion."', 
				correo_electronico='".$correo_electronico."'
			WHERE id='".$id."'";
    $res = mysqli_query($this->con, $sql);
    if($res){
      return true;
    }else{
      return false;
    }
  }

  public function delete($id){
    $sql = "DELETE FROM practica_03_clientes WHERE id =$id";
    $res = mysqli_query($this->con, $sql);
    if($res){
      return true;
    }else{
      return false;
    }
  }

}

//INSTALACION AUTOMATICA: Creando tabla(s) para este script (No recomendable, solo para propositos de demostracion)
$sql_script = "
CREATE TABLE IF NOT EXISTS `practica_03_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo_electronico` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `practica_03_clientes` (`id`, `nombres`, `apellidos`, `telefono`, `direccion`, `correo_electronico`) VALUES
(1, 'John', 'Doe', '504 7070-7070', 'San Salvador', 'john@gmail.com'),
(2, 'Peter ', 'Parker', '504 5050-5050', 'San Jose', 'peter@gmail.com'),
(3, 'Fran ', 'Wilson', '504 8999-5550', 'Conacastes 3301 AV', 'fran@gmail.com');
";

$db = New Database();
#$db = $db->connect_db();
//$install = $db->prepare($sql_script);
#$install->execute();
#$install->closeCursor();

/*    $res = mysqli_query($db->connect_db(), $sql_script);
    if($res){
      return true;
    }else{
      return false;
    }
	mysqli_close($conexion);
*/
?>