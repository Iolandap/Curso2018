-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-06-2018 a las 11:50:40
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_final_php_sql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activacion`
--

DROP TABLE IF EXISTS `activacion`;
CREATE TABLE IF NOT EXISTS `activacion` (
  `Id_activacion` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(100) NOT NULL,
  `UserId` int(4) NOT NULL,
  PRIMARY KEY (`Id_activacion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activacion`
--

INSERT INTO `activacion` (`Id_activacion`, `Code`, `UserId`) VALUES
(4, '7f4a59e4661b63f32ec0ef8f68a4eb9349d2dd55', 2),
(5, '7e4759a7e0cde9a8081c736367c62d76cb3ca730', 4),
(6, '621e8c6d0f3cad043293d3ee2789096066d19b43', 5),
(7, '4085fec7efed39b2cc199b00c7218bf8ce699a23', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existencias`
--

DROP TABLE IF EXISTS `existencias`;
CREATE TABLE IF NOT EXISTS `existencias` (
  `Id_existencia` int(11) NOT NULL AUTO_INCREMENT,
  `Fk_Id_Tienda` int(11) NOT NULL,
  `Fk_Id_producto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Id_existencia`),
  KEY `Fk_Id_Tienda` (`Fk_Id_Tienda`),
  KEY `Fk_Id_producto` (`Fk_Id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `existencias`
--

INSERT INTO `existencias` (`Id_existencia`, `Fk_Id_Tienda`, `Fk_Id_producto`, `Cantidad`) VALUES
(1, 1, 2, 10),
(2, 1, 1, 5),
(3, 1, 4, 10),
(4, 1, 6, 20),
(5, 2, 5, 1),
(6, 2, 3, 3),
(7, 2, 1, 20),
(8, 2, 8, 2),
(9, 3, 1, 1),
(10, 3, 2, 3),
(11, 3, 3, 20),
(12, 3, 5, 2),
(13, 4, 5, 5),
(14, 4, 3, 5),
(15, 4, 6, 10),
(16, 4, 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `Id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_pedido` date NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Fk_Id_producto` int(11) NOT NULL,
  `Fk_id_usuari` int(11) NOT NULL,
  PRIMARY KEY (`Id_pedido`),
  KEY `Fk_Id_producto` (`Fk_Id_producto`),
  KEY `Fk_id_usuari` (`Fk_id_usuari`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `Id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_producto` varchar(100) NOT NULL,
  `Precio` int(5) NOT NULL,
  `Foto` varchar(50) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`Id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Nombre_producto`, `Precio`, `Foto`, `Descripcion`) VALUES
(1, 'Producto 1', 10, 'Producto1.jpg', 'Descripcion 1'),
(2, 'Producto 2', 20, 'Producto2.jpg', 'Descripcion 2'),
(3, 'Producto 3', 30, 'Producto3.jpg', 'Descripcion 3'),
(4, 'Producto 4', 40, 'Producto4.jpg', 'Descripcion 4'),
(5, 'Producto 5', 50, 'Producto5.jpg', 'Descripcion 5'),
(6, 'Producto 6', 60, 'Producto6.jpg', 'Descripcion 6'),
(7, 'Producto 7', 70, 'Producto7.jpg', 'Descripcion 7'),
(8, 'Producto 8', 80, 'Producto8.jpg', 'Descripcion 8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

DROP TABLE IF EXISTS `tiendas`;
CREATE TABLE IF NOT EXISTS `tiendas` (
  `Id_tienda` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Ciudad` text NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Foto` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_tienda`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`Id_tienda`, `Nombre`, `Ciudad`, `Direccion`, `Foto`) VALUES
(1, 'Tienda 1', 'Poblacion 1', 'Calle 1,', 'Tienda_1'),
(2, 'Tienda 2', 'Poblacion 2', 'Calle 2,', 'Tienda_2'),
(3, 'Tienda 3', 'Poblacion 3', 'Calle 3,', 'Tienda_3'),
(4, 'Tienda 4', 'Poblacion 4', 'Calle 4,', 'Tienda_4'),
(5, 'Tienda 4', 'Poblacion 4', 'Calle 4,', 'Tienda_4'),
(6, 'Tienda 6', 'Poblacion 6', 'Calle 6', 'Tienda_6'),
(7, 'Tienda 7', 'Poblacion 7', 'Calle 7', 'Tienda_7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_usuario` varchar(20) NOT NULL,
  `Contrasenya` varchar(50) NOT NULL,
  `Correo_electronico` varchar(50) NOT NULL,
  `Nombre_completo` varchar(100) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `Activado` varchar(1) NOT NULL,
  PRIMARY KEY (`Id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombre_usuario`, `Contrasenya`, `Correo_electronico`, `Nombre_completo`, `rol`, `Activado`) VALUES
(5, 'jose', 'cbef9d6f5156709fa192c12b63fd01e6', 'df@gmail.com', 'pepe diaz molero', 'comprador', '1'),
(6, 'pepe', 'b2c9ded9d6194f77b8d223d56523a31b', 'df@gmail.com', 'pepe diaz molero', 'comprador', '0');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `existencias`
--
ALTER TABLE `existencias`
  ADD CONSTRAINT `existencias_ibfk_1` FOREIGN KEY (`Fk_Id_producto`) REFERENCES `productos` (`Id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `existencias_ibfk_2` FOREIGN KEY (`Fk_Id_Tienda`) REFERENCES `tiendas` (`Id_tienda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Fk_Id_producto`) REFERENCES `productos` (`Id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Fk_id_usuari`) REFERENCES `usuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
