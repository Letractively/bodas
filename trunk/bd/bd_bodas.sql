-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 05-12-2011 a las 03:11:43
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `bd_bodas`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `distritos`
-- 

CREATE TABLE `distritos` (
  `id_distrito` int(11) NOT NULL auto_increment,
  `nombre_distrito` text NOT NULL,
  PRIMARY KEY  (`id_distrito`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- 
-- Volcar la base de datos para la tabla `distritos`
-- 

INSERT INTO `distritos` VALUES (1, 'Ancón');
INSERT INTO `distritos` VALUES (2, 'Santa Rosa');
INSERT INTO `distritos` VALUES (3, 'Ventanilla');
INSERT INTO `distritos` VALUES (4, 'Callao');
INSERT INTO `distritos` VALUES (5, 'La Punta');
INSERT INTO `distritos` VALUES (6, 'Carmen de La Legua-Reynoso');
INSERT INTO `distritos` VALUES (7, 'Bellavista');
INSERT INTO `distritos` VALUES (8, 'La Perla');
INSERT INTO `distritos` VALUES (9, 'Carabayllo');
INSERT INTO `distritos` VALUES (10, 'Puente Piedra');
INSERT INTO `distritos` VALUES (11, 'San Martín de Porres');
INSERT INTO `distritos` VALUES (12, 'Los Olivos');
INSERT INTO `distritos` VALUES (13, 'Comas');
INSERT INTO `distritos` VALUES (14, 'Independencia');
INSERT INTO `distritos` VALUES (15, 'San Juan de Lurigancho');
INSERT INTO `distritos` VALUES (16, 'Lima');
INSERT INTO `distritos` VALUES (17, 'Breña');
INSERT INTO `distritos` VALUES (18, 'Rímac');
INSERT INTO `distritos` VALUES (19, 'El Agustino');
INSERT INTO `distritos` VALUES (20, 'San Miguel');
INSERT INTO `distritos` VALUES (21, 'Pueblo Libre');
INSERT INTO `distritos` VALUES (22, 'Jesús María');
INSERT INTO `distritos` VALUES (23, 'Magdalena del Mar');
INSERT INTO `distritos` VALUES (24, 'Lince');
INSERT INTO `distritos` VALUES (25, 'La Victoria');
INSERT INTO `distritos` VALUES (26, 'San Luis');
INSERT INTO `distritos` VALUES (27, 'Miraflores');
INSERT INTO `distritos` VALUES (28, 'Surquillo');
INSERT INTO `distritos` VALUES (29, 'Barranco');
INSERT INTO `distritos` VALUES (30, 'San Borja');
INSERT INTO `distritos` VALUES (31, 'Santiago de Surco');
INSERT INTO `distritos` VALUES (32, 'Chorrillos');
INSERT INTO `distritos` VALUES (33, 'Santa Anita');
INSERT INTO `distritos` VALUES (34, 'Ate');
INSERT INTO `distritos` VALUES (35, 'La Molina');
INSERT INTO `distritos` VALUES (36, 'Lurigancho-Chosica');
INSERT INTO `distritos` VALUES (37, 'Chaclacayo');
INSERT INTO `distritos` VALUES (38, 'Cieneguilla');
INSERT INTO `distritos` VALUES (39, 'Pachacámac');
INSERT INTO `distritos` VALUES (40, 'San Juan de Miraflores');
INSERT INTO `distritos` VALUES (41, 'Villa María del Triunfo');
INSERT INTO `distritos` VALUES (42, 'Villa El Salvador');
INSERT INTO `distritos` VALUES (43, 'Lurín');
INSERT INTO `distritos` VALUES (44, 'Punta Hermosa');
INSERT INTO `distritos` VALUES (45, 'Punta Negra');
INSERT INTO `distritos` VALUES (46, 'San Bartolo');
INSERT INTO `distritos` VALUES (47, 'Santa María del Mar');
INSERT INTO `distritos` VALUES (48, 'Pucusana');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

-- 
-- Volcar la base de datos para la tabla `proveedores`
-- 

INSERT INTO `proveedores` VALUES (16, 1, 4, 'Proveedor de ejemplo 01', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (17, 2, 4, 'Proveedor de ejemplo 02 con Ã±', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 0);
INSERT INTO `proveedores` VALUES (18, 1, 4, 'Proveedor de ejemplo 03', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (19, 1, 4, 'Proveedor de ejemplo 04', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (20, 2, 4, 'proveedor ejemplo 05 con Ã±', '232043_chrome.jpg', 'proveedor ejemplo 05', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel congue purus. Nam velit urna, imperdiet id convallis non, sodales eu quam. Etiam id ante nec sapien volutpat euismod. Duis at fringilla nisi. Vestibulum in sem et nibh blandit luctus. Suspendisse eu dictum neque. Duis nulla leo, pellentesque bibendum semper ut, vulputate id mauris. Sed in turpis purus, id lacinia tellus. Vestibulum congue vulputate massa sit amet ornare.</p>\r\n', 'direccion', '12341324', '13241234', '13241324', '13241324', 'proveedor05@sitio.com', 'www.proveedor05.com', '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=lima,+peru&sll=40.396764,-3.713379&sspn=9.234287,19.753418&vpsrc=6&ie=UTF8&hq=&hnear=Miraflores,+Lima,+Per%C3%BA&t=m&ll=-12.1175,-77.043056&spn=0.741162,1.234589&z=10&iwloc=A&output=embed"></iframe><br /><small><a href="http://maps.google.es/maps?f=q&source=embed&hl=es&geocode=&q=lima,+peru&sll=40.396764,-3.713379&sspn=9.234287,19.753418&vpsrc=6&ie=UTF8&hq=&hnear=Miraflores,+Lima,+Per%C3%BA&t=m&ll=-12.1175,-77.043056&spn=0.741162,1.234589&z=10&iwloc=A" style="color:#0000FF;text-align:left">Ver mapa mÃ¡s grande</a></small>', '2011-11-23 12:18:44', 1);
INSERT INTO `proveedores` VALUES (21, 3, 4, 'Proveedor de ejemplo 001', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (22, 3, 4, 'Proveedor de ejemplo 002', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (23, 3, 4, 'Proveedor de ejemplo 003', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (24, 3, 4, 'Proveedor de ejemplo 004', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (25, 3, 4, 'Proveedor de ejemplo 005', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (26, 3, 4, 'Proveedor de ejemplo 006', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (27, 3, 4, 'Proveedor de ejemplo 007', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (28, 3, 4, 'Proveedor de ejemplo 008', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (29, 3, 4, 'Proveedor de ejemplo 009', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (30, 3, 4, 'Proveedor de ejemplo 010', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (31, 3, 4, 'Proveedor de ejemplo 011', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (32, 3, 4, 'Proveedor de ejemplo 012', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (33, 3, 4, 'Proveedor de ejemplo 013', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (34, 3, 4, 'Proveedor de ejemplo 014', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (35, 3, 4, 'Proveedor de ejemplo 015', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (36, 3, 4, 'Proveedor de ejemplo 016', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (37, 3, 4, 'Proveedor de ejemplo 017', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (38, 3, 4, 'Proveedor de ejemplo 018', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (39, 3, 4, 'Proveedor de ejemplo 019', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (40, 3, 4, 'Proveedor de ejemplo 020', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (41, 3, 4, 'Proveedor de ejemplo 021', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (42, 3, 4, 'Proveedor de ejemplo 022', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (43, 3, 4, 'Proveedor de ejemplo 023', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (44, 3, 4, 'Proveedor de ejemplo 024', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_imagenes`
-- 

INSERT INTO `proveedores_imagenes` VALUES (102, 20, '232322_apple.jpg', '2011-12-04 11:23:22', 1);
INSERT INTO `proveedores_imagenes` VALUES (103, 20, '232435_chrome.jpg', '2011-12-04 11:24:35', 1);
INSERT INTO `proveedores_imagenes` VALUES (104, 20, '232518_hp.jpg', '2011-12-04 11:25:18', 1);
INSERT INTO `proveedores_imagenes` VALUES (105, 20, '232626_indice.jpg', '2011-12-04 11:26:26', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_publicaciones`
-- 

INSERT INTO `proveedores_publicaciones` VALUES (23, 20, 'fasefasef', '2011-12-05 03:01:02', 1);
INSERT INTO `proveedores_publicaciones` VALUES (21, 20, 'adsf ewf adf ewf wawef awef awef awef awef awef aewf ', '2011-12-05 02:52:22', 1);
INSERT INTO `proveedores_publicaciones` VALUES (22, 20, ' dsafds fewf eawf awf weawef aw', '2011-12-05 02:53:29', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_recomendados`
-- 

INSERT INTO `proveedores_recomendados` VALUES (9, 20, '220044_apple.jpg', 'http://www.holas.com.pe', 1);
INSERT INTO `proveedores_recomendados` VALUES (10, 20, '232735_hp.jpg', 'http://www.hp.com', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_redes_sociales`
-- 

INSERT INTO `proveedores_redes_sociales` VALUES (3, 20, 1, 'http://facebook.com/redsocial', '1');
INSERT INTO `proveedores_redes_sociales` VALUES (4, 20, 2, 'http://twitter.com/twitter', '1');
INSERT INTO `proveedores_redes_sociales` VALUES (5, 20, 1, 'http://facebook.com/bodas', '1');

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
  `id_distrito` int(11) NOT NULL,
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
  `estado_boletin_usuario_cliente` tinyint(1) NOT NULL,
  `estado_registro_usuario_cliente` tinyint(1) NOT NULL,
  `estado_cuenta_usuario_cliente` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes`
-- 

INSERT INTO `usuarios_clientes` VALUES (3, 1, 16, 'rece', '', '163752_indice.jpg', 'recemace@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 04:37:52', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (4, 1, 16, 'mace', '', '180003_win7.jpg', 'macerece@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 04:38:07', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (8, 2, 16, 'mael', '', '185131_apple.jpg', 'mael@localhost.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 06:51:31', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (12, 2, 16, 'Administrador de proveedor 05', '', '145505_indice.jpg', 'recemace@hotmail.co', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-23 12:20:12', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (10, 2, 16, 'Asrael', '', '185218_hp.jpg', 'asrael@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 06:52:30', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (51, 1, 16, 'mace', 'rece', '164813_win7.jpg', 'raulmace@hotmail.com', 'miterimos', '996828889', '1985-07-28', 'Cinthia', '2011-12-30', '2011-11-29 04:48:13', 1, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (52, 1, 20, 'macuco', 'macaco', '165738_apple.jpg', 'macuco@hotmail.com', '123456', '996828889', '2011-12-31', 'Katty', '2011-12-31', '2011-12-02 04:57:38', 0, 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_clientes_proveedores`
-- 

CREATE TABLE `usuarios_clientes_proveedores` (
  `id_usuario_cliente_proveedor` int(11) NOT NULL auto_increment,
  `id_usuario_cliente` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente_proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes_proveedores`
-- 

INSERT INTO `usuarios_clientes_proveedores` VALUES (15, 10, 16);
INSERT INTO `usuarios_clientes_proveedores` VALUES (14, 8, 18);
INSERT INTO `usuarios_clientes_proveedores` VALUES (18, 12, 20);

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
