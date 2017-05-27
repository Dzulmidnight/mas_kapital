-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2017 a las 05:10:43
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `maskapital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Conocimientos`
--

CREATE TABLE `Conocimientos` (
  `idConocimientos` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Funciones` varchar(200) DEFAULT NULL,
  `Software` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Conocimientos`
--

INSERT INTO `Conocimientos` (`idConocimientos`, `idSolicitante`, `Funciones`, `Software`) VALUES
(1, 3, 'ok', ''),
(2, 4, 'ol', ''),
(3, 5, '', ''),
(4, 6, '', ''),
(5, 7, '', ''),
(6, 8, '', ''),
(7, 9, '', ''),
(8, 10, '', ''),
(9, 11, '', ''),
(10, 12, '', ''),
(11, 13, '', ''),
(12, 14, '', ''),
(13, 15, '', ''),
(14, 16, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DatosEconomicos`
--

CREATE TABLE `DatosEconomicos` (
  `idDatosEconomicos` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Ingresos` varchar(45) DEFAULT NULL,
  `Importe` varchar(45) DEFAULT NULL,
  `Conyuge` varchar(45) DEFAULT NULL,
  `IngresoConyuge` varchar(45) DEFAULT NULL,
  `CasaPropia` varchar(45) DEFAULT NULL,
  `ValorCasa` varchar(45) DEFAULT NULL,
  `PagaRenta` varchar(45) DEFAULT NULL,
  `ValorRenta` varchar(45) DEFAULT NULL,
  `AutoMovil` varchar(45) DEFAULT NULL,
  `MarcaAuto` varchar(45) DEFAULT NULL,
  `ModeloAuto` varchar(45) DEFAULT NULL,
  `Adeudo` varchar(45) DEFAULT NULL,
  `ImporteAdeudo` varchar(45) DEFAULT NULL,
  `AbonoAdeudo` varchar(45) DEFAULT NULL,
  `GastosMensuales` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DatosEconomicos`
--

INSERT INTO `DatosEconomicos` (`idDatosEconomicos`, `idSolicitante`, `Ingresos`, `Importe`, `Conyuge`, `IngresoConyuge`, `CasaPropia`, `ValorCasa`, `PagaRenta`, `ValorRenta`, `AutoMovil`, `MarcaAuto`, `ModeloAuto`, `Adeudo`, `ImporteAdeudo`, `AbonoAdeudo`, `GastosMensuales`) VALUES
(2, NULL, 'uno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DatosGenerales`
--

CREATE TABLE `DatosGenerales` (
  `idDatosGenerales` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `ComoSupo` varchar(45) DEFAULT NULL,
  `Pariente` varchar(200) DEFAULT NULL,
  `Viajar` varchar(45) DEFAULT NULL,
  `ExpViajar` varchar(45) DEFAULT NULL,
  `Residencia` varchar(45) DEFAULT NULL,
  `ExpResidencia` varchar(45) DEFAULT NULL,
  `FechaTrabajar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DatosGenerales`
--

INSERT INTO `DatosGenerales` (`idDatosGenerales`, `idSolicitante`, `ComoSupo`, `Pariente`, `Viajar`, `ExpViajar`, `Residencia`, `ExpResidencia`, `FechaTrabajar`) VALUES
(1, 8, '', '', '', '', '', '', '0000-00-00'),
(2, 9, '', '', '', '', '', '', '0000-00-00'),
(3, 10, '', '', '', '', '', '', '0000-00-00'),
(4, 11, '', '', '', '', '', '', '0000-00-00'),
(5, 12, '', '', '', '', '', '', '0000-00-00'),
(6, 13, '', '', '', '', '', '', '0000-00-00'),
(7, 14, '', '', '', '', '', '', '0000-00-00'),
(8, 15, '', '', '', '', '', '', '0000-00-00'),
(9, 16, '', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Documentacion`
--

CREATE TABLE `Documentacion` (
  `idDocumentacion` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Curp` varchar(45) DEFAULT NULL,
  `Rfc` varchar(45) DEFAULT NULL,
  `Imms` varchar(45) DEFAULT NULL,
  `Licencia` varchar(45) DEFAULT NULL,
  `NumLicencia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Documentacion`
--

INSERT INTO `Documentacion` (`idDocumentacion`, `idSolicitante`, `Curp`, `Rfc`, `Imms`, `Licencia`, `NumLicencia`) VALUES
(2, 2, '', '', '', '', ''),
(3, 3, '', '', '', '', ''),
(4, 4, '', '', '', '', ''),
(5, 5, '', '', '', '', ''),
(6, 6, '', '', '', '', ''),
(7, 7, '', '', '', '', ''),
(8, 8, '', '', '', '', ''),
(9, 9, '', '', '', '', ''),
(10, 10, '', '', '', '', ''),
(11, 11, '', '', '', '', ''),
(12, 12, '', '', '', '', ''),
(13, 13, '', '', '', '', ''),
(14, 14, '', '', '', '', ''),
(15, 15, '', '', '', '', ''),
(16, 16, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DomSolicitante`
--

CREATE TABLE `DomSolicitante` (
  `idDomSolicitante` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `NumExt` int(11) DEFAULT NULL,
  `NumInt` int(11) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `Municipio` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `CP` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DomSolicitante`
--

INSERT INTO `DomSolicitante` (`idDomSolicitante`, `idSolicitante`, `Calle`, `NumExt`, `NumInt`, `Colonia`, `Municipio`, `Estado`, `CP`) VALUES
(2, 2, '', 0, 0, '', '', '0', ''),
(3, 3, '', 0, 0, '', '', '0', ''),
(4, 4, '', 0, 0, '', '', '0', ''),
(5, 5, '', 0, 0, '', '', '0', ''),
(6, 6, '', 0, 0, '', '', '0', ''),
(7, 7, '', 0, 0, '', '', '0', ''),
(8, 8, '', 0, 0, '', '', '0', ''),
(9, 9, '', 0, 0, '', '', '0', ''),
(10, 10, '', 0, 0, '', '', '0', ''),
(11, 11, '', 0, 0, '', '', '0', ''),
(12, 12, '', 0, 0, '', '', '0', ''),
(13, 13, '', 0, 0, '', '', '0', ''),
(14, 14, '', 0, 0, '', '', '0', ''),
(15, 15, '', 0, 0, '', '', '0', ''),
(16, 16, '', 0, 0, '', '', '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EdoSalud`
--

CREATE TABLE `EdoSalud` (
  `idEdoSalud` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Padece` varchar(45) DEFAULT NULL,
  `Enfermedad` varchar(45) DEFAULT NULL,
  `Meta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `EdoSalud`
--

INSERT INTO `EdoSalud` (`idEdoSalud`, `idSolicitante`, `Estado`, `Padece`, `Enfermedad`, `Meta`) VALUES
(2, 2, '', '', '', ''),
(3, 3, '', '', '', ''),
(4, 4, '', '', '', ''),
(5, 5, '', '', '', ''),
(6, 6, '', '', '', ''),
(7, 7, '', '', '', ''),
(8, 8, '', '', '', ''),
(9, 9, '', '', '', ''),
(10, 10, '', '', '', ''),
(11, 11, '', '', '', ''),
(12, 12, '', '', '', ''),
(13, 13, '', '', '', ''),
(14, 14, '', '', '', ''),
(15, 15, '', '', '', ''),
(16, 16, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleos`
--

CREATE TABLE `Empleos` (
  `idEmpleos` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Compania` varchar(45) DEFAULT NULL,
  `FechaInicio` varchar(45) DEFAULT NULL,
  `FechaTermino` varchar(45) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Puesto` varchar(45) DEFAULT NULL,
  `Motivo` varchar(45) DEFAULT NULL,
  `Salario` varchar(45) DEFAULT NULL,
  `NombreJefe` varchar(100) DEFAULT NULL,
  `PuestoJefe` varchar(100) DEFAULT NULL,
  `Informacion` varchar(100) NOT NULL,
  `Porque` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Empleos`
--

INSERT INTO `Empleos` (`idEmpleos`, `idSolicitante`, `Compania`, `FechaInicio`, `FechaTermino`, `Direccion`, `Telefono`, `Puesto`, `Motivo`, `Salario`, `NombreJefe`, `PuestoJefe`, `Informacion`, `Porque`) VALUES
(1, 4, '', '', '', '', '', '', '', '', '', '', 'Si', 'ol'),
(2, 5, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(3, 6, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(4, 7, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(5, 8, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(6, 9, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(7, 10, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(8, 11, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(9, 12, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(10, 13, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(11, 14, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(12, 15, '', '', '', '', '', '', '', '', '', '', 'Si', ''),
(13, 16, '', '', '', '', '', '', '', '', '', '', 'Si', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Escolaridad`
--

CREATE TABLE `Escolaridad` (
  `idEscolaridad` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Escuela` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `FechaI` varchar(45) DEFAULT NULL,
  `FechaF` varchar(45) DEFAULT NULL,
  `Documento` varchar(45) DEFAULT NULL,
  `Carrera` varchar(45) DEFAULT NULL,
  `Nivel` varchar(45) DEFAULT NULL,
  `EscuelaAct` varchar(45) DEFAULT NULL,
  `Curso` varchar(45) DEFAULT NULL,
  `Dias` varchar(45) DEFAULT NULL,
  `Horario` varchar(45) DEFAULT NULL,
  `NivelAct` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Escolaridad`
--

INSERT INTO `Escolaridad` (`idEscolaridad`, `idSolicitante`, `Escuela`, `Direccion`, `FechaI`, `FechaF`, `Documento`, `Carrera`, `Nivel`, `EscuelaAct`, `Curso`, `Dias`, `Horario`, `NivelAct`) VALUES
(0, 2, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Esposa`
--

CREATE TABLE `Esposa` (
  `idEsposaSol` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `Vive` varchar(45) DEFAULT NULL,
  `Domicilio` varchar(300) DEFAULT NULL,
  `Ocupacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Esposa`
--

INSERT INTO `Esposa` (`idEsposaSol`, `idSolicitante`, `Nombre`, `Vive`, `Domicilio`, `Ocupacion`) VALUES
(2, 2, '', 'Vivo', '', ''),
(3, 3, '', 'Vivo', '', ''),
(4, 4, '', 'Vivo', '', ''),
(5, 5, '', 'Vivo', '', ''),
(6, 6, '', 'Vivo', '', ''),
(7, 7, '', 'Vivo', '', ''),
(8, 8, '', 'Vivo', '', ''),
(9, 9, '', 'Vivo', '', ''),
(10, 10, '', 'Vivo', '', ''),
(11, 11, '', 'Vivo', '', ''),
(12, 12, '', 'Vivo', '', ''),
(13, 13, '', 'Vivo', '', ''),
(14, 14, '', 'Vivo', '', ''),
(15, 15, '', 'Vivo', '', ''),
(16, 16, '', 'Vivo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Madre`
--

CREATE TABLE `Madre` (
  `idMadreSol` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `Vive` varchar(45) DEFAULT NULL,
  `Domicilio` varchar(300) DEFAULT NULL,
  `Ocupacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Madre`
--

INSERT INTO `Madre` (`idMadreSol`, `idSolicitante`, `Nombre`, `Vive`, `Domicilio`, `Ocupacion`) VALUES
(2, 2, '', 'Vivo', '', ''),
(3, 3, '', 'Vivo', '', ''),
(4, 4, '', 'Vivo', '', ''),
(5, 5, '', 'Vivo', '', ''),
(6, 6, '', 'Vivo', '', ''),
(7, 7, '', 'Vivo', '', ''),
(8, 8, '', 'Vivo', '', ''),
(9, 9, '', 'Vivo', '', ''),
(10, 10, '', 'Vivo', '', ''),
(11, 11, '', 'Vivo', '', ''),
(12, 12, '', 'Vivo', '', ''),
(13, 13, '', 'Vivo', '', ''),
(14, 14, '', 'Vivo', '', ''),
(15, 15, '', 'Vivo', '', ''),
(16, 16, '', 'Vivo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PadreSol`
--

CREATE TABLE `PadreSol` (
  `idPadreSol` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `Vive` varchar(45) DEFAULT NULL,
  `Domicilio` varchar(300) DEFAULT NULL,
  `Ocupacion` varchar(45) DEFAULT NULL,
  `Hijos` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PadreSol`
--

INSERT INTO `PadreSol` (`idPadreSol`, `idSolicitante`, `Nombre`, `Vive`, `Domicilio`, `Ocupacion`, `Hijos`) VALUES
(2, 2, '', 'Vivo', '', '', ''),
(3, 3, '', 'Vivo', '', '', ''),
(4, 4, '', 'Vivo', '', '', ''),
(5, 5, '', 'Vivo', '', '', ''),
(6, 6, '', 'Vivo', '', '', ''),
(7, 7, '', 'Vivo', '', '', ''),
(8, 8, '', 'Vivo', '', '', ''),
(9, 9, '', 'Vivo', '', '', ''),
(10, 10, '', 'Vivo', '', '', ''),
(11, 11, '', 'Vivo', '', '', ''),
(12, 12, '', 'Vivo', '', '', ''),
(13, 13, '', 'Vivo', '', '', ''),
(14, 14, '', 'Vivo', '', '', ''),
(15, 15, '', 'Vivo', '', '', ''),
(16, 16, '', 'Vivo', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RefFamiliar`
--

CREATE TABLE `RefFamiliar` (
  `idFamiliar` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Domicilio` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Ocupacion` varchar(45) DEFAULT NULL,
  `Tiempo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `RefFamiliar`
--

INSERT INTO `RefFamiliar` (`idFamiliar`, `idSolicitante`, `Nombre`, `Domicilio`, `Telefono`, `Ocupacion`, `Tiempo`) VALUES
(1, 6, 'as', '', '', '', ''),
(2, 7, '1', '2', '', '', ''),
(3, 7, '2', '', '', '', ''),
(4, 8, '', '', '', '', ''),
(5, 8, '', '', '', '', ''),
(6, 9, '', '', '', '', ''),
(7, 9, '', '', '', '', ''),
(8, 10, '', '', '', '', ''),
(9, 10, '', '', '', '', ''),
(10, 11, '', '', '', '', ''),
(11, 11, '', '', '', '', ''),
(12, 12, '', '', '', '', ''),
(13, 12, '', '', '', '', ''),
(14, 13, '', '', '', '', ''),
(15, 13, '', '', '', '', ''),
(16, 14, '', '', '', '', ''),
(17, 14, '', '', '', '', ''),
(18, 15, '', '', '', '', ''),
(19, 15, '', '', '', '', ''),
(20, 16, '', '', '', '', ''),
(21, 16, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Solicitante`
--

CREATE TABLE `Solicitante` (
  `idSolicitante` int(11) NOT NULL,
  `ApMaterno` varchar(100) DEFAULT NULL,
  `ApPaterno` varchar(100) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `TelCasa` varchar(45) DEFAULT NULL,
  `TelCelular` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `TiempoRes` int(11) DEFAULT NULL,
  `ViveCon` varchar(45) DEFAULT NULL,
  `EspViveCon` varchar(45) DEFAULT NULL,
  `Dependientes` varchar(45) DEFAULT NULL,
  `EdoCivil` varchar(45) DEFAULT NULL,
  `EspEdoCivil` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Solicitante`
--

INSERT INTO `Solicitante` (`idSolicitante`, `ApMaterno`, `ApPaterno`, `Nombre`, `Edad`, `TelCasa`, `TelCelular`, `Correo`, `TiempoRes`, `ViveCon`, `EspViveCon`, `Dependientes`, `EdoCivil`, `EspEdoCivil`) VALUES
(2, '', 'abc', '', 0, '', '', '', 0, 'as', '', 'Otros', '', ''),
(3, '', 'abc', '', 0, '', '', '', 0, 'as', '', 'Otros', '', ''),
(4, '', 'abc', '', 0, '', '', '', 0, 'as', '', 'Otros', '', ''),
(5, '', 'abc', '', 0, '', '', '', 0, 'as', '', 'Otros', '', ''),
(6, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(7, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(8, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(9, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(10, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(11, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(12, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(13, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(14, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(15, '', '', '', 0, '', '', '', 0, '', '', '', '', ''),
(16, '', '', '', 0, '', '', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SolicitudTrabajo`
--

CREATE TABLE `SolicitudTrabajo` (
  `idSolicitudTrabajo` int(11) NOT NULL,
  `idSolicitante` int(11) DEFAULT NULL,
  `Seccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `SolicitudTrabajo`
--

INSERT INTO `SolicitudTrabajo` (`idSolicitudTrabajo`, `idSolicitante`, `Seccion`) VALUES
(2, 2, 9),
(3, 3, 7),
(4, 4, 8),
(5, 5, 9),
(6, 6, 9),
(7, 7, 9),
(8, 8, 9),
(9, 9, 9),
(10, 10, 9),
(11, 11, 9),
(12, 12, 9),
(13, 13, 9),
(14, 14, 10),
(15, 15, 10),
(16, 16, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Conocimientos`
--
ALTER TABLE `Conocimientos`
  ADD PRIMARY KEY (`idConocimientos`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `DatosEconomicos`
--
ALTER TABLE `DatosEconomicos`
  ADD PRIMARY KEY (`idDatosEconomicos`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `DatosGenerales`
--
ALTER TABLE `DatosGenerales`
  ADD PRIMARY KEY (`idDatosGenerales`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `Documentacion`
--
ALTER TABLE `Documentacion`
  ADD PRIMARY KEY (`idDocumentacion`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `DomSolicitante`
--
ALTER TABLE `DomSolicitante`
  ADD PRIMARY KEY (`idDomSolicitante`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `EdoSalud`
--
ALTER TABLE `EdoSalud`
  ADD PRIMARY KEY (`idEdoSalud`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `Empleos`
--
ALTER TABLE `Empleos`
  ADD PRIMARY KEY (`idEmpleos`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `Escolaridad`
--
ALTER TABLE `Escolaridad`
  ADD PRIMARY KEY (`idEscolaridad`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `Esposa`
--
ALTER TABLE `Esposa`
  ADD PRIMARY KEY (`idEsposaSol`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `Madre`
--
ALTER TABLE `Madre`
  ADD PRIMARY KEY (`idMadreSol`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `PadreSol`
--
ALTER TABLE `PadreSol`
  ADD PRIMARY KEY (`idPadreSol`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `RefFamiliar`
--
ALTER TABLE `RefFamiliar`
  ADD PRIMARY KEY (`idFamiliar`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- Indices de la tabla `Solicitante`
--
ALTER TABLE `Solicitante`
  ADD PRIMARY KEY (`idSolicitante`);

--
-- Indices de la tabla `SolicitudTrabajo`
--
ALTER TABLE `SolicitudTrabajo`
  ADD PRIMARY KEY (`idSolicitudTrabajo`),
  ADD KEY `idSolicitante_idx` (`idSolicitante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Conocimientos`
--
ALTER TABLE `Conocimientos`
  MODIFY `idConocimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `DatosEconomicos`
--
ALTER TABLE `DatosEconomicos`
  MODIFY `idDatosEconomicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `DatosGenerales`
--
ALTER TABLE `DatosGenerales`
  MODIFY `idDatosGenerales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Documentacion`
--
ALTER TABLE `Documentacion`
  MODIFY `idDocumentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `DomSolicitante`
--
ALTER TABLE `DomSolicitante`
  MODIFY `idDomSolicitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `EdoSalud`
--
ALTER TABLE `EdoSalud`
  MODIFY `idEdoSalud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `Empleos`
--
ALTER TABLE `Empleos`
  MODIFY `idEmpleos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `Esposa`
--
ALTER TABLE `Esposa`
  MODIFY `idEsposaSol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `Madre`
--
ALTER TABLE `Madre`
  MODIFY `idMadreSol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `PadreSol`
--
ALTER TABLE `PadreSol`
  MODIFY `idPadreSol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `RefFamiliar`
--
ALTER TABLE `RefFamiliar`
  MODIFY `idFamiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `Solicitante`
--
ALTER TABLE `Solicitante`
  MODIFY `idSolicitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `SolicitudTrabajo`
--
ALTER TABLE `SolicitudTrabajo`
  MODIFY `idSolicitudTrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Conocimientos`
--
ALTER TABLE `Conocimientos`
  ADD CONSTRAINT `FKcono_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DatosEconomicos`
--
ALTER TABLE `DatosEconomicos`
  ADD CONSTRAINT `FKdatos_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DatosGenerales`
--
ALTER TABLE `DatosGenerales`
  ADD CONSTRAINT `FKdg_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Documentacion`
--
ALTER TABLE `Documentacion`
  ADD CONSTRAINT `FKDoc_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DomSolicitante`
--
ALTER TABLE `DomSolicitante`
  ADD CONSTRAINT `FK_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `EdoSalud`
--
ALTER TABLE `EdoSalud`
  ADD CONSTRAINT `FKedo_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Empleos`
--
ALTER TABLE `Empleos`
  ADD CONSTRAINT `FKempleos_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Escolaridad`
--
ALTER TABLE `Escolaridad`
  ADD CONSTRAINT `FKesc_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Esposa`
--
ALTER TABLE `Esposa`
  ADD CONSTRAINT `FKesp_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Madre`
--
ALTER TABLE `Madre`
  ADD CONSTRAINT `FKmadre_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PadreSol`
--
ALTER TABLE `PadreSol`
  ADD CONSTRAINT `FKpadre_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `RefFamiliar`
--
ALTER TABLE `RefFamiliar`
  ADD CONSTRAINT `FKref_idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `SolicitudTrabajo`
--
ALTER TABLE `SolicitudTrabajo`
  ADD CONSTRAINT `idSolicitante` FOREIGN KEY (`idSolicitante`) REFERENCES `Solicitante` (`idSolicitante`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
