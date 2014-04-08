-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2014 a las 00:27:34
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdagenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcontactos`
--

CREATE TABLE IF NOT EXISTS `tcontactos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `movil` varchar(15) NOT NULL,
  `foto` varchar(500) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_tcontactos_tusuario_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `tipo_usuario` enum('normal','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`id`, `nombre`, `usuario`, `clave`, `tipo_usuario`) VALUES
(1, 'Felipe Belalcazar', 'admin', 'admin', 'admin'),
(2, 'Gustavo Cruz', 'user', 'user', 'normal'),
(3, 'Diego Tovar', 'user2', 'user2', 'normal'),
(4, 'Marcela Roldan', 'user3', 'user3', 'normal');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tcontactos`
--
ALTER TABLE `tcontactos`
  ADD CONSTRAINT `fk_tcontactos_tusuario` FOREIGN KEY (`id_usuario`) REFERENCES `tusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
