-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2021 a las 05:40:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `srcg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_cliente`
--

CREATE TABLE `citas_cliente` (
  `idcitas_cliente` int(11) NOT NULL,
  `area_servicio` varchar(50) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `comentario` text NOT NULL,
  `url_archivo` varchar(200) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `medio` varchar(50) NOT NULL,
  `estado_cita` int(1) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `Estado_Notificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas_cliente`
--

INSERT INTO `citas_cliente` (`idcitas_cliente`, `area_servicio`, `asunto`, `comentario`, `url_archivo`, `fecha`, `hora`, `medio`, `estado_cita`, `idusuarios`, `Estado_Notificacion`) VALUES
(34, 'Facturación Electrónica', 'Prueba1', 'IHUIYDTDMJL', '', '2021-04-06', '20:45:00', 'Virtual', 1, 305230324, 3),
(35, 'Control Interno', '..hhhh', 'PYUTRDYUIJOJIHGFCX', '', '2021-04-11', '21:49:00', 'Presencial', 1, 305230324, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_cita`
--

CREATE TABLE `detalles_cita` (
  `iddetalles_cita` int(11) NOT NULL,
  `nombre_empleado` varchar(100) NOT NULL,
  `ubicacion_presencial` varchar(50) DEFAULT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `plataforma` varchar(50) DEFAULT NULL,
  `url_reunion` varchar(1000) DEFAULT NULL,
  `idcitas_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles_cita`
--

INSERT INTO `detalles_cita` (`iddetalles_cita`, `nombre_empleado`, `ubicacion_presencial`, `cantidad_personas`, `plataforma`, `url_reunion`, `idcitas_cliente`) VALUES
(10, 'Pepes', '', 13, 'Zoom', 'LLJJVGCFGX', 34),
(11, 'Maria', 'Perez Zeledon', 30, '', '', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idroles`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido1` varchar(25) NOT NULL,
  `apellido2` varchar(25) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `celular_opcional` varchar(50) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `pass_temp` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `apellido1`, `apellido2`, `celular`, `celular_opcional`, `correo`, `password`, `pass_temp`) VALUES
('123456', 'Dario', 'Siles', 'Quesada', '654321', '45456', 'chdario52@gmail.com', '$2y$05$fT0JvEOOHWjGJCe9pwfjcuxLbQ8fQYFGxb6xDKLu1LDJKR6fzRPKy', 0x31),
('305230324', 'Alvaro', 'Siles', 'Quesada', '123456', '545454', 'alvarosiles499@gmail.com', '$2y$05$zu5vm.GLiCDdn4g8cWDumOAsUYuUfHmMHx8hcKhMU8LbDoqu7E5xK', 0x31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `idusuario_rol` int(11) NOT NULL,
  `idroles` int(11) NOT NULL,
  `usuarios_cedula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`idusuario_rol`, `idroles`, `usuarios_cedula`) VALUES
(1, 2, '305230324'),
(2, 3, '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas_cliente`
--
ALTER TABLE `citas_cliente`
  ADD PRIMARY KEY (`idcitas_cliente`);

--
-- Indices de la tabla `detalles_cita`
--
ALTER TABLE `detalles_cita`
  ADD PRIMARY KEY (`iddetalles_cita`),
  ADD KEY `fk_detalles_cita_citas_cliente1_idx` (`idcitas_cliente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`idusuario_rol`),
  ADD KEY `fk_usuario-rol_roles1_idx` (`idroles`),
  ADD KEY `fk_usuario-rol_usuarios1_idx` (`usuarios_cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas_cliente`
--
ALTER TABLE `citas_cliente`
  MODIFY `idcitas_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `detalles_cita`
--
ALTER TABLE `detalles_cita`
  MODIFY `iddetalles_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  MODIFY `idusuario_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_cita`
--
ALTER TABLE `detalles_cita`
  ADD CONSTRAINT `fk_detalles_cita_citas_cliente1` FOREIGN KEY (`idcitas_cliente`) REFERENCES `citas_cliente` (`idcitas_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `fk_usuario-rol_roles1` FOREIGN KEY (`idroles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario-rol_usuarios1` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
