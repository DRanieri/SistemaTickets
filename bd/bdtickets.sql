/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : bdtickets

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 07/11/2022 21:05:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Telefonia');
INSERT INTO `categorias` VALUES (2, 'Impresora');
INSERT INTO `categorias` VALUES (3, 'Notebook');
INSERT INTO `categorias` VALUES (4, 'Facturación');
INSERT INTO `categorias` VALUES (5, 'Carga en Sistema');
INSERT INTO `categorias` VALUES (6, 'Herramientas Google');
INSERT INTO `categorias` VALUES (7, 'Requerimiento');
INSERT INTO `categorias` VALUES (8, 'Alta-Baja Usuario');

-- ----------------------------
-- Table structure for sector_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `sector_usuarios`;
CREATE TABLE `sector_usuarios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sector_usuarios
-- ----------------------------
INSERT INTO `sector_usuarios` VALUES (1, 'Sistemas', NULL);
INSERT INTO `sector_usuarios` VALUES (2, 'Gerencia', NULL);
INSERT INTO `sector_usuarios` VALUES (3, 'Créditos y Cobranzas', NULL);
INSERT INTO `sector_usuarios` VALUES (4, 'E-Commerce', NULL);
INSERT INTO `sector_usuarios` VALUES (5, 'Capital Humano', NULL);
INSERT INTO `sector_usuarios` VALUES (6, 'Inmobiliaria', NULL);
INSERT INTO `sector_usuarios` VALUES (7, 'Marketing', NULL);
INSERT INTO `sector_usuarios` VALUES (8, 'Administración', NULL);

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) NULL DEFAULT NULL,
  `fk_categoria` int(11) NULL DEFAULT NULL,
  `asunto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` enum('Asignado','Rechazado','Cerrado') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'Asignado',
  `fecha_creacion` date NULL DEFAULT NULL,
  `fecha_finalizacion` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_usuario`(`fk_usuario`) USING BTREE,
  INDEX `fk_categoria`(`fk_categoria`) USING BTREE,
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`fk_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_sector` int(11) NULL DEFAULT NULL,
  `tipo_usuario` enum('Admin','Usuario') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Usuario',
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default.jpg',
  `status` enum('Activo','Inactivo') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_sector`(`fk_sector`) USING BTREE,
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_sector`) REFERENCES `sector_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 1, 'Admin', 'RICARDO CHANTADA', 'RICARDOC', '6019_Richi', 'soporte@grupoadrianmercado.com', 'avatar5.png', 'Activo');
INSERT INTO `usuarios` VALUES (2, NULL, 'Admin', 'Diego Ranieri', 'diegor', '6019_Drani', 'dranieri@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (3, NULL, 'Usuario', 'Walter Sosa', 'walter', '6019_Walt', '', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (4, 2, 'Usuario', 'Fabian Lescano', 'fabian', '6019_Fabi', 'fabianlescano@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (5, 3, 'Usuario', 'Luis Suarez', 'luis', '6019_Luis', 'luissuarez@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (6, NULL, 'Usuario', 'Mauro Sosa', 'mauro', '6019_Mauro', 'maurososa@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (7, NULL, 'Usuario', 'Lourdes Cagnin', 'lourdes', '6019_Lour', '', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (8, NULL, 'Usuario', 'Juan Cipolat', 'juanc', '6019_Juanc', 'juancipolat@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (9, NULL, 'Usuario', 'Nahuel Esteves', 'nahuel', '6019_Nahu', 'nahuelesteves@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (10, NULL, 'Usuario', 'Jeremías Barreñada', 'jeremias', '6019_Jere', 'jbarrenada@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (11, NULL, 'Usuario', 'Matías Mato', 'matias', '6019_Mati', 'mmato@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (12, NULL, 'Usuario', 'Laura González', 'laura', '6019_Lau', 'lgonzalez@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (13, NULL, 'Usuario', 'Maximiliano Iscaro', 'maxi', '6019_Maxi', 'maximilianoiscaro@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (14, NULL, 'Usuario', 'Gonzalo Farfaglia', 'gonzalo', '6019_Gonza', 'gonzalofarfaglia@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (15, NULL, 'Usuario', 'Lucas Cantini', 'lucas', '6019_Lucas', 'lucascantini@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (16, NULL, 'Usuario', 'Juan Ignacio Oppedisano', 'juani', '6019_Juani', 'joppedisano@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (17, NULL, 'Usuario', 'Nicole Favilla', 'nicole', '6019_Niki', 'nfavilla@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (18, NULL, 'Usuario', 'Vanesa Alderete', 'vanesa', '6019_Vane', '', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (19, NULL, 'Usuario', 'Bárbara Jerez', 'barbara', '6019_Barbi', '', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (20, 8, 'Usuario', 'Lucas Abad', 'lucasabad', '6019_LucaA', 'labad@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (21, NULL, 'Usuario', 'Carla Albano', 'carla', '6019_Carla', 'calbano@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (22, NULL, 'Usuario', 'Daniel Caniza', 'daniel', '6019_Dany', 'dcaniza@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (23, NULL, 'Usuario', 'Amalia Chao', 'amalia', '6019_AChao', 'achao@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (24, NULL, 'Usuario', 'Micaela Chediac', 'micaela', '6019_Mica', '', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (25, NULL, 'Usuario', 'Julieta Rosa', 'julieta', '6019_Juli', '', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (26, NULL, 'Usuario', 'Alejandra De Col', 'alejandra', '6019_Aleja', 'adecol@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (27, NULL, 'Usuario', 'Melisa Fernández', 'melisa', '6019_Meli', 'mfernandez@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (28, NULL, 'Usuario', 'William Abrahan', 'william', '', '', 'default.jpg', 'Inactivo');
INSERT INTO `usuarios` VALUES (29, NULL, 'Usuario', 'Magalí Sacco', 'magali', 'yvolo', '', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (30, NULL, 'Usuario', 'Diego Tosco', 'diego', '6019_Diego', 'dtosco@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (31, NULL, 'Usuario', 'Yanina Dogliotti', 'yanina', '6019_Yani', 'ydogliotti@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (32, NULL, 'Usuario', 'Lorena Julieta Losada', 'Lorena', '6019_Losad', 'llosada@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (33, NULL, 'Usuario', 'Sebastian Carlos Perez', 'Sebastian', '6019_Scper', 'sperez@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (34, NULL, 'Usuario', 'Jesica Telechea', 'Jesica', '6019_Jesic', 'jtelechea@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (35, NULL, 'Usuario', 'Patricio Melgarejo', 'Patricio', '6019_Pato', 'pmelgarejo@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (36, NULL, 'Usuario', 'Esteban De Pascal', 'Esteban', '6019_Epasc', 'edepascal@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (37, NULL, 'Usuario', 'Alejandro Castillo', 'alejandro', '6019_Alex', 'acastillo@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (38, NULL, 'Usuario', 'Matías Ayupe', 'matiasa', '6019_Matia', 'mayupe@grupoadrianmercado.com', 'default.jpg', 'Activo');
INSERT INTO `usuarios` VALUES (39, NULL, 'Usuario', 'Yamila Reschigna', 'yamila', '6019_Yami', 'yreschigna@grupoadrianmercado.com', 'default.jpg', 'Activo');

SET FOREIGN_KEY_CHECKS = 1;
