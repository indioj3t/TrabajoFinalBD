-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2017 a las 23:18:35
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `user_cliente` varchar(50) NOT NULL,
  `clv_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `cedula`, `direccion`, `telefono`, `user_cliente`, `clv_cliente`) VALUES
(1, 'jorge', '1234', 'car', '4321', 'j3t', '123'),
(2, 'diego', '454567', 'crae', '65432', 'dmh', '456'),
(3, 'sebastian', '45678', 'cr5', '7654', 'sg', '789'),
(4, 'daniel', '87654', 'cr6', '45678', 'dtb', '1092');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(9) NOT NULL,
  `nit_empresa` varchar(10) NOT NULL,
  `nom_empresa` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nit_empresa`, `nom_empresa`, `telefono`, `direccion`) VALUES
(2, '1234', 'empresa', '4321', 'car2'),
(3, '1234', 'empresa 4', '4321', 'car4'),
(4, '123456', 'empresa 5', '654321', 'car5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen_destino`
--

CREATE TABLE `origen_destino` (
  `id` int(9) NOT NULL,
  `origendestino` varchar(50) NOT NULL,
  `tiempo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `origen_destino`
--

INSERT INTO `origen_destino` (`id`, `origendestino`, `tiempo`) VALUES
(1, 'pereira - cali', 150),
(2, 'cali - pereira', 150),
(3, 'bogota - pereira', 5000),
(4, 'pereira - bogota', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producción`
--

CREATE TABLE `tbl_producción` (
  `id` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_visita`
--

CREATE TABLE `tbl_visita` (
  `id_visita` int(11) NOT NULL,
  `descripcion` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_visita`
--

INSERT INTO `tbl_visita` (`id_visita`, `descripcion`) VALUES
(1, 'Exito'),
(2, 'hola'),
(4, 'joka');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` varchar(128) NOT NULL,
  `clave` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `clave`) VALUES
('root', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `origen_destino`
--
ALTER TABLE `origen_destino`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_visita`
--
ALTER TABLE `tbl_visita`
  ADD PRIMARY KEY (`id_visita`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `origen_destino`
--
ALTER TABLE `origen_destino`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_visita`
--
ALTER TABLE `tbl_visita`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
