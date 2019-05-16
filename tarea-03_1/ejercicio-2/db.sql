
CREATE TABLE `torneo_carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(50) NOT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `torneo_carreras` (`id_carrera`, `nombre_carrera`) VALUES
(1, 'ITI'),
(2, 'PYMES'),
(3, 'IM'),
(4, 'ISA');

-- --------------------------------------------------------

CREATE TABLE `torneo_equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(50) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `torneo_equipos` (`id_equipo`, `nombre_equipo`, `tipo`) VALUES
(1, 'Chivas', '1'),
(2, 'Cruz Azul', '1'),
(3, 'America', '2');

-- --------------------------------------------------------

CREATE TABLE `torneo_jugadores_basketball` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `matricula` int(7) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `no_torso` int(11) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `torneo_jugadores_basketball` (`id`, `nombre`, `apellido`, `matricula`, `carrera_id`, `equipo_id`, `no_torso`, `posicion`) VALUES
(1, 'Narcizo Yael', 'Alvarez', 1430200, 1, 3, 1, 'centro'),
(2, 'Gerardo', 'Luna', 1430201, 1, 3, 2, 'delantero'),
(4, 'el kevin', 'Jose 1', 1430202, 1, 1, 12, 'portero'),
(5, 'el kevin', 'Joseaa', 1430203, 1, 1, 12, 'defensa');

-- --------------------------------------------------------

CREATE TABLE `torneo_jugadores_football` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `matricula` int(7) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `no_torso` int(11) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `torneo_jugadores_football` (`id`, `nombre`, `apellido`, `matricula`, `carrera_id`, `equipo_id`, `no_torso`, `posicion`) VALUES
(1, 'Cristian J', 'Chairesa', 1253037, 1, 1, 1, 'centro'),
(2, 'Cristian1', 'Zuniga', 1109333, 2, 2, 2, 'delantero'),
(3, 'jose chuy', '', 1324295, 3, 1, 5, 'defensa'),
(4, 'Jose', 'Jose', 1010101, 1, 1, 12, 'portero'),
(6, 'a', 'b', 1920701, 1, 1, 1, 'centro');
