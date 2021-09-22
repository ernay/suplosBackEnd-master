-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2021 a las 15:15:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Intelcost_bienes`
--
CREATE DATABASE IF NOT EXISTS `Intelcost_bienes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Intelcost_bienes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `id` int(11) NOT NULL,
  `direction` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `postal_code` varchar(50) NOT NULL,
  `type_b` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bienes`
--

INSERT INTO `bienes` (`id`, `direction`, `city`, `phone`, `postal_code`, `type_b`, `price`) VALUES
(1, 'P.O. Box 657, 9831 Cursus St.', 'Orlando', '488-441-5521', '04436', 'Casa de Campo', '$71,045'),
(3, '7705 Fusce St.', 'Washington', '363-540-9113', '9802', 'Casa de Campo', '$21,796');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bienes`
--
ALTER TABLE `bienes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
