<?php
	include_once "config.php";
	include_once 'persona.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//incluir la clase

		//instanciar la clase
		//Ahora en lugar de usar setters, los paso directamente al constructor de la clase persona
		$persona = new Persona($_POST["edad"], $_POST["altura"], $_POST["peso"]);
		//imprimir el objeto
		echo $persona;
		$persona::registro(null,$_POST["edad"], $_POST["altura"], $_POST["peso"],null);

	} else { ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="text" placeholder="Edad" name="edad" />
	<input type="text" placeholder="Altura en cms" name="altura" />
	<input type="text" placeholder="peso en kg" name="peso" />
	<input type="submit" value="Calcular" />
</form>

<?php } ?>

<!-- Imprimir en todo momento -->
<br /><hr /><h2>Historial de calculos de IMC</h2>
	<table>
		<head>
			<tr>
				<th>ID</th>
				<th>Edad</th>
				<th>Altura (cms)</th>
				<th>Peso (kgs)</th>
				<th>IMC</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$resultados = New Persona(null,null,null,null,null);	//Mi constructor en la clase carreras recive parametros cuando se va a registrar datos nuevos, por eso para mostrar he anulado dichos parametros
		$listaResultados = Persona::mostrar();
		foreach($listaResultados as $row){ ?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->edad; ?></td>
				<td><?php echo $row->altura; ?></td>
				<td><?php echo $row->peso; ?></td>
				<td><?php echo $row->getImc(); ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>