-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-10-2013 a las 01:02:06
-- Versión del servidor: 5.5.32-cll
-- Versión de PHP: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gridsoa_asistentic`
--

DELIMITER $$
--
-- Procedimientos
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudiente`
--

CREATE TABLE IF NOT EXISTS `acudiente` (
  `id_acudiente` int(11) NOT NULL AUTO_INCREMENT,
  `prinom_acu` varchar(50) NOT NULL,
  `segnom_acu` varchar(50) DEFAULT NULL,
  `priape_acu` varchar(50) NOT NULL,
  `segape_acu` varchar(50) DEFAULT NULL,
  `tipo_docu_acu` varchar(3) NOT NULL,
  `num_docu_acu` varchar(20) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(60) NOT NULL,
  `pass_acu` text,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_acudiente`),
  UNIQUE KEY `num_docu_acu` (`num_docu_acu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `acudiente`
--

INSERT INTO `acudiente` (`id_acudiente`, `prinom_acu`, `segnom_acu`, `priape_acu`, `segape_acu`, `tipo_docu_acu`, `num_docu_acu`, `telefono`, `direccion`, `pass_acu`, `email`) VALUES
(1, 'marta', '', 'sanchez', '', 'CC', '123456789', '4455421', 'calle 15 # 9-51', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', ''),
(2, 'ana', '', 'cruz', '', 'CC', '965584411', '2489956', 'manzana 1 casa 1 arcabal', '53c2fc05431848b9eed14937be9ac25300269cdc', ''),
(3, 'carlos', '', 'sanchez', '', 'CC', '65456445', '7258956', 'carrera 13 # 10-25', '776e873578a0c2777ec3ef41112d32ed405df1fc', ''),
(4, 'maria', '', 'sanchez', '', 'CC', '925411', '3142599958', 'calle 1 # 10-25', 'ce8bbbafcf0c51986c010280005b60ee05af7bde', ''),
(5, 'luz', '', 'mendez', '', 'CC', '545887744', '2458745', 'manzana i casa 3 cafasur', '3c2b8a4e17ae0d7ec5500861306398498d87bf45', ''),
(6, 'luis', '', 'Gonzales', '', 'CC', '4554488', '2391052', 'carrera 3 # 1-25', '93c34c62eb1086d0b19817242cdd263ed05f95ba', ''),
(7, 'alvaro', '', 'cruz', '', 'CC', '7788944556', '45422178', 'manzana 1 casa 12 san rafael', '34e9a31048ce783f92a141c7ef215043798a00c7', ''),
(8, 'ana', 'sofia', 'salazar', '', 'CC', '88741125', '2482121', 'calle 8 # 7-51', '712a0d442c385ceae863c50aa664f7b0a5831ec0', ''),
(10, 'Oscar', '', 'sanchez', '', 'CC', '8877455', '7259845', 'carrera 5 # 15-42', '6c878fcdaab30014b9f9770e1f10c5287f3b4d94', ''),
(11, 'luis', '', 'Espinoza', '', 'CC', '78899552', '2145987', 'calle 8 # 10 - 25 Centro', '37664a0b6111fca5e2311353893367677bd046f9', ''),
(12, 'luis', '', 'Diaz', '', 'CC', '5221100223', '7889541', 'manzana a casa 3 cafasur', 'd053013a7f66dd105d6f368232f41ef78ee7f07c', ''),
(15, 'Pedro', '', 'Cuellar', '', 'CC', '20616988', '3112638155', 'mz b2 casa 1', '606001226ccf614b4d7134f2b7dd326987257642', 'andres@netmasters.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `prinom_al` varchar(50) NOT NULL,
  `segnom_al` varchar(50) DEFAULT NULL,
  `priape_al` varchar(50) NOT NULL,
  `segape_al` varchar(50) DEFAULT NULL,
  `tipo_docu_al` varchar(2) NOT NULL,
  `num_docu_al` varchar(20) NOT NULL,
  `fech_nac` date NOT NULL,
  `retirado` tinyint(1) DEFAULT '0',
  `fech_retiro` date DEFAULT NULL,
  `causa_retiro` text,
  `id_grupo` tinyint(4) NOT NULL,
  `num_id_acudiente` varchar(20) NOT NULL,
  `rh` varchar(3) NOT NULL,
  `seguridad_social` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sexo` varchar(9) NOT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `num_docu_al` (`num_docu_al`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `prinom_al`, `segnom_al`, `priape_al`, `segape_al`, `tipo_docu_al`, `num_docu_al`, `fech_nac`, `retirado`, `fech_retiro`, `causa_retiro`, `id_grupo`, `num_id_acudiente`, `rh`, `seguridad_social`, `foto`, `sexo`) VALUES
(1, 'Roberto', 'Andres', 'Diaz', 'Ricardo', 'CC', '20616988', '1988-11-21', 0, NULL, NULL, 3, '20616988', 'O+', 'Coomeva', 'roberto.jpg', '1'),
(2, 'Juan', 'Sebastian', 'Cruz', 'Perdomo', 'TI', '1120025', '2001-05-01', 0, NULL, NULL, 3, '20616988', 'O+', 'comparta', 'sebastian.jpg', '1'),
(3, 'Nayibe', 'Soraya', 'Sanchez', 'Leon', 'TI', '87452212', '1998-05-05', 0, NULL, NULL, 3, '20616988', 'A-', 'sisben', 'nayibe.jpg', '2'),
(4, 'Cristhian', 'Camilo', 'Garcia', 'Sanchez', 'TI', '1005532', '2001-04-22', 0, NULL, NULL, 4, '925411', 'A+', 'comparta', 'camilo.jpg', '1'),
(5, 'Jessica', '', 'Gomez', '', 'TI', '155588997', '2003-01-12', 0, NULL, NULL, 3, '112233566698', 'B+', 'caprecom', 'hermosa.jpg', '2'),
(6, 'Carlos ', '', 'Arias', '', 'RC', '55147466', '2006-06-05', 0, NULL, NULL, 6, '4554488', 'A+', 'sisben', '', '1'),
(7, 'Maria', '', 'Corredor', '', 'TI', '88854477', '1999-04-24', 0, NULL, NULL, 8, '2147483647', 'B-', 'comparta', '', '2'),
(8, 'Esteban', '', 'Salazar', '', 'TI', '587744112', '1999-05-05', 0, NULL, NULL, 7, '88741125', 'AB+', 'sisben', '', '1'),
(9, 'Jessica', '', 'Salazar', '', 'TI', '4455774122', '1999-04-27', 0, NULL, NULL, 9, '4554488', 'AB-', 'sisben', '', '2'),
(10, 'Amparo', '', 'Diaz', '', 'TI', '788998555', '2002-05-04', 0, NULL, NULL, 10, '8877455', 'O+', 'comparta', '', '2'),
(11, 'Marcos', '', 'Espinoza', '', 'TI', '7895641', '1996-05-15', 0, NULL, NULL, 11, '78899552', 'B+', 'sisben', '', '1'),
(12, 'Andres', '', 'Diaz', '', 'TI', '8323952', '1995-05-01', 0, NULL, NULL, 12, '2147483647', 'AB+', 'comparta', '', '1'),
(13, 'Carlos ', '', 'Lara', '', 'TI', '44555222', '1998-05-06', 0, NULL, NULL, 12, '2147483647', 'O-', 'sisben', '', '1'),
(15, 'Jose', '', 'Caroso', '', 'TI', '9205230311', '2006-12-23', 0, NULL, NULL, 4, '20616988', 'O+', 'Coomeva', '9ffb7d_9205230311.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id_asignatura` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_asignatura` varchar(100) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nom_asignatura`) VALUES
(2, 'Educaci&Atilde;&sup3;n F&Atilde;&shy;sica '),
(3, 'Sistemas'),
(4, 'Biolog&Atilde;&shy;a '),
(5, 'C&Atilde;&iexcl;lculo'),
(6, 'Historia'),
(7, 'Tr&Atilde;&shy;gonometria'),
(8, 'Lengua Castellana'),
(9, 'Ingl&Atilde;&copy;s'),
(10, 'Geograf&Atilde;&shy;a '),
(11, '&Atilde;‰tica y Valores'),
(12, 'Filosof&Atilde;&shy;a '),
(13, 'F&Atilde;&shy;sica '),
(14, 'Qu&Atilde;&shy;mica ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asign_academica`
--

CREATE TABLE IF NOT EXISTS `asign_academica` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` tinyint(4) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_asignatura` tinyint(4) NOT NULL,
  `lunes` tinyint(1) DEFAULT NULL,
  `hora_inicio_lunes` time DEFAULT NULL,
  `hora_fin_lunes` time DEFAULT NULL,
  `martes` tinyint(1) DEFAULT NULL,
  `hora_inicio_martes` time DEFAULT NULL,
  `hora_fin_martes` time DEFAULT NULL,
  `miercoles` tinyint(1) DEFAULT NULL,
  `hora_inicio_miercoles` time DEFAULT NULL,
  `hora_fin_miercoles` time DEFAULT NULL,
  `jueves` tinyint(1) DEFAULT NULL,
  `hora_inicio_jueves` time DEFAULT NULL,
  `hora_fin_jueves` time DEFAULT NULL,
  `viernes` tinyint(1) DEFAULT NULL,
  `hora_inicio_viernes` time DEFAULT NULL,
  `hora_fin_viernes` time DEFAULT NULL,
  `sabado` tinyint(1) DEFAULT NULL,
  `hora_inicio_sabado` time DEFAULT NULL,
  `hora_fin_sabado` time DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`),
  UNIQUE KEY `id_grupo,id_docente,id_asignatura` (`id_grupo`,`id_docente`,`id_asignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Volcado de datos para la tabla `asign_academica`
--

INSERT INTO `asign_academica` (`id_asignacion`, `id_grupo`, `id_docente`, `id_asignatura`, `lunes`, `hora_inicio_lunes`, `hora_fin_lunes`, `martes`, `hora_inicio_martes`, `hora_fin_martes`, `miercoles`, `hora_inicio_miercoles`, `hora_fin_miercoles`, `jueves`, `hora_inicio_jueves`, `hora_fin_jueves`, `viernes`, `hora_inicio_viernes`, `hora_fin_viernes`, `sabado`, `hora_inicio_sabado`, `hora_fin_sabado`) VALUES
(1, 1, 4, 2, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '06:00:00', '07:00:00'),
(2, 1, 5, 3, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '07:00:00', '08:00:00'),
(3, 1, 6, 4, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '08:00:00', '09:00:00'),
(4, 1, 7, 5, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '09:00:00', '10:00:00'),
(5, 1, 8, 6, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '10:00:00', '11:00:00'),
(6, 1, 9, 7, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '11:00:00', '12:00:00'),
(7, 1, 10, 8, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '12:00:00', '13:00:00'),
(8, 1, 11, 9, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '14:00:00', '15:00:00'),
(9, 1, 12, 10, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '16:00:00'),
(10, 1, 13, 11, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '16:00:00', '17:00:00'),
(11, 1, 14, 12, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '17:00:00', '18:00:00'),
(12, 1, 15, 13, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '18:00:00', '19:00:00'),
(13, 2, 4, 2, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '06:00:00', '07:00:00'),
(14, 2, 5, 3, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '07:00:00', '08:00:00'),
(15, 2, 6, 4, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '08:00:00', '09:00:00'),
(16, 2, 7, 5, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '09:00:00', '10:00:00'),
(17, 2, 8, 6, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '10:00:00', '11:00:00'),
(18, 2, 10, 7, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '12:00:00', '13:00:00'),
(19, 2, 11, 9, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '13:00:00', '14:00:00'),
(20, 2, 12, 10, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '14:00:00', '15:00:00'),
(21, 2, 13, 11, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '16:00:00'),
(22, 2, 14, 12, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '16:00:00', '17:00:00'),
(23, 2, 15, 13, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '18:00:00', '19:00:00'),
(24, 3, 16, 2, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '04:00:00', '06:00:00', 1, '02:00:00', '03:00:00'),
(25, 3, 16, 3, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '07:00:00', '08:00:00'),
(26, 3, 16, 4, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '08:00:00', '09:00:00'),
(27, 3, 16, 5, 0, '00:00:00', '00:00:00', 1, '03:00:00', '04:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '23:00:00', '23:59:00', 1, '15:00:00', '18:00:00'),
(28, 3, 16, 6, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '10:00:00', '11:00:00'),
(30, 3, 16, 7, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '12:00:00', '13:00:00'),
(31, 3, 16, 9, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '13:00:00', '00:00:14'),
(32, 3, 16, 10, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '14:00:00', '15:00:00'),
(33, 3, 16, 11, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '16:00:00'),
(34, 3, 16, 12, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '16:00:00', '17:00:00'),
(35, 3, 16, 13, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '17:00:00', '18:00:00'),
(36, 4, 4, 2, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '06:00:00', '07:00:00'),
(38, 4, 5, 3, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '07:00:00', '08:00:00'),
(39, 4, 6, 4, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '08:00:00', '09:00:00'),
(40, 4, 7, 5, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '09:00:00', '10:00:00'),
(41, 4, 8, 6, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '10:00:00', '11:00:00'),
(42, 4, 9, 7, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '11:00:00', '12:00:00'),
(43, 4, 10, 8, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '12:00:00', '13:00:00'),
(44, 4, 11, 9, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '13:00:00', '14:00:00'),
(45, 4, 12, 10, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '14:00:00', '15:00:00'),
(46, 4, 13, 11, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '15:00:00', '16:00:00'),
(47, 4, 14, 12, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '16:00:00', '17:00:00'),
(48, 4, 15, 13, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '18:00:00', '19:00:00'),
(49, 5, 4, 2, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '06:00:00', '07:00:00'),
(50, 5, 5, 3, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '07:00:00', '08:00:00'),
(51, 5, 6, 4, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '08:00:00', '09:00:00'),
(52, 5, 7, 5, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '09:00:00', '10:00:00'),
(53, 5, 8, 6, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '10:00:00', '11:00:00'),
(54, 5, 9, 7, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '11:00:00', '12:00:00'),
(55, 5, 10, 8, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '12:00:00', '13:00:00'),
(56, 5, 11, 9, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '13:00:00', '14:00:00'),
(57, 5, 12, 10, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '14:00:00', '15:00:00'),
(58, 5, 13, 11, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '15:00:00', '16:00:00'),
(59, 5, 14, 12, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '16:00:00', '17:00:00'),
(60, 5, 15, 13, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '18:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_alumno` int(11) NOT NULL,
  `id_asignacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `asistencia` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_alumno`,`id_asignacion`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_institucionales`
--

CREATE TABLE IF NOT EXISTS `datos_institucionales` (
  `nom_institucion` varchar(100) NOT NULL DEFAULT 'xxxx',
  `nit_institucion` varchar(20) NOT NULL DEFAULT 'xxxx',
  `dir_institucion` varchar(50) NOT NULL DEFAULT 'xxxx',
  `tel_institucion` varchar(15) NOT NULL DEFAULT 'xxxx',
  `mun_institucion` varchar(100) NOT NULL DEFAULT 'xxxx',
  `dep_institucion` varchar(100) NOT NULL DEFAULT 'xxxx'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_institucionales`
--

INSERT INTO `datos_institucionales` (`nom_institucion`, `nit_institucion`, `dir_institucion`, `tel_institucion`, `mun_institucion`, `dep_institucion`) VALUES
('Instituci&Atilde;&sup3;n Educativa T&Atilde;&copy;cnica Felix Tiberio Guzm&Atilde;&iexcl;n ', '55020889985', 'Carrera 10 # 16-50', '123456789', 'Espinal', 'Tolima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `prinom_doc` varchar(50) NOT NULL,
  `segnom_doc` varchar(50) DEFAULT NULL,
  `priape_doc` varchar(50) NOT NULL,
  `segape_doc` varchar(50) DEFAULT NULL,
  `email_doc` varchar(50) NOT NULL,
  `pass_doc` text NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_docente`),
  UNIQUE KEY `email_doc` (`email_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `prinom_doc`, `segnom_doc`, `priape_doc`, `segape_doc`, `email_doc`, `pass_doc`, `admin`) VALUES
(1, 'Roberto', 'Andres', 'Diaz', 'Ricardo', 'robertoandresdiaz@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1),
(2, 'Juan', 'Sebastian', 'Cruz', 'Perdomo', 'jscruzper@outlook.com', 'f8a55ab062baae0f383d0a4d161d9ed53043d656', 1),
(3, 'Cristhian', 'Camilo ', 'Garcia', 'Sanchez', 'cristhiang_0422@hotmail.com', '45db86935f290900e3057a4765b48a03bed4d7cb', 1),
(4, 'Carlos', '', 'Perez', 'sosa', 'ffjh@hjgjjdg.com', '3d464fc8701eccca088afc2ccf2457e56755cccd', 0),
(5, 'Juan', '', 'gonzalez', 'vargas', 'hhjdsj@jfjhfs.com', '50c26bbd291af6388f90e1eafe76cc000feb7229', 0),
(6, 'Andrea', '', 'galindo', '', 'hjkjsfd@hjksdfakj.com', '3c3a0dd481ab7c72c454db2e22d6fd9bac1f15f5', 0),
(7, 'Edna', '', 'vargas', 'lopez', 'jhfj@hjsf.com', 'edaf6c01d5c3f93a4c080576efba475f6c140879', 0),
(8, 'Zulma', '', 'prada', 'yepes', 'jdjkdfsjk@hdsfjkfsd.com', '12d285e6c6d82c4d55e83a6cf04015d691aa8425', 0),
(9, 'Camilo', '', 'sanchez', 'nu&Atilde;&plusmn;ez', 'hjsdf@jd.com', '32de1e566f074335eaf5a99fedba43204c6db12a', 0),
(10, 'Andres', '', 'corredor', 'losada', 'sdfhjdf@djd.com', '850b143293965de847f45ea2d4a7ebb53c59a3ae', 0),
(11, 'Hector', '', 'ortiz', 'garzon', 'dfu@hdj.com', 'e18fc62de7a3b10b36c6d17fb5e961d635718cb6', 0),
(12, 'Lionel', 'andres', 'messi', 'Cuccittini', 'jhsdfhj@dhfd.com', '4ae64f83a12bf8893f4127760c300a0ec3cfcf9e', 0),
(13, 'Carlos', 'andres', 'gonzalez', 'losada', 'dii@dfi.com', '91fbdc544f6329aeb83c9d2a6e59898dd0070191', 0),
(14, 'Camilo', 'andres', 'ortiz', 'nu&Atilde;&plusmn;ez', 'ieiie@jdo.com', 'fd01e57777f3293f87fe710e47cc334817be3886', 0),
(15, 'Andrea', 'fernanda', 'corredor', 'garzon', 'iefn@ei.com', 'b87910ea10c2395b934a55912dd61c5ffba51f13', 0),
(16, 'Camilo', '', 'Garcia', 'Sanchez', 'kmilo.g0422@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 0),
(17, 'Nayibe', 'Soraya', 'Sanchez', 'Le&Atilde;&sup3;n ', 'nsanchez@itfip.edu.co', '34d917c038b66e0cca68ac0943e4e95a3ca47249', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
  `id_grado` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_grado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nom_grado`) VALUES
(1, 'Sexto'),
(2, 'S&Atilde;&copy;ptimo'),
(3, 'Octavo'),
(4, 'Noveno'),
(5, 'D&Atilde;&copy;cimo'),
(6, 'Once');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_grupo` varchar(6) NOT NULL,
  `id_grado` tinyint(4) NOT NULL,
  `id_jornada` tinyint(4) NOT NULL,
  `id_sede` tinyint(4) NOT NULL,
  `id_director` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nom_grupo`, `id_grado`, `id_jornada`, `id_sede`, `id_director`) VALUES
(1, '601', 1, 1, 1, 4),
(2, '602', 1, 1, 1, 5),
(3, '701', 2, 1, 1, 6),
(4, '702', 2, 1, 1, 7),
(5, '801', 3, 1, 1, 8),
(6, '802', 3, 1, 1, 9),
(7, '902', 4, 1, 1, 10),
(8, '901', 4, 1, 1, 11),
(9, '1001', 5, 1, 1, 12),
(10, '1002', 5, 1, 1, 13),
(11, '1101', 6, 1, 1, 14),
(12, '1102', 6, 1, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE IF NOT EXISTS `jornadas` (
  `id_jornada` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_jornada` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jornada`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id_jornada`, `nom_jornada`) VALUES
(1, 'Ma&Atilde;&plusmn;ana'),
(2, 'Tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE IF NOT EXISTS `observaciones` (
  `id_alumno` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE IF NOT EXISTS `pensum` (
  `id_pensum` int(11) NOT NULL AUTO_INCREMENT,
  `id_asignatura` tinyint(4) NOT NULL,
  `id_grado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_pensum`),
  UNIQUE KEY `id_asignatura` (`id_asignatura`,`id_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
  `id_sede` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_sede` varchar(150) NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sede`, `nom_sede`) VALUES
(1, 'Industrial'),
(2, 'Ana Gilma Torres de Parra'),
(3, 'Mar&Atilde;&shy;a Auxiliadora');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         