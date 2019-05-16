<?php
include("../include/config.php");

//Reciben por parametro: nombre_de_tabla, nombre_de_fila_filtrada (WHERE), valor_buscado ( field = value )

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

function getRows($table,$field,$value){
	global $pdo;
	if($field!==NULL || $value!==NULL){
		$sql = "SELECT * FROM {$table} WHERE {$field} = '{$value}' ";
	} else {
		$sql = "SELECT * FROM {$table} ";		
	}
	
	$result = $pdo->query($sql);
    $colcount = $result->columnCount();
	
    // thead
    echo ('<table style="width:100%;"><tr>');
    for ($i = 0; $i < $colcount; $i++){
        $meta = $result->getColumnMeta($i)["name"];
        echo('<th>' . $meta . '</th>');
    }
    echo('</tr>');

    // tbody
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>');
        for ($i = 0; $i < $colcount; $i++){
            $meta = $result->getColumnMeta($i)["name"];
            echo('<td>' . $row[$meta] . '</td>');
        }
        echo('</tr>');
    }

    echo ('</table>');

}


?>