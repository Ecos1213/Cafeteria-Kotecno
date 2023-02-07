-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2023 a las 07:22:19
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria_kotecno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID`, `id_producto`, `cantidad`) VALUES
(8, 39, 100),
(9, 39, 1),
(10, 39, 1),
(11, 39, 50),
(12, 9, 4),
(13, 18, 1),
(14, 41, 10),
(15, 41, 10),
(16, 41, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `NombreProducto` varchar(500) NOT NULL,
  `Referencia` varchar(255) NOT NULL,
  `Precio` int(20) NOT NULL,
  `Peso` int(20) NOT NULL,
  `Categoria` varchar(200) NOT NULL,
  `Stock` int(20) NOT NULL,
  `FechaCreacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `NombreProducto`, `Referencia`, `Precio`, `Peso`, `Categoria`, `Stock`, `FechaCreacion`) VALUES
(18, 'Expresso', 'Ref#E205', 7000, 23, 'Cafe', 50, '2023-02-06 18:27:46'),
(30, 'Latte de caramelo', 'Ref#L222', 10000, 2, 'Cafe', 20, '2023-02-06 18:34:15'),
(37, 'Cafe miel', 'Ref#M115', 7000, 2, 'Cafe', 20, '2023-02-06 18:40:59'),
(38, 'Cafe americano', 'Ref#A221', 8000, 2, 'Cafe', 20, '2023-02-06 18:41:07'),
(39, 'Tinto', 'Ref#T111', 5000, 2, 'Cafe', 48, '2023-02-06 21:28:02'),
(40, 'Capuccino', 'Ref#C115', 8000, 15, 'Cafe', 200, '2023-02-07 00:26:24'),
(41, 'Machiato', 'Ref#M116', 10000, 1, 'Cafe', 20, '2023-02-07 01:15:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
