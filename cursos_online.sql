-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2024 a las 02:35:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "SET time_zone = '-04:00';";


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
(3, 2, 3, '¿Por qué no me funciona esta parte??? ', 'Alguien me puede ayudar con esta parte por favor no entiendo por qué ..... ', '2024-12-22 18:30:14', NULL),
(4, 2, 2, 'Hola gente ', 'No nada ', '2024-12-28 23:25:40', NULL),
(5, 2, 3, '', 'hola', '2024-12-30 01:45:06', 3),
(39, 1, 1, 'adfsafsd', 'afdsafadfs', '2024-12-30 06:04:00', NULL),
(40, 2, 2, 'aadsffads', 'adfsafsdfad', '2024-12-30 05:07:00', NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id_evaluacion` int(11) NOT NULL,
  `nota1` float NOT NULL,
  `nota2` float NOT NULL,
  `nota3` float NOT NULL,
  `tarea` varchar(255) NOT NULL,
  `promedio` float NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id_evaluacion`, `titulo`, `descripcion`, `fecha_creacion`, `fecha_limite`,  `id_curso`) VALUES
(2, 'Evaluación 1 de HTML', 'abcd', '2024-12-22 17:47:06', '2024-12-22 17:47:06',  2),
(3, 'Evaluación 1 de Python', 'abcd', '2024-12-22 17:47:06', '2024-12-22 17:47:06',  3);
-- --------------------------------------------------------



-- Estructura de tabla para la tabla `preguntas`


CREATE TABLE preguntas (
    `id_pregunta` int(11) NOT NULL,
    `enunciado` text NOT NULL,
    `id_evaluacion` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE respuestas (
    `id_respuesta` int(11) NOT NULL,
    `texto_respuesta` text NOT NULL,
    `es_correcta` BOOLEAN NOT NULL,
    `id_pregunta` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE resultados (
    `id_resultado` int(11) NOT NULL,
    `id_estudiante` int(11) NOT NULL,
    `id_evaluacion` int(11) NOT NULL,
    `nota` float NOT NULL,
    `retroalimentacion` text NOT NULL,
    `fecha_realizacion` datetime DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_foro` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `titulo_foro` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id_foro`, `id_curso`, `titulo_foro`, `descripcion`, `fecha_creacion`) VALUES
(1, 1, 'PHP', 'Descripción 1', '2024-12-22 21:49:36'),
(2, 3, 'CSS', 'Descripción 2', '2024-12-22 21:52:51');

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
(16, 'Benjamin', 'ROJAS nAVEA', 'Holaaaa', 'k@gmail.com', '$2y$10$//1kzs1/G9U0Rgm3bGgrW.7cXYIVtDDRieme.JEc6clderIhVZk5e', 'HOMBRE', '2024-12-30 00:41:23', 'ESTUDIANTE');

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
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`);
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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_foro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
