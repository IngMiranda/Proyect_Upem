-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2024 a las 22:04:16
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
-- Base de datos: `lara_upem_spatie`
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
(1, '0%', NULL, NULL),
(2, '5%', NULL, NULL),
(3, '10%', NULL, NULL);

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
(1, 'derecho', '1900', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contactos` bigint(20) UNSIGNED NOT NULL,
  `num_celular` varchar(255) NOT NULL,
  `num_telefono` varchar(255) NOT NULL,
  `fk_plantel` bigint(20) UNSIGNED NOT NULL,
  `fk_usuario` bigint(20) UNSIGNED NOT NULL,
  `fk_correo` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contactos`, `num_celular`, `num_telefono`, `fk_plantel`, `fk_usuario`, `fk_correo`, `created_at`, `updated_at`) VALUES
(2, '8492809100', '9012902482', 1, 205131, 2, NULL, NULL),
(6, '8463848789', '1209010191', 1, 205134, 7, NULL, NULL),
(7, '1928192891', '1989128774', 1, 205135, 9, NULL, NULL),
(8, '9389241094', '7472237391', 1, 205136, 10, NULL, NULL),
(11, '0908987676', '7687687876', 1, 205139, 16, '2024-03-07 23:07:09', '2024-03-07 23:07:09');

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
(1, '2014_01_18_181432_create_modalidades_table', 1),
(2, '2014_01_22_181409_create_becas_table', 1),
(3, '2014_01_22_181558_create_carreras_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_01_22_181621_create_planteles_table', 1),
(10, '2024_01_22_181659_create_usuarios_table', 1),
(11, '2024_01_22_181728_create_concepto_pagos_table', 1),
(12, '2024_01_22_181800_create_contactos_table', 1),
(13, '2024_02_23_174514_create_permission_tables', 1);

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
(1, 'sabatina', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 3);

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
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create users', 'web', '2024-03-04 23:26:19', '2024-03-04 23:26:19'),
(2, 'esccritor', 'web', '2024-03-05 00:17:59', '2024-03-05 00:17:59'),
(3, 'lector', 'web', '2024-03-05 00:33:45', '2024-03-05 00:33:45');

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
(1, 'upem tecamac', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-03-04 23:26:19', '2024-03-04 23:26:19'),
(2, 'writer', 'web', '2024-03-05 00:17:59', '2024-03-05 00:17:59'),
(3, 'reader', 'web', '2024-03-05 00:33:45', '2024-03-05 00:33:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(3, 3);

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

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'kevin', 'kevin@gmail.com', NULL, '$2y$10$0fJx20r7zvW2kxri/2CIcu1jh4U9atg.h9/YkWsxySXeKX.YVdF.C', NULL, NULL, NULL, NULL, '2024-03-04 23:20:02', '2024-03-04 23:20:02'),
(3, 'luis', 'luis@gmail.com', NULL, '$2y$10$V6stB5zESd9BY4uCM7jpeOJ/AaUipBJCVKiTHsAy9ElnzOE6CoHPa', NULL, NULL, NULL, NULL, '2024-03-05 00:33:19', '2024-03-05 00:33:19'),
(7, 'karen', 'karen@gmail.com', NULL, '$2y$10$hvmF20Am7oPqhwa8/MeOF.b0caBZQsmRFZ5ojMUa4kEoC/32pJRcO', NULL, NULL, NULL, NULL, '2024-03-06 00:07:47', '2024-03-06 00:07:47'),
(8, 'ricardonj', 'ric@gmail.com', NULL, '$2y$10$tvN9OQ9gsWAF6HyiE1ybeuvmXYVIxtMGQs2KlzraeAI04pZKSTF4q', NULL, NULL, NULL, NULL, '2024-03-06 00:10:58', '2024-03-08 00:19:34'),
(9, 'carl', 'carl@gmail.com', NULL, '$2y$10$rJPYTh88DSwprInwuB/Bt.kZSJlQ5gM0Q6dSRcs.Domx4u9b84oS6', NULL, NULL, NULL, NULL, '2024-03-07 00:09:23', '2024-03-07 00:09:23'),
(10, 'isispeche', 'isis_denise@gmail.com', NULL, '$2y$10$B/atQvplJpr8nW6Vdto4q.F6FaiHGQaEc571zdZG9pjZJMNqdDw6u', NULL, NULL, NULL, NULL, '2024-03-07 00:25:51', '2024-03-07 00:25:51'),
(16, 'ricardo', 'ricardo@gmail.com', NULL, '$2y$10$UeWRpN7Kx0ozhKMtolMuIeF1ybI7Zk5TxeuxS4UD58J9oL2ZlGltK', NULL, NULL, NULL, NULL, '2024-03-07 23:07:09', '2024-03-07 23:07:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_matricula` bigint(20) UNSIGNED NOT NULL,
  `apellido_paterno` text NOT NULL,
  `apellido_materno` text NOT NULL,
  `fk_carrera` bigint(20) UNSIGNED NOT NULL,
  `fk_modalidad` bigint(20) UNSIGNED NOT NULL,
  `fk_beca` bigint(20) UNSIGNED NOT NULL,
  `fk_users` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_matricula`, `apellido_paterno`, `apellido_materno`, `fk_carrera`, `fk_modalidad`, `fk_beca`, `fk_users`, `created_at`, `updated_at`) VALUES
(205131, 'kevap', 'kevam', 1, 1, 2, 2, NULL, NULL),
(205134, 'karap', 'karam', 1, 1, 3, 7, NULL, '2024-03-06 00:18:51'),
(205135, 'calap', 'calam', 1, 1, 2, 9, NULL, NULL),
(205136, 'reyes', 'flores', 1, 1, 3, 10, NULL, '2024-03-07 02:54:35'),
(205139, 'ricap', 'ricam', 1, 1, 1, 16, '2024-03-07 23:07:09', '2024-03-07 23:07:09');

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
  ADD KEY `contactos_fk_usuario_foreign` (`fk_usuario`),
  ADD KEY `contactos_fk_correo_foreign` (`fk_correo`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `usuarios_fk_carrera_foreign` (`fk_carrera`),
  ADD KEY `usuarios_fk_modalidad_foreign` (`fk_modalidad`),
  ADD KEY `usuarios_fk_beca_foreign` (`fk_beca`),
  ADD KEY `usuarios_fk_users_foreign` (`fk_users`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id_beca` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `concepto_pagos`
--
ALTER TABLE `concepto_pagos`
  MODIFY `id_clave_concepto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contactos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_matricula` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205140;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_fk_correo_foreign` FOREIGN KEY (`fk_correo`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contactos_fk_plantel_foreign` FOREIGN KEY (`fk_plantel`) REFERENCES `planteles` (`id_plantel`),
  ADD CONSTRAINT `contactos_fk_usuario_foreign` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_matricula`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk_beca_foreign` FOREIGN KEY (`fk_beca`) REFERENCES `becas` (`id_beca`),
  ADD CONSTRAINT `usuarios_fk_carrera_foreign` FOREIGN KEY (`fk_carrera`) REFERENCES `carreras` (`id_carrera`),
  ADD CONSTRAINT `usuarios_fk_modalidad_foreign` FOREIGN KEY (`fk_modalidad`) REFERENCES `modalidades` (`id_modalidad`),
  ADD CONSTRAINT `usuarios_fk_users_foreign` FOREIGN KEY (`fk_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
