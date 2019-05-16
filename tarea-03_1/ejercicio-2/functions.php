<?php
//Para este ejercicio en la BD solo ocupare de 2 tablas: jugadores_football, jugadores_basketball + carreras, equipos ....
//Omiti el campo 'email' solicitando la pura matricula, suponiendo que solo se agrega @upv.edu.mx
include("../include/config.php");

if(isset($_GET["task"]) && isset($_GET["id"]) && isset($_GET["lista"])){
	$lista	= $_GET["lista"];	//football=1, basketball=2
	$id		= $_GET["id"];		//La persona
	$task = $_GET["task"];	// Se refiere a la accion y/o tarea, nuevo, editar, borrar, etc
	
		if($task == "edit"){
			//TAREA > EDITAR
			$statement = $pdo->prepare("UPDATE torneo_jugadores_$lista SET nombre = :nombre, apellido = :apellido, matricula = :matricula, no_torso = :no_torso, posicion = :posicion WHERE id = :id");
			$result = $statement->execute(
				array(
					':nombre'	=>	$_POST["nombre"],
					':apellido'	=>	$_POST["apellido"],
					':matricula'	=>	$_POST["matricula"],
					':no_torso'	=>	$_POST["no_torso"],
					':posicion'	=>	$_POST["posicion"],
					':id'		=>	$_GET["id"]
				)
			);
			if(!empty($result)){
				echo '<script>alert("Datos actualizados");</script>';
			}
		}
		if($task == "delete"){
			//TAREA > BORRAR
			$statement = $pdo->prepare("DELETE FROM torneo_jugadores_$lista WHERE id = :id");
			$result = $statement->execute(array(':id'	=>	$_GET["id"]));
			if(!empty($result)){
				echo '<script>alert("Datos eliminados");</script>';
			}
		}
}

if(isset($_GET["task"]) && isset($_GET["lista"])){
	$task = $_GET["task"];
	$lista	= $_GET["lista"];
		if($task == "add" && isset($_POST["add"])){
			//TAREA >> AGREGAR
			$statement = $pdo->prepare("INSERT INTO torneo_jugadores_$lista (nombre, apellido, matricula, carrera_id, equipo_id, no_torso, posicion) VALUES (:nombre, :apellido, :matricula,  :carrera_id, :equipo_id, :no_torso, :posicion)");
			#$statement = $pdo->prepare("INSERT INTO torneo_jugadores_$lista SET nombre = :nombre, apellido = :apellido, matricula = :matricula, carrera_id = :carrera_id, equipo_id = :equipo_id, matricula = :matricula, no_torso = :no_torso, posicion = :posicion");
			$result = $statement->execute(
				array(
					':nombre'	=>	$_POST["nombre"],
					':apellido'	=>	$_POST["apellido"],
					':matricula'	=>	$_POST["matricula"],
					':carrera_id'	=>	$_POST["carrera_id"],
					':equipo_id'	=>	$_POST["equipo_id"],
					':no_torso'	=>	$_POST["no_torso"],
					':posicion'	=>	$_POST["posicion"]
				)
			);
			if(!empty($result)){
				echo '<script>alert("Datos insertados");</script>';
			} else {
				echo '<script>alert("Algo salio mal");</script>';				
			}
		}
}

//Recibe por parametro el nombre de tabla, seguido de nombre de fila (para WHERE), seguido del valor de dicha fila (=value). Ultimos 2 pueden ser NULL 
if(!function_exists("getCount")){
	function getCount($table,$field,$value){
		global $pdo;
		if($field!==NULL || $value!==NULL){
			$sql = "SELECT COUNT(*) AS count_total FROM {$table} WHERE {$field} = '{$value}' ";
		} else {
			$sql = "SELECT COUNT(*) AS count_total FROM {$table} ";		
		}
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results = $statement->fetchall();
		$getCount = $results[0]['count_total'];
		return $getCount;
	}
}

//Obsoleta... a menos que cambie los asigne encabezados y contendio a un array y cambie el orden de posicion
function showAll($table,$field,$value){
	global $pdo;

	if($field!==NULL || $value!==NULL){
		$sql = "SELECT * FROM {$table} WHERE {$field} = '{$value}' ";
	} else {
		$sql = "SELECT * FROM {$table} ";		
	}
	
	$result = $pdo->query($sql);
    $colcount = $result->columnCount();
	
    // tbody
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>');
        for ($i = 0; $i < $colcount; $i++){
            $meta = $result->getColumnMeta($i)["name"];
            echo('<td>' . $row[$meta] . '</td>');
        }
        echo('</tr>');
    }
}