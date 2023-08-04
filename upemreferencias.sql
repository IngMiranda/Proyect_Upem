-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2023 a las 06:08:24
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `upemreferencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beca`
--

CREATE TABLE `beca` (
  `id_beca` int(10) NOT NULL,
  `porcentaje_beca` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `beca`
--

INSERT INTO `beca` (`id_beca`, `porcentaje_beca`) VALUES
(1, '0%'),
(2, '5%'),
(3, '10%'),
(4, '15%'),
(5, '20%'),
(6, '25%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(30) NOT NULL,
  `nombre_carrera` varchar(40) NOT NULL,
  `costo_carrera` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre_carrera`, `costo_carrera`) VALUES
(1, 'lic derecho', '1850.50'),
(2, 'lic mercadotecnia', '1990.00'),
(3, 'ing sistemas computacionales', '1950.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_pago`
--

CREATE TABLE `concepto_pago` (
  `id_clave_concepto` int(12) NOT NULL,
  `concepto` varchar(20) NOT NULL,
  `p_v` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `concepto_pago`
--

INSERT INTO `concepto_pago` (`id_clave_concepto`, `concepto`, `p_v`) VALUES
(1, 'mensualidad', ''),
(2, 'constancia', '250'),
(3, 'inscripcion', '700'),
(4, 'seguro', '150'),
(5, 'credencial', '200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(12) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `numero_celular` varchar(10) NOT NULL,
  `numero_telefono` varchar(12) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `fk_plantel` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `correo`, `numero_celular`, `numero_telefono`, `contraseña`, `fk_plantel`) VALUES
(1, 'ricardo@gmail.com', '74747487', '34489329838', '12334', 2),
(2, 'luisqgmail.com', '18273782', '83289328932', '23456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(12) NOT NULL,
  `calle` varchar(70) DEFAULT NULL,
  `colonia` varchar(70) DEFAULT NULL,
  `municipio` varchar(60) DEFAULT NULL,
  `manzana` varchar(8) DEFAULT NULL,
  `lote` varchar(8) DEFAULT NULL,
  `casa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `calle`, `colonia`, `municipio`, `manzana`, `lote`, `casa`) VALUES
(1, 'moras', 'san pedro', 'tecamac', '34', '12', '4909');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(30) NOT NULL,
  `grado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `id_modalidad` int(12) NOT NULL,
  `tipo_modalidad` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`id_modalidad`, `tipo_modalidad`) VALUES
(1, 'sabatina '),
(2, 'matutina'),
(3, 'despertina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantel`
--

CREATE TABLE `plantel` (
  `id_plantel` int(6) NOT NULL,
  `nom_plantel` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantel`
--

INSERT INTO `plantel` (`id_plantel`, `nom_plantel`) VALUES
(1, 'UMPEM TECAMAC'),
(2, 'UPEM TEXCOCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_matricula` int(25) NOT NULL,
  `Nom_usuario` varchar(25) NOT NULL,
  `apellido_paterno` varchar(25) NOT NULL,
  `apellido_materno` varchar(25) NOT NULL,
  `fk_contacto` int(12) NOT NULL,
  `fk_plantel` int(12) NOT NULL,
  `fk_carrera` int(12) NOT NULL,
  `fk_modalidad` int(12) NOT NULL,
  `fk_beca` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_matricula`, `Nom_usuario`, `apellido_paterno`, `apellido_materno`, `fk_contacto`, `fk_plantel`, `fk_carrera`, `fk_modalidad`, `fk_beca`) VALUES
(1, 'ricardo', 'nuñes', 'juares', 1, 2, 2, 2, 4),
(2, 'luis', 'll', 'll', 2, 1, 2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beca`
--
ALTER TABLE `beca`
  ADD PRIMARY KEY (`id_beca`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `concepto_pago`
--
ALTER TABLE `concepto_pago`
  ADD PRIMARY KEY (`id_clave_concepto`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `fk_plantel_y` (`fk_plantel`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`id_modalidad`);

--
-- Indices de la tabla `plantel`
--
ALTER TABLE `plantel`
  ADD PRIMARY KEY (`id_plantel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `fk_contacto` (`fk_contacto`),
  ADD KEY `fk_plantel` (`fk_plantel`),
  ADD KEY `fk_carrera` (`fk_carrera`),
  ADD KEY `fk_modalidad` (`fk_modalidad`),
  ADD KEY `fk_beca` (`fk_beca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beca`
--
ALTER TABLE `beca`
  MODIFY `id_beca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `concepto_pago`
--
ALTER TABLE `concepto_pago`
  MODIFY `id_clave_concepto` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `id_modalidad` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `plantel`
--
ALTER TABLE `plantel`
  MODIFY `id_plantel` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_matricula` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_plantel_y` FOREIGN KEY (`fk_plantel`) REFERENCES `plantel` (`id_plantel`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_beca_u` FOREIGN KEY (`fk_beca`) REFERENCES `beca` (`id_beca`),
  ADD CONSTRAINT `fk_carrera_u` FOREIGN KEY (`fk_carrera`) REFERENCES `carrera` (`id_carrera`),
  ADD CONSTRAINT `fk_contacto_u` FOREIGN KEY (`fk_contacto`) REFERENCES `contacto` (`id_contacto`),
  ADD CONSTRAINT `fk_modalidad_u` FOREIGN KEY (`fk_modalidad`) REFERENCES `modalidad` (`id_modalidad`),
  ADD CONSTRAINT `fk_plantel_u` FOREIGN KEY (`fk_plantel`) REFERENCES `plantel` (`id_plantel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
