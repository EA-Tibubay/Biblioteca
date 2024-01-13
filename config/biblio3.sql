-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

-- Dumping database structure for biblioteca3
CREATE DATABASE IF NOT EXISTS `biblioteca3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `biblioteca3`;

-- Dumping structure for table biblioteca3.libros
CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `anio_publicacion` int(11) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `disponibilidad` enum('disponible','prestado') NOT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- Dumping data for table biblioteca3.libros: ~24 rows (approximately)
DELETE FROM `libros`;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `editorial`, `anio_publicacion`, `genero`, `imagen`, `disponibilidad`) VALUES
	(1, 'Cien años de soledad', 'Gabriel García Márquez', 'Sudamericana', 1967, 'Ficción Literaria', '../images/cien_años_de_soledad.jpg', 'prestado'),
	(2, 'Dune de Frank Herbert', 'Frank Herbert', 'Chilton Books', 1965, ' Ciencia ficción', '../images/Dune de Frank Herbert.jpg', 'prestado'),
	(3, 'Los Pilares de la Tierra', 'Ken Follett', ' New American Library', 1989, 'Novela histórica', '../images/Los Pilares de la Tierra de Ken Follett.jpg', 'disponible'),
	(4, 'Breve historia del tiempo', 'Stephen Hawking', 'Bantam Books', 1988, 'Divulgación científica', '../images/Breve historia del tiempo de Stephen Hawking.jpg', 'disponible');
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;

-- Dumping structure for table biblioteca3.prestamos
CREATE TABLE IF NOT EXISTS `prestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_libro` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_libro` (`id_libro`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping structure for table biblioteca3.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `ci` int(11) NOT NULL,
  `correo_electronico` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipo_usuario` enum('usuario','bibliotecario','administrativo') NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table biblioteca3.usuarios: ~33 rows (approximately)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `ci`, `correo_electronico`, `clave`, `tipo_usuario`) VALUES
	(1, 'Angel', 'Tibubay', 122221, 'alias@gmail.com', '$2y$10$/Ja54Z2HX8F4nCIy5/BJAugkVs/L/T1G7pFm8pgVxsWFzb5bJeiLC', 'usuario'),
	(11, 'Brian', 'Salas', 1333331, 'brian@gmail.com', '$2y$10$M9hYp92/51W/YeV2vscRpemvtc3G.DkBGPIkUy58NP2EYyr71CFRC', 'bibliotecario'),
	(12, 'Erick', 'asdf', 43212, 'aaaa@gmail.com', '$2y$10$JGDbtYggrh4rAlJTssuCF.eNwp5QK1l1lUlVRLM0KTXp0MInbvc3i', 'bibliotecario'),
	(14, 'aaa', 'aaa', 133333, 'alias@gmail.com', '$2y$10$qjXjqsO1ST9ip6mMtx3hvO2T.VJ3gUJtBPcPIyt3wle1cfsb5J9lq', 'bibliotecario'),
	(17, 'aa', 'ggg', 1234, 'alias@gmail.com', '$2y$10$4ib81RDoBgQzlW9qGulf9.L6wY0/GGWAY3UOgj67Gbzv/QgIttfxC', 'bibliotecario'),
	(19, 'hhh', 'hhh', 1234, 'alias@gmail.com', '$2y$10$.AP6BCDB7qZDLe7J5XWecuSsd0lPZJIjpUiv/DEz2e5pLrEcqjZ16', 'usuario'),
	(20, 'hhh', 'sd', 1234, 'alias@gmail.com', '$2y$10$YCas6tLW6Qjs9vU59l5/G.feAWLmq5r83yoCf4zQ4Ku9hQMbsVl0y', 'usuario'),
	(21, 'aasas', 'asad', 324121, 'assaa@gmail.com', '$2y$10$LRBnQwZJAl5qU4nHZsYHHu.1K5ppA8Dyox2wkywFz/Ee0KscUbSDa', 'usuario'),
	(22, 'qwer', 'sd', 1234, 'alias@gmail.com', '$2y$10$La.vYf8Yfs6m0vzxTTPBBu8GKsENiiufuqJpognjt15wuG/1EapUy', 'usuario'),
	(23, 'errr', 'sd', 1234, 'alias@gmail.com', '$2y$10$vpJ41Mb9iBi7T3CE2sod7.ex13IZHGQLxZU34vIQwb6tT7dn.tyeC', 'bibliotecario'),
	(24, 'errr2', 'sd', 1234, 'alias@gmail.com', '$2y$10$rvncof80c8P9bMlpoaN8QOMWCpxMyD9HQvGuyDUXIuvD.2OJlPNbe', 'usuario'),
	(25, 'errr4', 'sd', 1234, 'alias@gmail.com', '$2y$10$fojhvpiXLtMJu2ux.UzwLeCK/xmvQUhQ0nL.6H2Zra/QEkcYjs09y', 'bibliotecario'),
	(27, 'errr6', 'sd', 1234, 'alias@gmail.com', '$2y$10$VpAA2CSy2oBTqVN0XigoteuReaqUcu.KwJkdiWCanIkVbknk3etmW', 'bibliotecario'),
	(28, 'errr7', 'sd', 1234124, 'alias@gmail.com', '$2y$10$D7nX5qaPcyLAYxzWjA2uG.tPa8WfCUHebUcsHxlXPKNk6I1fLaGhC', 'bibliotecario'),
	(29, 'errr8', 'sd', 1234124, 'alias@gmail.com', '$2y$10$ScQVsrmY2JGJjhN39wn/4uCMsCTwb3wY9E1ugLoRgYjkuL1nOYeFy', 'usuario'),
	(30, 'errr8', 'sd', 1234124, 'alias@gmail.com', '$2y$10$31rRjroA7g0xJt4vrdBaiuHec7glNYKwB9B5wL.26gS9QRK0u0Cga', 'usuario'),
	(31, 'errr9', 'sd', 1234124, 'alias@gmail.com', '$2y$10$ajVPKKDrB7KddpDhWpxA6.c4ZDnjO5VYDovCHwoj2gR4qBXni9sjy', 'usuario'),
	(32, 'errr10', 'sd', 1234124, 'alias@gmail.com', '$2y$10$0XJbkNj94McXHaX0XIoJX.4.10WnfsX1VXhdLfQz3BXGJNdgcP.sW', 'usuario'),
	(33, 'errr11', 'sd', 1234124, 'alias@gmail.com', '$2y$10$TRYBABOuNfj./La7cPFbz.o13XVO36mcJitFPQbwRRmZZIT6TDlKG', 'usuario'),
	(34, 'errr12', 'sd', 1234124, 'alias@gmail.com', '$2y$10$4baF0AW0qUvKUTsakRVXwuRho.y4kgtzNC4k110CqAOttGVSNTFEa', 'usuario'),
	(35, 'errr12', 'sd', 1234124, 'alias@gmail.com', '$2y$10$TQjwuda1xd/9hzjvoIkslO4eXW3FnRyVjQtQgCwWIzwJJcgozszM6', 'usuario'),
	(38, 'boris', 'Canaviri', 1234124, 'alias@gmail.com', '$2y$10$ZUwmeYTTC61S3Ma7oFSmvujGrvAF6jSHwr0GN34x0.06ySdA3Sc3C', 'usuario'),
	(39, 'samuel', 'asd', 1234124, 'samuel@gmail.com', '$2y$10$mGkI.PBrJ8DMuT7wjBe2h.iegcPdpMMhX915jLYhAZpeNlLM4g6i2', 'usuario');
