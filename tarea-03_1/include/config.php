<?php
	$dsn = 'mysql:dbname=taw_1430272;host=localhost';
	$user = 'root';
	$password = 'root';

	try{ 
		$pdo = new PDO(	$dsn, $user, $password );
	}catch( PDOException $e ){
		echo 'Error al conectar: ' . $e->getMessage();
	}
