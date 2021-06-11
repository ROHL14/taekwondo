-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-06-2021 a las 01:13:17
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taekwondo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fechanac` date NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `id_cinta` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `FK_alumno-horario` (`id_horario`),
  KEY `FK_alumno-cinta` (`id_cinta`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre`, `apellido`, `fechanac`, `email`, `telefono`, `foto`, `estado`, `id_cinta`, `id_horario`) VALUES
(13, 'Alumno 1', 'Prueba 1', '2000-01-21', 'alumno1@gmail.com', '72786567', NULL, 'activo', 1, 5),
(14, 'Alumno 2', 'Prueba 2', '2005-04-30', 'alumno2@gmail.com', '72788899', NULL, 'activo', 1, 4),
(15, 'Alumno 3', 'Prueba 3', '1998-06-16', 'alumno3@gmail.com', '72847141', NULL, 'activo', 7, 5),
(16, 'Alumno 4', 'Prueba 4', '2003-07-28', 'alumno4@gmail.com', '72756453', NULL, 'activo', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `FK_asis-alumno` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `id_alumno`) VALUES
(24, '2021-06-01', 15),
(25, '2021-06-01', 13),
(26, '2021-06-02', 16),
(27, '2021-06-02', 15),
(28, '2021-06-03', 16),
(29, '2021-06-03', 15),
(30, '2021-06-03', 13),
(31, '2021-06-04', 16),
(32, '2021-06-04', 15),
(33, '2021-06-04', 13),
(34, '2021-06-05', 13),
(35, '2021-06-07', 14),
(36, '2021-06-07', 16),
(37, '2021-06-07', 15),
(38, '2021-06-07', 13),
(42, '2021-06-10', 16),
(43, '2021-06-10', 15),
(44, '2021-06-10', 13),
(45, '2021-06-09', 16),
(46, '2021-06-09', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Cascos'),
(2, 'Petos'),
(3, 'Espinilleras'),
(9, 'Colchones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cintas`
--

DROP TABLE IF EXISTS `cintas`;
CREATE TABLE IF NOT EXISTS `cintas` (
  `id_cinta` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cinta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cintas`
--

INSERT INTO `cintas` (`id_cinta`, `color`) VALUES
(1, 'Blanca'),
(3, 'Amarilla'),
(5, 'Verde'),
(6, 'Azul'),
(7, 'Roja'),
(8, 'Negra'),
(10, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `equipo` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `FK_equipo-cate` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `equipo`, `stock`, `id_categoria`) VALUES
(4, 'prueba 1', 10, 1),
(6, 'prueba 2', 20, 2),
(7, 'prueba 3', 5, 3),
(8, 'prueba 45', 10, 1),
(9, 'prueba 5', 5, 2),
(10, 'prueba 6', 15, 3),
(12, 'prueba 7', 15, 1),
(15, 'Casco para niÃ±os', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  `nombre_horario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `hora`, `nombre_horario`) VALUES
(4, '17:00:00', 'Horario 1'),
(5, '18:30:00', 'Horario 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `pais`) VALUES
(1, 'El Salvador'),
(3, 'Honduras'),
(4, 'Guatemala'),
(6, 'Nicaragua'),
(7, 'PanamÃ¡');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

DROP TABLE IF EXISTS `participantes`;
CREATE TABLE IF NOT EXISTS `participantes` (
  `id_participante` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_torneo` int(11) NOT NULL,
  PRIMARY KEY (`id_participante`),
  KEY `FK_par-alumno` (`id_alumno`),
  KEY `FK_par-torneo` (`id_torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id_participante`, `id_alumno`, `id_torneo`) VALUES
(29, 14, 6),
(31, 16, 6),
(33, 14, 10),
(34, 15, 10),
(35, 16, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `estado_prestamo` enum('prestado','entregado') NOT NULL,
  PRIMARY KEY (`id_prestamo`),
  KEY `FK_prestamo-alumno` (`id_alumno`),
  KEY `FK_prestamo-equipo` (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_alumno`, `id_equipo`, `estado_prestamo`) VALUES
(18, 13, 4, 'prestado'),
(19, 14, 4, 'prestado'),
(20, 16, 8, 'entregado'),
(23, 13, 15, 'prestado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

DROP TABLE IF EXISTS `torneos`;
CREATE TABLE IF NOT EXISTS `torneos` (
  `id_torneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_torneo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado_torneo` enum('pendiente','realizado') NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_torneo`),
  KEY `FK_torneo-pais` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id_torneo`, `nombre_torneo`, `fecha`, `direccion`, `estado_torneo`, `id_pais`) VALUES
(5, 'Toreno Nacional', '2021-06-30', 'San Salvador', 'pendiente', 1),
(6, 'Toreno de Prueba', '2021-06-20', 'Santa Ana', 'pendiente', 1),
(7, 'Toreno de Prueba 2', '2021-06-27', 'Ahuachapan', 'pendiente', 1),
(10, 'Toreno de Prueba 5', '2021-06-11', 'Chalchuapa', 'pendiente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` smallint(6) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `tipo`, `nombres`, `apellidos`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrador', 'Principal'),
(10, 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 2, 'Usuario', 'Prueba'),
(11, 'user1', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 'Usuario', 'Prueba');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `FK_alumno-cinta` FOREIGN KEY (`id_cinta`) REFERENCES `cintas` (`id_cinta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_alumno-horario` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `FK_asis-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `FK_equipo-cate` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `FK_par-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_par-torneo` FOREIGN KEY (`id_torneo`) REFERENCES `torneos` (`id_torneo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `FK_prestamo-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_prestamo-equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD CONSTRAINT `FK_torneo-pais` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
