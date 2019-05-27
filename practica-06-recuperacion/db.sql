CREATE TABLE IF NOT EXISTS `practica_06_recuperacion_alumnos` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(7) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `practica_06_recuperacion_alumnos` (`id`, `matricula`, `id_carrera`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `estado`) VALUES
(1, '1430272', 1, 'Cristian Alexander', 'Zuniga', 'Palomo', '1430272@upv.edu.mx', 1);

CREATE TABLE IF NOT EXISTS `practica_06_recuperacion_profesores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_empleado` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `practica_06_recuperacion_carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronimo` varchar(50) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `practica_06_recuperacion_carreras` (`id`, `acronimo`, `nombre`) VALUES
(1, 'ITI', 'INGENIERIA EN TECNOLOGIAS DE LA INFORMACION'),
(2, 'IM', 'INGENIERIA EN MECATRONICA'),
(3, 'ITM', 'INGENIERIA EN TECNOLOGIAS DE MANUFACTURA'),
(4, 'ISA', 'INGENIERIA EN SISTEMAS AUTOMOTRICES'),
(5, 'PYMES', 'PEQUENAS Y MEDIANAS EMPRESAS');


CREATE TABLE `practica_06_recuperacion_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `practica_06_recuperacion_users` (`id`, `username`, `fullname`, `password`, `created_at`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '2019-05-27 00:00:00');
