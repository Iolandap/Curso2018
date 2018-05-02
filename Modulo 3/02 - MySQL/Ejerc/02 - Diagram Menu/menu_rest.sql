-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-04-2018 a las 11:13:12
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
-- Base de datos: `menu_rest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `Id_Almacen` int(11) NOT NULL AUTO_INCREMENT,
  `Cantidad_Stock` int(4) NOT NULL,
  PRIMARY KEY (`Id_Almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `Id_Cat` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Encargado` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `Id_Ingredientes` int(11) NOT NULL AUTO_INCREMENT,
  `Producto` varchar(50) NOT NULL,
  `Unidad_Medida` varchar(50) NOT NULL,
  `Id_Almacen` int(11) NOT NULL,
  PRIMARY KEY (`Id_Ingredientes`),
  KEY `Fk_Id_Almacen` (`Id_Almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

DROP TABLE IF EXISTS `plato`;
CREATE TABLE IF NOT EXISTS `plato` (
  `Id_Plato` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Nivel Dificultad` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Precio Final` int(4) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  PRIMARY KEY (`Id_Plato`),
  KEY `Fk_Id_Categoria` (`Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

DROP TABLE IF EXISTS `receta`;
CREATE TABLE IF NOT EXISTS `receta` (
  `Id_Receta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Ingrediente` int(11) NOT NULL,
  `Id_Plato` int(11) NOT NULL,
  `Cantidad_Receta` int(4) NOT NULL,
  PRIMARY KEY (`Id_Receta`),
  KEY `Fk_Id_Ingrediente` (`Id_Ingrediente`),
  KEY `Fk_Id_Plato` (`Id_Plato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`Id_Almacen`) REFERENCES `almacen` (`Id_Almacen`);

--
-- Filtros para la tabla `plato`
--
ALTER TABLE `plato`
  ADD CONSTRAINT `plato_ibfk_1` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Cat`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`Id_Plato`) REFERENCES `plato` (`Id_Plato`),
  ADD CONSTRAINT `receta_ibfk_2` FOREIGN KEY (`Id_Ingrediente`) REFERENCES `ingredientes` (`Id_Ingredientes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
