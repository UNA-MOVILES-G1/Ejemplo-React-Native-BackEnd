-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2022 a las 05:40:09
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbcrudperson`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbperson`
--

CREATE TABLE `tbperson` (
  `identificationperson` int(11) NOT NULL,
  `nameperson` varchar(30) NOT NULL,
  `lastnameperson` varchar(30) NOT NULL,
  `ageperson` int(11) NOT NULL,
  `emailperson` varchar(100) NOT NULL,
  `addressperson` varchar(300) NOT NULL,
  `sexperson` char(1) NOT NULL,
  `phoneperson` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbperson`
--

INSERT INTO `tbperson` (`identificationperson`, `nameperson`, `lastnameperson`, `ageperson`, `emailperson`, `addressperson`, `sexperson`, `phoneperson`) VALUES
(401630271, 'Rafael', 'Valerio Hernández', 46, 'rf2312@gmail.com', 'Heredia, Costa Rica', 'M', '89519178'),
(401640888, 'Luz Ivannia', 'Miranda Hernández', 45, 'lucy2312@gmail.com', 'Heredia, Costa Rica', 'F', '63812166'),
(402530326, 'Keylor', 'Valerio Miranda', 20, 'valerio162001@gmail.com', 'Sarapiquí, Heredia, Costa Rica', 'M', '85631799'),
(402530327, 'Valentina', 'Arias', 30, 'valentina2312@gmail.com', 'Sarapiquí, Heredia, Costa Rica', 'F', '89631223');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbperson`
--
ALTER TABLE `tbperson`
  ADD PRIMARY KEY (`identificationperson`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
