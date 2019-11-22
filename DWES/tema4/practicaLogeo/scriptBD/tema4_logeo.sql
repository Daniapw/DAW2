-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2019 a las 21:25:28
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tema4_logeo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `colorLetra` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `colorFondo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipoLetra` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tamLetra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `direccion`, `localidad`, `mail`, `pass`, `colorLetra`, `colorFondo`, `tipoLetra`, `tamLetra`) VALUES
('Daniel', 'Ruiz', 'sdfds', 'sdfdsf', 'daniruiz51@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 'blue', 'green', 'Comic Sans MS', 18),
('Ooga', 'Booga', 'Aq', 'A', 'ooga@booga.spooky', '82dbdd5ec5d4aa139b33488e39a670e3', 'green', 'red', 'Lucida Sans Unicode', 8),
('Rafa', 'Ruiz', 'sdfds', 'sdfdsf', 'rafaruiz@gmail.com', '35cd2d0d62d9bc5e60a3ca9f7593b05b', 'yellow', 'blue', 'Impact', 36);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
