-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-05-2018 a las 11:26:02
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
-- Base de datos: `vuelos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `ID_Avion` int(50) NOT NULL AUTO_INCREMENT,
  `Matricula` int(50) NOT NULL,
  `Fabricante` text NOT NULL,
  `Modelo` text NOT NULL,
  `Capacidad_Pasaj` int(11) NOT NULL,
  `Autonomia_Vuelo` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ID_Avion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`ID_Avion`, `Matricula`, `Fabricante`, `Modelo`, `Capacidad_Pasaj`, `Autonomia_Vuelo`) VALUES
(2, 4567, 'Boing', '240', 280, '12'),
(3, 8910, 'Ford', '120', 80, '6'),
(123, 1213, 'Boing', '337', 200, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajeros`
--

DROP TABLE IF EXISTS `pasajeros`;
CREATE TABLE IF NOT EXISTS `pasajeros` (
  `ID_Pasajero` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(10) NOT NULL,
  `Nombre` text NOT NULL,
  PRIMARY KEY (`ID_Pasajero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pasajeros`
--

INSERT INTO `pasajeros` (`ID_Pasajero`, `DNI`, `Nombre`) VALUES
(1, '47913279A', 'Josep Maria Escofet'),
(2, '20000011B', 'Felipe Antonio Diaz'),
(3, '35123458E', 'Maria Enriqueta Gomez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `ID_personal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Categoria` text NOT NULL,
  PRIMARY KEY (`ID_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

DROP TABLE IF EXISTS `vuelos`;
CREATE TABLE IF NOT EXISTS `vuelos` (
  `ID_Vuelo` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Origen` date NOT NULL,
  `Aeropuerto_Origen` text NOT NULL,
  `Fecha_Destino` date NOT NULL,
  `Aeropuerto_Destino` text NOT NULL,
  `ID_Avion` int(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Vuelo`),
  KEY `ID_Avion` (`ID_Avion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`ID_Vuelo`, `Fecha_Origen`, `Aeropuerto_Origen`, `Fecha_Destino`, `Aeropuerto_Destino`, `ID_Avion`) VALUES
(1, '2018-05-02', 'Barcelona', '2018-05-02', 'Madrid', 123),
(2, '2018-06-15', 'Madrid', '2018-06-15', 'Mallorca', 2),
(3, '2018-07-12', 'Mallorca', '2018-07-12', 'Londres', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo_pasajero`
--

DROP TABLE IF EXISTS `vuelo_pasajero`;
CREATE TABLE IF NOT EXISTS `vuelo_pasajero` (
  `ID_Vuelo_Pasajero` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Vuelo` int(11) NOT NULL,
  `ID_Pasajero` int(11) NOT NULL,
  `Asiento` varchar(5) NOT NULL,
  `Clase` text NOT NULL,
  PRIMARY KEY (`ID_Vuelo_Pasajero`),
  KEY `FK_ID_Vuelo` (`ID_Vuelo`),
  KEY `FK_ID_Pasajero` (`ID_Pasajero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vuelo_pasajero`
--

INSERT INTO `vuelo_pasajero` (`ID_Vuelo_Pasajero`, `ID_Vuelo`, `ID_Pasajero`, `Asiento`, `Clase`) VALUES
(1, 1, 1, '29A', 'Turista'),
(2, 2, 3, '1B', 'Superior'),
(3, 3, 2, '10C', 'Basica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo_personal`
--

DROP TABLE IF EXISTS `vuelo_personal`;
CREATE TABLE IF NOT EXISTS `vuelo_personal` (
  `ID_Vuelo_Personal` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Vuelo` int(11) NOT NULL,
  `ID_Personal` int(11) NOT NULL,
  `Puesto` text NOT NULL,
  PRIMARY KEY (`ID_Vuelo_Personal`),
  KEY `FK_ID_Vuelo` (`ID_Vuelo`),
  KEY `FK_ID_Personal` (`ID_Personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`ID_Avion`) REFERENCES `avion` (`ID_Avion`) ON UPDATE SET NULL;

--
-- Filtros para la tabla `vuelo_pasajero`
--
ALTER TABLE `vuelo_pasajero`
  ADD CONSTRAINT `vuelo_pasajero_ibfk_1` FOREIGN KEY (`ID_Pasajero`) REFERENCES `pasajeros` (`ID_Pasajero`),
  ADD CONSTRAINT `vuelo_pasajero_ibfk_2` FOREIGN KEY (`ID_Vuelo`) REFERENCES `vuelos` (`ID_Vuelo`);

--
-- Filtros para la tabla `vuelo_personal`
--
ALTER TABLE `vuelo_personal`
  ADD CONSTRAINT `vuelo_personal_ibfk_1` FOREIGN KEY (`ID_Vuelo`) REFERENCES `vuelos` (`ID_Vuelo`),
  ADD CONSTRAINT `vuelo_personal_ibfk_2` FOREIGN KEY (`ID_Personal`) REFERENCES `personal` (`ID_personal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
