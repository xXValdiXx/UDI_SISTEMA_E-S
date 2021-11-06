-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 06-11-2021 a las 17:16:34
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CECyT3_E/S`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nomArea` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nomArea`) VALUES
(1, 'DIRECCIÓN'),
(2, 'DECANATO'),
(3, 'CEGET'),
(4, 'UDI'),
(5, 'SUBDIRECCIÓN ACADÉMICA'),
(6, 'UNIDADES DE APRENDIZAJE DEL ÁREA BÁSICA'),
(7, 'UNIDADES DE APRENDIZAJE DEL ÁREA HUMANÍSTICA'),
(8, 'UNIDADES DE APRENDIZAJE DEL ÁREA TECNOLÓGICA Y DE ESPECIALIDAD'),
(9, 'SERVICIOS ACADÉMICOS'),
(10, 'INVESTIGACIÓN Y DESARROLLO TECNOLÓGICO'),
(11, 'UNIDAD DE TECNOLOGÍA EDUCATIVA Y CAMPUS VIRTUAL'),
(12, 'SUBDIRECCIÓN DE SERVICIOS EDUCATIVOS E INTEGRACIÓN SOCIAL'),
(13, 'GESTIÓN ESCOLAR'),
(14, 'SERVICIOS ESTUDIANTILES'),
(15, 'EXTENSIÓN Y APOYOS EDUCATIVOS'),
(16, 'UNIDAD POLITÉCNICA DE INTEGRACIÓN SOCIAL'),
(17, 'SUBDIRECCIÓN ADMINISTRATIVA'),
(18, 'CAPITAL HUMANO'),
(19, 'RECURSOS FINANCIEROS'),
(20, 'RECURSOS MATERIALES Y SERVICIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `evento` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `evento`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `horaEntrada` time(6) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `horaSalida` time(6) DEFAULT NULL,
  `entrada` int(11) NOT NULL,
  `salida` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `fechaEntrada`, `horaEntrada`, `id_usuario`, `fechaSalida`, `horaSalida`, `entrada`, `salida`) VALUES
(1, '2021-10-27', '18:13:43.000000', 1, '2021-10-27', '18:13:51.000000', 1, 1),
(2, '2021-10-27', '18:14:00.000000', 1, '2021-10-27', '18:14:13.000000', 1, 1),
(3, '2021-10-27', '18:14:20.000000', 1, '2021-10-27', '18:14:27.000000', 1, 1),
(4, '2021-10-27', '23:28:38.000000', 1, '2021-10-27', '23:29:23.000000', 1, 1),
(5, '2021-10-27', '23:30:14.000000', 1, '2021-10-27', '23:30:33.000000', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subarea`
--

