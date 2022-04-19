-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-04-2022 a las 00:15:13
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u421722484_unad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` bigint(20) UNSIGNED NOT NULL,
  `actividad` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `id_procedimiento` int(255) NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `tiempo` int(20) NOT NULL,
  `id_actividad_anterior` int(255) DEFAULT NULL,
  `id_actividad_posterior` int(255) DEFAULT NULL,
  `paralela` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `actividad`, `descripcion`, `tipo`, `fecha_inicio`, `fecha_cierre`, `id_procedimiento`, `estado`, `observacion`, `orden`, `tiempo`, `id_actividad_anterior`, `id_actividad_posterior`, `paralela`, `created_at`, `updated_at`) VALUES
(1, 'Formular la propuesta de creación del programa.', 'Consolidar la información y formulación de la propuesta zonal y nacional que indique la pertinencia del programa académico.', 'actividad', '2020-12-03', '2020-12-06', 1, 'Finalizada', NULL, 1, 3, NULL, NULL, 'no', '2020-12-03 04:26:59', '2020-12-03 04:37:16'),
(2, 'Presentar la propuesta de creación del programa a Consejo de Escuela.', 'Presentar la propuesta por parte del Decano y revisión de esta por el Consejo de Escuela. Si se aprueba, sigue al paso 3, si no se aprueba vuelve al paso 1.', 'desicion', '2020-12-07', '2020-12-12', 1, 'Finalizada', NULL, 2, 5, 1, NULL, 'no', '2020-12-03 04:26:59', '2020-12-03 04:37:24'),
(3, 'Formular Plan operativo de la Escuela.', 'Establecer en el plan operativo de la Escuela la propuesta para la creación de un programa académico.', 'actividad', '2020-12-13', '2020-12-17', 1, 'Finalizada', NULL, 3, 4, NULL, NULL, 'no', '2020-12-03 04:26:59', '2020-12-03 04:37:37'),
(4, 'Formular la propuesta de creación del programa', 'Consolidar la información y formulación de la propuesta zonal y nacional que indique la pertinencia del programa académico', 'actividad', '2021-02-23', '2021-02-26', 2, 'Abierta', NULL, 1, 3, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-02 02:36:38'),
(5, 'Presentar la propuesta de creación del programa a Consejo de Escuela', 'Presentar la propuesta por parte del Decano y revisión de esta por el Consejo de Escuela. Si se aprueba, sigue al paso 3, si no se aprueba vuelve al paso 1', 'actividad', '2021-02-27', '2021-03-04', 2, 'Abierta', NULL, 2, 5, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(6, '¿Se aprueba la propuesta 1?', NULL, 'desicion', '2021-03-05', '2021-03-06', 2, 'Pendiente', NULL, 3, 1, 4, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(7, 'Formular Plan operativo de la Escuela', 'Establecer en el plan operativo de la Escuela la propuesta para la creación de un programa académico', 'actividad', '2021-03-07', '2021-03-11', 2, 'Abierta', NULL, 4, 4, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(8, 'Conformar equipo de expertos disciplinares', 'Definir el equipo disciplinario para elaborar Documento Maestro del programa a crear', 'actividad', '2021-03-12', '2021-03-14', 2, 'Abierta', NULL, 5, 2, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(9, 'Construir Documento Maestro del programa a crear', 'Construir el Documento Maestro del programa según condiciones de calidad del decreto 1295 de 2010y los requisitos del aplicativo SACES', 'actividad', '2021-03-15', '2021-05-14', 2, 'Abierta', NULL, 6, 60, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(10, 'Presentar Documento Maestro del programa a Consejo de Escuela', 'Revisar el documento maestro del programa a crear por parte del Consejo de Escuela', 'actividad', '2021-05-15', '2021-05-16', 2, 'Abierta', NULL, 7, 1, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(11, '¿Consejo de Escuela aprueba la propuesta 2?', NULL, 'desicion', '2021-05-17', '2021-05-18', 2, 'Pendiente', NULL, 8, 1, 4, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(12, 'Revisar el documento maestro del programa (Cond 3, 4 y 5)', NULL, 'actividad', '2021-05-19', '2021-05-27', 2, 'Abierta', NULL, 9, 8, NULL, NULL, 'si', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(13, 'Revisar el documento maestro del programa (Cond 1, 2, 6 y 15)', NULL, 'actividad', '2021-05-28', '2021-06-05', 2, 'Abierta', NULL, 10, 8, NULL, NULL, 'si', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(14, 'Ajustar documento maestro del programa', 'Realizar los ajustes al Documento Maestro, con base en las observaciones dadas por los revisores', 'actividad', '2021-06-06', '2021-06-11', 2, 'Abierta', NULL, 11, 5, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(15, 'Presentar el documento maestro al Consejo Académico', 'Sustentar las condiciones de calidad para la creación del nuevo programa académico. El Consejo Académico revisa el documento maestro y la presentación y emite un concepto', 'actividad', '2021-06-12', '2021-06-13', 2, 'Abierta', NULL, 12, 1, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(16, '¿Consejo Academico aprueba propuesta?', NULL, 'desicion', '2021-06-14', '2021-06-15', 2, 'Pendiente', NULL, 13, 1, 4, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(17, 'Presentar el nuevo programa académico al Consejo Superior', 'Sustentar las condiciones de calidad para la creación del nuevo programa académico', 'actividad', '2021-06-16', '2021-06-17', 2, 'Abierta', NULL, 14, 1, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(18, '¿Consejo Superior aprueba la propuesta?', NULL, 'desicion', '2021-06-18', '2021-06-19', 2, 'Pendiente', NULL, 15, 1, 4, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(19, 'Diseñar y Acreditar cursos', 'Diseñar y acreditar el 15% de cursos del micro currículo del nuevo programa académico. Continuar con el “Procedimiento diseño microcurricular de curso de educación superior” P-8-6', 'actividad', '2021-06-20', '2021-07-20', 2, 'Abierta', NULL, 16, 30, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(20, 'Ingresar información del programa a la aplicación del SACES', 'Diligenciar los campos del aplicativo del Sistema de Aseguramiento de la Calidad Superior SACES', 'actividad', '2021-07-21', '2021-07-22', 2, 'Abierta', NULL, 17, 1, NULL, NULL, 'no', '2021-02-03 01:11:48', '2021-03-01 23:50:27'),
(21, '¿Solicita completitud?', NULL, 'desicion', '2021-07-23', '2021-07-24', 2, 'Pendiente', NULL, 18, 1, 23, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(22, 'Surtir proceso de completitud de condiciones mínimas de calidad', 'Elaborar la respuesta de completitud de condiciones mínimas de calidad, acorde al requerimiento registrado en el Sistema de Aseguramiento de la Calidad Superior SACES', 'actividad', '2021-07-25', '2021-08-02', 2, 'Abierta', NULL, 19, 8, NULL, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(23, 'Atender visita de pares', 'Atender la visita de pares académicos programada por CONACES para verificación de condiciones del programa', 'actividad', '2021-08-03', '2021-08-08', 2, 'Abierta', NULL, 20, 5, NULL, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(24, 'Atender notificación SACES', 'De acuerdo con el concepto emitido por la sala de CONACES, se atiende la notificación según el caso', 'actividad', '2021-08-09', '2021-08-10', 2, 'Abierta', NULL, 21, 1, NULL, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(25, '¿se traslada concepto?', NULL, 'desicion', '2021-08-11', '2021-08-12', 2, 'Pendiente', NULL, 22, 1, 27, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(26, 'Responder traslado de concepto', NULL, 'actividad', '2021-08-13', '2021-08-14', 2, 'Abierta', NULL, 23, 1, NULL, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(27, '¿Se otorga registro calificado 1?', NULL, 'desicion', '2021-08-15', '2021-08-16', 2, 'Pendiente', NULL, 24, 1, 28, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(28, 'Contestar en recurso de reposición', 'Si el concepto es favorable por parte de la sala de CONACES pasa al 19 de lo contrario se pasa al punto 1', 'actividad', '2021-08-17', '2021-08-20', 2, 'Abierta', NULL, 25, 3, NULL, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(29, '¿Se otorga registro calificado 2?', NULL, 'desicion', '2021-08-21', '2021-08-22', 2, 'Pendiente', NULL, 26, 1, 4, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27'),
(30, 'Divulgar la información del registro calificado', 'Divulgar la denominación, número de resolución, código SNIES y demás información relevante para la oferta del nuevo programa académico', 'actividad', '2021-08-23', '2021-08-28', 2, 'Abierta', NULL, 27, 5, NULL, NULL, 'no', '2021-02-03 01:11:49', '2021-03-01 23:50:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_plantillas`
--

