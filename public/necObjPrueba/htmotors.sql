-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-11-2021 a las 16:49:19
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
CREATE DATABASE IF NOT EXISTS `htmotors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `htmotors`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administran`
--

DROP TABLE IF EXISTS `administran`;
CREATE TABLE IF NOT EXISTS `administran` (
  `Id_P` int NOT NULL,
  `Id_adm` int NOT NULL,
  `Cod_Cat` int DEFAULT NULL,
  `Cod_Art` int DEFAULT NULL,
  PRIMARY KEY (`Id_adm`,`Id_P`),
  KEY `Id_P` (`Id_P`),
  KEY `Cod_Cat` (`Cod_Cat`),
  KEY `Cod_Art` (`Cod_Art`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administran`
--

INSERT INTO `administran` (`Id_P`, `Id_adm`, `Cod_Cat`, `Cod_Art`) VALUES
(1, 5, 1, 1),
(2, 6, 3, 3),
(3, 7, 4, 4),
(4, 8, 5, 5);

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
  `Precio` int NOT NULL,
  `Imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Stock` int NOT NULL,
  `Estado` enum('activo','inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Cod_Art`),
  KEY `Cod_Cat` (`Cod_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`Cod_Art`, `Cod_Cat`, `Nom_art`, `Marca`, `Modelo`, `Descripcion`, `Precio`, `Imagen`, `Stock`, `Estado`) VALUES
(1, 1, 'Lampara Led', 'Peugeot', '308', 'Carolina', 1500, 'public/imagenes/articulos/lampara.png', 15, NULL),
(2, 2, 'Mordaza', 'Volkswagen', 'Gol', 'asdasdasd', 2500, 'public/imagenes/articulos/lampara.png', 8, NULL),
(3, 3, 'Amortiguador', 'Volkswagen', 'Saveiro', 'asdasdasd', 1100, 'public/imagenes/articulos/amortiguador.png', 25, NULL),
(4, 4, 'Alfombra', 'Chevrolet', 'C 10', 'asdasdasd', 3500, 'public/imagenes/articulos/lampara.png', 14, NULL),
(5, 5, 'Radiador', 'Fiat', 'Palio', 'asdasdasd', 4300, 'public/imagenes/articulos/radiador.png', 6, NULL),
(6, 6, 'Caño de Escape', 'Nissan', 'Tida', 'asdasdasd', 2700, 'public/imagenes/articulos/lampara.png', 3, NULL),
(7, 7, 'Nombre Prueba', 'MarcaP', 'ModeloP', 'Buena Descripcion', 1000, 'public/imagenes/articulos/lampara.png', 1, 'activo'),
(8, 8, 'Nombre Prueba', 'MarcaP', 'ModeloP', 'Buena Descripcion', 1000, 'public/imagenes/articulos/lampara.png', 1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `Cod_Cat` int NOT NULL AUTO_INCREMENT,
  `Nom_Categoria` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Cod_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `Id_P` int NOT NULL AUTO_INCREMENT,
  `Nom_usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password_cli` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id_P`),
  UNIQUE KEY `Nom_usuario` (`Nom_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_P`, `Nom_usuario`, `Password_cli`) VALUES
(1, 'Roberto540', 'Fernandez1345'),
(2, 'Danilo542', 'Gallero1578'),
(3, 'Alfredo582', 'Retamoza5487'),
(4, 'Gregorio896', 'Pergolini2147'),
(6, 'Santiago', '26042004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `Id_C` int NOT NULL,
  `Cod_art` int NOT NULL,
  `Cantidad` int NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id_C`,`Cod_art`),
  KEY `Cod_art` (`Cod_art`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`Id_C`, `Cod_art`, `Cantidad`, `Fecha`) VALUES
(1, 1, 2, '2020-11-05'),
(2, 3, 4, '2021-08-15'),
(3, 4, 4, '2021-08-09'),
(4, 5, 1, '2021-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genera`
--

DROP TABLE IF EXISTS `genera`;
CREATE TABLE IF NOT EXISTS `genera` (
  `Id_P` int NOT NULL,
  `Num_Pedido` int DEFAULT NULL,
  `Cod_Cat` int DEFAULT NULL,
  `Cod_Art` int DEFAULT NULL,
  PRIMARY KEY (`Id_P`),
  KEY `Num_Pedido` (`Num_Pedido`),
  KEY `Cod_Cat` (`Cod_Cat`),
  KEY `Cod_Art` (`Cod_Art`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genera`
--

INSERT INTO `genera` (`Id_P`, `Num_Pedido`, `Cod_Cat`, `Cod_Art`) VALUES
(1, 1, 1, 1),
(2, 3, 3, 3),
(3, 2, 4, 4),
(4, 4, 5, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `Id_P` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Apellido` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Calle` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Ciudad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Numero` int DEFAULT NULL,
  PRIMARY KEY (`Id_P`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Id_P`, `Nombre`, `Apellido`, `Calle`, `Ciudad`, `Numero`) VALUES
(1, 'Roberto', 'Fernandez', '18 de Julio', 'Montevideo', 1345),
(2, 'Danilo', 'Gallero', 'Mercedes', 'Montevideo', 1578),
(3, 'Alfredo', 'Retamoza', 'Dr. Poey', 'Las Piedras', 5487),
(4, 'Gregorio', 'Pergolini', 'La Paz Mendoza', 'La Paz', 2147),
(5, 'Alexander', 'Pombo', 'Rivera', 'Las Piedras', 2698),
(6, 'Sanchez', 'Manovelcro', 'Durzano', 'Progreso', 236),
(7, 'Tota', 'Lugano', 'Wilson Ferreira', 'Carmelo', 1548),
(8, 'Gaston', 'Ramirez', 'Interbalnearia', 'Salinas', 3587);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

DROP TABLE IF EXISTS `telefono`;
CREATE TABLE IF NOT EXISTS `telefono` (
  `Id_P` int NOT NULL,
  `Telefono_cli` int NOT NULL,
  PRIMARY KEY (`Id_P`,`Telefono_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`Id_P`, `Telefono_cli`) VALUES
(1, 98478965),
(2, 93658421),
(3, 96598741),
(4, 91698745);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_adm` int NOT NULL,
  `Password_adm` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_adm`, `Password_adm`) VALUES
(5, 'Pombo2698'),
(6, 'Manovelcro236'),
(7, 'Lugano1548'),
(8, 'Gaston3587');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
