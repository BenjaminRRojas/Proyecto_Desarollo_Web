-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2024 a las 00:26:50
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
(1, 'test1', '343', '2024-12-28 03:51:06', '2024-12-14 03:50:00', 2),
(2, 'test3', 'test3', '2024-12-28 03:54:28', '2024-12-20 07:59:00', 2),
(3, 'test3', 'test3', '2024-12-28 03:54:39', '2024-12-20 07:59:00', 2),
(4, 'test4', 'test4', '2024-12-28 03:54:54', '2024-12-28 06:56:00', 2),
(5, 'test5', 'test5', '2024-12-28 03:56:42', '2025-01-01 06:59:00', 2);

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `sexo` enum('MUJER','HOMBRE','OTRO') NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_usuario` enum('ESTUDIANTE','DOCENTE','ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `correo`, `contrasena`, `sexo`, `fecha_registro`, `tipo_usuario`) VALUES
(2, 'aefsaafdsdaffdsa', 'adfsdfsfdafad', 'fadsdfdfasdfadfsasafds', 'adfssasfsdfs', 'HOMBRE', '2024-12-22 17:47:06', 'DOCENTE'),
(3, 'adafsdfadsafs', 'adfsasdadfsadf', 'adfsasdfadfsadfs', 'adfsadfsfadsadf', 'MUJER', '2024-12-22 17:47:23', 'DOCENTE'),
(6, 'Benjmain', 'Rojas Navea', 'trollmasterdeloshuevos@gmail.com', '$2y$10$wGFoJ9yKyJMVT29e7RtDluBtK9J61ny3qKOxhsvFhN3PBEEEDklU.', 'HOMBRE', '2024-12-27 06:52:02', 'ESTUDIANTE'),
(7, 'Kin', 'Alvarado', 'kin.alvarado.m@gmail.com', '$2y$10$4lQTcEdo.RVr5bNPx0.qy.xCNd0NaDOF7reDkvkp7d2wRffTbsCgW', 'HOMBRE', '2024-12-27 07:25:12', 'ADMIN'),
(9, 'Paulina', 'Rojo', 'paulinafernanda04@gmail.com', '$2y$10$tbEyfn2EpaqAwp4VWl9SOuVr6cy1KVrbnX9M7ms5fBoVRY6qUb1qW', 'MUJER', '2024-12-27 07:30:18', 'ESTUDIANTE'),
(10, 'dsadas', 'dsadsa', 'dsadsadsa@gmail.com', '$2y$10$9EfgJ04VGRej5GZ.mt7ZSeiGDp.67JXuxPsAysgw5pNjjgf/zaEd2', 'HOMBRE', '2024-12-27 23:10:02', 'ESTUDIANTE'),
(12, 'Alan', 'Cubillos', 'alanmonardesaraya@gmail.com', '$2y$10$v0l0YhBzQLwNjJdLh/sXlefbpV.9Br.kwxWCv2/4ANCAIWhvCybIW', 'HOMBRE', '2024-12-28 07:06:58', 'ESTUDIANTE'),
(23, 'jose', 'jose2', 'jose@gmail.com', '$2y$10$gOyaWS.SWIXU/fB9AWovr.K83xnPKtff0BQmsVF6V/rDl2k/wMgY6', 'HOMBRE', '2024-12-29 02:16:13', 'ESTUDIANTE'),
(24, 'aa', 'ROJAS nAVEA', 'aa@gmail.com', '$2y$10$N4Ec/MFIXRW9AEjunNn3xeEl.yz2kOOHiBBtt1lKUKYo27JF.ZJ66', 'MUJER', '2024-12-29 02:34:43', 'ESTUDIANTE'),
(25, 'aaa', 'aa', 'aaa@gmail.com', '$2y$10$AQdj8PQuZYr7JzubSdz1DOtdiM5r7htz4ug6LsjGBc6ci7mdZ6g92', 'HOMBRE', '2024-12-29 02:36:18', 'ESTUDIANTE'),
(27, 'dasdsa', 'dsadsad', 'sdadasd@gmail.com', '$2y$10$RXMiroCgh0Yt2uU0hl6IAe4I5G44iFbiGyxmMHy01ti.8yblSI3AG', 'HOMBRE', '2024-12-29 02:36:45', 'DOCENTE'),
(28, '11', '11', '11@gmail.com', '$2y$10$xyX4iylcOeJhcmoehBS41exF4QFdGIMFS2PDGEaq1Sqqfvae3UwfC', 'HOMBRE', '2024-12-29 02:37:00', 'DOCENTE'),
(31, 'abcd', 'abcd', 'abcd@gmail.com', '$2y$10$Mzs9qz2wKzoTB7fn9xgBEutBDhePtdK9bXWeZt7rJ2yeEemdvFhii', 'HOMBRE', '2024-12-29 20:58:00', 'ESTUDIANTE'),
(32, 'ab', 'ab', 'ab@gmail.com', '$2y$10$VZ2yh7.HIkAD8Uvvu0rfWeWArcUrVvqejTGxyYg/OMPzMVUnERLRC', 'HOMBRE', '2024-12-29 23:06:17', 'DOCENTE'),
(33, 'AA', 'Alvarado', 'benjaminrojasnavea@gmail.com', '$2y$10$yhZ9hzgZkWPypB4ECpLom.zDHK0aUuSCP1aY0FL6sroyLpR5hVtW2', 'HOMBRE', '2024-12-29 23:08:59', 'ESTUDIANTE'),
(34, 'Benjamin', 'ROJAS nAVEA', '0@gmail.com', '$2y$10$A/5TTPNwO1UnCDgNyOUgRuetSiLwG.Oqdx.4FFFsVtEMEGADoekl2', 'HOMBRE', '2024-12-29 23:09:27', 'DOCENTE');

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
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
