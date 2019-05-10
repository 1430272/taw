<?php
if(isset($_GET["id"])){
	include ("database.php");
	$clientes = new Database();
	$res = $clientes->delete($_GET["id"]);
	if($res){
		header("location: index.php?msg=delete-success");
	} else {
		header("location: index.php?msg=delete-error");
	}
} ?>