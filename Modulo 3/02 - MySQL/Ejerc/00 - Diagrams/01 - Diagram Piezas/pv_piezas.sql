-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-04-2018 a las 10:53:40
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
-- Base de datos: `pv_piezas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Precio` int(4) NOT NULL,
  PRIMARY KEY (`Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

DROP TABLE IF EXISTS `piezas`;
CREATE TABLE IF NOT EXISTS `piezas` (
  `ID_Piezas` int(11) NOT NULL AUTO_INCREMENT,
  `Color` text NOT NULL,
  `Cantidad` int(4) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  PRIMARY KEY (`ID_Piezas`),
  KEY `FK_ID_Categoria` (`ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedor`
--

DROP TABLE IF EXISTS `provedor`;
CREATE TABLE IF NOT EXISTS `provedor` (
  `Id_Proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_pz`
--

DROP TABLE IF EXISTS `pv_pz`;
CREATE TABLE IF NOT EXISTS `pv_pz` (
  `Id_Pv_Pz` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Proveedor` int(11) NOT NULL,
  `Id_Piezas` int(11) NOT NULL,
  PRIMARY KEY (`Id_Pv_Pz`),
  KEY `Ff_Id_Proveedor` (`Id_Proveedor`),
  KEY `Fk_Id_Piezas` (`Id_Piezas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD CONSTRAINT `piezas_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`Id_Categoria`);

--
-- Filtros para la tabla `pv_pz`
--
ALTER TABLE `pv_pz`
  ADD CONSTRAINT `pv_pz_ibfk_1` FOREIGN KEY (`Id_Proveedor`) REFERENCES `provedor` (`Id_Proveedor`),
  ADD CONSTRAINT `pv_pz_ibfk_2` FOREIGN KEY (`Id_Piezas`) REFERENCES `piezas` (`ID_Piezas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
