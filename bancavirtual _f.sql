-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2020 a las 06:28:50
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bancavirtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bv_cliente`
--

CREATE TABLE `bv_cliente` (
  `cli_id` int(11) NOT NULL,
  `cli_num_login` int(11) NOT NULL,
  `cli_num_inco` int(11) NOT NULL,
  `cli_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bv_cliente`
--

INSERT INTO `bv_cliente` (`cli_id`, `cli_num_login`, `cli_num_inco`, `cli_persona`) VALUES
(1, 1, 1, 26),
(25, 47, 5, 38),
(26, 0, 0, 1328),
(27, 0, 0, 1328),
(28, 0, 0, 1329);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bv_credito`
--

CREATE TABLE `bv_credito` (
  `cred_id` int(10) NOT NULL,
  `cred_cantidadc` int(10) NOT NULL,
  `cred_edad` int(10) NOT NULL,
  `cred_vivienda` varchar(10) NOT NULL,
  `cred_trabajoe` varchar(10) NOT NULL,
  `cred_empleo` varchar(10) NOT NULL,
  `cred_proposito` varchar(10) NOT NULL,
  `cred_tipoa` varchar(20) NOT NULL,
  `cred_meses` int(10) NOT NULL,
  `cred_historial` varchar(10) NOT NULL,
  `cred_monto` varchar(10) NOT NULL,
  `cred_tiempoem` varchar(10) NOT NULL,
  `cred_tasa` float NOT NULL,
  `cred_evacasa` varchar(10) NOT NULL,
  `cred_activos` varchar(10) NOT NULL,
  `cli_id` int(10) NOT NULL,
  `gar_id` int(10) NOT NULL,
  `cred_saldo` varchar(10) NOT NULL,
  `cred_estadocivil` varchar(10) NOT NULL,
  `cred_garantia` varchar(10) NOT NULL,
  `cred_estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bv_credito`
--

INSERT INTO `bv_credito` (`cred_id`, `cred_cantidadc`, `cred_edad`, `cred_vivienda`, `cred_trabajoe`, `cred_empleo`, `cred_proposito`, `cred_tipoa`, `cred_meses`, `cred_historial`, `cred_monto`, `cred_tiempoem`, `cred_tasa`, `cred_evacasa`, `cred_activos`, `cli_id`, `gar_id`, `cred_saldo`, `cred_estadocivil`, `cred_garantia`, `cred_estado`) VALUES
(38, 0, 23, 'A152', 'A202', 'A171', 'A40', 'alemana', 12, 'A30', '30000', 'A71', 14.99, '20000', 'A124', 25, 26, 'A61', 'A93', 'A103', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bv_cuenta`
--

CREATE TABLE `bv_cuenta` (
  `cue_ncuenta` int(7) NOT NULL,
  `cue_saldo` double(11,2) NOT NULL,
  `cue_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bv_cuenta`
--

INSERT INTO `bv_cuenta` (`cue_ncuenta`, `cue_saldo`, `cue_fecha_registro`, `cli_id`) VALUES
(1, 14.10, '2020-08-04 03:38:20', 25),
(2, 0.00, '2020-06-11 22:49:08', 26),
(3, 125.00, '2020-07-19 23:39:01', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bv_empleado`
--

CREATE TABLE `bv_empleado` (
  `emp_id` int(11) NOT NULL,
  `emp_cargo` varchar(50) NOT NULL,
  `emp_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bv_empleado`
--

INSERT INTO `bv_empleado` (`emp_id`, `emp_cargo`, `emp_persona`) VALUES
(1, 'CAJERO', 6),
(2, 'CAJERO', 4),
(3, 'JEFE CREDITO', 11),
(4, 'CAJERO', 1327);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bv_persona`
--

CREATE TABLE `bv_persona` (
  `per_id` int(11) NOT NULL,
  `per_cedula` varchar(10) NOT NULL,
  `per_nombre` varchar(200) NOT NULL,
  `per_apellido` varchar(200) NOT NULL,
  `per_direccion` varchar(200) NOT NULL,
  `per_telefono` varchar(10) NOT NULL,
  `per_fecha_nac` date NOT NULL,
  `per_correo` varchar(100) NOT NULL,
  `per_estado_civil` varchar(100) NOT NULL,
  `per_sexo` varchar(50) NOT NULL,
  `per_rol` varchar(50) NOT NULL,
  `per_password` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT ' 	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bv_persona`
--

INSERT INTO `bv_persona` (`per_id`, `per_cedula`, `per_nombre`, `per_apellido`, `per_direccion`, `per_telefono`, `per_fecha_nac`, `per_correo`, `per_estado_civil`, `per_sexo`, `per_rol`, `per_password`) VALUES
(4, '0104796230', 'xavier', 'jarro', 'tio puyo', '0983037178', '1995-03-25', 'xa@banquito.com', 'Casado/a', 'Masculino', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, '0104796233', 'andrea', 'mercado', 'uncovia', '099283848', '1993-03-25', 'andrea@banquito.com', 'Casado/a', 'Femenino', 'usuario', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, '0105885875', 'DAVID', 'AGUIRRE', 'EL CEBOLLAR', '0983037178', '1978-07-07', 'david@banquito.com', 'SOLTERO/A', 'MASCULINO', 'empleado', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, '0104796230', 'VALENTIN', 'OLIVA', 'UPS', '0983037178', '1978-07-07', 'prueba@banquito.com', 'CASADO/A', 'MASCULINO', 'empleado', '81dc9bdb52d04dc20036dbd8313ed055'),
(23, '0105885875', 'UPS', 'JARRO', 'EL CEBOLLAR', '0983037178', '1995-03-25', 'ups@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', 'd0fb3ca22f8eeafbda026bebd7a67530'),
(24, '0105885875', 'MARGOTH', 'AGUIRRE', 'TIO PUYO', '0983037178', '1995-03-25', 'pruebaCon@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '626f8c4b0808c9f88929bd662a404765'),
(25, '1111111111', 'UPS', 'UPS', 'TIO PUYO', '0983037178', '1995-03-25', 'upsNum@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '842184c293be1ce2f25e2e6084310842'),
(26, '2222222222', 'MARGOTH', 'AGUIRRE', 'TIO PUYO', '0983037178', '1995-03-25', '123@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '493b4be8d85e9ba771f28152d8fd89b4'),
(38, '0105662068', 'GABRIEL', 'CHUCHUCA', 'PASAJE NICANOR COBOS', '0969375242', '1997-09-24', 'gabrielchuchuca27@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '42d92e2ad1b0753c0f6eae65ba852d9e'),
(1325, '0107137416', 'Andres', 'Loja', 'casa', '0984890578', '2020-06-02', 'aloja619@gmail.com', 'soltero', 'M', 'usuario', 'enanopavo'),
(1326, '1', '', '', '', '', '0000-00-00', '', '', '', '', ''),
(1327, '0106876642', 'CHRISTIAN', 'CHUCHUCA', 'FERIA', '0981248460', '1992-07-10', 'chis1892@banquito.com', 'SOLTERO/A', 'MASCULINO', 'empleado', '81dc9bdb52d04dc20036dbd8313ed055'),
(1328, '0706680055', 'VINICIO', 'VELETANGA', 'GUABO', '0987451247', '1997-06-19', 'vinicio@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', 'ff0671720346cd372076e2a321a99629'),
(1329, '0706680055', 'VINICIO', 'VELETANGA', 'GUABO', '0987451247', '1997-06-19', 'vinicio@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '0503307644677788e839a89a96ca2350');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bv_registrosacceso`
--

CREATE TABLE `bv_registrosacceso` (
  `reac_id` int(10) NOT NULL,
  `reac_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `reac_tipo` varchar(20) NOT NULL,
  `reac_cueA_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bv_registrosacceso`
--

INSERT INTO `bv_registrosacceso` (`reac_id`, `reac_fecha`, `reac_tipo`, `reac_cueA_id`) VALUES
(11, '2020-06-11 01:49:19', 'EXITOSO', 1),
(12, '2020-06-11 01:49:37', 'EXITOSO', 1),
(13, '2020-06-11 01:50:35', 'FALLIDO', 1),
(14, '2020-06-11 01:51:51', 'EXITOSO', 1),
(15, '2020-06-11 01:57:21', 'EXITOSO', 1),
(16, '2020-06-11 01:57:36', 'FALLIDO', 1),
(17, '2020-06-11 01:58:04', 'EXITOSO', 1),
(18, '2020-06-11 02:04:05', 'EXITOSO', 1),
(19, '2020-06-11 03:15:24', 'EXITOSO', 1),
(20, '2020-06-11 04:11:50', 'EXITOSO', 1),
(21, '2020-06-11 05:10:25', 'EXITOSO', 1),
(22, '2020-06-11 05:13:25', 'EXITOSO', 1),
(23, '2020-06-11 05:19:52', 'EXITOSO', 1),
(24, '2020-06-11 05:22:01', 'EXITOSO', 1),
(25, '2020-06-11 05:33:46', 'EXITOSO', 1),
(26, '2020-06-11 05:54:19', 'EXITOSO', 1),
(27, '2020-06-11 20:59:19', 'EXITOSO', 1),
(28, '2020-06-11 21:28:38', 'EXITOSO', 1),
(29, '2020-06-11 22:46:11', 'EXITOSO', 1),
(30, '2020-07-13 16:26:13', 'EXITOSO', 1),
(31, '2020-07-13 20:12:04', 'FALLIDO', 1),
(32, '2020-07-13 20:12:49', 'FALLIDO', 1),
(33, '2020-07-13 20:12:55', 'FALLIDO', 1),
(34, '2020-07-13 20:15:08', 'EXITOSO', 1),
(35, '2020-07-14 21:13:05', 'EXITOSO', 1),
(36, '2020-07-16 03:42:04', 'EXITOSO', 1),
(37, '2020-07-16 17:17:31', 'EXITOSO', 1),
(38, '2020-07-16 20:39:41', 'EXITOSO', 1),
(39, '2020-07-18 21:06:03', 'EXITOSO', 1),
(40, '2020-07-19 14:21:00', 'EXITOSO', 1),
(41, '2020-07-20 00:31:07', 'EXITOSO', 1),
(42, '2020-07-20 04:42:46', 'EXITOSO', 1),
(43, '2020-07-20 15:48:16', 'EXITOSO', 1),
(44, '2020-07-20 17:58:21', 'EXITOSO', 1),
(45, '2020-08-03 22:10:49', 'EXITOSO', 1),
(46, '2020-08-04 02:30:20', 'EXITOSO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bv_transferencia`
--

CREATE TABLE `bv_transferencia` (
  `tra_id` int(10) NOT NULL,
  `tra_fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tra_monto` double(11,2) NOT NULL,
  `tra_tipo` varchar(250) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `cli_id` int(10) NOT NULL,
  `cue_ncuenta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bv_transferencia`
--

INSERT INTO `bv_transferencia` (`tra_id`, `tra_fecha`, `tra_monto`, `tra_tipo`, `emp_id`, `cli_id`, `cue_ncuenta`) VALUES
(1, '0000-00-00 00:00:00', 10.00, 'Deposito', 10, 10, 10),
(2, '2020-06-10 05:00:00', 125.00, 'Deposito', 25, 25, 10),
(3, '2020-06-10 05:00:00', 105.00, 'Deposito', 25, 25, 10),
(4, '2020-06-10 05:00:00', 5.00, 'retiro', 25, 25, 10),
(5, '2020-06-10 05:00:00', 105.00, 'Deposito', 25, 25, 111111),
(6, '2020-06-10 05:00:00', 130.00, 'Deposito', 25, 25, 1),
(7, '2020-06-10 05:00:00', 10.00, 'Deposito', 25, 25, 1),
(8, '2020-06-10 05:00:00', 100.50, 'Retiro', 25, 25, 1),
(9, '0000-00-00 00:00:00', 12.00, 'Deposito', 25, 25, 1),
(10, '2020-06-10 19:32:10', 11.00, 'Deposito', 25, 25, 1),
(11, '2020-06-10 07:34:00', 2.00, 'Deposito', 25, 25, 1),
(12, '2020-06-10 23:28:38', 7.00, 'Deposito', 25, 25, 1),
(13, '2020-06-10 16:35:56', 50.00, 'Retiro', 25, 38, 1),
(14, '2020-06-10 16:37:56', 0.10, 'Deposito', 25, 25, 1),
(15, '2020-06-10 19:44:05', 1.00, 'Retiro', 0, 25, 1),
(16, '2020-06-10 20:32:58', 1.00, 'Retiro', 0, 25, 1),
(17, '2020-06-10 20:33:44', 1.00, 'Retiro', 0, 25, 1),
(18, '2020-06-10 20:41:23', 1.00, 'Retiro', 0, 25, 1),
(19, '2020-06-10 20:44:59', 1.00, 'Retiro', 0, 25, 1),
(20, '2020-06-10 20:46:56', 2.00, 'Retiro', 0, 25, 1),
(21, '2020-06-10 20:49:12', 1.00, 'Retiro', 0, 25, 1),
(22, '2020-06-10 20:51:10', 1.00, 'Retiro', 0, 25, 1),
(23, '2020-06-10 22:56:16', 0.50, 'Retiro', 0, 25, 1),
(24, '2020-06-10 23:00:53', 0.50, 'Retiro', 0, 25, 1),
(25, '2020-06-10 23:03:44', 0.50, 'Retiro', 0, 25, 1),
(26, '2020-06-10 23:19:22', 0.00, 'Retiro', 4, 25, 1),
(27, '2020-06-11 04:59:33', 2.00, 'Retiro', 4, 25, 1),
(28, '2020-06-11 05:00:33', 3.00, 'Deposito', 4, 25, 1),
(29, '2020-06-11 05:00:48', 1.00, 'Deposito', 4, 25, 1),
(30, '2020-06-11 05:02:09', 1.00, 'Retiro', 4, 25, 1),
(31, '2020-06-11 05:08:32', 1.00, 'Retiro', 4, 25, 1),
(32, '2020-07-13 20:59:20', 50.00, 'Deposito', 1, 28, 3),
(33, '2020-07-13 20:59:34', 60.00, 'Retiro', 1, 28, 3),
(34, '2020-07-14 05:57:26', 50.00, 'Deposito', 1, 28, 3),
(35, '2020-07-19 07:08:32', 40.00, 'Retiro', 3, 28, 3),
(36, '2020-07-19 07:11:04', 0.00, 'Retiro', 3, 28, 3),
(37, '2020-07-19 14:57:33', 0.00, 'Retiro', 3, 28, 3),
(38, '2020-07-19 23:26:09', 50.00, 'Deposito', 3, 28, 3),
(39, '2020-07-19 23:33:41', 100.00, 'Retiro', 3, 28, 3),
(40, '2020-07-19 23:34:59', 100.00, 'Deposito', 3, 28, 3),
(41, '2020-07-19 23:35:17', 75.00, 'Retiro', 3, 28, 3),
(42, '2020-07-19 23:39:01', 150.00, 'Deposito', 3, 28, 3),
(43, '2020-08-04 03:30:43', 1.00, 'Deposito', 4, 25, 1),
(44, '2020-08-04 03:36:05', 1.00, 'Deposito', 4, 25, 1),
(45, '2020-08-04 03:38:20', 1.00, 'Deposito', 4, 25, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bv_cliente`
--
ALTER TABLE `bv_cliente`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `cli_persona` (`cli_persona`);

--
-- Indices de la tabla `bv_credito`
--
ALTER TABLE `bv_credito`
  ADD PRIMARY KEY (`cred_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `gar_id` (`gar_id`);

--
-- Indices de la tabla `bv_cuenta`
--
ALTER TABLE `bv_cuenta`
  ADD PRIMARY KEY (`cue_ncuenta`),
  ADD KEY `bv_cuenta_fk` (`cli_id`);

--
-- Indices de la tabla `bv_empleado`
--
ALTER TABLE `bv_empleado`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_persona` (`emp_persona`);

--
-- Indices de la tabla `bv_persona`
--
ALTER TABLE `bv_persona`
  ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `bv_registrosacceso`
--
ALTER TABLE `bv_registrosacceso`
  ADD PRIMARY KEY (`reac_id`),
  ADD KEY `reac_cueAid` (`reac_cueA_id`);

--
-- Indices de la tabla `bv_transferencia`
--
ALTER TABLE `bv_transferencia`
  ADD PRIMARY KEY (`tra_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bv_cliente`
--
ALTER TABLE `bv_cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `bv_credito`
--
ALTER TABLE `bv_credito`
  MODIFY `cred_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `bv_cuenta`
--
ALTER TABLE `bv_cuenta`
  MODIFY `cue_ncuenta` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bv_empleado`
--
ALTER TABLE `bv_empleado`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bv_persona`
--
ALTER TABLE `bv_persona`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1330;

--
-- AUTO_INCREMENT de la tabla `bv_registrosacceso`
--
ALTER TABLE `bv_registrosacceso`
  MODIFY `reac_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `bv_transferencia`
--
ALTER TABLE `bv_transferencia`
  MODIFY `tra_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bv_cliente`
--
ALTER TABLE `bv_cliente`
  ADD CONSTRAINT `bv_cliente_ibfk_1` FOREIGN KEY (`cli_persona`) REFERENCES `bv_persona` (`per_id`);

--
-- Filtros para la tabla `bv_credito`
--
ALTER TABLE `bv_credito`
  ADD CONSTRAINT `cli_id` FOREIGN KEY (`cli_id`) REFERENCES `bv_cliente` (`cli_id`),
  ADD CONSTRAINT `gar_id` FOREIGN KEY (`gar_id`) REFERENCES `bv_cliente` (`cli_id`);

--
-- Filtros para la tabla `bv_cuenta`
--
ALTER TABLE `bv_cuenta`
  ADD CONSTRAINT `bv_cuenta_fk` FOREIGN KEY (`cli_id`) REFERENCES `bv_cliente` (`cli_id`);

--
-- Filtros para la tabla `bv_empleado`
--
ALTER TABLE `bv_empleado`
  ADD CONSTRAINT `bv_empleado_ibfk_1` FOREIGN KEY (`emp_persona`) REFERENCES `bv_persona` (`per_id`);

--
-- Filtros para la tabla `bv_registrosacceso`
--
ALTER TABLE `bv_registrosacceso`
  ADD CONSTRAINT `reac_cueAid` FOREIGN KEY (`reac_cueA_id`) REFERENCES `bv_cuenta` (`cue_ncuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
