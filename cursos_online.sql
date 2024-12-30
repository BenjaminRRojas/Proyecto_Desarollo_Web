-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2024 a las 11:50:21
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
-- Base de datos: `cursos_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_foro` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` text NOT NULL,
  `contenido` text NOT NULL,
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_comentario_responde` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_foro`, `id_usuario`, `titulo`, `contenido`, `fecha_comentario`, `id_comentario_responde`) VALUES
(3, 2, 3, '¿Por qué no me funciona esta parte?', 'Alguien me puede ayudar con esta parte por favor no entiendo por qué .....', '2024-12-22 18:32:14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_media` int(11) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `titulo`, `duracion`, `fecha_creacion`, `categoria`, `id_usuario`, `id_media`, `descripcion`) VALUES
(2, 'HTML', 20, '2024-12-22 17:49:23', 'Desarrollo Web', 2, 2, 'FAFSFDSASFDFS'),
(3, 'Java', 3, '2024-12-29 09:41:00', 'Programacion', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_estudiante`
--

CREATE TABLE `curso_estudiante` (
  `id_curso` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `fecha_inscripcion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso_estudiante`
--

INSERT INTO `curso_estudiante` (`id_curso`, `id_estudiante`, `fecha_inscripcion`) VALUES
(2, 17, '2024-12-22 17:49:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id_evaluacion` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_limite` datetime NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id_evaluacion`, `titulo`, `descripcion`, `fecha_creacion`, `fecha_limite`, `id_curso`) VALUES
(2, 'Evaluación 1 de HTML', 'abcd', '2024-12-22 17:47:06', '2024-12-22 17:47:06', 2),
(3, 'Evaluación 1 de Python', 'abcd', '2024-12-22 17:47:06', '2024-12-22 17:47:06', 3),
(7, 'addafa', 'aaa', '2024-12-29 23:16:18', '2025-01-04 23:16:00', 3),
(8, 'aa', 'aa', '2024-12-30 00:25:55', '2025-01-02 00:25:00', 2),
(9, 'HOLA', '........', '2024-12-30 02:24:19', '2025-01-03 02:23:00', 2),
(10, 'a', 'a', '2024-12-30 02:36:27', '2025-01-04 02:36:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_foro` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id_foro`, `id_curso`, `titulo`, `descripcion`, `fecha_creacion`) VALUES
(2, 2, 'Hola', 'Mundo ', '2024-12-22 18:52:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `ubicacion_archivo` varchar(255) NOT NULL,
  `tipo_archivo` enum('IMAGEN','VIDEO','DOCUMENTO','AUDIO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id_media`, `nombre_archivo`, `ubicacion_archivo`, `tipo_archivo`) VALUES
(1, 'fadsadsadfsadsf', 'adfsdfaadfsdfs', 'IMAGEN'),
(2, 'asdffdaadfsadf', 'adfsadfsadfsadfs', 'DOCUMENTO'),
(3, 'adsfadfsadfsafds', 'adfsadfsadfsadfs', 'AUDIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `id_evaluacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `enunciado`, `id_evaluacion`) VALUES
(1, 'a', 7),
(2, 'a', 7),
(3, 'a', 7),
(4, 'a', 7),
(5, 'a', 8),
(6, 'a', 8),
(7, 'a', 8),
(8, 'a', 8),
(9, 'Pregunta', 9),
(10, 'a', 9),
(11, 'a', 9),
(12, 'a', 9),
(13, 'a', 10),
(14, 'a', 10),
(15, 'a', 10),
(16, 'a', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int(11) NOT NULL,
  `texto_respuesta` text NOT NULL,
  `es_correcta` tinyint(1) NOT NULL,
  `id_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `texto_respuesta`, `es_correcta`, `id_pregunta`) VALUES
(1, 'a', 0, 1),
(2, 'a', 0, 1),
(3, 'a', 1, 1),
(4, 'a', 1, 2),
(5, 'a', 0, 2),
(6, 'a', 0, 2),
(7, 'a', 0, 3),
(8, 'a', 1, 3),
(9, 'a', 0, 3),
(10, 'a', 0, 4),
(11, 'a', 1, 4),
(12, 'a', 0, 4),
(13, 'a', 0, 5),
(14, 'a', 1, 5),
(15, 'a', 0, 5),
(16, 'a', 0, 6),
(17, 'a', 0, 6),
(18, 'a', 1, 6),
(19, 'a', 0, 7),
(20, 'a', 0, 7),
(21, 'a', 1, 7),
(22, 'a', 1, 8),
(23, 'a', 0, 8),
(24, 'a', 0, 8),
(25, 'si', 1, 9),
(26, 'no', 0, 9),
(27, 'no', 0, 9),
(28, 'si', 1, 10),
(29, 'no', 0, 10),
(30, 'no', 0, 10),
(31, 'no', 0, 11),
(32, 'si', 1, 11),
(33, 'no', 0, 11),
(34, 'no', 0, 12),
(35, 'no', 0, 12),
(36, 'si', 1, 12),
(37, 'a', 0, 13),
(38, 'b', 1, 13),
(39, 'a', 0, 13),
(40, 'b', 1, 14),
(41, 'a', 0, 14),
(42, 'a', 0, 14),
(43, 'b', 1, 15),
(44, 'a', 0, 15),
(45, 'a', 0, 15),
(46, 'b', 1, 16),
(47, 'a', 0, 16),
(48, 'a', 0, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_evaluacion` int(11) NOT NULL,
  `nota` float NOT NULL,
  `fecha_realizacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `id_estudiante`, `id_evaluacion`, `nota`, `fecha_realizacion`) VALUES
(33, 17, 9, 1, '2024-12-30 07:41:24'),
(34, 17, 10, 5.5, '2024-12-30 07:43:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `sexo` enum('MUJER','HOMBRE','OTRO') NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_usuario` enum('ESTUDIANTE','DOCENTE','ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `descripcion`, `correo`, `contrasena`, `sexo`, `fecha_registro`, `tipo_usuario`) VALUES
(2, 'aefsaafdsdaffdsa', 'adfsdfsfdafad', '', 'fadsdfdfasdfadfsasafds', 'adfssasfsdfs', 'HOMBRE', '2024-12-22 17:47:06', 'DOCENTE'),
(3, 'adafsdfadsafs', 'adfsasdadfsadf', '', 'adfsasdfadfsadfs', 'adfsadfsfadsadf', 'MUJER', '2024-12-22 17:47:23', 'DOCENTE'),
(4, 'Benjamin', 'Rojas Navea', '', 'benjaminrojasnavea@gmail.com', '$2y$10$bpMDl8gRkVbInBXyFROA5OZ.FNl/WVVL0HWggfA/HuoFxItNJGIPK', 'HOMBRE', '2024-12-27 06:48:59', ''),
(6, 'Benjmain', 'Rojas Navea', '', 'trollmasterdeloshuevos@gmail.com', '$2y$10$wGFoJ9yKyJMVT29e7RtDluBtK9J61ny3qKOxhsvFhN3PBEEEDklU.', 'HOMBRE', '2024-12-27 06:52:02', 'ESTUDIANTE'),
(7, 'Kin', 'Alvarado', '', 'kin.alvarado.m@gmail.com', '$2y$10$4lQTcEdo.RVr5bNPx0.qy.xCNd0NaDOF7reDkvkp7d2wRffTbsCgW', 'HOMBRE', '2024-12-27 07:25:12', 'ADMIN'),
(9, 'Paulina', 'Rojo', '', 'paulinafernanda04@gmail.com', '$2y$10$tbEyfn2EpaqAwp4VWl9SOuVr6cy1KVrbnX9M7ms5fBoVRY6qUb1qW', 'MUJER', '2024-12-27 07:30:18', 'ESTUDIANTE'),
(10, 'dsadas', 'dsadsa', '', 'dsadsadsa@gmail.com', '$2y$10$9EfgJ04VGRej5GZ.mt7ZSeiGDp.67JXuxPsAysgw5pNjjgf/zaEd2', 'HOMBRE', '2024-12-27 23:10:02', 'ESTUDIANTE'),
(14, 'Benja', 'erkerkekeke', '', 'benjacevedo1@gmail.com', '$2y$10$J2rB5pjhAcjsaxPkI1tk8uDbIz48/hDrhpXfUQtROWZU6RkSWRbRy', 'HOMBRE', '2024-12-29 23:54:30', 'DOCENTE'),
(15, 'Benjamin', 'ROJAS nAVEA', '', 'aa@gmail.com', '$2y$10$g69GwMw2mpRqdc0vzxy3dufg1/VvJbnXZX8zPCBbhh86h39dNrFqW', 'HOMBRE', '2024-12-30 00:24:39', 'ESTUDIANTE'),
(16, 'Benjamin', 'ROJAS nAVEA', 'Holaaaa', 'k@gmail.com', '$2y$10$//1kzs1/G9U0Rgm3bGgrW.7cXYIVtDDRieme.JEc6clderIhVZk5e', 'HOMBRE', '2024-12-30 00:41:23', 'ESTUDIANTE'),
(17, 'Antonella', 'Godoy Munizaga', '', 'antonellagmuni@gmail.com', '$2y$10$MnCU0A2Hl4srfkecWc/y6uNOrbAKJ0HT8oRmHlEsuPAUf51qsP0Zy', 'MUJER', '2024-12-30 02:17:07', 'ESTUDIANTE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_comentario_responde` (`id_comentario_responde`),
  ADD KEY `comentario_ibfk_3` (`id_foro`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_media` (`id_media`);

--
-- Indices de la tabla `curso_estudiante`
--
ALTER TABLE `curso_estudiante`
  ADD PRIMARY KEY (`id_curso`,`id_estudiante`),
  ADD KEY `fk_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_foro`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_evaluacion` (`id_evaluacion`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_evaluacion` (`id_evaluacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_foro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_comentario_responde`) REFERENCES `comentario` (`id_comentario`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`id_foro`) REFERENCES `foro` (`id_foro`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`) ON DELETE SET NULL;

--
-- Filtros para la tabla `curso_estudiante`
--
ALTER TABLE `curso_estudiante`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluaciones` (`id_evaluacion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluaciones` (`id_evaluacion`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
