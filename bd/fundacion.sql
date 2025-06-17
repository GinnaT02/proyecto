-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2025 a las 23:19:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

CREATE TABLE `adopciones` (
  `id_adopcion` bigint(20) UNSIGNED NOT NULL,
  `id_mascota` bigint(20) UNSIGNED NOT NULL,
  `id_adoptante` bigint(20) UNSIGNED NOT NULL,
  `fecha_adopcion` date DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `adopciones`
--

INSERT INTO `adopciones` (`id_adopcion`, `id_mascota`, `id_adoptante`, `fecha_adopcion`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 8, 3, '2025-06-17', NULL, '2025-06-18 02:18:58', '2025-06-18 02:18:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptantes`
--

CREATE TABLE `adoptantes` (
  `id_adoptante` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `nro_docum` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `sexo` enum('M','F','Otro') DEFAULT NULL,
  `id_tipo` bigint(20) UNSIGNED DEFAULT NULL,
  `id_localidad` bigint(20) UNSIGNED DEFAULT NULL,
  `id_barrio` bigint(20) UNSIGNED DEFAULT NULL,
  `rol` enum('adoptante','donante','ambos') NOT NULL DEFAULT 'adoptante',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `adoptantes`
--

INSERT INTO `adoptantes` (`id_adoptante`, `nombres`, `telefono`, `direccion`, `edad`, `nro_docum`, `correo`, `sexo`, `id_tipo`, `id_localidad`, `id_barrio`, `rol`, `created_at`, `updated_at`) VALUES
(3, 's', '2', '2', 2, 2, '2@2', 'M', 1, 15, 1, 'adoptante', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `id_barrio` bigint(20) UNSIGNED NOT NULL,
  `nombre_barrio` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`id_barrio`, `nombre_barrio`, `created_at`, `updated_at`) VALUES
(1, 'b', NULL, NULL),
(2, 'bbb', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_condicion`
--

CREATE TABLE `detalle_condicion` (
  `id_condicion` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_donacion`
--

CREATE TABLE `detalle_donacion` (
  `id_detalle` bigint(20) UNSIGNED NOT NULL,
  `id_donacion` bigint(20) UNSIGNED NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `presentacion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id_donacion` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_adoptante` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `descripcion`) VALUES
(1, 'Disponible'),
(2, 'En tratamiento'),
(3, 'Adoptado'),
(4, 'En proceso de adopción'),
(5, 'En recuperación'),
(6, 'No disponible'),
(7, 'Fallecido');

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
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id_historia` bigint(20) UNSIGNED NOT NULL,
  `id_mascota` bigint(20) UNSIGNED NOT NULL,
  `fecha_chequeo` date NOT NULL,
  `peso` double(8,2) NOT NULL,
  `tratamiento` text NOT NULL,
  `observaciones` text DEFAULT NULL,
  `cuidados` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` bigint(20) UNSIGNED NOT NULL,
  `id_mascota` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad_usu`
--

CREATE TABLE `localidad_usu` (
  `id_localidad` bigint(20) UNSIGNED NOT NULL,
  `nombre_localidad` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `localidad_usu`
--

INSERT INTO `localidad_usu` (`id_localidad`, `nombre_localidad`, `created_at`, `updated_at`) VALUES
(1, 'Antonio Nariño', NULL, NULL),
(2, 'Barrios Unidos', NULL, NULL),
(3, 'Bosa', NULL, NULL),
(4, 'Chapinero', NULL, NULL),
(5, 'Ciudad Bolívar', NULL, NULL),
(6, 'Engativá', NULL, NULL),
(7, 'Fontibón', NULL, NULL),
(8, 'Kennedy', NULL, NULL),
(9, 'La Candelaria', NULL, NULL),
(10, 'Los Mártires', NULL, NULL),
(11, 'Puente Aranda', NULL, NULL),
(12, 'Rafael Uribe Uribe', NULL, NULL),
(13, 'San Cristóbal', NULL, NULL),
(14, 'Santa Fe', NULL, NULL),
(15, 'Suba', NULL, NULL),
(16, 'Sumapaz', NULL, NULL),
(17, 'Teusaquillo', NULL, NULL),
(18, 'Tunjuelito', NULL, NULL),
(19, 'Usaquén', NULL, NULL),
(20, 'Usme', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` bigint(20) UNSIGNED NOT NULL,
  `nombre_mascota` varchar(50) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `vacunado` tinyint(1) NOT NULL DEFAULT 0,
  `peligroso` tinyint(1) NOT NULL DEFAULT 0,
  `esterilizado` tinyint(1) NOT NULL DEFAULT 0,
  `destetado` tinyint(1) NOT NULL DEFAULT 0,
  `genero` varchar(10) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `crianza` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_ingreso` date DEFAULT NULL,
  `condiciones_especiales` tinyint(1) NOT NULL DEFAULT 0,
  `raza_id` bigint(20) UNSIGNED DEFAULT NULL,
  `condicion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estado_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `nombre_mascota`, `edad`, `vacunado`, `peligroso`, `esterilizado`, `destetado`, `genero`, `imagen`, `crianza`, `fecha_ingreso`, `condiciones_especiales`, `raza_id`, `condicion_id`, `estado_id`) VALUES
(8, 'ss', 22, 1, 1, 1, 1, 'Macho', 'imagenes/RaMvyMJP3Whl2WSAHU7Oe1adJ7C9OalvY5QKsVas.png', 1, '2025-06-20', 0, 7, NULL, 2);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_07_000000_create_tipo_docum_table', 1),
(6, '2025_06_07_000001_create_barrio_table', 1),
(7, '2025_06_07_000002_create_localidad_usu_table', 1),
(8, '2025_06_07_000003_create_raza_table', 1),
(9, '2025_06_07_000004_create_estado_table', 1),
(10, '2025_06_07_000005_create_presentacion_table', 1),
(11, '2025_06_07_000006_create_detalle_condicion_table', 1),
(12, '2025_06_07_000007_create_adoptantes_table', 1),
(13, '2025_06_07_000008_create_mascotas_table', 1),
(14, '2025_06_07_000009_create_historia_clinica_table', 1),
(15, '2025_06_07_000010_create_adopciones_table', 1),
(16, '2025_06_07_000011_create_imagenes_table', 1),
(17, '2025_06_07_000012_create_donaciones_table', 1),
(18, '2025_06_07_000013_create_detalle_donacion_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id_presentac` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id_raza` bigint(20) UNSIGNED NOT NULL,
  `nombre_raza` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id_raza`, `nombre_raza`) VALUES
(1, 'koker'),
(4, 'kokeradasdasdasd'),
(2, 'koko'),
(3, 'kokw'),
(5, 's'),
(6, 'sds'),
(7, 'ss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_docum`
--

CREATE TABLE `tipo_docum` (
  `id_tipo` bigint(20) UNSIGNED NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_docum`
--

INSERT INTO `tipo_docum` (`id_tipo`, `nombre_tipo`, `created_at`, `updated_at`) VALUES
(1, 'Cédula de Ciudadanía', NULL, NULL),
(2, 'Cédula de Extranjería', NULL, NULL),
(3, 'Pasaporte', NULL, NULL),
(4, 'NIT', NULL, NULL);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`id_adopcion`),
  ADD KEY `adopciones_id_mascota_foreign` (`id_mascota`),
  ADD KEY `adopciones_id_adoptante_foreign` (`id_adoptante`);

--
-- Indices de la tabla `adoptantes`
--
ALTER TABLE `adoptantes`
  ADD PRIMARY KEY (`id_adoptante`),
  ADD KEY `adoptantes_id_tipo_foreign` (`id_tipo`),
  ADD KEY `adoptantes_id_localidad_foreign` (`id_localidad`),
  ADD KEY `adoptantes_id_barrio_foreign` (`id_barrio`);

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`id_barrio`);

--
-- Indices de la tabla `detalle_condicion`
--
ALTER TABLE `detalle_condicion`
  ADD PRIMARY KEY (`id_condicion`);

--
-- Indices de la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `detalle_donacion_id_donacion_foreign` (`id_donacion`),
  ADD KEY `detalle_donacion_presentacion_id_foreign` (`presentacion_id`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id_donacion`),
  ADD KEY `donaciones_id_adoptante_foreign` (`id_adoptante`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `historia_clinica_id_mascota_foreign` (`id_mascota`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `imagenes_id_mascota_foreign` (`id_mascota`);

--
-- Indices de la tabla `localidad_usu`
--
ALTER TABLE `localidad_usu`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `mascota_raza_id_foreign` (`raza_id`),
  ADD KEY `mascota_condicion_id_foreign` (`condicion_id`),
  ADD KEY `mascota_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id_presentac`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id_raza`),
  ADD UNIQUE KEY `razas_nombre_raza_unique` (`nombre_raza`);

--
-- Indices de la tabla `tipo_docum`
--
ALTER TABLE `tipo_docum`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  MODIFY `id_adopcion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `adoptantes`
--
ALTER TABLE `adoptantes`
  MODIFY `id_adoptante` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `id_barrio` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_condicion`
--
ALTER TABLE `detalle_condicion`
  MODIFY `id_condicion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  MODIFY `id_detalle` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id_donacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id_historia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad_usu`
--
ALTER TABLE `localidad_usu`
  MODIFY `id_localidad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentac` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id_raza` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_docum`
--
ALTER TABLE `tipo_docum`
  MODIFY `id_tipo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD CONSTRAINT `adopciones_id_adoptante_foreign` FOREIGN KEY (`id_adoptante`) REFERENCES `adoptantes` (`id_adoptante`) ON DELETE CASCADE,
  ADD CONSTRAINT `adopciones_id_mascota_foreign` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE CASCADE;

--
-- Filtros para la tabla `adoptantes`
--
ALTER TABLE `adoptantes`
  ADD CONSTRAINT `adoptantes_id_barrio_foreign` FOREIGN KEY (`id_barrio`) REFERENCES `barrio` (`id_barrio`) ON DELETE SET NULL,
  ADD CONSTRAINT `adoptantes_id_localidad_foreign` FOREIGN KEY (`id_localidad`) REFERENCES `localidad_usu` (`id_localidad`) ON DELETE SET NULL,
  ADD CONSTRAINT `adoptantes_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_docum` (`id_tipo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  ADD CONSTRAINT `detalle_donacion_id_donacion_foreign` FOREIGN KEY (`id_donacion`) REFERENCES `donaciones` (`id_donacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_donacion_presentacion_id_foreign` FOREIGN KEY (`presentacion_id`) REFERENCES `presentacion` (`id_presentac`);

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_id_adoptante_foreign` FOREIGN KEY (`id_adoptante`) REFERENCES `adoptantes` (`id_adoptante`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_id_mascota_foreign` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_id_mascota_foreign` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_condicion_id_foreign` FOREIGN KEY (`condicion_id`) REFERENCES `detalle_condicion` (`id_condicion`) ON DELETE SET NULL,
  ADD CONSTRAINT `mascota_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id_estado`) ON DELETE SET NULL,
  ADD CONSTRAINT `mascota_raza_id_foreign` FOREIGN KEY (`raza_id`) REFERENCES `razas` (`id_raza`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
