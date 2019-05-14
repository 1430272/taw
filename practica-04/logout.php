<?php
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    setcookie("username", '', time() - 3600);
	header("location: index.php");	//Ya el index sabra a donde dirigir
    exit ();
} else {
    return false;
}