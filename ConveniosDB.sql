SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `convenios` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `convenios`;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `a_b`;
DROP TABLE IF EXISTS `a_b_temp`;
DROP TABLE IF EXISTS `a_c`;
DROP TABLE IF EXISTS `a_c_temp`;
DROP TABLE IF EXISTS `actividad`;
DROP TABLE IF EXISTS `beneficiario`;
DROP TABLE IF EXISTS `e_c`;
DROP TABLE IF EXISTS `e_c_temp`;
DROP TABLE IF EXISTS `f_c`;
DROP TABLE IF EXISTS `f_c_temp`;
DROP TABLE IF EXISTS `facultad`;
DROP TABLE IF EXISTS `o_c`;
DROP TABLE IF EXISTS `o_c_temp`;
DROP TABLE IF EXISTS `oficinaadministrativa`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `user_rol`;
DROP TABLE IF EXISTS `v_convenios`;
DROP TABLE IF EXISTS `v_conveniosxpais`;
DROP TABLE IF EXISTS `v_dashboard`;
DROP TABLE IF EXISTS `v_toppaisesconmasconvenios`;
DROP TABLE IF EXISTS `entidad`;
DROP TABLE IF EXISTS `pais`;
DROP TABLE IF EXISTS `continente`;
DROP TABLE IF EXISTS `tipo_entidad`;
DROP TABLE IF EXISTS `convenio`;


DROP FUNCTION IF EXISTS `CODIGOFINAL`;
DROP FUNCTION IF EXISTS `new_function`;
DROP FUNCTION IF EXISTS `NOI`;
DROP FUNCTION IF EXISTS `NUMEROCODIGO`;
DROP PROCEDURE IF EXISTS `cargar_continentes`;
DROP PROCEDURE IF EXISTS `cargar_pais`;
DROP PROCEDURE IF EXISTS `insertarConvenio`;

DROP VIEW if exists `v_dashboard`;
DROP VIEW if exists `v_conveniosxpais`;
DROP VIEW if exists `v_toppaisesconmasconvenios`;
--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` bigint(20) NOT NULL,
  `actividad` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaact` date DEFAULT NULL,
  `convenio` bigint(20) NOT NULL,
  `beneficiarios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_b`
--


