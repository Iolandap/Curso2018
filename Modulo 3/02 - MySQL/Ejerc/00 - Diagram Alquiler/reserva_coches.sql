-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-04-2018 a las 11:37:48
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
-- Base de datos: `reserva_coches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

DROP TABLE IF EXISTS `agencias`;
CREATE TABLE IF NOT EXISTS `agencias` (
  `Id_Agencia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Agencia` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Agencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Id_Avalador` int(11) NOT NULL,
  PRIMARY KEY (`Id_Cliente`),
  KEY `fk_Id_Avalador` (`Id_Avalador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

DROP TABLE IF EXISTS `coches`;
CREATE TABLE IF NOT EXISTS `coches` (
  `Id_Coche` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(10) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Id_Garage` int(11) NOT NULL,
  PRIMARY KEY (`Id_Coche`),
  KEY `Fk_Id_Garage` (`Id_Garage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `Id_Garage` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Garage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `Id_Reserva` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Cliente` int(11) NOT NULL,
  `Fecha_Inicio` int(11) NOT NULL,
  `Fecha_Final` int(11) NOT NULL,
  `Precio_Total` int(11) NOT NULL,
  `Id_Agencia` int(11) NOT NULL,
  `Id_Reserva_Coche` int(11) NOT NULL,
  PRIMARY KEY (`Id_Reserva`),
  KEY `Fk_Id_Agencia` (`Id_Agencia`),
  KEY `Fk_Id_Reserva_Coche` (`Id_Reserva_Coche`),
  KEY `ID_Cliente` (`ID_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_coche`
--

DROP TABLE IF EXISTS `reserva_coche`;
CREATE TABLE IF NOT EXISTS `reserva_coche` (
  `Id_Reserva_Coche` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Coche` int(11) NOT NULL,
  `Id_Reserva` int(11) NOT NULL,
  `Precio_Alquiler` int(11) NOT NULL,
  `Litros_Gasolina` int(11) NOT NULL,
  `Entregado` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Reserva_Coche`),
  KEY `Fk_Id_Coche` (`Id_Coche`),
  KEY `Fk_Id_Reserva` (`Id_Reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Id_Avalador`) REFERENCES `clientes` (`Id_Cliente`);

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`Id_Garage`) REFERENCES `garage` (`Id_Garage`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`Id_Reserva_Coche`) REFERENCES `reserva_coche` (`Id_Reserva_Coche`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`Id_Agencia`) REFERENCES `agencias` (`Id_Agencia`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`ID_Cliente`) REFERENCES `clientes` (`Id_Cliente`);

--
-- Filtros para la tabla `reserva_coche`
--
ALTER TABLE `reserva_coche`
  ADD CONSTRAINT `reserva_coche_ibfk_1` FOREIGN KEY (`Id_Coche`) REFERENCES `coches` (`Id_Coche`),
  ADD CONSTRAINT `reserva_coche_ibfk_2` FOREIGN KEY (`Id_Reserva`) REFERENCES `reserva` (`Id_Reserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
