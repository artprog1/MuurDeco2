-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 01, 2021 at 06:44 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdmuurdecoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblClientes`
--

CREATE TABLE `tblClientes` (
  `idCliente` int(11) NOT NULL,
  `idProyecto3` int(11) DEFAULT NULL,
  `nombreCliente` varchar(20) DEFAULT NULL,
  `aPaternoCliente` varchar(20) DEFAULT NULL,
  `aMaternoCliente` varchar(20) DEFAULT NULL,
  `direccionCalle` varchar(50) DEFAULT NULL,
  `direccionCiudad` varchar(30) DEFAULT NULL,
  `direccionEstado` varchar(30) DEFAULT NULL,
  `direccionCodigoP` char(5) DEFAULT NULL,
  `telefonoCliente` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblClientes`
--

INSERT INTO `tblClientes` (`idCliente`, `idProyecto3`, `nombreCliente`, `aPaternoCliente`, `aMaternoCliente`, `direccionCalle`, `direccionCiudad`, `direccionEstado`, `direccionCodigoP`, `telefonoCliente`) VALUES
(1, NULL, 'Liam', 'Herrera', 'Martinez', '878 Cray', 'Guadalajara', 'Jalisco', '45210', '3311223344');

-- --------------------------------------------------------

--
-- Table structure for table `tblDepartamentos`
--

CREATE TABLE `tblDepartamentos` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `contactoDepartametno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblDepartamentos`
--

INSERT INTO `tblDepartamentos` (`idDepartamento`, `nombre`, `contactoDepartametno`) VALUES
(1, 'Produccion', '3336363636');

-- --------------------------------------------------------

--
-- Table structure for table `tblInsumos`
--

