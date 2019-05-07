<?php
/* Intente sacar la idea de las variables de error de aqui...
	https://stackoverflow.com/questions/12633413/php-returning-an-error-message-and-false
	...pero sobre escriben todas las variables, no solo la que le corresponde, mostrando por ej, 4 veces el mismo msg de error para todos los campos
	...y no se por que pero solo valida el genero. Me gustaria tener la version corregida para futuras referencias.
*/
class Form{
	
	//Por defecto en index estas variables de error estan vacias, pero aqui se toman por parametro y sobre escriben si hay error
	public $nameErr;
	public $genderErr;
	public $emailErr;
	public $websiteErr;
	
	public $error_message = '';
	
	public $name;
	public $gender;
	public $email;
	public $website;
	public $comment;
	
	public function __Construct($name, $gender, $email, $website, $comment, $nameErr, $genderErr, $emailErr, $websiteErr){
			
			$this->nameErr=$nameErr;
			$this->genderErr=$genderErr;
			$this->emailErr=$emailErr;
			$this->websiteErr=$websiteErr;

			$this->name=$name;
			$this->gender=$gender;
			$this->email=$email;
			$this->website=$website;
			$this->comment=$comment;
	}
	
	//A partir de aqui se busca validar cada campo del formulario
	public function validate($name, $gender, $email, $website, $comment, $nameErr, $genderErr, $emailErr, $websiteErr){
		if (isset($this->name)) {
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) { #check if name only contains letters and whitespace
				$this->error_message = "Only letters and white space allowed";
				$this->nameErr = $this->error_message;
				#return $this->nameErr;
				return false;
			}
		} else if($name==='') {
			$this->error_message = "Name is required";
			$this->nameErr = $this->error_message;
			#return $this->nameErr;
			return false;
		}
			else { return true; }
		
		if (empty($gender)) {
			$this->error_message = "Gender is required";
			$this->genderErr = $this->error_message;
			#return $this->genderErr;
			return false;
		}
			else { return true; }
		
		if (isset($email)) {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { #check if e-mail address is well-formed
			$this->emailErr = "Invalid email format";
			$this->error_message = $this->error_message($email);
				return true;
			}
		} else {
			$this->emailErr = "Email is required";
			$this->error_message = $this->emailErr($email);
			return false;
		}
			#else { return true; }
			
		if (isset($website)) {
			// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
				$this->websiteErr = "Invalid URL";
				$this->error_message = $this->websiteErr($this->website);
				return false;
			}
						else { return true; }
		}
	}
	
	//Si algun campo no es valido, se le notificara al usuario
	public function getErrorMessage($param) {
		return $this->error_message;
    }
	
	//Este metodo lo uso para imprimir los resultados, pude haber usado tambien un metodo "__toString()"
	public function OutPut(){
		return "<h2>Your Input:</h2>".
			$this->name."<br>".
			$this->gender."<br>".
			$this->email."<br>".
			$this->website."<br>".
			$this->comment;
	}
}