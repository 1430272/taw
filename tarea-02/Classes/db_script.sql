CREATE TABLE IF NOT EXISTS `alumnos` (
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

INSERT INTO `alumnos` (`id`, `id_carrera`, `matricula`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `telefono`, `estatus`) VALUES
(1, 1, 1, 'Cristian Alexander', 'Zuniga', 'Palomo', '1430272@upv.edu.mx', '0000000', 1);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `profesores` (
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

INSERT INTO `profesores` (`id`, `id_carrera`, `no_empleado`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `telefono`, `estatus`) VALUES
(1, 1, 1, 'Mario Humberto', 'Rdz', 'Chavez', '1@host.com', '0000000', 1),
(2, 2, 2, 'Karla Esmeralda', 'Vazquez', 'Ortiz', '2@host.com', '0000000', 1);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronimo` varchar(50) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `carreras` (`id`, `acronimo`, `nombre`) VALUES
(1, 'ITI', 'INGENIERIA EN TECNOLOGIAS DE LA INFORMACION'),
(2, 'IM', 'INGENIERIA EN MECATRONICA'),
(3, 'ITM', 'INGENIERIA EN TECNOLOGIAS DE MANUFACTURA'),
(4, 'ISA', 'INGENIERIA EN SISTEMAS AUTOMOTRICES'),
(5, 'PYMES', 'PEQUENAS Y MEDIANAS EMPRESAS'),
(7, 'chgn', 'Ejemplo carrera ID 7');
