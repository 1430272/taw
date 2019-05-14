<?php
error_reporting(0);
ob_start(); /* para evitar problemas con la redireccion */

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
  
/* Para el login */
  public function check_login($username,$password){
	$encrypt_password = md5($password);
    $sql = "SELECT username, password FROM practica_04_usuarios WHERE username='".$username."' AND password='".$encrypt_password."' ";
    $res = mysqli_query($this->con, $sql);
/*    if($res){
      return true;
    }else{
      echo '<script> alert("Los datos no coinciden"); </script> '; 
	  return false;
    } */

if($res) {
				while($row = $res->fetch_array()) {
 
					$username = $row["username"];
					$row_password = $row["password"];
				}
				//$res->close();
			}
			//$res->close();
 
 
			if(isset($username) && isset($encrypt_password)) {
 
				if($username == $username && $encrypt_password == $row_password) {
 
 /*
					session_start();
					$_SESSION["logueado"] = TRUE;
					header("Location: admin.php"); */
					
					setcookie("username", $username, time()+3600);  // expira en una hora
					header("location: index.php");
					
				}
				else {
					//Header("Location: index.php?error=login");
					echo '<script>alert("ERROR Los datos no coinciden");</script>';
				}
 
			}
	

	
  }
  
}
?>