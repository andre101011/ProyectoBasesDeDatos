-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2019 a las 02:34:45
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
  `id` int(11) NOT NULL,
  `iniciales` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`id`, `iniciales`, `nombre`) VALUES
(13, 'AFLR', 'Andres Felipe Llinás Rodríguez'),
(14, 'CAP', 'Carlos Alfonso Pumarejo'),
(15, 'DBG', 'Daniel Bonilla Guevara'),
(16, 'CA', 'Carlos Alfredo '),
(17, 'ACDB', 'Armando Casas De Bareque'),
(18, 'SPDR', 'Sacarías Piedras Del Río'),
(19, 'MAC', 'Melissa Alvarez Castro'),
(20, 'NFS', 'Neyder Figueroa Sanchez'),
(21, 'MES', 'Mario Ernesto Salazar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cable_red`
--

CREATE TABLE `cable_red` (
  `codigo` varchar(30) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cable_red`
--

INSERT INTO `cable_red` (`codigo`, `categoria`) VALUES
('11', '9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `periodo_academico` varchar(20) NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `codigo` int(11) NOT NULL,
  `profesor_cedula` varchar(30) NOT NULL,
  `materia_codigo` varchar(30) NOT NULL,
  `sala_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`periodo_academico`, `dia_semana`, `hora_inicio`, `hora_fin`, `codigo`, `profesor_cedula`, `materia_codigo`, `sala_codigo`) VALUES
('20191', 'Lunes', '04:00:00', '06:00:00', 1, '10315120', '1', 'A');

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
  `sala_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_minuta`
--

CREATE TABLE `entrada_minuta` (
  `fecha_entrada` datetime(6) NOT NULL,
  `fecha_salida` datetime(6) NOT NULL,
  `id` double NOT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `Auxiliar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada_minuta`
--

INSERT INTO `entrada_minuta` (`fecha_entrada`, `fecha_salida`, `id`, `observacion`, `Auxiliar_id`) VALUES
('2019-11-24 00:00:00.000000', '2019-11-24 07:14:20.000000', 1, 'No hizo nada', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `programa` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cedula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`programa`, `estado`, `cedula`) VALUES
('Ing Civil', 'Activo', '014385215'),
('Ing Sistemas', 'Activo', '10315120'),
('Ing Civil', 'Activo', '15623511'),
('Ing Sistemas', 'Activo', '15623516'),
('Ing Sistemas', 'Activo', '18438331'),
('Ing Civil', 'Activo', '184384422'),
('Ing Civil', 'Activo', '18438446'),
('Ing Sistemas', 'Activo', '184385215'),
('Ing Sistemas', 'Activo', '194382422'),
('Ing Sistemas', 'Activo', '22438406'),
('Ing Electrónica', 'Activo', '25315120'),
('Ing Electrónica', 'Activo', '25315199'),
('Ing Electrónica', 'Activo', '25356656'),
('Ing Electrónica', 'Inactivo', '25356684'),
('Ing Electrónica', 'Activo', '25356686'),
('Ing Electrónica', 'Inactivo', '2536156'),
('Ing Sistemas', 'Inactivo', '32435161'),
('Ing Sistemas', 'Activo', '33356156'),
('Ing Civil ', 'Inactivo', '35154435'),
('Ing Sistemas', 'Inactivo', '37658341'),
('Ing Civil', 'Activo', '45438331'),
('Ing Sistemas', 'Activo', '56623516'),
('Ing Civil', 'Inactivo', '613351153'),
('Ing Civil', 'Inactivo', '618644841'),
('Ing Civil', 'Activo', '66315199');

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
('Dañado', '11'),
('', '16'),
('Con rayones', '17'),
('En buen estado', '18'),
('Excelente', '2'),
('En buen estado', '21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac`
--

CREATE TABLE `mac` (
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(30) NOT NULL,
  `sala_codigo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mac`
--

INSERT INTO `mac` (`modelo`, `codigo`, `sala_codigo`) VALUES
('2019', '11', 'C'),
('2017', '17', 'B'),
('2018', '21', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`nombre`, `codigo`) VALUES
('Bases', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_profesor`
--

CREATE TABLE `materia_profesor` (
  `profesor_cedula` varchar(30) NOT NULL,
  `materia_codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia_profesor`
--

INSERT INTO `materia_profesor` (`profesor_cedula`, `materia_codigo`) VALUES
('10315120', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cedula` varchar(30) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cedula`, `nombres`, `apellidos`) VALUES
('014385215', 'Juan Felipe', 'Rodríguez'),
('014666215', 'Juan Andrés', 'Rasca'),
('10315120', 'Jairo Andrés', 'Bucaramanga'),
('10366620', 'Mauricio', 'Cartagena'),
('15623511', 'Santiago', 'Montañéz'),
('15623516', 'Samanta', 'Montañas'),
('1562666', 'Carlos José', 'Santamaría'),
('15626661', 'Carlos Alfonso', 'Montana'),
('18438331', 'Mariana', 'Romero'),
('184384422', 'Daniel', 'Alvarez'),
('18438446', 'Daniela', 'Alvarez'),
('184385215', 'Dany', 'Cuadros'),
('184666215', 'Luis Angel', 'Arboleda'),
('184666422', 'Roberto Carlos', 'Bolivar'),
('18666331', 'Luis Miguel', 'Cantante'),
('18666546', 'Miguel Angel', 'Pintor'),
('194382422', 'Nelson Alfonso', 'Pinzón'),
('196662422', 'Mauricio', 'Rincón'),
('22438406', 'Alvaro Sebastian', 'Yuca'),
('25315120', 'Andrés', 'Roca'),
('25315199', 'Luis Miguel', 'Cardona'),
('25315666', 'Jhon James', 'Bonilla'),
('25356656', 'Camila', 'Grisales'),
('25356684', 'Mauricio', 'Grisales'),
('25356686', 'Manuela', 'Grisales'),
('2536156', 'Daniel', 'Casas'),
('25366686', 'Jessica', 'Grisales'),
('26666686', 'Oscar', 'Figueroa'),
('32435161', 'Manuel', 'Casalles'),
('33356156', 'Camila', 'Paez'),
('35154435', 'Carlos ', 'Rosas'),
('37658341', 'Jhonatan', 'Dominguez'),
('45438331', 'Diana María', 'Lopez'),
('56623516', 'Maria Estefanía ', 'Pulgarín'),
('613351153', 'Manuel', 'Morales'),
('618644841', 'Daniela', 'Pumarejo'),
('66315199', 'Miguel Alfonso', 'Jhonson'),
('66615199', 'Daniel Felipe', 'Cardona'),
('66623511', 'Juana Melissa', 'Nuñez'),
('66638406', 'Andrés Felipe', 'Ospina'),
('66656684', 'Dana María', 'Cañón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `fecha_devolucion` datetime(6) DEFAULT NULL,
  `fecha_prestamo` datetime(6) DEFAULT NULL,
  `id` double NOT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `auxiliar_id` int(11) NOT NULL,
  `persona_cedula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`fecha_devolucion`, `fecha_prestamo`, `id`, `observacion`, `auxiliar_id`, `persona_cedula`) VALUES
('2019-11-24 00:00:00.000000', '2019-11-25 00:00:00.000000', 1, '', 13, '10366620');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_implemento`
--

CREATE TABLE `prestamo_implemento` (
  `prestamo_id` double NOT NULL,
  `implemento_codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo_implemento`
--

INSERT INTO `prestamo_implemento` (`prestamo_id`, `implemento_codigo`) VALUES
(1, '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `cedula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`cedula`) VALUES
('10315120'),
('15623511'),
('15623516'),
('18438331'),
('184384422');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`codigo`) VALUES
('A'),
('B'),
('C'),
('D');

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
  `auxiliar_id` int(11) NOT NULL
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
  ADD KEY `Clase_Materia_Profesor_FK` (`profesor_cedula`,`materia_codigo`),
  ADD KEY `Clase_Sala_FK` (`sala_codigo`);

--
-- Indices de la tabla `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `Computador_Sala_FK` (`sala_codigo`);

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
  ADD KEY `Mac_Sala_FK` (`sala_codigo`) USING BTREE;

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  ADD PRIMARY KEY (`profesor_cedula`,`materia_codigo`),
  ADD KEY `Materia_FK` (`materia_codigo`);

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
  ADD KEY `Prestamo_Auxiliar_FK` (`auxiliar_id`),
  ADD KEY `Prestamo_Persona_FK` (`persona_cedula`);

--
-- Indices de la tabla `prestamo_implemento`
--
ALTER TABLE `prestamo_implemento`
  ADD PRIMARY KEY (`prestamo_id`,`implemento_codigo`),
  ADD KEY `Implemento_FK` (`implemento_codigo`);

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
  ADD KEY `Turno_Auxiliar_FK` (`auxiliar_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `Clase_Materia_Profesor_FK` FOREIGN KEY (`Profesor_cedula`,`Materia_codigo`) REFERENCES `materia_profesor` (`profesor_cedula`, `materia_codigo`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `Mac_Sala_FK` FOREIGN KEY (`sala_codigo`) REFERENCES `sala` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  ADD CONSTRAINT `Materia_FK` FOREIGN KEY (`materia_codigo`) REFERENCES `materia` (`codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `Profesor_FK` FOREIGN KEY (`profesor_cedula`) REFERENCES `profesor` (`cedula`) ON DELETE CASCADE;

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
