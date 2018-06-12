-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-06-2018 a las 11:05:26
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
-- Base de datos: `curs2018`
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activacion`
--

INSERT INTO `activacion` (`Id_activacion`, `Code`, `UserId`) VALUES
(1, 'b81af3b4337078c2865d8938965efecdb1ce24ca', 43);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `Id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` text NOT NULL,
  `Cuerpo` varchar(250) NOT NULL,
  `Categoria` text NOT NULL,
  `Foto` varchar(50) DEFAULT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_noticia`),
  KEY `fk_id_usuario` (`fk_id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`Id_noticia`, `Titulo`, `Cuerpo`, `Categoria`, `Foto`, `fk_id_usuario`) VALUES
(1, 'a', 'asd', '', '1528098413-6.jpg', 5),
(2, 'Rajoy se despide de la presidencia del Gobierno con el nÃºmero mÃ¡s bajo de desempleados desde 2008', 'El nÃºmero de desempleados registrados en los servicios pÃºblicos de empleo se redujo en mayo hasta los 3.252.130 personas, la menor cifra desde diciembre de 2008, segÃºn los datos publicados hoy por el ', '', '1528098662-6.jpg', 5),
(3, 'SÃ¡nchez, el nuevo Gobierno y la Ãºltima hora en directo', 'En otra de las entrevistas que ha concedido estos dÃ­as el secretario general del PSOE, JosÃ© Luis Ãbalos, Ã©ste daba un detalle importante sobre la nueva legislatura: el presidente del Gobierno, Pedro S', '', '1528098740-4.jpg', 1),
(4, 'Las parejas que disfrutan de una mayor baja paternal tardan en tener otro hijo', 'Quedan pocos dÃ­as para que se tramiten los presupuestos generales de Estado de este aÃ±o en el Senado y, con ellos, la ampliaciÃ³n del permiso de paternidad en una semana, alcanzando asÃ­ un total de cin', 'Vida', '1528098805-7.jpg', 1),
(5, 'Supervivientes: Joao destapa el encuentro Ã­ntimo entre SofÃ­a y Alejandro AlbalÃ¡', 'Recta final de Supervivientes 2018â€¦ Queda tan solo una semana de concurso y los participantes estÃ¡n pasando por una muy mala racha despuÃ©s de quedarse sin fuego en la nueva localizaciÃ³n. Sandra Barned', 'Supervivientes', '1528098848-4.jpg', 1),
(6, 'Rajoy se despide de la presidencia del Gobierno con el nÃºmero mÃ¡s bajo de desempleados desde 2008', 'jkljkl', 'Politica', '1528103348-8.jpg', 5),
(7, 'sd', 'fasfas', 'fasf', '1528103562-1.jpg', 5),
(8, 'gdfgsd', 'gdsfgdfsgdfs', 'gdsfgdf', '1528103630-1.jpg', 5);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Pasword` varchar(100) NOT NULL,
  `Nivel_seguridad` int(1) DEFAULT NULL,
  `Rol` text,
  `Activado` int(11) NOT NULL,
  PRIMARY KEY (`Id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombre`, `Email`, `Pasword`, `Nivel_seguridad`, `Rol`, `Activado`) VALUES
(1, 'e', '', 'e', 2, 'Editor', 1),
(3, 'c', '', 'c', 1, 'Colaborador', 1),
(5, 'a', '', 'a', 3, 'Administrador', 1),
(50, 's', 'iolandapeterson@gmail.com', '5f8c2cc0f15ff8d6b4e9ceaef1fda454', NULL, NULL, 0),
(51, 'j', 'iolandapeterson@gmail.com', 'cb2b5ecea856c9eeefa5e4f9a6c1d826', NULL, NULL, 1),
(52, 'Perico de los palotes', 'iolandapeterson@gmail.com', 'b73a2ed81a6afabdbc969abb96f28934', NULL, NULL, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
