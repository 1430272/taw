CREATE TABLE IF NOT EXISTS `practica_07_alumnos` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(7) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `practica_07_alumnos`
--

INSERT INTO `practica_07_alumnos` (`id`, `matricula`, `id_carrera`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `estado`) VALUES
(1, '1430272', 1, 'Cristian Alexander', 'Zuniga', 'Palomo', '1430272@upv.edu.mx', 1),
(2, '111', 1, '1', '1', '1', 'a@a.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_07_alumno_pertenece_grupo`
--

CREATE TABLE IF NOT EXISTS `practica_07_alumno_pertenece_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_07_carreras`
--

CREATE TABLE IF NOT EXISTS `practica_07_carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronimo` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `practica_07_carreras`
--

INSERT INTO `practica_07_carreras` (`id`, `acronimo`, `nombre`) VALUES
(1, 'ITI', 'INGENIERIA EN TECNOLOGIAS DE LA INFORMACION'),
(2, 'IM', 'INGENIERIA EN MECATRONICA'),
(3, 'ITM', 'INGENIERIA EN TECNOLOGIAS DE MANUFACTURA'),
(4, 'ISA', 'INGENIERIA EN SISTEMAS AUTOMOTRICES'),
(5, 'PYMES', 'PEQUENAS Y MEDIANAS EMPRESAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_07_grupos`
--

CREATE TABLE IF NOT EXISTS `practica_07_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrera` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_07_materias`
--

CREATE TABLE IF NOT EXISTS `practica_07_materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_07_profesores`
--

CREATE TABLE IF NOT EXISTS `practica_07_profesores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_empleado` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_07_usuarios`
--

CREATE TABLE IF NOT EXISTS `practica_07_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
