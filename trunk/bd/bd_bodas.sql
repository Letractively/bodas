-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 28-11-2011 a las 14:22:59
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Volcar la base de datos para la tabla `paginas`
-- 

INSERT INTO `paginas` VALUES (1, 1, 'Administraci&oacute;n de usuarios', 'usuarios.php');
INSERT INTO `paginas` VALUES (19, 1, 'Proveedores rubros', 'ProveedorRubro.php');
INSERT INTO `paginas` VALUES (20, 1, 'Proveedores', 'Proveedor.php');
INSERT INTO `paginas` VALUES (21, 1, 'Usuarios registrados', 'UsuarioCliente.php');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores`
-- 

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL auto_increment,
  `id_proveedor_tipo` int(11) NOT NULL,
  `id_proveedor_rubro` int(11) NOT NULL,
  `nombre_proveedor` text NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Volcar la base de datos para la tabla `proveedores`
-- 

INSERT INTO `proveedores` VALUES (16, 1, 4, 'Proveedor de ejemplo 01', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (17, 2, 4, 'Proveedor de ejemplo 02', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (18, 1, 4, 'Proveedor de ejemplo 03', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (19, 1, 4, 'Proveedor de ejemplo 04', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (20, 1, 4, 'proveedor ejemplo 05', '123817_protones.jpg', 'proveedor ejemplo 05', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel congue purus. Nam velit urna, imperdiet id convallis non, sodales eu quam. Etiam id ante nec sapien volutpat euismod. Duis at fringilla nisi. Vestibulum in sem et nibh blandit luctus. Suspendisse eu dictum neque. Duis nulla leo, pellentesque bibendum semper ut, vulputate id mauris. Sed in turpis purus, id lacinia tellus. Vestibulum congue vulputate massa sit amet ornare.</p>\r\n', 'direccion', '12341324', '13241234', '13241324', '13241324', 'proveedor05@sitio.com', 'www.proveedor05.com', '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=lima,+peru&sll=40.396764,-3.713379&sspn=9.234287,19.753418&vpsrc=6&ie=UTF8&hq=&hnear=Miraflores,+Lima,+Per%C3%BA&t=m&ll=-12.1175,-77.043056&spn=0.741162,1.234589&z=10&iwloc=A&output=embed"></iframe><br /><small><a href="http://maps.google.es/maps?f=q&source=embed&hl=es&geocode=&q=lima,+peru&sll=40.396764,-3.713379&sspn=9.234287,19.753418&vpsrc=6&ie=UTF8&hq=&hnear=Miraflores,+Lima,+Per%C3%BA&t=m&ll=-12.1175,-77.043056&spn=0.741162,1.234589&z=10&iwloc=A" style="color:#0000FF;text-align:left">Ver mapa mÃ¡s grande</a></small>', '2011-11-23 12:18:44', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_imagenes`
-- 

