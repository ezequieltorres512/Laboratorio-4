-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 01:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labo4`
--
CREATE DATABASE IF NOT EXISTS `labo4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `labo4`;

-- --------------------------------------------------------

--
-- Table structure for table `canalesdifusion`
--

CREATE TABLE `canalesdifusion` (
  `id` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `canalesdifusion`
--

INSERT INTO `canalesdifusion` (`id`, `descripcion`) VALUES
(1, 'WhatsApp'),
(2, 'Facebook'),
(3, 'Instagram'),
(4, 'Google'),
(5, 'TripAdvisor'),
(6, 'Radio'),
(7, 'Television');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(1) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `conocidosPor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `email`, `clave`, `fecha_registro`, `estado`, `apellido`, `nombre`, `direccion`, `telefono`, `conocidosPor`) VALUES
(1, 'cliente@cliente', '4983a0ab83ed86e0e7213c8783940193', '2023-11-09', 1, 'Diaz', 'Damian', 'Haedo 123', 12345678, 1),
(2, 'cliente1@cliente1', 'd5a8d8c7ab0514e2b8a2f98769281585', '2023-11-09', 1, 'Gomez', 'Lucas', 'Liniers 123', 87654321, 1),
(3, 'cliente2@cliente2', '6dcd0e14f89d67e397b9f52bb63f5570', '2023-11-11', 1, 'Molina', 'Mario', 'salta604', 1211222222, 1),
(4, 'c4@cliente', 'b713e6323a68d3ddabf4855826c50148', '2023-11-15', 1, 'ALFONSO', 'CARLOS RUBEN', 'MALABIA 389', 1189093874, 1),
(6, 'c5@cliente', '25ea1682e16466c0667abdc095920f6c', '2023-11-17', 1, 'MONSERRAT', 'JUAN CARLOS', 'VIAMONTE 930', 1156439034, 1),
(7, 'c6@cliente', '5a34d1edaea4e32871b6f7503ad4727e', '2023-11-22', 1, 'Perez', 'Beatriz', 'Monroe 334', 2147483647, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `persona` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `persona`, `correo`, `comentario`) VALUES
(1, '', 'admin@admin', 'ssadasda'),
(2, '', 'admin@admin', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj'),
(3, '', 'admin@admin', 'aaaaaaaaaaaaaaaaaaa'),
(4, 'LEONARDO JAVIER PERALTA PERALTA', 'leoperalta.lp24@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaa'),
(5, 'LEONARDO JAVIER PERALTA', 'leoperalta.lp24@gmail.com', 'bbbbbbbbbbbbbbbbbbbbbbb'),
(6, 'LEONARDO JAVIER PERALTA', 'leoperalta.lp24@gmail.com', 'hola'),
(7, 'LEONARDO JAVIER PERALTA', 'leoperalta.lp24@gmail.com', '2'),
(8, 'LEONARDO JAVIER PERALTA', 'leoperalta.lp24@gmail.com', 'e'),
(9, 'Leonardo Peralta', 'leonardoperalta75@gmail.com', 'tt'),
(10, 'ALFONSO CARLOS RUBEN', 'c4@cliente', ''),
(11, 'LEONARDO JAVIER PERALTA', 'leoperalta.lp24@gmail.com', 'fffffffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(11) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `puesto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id`, `clave`, `email`, `fecha_registro`, `estado`, `apellido`, `nombre`, `puesto`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'admin@admin', '2023-11-01', 1, 'Peralta', 'Leonardo', 'admin'),
(2, '94674562a2c2833203491f29d420eed2', 'emple@emple', '2023-11-09', 1, 'Perez', 'Pepe', 'recepcionista'),
(3, 'c73c9dd88b79d836a5bd1e3a368c6d1e', 'emple1@emple1', '2023-11-09', 1, 'Lopez', 'Pablo', 'recepcionista'),
(4, '11971f1904c2cf5c571b84af63e96606', 'emple2@emple2', '2023-11-09', 1, 'Emple', 'qwewqe', 'limpieza'),
(5, '523af537946b79c4f8369ed39ba78605', 'ad@ad', '2023-11-22', 1, 'Baracus', 'Marito', 'recepcionista');

-- --------------------------------------------------------

--
-- Table structure for table `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(10) NOT NULL,
  `piso` int(2) NOT NULL,
  `puerta` int(4) NOT NULL,
  `tipo_habitacion` int(3) NOT NULL,
  `baja` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `habitacion`
--

INSERT INTO `habitacion` (`id`, `piso`, `puerta`, `tipo_habitacion`, `baja`, `descripcion`, `imagen`) VALUES
(9, 123, 123, 3, 0, 'Tv, Wifi ', ''),
(10, 3, 23, 1, 0, 'dfsfdsfdsfdsfdsfds', ''),
(11, 1, 43, 3, 0, 'gdfgdfgdfgdfg', ''),
(12, 4, 44, 2, 0, 'jjjjjjjjjjjjjjjjjjjjjjjj', ''),
(13, 4, 45, 2, 0, 'iiiiiiiiiiiiiiiiiiiiii', ''),
(14, 5, 22, 3, 0, 'yyyyyyyyyyyyyyyyyyyyyyyyyyyy', ''),
(15, 3, 34, 3, 0, 'ooooooooooooooooooooooo', ''),
(16, 2, 22, 1, NULL, 'cama ampli', ''),
(17, 55, 55, 1, NULL, 'eeeeeeeeeeeeee', ''),
(18, 99, 99, 1, NULL, '99999999999', ''),
(19, 10, 10, 4, NULL, 'Habitacion triple con aire acondicionado, suelo de moqueta, TV de pantalla plana y baño completo. Se proporciona ropa de cama, toallas y servicio de limpieza a diario.', '');

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `habitacion` int(11) DEFAULT NULL,
  `tipoHabitacion` int(3) NOT NULL,
  `adicional` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `conocidosPor` int(1) NOT NULL,
  `baja` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `precio`, `id_usuario`, `id_empleado`, `nombre`, `apellido`, `telefono`, `correo`, `fecha_inicio`, `fecha_fin`, `habitacion`, `tipoHabitacion`, `adicional`, `vendedor`, `conocidosPor`, `baja`) VALUES
