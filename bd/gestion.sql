-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2020 a las 05:56:06
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `codigo_categoria` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigo_categoria`, `nombre`) VALUES
(1, 'ACCESORIOS'),
(2, 'COMPUTACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `codigo_empresa` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `codigo_factura` int(11) NOT NULL,
  `cliente` text NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL,
  `fecha` date NOT NULL,
  `modopago` varchar(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`codigo_factura`, `cliente`, `email`, `direccion`, `fecha`, `modopago`, `cantidad`, `total`) VALUES
(1, 'ALBERTO VASQUEZ', 'shahorozco@unicomfacauca.edu.co', 'scrt', '2020-04-03', 'EFECTIVO', 110, 2630000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `codigo_pedido` int(11) NOT NULL,
  `proveedor` text NOT NULL,
  `email` text NOT NULL,
  `fecha` text NOT NULL,
  `modopago` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `codigo_personal` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`codigo_personal`, `nombre`, `apellido`, `telefono`, `email`, `direccion`, `rol`) VALUES
(111, 'ADMINISTRADOR   ', 'ADMIN', 0, 'ADMIN@AADMIN.COM', '#', 'ADMINISTRADOR'),
(191030, 'SHAH DJAHAN', 'VILLAQUIRÃN', 2147483647, 'juancarloscastillo82@gmail.com', 'CALLE 2 # 6-126', 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo_producto` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `categoria` text NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_producto`, `nombre`, `categoria`, `precio`) VALUES
(1, 'MOUSE', 'ACCESORIO', 15000),
(2, 'TECLADO', 'ACCESORIO', 25000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_list`
--

CREATE TABLE `producto_list` (
  `codigo_productolist` int(11) NOT NULL,
  `codigo_factura` int(11) NOT NULL,
  `codigo_pedido` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_list`
--

INSERT INTO `producto_list` (`codigo_productolist`, `codigo_factura`, `codigo_pedido`, `nombre`, `cantidad`, `precio`, `total`, `estado`) VALUES
(14, 1, 0, 'TECLADO', 98, 25000, 2450000, 1),
(22, 1, 0, 'MOUSE', 12, 15000, 180000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codigo_proveedor` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `responsable` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `codigo_pago` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`codigo_pago`, `nombre`, `descripcion`) VALUES
(1, 'EFECTIVO', 'PAGO REALIZADO CON DINERO FISICO DIRECTAMENTE EN LA EMPRESA'),
(2, 'TARJETA', 'PAGO REALIZADO A TRAVES DEL USO DE UNA CUENTA BANCARIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_rol`
--

CREATE TABLE `tipo_rol` (
  `codigo_rol` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_rol`
--

INSERT INTO `tipo_rol` (`codigo_rol`, `nombre`, `descripcion`) VALUES
(1, 'ADMINISTRADOR', 'USUARIO CON MAXIMOS PRIVILEGIOS EN LA APLICACION'),
(2, 'ADMINISTRATIVO', 'USUARIO CON PRIVILEGIOS PARA GENERAR REPORTES'),
(3, 'SUPERVISOR', 'USUARIO CON PERMISOS PARA UTILIZAR TODAS LAS FUNCIONALIDAD DE LA APLICACION EXCEPTO LA CREACION DE NUEVOS USUARIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo_login` int(11) NOT NULL,
  `username` text NOT NULL,
  `userpass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo_login`, `username`, `userpass`) VALUES
(111, 'administrador', 'admin'),
(191030, 'SD', '6226f7cbe59e99a90b5cef6f94f966fd'),
(1062322915, 'SDOV', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codigo_categoria`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`codigo_empresa`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`codigo_factura`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`codigo_pedido`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`codigo_personal`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo_producto`);

--
-- Indices de la tabla `producto_list`
--
ALTER TABLE `producto_list`
  ADD PRIMARY KEY (`codigo_productolist`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codigo_proveedor`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`codigo_pago`);

--
-- Indices de la tabla `tipo_rol`
--
ALTER TABLE `tipo_rol`
  ADD PRIMARY KEY (`codigo_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo_login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto_list`
--
ALTER TABLE `producto_list`
  MODIFY `codigo_productolist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `codigo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