CREATE TABLE `tblInsumos` (
  `idInsumos` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `idProvedor2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblPresupuestosPorInsumo`
--

CREATE TABLE `tblPresupuestosPorInsumo` (
  `idPresupuesto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subTotal` double DEFAULT NULL,
  `idInsumos2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblPresupuestosPorProyecto`
--

CREATE TABLE `tblPresupuestosPorProyecto` (
  `idProyeccion` int(11) NOT NULL,
  `idPresupuesto2` int(11) DEFAULT NULL,
  `idProyecto2` int(11) DEFAULT NULL,
  `costoManoDeObra` float DEFAULT NULL,
  `costoTotalDeMateriales` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblProvedores`
--

CREATE TABLE `tblProvedores` (
  `idProvedor` int(11) NOT NULL,
  `nombreProvedor` varchar(20) DEFAULT NULL,
  `telProvedor` varchar(10) DEFAULT NULL,
  `tipoDeProvedor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblProyectos`
--

CREATE TABLE `tblProyectos` (
  `idProyecto` int(11) NOT NULL,
  `nombreProyecto` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `pdf` blob,
  `estatusDelProyecto` varchar(50) DEFAULT NULL,
  `departamentoAsignado` int(11) DEFAULT NULL,
  `estatusDeFactura` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblUsuarioPorProyecto`
--

CREATE TABLE `tblUsuarioPorProyecto` (
  `numeroRegistro` int(11) NOT NULL,
  `idCliente2` int(11) DEFAULT NULL,
  `idUsuario2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblUsuarios`
--

CREATE TABLE `tblUsuarios` (
  `idUsuario` int(11) NOT NULL,
  `correoUsuario` varchar(30) DEFAULT NULL,
  `nombreUsuario` varchar(50) DEFAULT NULL,
  `aPaternoUsuario` varchar(50) DEFAULT NULL,
  `aMaternoUsuario` varchar(50) DEFAULT NULL,
  `telefonoUsuario` varchar(10) DEFAULT NULL,
  `idDepartamento2` int(11) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblUsuarios`
--

INSERT INTO `tblUsuarios` (`idUsuario`, `correoUsuario`, `nombreUsuario`, `aPaternoUsuario`, `aMaternoUsuario`, `telefonoUsuario`, `idDepartamento2`, `contrasena`) VALUES
(1, 'sample@muurdeco.com', 'Fernando', 'Sample', 'Gutierrez', '3300110011', 1, 'hashed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersPrimerNombre` varchar(50) NOT NULL,
  `usersApellidoMaterno` varchar(50) NOT NULL,
  `usersApellidoPaterno` varchar(50) NOT NULL,
  `usersEmail` varchar(50) NOT NULL,
  `usersUid` varchar(50) NOT NULL,
  `usersPwd` varchar(255) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `incAtp` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersPrimerNombre`, `usersApellidoMaterno`, `usersApellidoPaterno`, `usersEmail`, `usersUid`, `usersPwd`, `perfil`, `incAtp`) VALUES
(6, 're', 're', 're', 're@gmail.comee', 're', '$2y$10$oxz0HF.evUrWkvmERPg/EO.3y7e/VDE7KRw3tmKo6r5ZW5nxi48ty', 're', 0),
(7, 'as', 'as', 'as', 'ad@he.comss', 'as', '$2y$10$GSdMD.lqZWDN8zhG/Gk4PuEwzljgJS2PQgIeMoAd7LmT6wreacJ..', 'as', 0),
(9, 'ko', 'ko', 'ko', 'ad@he.comll', 'ko', '$2y$10$C9DVNMLjAfXDEunka59gNOvSr5onipd1LS8BB8oxsFqIaIvUvOsG6', 'ko', 0),
(10, 'Juan ', 'Carlos', 'Molina', 'jpa@gmail.com', 'JuanCa', '$2y$10$0dcT5cB.1wSrqsf8UFqK6eovbn29Pmxf3xwpdVpcEt.vvpkNg1Od.', 'Produccion', 0),
(11, 'Universidad', 'Abierta ', 'Y a Distancia', 'aherre18@nube.unadmexico.mx', 'admin', '$2y$10$T8LA/nZWbSMb/vPwXKAzouZDYw6UTvgfKMLb.CGiT8FowohbJpqfK', 'Personal', 0),
(12, 'qw', 'qw', 'qw', 'qw@gnail.com', 'qw', '$2y$10$goJE9zs1b1D7wD6unojHUOhI6gZxgcFedtv3/1xfZuPWfDJn/PjDu', 'Produccion', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblClientes`
--
ALTER TABLE `tblClientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idProyecto3` (`idProyecto3`);

--
-- Indexes for table `tblDepartamentos`
--
ALTER TABLE `tblDepartamentos`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indexes for table `tblInsumos`
--
ALTER TABLE `tblInsumos`
  ADD PRIMARY KEY (`idInsumos`);

--
-- Indexes for table `tblPresupuestosPorInsumo`
--
ALTER TABLE `tblPresupuestosPorInsumo`
  ADD PRIMARY KEY (`idPresupuesto`),
  ADD KEY `idInsumos2` (`idInsumos2`);

--
-- Indexes for table `tblPresupuestosPorProyecto`
--
ALTER TABLE `tblPresupuestosPorProyecto`
  ADD PRIMARY KEY (`idProyeccion`),
  ADD KEY `idPresupuesto2` (`idPresupuesto2`),
  ADD KEY `idProyecto2` (`idProyecto2`);

--
-- Indexes for table `tblProvedores`
--
ALTER TABLE `tblProvedores`
  ADD PRIMARY KEY (`idProvedor`);

--
-- Indexes for table `tblProyectos`
--
ALTER TABLE `tblProyectos`
  ADD PRIMARY KEY (`idProyecto`),
  ADD KEY `departamentoAsignado` (`departamentoAsignado`);

--
-- Indexes for table `tblUsuarioPorProyecto`
--
ALTER TABLE `tblUsuarioPorProyecto`
  ADD PRIMARY KEY (`numeroRegistro`),
  ADD KEY `idUsuario2` (`idUsuario2`),
  ADD KEY `idCliente2` (`idCliente2`);

--
-- Indexes for table `tblUsuarios`
--
ALTER TABLE `tblUsuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idDepartamento2` (`idDepartamento2`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblClientes`
--
ALTER TABLE `tblClientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblDepartamentos`
--
ALTER TABLE `tblDepartamentos`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblInsumos`
--
ALTER TABLE `tblInsumos`
  MODIFY `idInsumos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblPresupuestosPorInsumo`
--
ALTER TABLE `tblPresupuestosPorInsumo`
  MODIFY `idPresupuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblPresupuestosPorProyecto`
--
ALTER TABLE `tblPresupuestosPorProyecto`
  MODIFY `idProyeccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblProvedores`
--
ALTER TABLE `tblProvedores`
  MODIFY `idProvedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblUsuarioPorProyecto`
--
ALTER TABLE `tblUsuarioPorProyecto`
  MODIFY `numeroRegistro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblUsuarios`
--
ALTER TABLE `tblUsuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblClientes`
--
ALTER TABLE `tblClientes`
  ADD CONSTRAINT `tblclientes_ibfk_1` FOREIGN KEY (`idProyecto3`) REFERENCES `tblProyectos` (`idProyecto`);

--
-- Constraints for table `tblPresupuestosPorInsumo`
--
ALTER TABLE `tblPresupuestosPorInsumo`
  ADD CONSTRAINT `tblpresupuestosporinsumo_ibfk_1` FOREIGN KEY (`idInsumos2`) REFERENCES `tblInsumos` (`idInsumos`);

--
-- Constraints for table `tblPresupuestosPorProyecto`
--
ALTER TABLE `tblPresupuestosPorProyecto`
  ADD CONSTRAINT `tblpresupuestosporproyecto_ibfk_1` FOREIGN KEY (`idPresupuesto2`) REFERENCES `tblPresupuestosPorInsumo` (`idPresupuesto`),
  ADD CONSTRAINT `tblpresupuestosporproyecto_ibfk_2` FOREIGN KEY (`idProyecto2`) REFERENCES `tblProyectos` (`idProyecto`),
  ADD CONSTRAINT `tblpresupuestosporproyecto_ibfk_3` FOREIGN KEY (`idPresupuesto2`) REFERENCES `tblPresupuestosPorInsumo` (`idPresupuesto`),
  ADD CONSTRAINT `tblpresupuestosporproyecto_ibfk_4` FOREIGN KEY (`idProyecto2`) REFERENCES `tblProyectos` (`idProyecto`);

--
-- Constraints for table `tblProyectos`
--
ALTER TABLE `tblProyectos`
  ADD CONSTRAINT `tblproyectos_ibfk_1` FOREIGN KEY (`departamentoAsignado`) REFERENCES `tblDepartamentos` (`idDepartamento`);

--
-- Constraints for table `tblUsuarioPorProyecto`
--
ALTER TABLE `tblUsuarioPorProyecto`
  ADD CONSTRAINT `tblusuarioporproyecto_ibfk_1` FOREIGN KEY (`idUsuario2`) REFERENCES `tblUsuarios` (`idUsuario`),
  ADD CONSTRAINT `tblusuarioporproyecto_ibfk_2` FOREIGN KEY (`idCliente2`) REFERENCES `tblClientes` (`idCliente`);

--
-- Constraints for table `tblUsuarios`
--
ALTER TABLE `tblUsuarios`
  ADD CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`idDepartamento2`) REFERENCES `tblDepartamentos` (`idDepartamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
