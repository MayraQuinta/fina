-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2019 a las 18:17:48
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instituciones_financieras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE `activo` (
  `id_activo` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `encargado_id_encargado` int(11) NOT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `tiempo_uso` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activo`
--

INSERT INTO `activo` (`id_activo`, `id_tipo`, `id_departamento`, `id_institucion`, `id_usuario`, `encargado_id_encargado`, `correlativo`, `fecha_adquisicion`, `descripcion`, `estado`, `tiempo_uso`, `precio`, `observaciones`) VALUES
(1, 5, 1, 1, 1, 1, '0001', '2018-01-22', 'Buen Uso', 'ACTIVO', 6, 20, 'Camas'),
(2, 5, 1, 1, 1, 1, '0002', '2018-01-22', 'Buen Uso', 'ACTIVO', 6, 20, 'Camas'),
(3, 6, 5, 2, 1, 3, '0003', '2018-01-22', 'Camiones', 'ACTIVO', 0, 15000, 'Adquisicion'),
(4, 7, 5, 3, 1, 2, '0004', '2018-01-20', 'ninguna', 'ACTIVO', 6, 10000, 'ninguna'),
(5, 7, 5, 3, 1, 2, '0005', '2018-01-20', 'ninguna', 'ACTIVO', 6, 10000, 'ninguna'),
(6, 7, 5, 3, 1, 2, '0006', '2018-01-20', 'ninguna', 'ACTIVO', 6, 10000, 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balance_general`
--

CREATE TABLE `balance_general` (
  `id_balance` int(11) NOT NULL,
  `id_persona_juridica` int(11) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `prestable` tinyint(1) DEFAULT NULL,
  `efectivo` float DEFAULT NULL,
  `valor_negociable` float DEFAULT NULL,
  `cuentas_por_cobrar` float DEFAULT NULL,
  `inventarios` float DEFAULT NULL,
  `terrenos` float DEFAULT NULL,
  `edificio_equipo` float DEFAULT NULL,
  `depreciacion_acumulada` float DEFAULT NULL,
  `total_activo_corriente` float DEFAULT NULL,
  `total_activo_pasivo` float DEFAULT NULL,
  `total_activo` float DEFAULT NULL,
  `cuentas_por_pagar` float DEFAULT NULL,
  `documentos_por_pagar` float DEFAULT NULL,
  `total_pasivo_corriente` float DEFAULT NULL,
  `deuda_largo_plazo` float DEFAULT NULL,
  `acciones_comunes` float DEFAULT NULL,
  `ganancias_retenidas` float DEFAULT NULL,
  `total_pasivo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `balance_general`
--

INSERT INTO `balance_general` (`id_balance`, `id_persona_juridica`, `periodo`, `prestable`, `efectivo`, `valor_negociable`, `cuentas_por_cobrar`, `inventarios`, `terrenos`, `edificio_equipo`, `depreciacion_acumulada`, `total_activo_corriente`, `total_activo_pasivo`, `total_activo`, `cuentas_por_pagar`, `documentos_por_pagar`, `total_pasivo_corriente`, `deuda_largo_plazo`, `acciones_comunes`, `ganancias_retenidas`, `total_pasivo`) VALUES
(1, 1, 2017, NULL, 15000, 7200, 34100, 82000, 150000, 54000, 145000, 138300, 59000, 197300, 57000, 13000, 70000, 150000, 110200, 73100, 403300),
(3, 1, 2016, NULL, 16000, 8000, 42200, 50000, 150000, 190000, 3000, 116200, 337000, 453200, 49000, 16000, 65000, 160000, 120, 50200, 275320),
(4, 1, 2015, NULL, 15500, 7300, 35500, 70000, 150000, 185500, 3200, 128300, 332300, 460600, 125000, 52000, 177000, 14000, 5500, 50300, 246800),
(5, 1, 2014, NULL, 1399, 6000, 37000, 51000, 120000, 123000, 120000, 95399, 123000, 218399, 46000, 12000, 58000, 135000, 100000, 60000, 353000),
(6, 2, 2017, NULL, 600, 900, 43500, 35000, 22000, 855000, 33000, 80000, 844000, 924000, 20000, 46000, 66000, 21000, 29000, 24000, 140000),
(7, 2, 2016, NULL, 700, 914, 24000, 40000, 23000, 85000, 30000, 65614, 78000, 143614, 21000, 45000, 66000, 20000, 30000, 22000, 138000),
(8, 2, 2015, NULL, 400, 910, 23000, 42000, 25000, 23000, 35000, 66310, 13000, 79310, 21000, 46000, 67000, 21000, 30000, 25000, 143000),
(9, 2, 2014, NULL, 600, 900, 26000, 43000, 25000, 85000, 38000, 70500, 72000, 142500, 21000, 46000, 67000, 21000, 30000, 22000, 140000),
(10, 3, 2017, NULL, 15000, 7200, 34100, 82000, 200, 300, 400, 138300, 100, 138400, 57000, 13000, 70000, 150000, 110200, 73100, 403300),
(11, 3, 2016, NULL, 15600, 8300, 33100, 79000, 1020, 300, 600, 136000, 720, 136720, 55000, 12000, 67000, 4000, 99000, 70000, 240000),
(12, 3, 2015, NULL, 14400, 6300, 33200, 50000, 1002, 3000, 4000, 103900, 2, 103902, 60000, 12000, 72000, 3000, 412, 900, 76312),
(13, 3, 2014, NULL, 500, 1000, 25000, 45500, 26000, 90000, 38000, 72000, 78000, 150000, 22000, 47000, 69000, 22950, 31500, 26550, 150000),
(14, 4, 2017, NULL, 15000, 7200, 34100, 82000, 150000, 54000, 145000, 138300, 59000, 197300, 57000, 13000, 70000, 150000, 110200, 73100, 403300),
(15, 4, 2016, NULL, 16000, 8000, 42200, 50000, 150000, 190000, 3000, 116200, 337000, 453200, 49000, 16000, 65000, 160000, 120, 50200, 275320),
(16, 4, 2015, NULL, 15500, 7300, 35500, 70000, 150000, 185500, 3200, 128300, 332300, 460600, 125000, 52000, 177000, 14000, 5500, 50300, 246800),
(17, 4, 2014, NULL, 1399, 6000, 37000, 51000, 120000, 123000, 120000, 95399, 123000, 218399, 46000, 12000, 58000, 135000, 100000, 60000, 353000),
(18, 5, 2017, NULL, 600, 900, 43500, 35000, 22000, 855000, 33000, 80000, 844000, 924000, 20000, 46000, 66000, 21000, 29000, 24000, 140000),
(19, 5, 2016, NULL, 700, 914, 24000, 40000, 23000, 85000, 30000, 65614, 78000, 143614, 21000, 45000, 66000, 20000, 30000, 22000, 138000),
(20, 5, 2015, NULL, 400, 910, 23000, 42000, 25000, 23000, 35000, 66310, 13000, 79310, 21000, 46000, 67000, 21000, 30000, 25000, 143000),
(21, 5, 2014, NULL, 600, 900, 26000, 43000, 25000, 85000, 38000, 70500, 72000, 142500, 21000, 46000, 67000, 21000, 30000, 22000, 140000),
(22, 6, 2017, NULL, 15000, 7200, 34100, 82000, 200, 300, 400, 138300, 100, 138400, 57000, 13000, 70000, 150000, 110200, 73100, 403300),
(23, 6, 2016, NULL, 15600, 8300, 33100, 79000, 1020, 300, 600, 136000, 720, 136720, 55000, 12000, 67000, 4000, 99000, 70000, 240000),
(24, 6, 2015, NULL, 14400, 6300, 33200, 50000, 1002, 3000, 4000, 103900, 2, 103902, 60000, 12000, 72000, 3000, 412, 900, 76312),
(25, 6, 2014, NULL, 500, 1000, 25000, 45500, 26000, 90000, 38000, 72000, 78000, 150000, 22000, 47000, 69000, 22950, 31500, 26550, 150000),
(26, 7, 2017, NULL, 10000, 9000, 100, 100, 20, 300, 100, 19200, 220, 19420, 1000, 100, 1100, 300, 300, 1000, 2700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_hipotecario`
--

CREATE TABLE `bien_hipotecario` (
  `id_bien` int(11) NOT NULL,
  `id_persona_natural` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `otros_datos` varchar(45) DEFAULT NULL,
  `anexo` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bien_hipotecario`
--

INSERT INTO `bien_hipotecario` (`id_bien`, `id_persona_natural`, `descripcion`, `ubicacion`, `otros_datos`, `anexo`) VALUES
(1, 1, 'un terreno muy bonito', 'San Miguel', 'no', NULL),
(2, 8, 'Una Casa en la playa', 'San Salvador', 'no', NULL),
(3, 14, 'no es robado', 'san vicente', 'no', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `id_clasificacion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `tiempo_depreciacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`id_clasificacion`, `nombre`, `correlativo`, `tiempo_depreciacion`) VALUES
(1, 'Moviliario y Equipo', '001', 24),
(2, 'Vehiculos', '002', 48),
(3, 'Maquinaria', '003', 60),
(4, 'Edificio', '004', 240),
(5, 'Terrenos', '005', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `correlativo`) VALUES
(1, 'departamento de compras', '0001'),
(2, 'departamento de drogas', '0002'),
(3, 'departamento de anfetamna', '0003'),
(4, 'otro departamento', '0004'),
(5, 'Construcion', '0005'),
(6, 'finanzas', '0006');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `id_encargado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `dui` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`id_encargado`, `nombre`, `apellido`, `dui`) VALUES
(1, 'pedro', 'martinez', '4534534534'),
(2, 'Raul ', 'Gomez', '23232323-2'),
(3, 'Fabian', 'Flores', '32323232-3'),
(4, 'boris', 'mendoza', '12336655-8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_resultado`
--

CREATE TABLE `estado_resultado` (
  `id_estado` int(11) NOT NULL,
  `id_persona_juridica` int(11) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `prestable` tinyint(1) DEFAULT NULL,
  `ingreso_ventas` float DEFAULT NULL,
  `costo_venta` float DEFAULT NULL,
  `utilidad_bruta` float DEFAULT NULL,
  `gastos_operativos` float DEFAULT NULL,
  `gasto_venta` float DEFAULT NULL,
  `gasto_administrativo` float DEFAULT NULL,
  `gasto_arrendamiento` float DEFAULT NULL,
  `gasto_depreciacion` float DEFAULT NULL,
  `total_gasto_operativo` float DEFAULT NULL,
  `utlidad_operativa` float DEFAULT NULL,
  `gasto_interes` float DEFAULT NULL,
  `utilidad_antes_impuestos` float DEFAULT NULL,
  `impuestos` float DEFAULT NULL,
  `utilidad_neta` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_resultado`
--

INSERT INTO `estado_resultado` (`id_estado`, `id_persona_juridica`, `periodo`, `prestable`, `ingreso_ventas`, `costo_venta`, `utilidad_bruta`, `gastos_operativos`, `gasto_venta`, `gasto_administrativo`, `gasto_arrendamiento`, `gasto_depreciacion`, `total_gasto_operativo`, `utlidad_operativa`, `gasto_interes`, `utilidad_antes_impuestos`, `impuestos`, `utilidad_neta`) VALUES
(1, 1, 2017, NULL, 600000, 460000, 140000, NULL, 300, 10000, 20000, 30000, 60300, 79700, 10000, 69700, 20910, 48790),
(2, 1, 2016, NULL, 500000, 32300, 467700, NULL, 12300, 15000, 3000, 24000, 54300, 413400, 10000, 403400, 121020, 282380),
(3, 1, 2016, NULL, 500000, 32300, 467700, NULL, 12300, 15000, 3000, 24000, 54300, 413400, 10000, 403400, 121020, 282380),
(4, 1, 2015, NULL, 550000, 400000, 150000, NULL, 14000, 17000, 400, 18000, 49400, 100600, 13300, 87300, 26190, 61110),
(5, 1, 2014, NULL, 540000, 345000, 195000, NULL, 3000, 25000, 30000, 2000, 60000, 135000, 6000, 129000, 38700, 90300),
(6, 2, 2017, NULL, 155000, 105000, 50000, NULL, 15000, 7000, 900, 8000, 30900, 19100, 5000, 14100, 4230, 9870),
(7, 2, 2016, NULL, 140000, 102000, 38000, NULL, 13000, 12000, 15000, 9000, 49000, -11000, 400, 0, 0, 0),
(8, 2, 2015, NULL, 150000, 100000, 50000, NULL, 15000, 9000, 900, 9000, 33900, 16100, 5000, 11100, 3330, 7770),
(9, 2, 2014, NULL, 155000, 103000, 52000, NULL, 55000, 9000, 900, 8500, 73400, -21400, 4000, 0, 0, 0),
(10, 3, 2017, NULL, 600000, 460000, 140000, NULL, 10000, 10000, 10000, 200, 30200, 109800, 200, 109600, 32880, 76720),
(11, 3, 2016, NULL, 630000, 440000, 190000, NULL, 20000, 10000, 35000, 100, 65100, 124900, 400, 124500, 37350, 87150),
(12, 3, 2015, NULL, 700000, 44000, 656000, NULL, 320, 12300, 4450, 12345, 29415, 626585, 8765, 617820, 185346, 432474),
(13, 3, 2014, NULL, 160000, 106000, 54000, NULL, 16000, 10000, 1000, 10000, 37000, 17000, 6100, 10900, 3270, 7630),
(14, 4, 2017, NULL, 600000, 460000, 140000, NULL, 300, 10000, 20000, 30000, 60300, 79700, 10000, 69700, 20910, 48790),
(15, 4, 2016, NULL, 500000, 32300, 467700, NULL, 12300, 15000, 3000, 24000, 54300, 413400, 10000, 403400, 121020, 282380),
(16, 4, 2016, NULL, 500000, 32300, 467700, NULL, 12300, 15000, 3000, 24000, 54300, 413400, 10000, 403400, 121020, 282380),
(17, 4, 2015, NULL, 550000, 400000, 150000, NULL, 14000, 17000, 400, 18000, 49400, 100600, 13300, 87300, 26190, 61110),
(18, 4, 2014, NULL, 540000, 345000, 195000, NULL, 3000, 25000, 30000, 2000, 60000, 135000, 6000, 129000, 38700, 90300),
(19, 5, 2017, NULL, 155000, 105000, 50000, NULL, 15000, 7000, 900, 8000, 30900, 19100, 5000, 14100, 4230, 9870),
(20, 5, 2016, NULL, 140000, 102000, 38000, NULL, 13000, 12000, 15000, 9000, 49000, -11000, 400, 0, 0, 0),
(21, 5, 2015, NULL, 150000, 100000, 50000, NULL, 15000, 9000, 900, 9000, 33900, 16100, 5000, 11100, 3330, 7770),
(22, 5, 2014, NULL, 155000, 103000, 52000, NULL, 55000, 9000, 900, 8500, 73400, -21400, 4000, 0, 0, 0),
(23, 6, 2017, NULL, 600000, 460000, 140000, NULL, 10000, 10000, 10000, 200, 30200, 109800, 200, 109600, 32880, 76720),
(24, 6, 2016, NULL, 630000, 440000, 190000, NULL, 20000, 10000, 35000, 100, 65100, 124900, 400, 124500, 37350, 87150),
(25, 6, 2015, NULL, 700000, 44000, 656000, NULL, 320, 12300, 4450, 12345, 29415, 626585, 8765, 617820, 185346, 432474),
(26, 6, 2014, NULL, 160000, 106000, 54000, NULL, 16000, 10000, 1000, 10000, 37000, 17000, 6100, 10900, 3270, 7630),
(27, 7, 2017, NULL, 4000, 20, 3980, NULL, 20, 2, 20, 20, 62, 3918, 20, 3898, 1169.4, 2728.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente_juridico`
--

CREATE TABLE `expediente_juridico` (
  `id_prestamo` int(11) NOT NULL,
  `id_persona_juridica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `expediente_juridico`
--

INSERT INTO `expediente_juridico` (`id_prestamo`, `id_persona_juridica`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(10, 1),
(17, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente_natural`
--

CREATE TABLE `expediente_natural` (
  `persona_natural` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `expediente_natural`
--

INSERT INTO `expediente_natural` (`persona_natural`, `id_prestamo`) VALUES
(5, 11),
(1, 12),
(2, 13),
(6, 14),
(8, 15),
(11, 16),
(14, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiador`
--

CREATE TABLE `fiador` (
  `id_fiador` int(11) NOT NULL,
  `id_persona_natural` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(254) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `lugar_trabajo` text,
  `telefono` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fiador`
--

INSERT INTO `fiador` (`id_fiador`, `id_persona_natural`, `nombre`, `apellido`, `direccion`, `dui`, `nit`, `correo`, `lugar_trabajo`, `telefono`) VALUES
(4, 5, 'Jenniffer Joanna', 'Abarca', 'Calle Agustin Lara No. 69-B Col. Ex-Normal Tuxtepec', '45345345-3', '9595-040540-505', 'juribe@idiomas.udea.edu.co', 'San Vicente', '2449-7352'),
(5, 2, 'Deyvis Antonio', 'Ayala Gomez ', 'Av. Independencia No. 1457 Col.La Piragua Tuxtepec', '34534534-5', '3453-453454-353', 'aguevara@idiomas.udea.edu.com', 'San Miguel', '3453-4534'),
(6, 6, 'Mirian Mabel', 'Cornejo Portillo', 'Benito Juarez 25 Centro', '32423432-4', '2342-342343-243', 'vivian_981@yahoo.com', 'Cojute', '3432-4334'),
(7, 11, 'Oscar Adonay', 'Franco Alvarado', 'Boulevard Benito Juarez Esq. Independencia La Piragua', '45546546-4', '3423-432456-877', 'ashida_barak@yahoo.com', 'MPULIDO@LATINMAIL.COM', '5345-3453');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre`, `correlativo`) VALUES
(1, 'San Francisco', '0001'),
(2, 'Aurora', '0002'),
(3, 'bacon azteca', '0003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL,
  `monto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `mora` float DEFAULT NULL,
  `interes` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `id_prestamo`, `monto`, `fecha`, `mora`, `interes`) VALUES
(1, 17, 200, '2018-01-23', 0, 3),
(2, 17, 300, '2018-01-18', 3, 5),
(3, 17, 222, '2018-01-03', 5, 5),
(4, 6, 100, '2018-01-19', 0, 0),
(5, 1, 200, '2018-01-04', 9, 3),
(6, 1, 300, '2018-01-03', 0, 3),
(7, 1, 500, '2018-01-04', 5, 6),
(8, 2, 100, '2018-01-03', 0, 3),
(9, 2, 500, '2018-01-10', 0, 8),
(10, 3, 800, '2018-01-02', 8, 2),
(11, 3, 900, '2018-01-13', 0, 7),
(12, 4, 200, '2018-01-23', 0, 3),
(13, 4, 300, '2018-01-18', 3, 5),
(14, 4, 222, '2018-01-03', 5, 5),
(15, 4, 100, '2018-01-19', 0, 0),
(16, 4, 200, '2018-01-04', 9, 3),
(17, 4, 300, '2018-01-03', 0, 3),
(18, 4, 500, '2018-01-04', 0, 6),
(19, 4, 100, '2018-01-03', 0, 3),
(20, 4, 500, '2018-01-10', 0, 8),
(21, 4, 800, '2018-01-02', 8, 2),
(22, 4, 900, '2018-01-13', 0, 7),
(23, 5, 200, '2018-01-23', 0, 3),
(24, 5, 300, '2018-01-18', 3, 5),
(25, 5, 222, '2018-01-03', 5, 5),
(26, 5, 100, '2018-01-19', 0, 0),
(27, 5, 200, '2018-01-04', 9, 3),
(28, 5, 300, '2018-01-03', 0, 3),
(29, 5, 500, '2018-01-04', 0, 6),
(30, 5, 100, '2018-01-03', 0, 3),
(31, 5, 500, '2018-01-10', 0, 8),
(32, 5, 800, '2018-01-02', 8, 2),
(33, 5, 900, '2018-01-13', 0, 7),
(34, 6, 200, '2018-01-23', 0, 3),
(35, 6, 300, '2018-01-18', 3, 5),
(36, 6, 222, '2018-01-03', 5, 5),
(37, 6, 100, '2018-01-19', 0, 0),
(38, 6, 200, '2018-01-04', 9, 3),
(39, 6, 300, '2018-01-03', 0, 3),
(40, 6, 500, '2018-01-04', 0, 6),
(41, 6, 100, '2018-01-03', 0, 3),
(42, 6, 500, '2018-01-10', 0, 8),
(43, 6, 800, '2018-01-02', 8, 2),
(44, 6, 900, '2018-01-13', 0, 7),
(45, 10, 200, '2018-01-23', 0, 3),
(46, 10, 300, '2018-01-18', 3, 5),
(47, 10, 222, '2018-01-03', 5, 5),
(48, 10, 100, '2018-01-19', 0, 0),
(49, 10, 200, '2018-01-04', 9, 3),
(50, 10, 300, '2018-01-03', 0, 3),
(51, 10, 500, '2018-01-04', 0, 6),
(52, 10, 100, '2018-01-03', 0, 3),
(53, 10, 500, '2018-01-10', 0, 8),
(54, 10, 800, '2018-01-02', 8, 2),
(55, 10, 900, '2018-01-13', 9, 7),
(56, 11, 200, '2018-01-23', 0, 3),
(57, 11, 300, '2018-01-18', 3, 5),
(58, 11, 222, '2018-01-03', 5, 5),
(59, 11, 100, '2018-01-19', 0, 0),
(60, 11, 200, '2018-01-04', 9, 3),
(61, 11, 300, '2018-01-03', 0, 3),
(62, 11, 500, '2018-01-04', 0, 6),
(63, 11, 100, '2018-01-03', 0, 3),
(64, 11, 500, '2018-01-10', 0, 8),
(65, 11, 800, '2018-01-02', 8, 2),
(66, 11, 900, '2018-01-13', 0, 7),
(67, 12, 200, '2018-01-23', 0, 3),
(68, 12, 300, '2018-01-18', 3, 5),
(69, 12, 222, '2018-01-03', 5, 5),
(70, 12, 100, '2018-01-19', 0, 0),
(71, 12, 200, '2018-01-04', 9, 3),
(72, 12, 300, '2018-01-03', 0, 3),
(73, 12, 500, '2018-01-04', 0, 6),
(74, 12, 100, '2018-01-03', 0, 3),
(75, 12, 500, '2018-01-10', 0, 8),
(76, 12, 800, '2018-01-02', 8, 2),
(77, 12, 900, '2018-01-13', 0, 7),
(78, 13, 200, '2018-01-23', 0, 3),
(79, 13, 300, '2018-01-18', 3, 5),
(80, 13, 222, '2018-01-03', 5, 5),
(81, 13, 100, '2018-01-19', 0, 0),
(82, 13, 200, '2018-01-04', 9, 3),
(83, 13, 300, '2018-01-03', 0, 3),
(84, 13, 500, '2018-01-04', 0, 6),
(85, 13, 100, '2018-01-03', 0, 3),
(86, 13, 500, '2018-01-10', 0, 8),
(87, 13, 800, '2018-01-02', 8, 2),
(88, 13, 900, '2018-01-13', 0, 7),
(89, 14, 200, '2018-01-23', 0, 3),
(90, 14, 300, '2018-01-18', 3, 5),
(91, 14, 222, '2018-01-03', 5, 5),
(92, 14, 100, '2018-01-19', 0, 0),
(93, 14, 200, '2018-01-04', 9, 3),
(94, 14, 300, '2018-01-03', 0, 3),
(95, 14, 500, '2018-01-04', 0, 6),
(96, 14, 100, '2018-01-03', 0, 3),
(97, 14, 500, '2018-01-10', 0, 8),
(98, 14, 800, '2018-01-02', 8, 2),
(99, 14, 900, '2018-01-13', 8, 7),
(100, 15, 200, '2018-01-23', 0, 3),
(101, 15, 300, '2018-01-18', 3, 5),
(102, 15, 222, '2018-01-03', 5, 5),
(103, 15, 100, '2018-01-19', 0, 0),
(104, 15, 200, '2018-01-04', 9, 3),
(105, 15, 300, '2018-01-03', 0, 3),
(106, 15, 500, '2018-01-04', 0, 6),
(107, 15, 100, '2018-01-03', 0, 3),
(108, 15, 500, '2018-01-10', 0, 8),
(109, 15, 800, '2018-01-02', 8, 2),
(110, 15, 900, '2018-01-13', 0, 7),
(111, 16, 200, '2018-01-23', 0, 3),
(112, 16, 300, '2018-01-18', 3, 5),
(113, 16, 222, '2018-01-03', 5, 5),
(114, 16, 100, '2018-01-19', 0, 0),
(115, 16, 200, '2018-01-04', 9, 3),
(116, 16, 300, '2018-01-03', 0, 3),
(117, 16, 500, '2018-01-04', 0, 6),
(118, 16, 100, '2018-01-03', 0, 3),
(119, 16, 500, '2018-01-10', 0, 8),
(120, 16, 800, '2018-01-02', 8, 2),
(121, 16, 900, '2018-01-13', 0, 7),
(122, 10, 140, '2018-01-22', 0, 17.0069),
(123, 10, 140, '2018-01-22', 0, 0),
(124, 2, 600, '2018-01-22', 0, 161.111),
(125, 3, 750, '2018-01-22', 5.1861, 223.4),
(126, 18, 200, '2018-02-23', 0, 62.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_juridica`
--

CREATE TABLE `persona_juridica` (
  `id_persona_juridica` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `dui` varchar(45) DEFAULT NULL,
  `nit` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_juridica`
--

INSERT INTO `persona_juridica` (`id_persona_juridica`, `nombre`, `categoria`, `numero`, `dui`, `nit`) VALUES
(1, 'Coca-Cola', '1', '43234234232', '00034400-4', '3020-202020-202-0'),
(2, 'Pollo Campero', '1', '65436564', '23330044-3', '0095-444900-449-4'),
(3, 'Toyota', '1', '43534443454', '00069555-9', '0595-944564-560-0'),
(4, 'Pepsi', '1', '43444444232', '00034400-4', '3020-202020-202-0'),
(5, 'Industria la Constancia', '1', '65436564', '23330044-3', '0095-444900-449-4'),
(6, 'Nissan', '1', '43534443454', '00069555-9', '0595-944564-560-0'),
(7, 'la constancia', NULL, '75656666565', '67868768-7', '7676-786768-678-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_natural`
--

CREATE TABLE `persona_natural` (
  `id_persona_natural` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `monto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_natural`
--

INSERT INTO `persona_natural` (`id_persona_natural`, `nombre`, `apellido`, `direccion`, `dui`, `nit`, `correo`, `categoria`, `observaciones`, `telefono`, `monto`) VALUES
(1, 'Juan Jose', 'Gomez Bolanios', ' Av.Independencia No 672 Centro Tuxtepec', '34242342-3', '4234-324234-234', NULL, NULL, NULL, '3233-2222', 1),
(2, 'Marcelo Adres', 'Ramirez Suerez', ' Av.Independencia No 672 Centro Tuxtepec', '34242342-3', '4234-324234-234', NULL, NULL, NULL, '3233-2222', 1),
(3, 'Andres Fernandez', 'Perez Bonilla', 'Miguel Hidalgo No 409 Centro Tuxtepec', '00303030-3', '3242-553452-345', NULL, NULL, NULL, '3242-3423', 0),
(4, 'Pedro Jose', 'Martinez Valladares', ' Av. 5 De Mayo No 1014 Centro Tuxtepec', '23322223-4', '3423-434234-324', NULL, NULL, NULL, '9899-9797', 0),
(5, 'Miguel Juan', 'Mercedez Gonzales', 'Av. Independencia No. 608 Col.Centro Tuxtepec.Oax.', '22332232-3', '0099-888887-777', NULL, NULL, NULL, '7727-7272', 1),
(6, 'Maria Cruz', 'Dolores', ' Matamoros No 149 Centro Tuxtepec', '00098887-7', '0098-888883-838', NULL, NULL, NULL, '7788-7888', 1),
(7, 'Mauro icardi', 'Zanety', 'Mariano Arista No 454 Centro Tuxtepec', '97989787-7', '7899-797979-979', NULL, NULL, NULL, '6776-6666', 0),
(8, 'Zlatan', 'Ibraimovic', ' Av. Jesus Carranza No 1651 Altos El Reposo Tuxtepec', '00099888-8', '8899-877777-665', NULL, NULL, NULL, '2202-0020', 1),
(9, 'Alvaro', 'Morata', ' Av. Independencia No 117 La Piragua Tuxtepec', '00098765-4', '6677-889999-999', NULL, NULL, NULL, '7788-7788', 0),
(10, 'Sergio', 'Ramos', ' Daniel Soto No 354 Maria Luisa Tuxtepec', '00998877-7', '3424-324234-324', NULL, NULL, NULL, '3423-4234', 0),
(11, 'Ronaldo Nazario', 'Dalima', ' C 1O De Mayo No 4 Ampl.Mexico Loma Bonita', '00404949-4', '4848-484884-848', NULL, NULL, NULL, '9393-9393', 1),
(12, 'Zidenide Zidan', 'Martinez', 'Calle Sebastian Ortiz No 690 Centro Tuxtepec', '00999999-9', '3242-534654-654', NULL, NULL, NULL, '2342-3432', 0),
(13, 'cristiano ronaldo', 'messi lopez', 'dsnsldnsllivsd sdflns', '74185541-5', '1105-101001-110', NULL, NULL, NULL, '7513-6113', 0),
(14, 'saul', 'leroy', 'bbbbbbbbbbbbbbbb', '56765575-6', '8678-687686-687', NULL, NULL, NULL, '5675-6756', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `prestamo_original` float DEFAULT NULL,
  `saldo_actual` float DEFAULT NULL,
  `mora_acumulada` float DEFAULT NULL,
  `intereses_acumulados` float DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `proximo_pago` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tiempo` varchar(45) DEFAULT NULL,
  `tasa_interes` float DEFAULT NULL,
  `tasa_moratoria` float DEFAULT NULL,
  `tipo_credito` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `id_asesor`, `prestamo_original`, `saldo_actual`, `mora_acumulada`, `intereses_acumulados`, `estado`, `proximo_pago`, `fecha`, `tiempo`, `tasa_interes`, `tasa_moratoria`, `tipo_credito`) VALUES
(1, 1, 1539, 1539, 0, 0, 'INCOBRABLE', '2018-01-22', '2017-11-18', '24', 13, 0, 'JURIDICO'),
(2, 1, 25000, 24561.1, 0, 0, 'INCOBRABLE', '2018-02-22', '2017-12-22', '60', 8, 0, 'JURIDICO'),
(3, 1, 22340, 21818.6, 0, 0, 'INCOBRABLE', '2018-01-22', '2017-11-22', '36', 12, 0, 'JURIDICO'),
(4, 1, 34000, 34000, 0, 0, 'NORMAL', '2018-02-17', '2018-01-18', '48', 8, 0, 'JURIDICO'),
(5, 1, 25999, 25999, 0, 0, 'PENDIENTE', '2018-02-17', '2018-01-18', '36', 12, 0, 'JURIDICO'),
(6, 1, 30000, 30000, 0, 0, 'PENDIENTE', '2018-02-17', '2018-01-18', '12', 14, 0, 'JURIDICO'),
(10, 1, 1508, 0, 0, 0, 'NORMAL', '2018-03-22', '2017-12-22', '12', 14, 0, 'JURIDICO'),
(11, 2, 18500, 18500, 0, 0, 'NORMAL', '2018-02-17', '2018-01-18', '12', 14, 0, 'PERSONAL'),
(12, 1, 19000, 19000, 0, 0, 'INCOBRABLE', '2018-02-17', '2018-01-18', '72', 13, 0, 'PERSONAL'),
(13, 1, 3000, 3000, 0, 0, 'PENDIENTE', '2018-02-17', '2018-01-18', '60', 5.8, 0, 'AGROPECUARIO'),
(14, 2, 3000, 3000, 0, 0, 'NORMAL', '2018-02-17', '2018-01-18', '84', 5, 0, 'PERSONAL'),
(15, 1, 5000, 5000, 0, 0, 'PENDIENTE', '2018-02-17', '2018-01-18', '72', 13, 0, 'PERSONAL'),
(16, 1, 1999, 1999, 0, 0, 'NORMAL', '2018-02-17', '2018-01-18', '96', 5.5, 0, 'AGROPECUARIO'),
(17, 1, 1995, 1995, 0, 0, 'INCOBRABLE', '2018-02-17', '2018-01-18', '24', 13, 0, 'JURIDICO'),
(18, 1, 3000, 2862.5, 0, 0, 'PENDIENTE', '2018-03-22', '2018-01-22', '24', 25, 0, 'HIPOTECARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `id_referencias` int(11) NOT NULL,
  `id_persona_natural` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `referencias`
--

INSERT INTO `referencias` (`id_referencias`, `id_persona_natural`, `nombre`, `apellido`, `telefono`) VALUES
(1, 5, 'J', 'Alfaro Cruz', '7633-3332'),
(2, 5, 'e', 'Alvarez Landaverde', '7755-2235'),
(3, 2, 'D', 'Callejas Morales', '3453-4534'),
(4, 2, 'e', 'Cordova Flores', '7349-3820'),
(5, 6, 'M', 'Cubias Flores', '7394-3849'),
(6, 6, 'i', 'Durán González', '4534-5345'),
(7, 11, 'O', 'García Osorio', '4324-3243'),
(8, 11, 's', 'García Rodríguez', '3423-4234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_activo`
--

CREATE TABLE `tipo_activo` (
  `id_tipo` int(11) NOT NULL,
  `id_clasificacion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_activo`
--

INSERT INTO `tipo_activo` (`id_tipo`, `id_clasificacion`, `nombre`, `correlativo`) VALUES
(1, 1, 'tractor', '0001'),
(2, 1, 'DDDDDDDDD', '0002'),
(3, 1, 'mesas', '0003'),
(4, 1, 'sillas', '0004'),
(5, 1, 'camarotd', '0005'),
(6, 2, 'Camion', '0006'),
(7, 2, 'bus', '0007');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `zona` varchar(30) DEFAULT NULL,
  `dui` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `zona`, `dui`, `pass`, `nivel`) VALUES
(1, 'asesor1', 'Martinez Perez', 'Paracentral', '12345678-9', 'asesor1', '1'),
(2, 'asesor2', 'Mejia Navarrete', 'Oriente', '98765432-1', 'asesor2', '1'),
(3, 'admin01', 'admin01', 'NINGUNA', '22323232-2', 'admin01', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activo`
--
ALTER TABLE `activo`
  ADD PRIMARY KEY (`id_activo`),
  ADD KEY `fk_activo_tipo_activo1_idx` (`id_tipo`),
  ADD KEY `fk_activo_departamento1_idx` (`id_departamento`),
  ADD KEY `fk_activo_institucion1_idx` (`id_institucion`),
  ADD KEY `fk_activo_encargado1_idx` (`encargado_id_encargado`),
  ADD KEY `fk_activo_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `balance_general`
--
ALTER TABLE `balance_general`
  ADD PRIMARY KEY (`id_balance`),
  ADD KEY `fk_balance_general_persona_juridica1_idx` (`id_persona_juridica`);

--
-- Indices de la tabla `bien_hipotecario`
--
ALTER TABLE `bien_hipotecario`
  ADD PRIMARY KEY (`id_bien`),
  ADD KEY `fk_bien_hipotecario_persona_natural1_idx` (`id_persona_natural`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`id_clasificacion`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`id_encargado`);

--
-- Indices de la tabla `estado_resultado`
--
ALTER TABLE `estado_resultado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `fk_estado_resultado_persona_juridica1_idx` (`id_persona_juridica`);

--
-- Indices de la tabla `expediente_juridico`
--
ALTER TABLE `expediente_juridico`
  ADD KEY `fk_prestamo_has_persona_juridica_persona_juridica1_idx` (`id_persona_juridica`),
  ADD KEY `fk_prestamo_has_persona_juridica_prestamo1_idx` (`id_prestamo`);

--
-- Indices de la tabla `expediente_natural`
--
ALTER TABLE `expediente_natural`
  ADD KEY `fk_persona_natural_has_prestamo_prestamo1_idx` (`id_prestamo`),
  ADD KEY `fk_persona_natural_has_prestamo_persona_natural1_idx` (`persona_natural`);

--
-- Indices de la tabla `fiador`
--
ALTER TABLE `fiador`
  ADD PRIMARY KEY (`id_fiador`),
  ADD KEY `fk_codeudor_persona_natural1_idx` (`id_persona_natural`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fk_pago_prestamo1_idx` (`id_prestamo`);

--
-- Indices de la tabla `persona_juridica`
--
ALTER TABLE `persona_juridica`
  ADD PRIMARY KEY (`id_persona_juridica`);

--
-- Indices de la tabla `persona_natural`
--
ALTER TABLE `persona_natural`
  ADD PRIMARY KEY (`id_persona_natural`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `fk_prestamo_asesor_credito1_idx` (`id_asesor`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id_referencias`),
  ADD KEY `fk_referencias_persona_natural1_idx` (`id_persona_natural`);

--
-- Indices de la tabla `tipo_activo`
--
ALTER TABLE `tipo_activo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD KEY `fk_tipo_activo_clasificacion1_idx` (`id_clasificacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activo`
--
ALTER TABLE `activo`
  MODIFY `id_activo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `balance_general`
--
ALTER TABLE `balance_general`
  MODIFY `id_balance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `bien_hipotecario`
--
ALTER TABLE `bien_hipotecario`
  MODIFY `id_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `id_encargado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado_resultado`
--
ALTER TABLE `estado_resultado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `fiador`
--
ALTER TABLE `fiador`
  MODIFY `id_fiador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT de la tabla `persona_juridica`
--
ALTER TABLE `persona_juridica`
  MODIFY `id_persona_juridica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `persona_natural`
--
ALTER TABLE `persona_natural`
  MODIFY `id_persona_natural` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id_referencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipo_activo`
--
ALTER TABLE `tipo_activo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activo`
--
ALTER TABLE `activo`
  ADD CONSTRAINT `fk_activo_departamento1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activo_encargado1` FOREIGN KEY (`encargado_id_encargado`) REFERENCES `encargado` (`id_encargado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activo_institucion1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activo_tipo_activo1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_activo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activo_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `balance_general`
--
ALTER TABLE `balance_general`
  ADD CONSTRAINT `fk_balance_general_persona_juridica1` FOREIGN KEY (`id_persona_juridica`) REFERENCES `persona_juridica` (`id_persona_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bien_hipotecario`
--
ALTER TABLE `bien_hipotecario`
  ADD CONSTRAINT `fk_bien_hipotecario_persona_natural1` FOREIGN KEY (`id_persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estado_resultado`
--
ALTER TABLE `estado_resultado`
  ADD CONSTRAINT `fk_estado_resultado_persona_juridica1` FOREIGN KEY (`id_persona_juridica`) REFERENCES `persona_juridica` (`id_persona_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expediente_juridico`
--
ALTER TABLE `expediente_juridico`
  ADD CONSTRAINT `fk_prestamo_has_persona_juridica_persona_juridica1` FOREIGN KEY (`id_persona_juridica`) REFERENCES `persona_juridica` (`id_persona_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_has_persona_juridica_prestamo1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expediente_natural`
--
ALTER TABLE `expediente_natural`
  ADD CONSTRAINT `fk_persona_natural_has_prestamo_persona_natural1` FOREIGN KEY (`persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_natural_has_prestamo_prestamo1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fiador`
--
ALTER TABLE `fiador`
  ADD CONSTRAINT `fk_codeudor_persona_natural1` FOREIGN KEY (`id_persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_pago_prestamo1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_prestamo_asesor_credito1` FOREIGN KEY (`id_asesor`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD CONSTRAINT `fk_referencias_persona_natural1` FOREIGN KEY (`id_persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_activo`
--
ALTER TABLE `tipo_activo`
  ADD CONSTRAINT `fk_tipo_activo_clasificacion1` FOREIGN KEY (`id_clasificacion`) REFERENCES `clasificacion` (`id_clasificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
