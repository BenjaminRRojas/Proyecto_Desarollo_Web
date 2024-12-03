SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Crear tabla de usuarios (tabla base)
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `sexo` enum('MUJER','HOMBRE','OTRO') NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_usuario` enum('ESTUDIANTE','DOCENTE','ADMIN') NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Crear tabla de media (tabla independiente)
CREATE TABLE `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(255) NOT NULL,
  `ubicacion_archivo` varchar(255) NOT NULL,
  `tipo_archivo` enum('IMAGEN','VIDEO','DOCUMENTO','AUDIO') NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Crear tabla de cursos (dependiente de usuarios y media)
CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_media` int(11) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_media` (`id_media`),
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Crear tabla de foro (dependiente de usuarios y cursos)
CREATE TABLE `foro` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `contenido` text NOT NULL,
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_comentario_responde` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_curso` (`id_curso`),
  KEY `id_comentario_responde` (`id_comentario_responde`),
  CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `foro_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE,
  CONSTRAINT `foro_ibfk_3` FOREIGN KEY (`id_comentario_responde`) REFERENCES `foro` (`id_comentario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Crear tabla de evaluaciones (dependiente de usuarios y cursos)
CREATE TABLE `evaluaciones` (
  `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `nota1` float NOT NULL,
  `nota2` float NOT NULL,
  `nota3` float NOT NULL,
  `tarea` varchar(255) NOT NULL,
  `promedio` float NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_evaluacion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `evaluaciones_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

COMMIT;