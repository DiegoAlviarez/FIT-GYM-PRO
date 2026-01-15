-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2026 a las 19:27:40
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
-- Base de datos: `proyecto_fitgym`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_socio_con_membresia` (IN `p_nombres` VARCHAR(100), IN `p_apellidos` VARCHAR(100), IN `p_ci` VARCHAR(20), IN `p_telefono` VARCHAR(20), IN `p_email` VARCHAR(100), IN `p_id_plan` INT, IN `p_tipo_plan_nombre` VARCHAR(50))   BEGIN
    DECLARE v_id_membresia INT;
    DECLARE v_meses_a_sumar INT;

    -- 1. Lógica de fechas según el ID del plan
    SET v_meses_a_sumar = CASE p_id_plan
        WHEN 3 THEN 3   -- Trimestral
        WHEN 4 THEN 6   -- Semestral
        WHEN 5 THEN 12  -- Anualidad Regular
        WHEN 8 THEN 12  -- Anualidad Premium
        ELSE 1          -- Otros
    END;

    -- 2. Crear la membresía
    INSERT INTO membresias (id_plan, fecha_inicio, fecha_fin, estado) 
    VALUES (
        p_id_plan, 
        CURDATE(), 
        DATE_ADD(CURDATE(), INTERVAL v_meses_a_sumar MONTH), 
        'activa'
    );

    -- 3. Capturar el ID de membresía
    SET v_id_membresia = LAST_INSERT_ID();

    -- 4. Insertar socio con la columna tipo_plan
    INSERT INTO socios (
        nombres, 
        apellidos, 
        ci, 
        telefono, 
        email, 
        tipo_plan,      -- Nombre corregido aquí
        id_membresia, 
        es_titular, 
        fecha_registro, 
        estado_actual
    ) 
    VALUES (
        p_nombres, 
        p_apellidos, 
        p_ci, 
        p_telefono, 
        p_email, 
        p_tipo_plan_nombre, 
        v_id_membresia, 
        TRUE, 
        CURDATE(), 
        'activo'
    );
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id` int(10) NOT NULL COMMENT 'Identificador Único',
  `nombre_area` varchar(256) NOT NULL COMMENT 'Nombre del área ',
  `descripcion` varchar(256) NOT NULL COMMENT 'Descripción del área',
  `imagen` varchar(256) NOT NULL COMMENT 'Imagen del area'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `id` int(10) NOT NULL COMMENT 'Identificador Único',
  `nombres` varchar(256) NOT NULL COMMENT 'Nombre del instructor',
  `apellidos` varchar(256) NOT NULL COMMENT 'Apellido del instructor',
  `numero_telefonico` varchar(20) DEFAULT NULL,
  `habilidades` varchar(256) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `horario_disponibilidad` varchar(100) DEFAULT NULL,
  `fotos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instructores`
--

