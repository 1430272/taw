
CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `email`, `password`, `status_id`, `user_type_id`) VALUES
(1, '1430272@upv.edu.mx', '12345678', 1, 2),
(2, '150272@upv.edu.mx', '23456789', 1, 1),
(3, '1630272@upv.edu.mx', '34567890', 2, 1);

-- --------------------------------------------------------

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `date_logged_in` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_log` (`id`, `date_logged_in`, `user_id`) VALUES
(1, '2019-05-15', 1),
(2, '2019-05-15', 1),
(3, '2019-05-15', 2),
(4, '2019-05-15', 3);

-- --------------------------------------------------------

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Final'),
(2, 'Admin');

