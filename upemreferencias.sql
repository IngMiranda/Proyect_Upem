-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2024 a las 21:26:14
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `p_v` varchar(9) NOT NULL,
  `fk_carrera_costo` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `concepto_pago`
--

INSERT INTO `concepto_pago` (`id_clave_concepto`, `concepto`, `p_v`, `fk_carrera_costo`) VALUES
(1, 'mensualidad', '', 0),
(2, 'constancia', '250', 0),
(3, 'inscripcion', '700', 0),
(4, 'seguro', '150', 0),
(5, 'credencial', '200', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(25) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `numero_celular` varchar(10) NOT NULL,
  `numero_telefono` varchar(12) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `fk_plantel` int(12) NOT NULL,
  `fk_rol` int(12) NOT NULL,
  `fk_usuario` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `correo`, `numero_celular`, `numero_telefono`, `contraseña`, `fk_plantel`, `fk_rol`, `fk_usuario`) VALUES
(16, 'luis@gmail.com', '1234567890', '1234567890', '123456', 2, 2, 68),
(18, 'ricardo@gmail.com', '1234567890', '1234567890', '12334', 2, 1, 67),
(26, 'angel@gmail.com', '123456789', '1234567890', '12355', 1, 2, 74),
(27, 'kevin@gmail.com', '1234567890', '2516367839', '12345iuisnd9232930', 1, 1, 75),
(37, 'prueba@gmail.com', '1234567890', '1234567890', 'iiodfd9ds89dj', 2, 2, 92),
(39, 'adrian@gmail.com', '1234567890', '1234567890', '1q2w3e4r5t/', 2, 2, 117),
(40, 'adrian22@gmail.com', '1234567890', '1234567890', '1qa3er4r4654', 2, 2, 118),
(41, 'carlos44@gmal.com', '1234567890', '1234567890', '1q2w3e4r5t|', 1, 2, 119),
(42, 'angel@gmail.com', '1234567890', '1234567890', '8i7u6y5tJ$', 1, 2, 120),
(43, 'angel@gmail.com', '1234567890', '1234567890', '8i7u6y5tJ$', 1, 2, 121),
(45, 'as@jfjd.cs', '1234567890', '1234567890', '28e8rhf8hf8wuhfbw9', 1, 2, 123),
(46, 'aslk@gmjd.cjdfj', '1298249902', '9198249210', '189hf8uheef92he92h', 2, 2, 124),
(47, 'jose@gmail.com', '1092013898', '5569898988', '9ok9isjdiwje293j29', 2, 2, 125),
(49, 'luis9@gmail.com', '9012948890', '9010291209', '9o98i7u6y5t4r3e356', 2, 2, 127),
(50, 'qwqw@gadd.com', '9898989821', '6126721667', '8q8wu287ed7w78q78e', 2, 2, 128),
(52, 'iigigjs@gmail.com', '5637328398', '5611928121', 'ioerierioiorireioo', 2, 2, 130),
(53, 'ioi@gmil.com', '34567', '123456', '903274578fy8hrfuer', 2, 2, 131);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matriculas` int(20) NOT NULL,
  `matricula` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matriculas`, `matricula`) VALUES
(1, 220011012024),
(2, 220111012024),
(3, 220211012024),
(4, 220311012024),
(5, 220411012024);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `id_modalidad` int(12) NOT NULL,
  `tipo_modalidad` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`id_modalidad`, `tipo_modalidad`) VALUES
(1, 'sabatina '),
(2, 'matutina'),
(3, 'despertina'),
(4, 'escolarizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantel`
--

CREATE TABLE `plantel` (
  `id_plantel` int(6) NOT NULL,
  `nom_plantel` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantel`
--

INSERT INTO `plantel` (`id_plantel`, `nom_plantel`) VALUES
(1, 'UMPEM TECAMAC'),
(2, 'UPEM TEXCOCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(12) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador '),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_matricula` int(25) NOT NULL,
  `Nom_usuario` varchar(25) NOT NULL,
  `apellido_paterno` varchar(25) NOT NULL,
  `apellido_materno` varchar(25) NOT NULL,
  `fk_carrera` int(12) NOT NULL,
  `fk_modalidad` int(12) NOT NULL,
  `fk_beca` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_matricula`, `Nom_usuario`, `apellido_paterno`, `apellido_materno`, `fk_carrera`, `fk_modalidad`, `fk_beca`) VALUES
(67, 'ricardo ', 'nuñes ', 'juares', 2, 4, 2),
(68, 'luis ', 'luisap ', 'luisam', 2, 3, 4),
(74, 'angel', 'angelap', 'angelam', 3, 4, 6),
(75, 'kevin', 'kap', 'kam', 2, 1, 6),
(92, 'alejandro', 'gomez ', 'gomez', 3, 3, 5),
(93, 'luis', 'lopez', 'lopez', 3, 1, 6),
(94, 'carlos', 'ap', 'am', 2, 2, 2),
(117, 'adrian', 'aap', 'aam', 3, 3, 3),
(118, 'adrian', 'lopez', 'lopez', 2, 4, 4),
(119, 'carlos', 'perez', 'perez', 2, 4, 4),
(120, 'angel', 'anap', 'anam', 1, 4, 5),
(121, 'angel', 'anap', 'anam', 1, 4, 5),
(122, 'adrian', 'adrap', 'adram', 3, 3, 5),
(123, 'holaaa', 'holap', 'holam', 3, 4, 3),
(124, 'as', 'asap', 'asam', 3, 4, 6),
(125, 'jose', 'luap', 'luam', 3, 4, 1),
(127, 'dd', 'dd', 'dd', 3, 4, 4),
(128, 'ggg', 'ggg', 'gggg', 3, 4, 5),
(130, 'we', 'we', 'we', 3, 3, 6),
(131, 'gghola', 'jfjk', 'josam', 1, 1, 2);

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
  ADD PRIMARY KEY (`id_clave_concepto`),
  ADD KEY `fk_carrera_costo_ca` (`fk_carrera_costo`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `fk_plantel_y` (`fk_plantel`),
  ADD KEY `fk_rol_r` (`fk_rol`),
  ADD KEY `fk_usuario` (`fk_usuario`);

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
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matriculas`);

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
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_matricula`),
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
  MODIFY `id_contacto` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matriculas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `id_modalidad` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `plantel`
--
ALTER TABLE `plantel`
  MODIFY `id_plantel` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_matricula` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_plantel_y` FOREIGN KEY (`fk_plantel`) REFERENCES `plantel` (`id_plantel`),
  ADD CONSTRAINT `fk_rol_r` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_usuario_u` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_matricula`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_beca_u` FOREIGN KEY (`fk_beca`) REFERENCES `beca` (`id_beca`),
  ADD CONSTRAINT `fk_carrera_u` FOREIGN KEY (`fk_carrera`) REFERENCES `carrera` (`id_carrera`),
  ADD CONSTRAINT `fk_modalidad_u` FOREIGN KEY (`fk_modalidad`) REFERENCES `modalidad` (`id_modalidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