CREATE TABLE `actividad_plantillas` (
  `id_actividad` bigint(20) UNSIGNED NOT NULL,
  `actividad` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paralela` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo` int(11) NOT NULL,
  `id_actividad_anterior` int(255) DEFAULT NULL,
  `id_actividad_posterior` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividad_plantillas`
--

INSERT INTO `actividad_plantillas` (`id_actividad`, `actividad`, `descripcion`, `tipo`, `paralela`, `tiempo`, `id_actividad_anterior`, `id_actividad_posterior`, `created_at`, `updated_at`) VALUES
(1, 'Formular la propuesta de creación del programa', 'Consolidar la información y formulación de la propuesta zonal y nacional que indique la pertinencia del programa académico', 'actividad', 'no', 3, NULL, NULL, '2020-12-03 03:58:01', '2021-02-02 23:43:09'),
(2, 'Presentar la propuesta de creación del programa a Consejo de Escuela', 'Presentar la propuesta por parte del Decano y revisión de esta por el Consejo de Escuela. Si se aprueba, sigue al paso 3, si no se aprueba vuelve al paso 1', 'actividad', 'no', 5, NULL, NULL, '2020-12-03 03:58:37', '2021-02-02 23:43:54'),
(3, 'Formular Plan operativo de la Escuela', 'Establecer en el plan operativo de la Escuela la propuesta para la creación de un programa académico', 'actividad', 'no', 4, NULL, NULL, '2020-12-03 04:21:27', '2021-02-02 23:44:17'),
(4, '¿Se aprueba la propuesta 1?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-02 23:45:50', '2021-02-02 23:52:30'),
(5, 'Conformar equipo de expertos disciplinares', 'Definir el equipo disciplinario para elaborar Documento Maestro del programa a crear', 'actividad', 'no', 2, NULL, NULL, '2021-02-02 23:47:55', '2021-02-02 23:48:36'),
(6, 'Construir Documento Maestro del programa a crear', 'Construir el Documento Maestro del programa según condiciones de calidad del decreto 1295 de 2010y los requisitos del aplicativo SACES', 'actividad', 'no', 60, NULL, NULL, '2021-02-02 23:49:30', '2021-02-02 23:49:30'),
(7, 'Presentar Documento Maestro del programa a Consejo de Escuela', 'Revisar el documento maestro del programa a crear por parte del Consejo de Escuela', 'actividad', 'no', 1, NULL, NULL, '2021-02-02 23:50:05', '2021-02-02 23:50:05'),
(8, '¿Consejo de Escuela aprueba la propuesta 2?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-02 23:50:49', '2021-02-02 23:52:37'),
(9, 'Revisar el documento maestro del programa (Cond 3, 4 y 5)', NULL, 'actividad', 'si', 8, NULL, NULL, '2021-02-02 23:56:41', '2021-02-02 23:56:41'),
(10, 'Revisar el documento maestro del programa (Cond 1, 2, 6 y 15)', NULL, 'actividad', 'si', 8, NULL, NULL, '2021-02-02 23:57:14', '2021-02-02 23:57:14'),
(11, 'Ajustar documento maestro del programa', 'Realizar los ajustes al Documento Maestro, con base en las observaciones dadas por los revisores', 'actividad', 'no', 5, NULL, NULL, '2021-02-02 23:58:17', '2021-02-02 23:58:17'),
(12, 'Presentar el documento maestro al Consejo Académico', 'Sustentar las condiciones de calidad para la creación del nuevo programa académico. El Consejo Académico revisa el documento maestro y la presentación y emite un concepto', 'actividad', 'no', 1, NULL, NULL, '2021-02-02 23:59:20', '2021-02-02 23:59:20'),
(13, '¿Consejo Academico aprueba propuesta?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-03 00:00:05', '2021-02-03 00:00:05'),
(14, 'Presentar el nuevo programa académico al Consejo Superior', 'Sustentar las condiciones de calidad para la creación del nuevo programa académico', 'actividad', 'no', 1, NULL, NULL, '2021-02-03 00:01:19', '2021-02-03 00:01:19'),
(15, '¿Consejo Superior aprueba la propuesta?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-03 00:01:44', '2021-02-03 00:01:44'),
(16, 'Diseñar y Acreditar cursos', 'Diseñar y acreditar el 15% de cursos del micro currículo del nuevo programa académico. Continuar con el “Procedimiento diseño microcurricular de curso de educación superior” P-8-6', 'actividad', 'no', 30, NULL, NULL, '2021-02-03 00:02:32', '2021-02-03 00:02:32'),
(17, 'Ingresar información del programa a la aplicación del SACES', 'Diligenciar los campos del aplicativo del Sistema de Aseguramiento de la Calidad Superior SACES', 'actividad', 'no', 1, NULL, NULL, '2021-02-03 00:03:16', '2021-02-03 00:03:16'),
(18, '¿Solicita completitud?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-03 00:04:01', '2021-02-03 00:04:01'),
(19, 'Surtir proceso de completitud de condiciones mínimas de calidad', 'Elaborar la respuesta de completitud de condiciones mínimas de calidad, acorde al requerimiento registrado en el Sistema de Aseguramiento de la Calidad Superior SACES', 'actividad', 'no', 8, NULL, NULL, '2021-02-03 00:05:02', '2021-02-03 00:05:02'),
(20, 'Atender visita de pares', 'Atender la visita de pares académicos programada por CONACES para verificación de condiciones del programa', 'actividad', 'no', 5, NULL, NULL, '2021-02-03 00:05:35', '2021-02-03 00:05:35'),
(21, 'Atender notificación SACES', 'De acuerdo con el concepto emitido por la sala de CONACES, se atiende la notificación según el caso', 'actividad', 'no', 1, NULL, NULL, '2021-02-03 00:09:00', '2021-02-03 00:09:00'),
(22, '¿se traslada concepto?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-03 00:10:01', '2021-02-03 00:10:01'),
(23, 'Responder traslado de concepto', NULL, 'actividad', 'no', 1, NULL, NULL, '2021-02-03 00:10:33', '2021-02-03 00:10:33'),
(24, '¿Se otorga registro calificado 1?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-03 00:11:05', '2021-02-03 00:16:44'),
(25, 'Contestar en recurso de reposición', 'Si el concepto es favorable por parte de la sala de CONACES pasa al 19 de lo contrario se pasa al punto 1', 'actividad', 'no', 3, NULL, NULL, '2021-02-03 00:15:31', '2021-02-03 00:15:31'),
(26, '¿Se otorga registro calificado 2?', NULL, 'desicion', 'no', 1, NULL, NULL, '2021-02-03 00:17:03', '2021-02-03 00:17:03'),
(27, 'Divulgar la información del registro calificado', 'Divulgar la denominación, número de resolución, código SNIES y demás información relevante para la oferta del nuevo programa académico', 'actividad', 'no', 5, NULL, NULL, '2021-02-03 00:17:48', '2021-02-03 00:17:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE `anexos` (
  `id_anexo` bigint(20) UNSIGNED NOT NULL,
  `id_procedimiento` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `anexos`
--

INSERT INTO `anexos` (`id_anexo`, `id_procedimiento`, `descripcion`, `file`, `created_at`, `updated_at`) VALUES
(1, 2, 'Primer anexo', 'Actividad manzana.pdf', '2021-02-24 20:24:57', '2021-02-24 20:24:57'),
(2, 1, 'Primer anexo', 'proyecto solidario.pdf', '2021-03-02 01:52:14', '2021-03-02 01:52:14'),
(3, 1, 'Segundo anexo', 'Actividad manzana_12.docx', '2021-03-02 01:52:45', '2021-03-02 01:52:45'),
(4, 2, 'Segundo anexo', 'Diagrama de flujo y pseudocódigo.pdf', '2021-03-02 02:32:04', '2021-03-02 02:32:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anotaciones`
--

CREATE TABLE `anotaciones` (
  `id_anotacion` bigint(20) UNSIGNED NOT NULL,
  `id_procedimiento` int(11) NOT NULL,
  `anotacion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE `centros` (
  `id_cead` bigint(20) UNSIGNED NOT NULL,
  `cead` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_zona` int(11) NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sigla` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`id_cead`, `cead`, `id_zona`, `codigo`, `sigla`, `created_at`, `updated_at`) VALUES
(1, 'CENTRO SUR', 1, '001', 'CS', '2020-12-03 03:49:06', '2020-12-03 03:49:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `id_escuela` bigint(20) UNSIGNED NOT NULL,
  `escuela` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id_escuela`, `escuela`, `sigla`, `created_at`, `updated_at`) VALUES
(1, 'Ciencias Básicas Tecnología e Ingeniería', 'ECBTI', '2020-12-03 03:44:00', '2020-12-03 04:03:37'),
(2, 'SALUD', 'SALUD', '2020-12-03 03:44:15', '2020-12-03 03:44:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `id_response` int(255) DEFAULT NULL,
  `id_activity` int(255) DEFAULT NULL,
  `id_report` int(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_actividades`
--

CREATE TABLE `insumo_actividades` (
  `id_insumo` bigint(20) UNSIGNED NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `observacion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacidad` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `insumo_actividades`
--

INSERT INTO `insumo_actividades` (`id_insumo`, `id_actividad`, `id_tipo_recurso`, `observacion`, `privacidad`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'Público', NULL, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(2, 2, 2, '', 'Público', NULL, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(3, 4, 1, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(4, 4, 4, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(5, 4, 5, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(6, 4, 6, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(7, 5, 2, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(8, 7, 8, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(9, 8, 2, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(10, 8, 9, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(11, 9, 2, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(12, 10, 12, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(13, 12, 12, 'Documento maestro aprobado por el Consejo de Escuela', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(14, 13, 12, 'Documento maestro aprobado por el Consejo de Escuela', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(15, 14, 14, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(16, 14, 15, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(17, 15, 12, 'Documento Maestro ajustado según revisiones', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(18, 17, 12, 'Documento maestro ajustado según revisiones VIACI y VISAE', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(19, 19, 12, 'Documento Maestro ajustado según revisiones VIACI y VISAE', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(20, 20, 12, 'Documento maestro aprobado', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(21, 20, 19, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(22, 22, 22, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(23, 23, 23, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(24, 23, 18, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(25, 23, 19, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(26, 23, 12, 'Documento maestro aprobado', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(27, 24, 24, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(28, 24, 20, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(29, 26, 26, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(30, 28, 27, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(31, 30, 25, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_actividad_plantillas`
--

CREATE TABLE `insumo_actividad_plantillas` (
  `id_insumo_actividad_plantilla` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `observacion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `insumo_actividad_plantillas`
--

INSERT INTO `insumo_actividad_plantillas` (`id_insumo_actividad_plantilla`, `id_tipo_recurso`, `id_item`, `observacion`, `privacidad`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'Público', '2020-12-03 04:22:58', '2020-12-03 04:22:58'),
(2, 2, 2, '', 'Público', '2020-12-03 04:22:58', '2020-12-03 04:22:58'),
(198, 24, 647, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(197, 20, 647, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(196, 23, 646, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(195, 18, 646, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(194, 19, 646, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(184, 12, 636, 'Documento maestro aprobado por el Consejo de Escuela', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(185, 14, 637, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(186, 15, 637, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(187, 12, 638, 'Documento Maestro ajustado según revisiones', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(188, 12, 640, 'Documento maestro ajustado según revisiones VIACI y VISAE', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(189, 12, 642, 'Documento Maestro ajustado según revisiones VIACI y VISAE', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(190, 12, 643, 'Documento maestro aprobado', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(191, 19, 643, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(192, 22, 645, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(193, 12, 646, 'Documento maestro aprobado', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(183, 12, 635, 'Documento maestro aprobado por el Consejo de Escuela', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(182, 12, 633, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(173, 1, 627, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(174, 4, 627, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(175, 5, 627, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(176, 6, 627, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(177, 2, 628, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(178, 8, 630, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(179, 2, 631, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(180, 9, 631, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(181, 2, 632, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(199, 26, 649, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(200, 27, 651, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(201, 25, 653, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_tiempos`
--

CREATE TABLE `linea_tiempos` (
  `id_item` bigint(20) UNSIGNED NOT NULL,
  `id_plantilla_procedimiento` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_actividad_anterior` int(255) DEFAULT NULL,
  `id_actividad_posterior` int(255) DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `json_insumos` varchar(900) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_productos` varchar(900) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `linea_tiempos`
--

INSERT INTO `linea_tiempos` (`id_item`, `id_plantilla_procedimiento`, `id_actividad`, `id_actividad_anterior`, `id_actividad_posterior`, `orden`, `created_at`, `updated_at`, `json_insumos`, `json_productos`) VALUES
(1, 1, 1, NULL, NULL, 1, '2020-12-03 04:22:58', '2020-12-03 04:22:58', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Informe de investigación de mercadeo de oferta y demanda académica de la UNAD\",\"id_tipo_recurso\":\"1\",\"observacion\":\"\",\"privacidad\":\"Público\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de propuesta de creación de programa académico.\",\"id_tipo_recurso\":\"2\",\"observacion\":\"\",\"privacidad\":\"Público\"}]'),
(2, 1, 2, 1, NULL, 2, '2020-12-03 04:22:58', '2020-12-03 04:22:58', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de propuesta de creación de programa académico.\",\"id_tipo_recurso\":\"2\",\"observacion\":\"\",\"privacidad\":\"Público\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acta del consejo de escuela donde se consigna el resultado de la revisión de la propuesta de creación del programa académico\",\"id_tipo_recurso\":\"3\",\"observacion\":\"\",\"privacidad\":\"Público\"}]'),
(3, 1, 3, NULL, NULL, 3, '2020-12-03 04:22:58', '2020-12-03 04:22:58', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]'),
(649, 2, 23, NULL, NULL, 23, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Requerimiento de traslado de concepto por parte de la sala de CONACES\",\"id_tipo_recurso\":\"26\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento dando respuesta del auto del programa visitado por parte de la sala CONACES\",\"id_tipo_recurso\":\"28\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(648, 2, 22, 24, NULL, 22, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento dando respuesta del auto del programa visitado por parte de la sala CONACES\",\"id_tipo_recurso\":\"28\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(647, 2, 21, NULL, NULL, 21, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Archivos de soporte de la información ingresada al SACES\",\"id_tipo_recurso\":\"20\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Informe de visita de pares\",\"id_tipo_recurso\":\"24\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Notificación del Registro Calificado del programa\",\"id_tipo_recurso\":\"25\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Requerimiento de traslado de concepto por parte de la sala de CONACES\",\"id_tipo_recurso\":\"26\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Resolución de Negación del registro calificado para el programa\",\"id_tipo_recurso\":\"27\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(645, 2, 19, NULL, NULL, 19, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Requerimiento de completitud de condiciones mínimas de calidad registrada en el Sistema de Aseguramiento de la Calidad Superior SACES\",\"id_tipo_recurso\":\"22\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Respuesta de Completitud\",\"id_tipo_recurso\":\"23\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(644, 2, 18, 20, NULL, 18, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Requerimiento de completitud registrada en el Sistema de Aseguramiento de la Calidad Superior SACES\",\"id_tipo_recurso\":\"21\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(646, 2, 20, NULL, NULL, 20, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento maestro aprobado\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Norma interna de creación del programa\",\"id_tipo_recurso\":\"19\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Cursos acreditados\",\"id_tipo_recurso\":\"18\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Respuesta de Completitud\",\"id_tipo_recurso\":\"23\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Informe de visita de pares\",\"id_tipo_recurso\":\"24\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(636, 2, 10, NULL, NULL, 10, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento maestro aprobado por el Consejo de Escuela\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Síntesis de la revisión de VISAE al documento maestro del programa\",\"id_tipo_recurso\":\"15\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(637, 2, 11, NULL, NULL, 11, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Síntesis de la revisión de la vicerrectoría académica y de investigación (VIACI) al documento maestro del programa\",\"id_tipo_recurso\":\"14\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Síntesis de la revisión de VISAE al documento maestro del programa\",\"id_tipo_recurso\":\"15\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento maestro del programa ajustado según revisiones\",\"privacidad\":\"Privado\"}]'),
(638, 2, 12, NULL, NULL, 12, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento Maestro ajustado según revisiones\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acta de Consejo Académico donde se documente el concepto emitido al programa crear\",\"id_tipo_recurso\":\"16\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(639, 2, 13, 1, NULL, 13, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acta de Consejo Académico donde se documente el concepto emitido al programa crear\",\"id_tipo_recurso\":\"16\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(642, 2, 16, NULL, NULL, 16, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento Maestro ajustado según revisiones VIACI y VISAE\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Cursos acreditados\",\"id_tipo_recurso\":\"18\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(643, 2, 17, NULL, NULL, 17, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento maestro aprobado\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Norma interna de creación del programa\",\"id_tipo_recurso\":\"19\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Archivos de soporte de la información ingresada al SACES\",\"id_tipo_recurso\":\"20\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Requerimiento de completitud registrada en el Sistema de Aseguramiento de la Calidad Superior SACES\",\"id_tipo_recurso\":\"21\",\"observacion\":\"En caso de que se solicite suplir proceso de completitud\",\"privacidad\":\"Privado\"}]'),
(640, 2, 14, NULL, NULL, 14, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento maestro ajustado según revisiones VIACI y VISAE\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acto administrativo de creación del programa\",\"id_tipo_recurso\":\"17\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(641, 2, 15, 1, NULL, 15, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acto administrativo de creación del programa\",\"id_tipo_recurso\":\"17\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(634, 2, 8, 1, NULL, 8, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acta del consejo de escuela donde se consigna el resultado de la revisión de la propuesta de creación del programa académico\",\"id_tipo_recurso\":\"3\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(635, 2, 9, NULL, NULL, 9, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"Documento maestro aprobado por el Consejo de Escuela\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Síntesis de la revisión de la vicerrectoría académica y de investigación (VIACI) al documento maestro del programa\",\"id_tipo_recurso\":\"14\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(628, 2, 2, NULL, NULL, 2, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de propuesta de creación de programa académico.\",\"id_tipo_recurso\":\"2\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de propuesta de creación de programa académico.\",\"id_tipo_recurso\":\"2\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Acta del consejo de escuela donde se consigna el resultado de la revisión de la propuesta de creación del programa académico\",\"id_tipo_recurso\":\"3\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(629, 2, 4, 1, NULL, 3, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acta del consejo de escuela donde se consigna el resultado de la revisión de la propuesta de creación del programa académico\",\"id_tipo_recurso\":\"3\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(630, 2, 3, NULL, NULL, 4, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de presentación de propuesta de creación de programa académico\",\"id_tipo_recurso\":\"8\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Plan operativo de Escuela\",\"id_tipo_recurso\":\"9\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(631, 2, 5, NULL, NULL, 5, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de propuesta de creación de programa académico.\",\"id_tipo_recurso\":\"2\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Plan operativo de Escuela\",\"id_tipo_recurso\":\"9\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Conformación del grupo interdisciplinario\",\"id_tipo_recurso\":\"10\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Asignación en el Sistema de Oferta y Contratación Académica\",\"id_tipo_recurso\":\"11\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(632, 2, 6, NULL, NULL, 6, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de propuesta de creación de programa académico.\",\"id_tipo_recurso\":\"2\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(633, 2, 7, NULL, NULL, 7, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento Maestro del programa\",\"id_tipo_recurso\":\"12\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Acta del consejo de escuela donde se consigna el resultado de la revisión del documento maestro del programa a crear\",\"id_tipo_recurso\":\"13\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(627, 2, 1, NULL, NULL, 1, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Informe de investigación de mercadeo de oferta y demanda académica de la UNAD\",\"id_tipo_recurso\":\"1\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Solicitud manifiesta para la creación de un programa\",\"id_tipo_recurso\":\"4\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Documento maestro no aprobado por consejo académico\",\"id_tipo_recurso\":\"5\",\"observacion\":\"\",\"privacidad\":\"Privado\"},{\"tipo_recurso\":\"Documento maestro no aprobado por consejo superior\",\"id_tipo_recurso\":\"6\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de propuesta de creación de programa académico.\",\"id_tipo_recurso\":\"2\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(650, 2, 24, 25, NULL, 24, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Notificación del Registro Calificado del programa\",\"id_tipo_recurso\":\"25\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(651, 2, 25, NULL, NULL, 25, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Resolución de Negación del registro calificado para el programa\",\"id_tipo_recurso\":\"27\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Documento de recurso de reposición del programa\",\"id_tipo_recurso\":\"29\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(652, 2, 26, 1, NULL, 26, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Notificación del Registro Calificado del programa\",\"id_tipo_recurso\":\"25\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]'),
(653, 2, 27, NULL, NULL, 27, '2021-02-03 01:08:15', '2021-02-03 01:08:15', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Notificación del Registro Calificado del programa\",\"id_tipo_recurso\":\"25\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]', '[{\"tipo_recurso\":\"\",\"id_tipo_recurso\":\"\",\"observacion\":\"\",\"privacidad\":\"\"},{\"tipo_recurso\":\"Información de registro calificado divulgada\",\"id_tipo_recurso\":\"30\",\"observacion\":\"\",\"privacidad\":\"Privado\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_05_032637_create_escuelas_table', 2),
(6, '2020_08_06_004451_create_programas_table', 3),
(7, '2020_08_06_032658_create_tipo_recursos_table', 4),
(9, '2020_08_07_151611_create_plantilla_procedimientos_table', 5),
(10, '2020_08_07_165235_create_linea_tiempos_table', 6),
(12, '2020_08_07_180430_create_actividad_plantillas_table', 7),
(14, '2020_08_12_012735_add_strings_resources_linea_tiempo', 8),
(19, '2020_08_12_135309_create_insumo_actividad_plantillas_table', 9),
(20, '2020_08_12_154531_create_producto_actividad_plantillas_table', 9),
(23, '2020_08_13_011900_create_procedimientos_table', 10),
(24, '2020_08_14_014933_create_actividads_table', 11),
(40, '2020_08_14_020120_create_personal_actividads_table', 14),
(37, '2020_08_18_155316_create_insumo_actividads_table', 13),
(38, '2020_08_18_155352_create_producto_actividads_table', 13),
(41, '2020_08_18_155548_create_repositorios_table', 15),
(42, '2020_08_25_223016_create_nivels_table', 16),
(43, '2020_08_28_162355_create_versions_table', 17),
(44, '2020_08_31_154831_create_anotacions_table', 18),
(45, '2020_09_02_155041_create_permission_tables', 19),
(46, '2020_09_02_161832_create_permisos_table', 20),
(48, '2020_09_09_024749_create_zonas_table', 21),
(49, '2020_09_09_031436_create_centros_table', 21),
(50, '2021_02_13_015900_create_column_file_versiones', 22),
(51, '2021_02_13_224215_create_anexos_table', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\User', 1),
(3, 'App\\User', 25370),
(3, 'App\\User', 25376),
(4, 'App\\User', 25372),
(4, 'App\\User', 25373),
(5, 'App\\User', 25371),
(5, 'App\\User', 25373),
(5, 'App\\User', 25374),
(5, 'App\\User', 25375),
(7, 'App\\User', 25371);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` bigint(20) UNSIGNED NOT NULL,
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nivel`, `created_at`, `updated_at`) VALUES
(1, 'Pregrado', NULL, NULL),
(2, 'Posgrado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(200) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DECANO', '2020-12-02', '2020-12-02', NULL),
(2, 'TUTOR', '2020-12-02', '2022-02-11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(11, 'menu_roles', 'web', '2020-09-03 01:00:24', '2020-09-03 01:00:24'),
(10, 'modulo_procedimientos', 'web', '2020-09-03 00:56:28', '2020-09-03 00:56:28'),
(9, 'modulo_datos_basicos', 'web', '2020-09-03 00:56:18', '2020-09-03 00:56:18'),
(8, 'modulo_administracion', 'web', '2020-09-03 00:55:59', '2020-09-03 00:55:59'),
(12, 'menu_usuarios', 'web', '2020-09-03 01:00:34', '2020-09-03 01:00:34'),
(13, 'menu_perfiles', 'web', '2020-09-03 01:00:43', '2020-09-03 01:00:43'),
(14, 'menu_escuelas', 'web', '2020-09-03 01:00:55', '2020-09-03 01:00:55'),
(15, 'menu_programas', 'web', '2020-09-03 01:01:03', '2020-09-03 01:01:03'),
(16, 'menu_recursos', 'web', '2020-09-03 01:01:12', '2020-09-03 01:01:12'),
(17, 'menu_plantillas', 'web', '2020-09-03 01:01:24', '2020-09-03 01:01:24'),
(18, 'menu_procedimientos', 'web', '2020-09-03 01:01:42', '2020-09-03 01:01:42'),
(19, 'menu_actividades', 'web', '2020-09-03 01:01:52', '2020-09-03 01:01:52'),
(20, 'menu_zonas', 'web', '2020-09-09 08:54:48', '2020-09-09 08:54:48'),
(21, 'menu_cead', 'web', '2020-09-09 08:54:55', '2020-09-09 08:54:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_actividades`
--

CREATE TABLE `personal_actividades` (
  `id_personal_actividad` bigint(20) UNSIGNED NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_actividades`
--

INSERT INTO `personal_actividades` (`id_personal_actividad`, `id_actividad`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 1, 25376, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(2, 2, 25375, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(3, 2, 25376, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(4, 3, 1, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(90, 4, 25375, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(89, 4, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(91, 5, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(92, 6, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(93, 7, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(94, 8, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(95, 9, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(96, 10, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(97, 11, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(98, 12, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(99, 13, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(100, 14, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(101, 15, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(102, 16, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(103, 17, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(104, 18, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(105, 19, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(106, 20, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(107, 21, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(108, 22, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(109, 23, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(110, 24, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(111, 25, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(112, 26, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(113, 27, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(114, 28, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(115, 29, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53'),
(116, 30, 25376, '2021-03-02 00:32:53', '2021-03-02 00:32:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla_procedimientos`
--

CREATE TABLE `plantilla_procedimientos` (
  `id_plantilla_procedimiento` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anotacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plantilla_procedimientos`
--

INSERT INTO `plantilla_procedimientos` (`id_plantilla_procedimiento`, `nombre`, `anotacion`, `created_at`, `updated_at`) VALUES
(1, 'PLANTILLA PROCEDIMIENTO GESTIÓN DE NUEVOS REGISTROS CALIFICADOS prueba', 'PLANTILLA PROCEDIMIENTO GESTIÓN DE NUEVOS REGISTROS CALIFICADOS', '2020-12-03 03:57:07', '2021-02-02 23:42:00'),
(2, 'GESTIÓN DE NUEVOS REGISTROS CALIFICADOS', NULL, '2021-02-02 23:42:23', '2021-02-02 23:42:23'),
(3, 'PLANTILLA TDS', 'esta es una plantilla de prueba para la TDS', '2022-02-11 20:51:12', '2022-02-11 20:51:12'),
(4, 'disciplinar 1', NULL, '2022-03-01 16:08:03', '2022-03-01 16:08:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id_procedimiento` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anotacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posicion` int(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `id_usuario_responsable` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_plantilla_procedimiento` int(11) NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_documento` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_raiz` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id_procedimiento`, `nombre`, `anotacion`, `estado`, `posicion`, `fecha_inicio`, `id_usuario_responsable`, `id_programa`, `id_plantilla_procedimiento`, `tipo`, `url_documento`, `ruta_raiz`, `created_at`, `updated_at`) VALUES
(1, 'GESTIÓN DE NUEVOS REGISTROS CALIFICADOS', 'GESTIÓN DE NUEVOS\r\nREGISTROS CALIFICADOS', 'Finalizado', 3, '2020-12-03', 1, 1, 1, 'Nuevo registro calificado', 'https://drive.google.com/drive/u/0/my-drive', 'https://drive.google.com/drive/u/0/my-drive', '2020-12-03 04:26:59', '2020-12-03 04:38:06'),
(2, 'Especialización en Ingeniería agroforestal', 'Especialización en Ingeniería agroforestal quiere decir tal y tal cosa', 'Activo', 0, '2021-02-23', 1, 1, 2, 'Renovación', 'http://www.unad.edu.co/unad2', 'http://www.unad.edu.co/unad', '2021-02-03 01:11:48', '2021-03-02 02:36:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_actividades`
--

CREATE TABLE `producto_actividades` (
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `observacion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacidad` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_actividades`
--

INSERT INTO `producto_actividades` (`id_producto`, `id_actividad`, `id_tipo_recurso`, `observacion`, `privacidad`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '', 'Público', NULL, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(2, 2, 3, '', 'Público', NULL, '2020-12-03 04:26:59', '2020-12-03 04:26:59'),
(3, 4, 2, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(4, 5, 2, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(5, 5, 3, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(6, 6, 3, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(7, 7, 9, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(8, 8, 10, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(9, 8, 11, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(10, 9, 12, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(11, 10, 13, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(12, 11, 3, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(13, 12, 14, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(14, 13, 15, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(15, 14, 12, 'Documento maestro del programa ajustado según revisiones', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(16, 15, 16, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(17, 16, 16, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(18, 17, 17, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(19, 18, 17, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(20, 19, 18, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(21, 20, 20, '', 'Privado', NULL, '2021-02-03 01:11:48', '2021-02-03 01:11:48'),
(22, 20, 21, 'En caso de que se solicite suplir proceso de completitud', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(23, 21, 21, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(24, 22, 23, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(25, 23, 24, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(26, 24, 25, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(27, 24, 26, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(28, 24, 27, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(29, 25, 28, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(30, 26, 28, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(31, 27, 25, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(32, 28, 29, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(33, 29, 25, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49'),
(34, 30, 30, '', 'Privado', NULL, '2021-02-03 01:11:49', '2021-02-03 01:11:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_actividad_plantillas`
--

CREATE TABLE `producto_actividad_plantillas` (
  `id_producto_actividad_plantilla` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `observacion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_actividad_plantillas`
--

INSERT INTO `producto_actividad_plantillas` (`id_producto_actividad_plantilla`, `id_tipo_recurso`, `id_item`, `observacion`, `privacidad`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '', 'Público', '2020-12-03 04:22:58', '2020-12-03 04:22:58'),
(2, 3, 2, '', 'Público', '2020-12-03 04:22:58', '2020-12-03 04:22:58'),
(146, 2, 627, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(147, 2, 628, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(148, 3, 628, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(149, 3, 629, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(150, 9, 630, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(151, 10, 631, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(152, 11, 631, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(153, 12, 632, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(154, 13, 633, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(155, 3, 634, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(156, 14, 635, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(157, 15, 636, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(158, 12, 637, 'Documento maestro del programa ajustado según revisiones', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(159, 16, 638, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(160, 16, 639, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(161, 17, 640, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(162, 17, 641, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(163, 18, 642, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(164, 20, 643, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(165, 21, 643, 'En caso de que se solicite suplir proceso de completitud', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(166, 21, 644, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(167, 23, 645, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(168, 24, 646, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(169, 25, 647, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(170, 26, 647, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(171, 27, 647, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(172, 28, 648, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(173, 28, 649, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(174, 25, 650, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(175, 29, 651, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(176, 25, 652, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15'),
(177, 30, 653, '', 'Privado', '2021-02-03 01:08:15', '2021-02-03 01:08:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` bigint(20) UNSIGNED NOT NULL,
  `programa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` int(191) NOT NULL,
  `id_escuela` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `programa`, `nivel`, `id_escuela`, `created_at`, `updated_at`) VALUES
(1, 'INGENIERIA DE SISTEMAS', 1, 1, '2020-12-03 03:46:38', '2020-12-03 03:46:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repositorios`
--

CREATE TABLE `repositorios` (
  `id_repositorio` bigint(20) UNSIGNED NOT NULL,
  `id_insumo` int(255) DEFAULT NULL,
  `id_producto` int(255) DEFAULT NULL,
  `id_procedimiento` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `origen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruta_recurso` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` int(11) DEFAULT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario_registro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repositorios`
--

INSERT INTO `repositorios` (`id_repositorio`, `id_insumo`, `id_producto`, `id_procedimiento`, `id_actividad`, `id_tipo_recurso`, `fecha_registro`, `origen`, `ruta_recurso`, `version`, `tipo`, `id_usuario_registro`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 1, 1, '2020-12-02', NULL, 'https://sig.unad.edu.co/documentos/sgc/procedimientos/P-8-1.pdf', NULL, 'Insumo', '25376', '2020-12-03 04:34:52', '2020-12-03 04:34:52'),
(2, NULL, 1, 1, 1, 2, '2020-12-02', NULL, 'https://sig.unad.edu.co/documentos/sgc/procedimientos/P-8-1.pdf', NULL, 'Producto', '25376', '2020-12-03 04:35:01', '2020-12-03 04:35:01'),
(3, 2, NULL, 1, 2, 2, NULL, NULL, 'https://sig.unad.edu.co/documentos/sgc/procedimientos/P-8-1.pdf', NULL, 'Insumo', '25375', '2020-12-03 04:35:53', '2020-12-03 04:35:53'),
(4, NULL, 2, 1, 2, 3, NULL, NULL, 'https://sig.unad.edu.co/documentos/sgc/procedimientos/P-8-1.pdf', NULL, 'Producto', '25375', '2020-12-03 04:35:58', '2020-12-03 04:35:58'),
(5, 3, NULL, 2, 4, 1, '2021-02-02', NULL, 'https://drive.google.com/file/d/1gdye-EjO9EMWl-scUAbx8m5BAd-5NLXV/view?usp=sharing', NULL, 'Insumo', '25376', '2021-02-03 01:29:18', '2021-02-03 01:29:18'),
(6, NULL, 3, 2, 4, 2, '2021-02-02', NULL, 'https://drive.google.com/file/d/1gdye-EjO9EMWl-scUAbx8m5BAd-5NLXV/view?usp=sharing', NULL, 'Producto', '25376', '2021-02-03 01:30:54', '2021-02-03 01:30:54'),
(7, NULL, 4, 2, 5, 2, '2021-02-02', NULL, 'https://drive.google.com/file/d/1gdye-EjO9EMWl-scUAbx8m5BAd-5NLXV/view?usp=sharing', NULL, 'Producto', '25376', '2021-02-03 01:35:06', '2021-02-03 01:35:06'),
(8, NULL, 5, 2, 5, 3, NULL, NULL, 'https://drive.google.com/file/d/1gdye-EjO9EMWl-scUAbx8m5BAd-5NLXV/view?usp=sharing', NULL, 'Producto', '25376', '2021-02-03 01:35:10', '2021-02-03 01:35:10'),
(9, NULL, 6, 2, 6, 3, '2021-02-02', NULL, 'https://drive.google.com/file/d/1gdye-EjO9EMWl-scUAbx8m5BAd-5NLXV/view?usp=sharing', NULL, 'Producto', '25376', '2021-02-03 01:35:34', '2021-02-03 01:35:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Administrador', 'web', '2020-09-03 01:04:10', '2020-09-03 01:04:10'),
(4, 'Lider', 'web', '2020-09-03 01:05:35', '2020-09-03 01:05:35'),
(5, 'Gestor', 'web', '2020-09-03 01:06:12', '2020-09-03 01:06:12'),
(6, 'Auxiliar', 'web', '2020-09-25 02:59:26', '2020-09-25 02:59:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(8, 3),
(9, 3),
(9, 4),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(16, 4),
(17, 3),
(17, 4),
(18, 3),
(18, 4),
(18, 6),
(19, 3),
(19, 4),
(19, 5),
(20, 3),
(21, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recursos`
--

CREATE TABLE `tipo_recursos` (
  `id_tipo_recurso` bigint(20) UNSIGNED NOT NULL,
  `tipo_recurso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_recursos`
--

INSERT INTO `tipo_recursos` (`id_tipo_recurso`, `tipo_recurso`, `created_at`, `updated_at`) VALUES
(1, 'Informe de investigación de mercadeo de oferta y demanda académica de la UNAD', '2020-12-03 03:53:08', '2020-12-03 03:53:08'),
(2, 'Documento de propuesta de creación de programa académico.', '2020-12-03 03:53:24', '2020-12-03 03:53:24'),
(3, 'Acta del consejo de escuela donde se consigna el resultado de la revisión de la propuesta de creación del programa académico', '2020-12-03 03:53:58', '2020-12-03 03:53:58'),
(4, 'Solicitud manifiesta para la creación de un programa', '2021-02-03 00:27:39', '2021-02-03 00:27:39'),
(5, 'Documento maestro no aprobado por consejo académico', '2021-02-03 00:27:53', '2021-02-03 00:27:53'),
(6, 'Documento maestro no aprobado por consejo superior', '2021-02-03 00:28:10', '2021-02-03 00:28:10'),
(7, 'Acta del consejo de escuela donde se consigna el resultado de la revisión de la propuesta de creación del programa académico', '2021-02-03 00:30:55', '2021-02-03 00:30:55'),
(8, 'Documento de presentación de propuesta de creación de programa académico', '2021-02-03 00:37:46', '2021-02-03 00:37:46'),
(9, 'Plan operativo de Escuela', '2021-02-03 00:38:06', '2021-02-03 00:38:06'),
(10, 'Conformación del grupo interdisciplinario', '2021-02-03 00:39:15', '2021-02-03 00:39:15'),
(11, 'Asignación en el Sistema de Oferta y Contratación Académica', '2021-02-03 00:39:23', '2021-02-03 00:39:23'),
(12, 'Documento Maestro del programa', '2021-02-03 00:41:08', '2021-02-03 00:41:08'),
(13, 'Acta del consejo de escuela donde se consigna el resultado de la revisión del documento maestro del programa a crear', '2021-02-03 00:42:46', '2021-02-03 00:42:46'),
(14, 'Síntesis de la revisión de la vicerrectoría académica y de investigación (VIACI) al documento maestro del programa', '2021-02-03 00:44:09', '2021-02-03 00:44:09'),
(15, 'Síntesis de la revisión de VISAE al documento maestro del programa', '2021-02-03 00:45:26', '2021-02-03 00:45:26'),
(16, 'Acta de Consejo Académico donde se documente el concepto emitido al programa crear', '2021-02-03 00:47:56', '2021-02-03 00:47:56'),
(17, 'Acto administrativo de creación del programa', '2021-02-03 00:48:58', '2021-02-03 00:48:58'),
(18, 'Cursos acreditados', '2021-02-03 00:50:43', '2021-02-03 00:50:43'),
(19, 'Norma interna de creación del programa', '2021-02-03 00:52:06', '2021-02-03 00:52:06'),
(20, 'Archivos de soporte de la información ingresada al SACES', '2021-02-03 00:52:37', '2021-02-03 00:52:37'),
(21, 'Requerimiento de completitud registrada en el Sistema de Aseguramiento de la Calidad Superior SACES', '2021-02-03 00:52:49', '2021-02-03 00:52:49'),
(22, 'Requerimiento de completitud de condiciones mínimas de calidad registrada en el Sistema de Aseguramiento de la Calidad Superior SACES', '2021-02-03 00:53:57', '2021-02-03 00:53:57'),
(23, 'Respuesta de Completitud', '2021-02-03 00:54:06', '2021-02-03 00:54:06'),
(24, 'Informe de visita de pares', '2021-02-03 00:56:02', '2021-02-03 00:56:02'),
(25, 'Notificación del Registro Calificado del programa', '2021-02-03 00:57:14', '2021-02-03 00:57:14'),
(26, 'Requerimiento de traslado de concepto por parte de la sala de CONACES', '2021-02-03 00:57:37', '2021-02-03 00:57:37'),
(27, 'Resolución de Negación del registro calificado para el programa', '2021-02-03 00:57:47', '2021-02-03 00:57:47'),
(28, 'Documento dando respuesta del auto del programa visitado por parte de la sala CONACES', '2021-02-03 01:00:04', '2021-02-03 01:00:04'),
(29, 'Documento de recurso de reposición del programa', '2021-02-03 01:01:21', '2021-02-03 01:01:21'),
(30, 'Información de registro calificado divulgada', '2021-02-03 01:02:11', '2021-02-03 01:02:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_cead` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_identificacion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_identificacion` bigint(100) NOT NULL,
  `celular1` bigint(20) DEFAULT NULL,
  `celular2` bigint(20) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superadmin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_perfil`, `id_cead`, `name`, `email`, `email_verified_at`, `password`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_identificacion`, `numero_identificacion`, `celular1`, `celular2`, `telefono`, `direccion`, `ciudad`, `departamento`, `estado`, `imagen`, `superadmin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, 'SuperAdmin', 'superadmin@mail.com', NULL, '$2y$10$.RBOgKFXJiDAb7PtjDQg8eRszMYpcDVDuUnkW0aFiYbRduPFxC07u', 'Super', NULL, 'Admin', NULL, 'Cédula de ciudadanía', 88888888, 0, NULL, NULL, NULL, NULL, NULL, '1', NULL, 1, NULL, '2020-05-08 21:22:57', '2020-09-03 19:40:21', NULL),
(25376, 1, 1, NULL, 'Claudio@mail.com', NULL, '$2y$10$pBfxGn4i/ZYOz9N/H5L/OuZby4u46PpxzyFR7mNoCCMshpbPEXBXO', 'Claudio', 'Camilo', 'Gonzalez', 'Clavijo', 'Cédula de ciudadanía', 99999999, 9999999, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2020-12-03 04:25:33', '2022-03-01 16:12:43', NULL),
(25375, 2, 1, NULL, 'pepito@mail.com', NULL, '$2y$10$0rbRH8BcDVNZZ8A74sAraOXhkdABErnz.eg7lD9C5Ovok75n9I4z2', 'PEPITO', NULL, 'PEREZ', NULL, 'Cédula de ciudadanía', 88888888, 320322323238, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2020-12-03 04:24:54', '2021-05-12 16:12:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

CREATE TABLE `versiones` (
  `id_version` bigint(20) UNSIGNED NOT NULL,
  `id_procedimiento` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `url_documento` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentarios` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id_version`, `id_procedimiento`, `version`, `url_documento`, `comentarios`, `created_at`, `updated_at`, `file`) VALUES
(1, 2, 1, NULL, NULL, '2021-02-24 20:23:46', '2021-02-24 20:23:46', 'Comprobante de pago en MercadoLibre con Pse.pdf'),
(2, 1, 1, NULL, 'Primera version estable', '2021-03-02 01:44:39', '2021-03-02 01:44:39', 'proyecto solidario.pdf'),
(3, 1, 2, NULL, 'Segunda version en word', '2021-03-02 01:45:47', '2021-03-02 01:45:47', '1 oct 2019 HV.docx'),
(4, 1, 3, NULL, NULL, '2021-03-02 01:46:28', '2021-03-02 01:46:28', '20171005_131617.jpg'),
(5, 2, 2, NULL, NULL, '2021-03-02 02:31:11', '2021-03-02 02:31:11', 'proyecto solidario.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zona`, `codigo`, `zona`, `sigla`, `created_at`, `updated_at`) VALUES
(1, '001', 'SUR', 'SUR', '2020-12-03 03:48:34', '2020-12-03 03:48:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `actividad_plantillas`
--
ALTER TABLE `actividad_plantillas`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id_anexo`);

--
-- Indices de la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD PRIMARY KEY (`id_anotacion`);

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`id_cead`),
  ADD KEY `centros_id_zona_foreign` (`id_zona`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id_escuela`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indices de la tabla `insumo_actividades`
--
ALTER TABLE `insumo_actividades`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `insumo_actividad_plantillas`
--
ALTER TABLE `insumo_actividad_plantillas`
  ADD PRIMARY KEY (`id_insumo_actividad_plantilla`);

--
-- Indices de la tabla `linea_tiempos`
--
ALTER TABLE `linea_tiempos`
  ADD PRIMARY KEY (`id_item`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_actividades`
--
ALTER TABLE `personal_actividades`
  ADD PRIMARY KEY (`id_personal_actividad`);

--
-- Indices de la tabla `plantilla_procedimientos`
--
ALTER TABLE `plantilla_procedimientos`
  ADD PRIMARY KEY (`id_plantilla_procedimiento`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`id_procedimiento`);

--
-- Indices de la tabla `producto_actividades`
--
ALTER TABLE `producto_actividades`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `producto_actividad_plantillas`
--
ALTER TABLE `producto_actividad_plantillas`
  ADD PRIMARY KEY (`id_producto_actividad_plantilla`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `repositorios`
--
ALTER TABLE `repositorios`
  ADD PRIMARY KEY (`id_repositorio`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tipo_recursos`
--
ALTER TABLE `tipo_recursos`
  ADD PRIMARY KEY (`id_tipo_recurso`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD PRIMARY KEY (`id_version`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `actividad_plantillas`
--
ALTER TABLE `actividad_plantillas`
  MODIFY `id_actividad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id_anexo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  MODIFY `id_anotacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centros`
--
ALTER TABLE `centros`
  MODIFY `id_cead` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `id_escuela` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumo_actividades`
--
ALTER TABLE `insumo_actividades`
  MODIFY `id_insumo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `insumo_actividad_plantillas`
--
ALTER TABLE `insumo_actividad_plantillas`
  MODIFY `id_insumo_actividad_plantilla` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de la tabla `linea_tiempos`
--
ALTER TABLE `linea_tiempos`
  MODIFY `id_item` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=654;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `personal_actividades`
--
ALTER TABLE `personal_actividades`
  MODIFY `id_personal_actividad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `plantilla_procedimientos`
--
ALTER TABLE `plantilla_procedimientos`
  MODIFY `id_plantilla_procedimiento` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id_procedimiento` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto_actividades`
--
ALTER TABLE `producto_actividades`
  MODIFY `id_producto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `producto_actividad_plantillas`
--
ALTER TABLE `producto_actividad_plantillas`
  MODIFY `id_producto_actividad_plantilla` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `repositorios`
--
ALTER TABLE `repositorios`
  MODIFY `id_repositorio` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_recursos`
--
ALTER TABLE `tipo_recursos`
  MODIFY `id_tipo_recurso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25377;

--
-- AUTO_INCREMENT de la tabla `versiones`
--
ALTER TABLE `versiones`
  MODIFY `id_version` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zona` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
