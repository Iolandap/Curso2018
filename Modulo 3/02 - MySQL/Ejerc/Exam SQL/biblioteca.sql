-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-05-2018 a las 08:34:58
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `Id_Autor` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Direct_Intrep_Escrit` text NOT NULL,
  `Pais` text NOT NULL,
  PRIMARY KEY (`Id_Autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copias`
--

DROP TABLE IF EXISTS `copias`;
CREATE TABLE IF NOT EXISTS `copias` (
  `Id_Copia` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Copia` varchar(10) NOT NULL,
  `Estado` text NOT NULL,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`Id_Copia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_adicional`
--

DROP TABLE IF EXISTS `info_adicional`;
CREATE TABLE IF NOT EXISTS `info_adicional` (
  `Id_Info_Adicional` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_Libro_CD_Pelicula` text NOT NULL,
  `Num_Paginas` int(11) NOT NULL,
  `Num_Canciones` int(11) NOT NULL,
  `Dur_Pelicula` time NOT NULL,
  PRIMARY KEY (`Id_Info_Adicional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `Id_Prestamos` int(11) NOT NULL AUTO_INCREMENT,
  `FId_Copia` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL,
  `Anyo` int(11) NOT NULL,
  `Resumen` int(11) NOT NULL,
  `FId_Autor` int(11) NOT NULL,
  `FId_Info_Adiciona` int(11) NOT NULL,
  PRIMARY KEY (`Id_Prestamos`),
  UNIQUE KEY `FId_Copia` (`FId_Copia`),
  UNIQUE KEY `FId_Autor` (`FId_Autor`),
  UNIQUE KEY `FId_Info_Adicional` (`FId_Info_Adiciona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

DROP TABLE IF EXISTS `socios`;
CREATE TABLE IF NOT EXISTS `socios` (
  `id_Socios` int(5) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellidos` text NOT NULL,
  `Codigo Socio` varchar(5) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Socios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soc_prestam`
--

DROP TABLE IF EXISTS `soc_prestam`;
CREATE TABLE IF NOT EXISTS `soc_prestam` (
  `Id_Soc_Prestam` int(11) NOT NULL AUTO_INCREMENT,
  `FId_Prestamos` int(11) NOT NULL,
  `FId_Socios` int(11) NOT NULL,
  `Fecha_Presta` date NOT NULL,
  `Fecha_Tope` date NOT NULL,
  `Fecha_Devol` date NOT NULL,
  PRIMARY KEY (`Id_Soc_Prestam`),
  UNIQUE KEY `FId_Prestamos` (`FId_Prestamos`),
  UNIQUE KEY `FId_Socios` (`FId_Socios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
CREATE TABLE IF NOT EXISTS `telefonos` (
  `Id_Telefonos` int(5) NOT NULL AUTO_INCREMENT,
  `FId_Socios` int(11) NOT NULL,
  `Num_Telefono` int(11) NOT NULL,
  PRIMARY KEY (`Id_Telefonos`),
  UNIQUE KEY `FK_Id_Socios` (`FId_Socios`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`FId_Copia`) REFERENCES `copias` (`Id_Copia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`FId_Autor`) REFERENCES `autor` (`Id_Autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`FId_Info_Adiciona`) REFERENCES `info_adicional` (`Id_Info_Adicional`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_4` FOREIGN KEY (`Id_Prestamos`) REFERENCES `soc_prestam` (`FId_Prestamos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `soc_prestam`
--
ALTER TABLE `soc_prestam`
  ADD CONSTRAINT `soc_prestam_ibfk_1` FOREIGN KEY (`FId_Socios`) REFERENCES `socios` (`id_Socios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`FId_Socios`) REFERENCES `socios` (`id_Socios`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
