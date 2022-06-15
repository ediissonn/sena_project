-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 10:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adiban`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria_categoria`, `nombre_categoria`) VALUES
(1, 'Camisetas'),
(2, 'Bermudas'),
(3, 'Camisas'),
(4, 'Gorros'),
(5, 'Pantalonetas');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idcliente_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(60) DEFAULT NULL,
  `apellido_cliente` varchar(60) DEFAULT NULL,
  `telefono_cliente` varchar(60) DEFAULT NULL,
  `direccion_cliente` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idcliente_cliente`, `nombre_cliente`, `apellido_cliente`, `telefono_cliente`, `direccion_cliente`) VALUES
(1, 'Edisson', 'Montealegre', '1', 'Kr 15'),
(2, 'Jessica', 'Valentina', '2', 'Kr 16'),
(3, 'Daniel', 'Garcia', '3', 'Calle 10'),
(4, 'Isabel', 'Oropeza', '4', 'Calle 11');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos_pedidos` int(11) NOT NULL,
  `nombre_pedidos` varchar(64) NOT NULL,
  `direccion_pedidos` varchar(60) DEFAULT NULL,
  `fecha_pedidos` datetime DEFAULT NULL,
  `estado_pedidos` text DEFAULT NULL,
  `idcliente_cliente` int(11) NOT NULL,
  `idvendedor_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`idpedidos_pedidos`, `nombre_pedidos`, `direccion_pedidos`, `fecha_pedidos`, `estado_pedidos`, `idcliente_cliente`, `idvendedor_vendedor`) VALUES
(1, 'Bermuda', 'Calle 15', '2013-08-20 13:31:01', 'Excelente', 1, 1),
(2, 'Camisa', 'Kr 15', '2012-09-21 14:32:02', 'Bien', 2, 2),
(3, 'Camiseta', 'Kr 16', '2012-09-21 14:33:03', 'Bien', 3, 3),
(4, 'Pantaloneta', 'Avenida 25', '0000-00-00 00:00:00', 'Excelente', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idproducto_producto` int(11) NOT NULL,
  `nombre_producto` varchar(60) DEFAULT NULL,
  `codigo_producto` varchar(60) DEFAULT NULL,
  `precio_unitario_producto` varchar(60) DEFAULT NULL,
  `descripcion_producto` varchar(200) DEFAULT NULL,
  `idcategoria_categoria` int(11) NOT NULL,
  `idproveedor_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idproducto_producto`, `nombre_producto`, `codigo_producto`, `precio_unitario_producto`, `descripcion_producto`, `idcategoria_categoria`, `idproveedor_proveedor`) VALUES
(1, 'Camisas', '1', '25000', 'Camisas', 3, 1),
(2, 'Pantalonetas', '2', '35000', 'Pantalonetas', 5, 2),
(3, 'Camisetas', '3', '35000', 'Camisetas', 1, 3),
(4, 'Gorros', '4', '15000', 'Gorros', 4, 4),
(5, 'Bermudas', '5', '25000', 'Bermudas', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(60) DEFAULT NULL,
  `apellido_proveedor` varchar(60) DEFAULT NULL,
  `telefono_proveedor` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`idproveedor_proveedor`, `nombre_proveedor`, `apellido_proveedor`, `telefono_proveedor`) VALUES
(1, 'Ignacio', 'Pardo', '1'),
(2, 'Maria', 'Gil', '2'),
(3, 'Aurora', 'Martinez', '3'),
(4, 'Marta', 'Varquez', '4'),
(5, 'Mateo', 'Martinez', '5');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(60) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `usuario_usuario` varchar(15) NOT NULL,
  `clave_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario_usuario`, `nombre_usuario`, `correo_usuario`, `usuario_usuario`, `clave_usuario`) VALUES
(1, 'Edisson', 'edibremonsan@gmail.com', 'Administrador', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `vendedor`
--

CREATE TABLE `vendedor` (
  `idvendedor_vendedor` int(11) NOT NULL,
  `nombre_vendedor` varchar(60) DEFAULT NULL,
  `apellido_vendedor` varchar(60) DEFAULT NULL,
  `direccion_vendedor` varchar(60) DEFAULT NULL,
  `telefono_vendedor` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendedor`
--

INSERT INTO `vendedor` (`idvendedor_vendedor`, `nombre_vendedor`, `apellido_vendedor`, `direccion_vendedor`, `telefono_vendedor`) VALUES
(1, 'Brayan', 'Sanchez', 'Kr 17', '1'),
(2, 'Carlos', 'Fuentes', 'Avenida 57', '2'),
(3, 'Alejandro ', 'Serrano', 'Avenida 58', '3'),
(4, 'Ana', 'Tristan', 'Calle 105', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente_cliente`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos_pedidos`),
  ADD KEY `fk_pedido_cliente1_idx` (`idcliente_cliente`),
  ADD KEY `fk_pedidos_vendedor1_idx` (`idvendedor_vendedor`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto_producto`),
  ADD KEY `fk_producto_categoria_idx` (`idcategoria_categoria`),
  ADD KEY `fk_producto_proveedor1_idx` (`idproveedor_proveedor`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor_proveedor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario_usuario`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`idvendedor_vendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `idvendedor_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_cliente1` FOREIGN KEY (`idcliente_cliente`) REFERENCES `cliente` (`idcliente_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedidos_vendedor1` FOREIGN KEY (`idvendedor_vendedor`) REFERENCES `vendedor` (`idvendedor_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`idcategoria_categoria`) REFERENCES `categoria` (`idcategoria_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_proveedor1` FOREIGN KEY (`idproveedor_proveedor`) REFERENCES `proveedor` (`idproveedor_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
