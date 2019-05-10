CREATE TABLE `practica_03_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo_electronico` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `practica_03_clientes`
--

INSERT INTO `practica_03_clientes` (`id`, `nombres`, `apellidos`, `telefono`, `direccion`, `correo_electronico`) VALUES
(1, 'John', 'Doe', '504 7070-7070', 'San Salvador', 'john@gmail.com'),
(2, 'Peter ', 'Parker', '504 5050-5050', 'San Jose', 'peter@gmail.com'),
(3, 'Frankin', 'Ribers', '504 8999-5550', 'Conacastes 3301 AV', 'fran@gmail.com');
