-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 14:53:55
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Telefonia'),
(2, 'Impresora'),
(3, 'Notebook'),
(4, 'Facturación'),
(5, 'Carga en Sistema'),
(6, 'Herramientas Google'),
(7, 'Requerimiento'),
(8, 'Alta-Baja Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_usuarios`
--

CREATE TABLE IF NOT EXISTS `sector_usuarios` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `sector_usuarios`
--

INSERT INTO `sector_usuarios` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Sistemas', NULL),
(2, 'Gerencia', NULL),
(3, 'Créditos y Cobranzas', NULL),
(4, 'E-Commerce', NULL),
(5, 'Capital Humano', NULL),
(6, 'Inmobiliaria', NULL),
(7, 'Marketing', NULL),
(8, 'Administración', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
`id` int(11) NOT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_categoria` int(11) DEFAULT NULL,
  `asunto` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `img` varchar(255) DEFAULT NULL,
  `observaciones` text,
  `status` enum('Asignado','Rechazado','Cerrado') DEFAULT 'Asignado',
  `fecha_creacion` date DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `fk_sector` int(11) DEFAULT NULL,
  `tipo_usuario` enum('Admin','Usuario') NOT NULL DEFAULT 'Usuario',
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT 'default.jpg',
  `status` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `fk_sector`, `tipo_usuario`, `nombre`, `usuario`, `password`, `email`, `img`, `status`) VALUES
(1, 1, 'Admin', 'RICARDO CHANTADA', 'RICARDOC', '6019_Richi', 'soporte@grupoadrianmercado.com', 'avatar5.png', 'Activo'),
(2, NULL, 'Admin', 'Diego Ranieri', 'diegor', '6019_Drani', 'dranieri@grupoadrianmercado.com', '_TIN0536 (1) (1).jpg', 'Activo'),
(3, NULL, 'Usuario', 'Walter Sosa', 'walter', '6019_Walt', '', 'default.jpg', 'Activo'),
(4, 2, 'Usuario', 'Fabian Lescano', 'fabian', '6019_Fabi', 'fabianlescano@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(5, 3, 'Usuario', 'Luis Suarez', 'luis', '6019_Luis', 'luissuarez@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(6, 2, 'Usuario', 'Mauro Sosa', 'mauro', '6019_Mauro', 'maurososa@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(7, NULL, 'Usuario', 'Lourdes Cagnin', 'lourdes', '6019_Lour', '', 'default.jpg', 'Activo'),
(8, 3, 'Usuario', 'Juan Cipolat', 'juanc', '6019_Juanc', 'juancipolat@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(9, 3, 'Usuario', 'Nahuel Esteves', 'nahuel', '6019_Nahu', 'nahuelesteves@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(10, 3, 'Usuario', 'Jeremías Barreñada', 'jeremias', '6019_Jere', 'jbarrenada@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(11, 2, 'Usuario', 'Matías Mato', 'matias', '6019_Mati', 'mmato@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(12, 8, 'Usuario', 'Laura González', 'laura', '6019_Lau', 'lgonzalez@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(13, 4, 'Usuario', 'Maximiliano Iscaro', 'maxi', '6019_Maxi', 'maximilianoiscaro@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(14, 4, 'Usuario', 'Gonzalo Farfaglia', 'gonzalo', '6019_Gonza', 'gonzalofarfaglia@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(15, 4, 'Usuario', 'Lucas Cantini', 'lucas', '6019_Lucas', 'lucascantini@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(16, 4, 'Usuario', 'Juan Ignacio Oppedisano', 'juani', '6019_Juani', 'joppedisano@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(17, 3, 'Usuario', 'Nicole Favilla', 'nicole', '6019_Niki', 'nfavilla@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(18, NULL, 'Usuario', 'Vanesa Alderete', 'vanesa', '6019_Vane', '', 'default.jpg', 'Activo'),
(19, 6, 'Usuario', 'Bárbara Jerez', 'barbara', '6019_Barbi', 'barbarajerez@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(20, 8, 'Usuario', 'Lucas Abad', 'lucasabad', '6019_LucaA', 'labad@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(21, 4, 'Usuario', 'Carla Albano', 'carla', '6019_Carla', 'calbano@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(22, 2, 'Usuario', 'Daniel Caniza', 'daniel', '6019_Dany', 'dcaniza@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(23, 8, 'Usuario', 'Amalia Chao', 'amalia', '6019_AChao', 'achao@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(26, 4, 'Usuario', 'Alejandra De Col', 'alejandra', '6019_Aleja', 'adecol@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(30, 4, 'Usuario', 'Diego Tosco', 'diego', '6019_Diego', 'dtosco@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(31, 4, 'Usuario', 'Yanina Dogliotti', 'yanina', '6019_Yani', 'ydogliotti@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(32, 3, 'Usuario', 'Lorena Julieta Losada', 'Lorena', '6019_Losad', 'llosada@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(33, 3, 'Usuario', 'Sebastian Carlos Perez', 'Sebastian', '6019_Scper', 'sperez@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(34, 4, 'Usuario', 'Jesica Telechea', 'Jesica', '6019_Jesic', 'jtelechea@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(35, 8, 'Usuario', 'Patricio Melgarejo', 'Patricio', '6019_Pato', 'pmelgarejo@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(36, 4, 'Usuario', 'Esteban De Pascal', 'Esteban', '6019_Epasc', 'edepascal@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(37, 8, 'Usuario', 'Alejandro Castillo', 'alejandro', '6019_Alex', 'acastillo@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(38, 4, 'Usuario', 'Matías Ayupe', 'matiasa', '6019_Matia', 'mayupe@grupoadrianmercado.com', 'default.jpg', 'Activo'),
(39, 3, 'Usuario', 'Yamila Reschigna', 'yamila', '6019_Yami', 'yreschigna@grupoadrianmercado.com', 'default.jpg', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sector_usuarios`
--
ALTER TABLE `sector_usuarios`
 ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`id`) USING BTREE, ADD KEY `fk_usuario` (`fk_usuario`) USING BTREE, ADD KEY `fk_categoria` (`fk_categoria`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`) USING BTREE, ADD KEY `fk_sector` (`fk_sector`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `sector_usuarios`
--
ALTER TABLE `sector_usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`fk_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_sector`) REFERENCES `sector_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
