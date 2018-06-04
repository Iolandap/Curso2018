-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-05-2018 a las 11:47:49
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curs2018`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Apellidos` text NOT NULL,
  `Pasword` varchar(10) NOT NULL,
  `Edad` int(2) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comentarios` text NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nombre`, `Apellidos`, `Pasword`, `Edad`, `Email`, `Comentarios`) VALUES
(1, 'Jose', 'Enrique', 'micasa', 20, 'test@email.com', 'Lorem Impsum'),
(2, 'Luis', 'Miguel diaz', '1234', 20, 'otro@email.com', 'Comentarios otra vez'),
(3, 'Carles', 'Pujol Pujol', 'asdf', 30, 'pujol@pujol.es', 'Lorem Ipsum en Barcelona'),
(4, 'pepe', 'diaz lopez', '123123', 34, 'sasadf@gmail.es', 'lorem'),
(5, 'ppwerwer', 'asasgf', '23234234', 23, 'agfadfg', 'sdfgsdfgdfg'),
(6, 'zcxvxzcv', 'xzcvzxcv', 'dasas', 22, 'bfg', 'Comentarios..sdfgsdfg.'),
(7, 'sdfg', 'sdfg', 'regsdfgh', 56, 'dfh', 'Comentarios...dfhdfh'),
(8, 'asdf', 'sdf', '3123', 23, 'asdfa', 'Comentarioasdfasdfs...'),
(9, 'asdf', 'sdf', '3123', 23, 'asdfa', 'Comentarioasdfasdfs...'),
(10, 'asdf', 'sdf', '3123', 22, 'asdfa', 'Comentarios...'),
(11, 'asdf', 'sdf', '3123', 22, 'asdfa', 'Comentarios...'),
(12, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentaasdfsdafrios...'),
(13, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(14, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(15, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(16, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(17, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(18, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(19, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(20, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(21, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(22, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(23, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(24, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(25, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(26, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(27, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(28, 'sdf', 'sdf', 'dsf', 33, 'wewf', 'Comentarios...'),
(29, 'sdfsdf', 'sdf', '34234', 23, 'dfdf', 'Comentarios...sdfsdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
