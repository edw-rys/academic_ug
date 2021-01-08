-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2021 a las 03:51:30
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academic_ug`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class_subject`
--

CREATE TABLE `class_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_subject_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `class_subject`
--

INSERT INTO `class_subject` (`id`, `name`, `course_subject_id`, `status`, `created_at`, `updated_at`, `teacher_id`) VALUES
(69, 'Simulación Continua', 17, '1', '2021-01-08 04:20:40', '2021-01-08 04:20:40', 23),
(70, 'Simulación Combinada Discreta-Continua', 17, '1', '2021-01-08 04:20:48', '2021-01-08 04:20:48', 23),
(71, 'Simulación Determinística y/o Estocástica', 17, '1', '2021-01-08 04:20:56', '2021-01-08 04:20:56', 23),
(72, 'Simulación estática y dinámica', 17, '1', '2021-01-08 04:21:02', '2021-01-08 04:21:02', 23),
(73, 'Análisis de los datos', 17, '1', '2021-01-08 06:24:04', '2021-01-08 06:24:04', 23),
(74, 'Probabilidad y estadística', 17, '1', '2021-01-08 06:24:17', '2021-01-08 06:24:17', 23),
(75, 'Verbo modal auxiliar \"can\" para expresar habilidad.', 18, '1', '2021-01-08 06:25:04', '2021-01-08 06:25:04', 23),
(76, 'Verbo \"be able to\" para expresar habilidad.', 18, '1', '2021-01-08 06:25:16', '2021-01-08 06:25:16', 23),
(77, 'Verbo \"like\" seguido de gerundio o infinitivo.', 18, '1', '2021-01-08 06:25:39', '2021-01-08 06:25:39', 23),
(78, 'Adjetivos posesivos.', 18, '1', '2021-01-08 06:25:48', '2021-01-08 06:25:48', 23),
(79, 'Adjetivos comparativos y superlativos.', 18, '1', '2021-01-08 06:26:01', '2021-01-08 06:26:01', 23),
(80, 'Presente progresivo para expresar planes en el futuro.', 18, '1', '2021-01-08 06:26:25', '2021-01-08 06:26:25', 23),
(81, 'Imperativo.', 18, '1', '2021-01-08 06:26:35', '2021-01-08 06:26:35', 23),
(82, 'Verbo modal auxiliar \"can\" para expresar habilidad.', 20, '1', '2021-01-08 06:26:57', '2021-01-08 06:26:57', 23),
(83, 'Verbo \"be able to\" para expresar habilidad.', 20, '1', '2021-01-08 06:27:04', '2021-01-08 06:27:04', 23),
(84, 'Verbo \"like\" seguido de gerundio o infinitivo.', 20, '1', '2021-01-08 06:27:08', '2021-01-08 06:27:08', 23),
(85, 'Adjetivos posesivos.', 20, '1', '2021-01-08 06:27:13', '2021-01-08 06:27:13', 23),
(86, 'Adjetivos comparativos y superlativos.', 20, '1', '2021-01-08 06:27:17', '2021-01-08 06:27:17', 23),
(87, 'Presente progresivo para expresar planes en el futuro.', 20, '1', '2021-01-08 06:27:21', '2021-01-08 06:27:21', 23),
(88, 'Imperativo', 20, '1', '2021-01-08 06:27:25', '2021-01-08 06:27:25', 23),
(89, 'Verbo modal auxiliar \"can\" para expresar habilidad.', 21, '1', '2021-01-08 06:27:32', '2021-01-08 06:27:32', 23),
(90, 'Verbo \"be able to\" para expresar habilidad.', 21, '1', '2021-01-08 06:27:37', '2021-01-08 06:27:37', 23),
(91, 'Verbo \"like\" seguido de gerundio o infinitivo.', 21, '1', '2021-01-08 06:27:41', '2021-01-08 06:27:41', 23),
(92, 'Adjetivos posesivos.', 21, '1', '2021-01-08 06:27:45', '2021-01-08 06:27:45', 23),
(93, 'Adjetivos comparativos y superlativos.', 21, '1', '2021-01-08 06:27:49', '2021-01-08 06:27:49', 23),
(94, 'Presente progresivo para expresar planes en el futuro.', 21, '1', '2021-01-08 06:27:54', '2021-01-08 06:27:54', 23),
(95, 'Imperativo', 21, '1', '2021-01-08 06:27:59', '2021-01-08 06:27:59', 23),
(96, 'Simulación Continua', 23, '1', '2021-01-08 06:28:37', '2021-01-08 06:28:37', 23),
(97, 'Simulación Combinada Discreta-Continua', 23, '1', '2021-01-08 06:28:44', '2021-01-08 06:28:44', 23),
(98, 'Simulación Determinística y/o Estocástica', 23, '1', '2021-01-08 06:28:51', '2021-01-08 06:28:51', 23),
(99, 'Simulación estática y dinámica', 23, '1', '2021-01-08 06:28:56', '2021-01-08 06:28:56', 23),
(100, 'AnÁlisis de los datos', 23, '1', '2021-01-08 06:29:04', '2021-01-08 06:29:04', 23),
(101, 'Probabilidad y estadística', 23, '1', '2021-01-08 06:29:15', '2021-01-08 06:29:15', 23),
(102, '1.1	Conceptos de hardware: multiprocesadores y multicomputadoras', 19, '1', '2021-01-08 06:32:12', '2021-01-08 06:32:12', 23),
(103, '1.2	Conceptos de software: SO de redes, SO realmente distribuidos, Sistemas multiprocesador', 19, '1', '2021-01-08 06:32:31', '2021-01-08 06:32:31', 23),
(104, '1.3	Definición de Sistemas Operativos Distribuidos, ventajas y desventajas', 19, '1', '2021-01-08 06:32:36', '2021-01-08 06:32:36', 23),
(105, '1.4 Aspectos de Diseño', 19, '1', '2021-01-08 06:32:40', '2021-01-08 06:32:40', 23),
(106, '1.5 Practica de servicio de acceso remoto servidores de red GNU/Linux  o        Windows', 19, '1', '2021-01-08 06:32:46', '2021-01-08 06:32:46', 23),
(107, '1.6 Sistemas Operativos por n capas', 19, '1', '2021-01-08 06:32:54', '2021-01-08 06:32:54', 23),
(108, '1.7 Practica de web services servidores de red GNU/Linux  o Windows', 19, '1', '2021-01-08 06:33:00', '2021-01-08 06:33:00', 23),
(109, '2.1  Protocolos de comunicación en la Internet', 19, '1', '2021-01-08 06:33:16', '2021-01-08 06:33:16', 23),
(110, 'Comunicación Cliente Servidor, definición, características', 19, '1', '2021-01-08 06:33:23', '2021-01-08 06:33:23', 23),
(111, 'SEGURIDAD DE LA INFORMACION', 22, '1', '2021-01-08 06:34:32', '2021-01-08 06:34:32', 23),
(112, 'SEGURIDAD DE LA INFRAESTRUCTURA', 22, '1', '2021-01-08 06:35:00', '2021-01-08 06:35:00', 23),
(113, 'CIBERSEGURIDAD', 22, '1', '2021-01-08 06:35:50', '2021-01-08 06:35:50', 23),
(114, 'SEGURIDAD DE LAS NUEVAS TECNOLOGIAS', 22, '1', '2021-01-08 06:36:02', '2021-01-08 06:36:02', 23),
(115, 'SEGURIDAD DE APLICACIONES', 22, '1', '2021-01-08 06:36:10', '2021-01-08 06:36:10', 23),
(116, 'TECNOLOGIAS DE SEGURIDAD', 22, '1', '2021-01-08 06:36:19', '2021-01-08 06:36:19', 23),
(117, 'NORMAS NACIONALES E INTERNACIONALES DE SEGURIDAD', 22, '1', '2021-01-08 06:36:27', '2021-01-08 06:36:27', 23),
(118, 'Conoce información sobre los conceptos de la Ingeniería de software.', 24, '1', '2021-01-08 06:37:44', '2021-01-08 06:37:44', 23),
(119, 'Investiga sobre los modelos de construcción de software', 24, '1', '2021-01-08 06:37:52', '2021-01-08 06:37:52', 23),
(120, 'Conoce los conceptos y las técnicas de factibilidad para la gestión de un proyecto de software', 24, '1', '2021-01-08 06:38:00', '2021-01-08 06:38:00', 23),
(121, 'Métricas en el Software: Factores de Calidad, Métricas de Calidad', 24, '1', '2021-01-08 06:38:23', '2021-01-08 06:38:23', 23),
(122, 'Enfoques de Desarrollo de Software: Estructurado, Orientado a Objetos', 24, '1', '2021-01-08 06:38:37', '2021-01-08 06:38:37', 23),
(123, 'Metodologías de Desarrollo de Software', 24, '1', '2021-01-08 06:38:48', '2021-01-08 06:38:48', 23),
(124, 'UML', 24, '1', '2021-01-08 06:39:08', '2021-01-08 06:39:08', 23),
(125, 'Proceso Unificado (Rational Unified Process -RUP):', 25, '1', '2021-01-08 06:39:46', '2021-01-08 06:39:46', 23),
(126, 'Antecedentes de la programación orientada a objetos (POO)', 25, '1', '2021-01-08 06:40:19', '2021-01-08 06:40:19', 23),
(127, 'Características de la POO', 25, '1', '2021-01-08 06:40:28', '2021-01-08 06:40:28', 23),
(128, 'Técnica de modelado de objetos', 25, '1', '2021-01-08 06:40:39', '2021-01-08 06:40:39', 23),
(129, 'Tipos de diagramas', 25, '1', '2021-01-08 06:40:49', '2021-01-08 06:40:49', 23),
(130, 'El diseño orientado a objetos', 25, '1', '2021-01-08 06:40:58', '2021-01-08 06:40:58', 23),
(131, '1. Determinar los tipos de aplicación y las situaciones en las que se debe aplicar el paradigma orientado a objetos.', 26, '1', '2021-01-08 06:42:00', '2021-01-08 06:42:00', 23),
(132, '2. Comprender, interpretar y analizar el cambio de enfoque en el modo de resolver problemas que supone el uso del paradigma orientado a objetos respecto a otros paradigmas.', 26, '1', '2021-01-08 06:42:32', '2021-01-08 06:42:32', 23),
(133, '3. Aplicar los conceptos del paradigma de programación orientada a objetos tales como: polimorfismo, encapsulamiento, herencia, sobrecarga, funciones virtuales, etc.', 26, '1', '2021-01-08 06:42:37', '2021-01-08 06:42:37', 23),
(134, '4. Manejar adecuadamente conceptos tales como: recursividad, objetos transientes, residentes y persistentes; generalización y generacidad; clases plantillas; asociación, agregación y composición.', 26, '1', '2021-01-08 06:42:42', '2021-01-08 06:42:42', 23),
(135, '5. Identificar problemas de: portabilidad, efectos colaterales y transparencia referencial.', 26, '1', '2021-01-08 06:42:48', '2021-01-08 06:42:48', 23),
(136, '6. Comprender la enorme importancia de crear software fiable, reutilizable y mantenible.', 26, '1', '2021-01-08 06:42:53', '2021-01-08 06:42:53', 23),
(137, '7. Dominar estrategias básicas de reutilización como son el uso de librerías o paquetes de software.', 26, '1', '2021-01-08 06:42:58', '2021-01-08 06:42:58', 23),
(138, '8. Aplicar el modelo orientado a objetos en programación de dispositivos de cómputo', 26, '1', '2021-01-08 06:43:02', '2021-01-08 06:43:02', 23),
(139, 'Bases de datos', 27, '1', '2021-01-08 06:43:33', '2021-01-08 06:43:33', 23),
(140, 'Consultas sql', 27, '1', '2021-01-08 06:43:37', '2021-01-08 06:43:37', 23),
(141, 'Cubo de datos', 27, '1', '2021-01-08 06:43:50', '2021-01-08 06:43:50', 23),
(142, 'Business intelligence', 27, '1', '2021-01-08 06:44:11', '2021-01-08 06:44:11', 23),
(143, 'Power BI', 27, '1', '2021-01-08 06:44:31', '2021-01-08 06:44:31', 23),
(144, 'Bases de datos', 28, '1', '2021-01-08 06:44:58', '2021-01-08 06:44:58', 23),
(145, 'Consultas sql', 28, '1', '2021-01-08 06:45:03', '2021-01-08 06:45:03', 23),
(146, 'Cubo de datos', 28, '1', '2021-01-08 06:45:07', '2021-01-08 06:45:07', 23),
(147, 'Business intelligence', 28, '1', '2021-01-08 06:45:16', '2021-01-08 06:45:16', 23),
(148, 'Power BI', 28, '1', '2021-01-08 06:45:27', '2021-01-08 06:45:27', 23),
(149, 'Conductividad', 29, '1', '2021-01-08 06:46:03', '2021-01-08 06:46:03', 23),
(150, 'Diodos', 29, '1', '2021-01-08 06:46:06', '2021-01-08 06:46:06', 23),
(151, 'Circuitos DIGITALES', 29, '1', '2021-01-08 06:46:13', '2021-01-08 06:46:13', 23),
(152, 'Redes de comunicación', 29, '1', '2021-01-08 06:46:19', '2021-01-08 06:46:19', 23),
(153, 'Direcciones Ip', 29, '1', '2021-01-08 06:46:25', '2021-01-08 06:46:25', 23),
(161, 'Simulación Continua', 18, '1', '2021-01-08 07:09:23', '2021-01-08 07:09:23', 22),
(162, 'Simulación Combinada Discreta-Continua', 18, '1', '2021-01-08 07:09:23', '2021-01-08 07:09:23', 22),
(163, 'Simulación Determinística y/o Estocástica', 18, '1', '2021-01-08 07:09:23', '2021-01-08 07:09:23', 22),
(164, 'Simulación estática y dinámica', 18, '1', '2021-01-08 07:09:23', '2021-01-08 07:09:23', 22),
(165, 'Analisis de los datos', 18, '1', '2021-01-08 07:09:23', '2021-01-08 07:09:23', 22),
(166, 'Probabilidad y estadísitca', 18, '1', '2021-01-08 07:09:23', '2021-01-08 07:09:23', 22),
(167, '1.1 Conceptos de hardware: multiprocesadores y multicomputadoras', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(168, '1.2 Conceptos de software: SO de redes, SO realmente distribuidos, Sistemas multiprocesador', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(169, '1.3 Definición de Sistemas Operativos Distribuidos, ventajas y desventajas', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(170, '1.4 Aspectos de Diseño', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(171, '1.5 Practica de servicio de acceso remoto servidores de red GNU/Linux o Windows', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(172, '1.6 Sistemas Operativos por n capas', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(173, '7 Practica de web services servidores de red GNU/Linux o Windows', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(174, '2.1 Protocolos de comunicación en la Internet', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(175, 'Comunicación Cliente Servidor, definición, características', 19, '1', '2021-01-08 07:10:57', '2021-01-08 07:10:57', 22),
(176, 'Verbo modal auxiliar \"can\" para expresar habilidad.', 18, '1', '2021-01-08 07:11:19', '2021-01-08 07:11:19', 22),
(177, 'Verbo \"be able to\" para expresar habilidad.', 18, '1', '2021-01-08 07:11:19', '2021-01-08 07:11:19', 22),
(178, 'Verbo \"like\" seguido de gerundio o infinitivo.', 18, '1', '2021-01-08 07:11:19', '2021-01-08 07:11:19', 22),
(179, 'Adjetivos posesivos.', 18, '1', '2021-01-08 07:11:19', '2021-01-08 07:11:19', 22),
(180, 'Adjetivos comparativos y superlativos.', 18, '1', '2021-01-08 07:11:19', '2021-01-08 07:11:19', 22),
(181, 'Presente progresivo para expresar planes en el futuro.', 18, '1', '2021-01-08 07:11:19', '2021-01-08 07:11:19', 22),
(182, 'Imperativo', 18, '1', '2021-01-08 07:11:19', '2021-01-08 07:11:19', 22),
(183, 'Verbo modal auxiliar \"can\" para expresar habilidad.', 21, '1', '2021-01-08 07:11:23', '2021-01-08 07:11:23', 22),
(184, 'Verbo \"be able to\" para expresar habilidad.', 21, '1', '2021-01-08 07:11:23', '2021-01-08 07:11:23', 22),
(185, 'Verbo \"like\" seguido de gerundio o infinitivo.', 21, '1', '2021-01-08 07:11:23', '2021-01-08 07:11:23', 22),
(186, 'Adjetivos posesivos.', 21, '1', '2021-01-08 07:11:23', '2021-01-08 07:11:23', 22),
(187, 'Adjetivos comparativos y superlativos.', 21, '1', '2021-01-08 07:11:23', '2021-01-08 07:11:23', 22),
(188, 'Presente progresivo para expresar planes en el futuro.', 21, '1', '2021-01-08 07:11:23', '2021-01-08 07:11:23', 22),
(189, 'Imperativo', 21, '1', '2021-01-08 07:11:23', '2021-01-08 07:11:23', 22),
(190, 'Verbo modal auxiliar \"can\" para expresar habilidad.', 20, '1', '2021-01-08 07:11:36', '2021-01-08 07:11:36', 22),
(191, 'Verbo \"be able to\" para expresar habilidad.', 20, '1', '2021-01-08 07:11:36', '2021-01-08 07:11:36', 22),
(192, 'Verbo \"like\" seguido de gerundio o infinitivo.', 20, '1', '2021-01-08 07:11:36', '2021-01-08 07:11:36', 22),
(193, 'Adjetivos posesivos.', 20, '1', '2021-01-08 07:11:36', '2021-01-08 07:11:36', 22),
(194, 'Adjetivos comparativos y superlativos.', 20, '1', '2021-01-08 07:11:36', '2021-01-08 07:11:36', 22),
(195, 'Presente progresivo para expresar planes en el futuro.', 20, '1', '2021-01-08 07:11:36', '2021-01-08 07:11:36', 22),
(196, 'Imperativo', 20, '1', '2021-01-08 07:11:36', '2021-01-08 07:11:36', 22),
(197, 'SEGURIDAD DE LA INFORMACION', 22, '1', '2021-01-08 07:11:52', '2021-01-08 07:11:52', 22),
(198, 'SEGURIDAD DE LA INFRAESTRUCTURA', 22, '1', '2021-01-08 07:11:52', '2021-01-08 07:11:52', 22),
(199, 'CIBERSEGURIDAD', 22, '1', '2021-01-08 07:11:52', '2021-01-08 07:11:52', 22),
(200, 'SEGURIDAD DE LAS NUEVAS TECNOLOGIAS', 22, '1', '2021-01-08 07:11:52', '2021-01-08 07:11:52', 22),
(201, 'SEGURIDAD DE APLICACIONES', 22, '1', '2021-01-08 07:11:52', '2021-01-08 07:11:52', 22),
(202, 'TECNOLOGIAS DE SEGURIDAD', 22, '1', '2021-01-08 07:11:52', '2021-01-08 07:11:52', 22),
(203, 'NORMAS NACIONALES E INTERNACIONALES DE SEGURIDAD', 22, '1', '2021-01-08 07:11:52', '2021-01-08 07:11:52', 22),
(204, 'Simulación Continua', 23, '1', '2021-01-08 07:12:07', '2021-01-08 07:12:07', 22),
(205, 'Simulación Combinada Discreta-Continua', 23, '1', '2021-01-08 07:12:07', '2021-01-08 07:12:07', 22),
(206, 'Simulación Determinística y/o Estocástica', 23, '1', '2021-01-08 07:12:07', '2021-01-08 07:12:07', 22),
(207, 'Simulación estática y dinámica', 23, '1', '2021-01-08 07:12:07', '2021-01-08 07:12:07', 22),
(208, 'Analisis de los datos', 23, '1', '2021-01-08 07:12:07', '2021-01-08 07:12:07', 22),
(209, 'Probabilidad y estadísitca', 23, '1', '2021-01-08 07:12:07', '2021-01-08 07:12:07', 22),
(210, 'Conoce información sobre los conceptos de la Ingeniería de software.', 24, '1', '2021-01-08 07:12:31', '2021-01-08 07:12:31', 22),
(211, 'Investiga sobre los modelos de construcción de software', 24, '1', '2021-01-08 07:12:31', '2021-01-08 07:12:31', 22),
(212, 'Conoce los conceptos y las técnicas de factibilidad para la gestión de un proyecto de software', 24, '1', '2021-01-08 07:12:31', '2021-01-08 07:12:31', 22),
(213, 'Métricas en el Software: Factores de Calidad, Métricas de Calidad', 24, '1', '2021-01-08 07:12:31', '2021-01-08 07:12:31', 22),
(214, 'Enfoques de Desarrollo de Software: Estructurado, Orientado a Objetos', 24, '1', '2021-01-08 07:12:31', '2021-01-08 07:12:31', 22),
(215, 'Metodologías de Desarrollo de Software', 24, '1', '2021-01-08 07:12:31', '2021-01-08 07:12:31', 22),
(216, 'Proceso Unificado (Rational Unified Process -RUP):', 25, '1', '2021-01-08 07:12:40', '2021-01-08 07:12:40', 22),
(217, 'Antecedentes de la programación orientada a objetos (POO)', 25, '1', '2021-01-08 07:12:40', '2021-01-08 07:12:40', 22),
(218, 'Características de la POO', 25, '1', '2021-01-08 07:12:40', '2021-01-08 07:12:40', 22),
(219, 'Técnica de modelado de objetos', 25, '1', '2021-01-08 07:12:40', '2021-01-08 07:12:40', 22),
(220, 'Tipos de diagramas', 25, '1', '2021-01-08 07:12:40', '2021-01-08 07:12:40', 22),
(221, 'El diseño orientado a objetos', 25, '1', '2021-01-08 07:12:40', '2021-01-08 07:12:40', 22),
(222, '1. Determinar los tipos de aplicación y las situaciones en las que se debe aplicar el paradigma orientado a objetos.', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(223, '2. Comprender, interpretar y analizar el cambio de enfoque en el modo de resolver problemas que supone el uso del paradigma orientado a objetos respecto a otros paradigmas.', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(224, '3. Aplicar los conceptos del paradigma de programación orientada a objetos tales como: polimorfismo, encapsulamiento, herencia, sobrecarga, funciones virtuales, etc.', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(225, '4. Manejar adecuadamente conceptos tales como: recursividad, objetos transientes, residentes y persistentes; generalización y generacidad; clases plantillas; asociación, agregación y composición.', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(226, '5. Identificar problemas de: portabilidad, efectos colaterales y transparencia referencial.', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(227, '6. Comprender la enorme importancia de crear software fiable, reutilizable y mantenible.', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(228, '7. Dominar estrategias básicas de reutilización como son el uso de librerías o paquetes de software.', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(229, '8. Aplicar el modelo orientado a objetos en programación de dispositivos de cómputo', 26, '1', '2021-01-08 07:12:57', '2021-01-08 07:12:57', 22),
(230, '1.1 Conceptos de hardware: multiprocesadores y multicomputadoras', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(231, '1.2 Conceptos de software: SO de redes, SO realmente distribuidos, Sistemas multiprocesador', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(232, '1.3 Definición de Sistemas Operativos Distribuidos, ventajas y desventajas', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(233, '1.4 Aspectos de Diseño', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(234, '1.5 Practica de servicio de acceso remoto servidores de red GNU/Linux o Windows', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(235, '1.6 Sistemas Operativos por n capas', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(236, '7 Practica de web services servidores de red GNU/Linux o Windows', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(237, '2.1 Protocolos de comunicación en la Internet', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(238, 'Comunicación Cliente Servidor, definición, características', 19, '1', '2021-01-08 07:15:39', '2021-01-08 07:15:39', 21),
(239, 'Bases de datos', 27, '1', '2021-01-08 07:15:54', '2021-01-08 07:15:54', 21),
(240, 'Consultas sql', 27, '1', '2021-01-08 07:15:54', '2021-01-08 07:15:54', 21),
(241, 'Cubo de datos', 27, '1', '2021-01-08 07:15:54', '2021-01-08 07:15:54', 21),
(242, 'Business intelligence', 27, '1', '2021-01-08 07:15:54', '2021-01-08 07:15:54', 21),
(243, 'Power BI', 27, '1', '2021-01-08 07:15:54', '2021-01-08 07:15:54', 21),
(244, 'Bases de datos', 28, '1', '2021-01-08 07:16:05', '2021-01-08 07:16:05', 21),
(245, 'Consultas sql', 28, '1', '2021-01-08 07:16:05', '2021-01-08 07:16:05', 21),
(246, 'Cubo de datos', 28, '1', '2021-01-08 07:16:05', '2021-01-08 07:16:05', 21),
(247, 'Business intelligence', 28, '1', '2021-01-08 07:16:05', '2021-01-08 07:16:05', 21),
(248, 'Power BI', 28, '1', '2021-01-08 07:16:05', '2021-01-08 07:16:05', 21),
(250, 'Conoce información sobre los conceptos de la Ingeniería de software.', 24, '1', '2021-01-08 07:16:36', '2021-01-08 07:16:36', 20),
(251, 'Investiga sobre los modelos de construcción de software', 24, '1', '2021-01-08 07:16:36', '2021-01-08 07:16:36', 20),
(252, 'Conoce los conceptos y las técnicas de factibilidad para la gestión de un proyecto de software', 24, '1', '2021-01-08 07:16:36', '2021-01-08 07:16:36', 20),
(253, 'Métricas en el Software: Factores de Calidad, Métricas de Calidad', 24, '1', '2021-01-08 07:16:36', '2021-01-08 07:16:36', 20),
(254, 'Enfoques de Desarrollo de Software: Estructurado, Orientado a Objetos', 24, '1', '2021-01-08 07:16:36', '2021-01-08 07:16:36', 20),
(255, 'Metodologías de Desarrollo de Software', 24, '1', '2021-01-08 07:16:36', '2021-01-08 07:16:36', 20),
(256, 'UML', 24, '1', '2021-01-08 07:16:36', '2021-01-08 07:16:36', 20),
(257, 'Conductividad', 29, '1', '2021-01-08 07:17:10', '2021-01-08 07:17:10', 20),
(258, 'Diodos', 29, '1', '2021-01-08 07:17:10', '2021-01-08 07:17:10', 20),
(259, 'Circuitos DIGITALES', 29, '1', '2021-01-08 07:17:10', '2021-01-08 07:17:10', 20),
(260, 'Redes de comunicación', 29, '1', '2021-01-08 07:17:11', '2021-01-08 07:17:11', 20),
(261, 'Direcciones Ip', 29, '1', '2021-01-08 07:17:11', '2021-01-08 07:17:11', 20),
(263, 'SEGURIDAD DE LA INFORMACION', 22, '1', '2021-01-08 07:17:47', '2021-01-08 07:17:47', 19),
(264, 'SEGURIDAD DE LA INFRAESTRUCTURA', 22, '1', '2021-01-08 07:17:47', '2021-01-08 07:17:47', 19),
(265, 'CIBERSEGURIDAD', 22, '1', '2021-01-08 07:17:47', '2021-01-08 07:17:47', 19),
(266, 'SEGURIDAD DE LAS NUEVAS TECNOLOGIAS', 22, '1', '2021-01-08 07:17:47', '2021-01-08 07:17:47', 19),
(267, 'SEGURIDAD DE APLICACIONES', 22, '1', '2021-01-08 07:17:47', '2021-01-08 07:17:47', 19),
(268, 'TECNOLOGIAS DE SEGURIDAD', 22, '1', '2021-01-08 07:17:47', '2021-01-08 07:17:47', 19),
(269, 'NORMAS NACIONALES E INTERNACIONALES DE SEGURIDAD', 22, '1', '2021-01-08 07:17:47', '2021-01-08 07:17:47', 19),
(270, 'Proceso Unificado (Rational Unified Process -RUP):', 25, '1', '2021-01-08 07:18:37', '2021-01-08 07:18:37', 18),
(271, 'Antecedentes de la programación orientada a objetos (POO)', 25, '1', '2021-01-08 07:18:37', '2021-01-08 07:18:37', 18),
(272, 'Características de la POO', 25, '1', '2021-01-08 07:18:37', '2021-01-08 07:18:37', 18),
(273, 'Técnica de modelado de objetos', 25, '1', '2021-01-08 07:18:37', '2021-01-08 07:18:37', 18),
(274, 'Tipos de diagramas', 25, '1', '2021-01-08 07:18:37', '2021-01-08 07:18:37', 18),
(275, 'El diseño orientado a objetos', 25, '1', '2021-01-08 07:18:37', '2021-01-08 07:18:37', 18),
(276, 'Proceso Unificado (Rational Unified Process -RUP):', 26, '1', '2021-01-08 07:18:52', '2021-01-08 07:18:52', 18),
(277, 'Antecedentes de la programación orientada a objetos (POO)', 26, '1', '2021-01-08 07:18:52', '2021-01-08 07:18:52', 18),
(278, 'Características de la POO', 26, '1', '2021-01-08 07:18:52', '2021-01-08 07:18:52', 18),
(279, 'Técnica de modelado de objetos', 26, '1', '2021-01-08 07:18:52', '2021-01-08 07:18:52', 18),
(280, 'Tipos de diagramas', 26, '1', '2021-01-08 07:18:52', '2021-01-08 07:18:52', 18),
(281, 'El diseño orientado a objetos', 26, '1', '2021-01-08 07:18:52', '2021-01-08 07:18:52', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment_student_class`
--

