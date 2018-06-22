-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2018 a las 10:17:11
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albaran`
--

DROP TABLE IF EXISTS `albaran`;
CREATE TABLE `albaran` (
  `Id_albaran` int(11) NOT NULL,
  `Fid_factura` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `Id_cliente` int(11) NOT NULL,
  `Fid_cc` int(11) NOT NULL,
  `Nombre` varchar(355) CHARACTER SET latin1 NOT NULL,
  `Direccion` varchar(355) CHARACTER SET latin1 NOT NULL,
  `Telefono` varchar(355) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(355) CHARACTER SET latin1 NOT NULL,
  `NIF` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Poblacion` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Provincia` varchar(80) CHARACTER SET latin1 NOT NULL,
  `Codigopostal` int(10) NOT NULL,
  `Fax` int(11) NOT NULL,
  `Web` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Fecha_alta` date NOT NULL,
  `Estado` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `Id_compra` int(11) NOT NULL,
  `Fid_proveedor` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Articulo` varchar(355) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` int(11) NOT NULL,
  `Fichero Factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactocliente`
--

DROP TABLE IF EXISTS `contactocliente`;
CREATE TABLE `contactocliente` (
  `Id_cc` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactoproveedor`
--

DROP TABLE IF EXISTS `contactoproveedor`;
CREATE TABLE `contactoproveedor` (
  `Id_cp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaemitida`
--

DROP TABLE IF EXISTS `facturaemitida`;
CREATE TABLE `facturaemitida` (
  `Id_factura` int(11) NOT NULL,
  `Fid_venta` int(11) NOT NULL,
  `Fecha` int(11) NOT NULL,
  `Importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturarecibida`
--

DROP TABLE IF EXISTS `facturarecibida`;
CREATE TABLE `facturarecibida` (
  `Id_factura` int(11) NOT NULL,
  `Fid_pedido` int(11) NOT NULL,
  `Fid_albaran` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Importetotal` int(11) NOT NULL,
  `Codepartidaeco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

DROP TABLE IF EXISTS `formulario`;
CREATE TABLE `formulario` (
  `Id_formulario` int(11) NOT NULL,
  `Fid_clientes` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Respuesta1` varchar(255) NOT NULL,
  `Respuesta2` int(255) NOT NULL,
  `Respuesta3` varchar(255) NOT NULL,
  `Respuesta4` varchar(255) NOT NULL,
  `Respuesta5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `home`
--

DROP TABLE IF EXISTS `home`;
CREATE TABLE `home` (
  `Id_home` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Texto` varchar(355) NOT NULL,
  `Imagen` varchar(355) NOT NULL,
  `Fid_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedido`
--

DROP TABLE IF EXISTS `lineapedido`;
CREATE TABLE `lineapedido` (
  `Id_lineapedido` int(11) NOT NULL,
  `Fid_pedido` int(11) NOT NULL,
  `Artículo` varchar(200) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Referencia` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Estado` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navbar`
--

DROP TABLE IF EXISTS `navbar`;
CREATE TABLE `navbar` (
  `Id_navbar` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `navbar`
--

INSERT INTO `navbar` (`Id_navbar`, `seccion`) VALUES
(1, 'Home'),
(2, 'Ventas'),
(3, 'Compras'),
(4, 'Formularios'),
(5, 'HHRR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `Id_pedido` int(11) NOT NULL,
  `Fid_proveedor` int(11) NOT NULL,
  `Fid_user` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Comentario` varchar(255) NOT NULL,
  `Firma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `Id_proveedor` int(11) NOT NULL,
  `Fid_cp` int(11) NOT NULL,
  `Nombre` varchar(355) NOT NULL,
  `Direccion` varchar(355) NOT NULL,
  `Telefono` int(50) NOT NULL,
  `Email` varchar(355) NOT NULL,
  `NIF` int(15) NOT NULL,
  `Poblacion` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `Codigopostal` int(10) NOT NULL,
  `Fax` int(15) NOT NULL,
  `Web` varchar(100) NOT NULL,
  `Fechaalta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE `proyecto` (
  `Id_proyecto` int(11) NOT NULL,
  `Fid_cliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Nombreproyecto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `Id_rol` int(11) NOT NULL,
  `Fid_usuario` int(11) NOT NULL,
  `Fid_navbar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id_rol`, `Fid_usuario`, `Fid_navbar`) VALUES
(6, 11, 4),
(5, 11, 5),
(3, 12, 2),
(4, 12, 3),
(1, 13, 2),
(2, 13, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombre` varchar(9) NOT NULL,
  `Apellidos` varchar(355) NOT NULL,
  `Telefono` int(25) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Direccion` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `User`, `Password`, `Nombre`, `Apellidos`, `Telefono`, `Email`, `Direccion`) VALUES
(11, 'pepito', '81dc9bdb52d04dc20036dbd8313ed055', 'Pepito', 'Grillo', 666666666, 'pepito@proyectofinal.com', 'calle pepito, vng'),
(12, 'loli', '81dc9bdb52d04dc20036dbd8313ed055', 'Loli', 'Flores', 666555555, 'loli@proyectofinal.com', 'calle loli, vng'),
(13, 'fulanito', '81dc9bdb52d04dc20036dbd8313ed055', 'Fulanito', 'funeral', 655444444, 'fulanito@proyectofinal.com', 'calle fulanito, vng');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `Id_venta` int(11) NOT NULL,
  `Fid_cliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Articulo` varchar(355) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` int(11) NOT NULL,
  `Fichero` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albaran`
--
ALTER TABLE `albaran`
  ADD PRIMARY KEY (`Id_albaran`),
  ADD KEY `Fid_factura` (`Fid_factura`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_cliente`),
  ADD KEY `Id_cliente` (`Id_cliente`),
  ADD KEY `Fid_contactocliente` (`Fid_cc`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD KEY `Id_compra` (`Id_compra`),
  ADD KEY `Fid_proveedor` (`Fid_proveedor`);

--
-- Indices de la tabla `contactocliente`
--
ALTER TABLE `contactocliente`
  ADD PRIMARY KEY (`Id_cc`),
  ADD KEY `Id_cc` (`Id_cc`);

--
-- Indices de la tabla `contactoproveedor`
--
ALTER TABLE `contactoproveedor`
  ADD PRIMARY KEY (`Id_cp`),
  ADD KEY `Id_cp` (`Id_cp`);

--
-- Indices de la tabla `facturaemitida`
--
ALTER TABLE `facturaemitida`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `Id_factura` (`Id_factura`),
  ADD KEY `Fid_proyecto` (`Fid_venta`);

--
-- Indices de la tabla `facturarecibida`
--
ALTER TABLE `facturarecibida`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `Id_factura` (`Id_factura`),
  ADD KEY `Fid_pedido` (`Fid_pedido`),
  ADD KEY `Fid_albaran` (`Fid_albaran`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`Id_formulario`),
  ADD KEY `Id_formulario` (`Id_formulario`),
  ADD KEY `Fid_clientes` (`Fid_clientes`);

--
-- Indices de la tabla `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`Id_home`),
  ADD KEY `Id_home` (`Id_home`),
  ADD KEY `Fid_usuario` (`Fid_usuario`);

--
-- Indices de la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  ADD PRIMARY KEY (`Id_lineapedido`),
  ADD KEY `Id_lineapedido` (`Id_lineapedido`),
  ADD KEY `Fid_pedido` (`Fid_pedido`);

--
-- Indices de la tabla `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`Id_navbar`),
  ADD KEY `Id_navbar` (`Id_navbar`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_pedido`),
  ADD KEY `Id_compra` (`Id_pedido`),
  ADD KEY `Fid_proveedor` (`Fid_proveedor`),
  ADD KEY `Fid_user` (`Fid_user`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Id_proveedor`),
  ADD KEY `Id_proveedor` (`Id_proveedor`),
  ADD KEY `Personacontacto` (`Fid_cp`),
  ADD KEY `Fid_contactoproveedor` (`Fid_cp`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`Id_proyecto`),
  ADD KEY `Id_proyecto` (`Id_proyecto`),
  ADD KEY `Fid_cliente` (`Fid_cliente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_rol`),
  ADD UNIQUE KEY `Fid_usuario_2` (`Fid_usuario`,`Fid_navbar`),
  ADD KEY `Fid_usuario` (`Fid_usuario`),
  ADD KEY `Fid_nabvar` (`Fid_navbar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`Id_venta`),
  ADD KEY `Id_compra` (`Id_venta`),
  ADD KEY `Fid_proveedor` (`Fid_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albaran`
--
ALTER TABLE `albaran`
  MODIFY `Id_albaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `Id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactocliente`
--
ALTER TABLE `contactocliente`
  MODIFY `Id_cc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactoproveedor`
--
ALTER TABLE `contactoproveedor`
  MODIFY `Id_cp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturaemitida`
--
ALTER TABLE `facturaemitida`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturarecibida`
--
ALTER TABLE `facturarecibida`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `Id_formulario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `home`
--
ALTER TABLE `home`
  MODIFY `Id_home` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  MODIFY `Id_lineapedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `navbar`
--
ALTER TABLE `navbar`
  MODIFY `Id_navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `Id_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `Id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Id_cliente`) REFERENCES `formulario` (`Fid_clientes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`Fid_cc`) REFERENCES `contactocliente` (`Id_cc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Fid_proveedor`) REFERENCES `proveedor` (`Id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturaemitida`
--
ALTER TABLE `facturaemitida`
  ADD CONSTRAINT `facturaemitida_ibfk_1` FOREIGN KEY (`Fid_venta`) REFERENCES `venta` (`Id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturarecibida`
--
ALTER TABLE `facturarecibida`
  ADD CONSTRAINT `facturarecibida_ibfk_1` FOREIGN KEY (`Fid_albaran`) REFERENCES `albaran` (`Id_albaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturarecibida_ibfk_2` FOREIGN KEY (`Fid_pedido`) REFERENCES `lineapedido` (`Id_lineapedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`Fid_usuario`) REFERENCES `usuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Fid_proveedor`) REFERENCES `proveedor` (`Id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`Fid_cp`) REFERENCES `contactoproveedor` (`Id_cp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`Fid_usuario`) REFERENCES `usuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`Fid_navbar`) REFERENCES `navbar` (`Id_navbar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`Fid_cliente`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
