-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 23:49:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipos` int(11) NOT NULL,
  `nombre_del_equipo` varchar(45) NOT NULL,
  `id_facultad` int(11) NOT NULL,
  `deportes` varchar(45) NOT NULL,
  `finalizada` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipos`, `nombre_del_equipo`, `id_facultad`, `deportes`, `finalizada`) VALUES
(3, 'Economicas FC', 3, 'Futsal', 1),
(4, 'Arte FC', 2, 'Padel', 0),
(5, 'Vete', 4, 'Basquet', 0),
(103, 'Salud', 6, 'Hockey', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id_facultades` int(11) NOT NULL,
  `nombre de facultad` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `año de fundación` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id_facultades`, `nombre de facultad`, `descripcion`, `año de fundación`) VALUES
(1, 'Facultad de Ciencias Exactas', 'Con alumnos de Ingeniería Industrial, Profesorado y Licenciatura en Ciencias Fisicomatemáticas, la Facultad a duras penas fue marcando su historia, con serias dificultades económicas y en virtud del esfuerzo de verdaderos pioneros y emprendedores, historia no muy distinta de la de las demás facultades de la Universidad de Tandil.', 1975),
(2, 'Facultad de Arte', 'En sus estudios de grado ofrece tres carreras: Profesorado y Licenciado en Teatro, Realizador Integral en Artes Audiovisuales; y una oferta de posgrado compuesta por la Maestría en Teatro con mención en Dirección Escénica, Diseño Escénico y Actuación y la Maestría en Arte y Sociedad en Latinoamérica. Enmarcadas en propuestas de Formación Continua, ofrece la Diplomatura Univesitaria en Arte y Tecnología, la Diplomatura Universitaria en Arte para la Transformación Social  y la Diplomatura Universitaria en Estéticas Contemporáneas.', 2022),
(3, 'Facultad de Ciencias Economicas', 'La Facultad de Ciencias Económicas de la UNICEN desarrolla actividades científico-tecnológicas como parte de su misión institucional, procurando alcanzar los máximos estándares de calidad y pertinencia en la investigación y en la transferencia de conocimientos y tecnologías al medio. La investigación se estructura alrededor de núcleos de actividades científico-tecnológicas (NACTs) que agrupan investigadores y asistentes con intereses comunes en torno a un área temática y con capacidad para planificar y ejecutar autónomamente su trabajo.', 1965),
(4, 'Ciencias de Veterinaria', '', 0),
(5, 'Ciencias Humanas', '', 0),
(6, 'Ciencias de Derecho', '', 0),
(7, 'Ciencias de la Salud', '', 0),
(8, 'Ciencias Sociales', '', 0),
(9, 'Ciencias de Ingenieria', '', 0),
(10, 'Ciencias de Agronomia', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `nombre_apellido` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre_apellido`, `email`, `password`) VALUES
(1, 'Magali', 'Magali Anta', 'magali_anta@hotmail.com', '$2y$10$Y5pTQLGRCv4IrhtEcsc0SOgXswIgAzekQS2tGzpAd8l0ZDMrZE25G'),
(2, 'webadmin', 'web 2', 'web@admin', '$2y$10$cErFZvCOYu/JUmL3yzU8jOriFRgYJT5DPUs2Bt8TxyrZh5WdJwaVe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipos`) USING BTREE,
  ADD KEY `id_facultad` (`id_facultad`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id_facultades`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_facultad`) REFERENCES `facultades` (`id_facultades`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
