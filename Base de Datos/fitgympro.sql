-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2026 a las 09:47:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fitgympro`
--
CREATE DATABASE IF NOT EXISTS `fitgympro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fitgympro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `cupos_max` int(11) DEFAULT 20,
  `id_instructor` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`, `descripcion`, `horario`, `cupos_max`, `id_instructor`, `created_at`) VALUES
(1, 'Funcional', 'Circuitos de alta intensidad para mejorar fuerza y agilidad.', 'Lunes y Miércoles 7:00 AM', 20, 1, '2026-02-10 19:56:40'),
(2, 'Bodybuilding', 'Entrenamiento enfocado en hipertrofia y definición muscular.', 'Martes y Jueves 8:00 AM', 15, 2, '2026-02-10 19:56:40'),
(3, 'Yoga', 'Conexión mente-cuerpo a través de posturas y respiración.', 'Lunes y Miércoles 9:00 AM', 12, 3, '2026-02-10 19:56:40'),
(4, 'Spinning', 'Sesión intensa de ciclismo estacionario con ritmo musical.', 'Martes y Jueves 6:00 PM', 10, 4, '2026-02-10 19:56:40'),
(5, 'Boxeo', 'Técnicas de combate y cardio para liberar estrés.', 'Lunes a Viernes 5:00 PM', 15, 5, '2026-02-10 19:56:40'),
(6, 'Zumba', 'Baile aeróbico para quemar calorías de forma divertida.', 'Sábados 9:00 AM', 25, 6, '2026-02-10 19:56:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `fecha_inscripcion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `id_socio`, `id_clase`, `fecha_inscripcion`) VALUES
(1, 58, 1, '2026-02-11 07:03:54'),
(2, 70, 2, '2026-02-11 07:04:06'),
(3, 78, 6, '2026-02-11 07:04:22'),
(4, 85, 3, '2026-02-11 07:04:40'),
(5, 73, 4, '2026-02-11 07:04:53'),
(6, 91, 3, '2026-02-11 07:05:06'),
(7, 97, 5, '2026-02-11 07:06:40'),
(8, 101, 3, '2026-02-11 07:06:57'),
(9, 110, 6, '2026-02-11 07:07:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `estado_pago` enum('activo','vencido') DEFAULT NULL,
  `plan` int(11) DEFAULT NULL,
  `socio_principal_id` int(11) DEFAULT NULL,
  `rol` enum('administrador','empleado','instructor','socio') NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `experiencia` text DEFAULT NULL,
  `certificaciones` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `cedula`, `nombre`, `telefono`, `email`, `fecha_pago`, `estado_pago`, `plan`, `socio_principal_id`, `rol`, `clave`, `especialidad`, `horario`, `descripcion`, `biografia`, `experiencia`, `certificaciones`, `foto`) VALUES
