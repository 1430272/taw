<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//incluir la clase
		require_once 'persona.php';

		//instanciar la clase
		//Ahora en lugar de usar setters, los paso directamente al constructor de la clase persona
		$persona = new Persona($_POST["edad"], $_POST["altura"], $_POST["peso"]);
		
		//imprimir el objeto
		echo $persona;

	} else { ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="text" placeholder="Edad" name="edad" />
	<input type="text" placeholder="Altura en cms" name="altura" />
	<input type="text" placeholder="peso en kg" name="peso" />
	<input type="submit" value="Calcular" />
</form>

<?php } ?>