-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2019 a las 05:15:37
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectobd`
--
CREATE DATABASE IF NOT EXISTS `proyectobd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyectobd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE `auxiliar` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`id`, `nombre`) VALUES
('ACDB', 'Armando Casas De Bareque'),
('AFLR', 'Andrés Felipe Llinás R'),
('DBG', 'Daniel Bonilla Guevara'),
('JCO', 'Juan Carlos Osorio'),
('JDL', 'Juan Diego Lopez'),
('MAC', 'Melissa Alvarez Castro'),
('MES', 'Mario Ernesto Salazar'),
('NFS', 'Neyder Figueroa Sanchez'),
('SPDR', 'Sacarías Piedras Del Río');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cable_red`
--

CREATE TABLE `cable_red` (
  `categoria` varchar(50) DEFAULT NULL,
  `codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `periodo_academico` varchar(20) NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `codigo` double NOT NULL,
  `Profesor_cedula` varchar(30) NOT NULL,
  `Materia_codigo` varchar(30) NOT NULL,
  `Sala_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computador`
--

CREATE TABLE `computador` (
  `sistema_operativo` varchar(30) DEFAULT NULL,
  `gpu` varchar(50) DEFAULT NULL,
  `cpu` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `codigo` varchar(30) NOT NULL,
  `Sala_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_minuta`
--

CREATE TABLE `entrada_minuta` (
  `Fecha_entrada` datetime(6) NOT NULL,
  `fecha_salida` datetime(6) NOT NULL,
  `id` double NOT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `Auxiliar_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `programa` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cedula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implemento`
--

CREATE TABLE `implemento` (
  `observacion` varchar(500) DEFAULT NULL,
  `codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `implemento`
--

INSERT INTO `implemento` (`observacion`, `codigo`) VALUES
('MAC 1', '1'),
('PC 11', '17'),
('PC 12', '18'),
('MAC 2', '2'),
('PC 18', '21'),
('MAC 3', '3 '),
('CABLE DE RED 1', '4'),
('CABLE DE RED 2', '5'),
('CABLE DE RED 3', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac`
--

CREATE TABLE `mac` (
  `Modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(30) NOT NULL,
  `Sala_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_profesor`
--

CREATE TABLE `materia_profesor` (
  `Profesor_cedula` varchar(30) NOT NULL,
  `Materia_codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cedula` varchar(30) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `fecha_devolucion` datetime(6) DEFAULT NULL,
  `fecha_prestamo` datetime(6) DEFAULT NULL,
  `id` double NOT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `Auxiliar_id` varchar(10) NOT NULL,
  `Persona_cedula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_implemento`
--

CREATE TABLE `prestamo_implemento` (
  `Prestamo_id` double NOT NULL,
  `Implemento_codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `cedula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` double NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `periodo_academico` varchar(30) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `Auxiliar_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`) VALUES
(2, 'admin', 'admin', 'admin'),
(3, 'user', 'user', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cable_red`
--
ALTER TABLE `cable_red`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `Clase_Materia_Profesor_FK` (`Profesor_cedula`,`Materia_codigo`),
  ADD KEY `Clase_Sala_FK` (`Sala_codigo`);

--
-- Indices de la tabla `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `Computador_Sala_FK` (`Sala_codigo`);

--
-- Indices de la tabla `entrada_minuta`
--
ALTER TABLE `entrada_minuta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Entrada_minuta_Auxiliar_FK` (`Auxiliar_id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `implemento`
--
ALTER TABLE `implemento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `mac`
--
ALTER TABLE `mac`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `Mac_Sala_FK` (`Sala_codigo`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  ADD PRIMARY KEY (`Profesor_cedula`,`Materia_codigo`),
  ADD KEY `Materia_FK` (`Materia_codigo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Prestamo_Auxiliar_FK` (`Auxiliar_id`),
  ADD KEY `Prestamo_Persona_FK` (`Persona_cedula`);

--
-- Indices de la tabla `prestamo_implemento`
--
ALTER TABLE `prestamo_implemento`
  ADD PRIMARY KEY (`Prestamo_id`,`Implemento_codigo`),
  ADD KEY `Implemento_FK` (`Implemento_codigo`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Turno_Auxiliar_FK` (`Auxiliar_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cable_red`
--
ALTER TABLE `cable_red`
  ADD CONSTRAINT `Cable_red_Implemento_FK` FOREIGN KEY (`codigo`) REFERENCES `implemento` (`codigo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `Clase_Materia_Profesor_FK` FOREIGN KEY (`Profesor_cedula`,`Materia_codigo`) REFERENCES `materia_profesor` (`Profesor_cedula`, `Materia_codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `Clase_Sala_FK` FOREIGN KEY (`Sala_codigo`) REFERENCES `sala` (`codigo`);

--
-- Filtros para la tabla `computador`
--
ALTER TABLE `computador`
  ADD CONSTRAINT `Computador_Implemento_FK` FOREIGN KEY (`codigo`) REFERENCES `implemento` (`codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `Computador_Sala_FK` FOREIGN KEY (`Sala_codigo`) REFERENCES `sala` (`codigo`);

--
-- Filtros para la tabla `entrada_minuta`
--
ALTER TABLE `entrada_minuta`
  ADD CONSTRAINT `Entrada_minuta_Auxiliar_FK` FOREIGN KEY (`Auxiliar_id`) REFERENCES `auxiliar` (`id`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `Estudiante_Persona_FK` FOREIGN KEY (`cedula`) REFERENCES `persona` (`cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mac`
--
ALTER TABLE `mac`
  ADD CONSTRAINT `Mac_Implemento_FK` FOREIGN KEY (`codigo`) REFERENCES `implemento` (`codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `Mac_Sala_FK` FOREIGN KEY (`Sala_codigo`) REFERENCES `sala` (`codigo`);

--
-- Filtros para la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  ADD CONSTRAINT `Materia_FK` FOREIGN KEY (`Materia_codigo`) REFERENCES `materia` (`codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `Profesor_FK` FOREIGN KEY (`Profesor_cedula`) REFERENCES `profesor` (`cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `Prestamo_Auxiliar_FK` FOREIGN KEY (`Auxiliar_id`) REFERENCES `auxiliar` (`id`),
  ADD CONSTRAINT `Prestamo_Persona_FK` FOREIGN KEY (`Persona_cedula`) REFERENCES `persona` (`cedula`);

--
-- Filtros para la tabla `prestamo_implemento`
--
ALTER TABLE `prestamo_implemento`
  ADD CONSTRAINT `Implemento_FK` FOREIGN KEY (`Implemento_codigo`) REFERENCES `implemento` (`codigo`),
  ADD CONSTRAINT `Prestamo_FK` FOREIGN KEY (`Prestamo_id`) REFERENCES `prestamo` (`id`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `Profesor_Persona_FK` FOREIGN KEY (`cedula`) REFERENCES `persona` (`cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `Turno_Auxiliar_FK` FOREIGN KEY (`Auxiliar_id`) REFERENCES `auxiliar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