CREATE TABLE `proveedores_imagenes` (
  `id_proveedor_imagen` int(11) NOT NULL auto_increment,
  `id_proveedor` int(11) NOT NULL,
  `imagen_proveedor_imagen` varchar(250) NOT NULL,
  `fecha_registro_proveedor_imagen` datetime NOT NULL,
  `estado_proveedor_imagen` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor_imagen`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_imagenes`
-- 

INSERT INTO `proveedores_imagenes` VALUES (64, 17, '155605_hp.jpg', '2011-11-14 03:56:05', 1);
INSERT INTO `proveedores_imagenes` VALUES (65, 17, '155605_indice.jpg', '2011-11-14 03:56:05', 1);
INSERT INTO `proveedores_imagenes` VALUES (68, 19, '153426_apple.jpg', '2011-11-15 03:34:26', 1);
INSERT INTO `proveedores_imagenes` VALUES (69, 19, '153426_chrome.jpg', '2011-11-15 03:34:26', 1);
INSERT INTO `proveedores_imagenes` VALUES (70, 19, '153426_firefox.jpg', '2011-11-15 03:34:26', 1);
INSERT INTO `proveedores_imagenes` VALUES (71, 19, '153427_hp.jpg', '2011-11-15 03:34:27', 1);
INSERT INTO `proveedores_imagenes` VALUES (72, 19, '153427_indice.jpg', '2011-11-15 03:34:27', 1);
INSERT INTO `proveedores_imagenes` VALUES (73, 19, '153427_look.jpg', '2011-11-15 03:34:27', 1);
INSERT INTO `proveedores_imagenes` VALUES (74, 19, '153427_win7.jpg', '2011-11-15 03:34:27', 1);
INSERT INTO `proveedores_imagenes` VALUES (61, 17, '155605_apple.jpg', '2011-11-14 03:56:05', 1);
INSERT INTO `proveedores_imagenes` VALUES (62, 17, '155605_chrome.jpg', '2011-11-14 03:56:05', 1);
INSERT INTO `proveedores_imagenes` VALUES (63, 17, '155605_firefox.jpg', '2011-11-14 03:56:05', 1);
INSERT INTO `proveedores_imagenes` VALUES (66, 17, '155605_look.jpg', '2011-11-14 03:56:05', 1);
INSERT INTO `proveedores_imagenes` VALUES (67, 17, '155605_win7.jpg', '2011-11-14 03:56:05', 1);
INSERT INTO `proveedores_imagenes` VALUES (76, 20, '135504_aerosmith-en-lima.jpg', '2011-11-25 01:55:04', 1);
INSERT INTO `proveedores_imagenes` VALUES (77, 20, '135504_protones.jpg', '2011-11-25 01:55:04', 1);
INSERT INTO `proveedores_imagenes` VALUES (78, 20, '135504_radiohead.jpg', '2011-11-25 01:55:04', 1);
INSERT INTO `proveedores_imagenes` VALUES (79, 20, '135505_vanessa.jpg', '2011-11-25 01:55:05', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_publicaciones`
-- 

CREATE TABLE `proveedores_publicaciones` (
  `id_proveedor_publicacion` int(11) NOT NULL auto_increment,
  `id_proveedor` int(11) NOT NULL,
  `texto_proveedor_publicacion` text NOT NULL,
  `fecha_proveedor_publicacion` datetime NOT NULL,
  `estado_proveedor_publicacion` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor_publicacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_publicaciones`
-- 

INSERT INTO `proveedores_publicaciones` VALUES (5, 20, 'af esf eas fasdf awef awe fawe fawe f', '2011-11-23 13:38:04', 0);
INSERT INTO `proveedores_publicaciones` VALUES (6, 20, 'ads fewad we caw caweecwa', '2011-11-23 13:38:04', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_publicaciones_comentarios`
-- 

CREATE TABLE `proveedores_publicaciones_comentarios` (
  `id_proveedor_publicacion_comentario` int(11) NOT NULL auto_increment,
  `id_proveedor_publicacion` int(11) NOT NULL,
  `id_usuario_cliente` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor_publicacion_comentario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_publicaciones_comentarios`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_recomendados`
-- 

CREATE TABLE `proveedores_recomendados` (
  `id_proveedor_recomendado` int(11) NOT NULL auto_increment,
  `id_proveedor` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `proveedores_redes_sociales`
-- 

CREATE TABLE `proveedores_redes_sociales` (
  `id_proveedor_red_social` int(11) NOT NULL auto_increment,
  `id_proveedor` int(11) NOT NULL,
  `id_red_social` int(11) NOT NULL,
  `link_proveedor_red_social` text NOT NULL,
  `estado_proveedores_red_social` text NOT NULL,
  PRIMARY KEY  (`id_proveedor_red_social`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_redes_sociales`
-- 

INSERT INTO `proveedores_redes_sociales` VALUES (1, 20, 1, 'http://facebook.com/miempresa', '1');
INSERT INTO `proveedores_redes_sociales` VALUES (2, 20, 0, '', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_rubros`
-- 

CREATE TABLE `proveedores_rubros` (
  `id_proveedor_rubro` int(11) NOT NULL auto_increment,
  `nombre_proveedor_rubro` text NOT NULL,
  `estado_proveedor_rubro` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proveedor_rubro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_rubros`
-- 

INSERT INTO `proveedores_rubros` VALUES (4, 'Accesorios y calzado', 1);
INSERT INTO `proveedores_rubros` VALUES (5, 'Aerolineas', 1);
INSERT INTO `proveedores_rubros` VALUES (6, 'Agencias de viajes', 1);
INSERT INTO `proveedores_rubros` VALUES (7, 'Albumes', 1);
INSERT INTO `proveedores_rubros` VALUES (8, 'Asesoria, Wedding Planner', 1);
INSERT INTO `proveedores_rubros` VALUES (9, 'Autos & Limousines', 1);
INSERT INTO `proveedores_rubros` VALUES (10, 'Belleza corporal y cirugia', 1);
INSERT INTO `proveedores_rubros` VALUES (11, 'Bouquets & Arreglos florales', 1);
INSERT INTO `proveedores_rubros` VALUES (12, 'Catering', 1);
INSERT INTO `proveedores_rubros` VALUES (14, 'Clases de Vals', 1);
INSERT INTO `proveedores_rubros` VALUES (15, 'Coros e instrumentos', 1);
INSERT INTO `proveedores_rubros` VALUES (16, 'CotillÃ³n', 1);
INSERT INTO `proveedores_rubros` VALUES (17, 'DecoraciÃ³n', 1);
INSERT INTO `proveedores_rubros` VALUES (18, 'Despedidas de Solteros', 1);
INSERT INTO `proveedores_rubros` VALUES (19, 'ElectrodomÃ©sticos', 1);
INSERT INTO `proveedores_rubros` VALUES (20, 'Equipos de sonido, DJÂ´s', 1);
INSERT INTO `proveedores_rubros` VALUES (21, 'EstÃ©tica Dental', 1);
INSERT INTO `proveedores_rubros` VALUES (22, 'EstÃ©tica Integral', 1);
INSERT INTO `proveedores_rubros` VALUES (23, 'Fitness', 1);
INSERT INTO `proveedores_rubros` VALUES (24, 'Fotografias', 1);
INSERT INTO `proveedores_rubros` VALUES (25, 'Hogar', 1);
INSERT INTO `proveedores_rubros` VALUES (26, 'Hoteles', 1);
INSERT INTO `proveedores_rubros` VALUES (27, 'Inmobiliarias, Hipotecarios', 1);
INSERT INTO `proveedores_rubros` VALUES (28, 'Joyas', 1);
INSERT INTO `proveedores_rubros` VALUES (29, 'Lenceria', 1);
INSERT INTO `proveedores_rubros` VALUES (30, 'Licores & bar', 1);
INSERT INTO `proveedores_rubros` VALUES (31, 'Lista de Novios', 1);
INSERT INTO `proveedores_rubros` VALUES (32, 'Locales & Salones', 1);
INSERT INTO `proveedores_rubros` VALUES (33, 'Luna de Miel', 1);
INSERT INTO `proveedores_rubros` VALUES (34, 'Maestro de Ceremonias', 1);
INSERT INTO `proveedores_rubros` VALUES (35, 'Maquillaje y Peinado', 1);
INSERT INTO `proveedores_rubros` VALUES (36, 'Orquestas', 1);
INSERT INTO `proveedores_rubros` VALUES (37, 'Partes y Caligrafia', 1);
INSERT INTO `proveedores_rubros` VALUES (38, 'Plateria', 1);
INSERT INTO `proveedores_rubros` VALUES (39, 'ProducciÃ³n de eventos', 1);
INSERT INTO `proveedores_rubros` VALUES (40, 'Recuerdos y Petalos', 1);
INSERT INTO `proveedores_rubros` VALUES (41, 'ReproducciÃ³n y Maternidad', 1);
INSERT INTO `proveedores_rubros` VALUES (42, 'Restaurantes', 1);
INSERT INTO `proveedores_rubros` VALUES (43, 'Salones de Belleza', 1);
INSERT INTO `proveedores_rubros` VALUES (44, 'Tiaras', 1);
INSERT INTO `proveedores_rubros` VALUES (45, 'Tortas', 1);
INSERT INTO `proveedores_rubros` VALUES (46, 'Trajes de Noche', 1);
INSERT INTO `proveedores_rubros` VALUES (47, 'Trajes de Novio', 1);
INSERT INTO `proveedores_rubros` VALUES (48, 'Vestidos de Novia', 1);
INSERT INTO `proveedores_rubros` VALUES (49, 'Video', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores_tipos`
-- 

CREATE TABLE `proveedores_tipos` (
  `id_proveedor_tipo` int(11) NOT NULL auto_increment,
  `nombre_proveedor_tipo` varchar(250) NOT NULL,
  PRIMARY KEY  (`id_proveedor_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_tipos`
-- 

INSERT INTO `proveedores_tipos` VALUES (1, 'Destacado');
INSERT INTO `proveedores_tipos` VALUES (2, 'Normal');
INSERT INTO `proveedores_tipos` VALUES (3, 'Mensionado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedor_seguidor`
-- 

CREATE TABLE `proveedor_seguidor` (
  `id_proveedor_seguidor` int(11) NOT NULL auto_increment,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario_cliente` int(11) NOT NULL,
  PRIMARY KEY  (`id_proveedor_seguidor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `proveedor_seguidor`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `redes_sociales`
-- 

CREATE TABLE `redes_sociales` (
  `id_red_social` int(11) NOT NULL auto_increment,
  `nombre_red_social` text NOT NULL,
  `imagen_red_social` text NOT NULL,
  `estado_red_social` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_red_social`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `redes_sociales`
-- 

INSERT INTO `redes_sociales` VALUES (1, 'Facebook', 'logo-facebook.png', 1);
INSERT INTO `redes_sociales` VALUES (2, 'Twitter', 'logo-twitter.png', 1);
INSERT INTO `redes_sociales` VALUES (3, 'Youtube', 'logo-youtube.png', 1);
INSERT INTO `redes_sociales` VALUES (4, 'Vimeo', 'logo-vimeo.png', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `tipos_cuentas`
-- 

INSERT INTO `tipos_cuentas` VALUES (1, 'Usuario comun', 1);
INSERT INTO `tipos_cuentas` VALUES (2, 'Usuario administrador', 1);

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
  `apellido_usuario_cliente` text NOT NULL,
  `foto_usuario_cliente` text NOT NULL,
  `email_usuario_cliente` varchar(250) NOT NULL,
  `clave_usuario_cliente` varchar(250) NOT NULL,
  `telefono_usuario_cliente` text NOT NULL,
  `fecha_cumple_usuario_cliente` date NOT NULL,
  `nombre_pareja_usuario_cliente` text NOT NULL,
  `fecha_boda_usuario_cliente` date NOT NULL,
  `fecha_registro_usuario_cliente` datetime NOT NULL,
  `estado_registro_usuario_cliente` tinyint(1) NOT NULL,
  `estado_cuenta_usuario_cliente` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes`
-- 

INSERT INTO `usuarios_clientes` VALUES (3, 1, 'rece', '', '163752_indice.jpg', 'recemace@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 04:37:52', 1, 1);
INSERT INTO `usuarios_clientes` VALUES (4, 1, 'mace', '', '180003_win7.jpg', 'macerece@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 04:38:07', 1, 1);
INSERT INTO `usuarios_clientes` VALUES (8, 2, 'mael', '', '185131_apple.jpg', 'mael@localhost.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 06:51:31', 1, 1);
INSERT INTO `usuarios_clientes` VALUES (12, 2, 'Administrador de proveedor 05', '', '122012_cello.jpg', 'recemace@hotmail.co', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-23 12:20:12', 1, 1);
INSERT INTO `usuarios_clientes` VALUES (10, 2, 'Asrael', '', '185218_hp.jpg', 'asrael@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 06:52:30', 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_clientes_proveedores`
-- 

CREATE TABLE `usuarios_clientes_proveedores` (
  `id_usuario_cliente_proveedor` int(11) NOT NULL auto_increment,
  `id_usuario_cliente` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente_proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes_proveedores`
-- 

INSERT INTO `usuarios_clientes_proveedores` VALUES (15, 10, 16);
INSERT INTO `usuarios_clientes_proveedores` VALUES (14, 8, 18);
INSERT INTO `usuarios_clientes_proveedores` VALUES (17, 12, 17);

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
INSERT INTO `usuarios_paginas` VALUES (2, 20);
INSERT INTO `usuarios_paginas` VALUES (2, 21);
INSERT INTO `usuarios_paginas` VALUES (2, 1);