CREATE TABLE `a_b` (
  `id` bigint(20) NOT NULL,
  `actividad` bigint(20) NOT NULL,
  `beneficiaro` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_b_temp`
--


CREATE TABLE `a_b_temp` (
  `id` bigint(20) NOT NULL,
  `beneficiaro` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_c`
--

CREATE TABLE `a_c` (
  `id` bigint(20) NOT NULL,
  `actividad` bigint(20) NOT NULL,
  `convenio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_c_temp`
--

CREATE TABLE `a_c_temp` (
  `id` bigint(20) NOT NULL,
  `actividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `idBeneficiario` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continente`
--

CREATE TABLE `continente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `continente`
--

INSERT INTO `continente` (`id`, `nombre`) VALUES
(1, 'America'),
(2, 'África'),
(3, 'Asia'),
(4, 'Antártida'),
(5, 'Europa'),
(6, 'Oceanía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `id` bigint(20) NOT NULL,
  `Codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `objetivo` text NOT NULL,
  `clasificacion` varchar(45) NOT NULL,
  `areatematica` varchar(50) NOT NULL,
  `activo` varchar(50) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechacaducidad` date NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `archivo` text NOT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(800) NOT NULL,
  `idpais` int(11) NOT NULL,
  `direccion` varchar(800) NOT NULL,
  `Siglas` varchar(50) DEFAULT NULL,
  `idtipoentidad` int(11) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `personacontacto` varchar(50) DEFAULT NULL,
  `personacargo` varchar(100) DEFAULT NULL,
  `personatelefono` varchar(50) DEFAULT NULL,
  `personaemail` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `idcontinente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_c`
--

CREATE TABLE `e_c` (
  `id` bigint(20) NOT NULL,
  `entidad` bigint(20) NOT NULL,
  `convenio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_c_temp`
--

CREATE TABLE `e_c_temp` (
  `id` bigint(20) NOT NULL,
  `entidad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `personacontacto` varchar(50) DEFAULT NULL,
  `personatelefono` varchar(50) DEFAULT NULL,
  `personaemail` varchar(50) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `f_c`
--

CREATE TABLE `f_c` (
  `id` bigint(20) NOT NULL,
  `facultad` varchar(50) NOT NULL,
  `convenio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `f_c_temp`
--

CREATE TABLE `f_c_temp` (
  `id` bigint(20) NOT NULL,
  `facultad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinaadministrativa`
--

CREATE TABLE `oficinaadministrativa` (
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `personacontacto` varchar(50) DEFAULT NULL,
  `personatelefono` varchar(50) DEFAULT NULL,
  `personaemail` varchar(50) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `o_c`
--

CREATE TABLE `o_c` (
  `id` bigint(20) NOT NULL,
  `oficina` varchar(50) NOT NULL,
  `convenio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `o_c_temp`
--

CREATE TABLE `o_c_temp` (
  `id` bigint(20) NOT NULL,
  `oficina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `idcontinente` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `idcontinente`, `pais`) VALUES
(1, 1, 'El Salvador'),
(2, 1, 'Estados Unidos'),
(3, 1, 'Canadá'),
(4, 1, 'México'),
(5, 1, 'Belice'),
(6, 1, 'Costa Rica'),
(7, 1, 'Guatemala'),
(8, 1, 'Honduras'),
(9, 1, 'Nicaragua'),
(10, 1, 'Panamá'),
(11, 1, 'Argentina'),
(12, 1, 'Bolivia'),
(13, 1, 'Brasil'),
(14, 1, 'Chile'),
(15, 1, 'Colombia'),
(16, 1, 'Ecuador'),
(17, 1, 'Guyana'),
(18, 1, 'Paraguay'),
(19, 1, 'Perú'),
(20, 1, 'Surinam'),
(21, 1, 'Trinidad y Tobago'),
(22, 1, 'Uruguay'),
(23, 1, 'Venezuela'),
(24, 1, 'Guayana Francesa'),
(25, 1, 'Cuba'),
(132, 2, 'Angola'),
(133, 2, 'Argelia'),
(134, 2, 'Benín'),
(135, 2, 'Botsuana'),
(136, 2, 'Burkina Faso'),
(137, 2, 'Burundi'),
(138, 2, 'Cabo Verde'),
(139, 2, 'Camerún'),
(140, 2, 'Chad'),
(141, 2, 'Comoras'),
(142, 2, 'Congo-Brazzaville'),
(143, 2, 'Congo-Kinsasa'),
(144, 2, 'Costa de Marfil'),
(145, 2, 'Eritrea'),
(146, 2, 'Etiopía'),
(147, 2, 'Gabón'),
(148, 2, 'Gambia'),
(149, 2, 'Ghana'),
(150, 2, 'Guinea'),
(151, 2, 'Guinea-Bisáu'),
(152, 2, 'Guinea Ecuatorial'),
(153, 2, 'Kenia'),
(154, 2, 'Lesoto'),
(155, 2, 'Liberia'),
(156, 2, 'Libia'),
(157, 2, 'Madagascar'),
(158, 2, 'Malaui'),
(159, 2, 'Malí'),
(160, 2, 'Marruecos'),
(161, 2, 'Mauricio'),
(162, 2, 'Mozambique'),
(163, 2, 'Namibia'),
(164, 2, 'Níger'),
(165, 2, 'Nigeria'),
(166, 2, 'República Centroafricana'),
(167, 2, 'Ruanda'),
(168, 2, 'Santo Tomé y Príncipe'),
(169, 2, 'Senegal'),
(170, 2, 'Seychelles'),
(171, 2, 'Sierra Leona'),
(172, 2, 'Somalia'),
(173, 2, 'Suazilandia'),
(174, 2, 'Sudáfrica'),
(175, 2, 'Sudán'),
(176, 2, 'Sudan del sur'),
(177, 2, 'Tanzania'),
(178, 2, 'Togo'),
(179, 2, 'Túnez'),
(180, 2, 'Uganda'),
(181, 2, 'Yibuti'),
(182, 2, 'Zambia'),
(183, 2, 'Zimbabue'),
(184, 2, 'Egipto'),
(185, 3, 'Afganistán'),
(186, 3, 'Arabia Saudita'),
(187, 3, 'Bangladés'),
(188, 3, 'Baréin'),
(189, 3, 'Birmania'),
(190, 3, 'Brunéi'),
(191, 3, 'Bután'),
(192, 3, 'Camboya'),
(193, 3, 'Catar'),
(194, 3, 'China'),
(195, 3, 'Corea del Norte'),
(196, 3, 'Corea del Sur'),
(197, 3, 'Emiratos Árabes Unidos'),
(198, 3, 'Filipinas'),
(199, 3, 'India'),
(200, 3, 'Indonesia'),
(201, 3, 'Irak'),
(202, 3, 'Irán'),
(203, 3, 'Israel'),
(204, 3, 'Japón'),
(205, 3, 'Jordania'),
(206, 3, 'Kirguistán'),
(207, 3, 'Kuwait'),
(208, 3, 'Laos'),
(209, 3, 'Líbano'),
(210, 3, 'Maldivas'),
(211, 3, 'Mongolia'),
(212, 3, 'Nepal'),
(213, 3, 'Omán'),
(214, 3, 'Pakistán'),
(215, 3, 'Singapur'),
(216, 3, 'Siria'),
(217, 3, 'Sri Lanka'),
(218, 3, 'Tailandia'),
(219, 3, 'Tayikistán'),
(220, 3, 'Timor Oriental'),
(221, 3, 'Turkmenistán'),
(222, 3, 'Uzbekistán'),
(223, 3, 'Vietnam'),
(224, 3, 'Yemen'),
(225, 3, 'Palestina'),
(226, 3, 'Taiwán'),
(227, 5, 'Albania'),
(229, 5, 'Alemania'),
(230, 5, 'Andorra'),
(231, 5, 'Austria'),
(232, 5, 'Bélgica'),
(233, 5, 'Bielorrusia'),
(234, 5, 'Bosnia y Herzegovina'),
(235, 5, 'Bulgaria'),
(236, 5, 'Ciudad del Vaticano'),
(237, 5, 'Croacia'),
(238, 5, 'Dinamarca'),
(239, 5, 'Eslovaquia'),
(240, 5, 'Eslovenia'),
(241, 5, 'España'),
(242, 5, 'Estonia'),
(243, 5, 'Finlandia'),
(244, 5, 'Francia'),
(245, 5, 'Grecia'),
(246, 5, 'Hungría'),
(247, 5, 'Irlanda'),
(248, 5, 'Islandia'),
(249, 5, 'Italia'),
(250, 5, 'Letonia'),
(251, 5, 'Liechtenstein'),
(252, 5, 'Lituania'),
(253, 5, 'Luxemburgo'),
(254, 5, 'Macedonia del Norte'),
(255, 5, 'Malta'),
(256, 5, 'Moldavia'),
(257, 5, 'Mónaco'),
(258, 5, 'Montenegro'),
(259, 5, 'Noruega'),
(260, 5, 'Países Bajos'),
(261, 5, 'Polonia'),
(262, 5, 'Portugal'),
(263, 5, 'Reino Unido'),
(264, 5, 'República Checa'),
(265, 5, 'Rumania'),
(266, 5, 'San Marino'),
(267, 5, 'Serbia'),
(268, 5, 'Suecia'),
(269, 5, 'Suiza'),
(270, 5, 'Ucrania'),
(271, 5, 'Armenia'),
(272, 5, 'Azerbaiyán'),
(273, 5, 'Chipre'),
(274, 5, 'Georgia'),
(275, 5, 'Kazajistán'),
(276, 5, 'Rusia'),
(277, 5, 'Turquía'),
(278, 6, 'Australia'),
(279, 6, 'Estados Federados de Micronesia'),
(280, 6, 'Fiyi'),
(281, 6, 'Kiribati'),
(282, 6, 'Islas Marshall'),
(283, 6, 'Islas Salomón'),
(284, 6, 'Nauru'),
(285, 6, 'Nueva Zelanda'),
(286, 6, 'Palaos'),
(287, 6, 'Papúa Nueva Guinea'),
(288, 6, 'Samoa'),
(289, 6, 'Tonga'),
(290, 6, 'Tuvalu'),
(291, 6, 'Vanuatu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_entidad`
--

CREATE TABLE `tipo_entidad` (
  `idtipo_entidad` int(11) NOT NULL,
  `tipo_entidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_entidad`
--

INSERT INTO `tipo_entidad` (`idtipo_entidad`, `tipo_entidad`) VALUES
(1, 'Nacional Gubernamentales'),
(2, 'Nacional Municipalidades'),
(3, 'Nacional ONG´S y Autónomas'),
(4, 'Nacional Privadas'),
(5, 'Nacional Otra'),
(6, 'Internacional Universidades'),
(7, 'Internacional Entidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nombre_user` varchar(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `rol_` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nombre_user`, `user`, `pass`, `rol_`) VALUES
(1, 'Lic. Eunice', 'admin', 'MTIzNA==', 1);
INSERT INTO `user` (`id_user`, `nombre_user`, `user`, `pass`, `rol_`) VALUES
(2, 'Editor', 'editor', 'MTExMQ==', 2);
INSERT INTO `user` (`id_user`, `nombre_user`, `user`, `pass`, `rol_`) VALUES
(3, 'Lector', 'lector', 'MDAwMA==', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_rol`
--

CREATE TABLE `user_rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_rol`
--

INSERT INTO `user_rol` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Editor'),
(3, 'Lector');

-- --------------------------------------------------------

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `a_b`
--
ALTER TABLE `a_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_A_B_Beneficiario_idx` (`beneficiaro`),
  ADD KEY `fk_A_B_Actividad1_idx` (`actividad`);

--
-- Indices de la tabla `a_b_temp`
--
ALTER TABLE `a_b_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_A_B_temp_Beneficiario1_idx` (`beneficiaro`);

--
-- Indices de la tabla `a_c`
--
ALTER TABLE `a_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_A_C_Actividad1_idx` (`actividad`),
  ADD KEY `fk_A_C_Convenio1_idx` (`convenio`);

--
-- Indices de la tabla `a_c_temp`
--
ALTER TABLE `a_c_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_A_C_temp_Actividad1_idx` (`actividad`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`idBeneficiario`);

--
-- Indices de la tabla `continente`
--
ALTER TABLE `continente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Entidad_Pais1_idx` (`idpais`),
  ADD KEY `FK_entidad_tipo_entidad` (`idtipoentidad`),
  ADD KEY `FK_entidad_continente` (`idcontinente`);

--
-- Indices de la tabla `e_c`
--
ALTER TABLE `e_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_E_C_Entidad1_idx` (`entidad`),
  ADD KEY `fk_E_C_Convenio1_idx` (`convenio`);

--
-- Indices de la tabla `e_c_temp`
--
ALTER TABLE `e_c_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_E_C_temp_Entidad1_idx` (`entidad`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `f_c`
--
ALTER TABLE `f_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_F_C_Facultad1_idx` (`facultad`),
  ADD KEY `fk_F_C_Convenio1_idx` (`convenio`);

--
-- Indices de la tabla `f_c_temp`
--
ALTER TABLE `f_c_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_F_C_temp_Facultad1_idx` (`facultad`);

--
-- Indices de la tabla `oficinaadministrativa`
--
ALTER TABLE `oficinaadministrativa`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `o_c`
--
ALTER TABLE `o_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_O_C_OficinaAdministrativa1_idx` (`oficina`),
  ADD KEY `fk_O_C_Convenio1_idx` (`convenio`);

--
-- Indices de la tabla `o_c_temp`
--
ALTER TABLE `o_c_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_O_C_temp_OficinaAdministrativa1_idx` (`oficina`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pais_continente1_idx` (`idcontinente`);

--
-- Indices de la tabla `tipo_entidad`
--
ALTER TABLE `tipo_entidad`
  ADD PRIMARY KEY (`idtipo_entidad`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `rol_a_user_idx` (`rol_`);

--
-- Indices de la tabla `user_rol`
--
ALTER TABLE `user_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `a_b`
--
ALTER TABLE `a_b`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `a_b_temp`
--
ALTER TABLE `a_b_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `a_c`
--
ALTER TABLE `a_c`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `a_c_temp`
--
ALTER TABLE `a_c_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `continente`
--
ALTER TABLE `continente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `e_c`
--
ALTER TABLE `e_c`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `e_c_temp`
--
ALTER TABLE `e_c_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `f_c`
--
ALTER TABLE `f_c`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `f_c_temp`
--
ALTER TABLE `f_c_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `o_c`
--
ALTER TABLE `o_c`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `o_c_temp`
--
ALTER TABLE `o_c_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT de la tabla `tipo_entidad`
--
ALTER TABLE `tipo_entidad`
  MODIFY `idtipo_entidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_rol`
--
ALTER TABLE `user_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `a_b`
--
ALTER TABLE `a_b`
  ADD CONSTRAINT `fk_A_B_Actividad1` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id`),
  ADD CONSTRAINT `fk_A_B_Beneficiario` FOREIGN KEY (`beneficiaro`) REFERENCES `beneficiario` (`idBeneficiario`);

--
-- Filtros para la tabla `a_b_temp`
--
ALTER TABLE `a_b_temp`
  ADD CONSTRAINT `fk_A_B_temp_Beneficiario1` FOREIGN KEY (`beneficiaro`) REFERENCES `beneficiario` (`idBeneficiario`);

--
-- Filtros para la tabla `a_c`
--
ALTER TABLE `a_c`
  ADD CONSTRAINT `fk_A_C_Actividad1` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id`),
  ADD CONSTRAINT `fk_A_C_Convenio1` FOREIGN KEY (`convenio`) REFERENCES `convenio` (`id`);

--
-- Filtros para la tabla `a_c_temp`
--
ALTER TABLE `a_c_temp`
  ADD CONSTRAINT `fk_A_C_temp_Actividad1` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id`);

--
-- Filtros para la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD CONSTRAINT `FK_entidad_continente` FOREIGN KEY (`idcontinente`) REFERENCES `continente` (`id`),
  ADD CONSTRAINT `FK_entidad_tipo_entidad` FOREIGN KEY (`idtipoentidad`) REFERENCES `tipo_entidad` (`idtipo_entidad`),
  ADD CONSTRAINT `fk_Entidad_Pais1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `e_c`
--
ALTER TABLE `e_c`
  ADD CONSTRAINT `fk_E_C_Convenio1` FOREIGN KEY (`convenio`) REFERENCES `convenio` (`id`),
  ADD CONSTRAINT `fk_E_C_Entidad1` FOREIGN KEY (`entidad`) REFERENCES `entidad` (`id`);

--
-- Filtros para la tabla `e_c_temp`
--
ALTER TABLE `e_c_temp`
  ADD CONSTRAINT `entidad` FOREIGN KEY (`entidad`) REFERENCES `entidad` (`id`);

--
-- Filtros para la tabla `f_c`
--
ALTER TABLE `f_c`
  ADD CONSTRAINT `fk_F_C_Convenio1` FOREIGN KEY (`convenio`) REFERENCES `convenio` (`id`),
  ADD CONSTRAINT `fk_F_C_Facultad1` FOREIGN KEY (`facultad`) REFERENCES `facultad` (`codigo`);

--
-- Filtros para la tabla `f_c_temp`
--
ALTER TABLE `f_c_temp`
  ADD CONSTRAINT `fk_F_C_temp_Facultad1` FOREIGN KEY (`facultad`) REFERENCES `facultad` (`codigo`);

--
-- Filtros para la tabla `o_c`
--
ALTER TABLE `o_c`
  ADD CONSTRAINT `fk_O_C_Convenio1` FOREIGN KEY (`convenio`) REFERENCES `convenio` (`id`),
  ADD CONSTRAINT `fk_O_C_OficinaAdministrativa1` FOREIGN KEY (`oficina`) REFERENCES `oficinaadministrativa` (`codigo`);

--
-- Filtros para la tabla `o_c_temp`
--
ALTER TABLE `o_c_temp`
  ADD CONSTRAINT `fk_O_C_temp_OficinaAdministrativa1` FOREIGN KEY (`oficina`) REFERENCES `oficinaadministrativa` (`codigo`);

--
-- Filtros para la tabla `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `fk_pais_continente1` FOREIGN KEY (`idcontinente`) REFERENCES `continente` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `rol_a_user` FOREIGN KEY (`rol_`) REFERENCES `user_rol` (`id_rol`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/

DELIMITER ;;
CREATE FUNCTION `CODIGOFINAL`(fechainicio date) RETURNS varchar(50) CHARSET utf8
    DETERMINISTIC
BEGIN
DECLARE codigonacion varchar(2) default "NA";
DECLARE finalcode varchar(50) default "";
set @numerocodigo = 0;
set @numero = "";
(select convenios.NOI()) into codigonacion;
set @wherecode = concat(codigonacion, "-", year(fechainicio), "%");

select count(*) from convenio where Codigo like @wherecode into @numerocodigo;
set @numerocodigo= @numerocodigo + 1;

IF(@numerocodigo < 10)then
	set @numero = concat('00',@numerocodigo);
ELSEIF(@numerocodigo < 100) then
	set @numero = concat('0',@numerocodigo);
END IF;

(select concat(codigonacion, "-", year(fechainicio),"-", @numero)) into finalcode;

RETURN finalcode;
END ;;
DELIMITER ;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/


DELIMITER ;;
CREATE FUNCTION `new_function`(codigonacion varchar(50),  fechainicio date) RETURNS varchar(50) CHARSET utf8
    DETERMINISTIC
BEGIN
set @numerocodigo = 0;
set @numero = "";
set @wherecode = concat(codigonacion, "-", year(fechainicio), "%");

select count(*) from convenio where Codigo like @wherecode into @numerocodigo;
set @numerocodigo= @numerocodigo + 1;

IF(@numerocodigo < 10)then
	set @numero = concat('00',@numerocodigo);
ELSEIF(@numerocodigo < 100) then
	set @numero = concat('0',@numerocodigo);
END IF;

RETURN @numero;
END ;;
DELIMITER ;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/


DELIMITER ;;
CREATE FUNCTION `NOI`() RETURNS varchar(50) CHARSET utf8
    DETERMINISTIC
BEGIN
DECLARE CONTADOR INT DEFAULT 0;
DECLARE limite INT DEFAULT 0;
DECLARE P INT;
DECLARE CONFIRMACIONUNO varchar(2) DEFAULT "NA";
DECLARE CONFIRMACIONDOS varchar(2) DEFAULT "NA";
DECLARE CODIGO VARCHAR(2) DEFAULT "NA";

SELECT COUNT(*) FROM e_c_temp t inner join entidad e on e.id = t.entidad INTO limite;
/* CICLO */
WHILE (CONTADOR < LIMITE) DO
		(SELECT e.idpais FROM e_c_temp t inner join entidad e on e.id = t.entidad LIMIT CONTADOR,1) INTO P;
        IF(P = 1 ) THEN
			SET CONFIRMACIONUNO  = "NA";
            ELSE
            SET CONFIRMACIONDOS = "IN";
		END IF;
	SET CONTADOR = CONTADOR + 1;
END WHILE;
IF ((CONFIRMACIONUNO = "NA") = (CONFIRMACIONDOS = "NA")) THEN
	SET CODIGO = "NA";
else
	SET CODIGO = "IN";
END IF;
RETURN CODIGO;
END ;;
DELIMITER ;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/


DELIMITER ;;
CREATE FUNCTION `NUMEROCODIGO`(fechainicio date) RETURNS varchar(50) CHARSET utf8
    DETERMINISTIC
BEGIN
DECLARE codigonacion varchar(2) default "NA";
DECLARE finalcode varchar(50) default "";
set @numerocodigo = 0;
set @numero = "";
(select convenios.NOI()) into codigonacion;
set @wherecode = concat(codigonacion, "-", year(fechainicio), "%");

select count(*) from convenio where Codigo like @wherecode into @numerocodigo;
set @numerocodigo= @numerocodigo + 1;

IF(@numerocodigo < 10)then
	set @numero = concat('00',@numerocodigo);
ELSEIF(@numerocodigo < 100) then
	set @numero = concat('0',@numerocodigo);
END IF;

(select concat(codigonacion, "-", year(fechainicio),"-", @numero)) into finalcode;

RETURN finalcode;
END ;;
DELIMITER ;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/

DELIMITER ;;
CREATE PROCEDURE `cargar_continentes`()
begin
select * from continente;
end ;;
DELIMITER ;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/


DELIMITER ;;
CREATE PROCEDURE `cargar_pais`(in id int)
begin
select * from pais
where idcontinente = id ;
end ;;
DELIMITER ;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/


DELIMITER ;;
CREATE PROCEDURE `insertarConvenio`(in nombre varchar(50) , in objetivo text, in clasificacion varchar(45), in areatematica varchar(50),
 in activo varchar(50),  in estado varchar(45), in fechainicio date, in fechacaduca date, in tipo varchar(45), in archivo text, in observaciones text
 )
BEGIN
/*VARIABLES PARA INSERTAR CONVENIO*/
declare idinsertado bigint;
declare codigo varchar(50); 
declare nacion varchar(50);
/*VARIABLES PARA INSERTAR ENTIDADES*/
DECLARE CONTADOR INT DEFAULT 0;
DECLARE LIMITE INT DEFAULT 0;
DECLARE CODIGOENTIDAD BIGINT DEFAULT 0;
DECLARE CODIGOFACULTAD VARCHAR(50) DEFAULT "";
/*INSERTANDO EL CONVENIO*/
INSERT INTO `convenio` (`nombre`, `objetivo`, `clasificacion`, `areatematica`, `activo`,  `estado`, `fechainicio`, `fechacaducidad`, `tipo`, `archivo`, `observaciones`) VALUES (nombre, objetivo , clasificacion, areatematica,activo, estado, fechainicio, fechacaduca, tipo, archivo, observaciones);
set idinsertado = LAST_INSERT_ID();
(select convenios.CODIGOFINAL( fechainicio)) INTO codigo;
UPDATE `convenio` SET `Codigo` = codigo WHERE (`id` = idinsertado);
/*INSERTAR ENTIDADES*/
(SELECT COUNT(*) FROM e_c_temp) INTO LIMITE;
WHILE (CONTADOR < LIMITE) DO
	(SELECT entidad from e_c_temp limit CONTADOR,1) INTO CODIGOENTIDAD;
	INSERT INTO `e_c` (`entidad`, `convenio`) VALUES ( CODIGOENTIDAD, idinsertado);
	SET CONTADOR = CONTADOR + 1; 
END WHILE;
TRUNCATE TABLE e_c_temp;
/*INSERTAR FACULTADES*/
SET CONTADOR = 0;
(SELECT COUNT(*) FROM f_c_temp) INTO LIMITE;
WHILE (CONTADOR < LIMITE) DO
	(SELECT facultad from f_c_temp limit CONTADOR,1) INTO CODIGOFACULTAD;
    INSERT INTO `f_c` (`facultad`, `convenio`) VALUES (CODIGOFACULTAD, idinsertado);
    SET CONTADOR = CONTADOR + 1;
END WHILE;
TRUNCATE TABLE f_c_temp;
/*INSERTAR OFICIONAS*/
SET CONTADOR = 0;
SET CODIGOFACULTAD = "";
(SELECT COUNT(*) FROM o_c_temp) INTO LIMITE;
WHILE (CONTADOR < LIMITE) DO
	(SELECT oficina from o_c_temp limit CONTADOR,1) INTO CODIGOFACULTAD;
    INSERT INTO `o_c` (`oficina`, `convenio`) VALUES (CODIGOFACULTAD, idinsertado);
    SET CONTADOR = CONTADOR + 1;
END WHILE;
TRUNCATE TABLE o_c_temp;
SELECT codigo;
END ;;
DELIMITER ;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/

CREATE VIEW `v_dashboard` AS SELECT
    (
SELECT
    COUNT(0)
FROM
    `facultad`
) AS `facultades`,
(
    SELECT
        COUNT(0)
    FROM
        `facultad` `f`
    WHERE
        (`f`.`activo` = 1)
) AS `facultades_activas`,
(
SELECT
    COUNT(0)
FROM
    `entidad`
) AS `entidades`,
(
    SELECT
        COUNT(0)
    FROM
        `entidad` `e`
    WHERE
        (`e`.`activo` = 1)
) AS `entidades_activas`,
(
    SELECT
        COUNT(0)
    FROM
        `convenio`
    WHERE
        (`convenio`.`estado` <> 'Eliminado')
) AS `convenios`,
(
    SELECT
        COUNT(0)
    FROM
        `convenio` `c`
    WHERE
        (`c`.`activo` = 1)
) AS `convenios_activos`,
(
    SELECT
        COUNT(0)
    FROM
        `convenio` `c`
    WHERE
        (
            (
                `c`.`fechacaducidad` BETWEEN NOW() AND(NOW() + INTERVAL 4 MONTH)) AND(`c`.`estado` <> 'Eliminado'))
            ) AS `convenios_por_vencer`,
            (
            SELECT
                COUNT(0)
            FROM
                `actividad` `a`
            WHERE
                (
                    `a`.`fechaact` BETWEEN NOW() AND(NOW() + INTERVAL 4 MONTH))) AS `proximas_actividades`;
/*
----------------------------------------
----------------------------------------
----------------------------------------
*/

	CREATE VIEW `v_conveniosxpais` AS
    SELECT 
        `p`.`pais` AS `pais`, COUNT(0) AS `cant_convenios`
    FROM
        (((`convenio` `c`
        JOIN `e_c` `u` ON ((`c`.`id` = `u`.`convenio`)))
        JOIN `entidad` `e` ON ((`u`.`entidad` = `e`.`id`)))
        JOIN `pais` `p` ON ((`p`.`id` = `e`.`idpais`)))
    GROUP BY `e`.`idpais`;

/*
----------------------------------------
----------------------------------------
----------------------------------------
*/

	CREATE VIEW `v_toppaisesconmasconvenios` AS
    SELECT 
        `p`.`pais` AS `pais`, COUNT(0) AS `cant_convenios`
    FROM
        (((`convenio` `c`
        JOIN `e_c` `u` ON ((`c`.`id` = `u`.`convenio`)))
        JOIN `entidad` `e` ON ((`u`.`entidad` = `e`.`id`)))
        JOIN `pais` `p` ON ((`p`.`id` = `e`.`idpais`)))
    GROUP BY `e`.`idpais`
    ORDER BY COUNT(0) DESC
    LIMIT 10;

    /*
----------------------------------------
----------------------------------------
----------------------------------------
*/