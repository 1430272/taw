<?php
/*
 * Para no confundir mis practicas de clase con proyectos anteriores, usare la BD "taw_1430272", el prefijo de tabla tiende a cambiar conforme se realizen las tareas para no confundir tablas
 */

define('db_prefix', 'tarea_02_');		//Definir prefijo de tablas para un mejor orden en servidor local: phpMyAdmin

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
CREATE TABLE IF NOT EXISTS `".db_prefix."alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrera` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `".db_prefix."alumnos` (`id`, `id_carrera`, `matricula`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `telefono`, `estatus`) VALUES
(1, 1, 1430272, 'Cristian Alexander', 'Zuniga', 'Palomo', '1430272@upv.edu.mx', '0000000', 1);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `".db_prefix."profesores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrera` int(11) NOT NULL,
  `no_empleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `".db_prefix."profesores` (`id`, `id_carrera`, `no_empleado`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `telefono`, `estatus`) VALUES
(1, 1, 1, 'Mario Humberto', 'Rdz', 'Chavez', '1@host.com', '0000000', 1),
(2, 2, 2, 'Karla Esmeralda', 'Vazquez', 'Ortiz', '2@host.com', '0000000', 1);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `".db_prefix."carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronimo` varchar(50) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `".db_prefix."carreras` (`id`, `acronimo`, `nombre`) VALUES
(1, 'ITI', 'INGENIERIA EN TECNOLOGIAS DE LA INFORMACION'),
(2, 'IM', 'INGENIERIA EN MECATRONICA'),
(3, 'ITM', 'INGENIERIA EN TECNOLOGIAS DE MANUFACTURA'),
(4, 'ISA', 'INGENIERIA EN SISTEMAS AUTOMOTRICES'),
(5, 'PYMES', 'PEQUENAS Y MEDIANAS EMPRESAS'),
(7, 'chgn', 'Ejemplo carrera ID 7');

";

$db=DataBase::getConnect();
$install = $db->prepare($sql_script);
$install->execute();
$install->closeCursor();
?>