(1, '19876543', 'Ana Rodríguez', '0411230001', NULL, NULL, NULL, NULL, NULL, 'instructor', NULL, 'Entrenamiento Funcional', 'Lun - Vie: 7:00am - 8:00pm', 'Especialista en desarrollo de fuerza y acondicionamiento físico.', 'Ana es la encargada de asegurar que el esfuerzo físico de nuestros socios en el gimnasio se vea potenciado por una nutrición inteligente y consciente. Con un enfoque clínico, Ana se especializa en el diseño de planes de alimentación personalizados que no solo buscan la pérdida de grasa o ganancia muscular, sino la optimización de los niveles de energía y la salud metabólica a largo plazo. Dedica gran parte de sus sesiones a educar a los socios sobre cómo mantener un estilo de vida saludable sin dietas restrictivas extremas.', '8 años', 'Certificación NSCA, CrossFit Nivel 2, Experto TRX', '1770797246_a4b676536c65fc36822e.jpg'),
(2, '20548976', 'Miguel Ángel Torres', '04141230002', NULL, NULL, NULL, NULL, NULL, 'instructor', NULL, 'Bodybuilding', 'fgdfgfd', 'Competidor profesional y experto en hipertrofia muscular.', 'Con más de una década dedicada al estudio de la fisiología del ejercicio, Miguel se ha consolidado como el referente de fuerza en nuestro gimnasio. Su enfoque no se limita a levantar pesas; se basa en la programación científica del entrenamiento para maximizar la hipertrofia evitando lesiones. Ha transformado la vida de cientos de personas en Venezuela, guiándolos desde sus primeros pasos hasta niveles competitivos con una disciplina inquebrantable.', '12 años', 'Profesional IFBB, Entrenador ISSA, Nutrición Deportiva', 'instructor2.jpg'),
(3, '22345678', 'Laura Martín', '04141230003', NULL, NULL, NULL, NULL, NULL, 'instructor', NULL, 'Yoga y Pilates', 'sdasdas', 'Maestra certificada enfocada en flexibilidad y bienestar integral.', 'Laura utiliza la sabiduría del Yoga con el método Pilates. Su filosofía de enseñanza se centra en la consciencia corporal, ayudando a los socios a reconectar con su respiración mientras fortalecen la musculatura profunda. Es conocida en el centro de Maiquetía por sus sesiones de meditación guiada y su capacidad para adaptar posturas complejas a cualquier nivel de condición física, promoviendo una salud integral.', '10 años', 'Yoga RYT 500h, Pilates Integral, Instructora Barra', 'instructor3.jpg'),
(4, '18765432', 'David Sánchez', '04141230004', NULL, NULL, NULL, NULL, NULL, 'instructor', NULL, 'Spinning y Cardio', 'fdgdfgdfgfd', 'Instructor dinámico especializado en resistencia cardiovascular.', 'Las clases de David son famosas por su intensidad y su selección musical que mantiene la motivación. Como experto en resistencia cardiovascular, David utiliza métodos de intervalos de alta intensidad (HIIT) para optimizar la quema calórica y mejorar la capacidad pulmonar de sus alumnos. Su carisma y energía son contagiosos, convirtiendo cada sesión de ciclo en un reto personal donde el único límite es la mente del atleta.', '6 años', 'Ciclismo Indoor, Resistencia', 'instructor4.jpg'),
(5, '23456789', 'Carmen López', '04141230005', NULL, NULL, NULL, NULL, NULL, 'instructor', NULL, 'Natación', 'Lun - Viernes', 'Ex-nadadora olímpica, ahora entrenadora de alto rendimiento.', 'Carmen ve el agua como el medio perfecto para el desarrollo físico sin impacto articular. Con una trayectoria que incluye la formación de nadadores juveniles y terapias de rehabilitación acuática, su paciencia y técnica son una virtud. Ella lidera los programas de natación correctiva, asegurándose de que cada brazada sea eficiente, ideal tanto para quienes buscan aprender desde cero como para nadadores que desean mejorar sus tiempos.', '15 años', 'Alto Rendimiento, Técnica de Nado, Salvavidas', 'instructor5.jpg'),
(6, '21654321', 'Roberto García', '04141230006', NULL, NULL, NULL, NULL, NULL, 'instructor', NULL, 'Boxeo & MMA', 'dfsfdsfs', 'Peleador profesional con pasión por enseñar defensa personal.', 'Roberto aporta la disciplina y el rigor estratégico de los deportes de combate a nuestro equipo. Con un pasado como competidor activo en disciplinas combinadas, sus entrenamientos desarrollan agilidad, coordinación y una fuerza explosiva. Más allá del contacto físico, Roberto enseña boxeo como una herramienta de empoderamiento personal y manejo del estrés, enfocándose en la técnica de golpeo, el juego de pies y la resistencia mental necesaria para superar cualquier obstáculo dentro y fuera del ring.', '9 años', 'Cinturón Negro, Defensa Personal, Kickboxing', 'instructor6.jpg'),
(7, '18456789', 'Luis Pérez', '04145551234', 'empleado@fitgympro.com', NULL, NULL, NULL, NULL, 'empleado', '$argon2id$v=19$m=19456,t=2,p=1$YzBkZjEwMGYxMzg2YWZhNWNhNzUyNmYzMDcxODM4ZTY$gWLEuA8xSu5AoxAGuIWhQzb3hSEMXIXsGENDoea4tcY', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '19345678', 'Andrea Gómez', '04146667890', 'admin@fitgympro.com', NULL, NULL, NULL, NULL, 'administrador', '$2y$10$geIQBuAeuRyEE1g78rsC.OhXP2ekiYOxDV3DpBwQCjok9TicmOJIO', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'V-15.234.567', 'Carlos Rodriguez', '0412-1234567', NULL, '2026-02-10', 'activo', 1, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'V-18.987.654', 'Maria Gabriela Perez', '0424-9876543', NULL, '2026-02-09', 'activo', 1, 54, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'V-20.123.456', 'Jose Alejandro Uzcategui', '0416-5554433', NULL, '2026-02-08', 'activo', 1, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'V-22.345.678', 'Andreina Colmenares', '0414-1112233', NULL, '2026-02-11', 'activo', 6, 56, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'V-14.567.890', 'Luis Miguel Garcia', '0412-8889900', NULL, '2026-02-05', 'activo', 6, 56, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'V-25.678.901', 'Paola Valentina Diaz', '0424-7776655', NULL, '2026-02-07', 'activo', 6, 56, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'V-17.890.123', 'Ricardo Jose Blanco', '0416-4443322', NULL, '2026-02-01', 'activo', 1, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'V-21.234.567', 'Daniela Sofia Morales', '0414-2223344', NULL, '2026-02-04', 'activo', 1, 60, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'V-12.345.678', 'Francisco Javier Soler', '0412-6665544', NULL, '2026-02-06', 'activo', 6, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'V-24.567.890', 'Gabriela chavez', '0424-3332211', NULL, '2026-02-03', 'activo', 6, 62, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'V-19.876.543', 'Manuel Enrique Rivas', '0416-9998877', NULL, '2026-01-28', 'activo', 6, 62, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'V-26.789.012', 'Isabella Victoria Landaeta', '0414-1237890', NULL, '2026-02-02', 'activo', 6, 62, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'V-23.456.789', 'Anthony Quijada', '0412-4561230', NULL, '2026-02-09', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'V-10.987.654', 'Carmen Elena Ruiz', '0424-7894561', NULL, '2026-02-05', 'activo', 4, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'V-16.543.210', 'Jesus Alberto Mendez', '0416-3216549', NULL, '2026-01-25', 'activo', 5, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'V-27.654.321', 'Patricia Alejandra Gil', '0414-9873210', NULL, '2026-02-08', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'V-13.210.987', 'Roberto Antonio Sosa', '0412-1597530', NULL, '2026-02-10', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'V-28.123.456', 'Natalia Jimenez', '0424-3571590', NULL, '2026-02-07', 'activo', 1, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'V-20.987.654', 'Samuel David Silva', '0416-2468013', NULL, '2026-02-04', 'activo', 1, 71, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'V-22.111.222', 'Adriana Lucia Torres', '0414-1357902', NULL, '2026-02-01', 'activo', 6, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'V-11.456.789', 'Miguel Angel Torres', '0412-3334455', NULL, '2026-02-10', 'activo', 6, 73, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'V-15.666.777', 'Gustavo Adolfo Infante', '0416-3332211', NULL, '2026-01-05', 'vencido', 6, 73, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'V-19.333.222', 'Yulitza Marcano', '0424-6667788', NULL, '2026-02-05', 'activo', 6, 73, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'V-18.444.333', 'Oscar Eduardo Castillo', '0416-7894562', NULL, '2025-12-28', 'vencido', 4, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'V-13.555.666', 'Ricardo Eloy Gutierrez', '0416-1110099', NULL, '2026-01-25', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'V-19.111.444', 'Luisana Maria Briceño', '0416-7539514', NULL, '2026-01-10', 'vencido', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'V-16.888.999', 'Luz Marina Hernandez', '0414-5556677', NULL, '2026-02-01', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'V-27.444.555', 'Sebastian De Jesus', '0412-0001122', NULL, '2026-01-15', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'V-15.000.111', 'Ramon Eduardo Mendoza', '0414-1234321', NULL, '2025-12-15', 'vencido', 5, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'V-24.222.111', 'Valeria Chacon', '0424-9998877', NULL, '2026-02-08', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'V-10.123.456', 'Carmen Sofia Lugo', '0412-9990001', NULL, '2025-12-20', 'vencido', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'V-21.888.444', 'Yoselin Alejandra Rangel', '0414-7775533', NULL, '2026-01-20', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'V-12.777.888', 'Marcos Aurelio Pineda', '0412-1239874', NULL, '2026-02-07', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'V-11.222.333', 'Jorge Luis Borges', '0424-8881112', NULL, '2026-01-02', 'vencido', 5, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'V-26.111.999', 'Stefany Carolina Leon', '0424-4567891', NULL, '2026-01-30', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'V-23.999.000', 'Genesis Chiquinquira', '0414-1592634', NULL, '2026-02-04', 'activo', 1, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'V-14.888.222', 'Wilmer Jose Granadillo', '0412-7531598', NULL, '2026-02-10', 'activo', 1, 89, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'V-20.555.444', 'Diana Cristina Rojas', '0424-8529631', NULL, '2026-01-18', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'V-17.222.333', 'Fernando Javier Lobo', '0416-1472583', NULL, '2026-01-22', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'V-25.333.111', 'Barbara Nicolle Saavedra', '0414-3691472', NULL, '2026-02-09', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'V-14.222.333', 'Alejandro Magno', '0412-1112233', NULL, '2026-02-05', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'V-10.444.555', 'Beatriz Pinzon', '0424-9990011', NULL, '2025-12-28', 'vencido', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'V-18.777.888', 'Nelson Javier Rivas', '0416-5554433', NULL, '2026-01-20', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'V-25.111.000', 'Corina Smith', '0414-7778899', NULL, '2026-01-05', 'vencido', 4, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'V-12.333.444', 'Daniel Habif', '0412-6665544', NULL, '2026-02-09', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'V-15.999.888', 'Mariangel Ruiz', '0424-3332211', NULL, '2026-01-30', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'V-08.123.456', 'Oscar D Leon', '0416-1112222', NULL, '2025-12-15', 'vencido', 5, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'V-20.444.555', 'Sascha Barboza', '0414-8887766', NULL, '2026-02-01', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'V-17.666.777', 'Edgar Ramirez', '0412-5556677', NULL, '2026-01-15', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'V-26.888.999', 'Deyna Castellanos', '0424-1110000', NULL, '2026-02-10', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'V-07.555.444', 'Gualberto Ibarreto', '0416-9998877', NULL, '2026-01-02', 'vencido', 4, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'V-11.222.111', 'Catherine Fulop', '0414-2223333', NULL, '2026-02-03', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'V-19.555.666', 'Servando Primera', '0412-7778888', NULL, '2026-01-10', 'vencido', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'V-19.555.667', 'Florentino Primera', '0412-7778889', NULL, '2026-01-12', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'V-13.444.222', 'Maite Delgado', '0424-4445555', NULL, '2026-02-07', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'V-09.111.000', 'Jose Luis Rodriguez', '0416-6667777', NULL, '2025-12-20', 'vencido', 7, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'V-14.777.888', 'Karina La Voz', '0414-8889999', NULL, '2026-01-25', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'V-18.222.333', 'Tomas Rincon', '0412-3334444', NULL, '2026-01-29', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'V-21.333.222', 'Greivis Vasquez', '0424-2221111', NULL, '2026-02-08', 'activo', 3, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'V-24.555.666', 'Yulimar Rojas', '0416-4445555', NULL, '2026-02-04', 'activo', 2, NULL, 'socio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

DROP TABLE IF EXISTS `planes`;
CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre_plan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre_plan`) VALUES
(1, 'Promo 2x1 en membresías'),
(2, 'Mensualidad Básica'),
(3, 'Plan Trimestral'),
(4, 'Plan Semestral'),
(5, 'Anualidad Regular'),
(6, 'Plan Familiar (4 personas)'),
(7, 'Plan Personal Training'),
(8, 'Anualidad Premium (Oferta)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

DROP TABLE IF EXISTS `promociones`;
CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `color_clase` varchar(30) NOT NULL,
  `precio_actual` varchar(20) DEFAULT NULL,
  `precio_anterior` varchar(20) DEFAULT NULL,
  `ahorro` varchar(50) DEFAULT NULL,
  `validez` varchar(100) DEFAULT NULL,
  `estado` enum('activa','inactiva') DEFAULT 'activa',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `titulo`, `subtitulo`, `icono`, `color_clase`, `precio_actual`, `precio_anterior`, `ahorro`, `validez`, `estado`, `created_at`) VALUES
(1, 'Clases de Yoga Gratis', 'Primera semana de clases de Yoga y Pilates sin costo', 'fa-regular fa-heart', 'negro', 'GRATIS', '$60', 'Ahorra 100%', 'Para nuevos miembros', 'activa', '2026-02-10 18:18:03'),
(2, '2x1 en Membresías', 'Trae un amigo y ambos obtienen un 50% de descuento', 'fa-solid fa-users', 'azul', '$40', '$80', 'Ahorra 50%', 'Válido hasta fin de mes', 'activa', '2026-02-10 20:34:19'),
(3, 'Pack Personal Training', '5 sesiones de entrenamiento personalizado', 'fa-solid fa-users', 'anaranjado', '$175', '$250', 'Ahorra 30%', 'Tiempo Indefinido, aprovecha ahora', 'activa', '2026-02-10 20:36:03'),
(4, 'Membresía Anual ', 'Paga 10 meses y recibe 12 meses de acceso total', 'fa-regular fa-calendar', 'verde', '$320', '$450', 'Ahorra 30%', 'Disponible todo el año', 'activa', '2026-02-10 20:37:31'),
(5, 'Clase de Prueba HIIT', 'Una clase gratuita de alta intensidad con instructor', 'fa-solid fa-bolt', 'morado', 'GRATIS', '$25', 'Prueba Gratis', 'Solo para nuevos miembros', 'activa', '2026-02-10 20:38:32'),
(6, 'Plan Familiar', 'Hasta 4 miembros de la familia por un solo precio', 'fa-solid fa-users', 'amarillo', '$150', '$160', 'Ahorra 7%', 'Válido en temporada de vacaciones', 'activa', '2026-02-10 20:39:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_instructor` (`id_instructor`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_socio` (`id_socio`),
  ADD KEY `fk_clase` (`id_clase`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `fk_plan` (`plan`),
  ADD KEY `fk_socio_principal` (`socio_principal_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `fk_instructor` FOREIGN KEY (`id_instructor`) REFERENCES `personas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_clase` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_socio` FOREIGN KEY (`id_socio`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_plan` FOREIGN KEY (`plan`) REFERENCES `planes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_socio_principal` FOREIGN KEY (`socio_principal_id`) REFERENCES `personas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