(19, 800, 1, NULL, 'Gustavo Ez', 'Torres', 12345654, 'ezequieltorres512@gmail.com', '2023-11-17', '2023-11-19', 12, 2, 0, 0, 1, NULL),
(20, 1600, NULL, 1, 'Gustavo Ez', 'Torres', 1234567, 'ezequieltorres512@gmail.com', '2023-11-16', '2023-11-18', 12, 3, 0, 0, 1, 1),
(34, 14000, NULL, 1, 'LEONARDO JAVIER', 'PERALTA PERALTA', 1168697088, 'leoperalta.lp24@gmail.com', '2023-11-23', '2023-12-07', 19, 4, 0, 0, 3, NULL),
(43, 1000, NULL, 1, 'Beatriz', 'Perez', 2147483647, 'empleado4@empleado4', '2023-11-30', '2023-12-02', 16, 1, 0, 0, 5, NULL),
(45, 4000, 7, NULL, 'Beatriz', 'Perez', 2147483647, 'c6@cliente', '2023-12-08', '2023-12-12', 19, 4, 0, 0, 7, NULL),
(46, 5000, NULL, 3, 'Beatriz', 'Perez', 2147483647, 'empleado4@empleado4', '2023-11-25', '2023-11-30', NULL, 4, 0, 0, 4, NULL),
(47, 3000, NULL, 1, 'Beatriz', 'Perez', 2147483647, 'empleado4@empleado4', '2023-11-22', '2023-11-25', NULL, 4, 0, 0, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipohabitacion`
--

CREATE TABLE `tipohabitacion` (
  `id` int(3) NOT NULL,
  `precio` float NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `metros` int(4) NOT NULL,
  `cantBaños` int(1) NOT NULL DEFAULT 1,
  `descripcionCamas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tipohabitacion`
--

INSERT INTO `tipohabitacion` (`id`, `precio`, `titulo`, `metros`, `cantBaños`, `descripcionCamas`) VALUES
(1, 500, 'Habitación Doble Matrimonial Standard', 60, 2, 'Una cama matrimonial'),
(2, 400, 'Habitación Doble Twin Standard', 50, 1, 'Habitación con 2 camas individuales'),
(3, 800, 'Doble cama', 2, 5, 'ASDAS'),
(4, 1000, 'Habitacion Triple Premium', 100, 3, 'Una Cama doble King y una individual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canalesdifusion`
--
ALTER TABLE `canalesdifusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_habitacion` (`tipo_habitacion`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `conocidosPor` (`conocidosPor`),
  ADD KEY `tipoHabitacion` (`tipoHabitacion`),
  ADD KEY `habitacion` (`habitacion`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canalesdifusion`
--
ALTER TABLE `canalesdifusion`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`tipo_habitacion`) REFERENCES `tipohabitacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`conocidosPor`) REFERENCES `canalesdifusion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_4` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_5` FOREIGN KEY (`tipoHabitacion`) REFERENCES `tipohabitacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserva_ibfk_6` FOREIGN KEY (`habitacion`) REFERENCES `habitacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
