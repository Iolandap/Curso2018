-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 09:39 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prueba_final_php_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `existencias`
--

CREATE TABLE `existencias` (
  `Id_existencia` int(11) NOT NULL,
  `Fk_Id_Tienda` int(11) NOT NULL,
  `Fk_Id_producto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `existencias`
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
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `Id_pedido` int(11) NOT NULL,
  `Fecha_pedido` date NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Fk_Id_producto` int(11) NOT NULL,
  `Fk_id_usuari` int(11) NOT NULL,
  `Fk_Id_Tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `Id_producto` int(11) NOT NULL,
  `Nombre_producto` varchar(100) NOT NULL,
  `Precio` int(5) NOT NULL,
  `Foto` varchar(50) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
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
-- Table structure for table `tiendas`
--

CREATE TABLE `tiendas` (
  `Id_tienda` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Ciudad` text NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiendas`
--

INSERT INTO `tiendas` (`Id_tienda`, `Nombre`, `Ciudad`, `Direccion`, `Foto`) VALUES
(1, 'Tienda 1', 'Poblacion 1', 'Calle 1,', 'Tienda_1.jpg'),
(2, 'Tienda 2', 'Poblacion 2', 'Calle 2,', 'Tienda_2.jpg'),
(3, 'Tienda 3', 'Poblacion 3', 'Calle 3,', 'Tienda_3.jpg'),
(4, 'Tienda 4', 'Poblacion 4', 'Calle 4,', 'Tienda_4.jpg'),
(5, 'Tienda 5', 'Poblacion 5', 'Calle 5,', 'Tienda_5.jpg'),
(6, 'Tienda 6', 'Poblacion 6', 'Calle 6', 'Tienda_6.jpg'),
(7, 'Tienda 7', 'Poblacion 7', 'Calle 7', 'Tienda_7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Nombre_usuario` text NOT NULL,
  `Contrasenya` varchar(10) NOT NULL,
  `Correo_electronico` varchar(50) NOT NULL,
  `Nombre_completo` text NOT NULL,
  `Rol` int(10) NOT NULL,
  `Activado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `existencias`
--
ALTER TABLE `existencias`
  ADD PRIMARY KEY (`Id_existencia`),
  ADD KEY `Fk_Id_Tienda` (`Fk_Id_Tienda`),
  ADD KEY `Fk_Id_producto` (`Fk_Id_producto`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_pedido`),
  ADD KEY `Fk_Id_producto` (`Fk_Id_producto`),
  ADD KEY `Fk_id_usuari` (`Fk_id_usuari`),
  ADD KEY `Fk_Id_Tienda` (`Fk_Id_Tienda`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indexes for table `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`Id_tienda`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `existencias`
--
ALTER TABLE `existencias`
  MODIFY `Id_existencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `Id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `existencias`
--
ALTER TABLE `existencias`
  ADD CONSTRAINT `existencias_ibfk_1` FOREIGN KEY (`Fk_Id_producto`) REFERENCES `productos` (`Id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `existencias_ibfk_2` FOREIGN KEY (`Fk_Id_Tienda`) REFERENCES `tiendas` (`Id_tienda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Fk_Id_producto`) REFERENCES `productos` (`Id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Fk_id_usuari`) REFERENCES `usuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`Fk_Id_Tienda`) REFERENCES `tiendas` (`Id_tienda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
