CREATE TABLE `practica_05_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `practica_05_users` (`id`, `username`, `fullname`, `password`, `created_at`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '2019-05-19 09:05:05'),
(2, '222', '', 'bcbe3365e6ac95ea2c0343a2395834dd', '2019-05-26 12:30:08'),
(3, '333', '', '310dcbbf4cce62f762a2aaa148d556bd', '2019-05-26 12:33:02');

-- --------------------------------------------------------

CREATE TABLE `practica_06_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `practica_06_clientes` (`id`, `nombre_completo`, `email`, `telefono`) VALUES
(1, 'ABCD', 'a@host.com', '12310');
(2, 'DEFG', 'b@host.com', '12310');
(3, 'HIJK', 'c@host.com', '12310');

-- --------------------------------------------------------

CREATE TABLE `practica_06_habitaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `piso` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `estatus` int(11) NOT NULL COMMENT 'Desocupado, Ocupado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `practica_06_habitaciones` (`id`, `piso`, `tipo`, `precio`, `estatus`) VALUES
(1, 1, 1, 100, 1),
(2, 1, 1, 100, 1),
(3, 1, 2, 200, 1),
(4, 4, 3, 300, 0),
(5, 2, 3, 300, 0);

CREATE TABLE `practica_06_habitaciones_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_habitacion` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `practica_06_habitaciones_img` (`id`, `id_habitacion`, `ruta`) VALUES
(1, 1, 'fotos/01/1.jpg'),
(2, 1, 'fotos/01/2.jpg'),
(3, 2, 'fotos/02/1.jpg'),
(4, 3, 'fotos/03/1.jpg'),
(5, 3, 'fotos/03/2.jpg'),
(6, 4, 'fotos/04/1.jpg');

-- --------------------------------------------------------

CREATE TABLE `practica_06_reservaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_habitacion` varchar(45) DEFAULT NULL,
  `monto_pagado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE `practica_06_tipo_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) DEFAULT NULL,
  `minimo_num_visitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `practica_06_tipo_clientes` (`id`, `categoria`, `minimo_num_visitas`) VALUES
(1, 'Habitual', 10),
(2, 'Esporadico', 0);

-- --------------------------------------------------------

CREATE TABLE `practica_06_tipo_habitaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `practica_06_tipo_habitaciones` (`id`, `categoria`) VALUES
(1, 'Simple'),
(2, 'Doble'),
(3, 'Matrimonial');
