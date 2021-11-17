-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-11-2021 a las 03:01:25
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `htmotors`
--
CREATE DATABASE IF NOT EXISTS `htmotors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `htmotors`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administran`
--

DROP TABLE IF EXISTS `administran`;
CREATE TABLE IF NOT EXISTS `administran` (
  `CI` int NOT NULL,
  `CI_Adm` int NOT NULL,
  `Cod_Cat` int DEFAULT NULL,
  `Cod_Art` int DEFAULT NULL,
  PRIMARY KEY (`CI_Adm`,`CI`),
  KEY `CI` (`CI`),
  KEY `Cod_Cat` (`Cod_Cat`),
  KEY `Cod_Art` (`Cod_Art`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administran`
--

INSERT INTO `administran` (`CI`, `CI_Adm`, `Cod_Cat`, `Cod_Art`) VALUES
(47896540, 43695472, 1, 1),
(44569542, 48412546, 3, 3),
(36584582, 43695472, 4, 4),
(44569896, 43695472, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE IF NOT EXISTS `articulo` (
  `Cod_Art` int NOT NULL AUTO_INCREMENT,
  `Cod_Cat` int DEFAULT NULL,
  `Nom_art` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Marca` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Modelo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int NOT NULL,
  PRIMARY KEY (`Cod_Art`),
  KEY `Cod_Cat` (`Cod_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`Cod_Art`, `Cod_Cat`, `Nom_art`, `Marca`, `Modelo`, `Descripcion`, `Precio`, `Stock`) VALUES
(1, 1, 'Nombre Prueba', 'MarcaP', 'ModeloP', 'Descripcion', '728.00', 1),
(2, 2, 'Mordaza', 'Volkswagen', 'Gol', 'asdasdasd', '2500.00', 8),
(3, 3, 'Amortiguador', 'Volkswagen', 'Saveiro', 'asdasdasd', '1100.00', 25),
(4, 4, 'Alfombra', 'Chevrolet', 'C 10', 'asdasdasd', '3500.00', 14),
(5, 5, 'Radiador', 'Fiat', 'Palio', 'asdasdasd', '4300.00', 6),
(6, 6, 'Caño de Escape', 'Nissan', 'Tida', 'asdasdasd', '0.00', 0),
(7, 7, 'PruebaSan', 'NiSan', 'Toyota', 'Bueno', '1500.00', 1),
(8, 8, 'PruebaSan', 'NiSan', 'Toyota', 'Bueno', '1500.00', 1),
(9, 9, 'Prueba2', 'Nisan2', 'Yotota', 'Buena Descripcion', '1000.00', 1),
(10, 9, 'Same', 'Sumo', 'Sero', 'Desc', '100.00', 2),
(11, 9, 'Prueba2', 'Nisan2', 'Yotota', 'Buena Descripcion', '1000.00', 1),
(12, 9, 'Same', 'Sumo', 'Sero', 'Desc', '100.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `Cod_Cat` int NOT NULL AUTO_INCREMENT,
  `Nom_Categoria` varchar(15) NOT NULL,
  PRIMARY KEY (`Cod_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Cod_Cat`, `Nom_Categoria`) VALUES
(1, 'Iluminaria'),
(2, 'Frenos'),
(3, 'Suspension'),
(4, 'Accesorios'),
(5, 'Refrigeracion'),
(6, 'Escapes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `CI` int NOT NULL AUTO_INCREMENT,
  `Nom_usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password_cli` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`CI`),
  UNIQUE KEY `Nom_usuario` (`Nom_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CI`, `Nom_usuario`, `Password_cli`) VALUES
(47896540, 'Roberto540', 'Fernandez1345'),
(44569542, 'Danilo542', 'Gallero1578'),
(36584582, 'Alfredo582', 'Retamoza5487'),
(44569896, 'Gregorio896', 'Pergolini2147'),
(47896542, 'Roberto', 'awdadw'),
(47896543, 'Robertoa', 'waddw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `CI` int NOT NULL,
  `Cod_art` int NOT NULL,
  `Cantidad` int NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`CI`,`Cod_art`),
  KEY `Cod_art` (`Cod_art`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`CI`, `Cod_art`, `Cantidad`, `Fecha`) VALUES
(47896540, 1, 2, '2020-11-05'),
(44569542, 3, 4, '2021-08-15'),
(36584582, 4, 4, '2021-08-09'),
(44569896, 5, 1, '2021-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genera`
--

DROP TABLE IF EXISTS `genera`;
CREATE TABLE IF NOT EXISTS `genera` (
  `CI` int NOT NULL,
  `Num_Pedido` int DEFAULT NULL,
  `Cod_Cat` int DEFAULT NULL,
  `Cod_Art` int DEFAULT NULL,
  PRIMARY KEY (`CI`),
  KEY `Num_Pedido` (`Num_Pedido`),
  KEY `Cod_Cat` (`Cod_Cat`),
  KEY `Cod_Art` (`Cod_Art`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genera`
--

INSERT INTO `genera` (`CI`, `Num_Pedido`, `Cod_Cat`, `Cod_Art`) VALUES
(47896540, 1, 1, 1),
(44569542, 3, 3, 3),
(36584582, 2, 4, 4),
(44569896, 4, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `Num_Pedido` int NOT NULL AUTO_INCREMENT,
  `Calle` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ciudad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Numero` int NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Num_Pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Num_Pedido`, `Calle`, `Ciudad`, `Numero`, `Fecha`) VALUES
(1, '18 de Julio', 'Montevideo', 2365, '2021-09-05'),
(2, 'Durazno', 'Progreso', 6854, '2021-08-15'),
(3, 'Dr. Poey', 'Las Piedras', 2879, '2021-08-24'),
(4, 'Aldabalde', 'La Paz', 1245, '2021-09-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `CI` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Apellido` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Calle` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ciudad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Numero` int DEFAULT NULL,
  PRIMARY KEY (`CI`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`CI`, `Nombre`, `Apellido`, `Calle`, `Ciudad`, `Numero`) VALUES
(47896540, 'Roberto', 'Fernandez', '18 de Julio', 'Montevideo', 1345),
(44569542, 'Danilo', 'Gallero', 'Mercedes', 'Montevideo', 1578),
(36584582, 'Alfredo', 'Retamoza', 'Dr. Poey', 'Las Piedras', 5487),
(44569896, 'Gregorio', 'Pergolini', 'La Paz Mendoza', 'La Paz', 2147),
(43695472, 'Alexander', 'Pombo', 'Rivera', 'Las Piedras', 2698),
(48412546, 'Sanchez', 'Manovelcro', 'Durzano', 'Progreso', 236),
(36974158, 'Tota', 'Lugano', 'Wilson Ferreira', 'Carmelo', 1548),
(44569457, 'Gaston', 'Ramirez', 'Interbalnearia', 'Salinas', 3587),
(48412548, 'Roberto', 'dwa', 'wadwd', 'wdawda', 0),
(48412549, 'Robertoa', 'wda', 'wdawad', 'wadadw', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

DROP TABLE IF EXISTS `telefono`;
CREATE TABLE IF NOT EXISTS `telefono` (
  `CI` int NOT NULL,
  `Telefono_cli` int NOT NULL,
  PRIMARY KEY (`CI`,`Telefono_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`CI`, `Telefono_cli`) VALUES
(36584582, 96598741),
(44569542, 93658421),
(44569896, 91698745),
(47896540, 98478965);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `CI_adm` int NOT NULL,
  `Password_adm` varchar(15) NOT NULL,
  PRIMARY KEY (`CI_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CI_adm`, `Password_adm`) VALUES
(43695472, 'Pombo2698'),
(48412546, 'Manovelcro236'),
(36974158, 'Lugano1548'),
(44569542, 'Gaston3587');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
