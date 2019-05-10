<?php
/*
 * Para no confundir mis practicas de clase con proyectos anteriores, usare la BD "taw_1430272", el prefijo de tabla tiende a cambiar conforme se realizen las tareas para no confundir tablas
 */

define('db_prefix', 'practica_03_');		//Definir prefijo de tablas para un mejor orden en servidor local: phpMyAdmin

class DataBase {
	private static $instance=NULL;	
	function __construct(){ }

	public static function  getConnect(){
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$instance= new PDO('mysql:host=localhost;dbname=taw_1430272','root','root',$pdo_options);
		}
		return self::$instance;
	}
}


//INSTALACION AUTOMATICA: Creando tabla(s) para este script (No recomendable, solo para propositos de demostracion)
$sql_script = "
CREATE TABLE IF NOT EXISTS `".db_prefix."clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo_electronico` varchar(64) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `".db_prefix."clientes` (`id`, `nombres`, `apellidos`, `telefono`, `direccion`, `correo_electronico`) VALUES
(1, 'John', 'Doe', '504 7070-7070', 'San Salvador', 'john@gmail.com'),
(2, 'Peter ', 'Parker', '504 5050-5050', 'San Jose', 'peter@gmail.com'),
(3, 'Fran ', 'Wilson', '504 8999-5550', 'Conacastes 3301 AV', 'fran@gmail.com');
";

$db=DataBase::getConnect();
$install = $db->prepare($sql_script);
$install->execute();
$install->closeCursor();
?>