INSERT INTO `instructores` (`id`, `nombres`, `apellidos`, `numero_telefonico`, `habilidades`, `descripcion`, `horario_disponibilidad`, `fotos`) VALUES
(1, 'Ana', 'Rodriguez', '04125478942', 'Certificacion NSCA, CrossFit Nivel 2, Experto TRX', 'Especialista en desarrollo de fuerza y acondicionamiento fisico', 'Lun - Vie: 7am - 12pm', 'sin_foto.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresias`
--

CREATE TABLE `membresias` (
  `id_membresia` int(11) NOT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` enum('activa','vencida','cancelada') DEFAULT 'activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `membresias`
--

INSERT INTO `membresias` (`id_membresia`, `id_plan`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
(12, 2, '2026-01-11', '2026-02-11', 'activa'),
(13, 1, '2026-01-11', '2026-02-11', 'activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id_plan` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_mensual` decimal(10,2) NOT NULL,
  `capacidad_maxima` int(11) NOT NULL DEFAULT 1,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `nombre`, `precio_mensual`, `capacidad_maxima`, `descripcion`) VALUES
(1, 'Plan Amigos 2x1', 50.00, 2, 'Pagan 1, entran 2'),
(2, 'Mensualidad Básica', 30.00, 1, 'Plan estándar mensual para 1 persona, 1 mes'),
(3, 'Plan Trimestral', 80.00, 1, 'Plan estándar para 1 persona, 3 meses'),
(4, 'Plan Semestral', 150.00, 1, 'Plan estándar para 1 persona, 6 meses'),
(5, 'Anualidad Regular', 280.00, 1, 'Plan estándar para 1 persona, Acceso por un año completo'),
(6, 'Plan Familiar', 100.00, 4, 'Plan estándar mensual, Acceso para grupo familiar de hasta 4 personas'),
(7, 'Plan Personal Training', 120.00, 1, 'Plan estándar mensual para 1 persona, Incluye entrenador personalizado'),
(8, 'Anualidad Premium', 400.00, 1, 'Acceso total un año + servicios VIP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(10) NOT NULL COMMENT 'Identificador Único',
  `nombres` varchar(100) NOT NULL COMMENT 'Nombres de los socios',
  `apellidos` varchar(100) NOT NULL COMMENT 'Apellidos de los socios',
  `ci` varchar(20) NOT NULL COMMENT 'Cedula de los socios',
  `telefono` varchar(20) NOT NULL COMMENT 'Numero telefónico',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email socios',
  `fecha_registro` date NOT NULL COMMENT 'Fecha del registro',
  `tipo_plan` varchar(50) NOT NULL COMMENT 'Tipo del plan del gimnasio',
  `estado_actual` varchar(20) NOT NULL COMMENT 'Estado del plan',
  `id_membresia` int(11) NOT NULL COMMENT 'Identificador único de membresía',
  `es_titular` tinyint(1) NOT NULL COMMENT 'Titular o Beneficiario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombres`, `apellidos`, `ci`, `telefono`, `email`, `fecha_registro`, `tipo_plan`, `estado_actual`, `id_membresia`, `es_titular`) VALUES
(18, 'Pedro', 'Castillejo', '20888777', '04168889900', NULL, '2026-01-11', 'Mensualidad Básica', 'activo', 12, 1),
(19, 'Emlia', 'Vallejo', '30159685', '04145695585', NULL, '2026-01-11', 'Plan Amigos 2X1', 'activo', 13, 1),
(20, 'Carl', 'Gomez', '33444555', '04245556677', NULL, '2026-01-11', 'Plan Amigos 2X1', 'activo', 13, 0);

--
-- Disparadores `socios`
--
DELIMITER $$
CREATE TRIGGER `tg_validar_capacidad_plan` BEFORE INSERT ON `socios` FOR EACH ROW BEGIN
    DECLARE v_actual INT;
    DECLARE v_max INT;
    DECLARE v_nombre_plan VARCHAR(50);

    -- 1. Contamos cuántos socios ya tienen asignada esta membresía
    SELECT COUNT(*) INTO v_actual 
    FROM socios 
    WHERE id_membresia = NEW.id_membresia;

    -- 2. Buscamos el límite máximo permitido para el plan de esa membresía
    SELECT p.capacidad_maxima, p.nombre INTO v_max, v_nombre_plan
    FROM membresias m
    JOIN planes p ON m.id_plan = p.id_plan
    WHERE m.id_membresia = NEW.id_membresia;

    -- 3. Si ya se alcanzó el máximo, lanzamos un error y bloqueamos el INSERT
    IF v_actual >= v_max THEN
        SET @mensaje = CONCAT('Error: El plan "', v_nombre_plan, '" solo permite ', v_max, ' personas.');
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = @mensaje;
    END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD PRIMARY KEY (`id_membresia`),
  ADD KEY `fk_membresia_plan` (`id_plan`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_socio_membresia_nueva` (`id_membresia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Único';

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Único', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `membresias`
--
ALTER TABLE `membresias`
  MODIFY `id_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Único', AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD CONSTRAINT `fk_membresia_plan` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id_plan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `membresias_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id_plan`);

--
-- Filtros para la tabla `socios`
--
ALTER TABLE `socios`
  ADD CONSTRAINT `fk_socio_membresia` FOREIGN KEY (`id_membresia`) REFERENCES `membresias` (`id_membresia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_socio_membresia_nueva` FOREIGN KEY (`id_membresia`) REFERENCES `membresias` (`id_membresia`) ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `ev_actualizar_vencimientos_diarios` ON SCHEDULE EVERY 1 DAY STARTS '2026-01-15 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    -- 1. Actualizar la tabla de membresías
    UPDATE membresias 
    SET estado = 'vencida' 
    WHERE fecha_fin < CURDATE() AND estado = 'activa';

    -- 2. Sincronizar el estado en la tabla de socios
    UPDATE socios s
    JOIN membresias m ON s.id_membresia = m.id_membresia
    SET s.estado_actual = 'vencido'
    WHERE m.estado = 'vencida' AND s.estado_actual = 'activo';
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