CREATE TABLE `subarea` (
  `id` int(11) NOT NULL,
  `nomsubArea` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `id_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subarea`
--

INSERT INTO `subarea` (`id`, `nomsubArea`, `id_area`) VALUES
(1, 'ÁREA SECRETARIAL', 1),
(2, 'SALA DE JUNTAS DIRECCIÓN', 1),
(3, 'ARCHIVO HISTORICO', 2),
(4, 'AULA SIGLO XXI', 4),
(5, 'AULA DE AUTOACCESO', 4),
(6, 'LAB. DISEÑO Y GRAFICACIÓN', 4),
(7, 'LAB. MULTIACCESO', 4),
(8, 'LAB. PROGRAMACIÓN AVANZADA', 4),
(9, 'ÁREA SECRETARIAL', 5),
(10, 'SALA JUNTAS CONSEJO', 5),
(11, 'COORDINACIÓN INTERPOLITÉCNICOS', 5),
(12, 'LAB. COMPUTACIÓN BÁSICA I', 6),
(13, 'LAB. COMPUTACIÓN BÁSICA II', 6),
(14, 'ACADEMIA DIBUJO', 6),
(15, 'LAB. AUTOCAD', 6),
(16, 'SALÓN RESTIRADORES I', 6),
(17, 'SALÓN RESTIRADORES II', 6),
(18, 'ACADEMIA FÍSICA', 6),
(19, 'LAB. FÍSICA I', 6),
(20, 'LAB. FÍSICA II', 6),
(21, 'ACADEMÍA QUÍMICA', 6),
(22, 'LAB. QUÍMICA I', 6),
(23, 'LAB. QUÍMICA II', 6),
(24, 'ACADEMIA MATEMÁTICAS', 6),
(25, 'ACADEMIA BIOLOGÍA', 6),
(26, 'CUBÍCULO HUMANÍSTICAS', 7),
(27, 'ACADEMIA INGLÉS', 7),
(28, 'LAB. INGLÉS I', 7),
(29, 'LAB. INGLÉS II', 7),
(30, 'AULA PROYECCIÓN INGLÉS', 7),
(31, 'ACADEMIA COMPUTACIÓN ESPECIALIDAD', 8),
(32, 'LAB. COMPUTACIÓN ESPECIALIDAD I', 8),
(33, 'LAB. COMPUTACIÓN ESPECIALIDAD II', 8),
(34, 'LAB. COMPUTACIÓN ESPECIALIDAD III', 8),
(35, 'LAB. REDES', 8),
(36, 'ACADEMIA SISTEMAS DIGITALES', 8),
(37, 'LAB. SD II', 8),
(38, 'LAB. SD III', 8),
(39, 'LAB. SD IV', 8),
(40, 'ACADEMIA SCE', 8),
(41, 'LAB. PLC', 8),
(42, 'ACADEMIA MAC', 8),
(43, 'LAB. NEUMATICA', 8),
(44, 'LAB. SW-INFORMÁTICA', 8),
(45, 'LAB. CNC', 8),
(46, 'ACADEMIA AERONAUTICA', 8),
(47, 'HANGAR', 8),
(48, 'ACADEMIA AUTOMOTRIZ', 8),
(49, 'TALLER AUTOMOTRIZ', 8),
(50, 'TUTORIAS', 9),
(51, 'PROYECTO AULA', 9),
(52, 'ÁREA SECRETARIAL', 11),
(53, 'CELDAS DE PRODCUCCIÓN', 11),
(54, 'ÁREA SECRETARIAL', 12),
(55, 'COSECOVI', 12),
(56, 'SALA JUNTAS CONSEJO', 12),
(57, 'COORDINACIÓN INTERPOLITÉCNICOS', 12),
(58, 'MODULO SAES', 13),
(59, 'ÁREA CONTROLADORAS', 13),
(60, 'COMISIÓN', 13),
(61, 'ARCHIVO ACTIVO', 13),
(62, 'SERVICIO MÉDICO', 14),
(63, 'SERVICIO DENTAL', 14),
(64, 'PSICOPEDAGOGÍA', 14),
(65, 'AUDITORIO GUINDA', 14),
(66, 'AUDITORIO AZUL', 14),
(67, 'BIBLIOTECA', 14),
(68, 'SERVICIO SOCIAL', 15),
(69, 'TITULACIÓN', 15),
(70, 'ÁREA SECRETARIAL', 16),
(71, 'ÁREA SECRETARIAL', 17),
(72, 'ARCHIVO', 17),
(73, 'CELEX', 17),
(74, 'ÁREA SECRETARIAL', 18),
(75, 'CHECADOR', 18),
(76, 'PAGADURÍA', 18),
(77, 'ÁREA SECRETARIAL', 19),
(78, 'CAJA', 19),
(79, 'COMPRAS', 19),
(80, 'ÁREA SECRETARIAL', 20),
(81, 'ACTIVO FIJO', 20),
(82, 'ALMACÉN', 20),
(83, 'TALLER MANTENIMIENTO', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `apellidoPaterno` varchar(255) NOT NULL DEFAULT '',
  `apellidoMaterno` varchar(255) NOT NULL DEFAULT '',
  `area` varchar(200) NOT NULL DEFAULT '',
  `puesto` varchar(200) NOT NULL DEFAULT '',
  `numEmpleado` varchar(100) NOT NULL DEFAULT '',
  `correo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL DEFAULT '',
  `telefonoPersonal` varchar(25) DEFAULT NULL,
  `extensionIPN` varchar(11) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `area`, `puesto`, `numEmpleado`, `correo`, `password`, `imagen`, `telefonoPersonal`, `extensionIPN`) VALUES
(1, 'Alan', 'Garduño', 'Pineda', 'UDI', 'Jefe', '2014030514', 'agarduno@ipn.mx', 'qaz', 'image1.png', NULL, '74000'),
(2, 'Angel', 'Valdivia', 'Sánchez', 'UDI', 'Jefe 2', '2015041645', 'avaldivia@ipn.mx', 'qaz', 'image1.png', NULL, '740001');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usr` (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subarea` (`id_area`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
