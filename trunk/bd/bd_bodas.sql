-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 03-11-2011 a las 19:56:29
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `bd_bodas`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `modulo`
-- 

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL auto_increment,
  `nombre_modulo` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id_modulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `modulo`
-- 

INSERT INTO `modulo` VALUES (1, 'Administracion');
INSERT INTO `modulo` VALUES (2, 'Catalogo');
INSERT INTO `modulo` VALUES (3, 'Reportes');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `paginas`
-- 

CREATE TABLE `paginas` (
  `id_pagina` int(11) NOT NULL auto_increment,
  `id_modulo` int(11) NOT NULL default '0',
  `nombre_pagina` text NOT NULL,
  `url_pagina` varchar(50) character set latin1 NOT NULL default '',
  PRIMARY KEY  (`id_pagina`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- Volcar la base de datos para la tabla `paginas`
-- 

INSERT INTO `paginas` VALUES (1, 1, 'Administraci&oacute;n de usuarios', 'usuarios.php');
INSERT INTO `paginas` VALUES (19, 1, 'Proveedores rubros', 'ProveedorRubro.php');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores`
-- 

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL auto_increment,
  `id_rubro_proveedor` int(11) NOT NULL,
  `nombre_proveedor_rubro` text NOT NULL,
  `logo_proveedor` varchar(300) NOT NULL,
  `descripcion1_proveedor` text NOT NULL,
  `descripcion2_proveedor` text NOT NULL,
  `direccion_proveedor` text NOT NULL,
  `telefono1_proveedor` varchar(100) NOT NULL,
  `telefono2_proveedor` varchar(100) NOT NULL,
  `telefono3_proveedor` varchar(100) NOT NULL,
  `telefono4_proveedor` varchar(100) NOT NULL,
  `email_proveedor` varchar(150) NOT NULL,
  `web_proveedor` varchar(200) NOT NULL,
  `mapa_proveedor` text NOT NULL,
  `fecha_registro_proveedor` datetime NOT NULL,
  `estado_cuenta_proveedor` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `proveedores`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_imagenes`
-- 

CREATE TABLE `proveedores_imagenes` (
  `id_proveedor_imagen` int(11) NOT NULL auto_increment,
  `imagen_proveedor_imagen` varchar(250) NOT NULL,
  `estado_proveedor_imagen` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor_imagen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_imagenes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_publicaciones`
-- 

CREATE TABLE `proveedores_publicaciones` (
  `id_proveedor_publicacion` int(11) NOT NULL auto_increment,
  `texto_proveedor_publicacion` text NOT NULL,
  `fecha_proveedor_publicacion` datetime NOT NULL,
  `estado_proveedor_publicacion` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor_publicacion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_publicaciones`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_recomendados`
-- 

CREATE TABLE `proveedores_recomendados` (
  `id_proveedor_recomendado` int(11) NOT NULL auto_increment,
  `imagen_proveedor_recomendado` varchar(250) NOT NULL,
  `link_proveedor_recomendado` varchar(250) NOT NULL,
  `estado_proveedor_recomendado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor_recomendado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_recomendados`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_rubros`
-- 

CREATE TABLE `proveedores_rubros` (
  `id_proveedor_rubro` int(11) NOT NULL auto_increment,
  `nombre_proveedor_rubro` text NOT NULL,
  PRIMARY KEY  (`id_proveedor_rubro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_rubros`
-- 

INSERT INTO `proveedores_rubros` VALUES (4, 'Accesorios y calzado');
INSERT INTO `proveedores_rubros` VALUES (5, 'Aerolineas');
INSERT INTO `proveedores_rubros` VALUES (6, 'Agencias de viajes');
INSERT INTO `proveedores_rubros` VALUES (7, 'Albumes');
INSERT INTO `proveedores_rubros` VALUES (8, 'Asesoria, Wedding Planner');
INSERT INTO `proveedores_rubros` VALUES (9, 'Autos & Limousines');
INSERT INTO `proveedores_rubros` VALUES (10, 'Belleza corporal y cirugia');
INSERT INTO `proveedores_rubros` VALUES (11, 'Bouquets & Arreglos florales');
INSERT INTO `proveedores_rubros` VALUES (12, 'Catering');
INSERT INTO `proveedores_rubros` VALUES (13, 'Chocolates');
INSERT INTO `proveedores_rubros` VALUES (14, 'Clases de Vals');
INSERT INTO `proveedores_rubros` VALUES (15, 'Coros e instrumentos');
INSERT INTO `proveedores_rubros` VALUES (16, 'CotillÃ³n');
INSERT INTO `proveedores_rubros` VALUES (17, 'DecoraciÃ³n');
INSERT INTO `proveedores_rubros` VALUES (18, 'Despedidas de Solteros');
INSERT INTO `proveedores_rubros` VALUES (19, 'ElectrodomÃ©sticos');
INSERT INTO `proveedores_rubros` VALUES (20, 'Equipos de sonido, DJÂ´s');
INSERT INTO `proveedores_rubros` VALUES (21, 'EstÃ©tica Dental');
INSERT INTO `proveedores_rubros` VALUES (22, 'EstÃ©tica Integral');
INSERT INTO `proveedores_rubros` VALUES (23, 'Fitness');
INSERT INTO `proveedores_rubros` VALUES (24, 'Fotografias');
INSERT INTO `proveedores_rubros` VALUES (25, 'Hogar');
INSERT INTO `proveedores_rubros` VALUES (26, 'Hoteles');
INSERT INTO `proveedores_rubros` VALUES (27, 'Inmobiliarias, Hipotecarios');
INSERT INTO `proveedores_rubros` VALUES (28, 'Joyas');
INSERT INTO `proveedores_rubros` VALUES (29, 'Lenceria');
INSERT INTO `proveedores_rubros` VALUES (30, 'Licores & bar');
INSERT INTO `proveedores_rubros` VALUES (31, 'Lista de Novios');
INSERT INTO `proveedores_rubros` VALUES (32, 'Locales & Salones');
INSERT INTO `proveedores_rubros` VALUES (33, 'Luna de Miel');
INSERT INTO `proveedores_rubros` VALUES (34, 'Maestro de Ceremonias');
INSERT INTO `proveedores_rubros` VALUES (35, 'Maquillaje y Peinado');
INSERT INTO `proveedores_rubros` VALUES (36, 'Orquestas');
INSERT INTO `proveedores_rubros` VALUES (37, 'Partes y Caligrafia');
INSERT INTO `proveedores_rubros` VALUES (38, 'Plateria');
INSERT INTO `proveedores_rubros` VALUES (39, 'ProducciÃ³n de eventos');
INSERT INTO `proveedores_rubros` VALUES (40, 'Recuerdos y Petalos');
INSERT INTO `proveedores_rubros` VALUES (41, 'ReproducciÃ³n y Maternidad');
INSERT INTO `proveedores_rubros` VALUES (42, 'Restaurantes');
INSERT INTO `proveedores_rubros` VALUES (43, 'Salones de Belleza');
INSERT INTO `proveedores_rubros` VALUES (44, 'Tiaras');
INSERT INTO `proveedores_rubros` VALUES (45, 'Tortas');
INSERT INTO `proveedores_rubros` VALUES (46, 'Trajes de Noche');
INSERT INTO `proveedores_rubros` VALUES (47, 'Trajes de Novio');
INSERT INTO `proveedores_rubros` VALUES (48, 'Vestidos de Novia');
INSERT INTO `proveedores_rubros` VALUES (49, 'Video');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedor_red_social`
-- 

CREATE TABLE `proveedor_red_social` (
  `id_proveedor` int(11) NOT NULL,
  `id_red_social` int(11) NOT NULL,
  `estado_red_social` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `proveedor_red_social`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedor_seguidor`
-- 

CREATE TABLE `proveedor_seguidor` (
  `id_proveedor` int(11) NOT NULL,
  `id_usuario_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `proveedor_seguidor`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `redes_sociales`
-- 

CREATE TABLE `redes_sociales` (
  `id_red_social` int(11) NOT NULL auto_increment,
  `nombre_red_social` varchar(250) NOT NULL,
  `link_red_social` varchar(250) NOT NULL,
  `estado_red_social` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_red_social`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `redes_sociales`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rol`
-- 

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL auto_increment,
  `nombre_rol` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id_rol`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `rol`
-- 

INSERT INTO `rol` VALUES (1, 'Administrador');
INSERT INTO `rol` VALUES (2, 'Asistente');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rol_usuario`
-- 

CREATE TABLE `rol_usuario` (
  `id_rol` int(11) NOT NULL auto_increment,
  `nombre_rol` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `rol_usuario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipos_cuentas`
-- 

CREATE TABLE `tipos_cuentas` (
  `id_tipo_cuenta` int(11) NOT NULL auto_increment,
  `nombre_tipo_cuenta` varchar(250) NOT NULL,
  `estado_tipo_cuenta` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_tipo_cuenta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tipos_cuentas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `id_rol` int(11) NOT NULL default '0',
  `nombre_usuario` varchar(50) NOT NULL default '',
  `apellidos_usuario` varchar(50) NOT NULL default '',
  `email_usuario` varchar(50) NOT NULL default '',
  `login_usuario` varchar(20) NOT NULL default '',
  `password_usuario` varchar(20) NOT NULL default '',
  `fecha_ingreso_usuario` date NOT NULL default '0000-00-00',
  `lectura_usuario` tinyint(1) NOT NULL default '1',
  `escritura_usuario` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (2, 1, 'usuario', 'usuario', 'usuario@sitio.com', 'usuario', '123456', '2011-10-27', 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_clientes`
-- 

CREATE TABLE `usuarios_clientes` (
  `id_usuario_cliente` int(11) NOT NULL auto_increment,
  `id_tipo_cuenta` int(11) NOT NULL,
  `nombre_usuario_cliente` varchar(250) NOT NULL,
  `email_usuario_cliente` varchar(250) NOT NULL,
  `nick_usuario_cliente` varchar(250) NOT NULL,
  `clave_usuario_cliente` varchar(250) NOT NULL,
  `fecha_registro_usuario_cliente` datetime NOT NULL,
  `estado_registro_usuario_cliente` tinyint(1) NOT NULL,
  `estado_cuenta_usuario_cliente` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_clientes_cuentas_relacionadas`
-- 

CREATE TABLE `usuarios_clientes_cuentas_relacionadas` (
  `id_usuario_cliente` int(11) NOT NULL,
  `id_cuenta_relacionada` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes_cuentas_relacionadas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_paginas`
-- 

CREATE TABLE `usuarios_paginas` (
  `id_usuario` int(11) NOT NULL default '0',
  `id_pagina` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `usuarios_paginas`
-- 

INSERT INTO `usuarios_paginas` VALUES (2, 19);
INSERT INTO `usuarios_paginas` VALUES (2, 1);
