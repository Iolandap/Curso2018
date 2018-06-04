-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-05-2018 a las 08:26:17
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
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `Id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` int(5) NOT NULL,
  `Img_Producto` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Nombre`, `Descripcion`, `Precio`, `Img_Producto`, `Fecha`) VALUES
(37, 'Agua', 'd', 4, '1527580261-6.jpg', '2018-05-22'),
(38, 'sdf', 'sdfgLorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, '1527580248-8.jpg', '2018-05-22'),
(56, 'dsfg', 'd', 4, '1527751337-8.jpg', '2018-05-16'),
(57, 'dsfg', 'd', 4, '1527751341-9.jpg', '2018-05-16'),
(49, 'dsfg', 'd', 4, '1527751311-1.jpg', '2018-05-16'),
(50, 'dsfg', 'd', 4, '1527751314-2.jpg', '2018-05-16'),
(51, 'dsfg', 'd', 4, '1527751318-3.jpg', '2018-05-16'),
(52, 'dsfg', 'd', 4, '1527751321-4.jpg', '2018-05-16'),
(53, 'dsfg', 'd', 4, '1527751327-5.jpg', '2018-05-16'),
(54, 'dsfg', 'd', 4, '1527751330-6.jpg', '2018-05-16'),
(55, 'dsfg', 'd', 4, '1527751334-7.jpg', '2018-05-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