CREATE TABLE `comment_student_class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comment_student_class`
--

INSERT INTO `comment_student_class` (`id`, `comment`, `student_id`, `class_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Esta clase estuvo muy interesante, ya que hablaron de los temas que más me gustan, siendo esta una introducción a lo que vamos a ver en el semestre.', 17, 69, 'active', '2021-01-08 04:23:48', '2021-01-08 04:23:48'),
(5, 'Esta clase no me gustó, ya que la profesora no interactuó con los estudiantes.', 17, 70, 'active', '2021-01-08 04:27:08', '2021-01-08 04:27:08'),
(6, 'La profesora parece estar muy poco preparada para esta materia en cuestión, eso agregado a una prepotencia injustificable hacen que la clase sea aburrida y para nada didáctica, agregar un comentario sobre su metodología parece prácticamente imposible porque a su parecer nadie mas tiene la razón.', 17, 71, 'active', '2021-01-08 04:47:39', '2021-01-08 04:47:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course`
--

INSERT INTO `course` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S7-A', 'S7-A', 'active', '2020-12-14 04:10:02', '2020-12-14 04:10:02'),
(2, 'S7-B', 'S7-B', 'active', '2020-12-14 04:10:02', '2020-12-14 04:10:02'),
(3, 'S0100', 'S01..', 'deleted', '2020-12-22 21:35:58', '2020-12-22 21:36:13'),
(4, 'S4-04', 'S4-04', 'active', '2021-01-08 03:40:18', '2021-01-08 03:40:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_student`
--

CREATE TABLE `course_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `course_subject_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `negative_percentage` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_student`
--

INSERT INTO `course_student` (`id`, `student_id`, `period_id`, `course_subject_id`, `status`, `created_at`, `updated_at`, `negative_percentage`) VALUES
(24, 17, 12, 17, 'active', '2021-01-08 04:05:21', '2021-01-08 04:05:21', NULL),
(25, 17, 12, 18, 'active', '2021-01-08 04:05:24', '2021-01-08 04:05:24', NULL),
(26, 17, 12, 19, 'active', '2021-01-08 04:05:28', '2021-01-08 04:05:28', NULL),
(27, 17, 12, 22, 'active', '2021-01-08 04:05:32', '2021-01-08 04:05:32', NULL),
(28, 17, 12, 28, 'active', '2021-01-08 04:05:35', '2021-01-08 04:05:35', NULL),
(29, 15, 12, 17, 'active', '2021-01-08 04:06:37', '2021-01-08 04:06:37', NULL),
(30, 15, 12, 22, 'active', '2021-01-08 04:06:58', '2021-01-08 04:06:58', NULL),
(31, 15, 12, 18, 'active', '2021-01-08 04:07:04', '2021-01-08 04:07:04', NULL),
(32, 15, 12, 19, 'active', '2021-01-08 04:07:09', '2021-01-08 04:07:09', NULL),
(33, 25, 12, 20, 'active', '2021-01-08 04:10:31', '2021-01-08 04:10:31', NULL),
(34, 25, 12, 23, 'active', '2021-01-08 04:10:58', '2021-01-08 04:10:58', NULL),
(35, 25, 12, 27, 'active', '2021-01-08 04:11:00', '2021-01-08 04:11:00', NULL),
(36, 25, 12, 29, 'active', '2021-01-08 04:11:02', '2021-01-08 04:11:02', NULL),
(37, 24, 12, 17, 'active', '2021-01-08 04:11:13', '2021-01-08 04:11:13', NULL),
(38, 24, 12, 18, 'active', '2021-01-08 04:11:15', '2021-01-08 04:11:15', NULL),
(39, 24, 12, 19, 'active', '2021-01-08 04:11:18', '2021-01-08 04:11:18', NULL),
(40, 24, 12, 22, 'active', '2021-01-08 04:11:20', '2021-01-08 04:11:20', NULL),
(41, 24, 12, 28, 'active', '2021-01-08 04:11:25', '2021-01-08 04:11:25', NULL),
(42, 26, 12, 21, 'active', '2021-01-08 04:12:00', '2021-01-08 04:12:00', NULL),
(43, 26, 12, 24, 'active', '2021-01-08 04:12:04', '2021-01-08 04:12:04', NULL),
(44, 26, 12, 25, 'active', '2021-01-08 04:12:06', '2021-01-08 04:12:06', NULL),
(45, 26, 12, 26, 'active', '2021-01-08 04:12:08', '2021-01-08 04:12:08', NULL),
(46, 27, 12, 21, 'active', '2021-01-08 04:12:49', '2021-01-08 04:12:49', NULL),
(47, 27, 12, 24, 'active', '2021-01-08 04:12:51', '2021-01-08 04:12:51', NULL),
(48, 27, 12, 25, 'active', '2021-01-08 04:12:56', '2021-01-08 04:12:56', NULL),
(49, 27, 12, 26, 'active', '2021-01-08 04:13:00', '2021-01-08 04:13:00', NULL),
(50, 28, 12, 21, 'active', '2021-01-08 07:33:11', '2021-01-08 07:33:11', NULL),
(51, 28, 12, 24, 'active', '2021-01-08 07:33:14', '2021-01-08 07:33:14', NULL),
(52, 28, 12, 25, 'active', '2021-01-08 07:33:17', '2021-01-08 07:33:17', NULL),
(53, 28, 12, 26, 'active', '2021-01-08 07:33:20', '2021-01-08 07:33:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_subject`
--

CREATE TABLE `course_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_subject`
--

INSERT INTO `course_subject` (`id`, `teacher_id`, `course_id`, `period_id`, `subject_id`, `status`, `created_at`, `updated_at`) VALUES
(17, 23, 1, 12, 13, 'active', '2021-01-08 03:41:25', '2021-01-08 03:41:25'),
(18, 23, 1, 12, 1, 'active', '2021-01-08 03:41:26', '2021-01-08 03:41:26'),
(19, 21, 1, 12, 3, 'active', '2021-01-08 03:44:41', '2021-01-08 03:44:41'),
(20, 22, 2, 12, 1, 'active', '2021-01-08 03:44:49', '2021-01-08 03:44:49'),
(21, 23, 4, 12, 1, 'active', '2021-01-08 03:44:53', '2021-01-08 03:44:53'),
(22, 19, 1, 12, 14, 'active', '2021-01-08 03:45:26', '2021-01-08 03:45:26'),
(23, 23, 2, 12, 13, 'active', '2021-01-08 03:45:35', '2021-01-08 03:45:35'),
(24, 20, 4, 12, 7, 'active', '2021-01-08 03:46:30', '2021-01-08 03:46:30'),
(25, 18, 4, 12, 8, 'active', '2021-01-08 03:46:44', '2021-01-08 03:46:44'),
(26, 18, 4, 12, 9, 'active', '2021-01-08 03:46:48', '2021-01-08 03:46:48'),
(27, 21, 2, 12, 11, 'active', '2021-01-08 03:48:41', '2021-01-08 03:48:41'),
(28, 21, 1, 12, 11, 'active', '2021-01-08 03:50:12', '2021-01-08 03:50:12'),
(29, 20, 2, 12, 10, 'active', '2021-01-08 04:05:06', '2021-01-08 04:05:06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_11_28_213601_create_roles_table', 1),
(13, '2020_11_28_213743_create_roles_user_table', 1),
(14, '2020_12_06_222157_create_table_subject', 1),
(15, '2020_12_06_222656_create_course', 1),
(16, '2020_12_06_222742_create_period', 1),
(18, '2020_12_06_222821_create_course_subject', 2),
(25, '2020_12_20_053856_create_permission_tables', 7),
(26, '2020_12_06_223743_create_course_student', 8),
(27, '2020_12_13_221132_class_subject', 8),
(28, '2020_12_13_221151_comment_student_class', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `period`
--

CREATE TABLE `period` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `period`
--

INSERT INTO `period` (`id`, `name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Periodo CI 2019', '2019-01-01', '2019-04-01', 'finalized', '2019-01-01 05:00:00', '2019-04-01 05:00:00'),
(2, 'Periodo CII 2019', '2020-07-01', '2020-11-01', 'finalized', '2020-07-01 05:00:00', '2020-12-22 21:19:12'),
(11, 'Periodo CI 2020', '2020-01-01', '2020-04-01', 'finalized', '2020-01-01 05:00:00', '2020-04-01 05:00:00'),
(12, 'Periodo CII 2020', '2020-07-01', '2021-04-15', 'active', '2020-07-01 05:00:00', '2020-12-22 20:57:43'),
(13, 'Periodo test', '2020-12-16', '2020-12-26', 'deleted', '2020-12-22 20:51:28', '2020-12-22 20:55:42'),
(14, 'nuevo', '2020-12-16', '2020-12-25', 'deleted', '2020-12-22 20:55:58', '2020-12-22 21:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'show_subject_student', 'web', '2020-12-20 10:47:03', '2020-12-20 10:47:03'),
(2, 'academic_menu', 'web', '2020-12-20 11:05:19', '2020-12-20 11:05:19'),
(3, 'create_user', 'web', '2020-12-20 11:15:56', '2020-12-20 11:15:56'),
(4, 'admin_users_menu', 'web', '2020-12-20 11:24:28', '2020-12-20 11:24:28'),
(5, 'admin_course_menu', 'web', '2020-12-21 23:09:47', NULL),
(6, 'admin_subject_menu', 'web', '2020-12-21 23:09:47', NULL),
(7, 'create_students', 'web', '2020-12-21 23:38:35', NULL),
(8, 'create_teachers', 'web', '2020-12-21 23:38:35', NULL),
(9, 'create_admin', 'web', '2020-12-21 23:38:35', NULL),
(10, 'create_subject', 'web', '2020-12-17 00:21:58', NULL),
(11, 'create_course', 'web', '2020-12-17 00:21:58', NULL),
(12, 'edit_teachers', 'web', '2020-12-17 00:21:58', NULL),
(13, 'edit_students', 'web', '2020-12-17 00:21:58', NULL),
(14, 'edit_admin', 'web', '2020-12-17 00:21:58', NULL),
(15, 'edit_subject', 'web', '2020-12-17 00:21:58', NULL),
(16, 'edit_course', 'web', '2020-12-17 00:21:58', NULL),
(17, 'delete_teachers', 'web', '2020-12-17 00:21:58', NULL),
(18, 'delete_students', 'web', '2020-12-17 00:21:58', NULL),
(19, 'delete_admin', 'web', '2020-12-17 00:21:58', NULL),
(20, 'delete_subject', 'web', '2020-12-17 00:21:58', NULL),
(21, 'delete_course', 'web', '2020-12-17 00:21:58', NULL),
(22, 'restore_teachers', 'web', '2020-12-21 23:38:35', NULL),
(23, 'restore_students', 'web', '2020-12-21 23:38:35', NULL),
(24, 'restore_admin', 'web', '2020-12-21 23:38:35', NULL),
(25, 'restore_subject', 'web', '2020-12-21 23:38:35', NULL),
(26, 'restore_course', 'web', '2020-12-21 23:38:35', NULL),
(27, 'access_subject', 'web', '2020-10-04 15:09:43', NULL),
(28, 'access_course', 'web', '2020-09-23 16:00:08', NULL),
(29, 'access_period', 'web', '2020-10-18 15:58:24', NULL),
(30, 'admin_course_menu', 'web', '2020-09-29 16:02:02', NULL),
(31, 'create_period', 'web', '2020-10-04 15:09:43', NULL),
(32, 'edit_period', 'web', '2020-11-09 14:07:21', NULL),
(33, 'active_period', 'web', '2020-10-27 22:33:04', NULL),
(34, 'finalize_period', 'web', '2020-10-04 15:09:43', NULL),
(35, 'access_registration', 'web', '2020-10-27 04:09:33', NULL),
(36, 'access_course_subject', 'web', '2020-09-23 16:00:08', NULL),
(37, 'create_course_subject', 'web', '2020-10-18 15:58:24', NULL),
(38, 'delete_course_subject', 'web', '2020-10-27 22:33:04', NULL),
(39, 'access_course_student', 'web', '2020-12-02 19:42:01', NULL),
(40, 'create_course_student', 'web', '2020-12-15 19:42:01', NULL),
(41, 'show_academic_teacher', 'web', '2020-12-15 20:52:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guard_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `guard_name`) VALUES
(1, 'student', 'Estudiantes', 'active', '2020-12-14 03:57:17', '2020-12-14 03:57:17', 'web'),
(2, 'teacher', 'Profesor', 'active', '2020-12-14 03:57:17', '2020-12-14 03:57:17', 'web'),
(3, 'admin', 'Administrador', 'active', '2020-12-14 03:57:17', '2020-12-14 03:57:17', 'web'),
(7, 'test', 'fx', 'active', '2020-12-20 10:51:03', '2020-12-20 10:51:03', 'web');

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
(2, 1),
(4, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'active', '2020-12-14 03:57:17', '2020-12-14 03:57:17'),
(4, 2, 3, 'active', '2020-12-21 23:22:44', NULL),
(12, 1, 15, 'active', '2020-12-22 09:55:38', '2020-12-22 09:55:38'),
(13, 2, 16, 'active', '2020-12-22 09:56:31', '2020-12-22 09:56:31'),
(14, 1, 17, 'active', '2020-12-27 01:38:59', '2020-12-27 01:38:59'),
(15, 2, 18, 'active', '2021-01-08 03:37:44', '2021-01-08 03:37:44'),
(16, 2, 19, 'active', '2021-01-08 03:37:59', '2021-01-08 03:37:59'),
(17, 2, 20, 'active', '2021-01-08 03:38:18', '2021-01-08 03:38:18'),
(18, 2, 21, 'active', '2021-01-08 03:38:57', '2021-01-08 03:38:57'),
(19, 2, 22, 'active', '2021-01-08 03:39:15', '2021-01-08 03:39:15'),
(20, 2, 23, 'active', '2021-01-08 03:39:42', '2021-01-08 03:39:42'),
(21, 1, 24, 'active', '2021-01-08 04:09:02', '2021-01-08 04:09:02'),
(22, 1, 25, 'active', '2021-01-08 04:09:18', '2021-01-08 04:09:18'),
(23, 1, 26, 'active', '2021-01-08 04:11:50', '2021-01-08 04:11:50'),
(24, 1, 27, 'active', '2021-01-08 04:12:39', '2021-01-08 04:12:39'),
(25, 1, 28, 'active', '2021-01-08 07:32:56', '2021-01-08 07:32:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ingles', 'active', '2020-12-14 04:10:01', '2020-12-14 04:10:01'),
(2, 'Programaciòn', 'active', '2020-12-14 04:10:01', '2020-12-14 04:10:01'),
(3, 'SOD', 'active', '2020-12-14 04:10:01', '2020-12-14 04:10:01'),
(4, 'Matemàticas', 'active', '2020-12-14 04:10:02', '2020-12-14 04:10:02'),
(5, 'Electiva', 'active', '2020-12-14 04:10:02', '2020-12-14 04:10:02'),
(6, 'As2 001', 'deleted', '2020-12-22 21:33:43', '2020-12-22 21:34:36'),
(7, 'Ingeniería en software', 'active', '2021-01-08 03:35:42', '2021-01-08 03:35:42'),
(8, 'Ingeniería en software Orientada a Objetos', 'active', '2021-01-08 03:35:53', '2021-01-08 03:35:53'),
(9, 'POO', 'active', '2021-01-08 03:35:58', '2021-01-08 03:35:58'),
(10, 'Electiva 2', 'active', '2021-01-08 03:36:21', '2021-01-08 03:36:21'),
(11, 'Electiva 3', 'active', '2021-01-08 03:36:26', '2021-01-08 03:36:26'),
(12, 'Electiva 4', 'active', '2021-01-08 03:36:29', '2021-01-08 03:36:29'),
(13, 'Simulación de Sistemas', 'active', '2021-01-08 03:40:59', '2021-01-08 03:40:59'),
(14, 'Seguridad Informática', 'active', '2021-01-08 03:45:17', '2021-01-08 03:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edw', 'Rys', 'edw@edw.com', NULL, '$2y$10$W8izmMaPGXTuEFkkG2/sue64Ufss3yclqeYArmGfWjliWkfq9eaa2', 'active', NULL, '2020-12-14 03:57:17', '2020-12-14 03:57:17'),
(3, 'Roberth', 'Idrovo', 'rdit@rdit.com', NULL, '$2y$10$u1ensOQJ2q/L08g3HkPiZeYFDtG2f7uMPQEWfj1SGL0nKT8gaPXjm', 'active', NULL, '2020-12-14 03:57:18', '2020-12-22 09:28:12'),
(5, 'hola', 'hola', 'hola@hola.com', NULL, '$2y$10$mt.HcrWTLh0Syqk3klHAFOnUcT3bN1nWaQlv4iBJTjH4FT1cNYyWS', 'active', NULL, '2020-12-22 08:06:54', '2020-12-22 08:06:54'),
(7, 'hola', 'hola', 'hola@hola.comd', NULL, '$2y$10$K4fH7eyHdwjyeqlp1LiM2e5btctM7tB07G7j7CIwQPNMZT8H.UhEO', 'active', NULL, '2020-12-22 08:07:43', '2020-12-22 08:07:43'),
(13, 'profesor 1', 'profesor 1apr', 'profe1@profe.com', NULL, '$2y$10$iU3QP/WYeSlL4WdxxqTu0eISAgOEBwYhEPtVjAK15.fiR57sOlDqa', 'deleted', NULL, '2020-12-22 09:54:08', '2020-12-22 09:56:52'),
(14, 'profesor 1', 'profesor 1apr', 'profesor1@profe.com', NULL, '$2y$10$hflfZc9I3M8R07tOj.NYyOkz6GwNA1Bm2yHcA2XPXWGdH6QiH5vHm', 'deleted', NULL, '2020-12-22 09:54:38', '2020-12-22 09:56:45'),
(15, 'Edward', 'Reyes', 'reytoni876@gmail.com', NULL, '$2y$10$2fFc3CAsgLBokkePyf7Iq.rEzQrhMnd8zUVmB5LySe0.O29ZoLImS', 'active', NULL, '2020-12-22 09:55:38', '2020-12-22 09:55:38'),
(16, 'Profe', 'Profe', 'profe@gmail.com', NULL, '$2y$10$vH6zyu3lR9/DxMdbTJ33xeek6II6Wk9P.vfh/LKUQB4qCDEXOYmDW', 'active', NULL, '2020-12-22 09:56:31', '2020-12-22 10:04:13'),
(17, 'Beatríz Melanie', 'Delgado Guerrero', 'beatriz@bea.com', NULL, '$2y$10$pZYyJnNhOa95yNBwJ18sA.wapzl65Z3xsNAPmILZSuKn49ltBM9EC', 'active', NULL, '2020-12-27 01:38:59', '2021-01-08 03:17:41'),
(18, 'Karla', 'Abd', 'karla@academic.ec', NULL, '$2y$10$BuEZwTm/sqjOdBFKY06K/eAXOwMTE0fDQWKRJEXafKs/STGfOKEgK', 'active', NULL, '2021-01-08 03:37:44', '2021-01-08 03:37:44'),
(19, 'Alonso', 'Guijarro', 'alonso@academic.ec', NULL, '$2y$10$pzXHQ0N6zvU9buDb8TrXd.viRnJtuzyuBu.81.5noe.8ViDXy/V2a', 'active', NULL, '2021-01-08 03:37:59', '2021-01-08 03:37:59'),
(20, 'Tania', 'P', 'tania@academic.ec', NULL, '$2y$10$63bFBg57VTFwHowvKWHL6OqRi7aRrsx1AHxv8W7RnzHqfO9jZqLIG', 'active', NULL, '2021-01-08 03:38:18', '2021-01-08 03:38:18'),
(21, 'José', 'Zambrano', 'jzambrano@academic.ec', NULL, '$2y$10$/83Z.Ae34vK8hGOAvpvUe.T3ev9GLJ9.L.PJktSgu9q62r595VDYi', 'active', NULL, '2021-01-08 03:38:57', '2021-01-08 03:38:57'),
(22, 'Lilia', 'Arteaga', 'larteaga@academic.ec', NULL, '$2y$10$42ikBZLdL0iLZAkjJ//whuL9VPeRF2miW8bhboFyfbDzmMPKpub7K', 'active', NULL, '2021-01-08 03:39:15', '2021-01-08 03:39:15'),
(23, 'Lili', 'Lopez Dd', 'llopez@academic.ec', NULL, '$2y$10$kHU6egbaNZ6dBry13e/xneV76go.BaMvZgm7XhSESU7rIkQ.R4zBW', 'active', NULL, '2021-01-08 03:39:42', '2021-01-08 03:39:42'),
(24, 'Karolayn', 'Pivaque', 'karol@academic.ec', NULL, '$2y$10$JvBM48xk2ZN8kyqBBrPki.kxkrhJriCY0iNk.14kh.MZ3pZkZMRyS', 'active', NULL, '2021-01-08 04:09:02', '2021-01-08 04:09:02'),
(25, 'Carlos', 'Rendon', 'rcarlos@academic.ec', NULL, '$2y$10$Milu3Gr/3sHqHVrGXC1.c.X/3pGxYq0S4ZQLQB2qXJzHCvt8F.mtK', 'active', NULL, '2021-01-08 04:09:18', '2021-01-08 04:09:18'),
(26, 'Jennyfer', 'Torres', 'tjennyfer@academic.ec', NULL, '$2y$10$iHpJ6bH/kUosZ6saOto04uOUdUsFIccGXvBkie9gUxHfll6ak/gcO', 'active', NULL, '2021-01-08 04:11:50', '2021-01-08 04:11:50'),
(27, 'Kerly', 'Peña', 'pkerly@academic.ec', NULL, '$2y$10$Sn.fLfrFXwTH4Ao6Updci.f.ETjrDAn9KsF8FJx10Sq4UV6qmslLa', 'active', NULL, '2021-01-08 04:12:39', '2021-01-08 04:12:39'),
(28, 'Kely', 'Snc', 'skely@academic.ec', NULL, '$2y$10$gWvNPocZG6mSVBKcoTXKIuqJ4R4jG3OhRX9S8KjaLUras7g1fRd9S', 'active', NULL, '2021-01-08 07:32:56', '2021-01-08 07:32:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_subject_course_subject_id_foreign` (`course_subject_id`),
  ADD KEY `fk_teacher_id_class_subject` (`teacher_id`);

--
-- Indices de la tabla `comment_student_class`
--
ALTER TABLE `comment_student_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_student_class_student_id_foreign` (`student_id`),
  ADD KEY `comment_student_class_class_id_foreign` (`class_id`);

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_student_id_foreign` (`student_id`),
  ADD KEY `course_student_period_id_foreign` (`period_id`),
  ADD KEY `course_student_course_subject_id_foreign` (`course_subject_id`);

--
-- Indices de la tabla `course_subject`
--
ALTER TABLE `course_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_subject_teacher_id_foreign` (`teacher_id`),
  ADD KEY `course_subject_course_id_foreign` (`course_id`),
  ADD KEY `course_subject_period_id_foreign` (`period_id`),
  ADD KEY `course_subject_subject_id_foreign` (`subject_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT de la tabla `comment_student_class`
--
ALTER TABLE `comment_student_class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `course_subject`
--
ALTER TABLE `course_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `period`
--
ALTER TABLE `period`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `class_subject`
--
ALTER TABLE `class_subject`
  ADD CONSTRAINT `class_subject_course_subject_id_foreign` FOREIGN KEY (`course_subject_id`) REFERENCES `course_subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_teacher_id_class_subject` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `comment_student_class`
--
ALTER TABLE `comment_student_class`
  ADD CONSTRAINT `comment_student_class_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_student_class_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_subject_id_foreign` FOREIGN KEY (`course_subject_id`) REFERENCES `course_subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_student_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `period` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `course_subject`
--
ALTER TABLE `course_subject`
  ADD CONSTRAINT `course_subject_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_subject_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `period` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_subject_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
