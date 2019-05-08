<?php
if(isset($_GET["ver"]) && $_GET["ver"]=='resultados' && isset($_GET["total"])){
	//3. Crear una vista para imprimir resultados, el GET recive el total de alumnos para generar un bucle FOR, basado en el paso 2.
	
	$relacion_alumno_califs = array();
	$fila = ""; $u1 = ""; $u2 = ""; $u3 = "";

	for($t=1; $t<=$_GET["total"]; $t++){
		if(isset($_POST["nombre_alumno_".$t]) && isset($_POST["unidad_1_".$t]) && isset($_POST["unidad_2_".$t]) && isset($_POST["unidad_3_".$t])){
			$fila = $_POST["nombre_alumno_".$t]; $u1 = $_POST["unidad_1_".$t]; $u2 = $_POST["unidad_2_".$t]; $u3 = $_POST["unidad_3_".$t];;
			if(isset($fila)){
				$relacion_alumno_califs[] = array($fila, $u1,$u2,$u3);
			}
		}
	}
	
	//print_r($relacion_alumno_califs); //test. el array se rellena correctamente
	
	//una vez se tiene el array, se manda dicho array como parametro al objeto instanciado
	require_once "primedio.php";	//se que era promedio.php pero en la tarea decia claramente "primedio.php"
	$alumno = New Primedio($relacion_alumno_califs);	//Instancia de clase del mismo nombre del fichero
	//echo $alumno->promedio(); //Este si lo llame yo como es debido
	echo $alumno->manejar_array();	

} else {


	//1. Solicitamos la cantiadad de alumnos
	if(empty($_POST["solicitar_no_alumnos"])){ ?>
		<form action="" method="post">
			<input type="text" name="no_alumnos" placeholder="numero de alumnos">
			<input type="submit" name="solicitar_no_alumnos" value="solicitar">
		</form>
	<?php
	} else {
		if(empty($_POST["guardar"])){
			echo '<form action="?ver=resultados&total='.$_POST["no_alumnos"].'" method="post"><table><thead><tr><th colspan="2">Nombre del alumno</th><th>Unidad 1</th><th>Unidad 2</th><th>Unidad 3</th></tr></thead><tbody>';
			
			//2. Cuando se manda una solicitud $_POST preguntamos los nombres de alumnos y sus respectivas calificaciones por unidad en filas
			for($a=1; $a<=$_POST["no_alumnos"]; $a++){
				echo '<tr><td>'.$a.'</td><td><input type="text" name="nombre_alumno_'.$a.'" size="24"></td><td><input type="text" name="unidad_1_'.$a.'" size="4"></td><td><input type="text" name="unidad_2_'.$a.'" size="4"></td><td><input type="text" name="unidad_3_'.$a.'" size="4"></td></tr>';
			}
			echo '<tr><td colspan="4">&nbsp;</td><td><input type="submit" value="guardar" name="guardar"></td></tr></tbody></table></form>';		
		} else {
			
		}
	}

}
		 
	/*	//ver resultados
		echo '<table><thead><tr><th colspan="2">Nombre del alumno</th><th>Unidad 1</th><th>Unidad 2</th><th>Unidad 3</th></tr></thead><tbody>';
		echo '<tr><td>'.$_POST["nombre_alumno_".$a].'</td><td><input type="text" name="nombre_alumno_'.$a.'" size="24"></td><td><input type="text" name="unidad_1_'.$a.'" size="4"></td><td><input type="text" name="unidad_2_'.$a.'" size="4"></td><td><input type="text" name="unidad_3_'.$a.'" size="4"></td></tr>';
		echo '</tbody></table></form>'; */