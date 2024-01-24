-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2024 a las 21:12:18
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
-- Base de datos: `upemref_lara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas`
--

CREATE TABLE `becas` (
  `id_beca` bigint(20) UNSIGNED NOT NULL,
  `porcentaje_beca` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `becas`
--

INSERT INTO `becas` (`id_beca`, `porcentaje_beca`, `created_at`, `updated_at`) VALUES
(1, '5%', NULL, NULL),
(2, '10%', NULL, NULL),
(3, '15%', NULL, NULL),
(4, '20%', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` bigint(20) UNSIGNED NOT NULL,
  `nombre_carrera` varchar(255) NOT NULL,
  `costo_carrera` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`, `costo_carrera`, `created_at`, `updated_at`) VALUES
(1, 'DERECHO', '1990.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_pagos`
--

CREATE TABLE `concepto_pagos` (
  `id_clave_concepto` bigint(20) UNSIGNED NOT NULL,
  `clave_concepto` varchar(255) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `p_v` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `concepto_pagos`
--

INSERT INTO `concepto_pagos` (`id_clave_concepto`, `clave_concepto`, `concepto`, `p_v`, `created_at`, `updated_at`) VALUES
(1, '342', 'credencial', '23', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contactos` bigint(20) UNSIGNED NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(18) DEFAULT NULL,
  `num_celular` varchar(255) NOT NULL,
  `num_telefono` varchar(255) NOT NULL,
  `fk_plantel` bigint(20) UNSIGNED NOT NULL,
  `fk_usuario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contactos`, `correo`, `password`, `num_celular`, `num_telefono`, `fk_plantel`, `fk_usuario`, `created_at`, `updated_at`) VALUES
(2, 'LUIS@GMAIL.COM', '123456789012345678', '1234567890', '1234567890', 1, 1, NULL, NULL),
(3, 'kevin@gmail.com', NULL, '1234567890', '1234567890', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id_matriculas` bigint(20) UNSIGNED NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id_matriculas`, `matricula`, `created_at`, `updated_at`) VALUES
(1, '21004849', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_22_181409_create_becas_table', 1),
(7, '2024_01_22_181432_create_modalidades_table', 1),
(8, '2024_01_22_181534_create_matriculas_table', 1),
(9, '2024_01_22_181558_create_carreras_table', 1),
(10, '2024_01_22_181621_create_planteles_table', 1),
(11, '2024_01_22_181659_create_usuarios_table', 1),
(12, '2024_01_22_181728_create_concepto_pagos_table', 1),
(13, '2024_01_22_181800_create_contactos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id_modalidad` bigint(20) UNSIGNED NOT NULL,
  `tipo_modalidad` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id_modalidad`, `tipo_modalidad`, `created_at`, `updated_at`) VALUES
(1, 'SABATINA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planteles`
--

CREATE TABLE `planteles` (
  `id_plantel` bigint(20) UNSIGNED NOT NULL,
  `nom_plantel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `planteles`
--

INSERT INTO `planteles` (`id_plantel`, `nom_plantel`, `created_at`, `updated_at`) VALUES
(1, 'UPEM TECAMAC', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nom_usuario` text NOT NULL,
  `apellido_paterno` text NOT NULL,
  `apellido_materno` text NOT NULL,
  `fk_carrera` bigint(20) UNSIGNED NOT NULL,
  `fk_modalidad` bigint(20) UNSIGNED NOT NULL,
  `fk_beca` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nom_usuario`, `apellido_paterno`, `apellido_materno`, `fk_carrera`, `fk_modalidad`, `fk_beca`, `created_at`, `updated_at`) VALUES
(1, 'LUIS', 'LUIAP', 'LUIAM', 1, 1, 4, NULL, NULL),
(2, 'kevin', 'keap', 'keam', 1, 1, 3, NULL, NULL),
(3, 'hola', 'ggapellidop', 'luam', 1, 1, 4, '2024-01-25 01:05:37', '2024-01-25 01:05:37'),
(4, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:13:10', '2024-01-25 01:13:10'),
(5, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:13:26', '2024-01-25 01:13:26'),
(6, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:15:01', '2024-01-25 01:15:01'),
(7, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:15:12', '2024-01-25 01:15:12'),
(8, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:16:05', '2024-01-25 01:16:05'),
(9, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:18:38', '2024-01-25 01:18:38'),
(10, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:21:53', '2024-01-25 01:21:53'),
(11, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:22:33', '2024-01-25 01:22:33'),
(12, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:22:47', '2024-01-25 01:22:47'),
(13, 'carlos', 'lopez', 'josam', 1, 1, 4, '2024-01-25 01:22:58', '2024-01-25 01:22:58'),
(14, 'hola', 'holaap', 'holaam', 1, 1, 3, '2024-01-25 01:28:16', '2024-01-25 01:28:16'),
(15, 'kk', 'kk', 'k', 1, 1, 3, '2024-01-25 01:54:27', '2024-01-25 01:54:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`id_beca`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `concepto_pagos`
--
ALTER TABLE `concepto_pagos`
  ADD PRIMARY KEY (`id_clave_concepto`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contactos`),
  ADD KEY `contactos_fk_plantel_foreign` (`fk_plantel`),
  ADD KEY `contactos_fk_usuario_foreign` (`fk_usuario`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id_matriculas`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id_modalidad`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `planteles`
--
ALTER TABLE `planteles`
  ADD PRIMARY KEY (`id_plantel`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuarios_fk_carrera_foreign` (`fk_carrera`),
  ADD KEY `usuarios_fk_modalidad_foreign` (`fk_modalidad`),
  ADD KEY `usuarios_fk_beca_foreign` (`fk_beca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id_beca` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `concepto_pagos`
--
ALTER TABLE `concepto_pagos`
  MODIFY `id_clave_concepto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contactos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id_matriculas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id_modalidad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planteles`
--
ALTER TABLE `planteles`
  MODIFY `id_plantel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_fk_plantel_foreign` FOREIGN KEY (`fk_plantel`) REFERENCES `planteles` (`id_plantel`),
  ADD CONSTRAINT `contactos_fk_usuario_foreign` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk_beca_foreign` FOREIGN KEY (`fk_beca`) REFERENCES `becas` (`id_beca`),
  ADD CONSTRAINT `usuarios_fk_carrera_foreign` FOREIGN KEY (`fk_carrera`) REFERENCES `carreras` (`id_carrera`),
  ADD CONSTRAINT `usuarios_fk_modalidad_foreign` FOREIGN KEY (`fk_modalidad`) REFERENCES `modalidades` (`id_modalidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
