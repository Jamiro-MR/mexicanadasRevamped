-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2022 a las 23:42:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mexicanadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `id_privileges` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `autor`, `id_privileges`, `email`, `password`) VALUES
(1, 'Super User', 1, 'mmexicanadas@gmail.com', '$2y$10$Ny38406sxj8e6Pwya/GwSuGy93sz0iJbSAJQ3h53N5FngS8PKUsve'),
(15, 'prueba1', 2, 'kasd@gmail.com', '$2y$10$Ny38406sxj8e6Pwya/GwSuGy93sz0iJbSAJQ3h53N5FngS8PKUsve'),
(16, 'juan pablo', 2, 'preuba@gmail.com', '$2y$10$88nDx7yOHXLQ.N.15kedNe42VF7iT3rRE/9G75ryUKoknnIq8G71.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'politica'),
(2, 'tecnologia'),
(3, 'deportes'),
(4, 'cultural');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `datecom` datetime NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `content`) VALUES
(1, 'juan pablo', 'jchipres@ucol.mx', 'Me gusta mucho su blog web de noticias.'),
(2, 'juan', 'dsnfsdjk@hotmail.com', 'tiene un problema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `autorid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(511) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `link3` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `autorid`, `title`, `description`, `content`, `link1`, `link2`, `link3`, `image`, `created_at`, `status`, `category_id`) VALUES
(15, 1, '“No pasa nada”: AMLO minimiza retén con hombres armados en Badiraguato', 'El presidente López Obrador señaló que “No pasa nada, no pasó nada afortunadamente” sobre el retén donde hombres armados detuvieron al convoy de la prensa que cubre la gira presidencial.', 'El presidente Andrés Manuel López Obrador minimizó el retén integrado por un grupo de 10 personas armadas instalado en la carretera Badiraguato-Guadalupe y Calvo, en el llamado “Triángulo Dorado”.\r\n“No pasa nada, no pasó nada afortunadamente”, dijo el Mandatario en breve entrevista en las inmediaciones de la Presa Picachos de este municipio.\r\nAyer el presidente López Obrador realizó un sobrevuelo para supervisar el avance de la construcción de la carretera en plena Sierra Occidental que conectará 10 municipios de Sinaloa, Durango y Chihuahua.\r\n“-¿Del incidente de ayer de los compañeros, supo algo de este retén”?, se le preguntó.\r\n\r\n-“Si, si, hoy en la mañana, no pasa nada, no pasó nada afortunadamente”.\r\n\r\nEl presidente López Obrador sobrevoló la presa Picachos y por la tarde supervisará los avances de la construcción de la presa Santa María.', 'https://www.eluniversal.com.mx/nacion/amlo-no-pasa-nada-minimiza-reten-con-hombres-armados-en-badiraguato', 'https://www.animalpolitico.com/2022/05/hombres-armados-montan-reten-sinaloa-visita-de-amlo/', 'https://www.noroeste.com.mx/culiacan/en-cobertura-de-gira-presidencial-hombres-armados-detienen-a-la-prensa-en-badiraguato-EF2214327', '../uploads/d985bf34c2.jpg', '2022-05-28', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits`
--

CREATE TABLE `visits` (
  `calendar` varchar(10) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visits`
--

INSERT INTO `visits` (`calendar`, `ip`, `page`, `url`) VALUES
('2022-05-25', '::1', 'Cultura: Mexicanadas', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Cultura: Mexicanadas', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Cultura: Mexicanadas', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Cultura: Mexicanadas', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Cultura: Mexicanadas', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Cultura: Mexicanadas', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Inicio', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Tecnología', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-25', '::1', 'Mexicanadas: Deporte', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-25', '::1', 'Mexicanadas: Deporte', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Tecnología', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-25', '::1', 'Mexicanadas: Deporte', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-25', '::1', 'Mexicanadas: Deporte', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-25', '::1', 'Mexicanadas: Deporte', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Tecnología', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Tecnología', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php#'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php#'),
('2022-05-25', '::1', 'Mexicanadas: Politica', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php#'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-25', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Tecnologia', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-26', '::1', 'Mexicanadas: Deportes', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Tecnologia', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-26', '::1', 'Mexicanadas: Deportes', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Tecnologia', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Tecnologia', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Deportes', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Tecnologia', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionTecnologia.php'),
('2022-05-26', '::1', 'Mexicanadas: Deportes', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionDeportes.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionCultural.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php'),
('2022-05-26', '::1', 'Mexicanadas: Cultura', 'http://localhost/WebBlogNoticias-Mexicanadas/php/seccionPolitica.php');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `autor` (`autorid`);

--
-- Indices de la tabla `visits`
--
ALTER TABLE `visits`
  ADD KEY `indice_calendar` (`calendar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `autor` FOREIGN KEY (`autorid`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
