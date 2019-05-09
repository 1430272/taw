<?php
/*
 * Para no confundir mis practicas de clase con proyectos anteriores, usare la BD "taw_1430272", el prefijo de tabla tiende a cambiar conforme se realizen las tareas para no confundir tablas
 */

define('db_prefix', 'practica_02_');		//Definir prefijo de tablas para un mejor orden en servidor local: phpMyAdmin

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
CREATE TABLE IF NOT EXISTS `".db_prefix."imc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edad` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `imc` TEXT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";

$db=DataBase::getConnect();
$install = $db->prepare($sql_script);
$install->execute();
$install->closeCursor();
?>