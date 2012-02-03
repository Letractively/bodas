-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 03-02-2012 a las 18:31:24
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `bd_bodas`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `articulos`
-- 

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL auto_increment,
  `id_articulo_tipo` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion1` text NOT NULL,
  `descripcion2` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `estado_comentarios` tinyint(1) NOT NULL,
  `estado_fecha` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id_articulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- Volcar la base de datos para la tabla `articulos`
-- 

INSERT INTO `articulos` VALUES (1, 2, 'zxcvzxcv', 'zcxvzxcv zxc v', '<p>\r\n	zxc vzxc vzsdv zxcvzsdv zcxv</p>\r\n', '2011-12-22 04:30:11', 1, 1, 1);
INSERT INTO `articulos` VALUES (2, 2, 'qewrqwe rqwe rq', 'qwe rqwe rqwe rqwe r', '<p>\r\n	qwe rqwer qwer qwer qwer</p>\r\n', '2011-12-22 04:56:53', 1, 1, 1);
INSERT INTO `articulos` VALUES (3, 1, 'asefas eas', 'af asef asef ', '<p>\r\n	asef dsf aewsfwaef awef</p>\r\n', '2011-12-22 05:42:04', 1, 1, 1);
INSERT INTO `articulos` VALUES (4, 1, 'qewr qew rqwe', 'r qwer qwer', '<p>\r\n	qwe rqwe rqwer qwer qwer</p>\r\n', '2011-12-22 05:42:10', 1, 1, 1);
INSERT INTO `articulos` VALUES (5, 1, 'z vzxcv zxcv zxc', 'vzxcv zxcvzv xz', '<p>\r\n	xzcvxz zxcv zxcv</p>\r\n', '2011-12-22 05:42:16', 1, 1, 1);
INSERT INTO `articulos` VALUES (6, 2, 'zxcvzxcv', 'zcxvzxcv zxc v', '<p>\r\n	zxc vzxc vzsdv zxcvzsdv zcxv</p>\r\n', '2011-12-22 04:30:11', 1, 1, 1);
INSERT INTO `articulos` VALUES (7, 2, 'qewrqwe rqwe rq', 'qwe rqwe rqwe rqwe r', '<p>\r\n	qwe rqwer qwer qwer qwer</p>\r\n', '2011-12-22 04:56:53', 1, 1, 1);
INSERT INTO `articulos` VALUES (8, 1, 'asefas eas', 'af asef asef ', '<p>\r\n	asef dsf aewsfwaef awef</p>\r\n', '2011-12-22 05:42:04', 1, 1, 1);
INSERT INTO `articulos` VALUES (9, 1, 'qewr qew rqwe', 'r qwer qwer', '<p>\r\n	qwe rqwe rqwer qwer qwer</p>\r\n', '2011-12-22 05:42:10', 1, 1, 1);
INSERT INTO `articulos` VALUES (10, 1, 'z vzxcv zxcv zxc', 'vzxcv zxcvzv xz', '<p>\r\n	xzcvxz zxcv zxcv</p>\r\n', '2011-12-22 05:42:16', 1, 1, 1);
INSERT INTO `articulos` VALUES (11, 2, 'zxcvzxcv', 'zcxvzxcv zxc v', '<p>\r\n	zxc vzxc vzsdv zxcvzsdv zcxv</p>\r\n', '2011-12-22 04:30:11', 1, 1, 1);
INSERT INTO `articulos` VALUES (12, 2, 'qewrqwe rqwe rq', 'qwe rqwe rqwe rqwe r', '<p>\r\n	qwe rqwer qwer qwer qwer</p>\r\n', '2011-12-22 04:56:53', 1, 1, 1);
INSERT INTO `articulos` VALUES (13, 1, 'asefas eas', 'af asef asef ', '<p>\r\n	asef dsf aewsfwaef awef</p>\r\n', '2011-12-22 05:42:04', 1, 1, 1);
INSERT INTO `articulos` VALUES (14, 1, 'qewr qew rqwe', 'r qwer qwer', '<p>\r\n	qwe rqwe rqwer qwer qwer</p>\r\n', '2011-12-22 05:42:10', 1, 1, 1);
INSERT INTO `articulos` VALUES (15, 1, 'z vzxcv zxcv zxc', 'vzxcv zxcvzv xz', '<p>\r\n	xzcvxz zxcv zxcv</p>\r\n', '2011-12-22 05:42:16', 1, 1, 1);
INSERT INTO `articulos` VALUES (16, 2, 'zxcvzxcv', 'zcxvzxcv zxc v', '<p>\r\n	zxc vzxc vzsdv zxcvzsdv zcxv</p>\r\n', '2011-12-22 04:30:11', 1, 1, 1);
INSERT INTO `articulos` VALUES (17, 2, 'qewrqwe rqwe rq', 'qwe rqwe rqwe rqwe r', '<p>\r\n	qwe rqwer qwer qwer qwer</p>\r\n', '2011-12-22 04:56:53', 1, 1, 1);
INSERT INTO `articulos` VALUES (18, 1, 'asefas eas', 'af asef asef ', '<p>\r\n	asef dsf aewsfwaef awef</p>\r\n', '2011-12-22 05:42:04', 1, 1, 1);
INSERT INTO `articulos` VALUES (19, 1, 'qewr qew rqwe', 'r qwer qwer', '<p>\r\n	qwe rqwe rqwer qwer qwer</p>\r\n', '2011-12-22 05:42:10', 1, 1, 1);
INSERT INTO `articulos` VALUES (20, 1, 'qqqq qqqq qqqqqq qqqqqq', 'qqqqq qqqq qqqq qqqqqqqqqq', '<p>\r\n	qqqq qqqqqqqqqq qqqqqqqqqq</p>\r\n', '2011-12-26 00:00:00', 1, 1, 1);
INSERT INTO `articulos` VALUES (21, 1, 'r', 'ds', '<p>\r\n	vr</p>\r\n', '2012-01-31 07:30:15', 1, 1, 1);
INSERT INTO `articulos` VALUES (22, 9, 'fsaew', 'awe fawef awe', '<p>\r\n	&nbsp;fawe fawe fawef awe</p>\r\n', '2012-01-13 06:49:51', 1, 1, 1);
INSERT INTO `articulos` VALUES (23, 12, 'aaaaaaaaaaa', 'aaaaaaaaaaaa', '<p>\r\n	aaaaaaaaaaaaaaa</p>\r\n', '2012-01-17 05:41:41', 1, 1, 1);
INSERT INTO `articulos` VALUES (24, 16, 'jjjjjjjjjjjjjj', 'jjjjjjjjjjjj', '<p>\r\n	jjjjjjjjjjjjjjjjjjjj</p>\r\n', '2012-01-20 10:33:53', 1, 0, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `articulos_comentarios`
-- 

CREATE TABLE `articulos_comentarios` (
  `id_articulo_comentario` int(11) NOT NULL auto_increment,
  `id_articulo` int(11) NOT NULL,
  `id_usuario_cliente` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY  (`id_articulo_comentario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `articulos_comentarios`
-- 

INSERT INTO `articulos_comentarios` VALUES (1, 1, 4, 'fref ewqf qwef ', '2011-12-22 17:33:45');
INSERT INTO `articulos_comentarios` VALUES (6, 20, 3, 'dfaew fawe faewf', '2011-12-26 11:12:25');
INSERT INTO `articulos_comentarios` VALUES (5, 20, 3, ' dsfawe awf awef awef wa', '2011-12-26 11:11:53');
INSERT INTO `articulos_comentarios` VALUES (7, 20, 3, 'dfasfwef awef awef awef a', '2011-12-26 11:12:27');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `articulos_imagenes`
-- 

CREATE TABLE `articulos_imagenes` (
  `id_articulo_imagen` int(11) NOT NULL auto_increment,
  `id_articulo` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_articulo_imagen`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- Volcar la base de datos para la tabla `articulos_imagenes`
-- 

INSERT INTO `articulos_imagenes` VALUES (1, 1, '165637_apple.jpg', '2011-12-22 04:56:37', 1);
INSERT INTO `articulos_imagenes` VALUES (2, 1, '165637_chrome.jpg', '2011-12-22 04:56:37', 1);
INSERT INTO `articulos_imagenes` VALUES (3, 1, '165637_firefox.jpg', '2011-12-22 04:56:37', 1);
INSERT INTO `articulos_imagenes` VALUES (4, 2, '165721_indice.jpg', '2011-12-22 04:57:21', 1);
INSERT INTO `articulos_imagenes` VALUES (5, 2, '165721_look.jpg', '2011-12-22 04:57:21', 1);
INSERT INTO `articulos_imagenes` VALUES (6, 2, '165721_win7.jpg', '2011-12-22 04:57:21', 1);
INSERT INTO `articulos_imagenes` VALUES (16, 5, '142324_chrome.jpg', '2011-12-23 02:23:25', 1);
INSERT INTO `articulos_imagenes` VALUES (9, 5, '075627_firefox.jpg', '2011-12-23 07:56:27', 1);
INSERT INTO `articulos_imagenes` VALUES (10, 4, '081133_apple.jpg', '2011-12-23 08:11:33', 1);
INSERT INTO `articulos_imagenes` VALUES (11, 4, '081133_chrome.jpg', '2011-12-23 08:11:33', 1);
INSERT INTO `articulos_imagenes` VALUES (12, 4, '081133_firefox.jpg', '2011-12-23 08:11:33', 1);
INSERT INTO `articulos_imagenes` VALUES (13, 3, '081146_chrome.jpg', '2011-12-23 08:11:46', 1);
INSERT INTO `articulos_imagenes` VALUES (14, 3, '081146_firefox.jpg', '2011-12-23 08:11:46', 1);
INSERT INTO `articulos_imagenes` VALUES (15, 3, '081146_hp.jpg', '2011-12-23 08:11:46', 1);
INSERT INTO `articulos_imagenes` VALUES (17, 20, '142802_indice.jpg', '2011-12-23 02:28:02', 1);
INSERT INTO `articulos_imagenes` VALUES (18, 20, '142802_look.jpg', '2011-12-23 02:28:02', 1);
INSERT INTO `articulos_imagenes` VALUES (19, 20, '142802_win7.jpg', '2011-12-23 02:28:02', 1);
INSERT INTO `articulos_imagenes` VALUES (20, 19, '143708_look.jpg', '2011-12-23 02:37:08', 1);
INSERT INTO `articulos_imagenes` VALUES (21, 19, '143708_win7.jpg', '2011-12-23 02:37:08', 1);
INSERT INTO `articulos_imagenes` VALUES (22, 18, '143724_apple.jpg', '2011-12-23 02:37:24', 1);
INSERT INTO `articulos_imagenes` VALUES (23, 18, '143724_chrome.jpg', '2011-12-23 02:37:24', 1);
INSERT INTO `articulos_imagenes` VALUES (24, 17, '163305_firefox.jpg', '2012-01-13 04:33:05', 1);
INSERT INTO `articulos_imagenes` VALUES (25, 17, '163305_hp.jpg', '2012-01-13 04:33:05', 1);
INSERT INTO `articulos_imagenes` VALUES (26, 17, '163305_indice.jpg', '2012-01-13 04:33:05', 1);
INSERT INTO `articulos_imagenes` VALUES (27, 17, '163306_look.jpg', '2012-01-13 04:33:06', 1);
INSERT INTO `articulos_imagenes` VALUES (28, 17, '163306_win7.jpg', '2012-01-13 04:33:06', 1);
INSERT INTO `articulos_imagenes` VALUES (29, 22, '185005_apple.jpg', '2012-01-13 06:50:05', 1);
INSERT INTO `articulos_imagenes` VALUES (30, 22, '185005_firefox.jpg', '2012-01-13 06:50:05', 1);
INSERT INTO `articulos_imagenes` VALUES (31, 22, '185005_hp.jpg', '2012-01-13 06:50:05', 1);
INSERT INTO `articulos_imagenes` VALUES (32, 22, '185005_indice.jpg', '2012-01-13 06:50:05', 1);
INSERT INTO `articulos_imagenes` VALUES (33, 23, '174203_firefox.jpg', '2012-01-17 05:42:03', 1);
INSERT INTO `articulos_imagenes` VALUES (34, 23, '174203_hp.jpg', '2012-01-17 05:42:03', 1);
INSERT INTO `articulos_imagenes` VALUES (35, 23, '174203_indice.jpg', '2012-01-17 05:42:03', 1);
INSERT INTO `articulos_imagenes` VALUES (36, 23, '174203_win7.jpg', '2012-01-17 05:42:03', 1);
INSERT INTO `articulos_imagenes` VALUES (37, 24, '103517_chrome.jpg', '2012-01-20 10:35:17', 1);
INSERT INTO `articulos_imagenes` VALUES (38, 24, '103518_firefox.jpg', '2012-01-20 10:35:18', 1);
INSERT INTO `articulos_imagenes` VALUES (39, 24, '103518_win7.jpg', '2012-01-20 10:35:18', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `articulos_tipos`
-- 

CREATE TABLE `articulos_tipos` (
  `id_articulo_tipo` int(11) NOT NULL auto_increment,
  `nombre` text NOT NULL,
  PRIMARY KEY  (`id_articulo_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `articulos_tipos`
-- 

INSERT INTO `articulos_tipos` VALUES (1, 'Noticias');
INSERT INTO `articulos_tipos` VALUES (2, 'Invitaciones y recuerdos');
INSERT INTO `articulos_tipos` VALUES (3, 'Paso a paso');
INSERT INTO `articulos_tipos` VALUES (4, 'Shower');
INSERT INTO `articulos_tipos` VALUES (5, 'Catering y tortas');
INSERT INTO `articulos_tipos` VALUES (6, 'Decoracion');
INSERT INTO `articulos_tipos` VALUES (7, 'Bouquets');
INSERT INTO `articulos_tipos` VALUES (8, 'La fiesta');
INSERT INTO `articulos_tipos` VALUES (9, 'Foto y video');
INSERT INTO `articulos_tipos` VALUES (10, 'Transporte');
INSERT INTO `articulos_tipos` VALUES (11, 'Bodas de famosos');
INSERT INTO `articulos_tipos` VALUES (12, 'Vestidos de novia');
INSERT INTO `articulos_tipos` VALUES (13, 'Trajes de novio');
INSERT INTO `articulos_tipos` VALUES (14, 'Joyeria y accesorios');
INSERT INTO `articulos_tipos` VALUES (15, 'Peinado y maquillaje');
INSERT INTO `articulos_tipos` VALUES (16, 'Belleza y salud');
INSERT INTO `articulos_tipos` VALUES (17, 'Los  invitados');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- Volcar la base de datos para la tabla `paginas`
-- 

INSERT INTO `paginas` VALUES (1, 1, 'Administraci&oacute;n de usuarios', 'usuarios.php');
INSERT INTO `paginas` VALUES (19, 1, 'Proveedores rubros', 'ProveedorRubro.php');
INSERT INTO `paginas` VALUES (20, 1, 'Proveedores', 'Proveedor.php');
INSERT INTO `paginas` VALUES (21, 1, 'Usuarios registrados', 'UsuarioCliente.php');
INSERT INTO `paginas` VALUES (22, 1, 'Tipos de articulo', 'articuloTipo.php');
INSERT INTO `paginas` VALUES (23, 1, 'Articulos de portada', 'articulosPortada.php');
INSERT INTO `paginas` VALUES (24, 1, 'Revista', 'revista.php');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `portadas_articulos`
-- 

CREATE TABLE `portadas_articulos` (
  `id_portada_articulo` int(11) NOT NULL auto_increment,
  `nombre` text NOT NULL,
  `id_articulo` int(11) NOT NULL,
  PRIMARY KEY  (`id_portada_articulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `portadas_articulos`
-- 

INSERT INTO `portadas_articulos` VALUES (1, 'Galeria 1', 20);
INSERT INTO `portadas_articulos` VALUES (2, 'Galeria 2', 19);
INSERT INTO `portadas_articulos` VALUES (3, 'Galeria 3', 18);
INSERT INTO `portadas_articulos` VALUES (4, 'Galeria 4', 1);
INSERT INTO `portadas_articulos` VALUES (5, 'Intermedio 1', 4);
INSERT INTO `portadas_articulos` VALUES (6, 'Intermedio 2', 4);
INSERT INTO `portadas_articulos` VALUES (7, 'Intermedio 3', 1);
INSERT INTO `portadas_articulos` VALUES (8, 'Intermedio 4', 4);
INSERT INTO `portadas_articulos` VALUES (9, 'Intermedio 5', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

-- 
-- Volcar la base de datos para la tabla `proveedores`
-- 

INSERT INTO `proveedores` VALUES (16, 1, 4, 'Proveedor de ejemplo 01', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (17, 2, 4, 'Proveedor de ejemplo 02 con Ã±', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 0);
INSERT INTO `proveedores` VALUES (18, 2, 4, 'Proveedor de ejemplo 03', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
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
INSERT INTO `proveedores` VALUES (30, 3, 9, 'Proveedor de ejemplo 010', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (31, 3, 4, 'Proveedor de ejemplo 011', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (32, 3, 4, 'Proveedor de ejemplo 012', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (33, 3, 4, 'Proveedor de ejemplo 013', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (34, 3, 4, 'Proveedor de ejemplo 014', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (35, 3, 4, 'Proveedor de ejemplo 015', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (36, 3, 4, 'Proveedor de ejemplo 016', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (37, 3, 4, 'Proveedor de ejemplo 017', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (38, 2, 23, 'Proveedor de ejemplo 018', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (39, 3, 4, 'Proveedor de ejemplo 019', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (40, 3, 4, 'Proveedor de ejemplo 020', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (41, 3, 4, 'Proveedor de ejemplo 021', '123917_radiohead.jpg', 'Proveedor de ejemplo 01', '', '', '', '', '', '', '', '', '', '2011-11-10 06:11:04', 1);
INSERT INTO `proveedores` VALUES (42, 2, 5, 'Proveedor de ejemplo 022', '123903_colette.jpg', 'Proveedor de ejemplo 02', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:25', 1);
INSERT INTO `proveedores` VALUES (43, 3, 4, 'Proveedor de ejemplo 023', '123828_vanessa.jpg', 'Proveedor de ejemplo 03', '', '', '', '', '', '', '', '', '', '2011-11-11 03:26:43', 1);
INSERT INTO `proveedores` VALUES (44, 3, 4, 'Proveedor de ejemplo 024', '123850_aerosmith-en-lima.jpg', 'Proveedor de ejemplo 04', '', '', '', '', '', '', '', '', '', '2011-11-11 04:17:19', 1);
INSERT INTO `proveedores` VALUES (45, 2, 4, 'Proveedor de prueba', '175706_deliza.gif.jpg', 'fg ewrq ger gewr g', '<p>\r\n	fa gwer gwer gwer gwer ga sdfg we fawe fawe few</p>\r\n', 'faew awef a', '12341234', '12341234', '12341234', '12341234', 'empresa@gian.com', 'gian.com', '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/?ie=UTF8&ll=40.396764,-3.713379&spn=10.705296,16.940918&t=m&z=6&vpsrc=1&output=embed"></iframe><br /><small><a href="http://maps.google.es/?ie=UTF8&ll=40.396764,-3.713379&spn=10.705296,16.940918&t=m&z=6&vpsrc=1&source=embed" style="color:#0000FF;text-align:left">Ver mapa mÃ¡s grande</a></small>', '2011-12-09 05:38:40', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_imagenes`
-- 

INSERT INTO `proveedores_imagenes` VALUES (103, 20, '232435_chrome.jpg', '2011-12-04 11:24:35', 1);
INSERT INTO `proveedores_imagenes` VALUES (104, 20, '232518_hp.jpg', '2011-12-04 11:25:18', 1);
INSERT INTO `proveedores_imagenes` VALUES (105, 20, '232626_indice.jpg', '2011-12-04 11:26:26', 1);
INSERT INTO `proveedores_imagenes` VALUES (106, 45, '174443_apple.jpg', '2011-12-09 05:44:43', 1);
INSERT INTO `proveedores_imagenes` VALUES (107, 45, '174443_chrome.jpg', '2011-12-09 05:44:43', 1);
INSERT INTO `proveedores_imagenes` VALUES (108, 45, '174443_firefox.jpg', '2011-12-09 05:44:43', 1);
INSERT INTO `proveedores_imagenes` VALUES (109, 45, '174443_hp.jpg', '2011-12-09 05:44:43', 1);
INSERT INTO `proveedores_imagenes` VALUES (110, 45, '174443_indice.jpg', '2011-12-09 05:44:43', 1);
INSERT INTO `proveedores_imagenes` VALUES (111, 45, '174443_look.jpg', '2011-12-09 05:44:43', 1);
INSERT INTO `proveedores_imagenes` VALUES (112, 45, '174443_win7.jpg', '2011-12-09 05:44:43', 1);
INSERT INTO `proveedores_imagenes` VALUES (113, 1, '165439_apple.jpg', '2011-12-22 04:54:39', 1);
INSERT INTO `proveedores_imagenes` VALUES (114, 1, '165439_chrome.jpg', '2011-12-22 04:54:39', 1);
INSERT INTO `proveedores_imagenes` VALUES (115, 1, '165439_firefox.jpg', '2011-12-22 04:54:39', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_publicaciones`
-- 

INSERT INTO `proveedores_publicaciones` VALUES (49, 20, 'v bdfb df bdbdf dbf b', '2012-01-26 17:05:04', 1);
INSERT INTO `proveedores_publicaciones` VALUES (48, 20, 'bbbbbbbbbbbbbbb', '2012-01-26 17:05:02', 1);
INSERT INTO `proveedores_publicaciones` VALUES (46, 20, ' dgndtr ndty ', '2012-01-26 17:04:48', 1);
INSERT INTO `proveedores_publicaciones` VALUES (47, 20, 'fsb sbfbsdbsbsd', '2012-01-26 17:05:00', 1);
INSERT INTO `proveedores_publicaciones` VALUES (45, 20, 'h dnt ntydn', '2012-01-26 17:04:47', 1);
INSERT INTO `proveedores_publicaciones` VALUES (44, 20, 'd ghrht rdt h', '2012-01-26 17:04:46', 1);
INSERT INTO `proveedores_publicaciones` VALUES (43, 20, ' rtn dhg rt ', '2012-01-26 17:04:44', 1);
INSERT INTO `proveedores_publicaciones` VALUES (42, 20, 'rtn  r ', '2012-01-26 17:04:43', 1);
INSERT INTO `proveedores_publicaciones` VALUES (41, 20, 'wqaefqfqwef', '2012-01-26 15:37:50', 1);
INSERT INTO `proveedores_publicaciones` VALUES (40, 20, 'rthregwe', '2012-01-26 15:37:49', 1);
INSERT INTO `proveedores_publicaciones` VALUES (39, 20, 'gsergsegse', '2012-01-26 15:37:47', 1);
INSERT INTO `proveedores_publicaciones` VALUES (38, 20, 'efafwefewa', '2012-01-26 15:37:45', 1);
INSERT INTO `proveedores_publicaciones` VALUES (50, 20, 'afesasef', '2012-01-26 17:16:13', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_publicaciones_comentarios`
-- 

INSERT INTO `proveedores_publicaciones_comentarios` VALUES (5, 23, 3, 'dsfads fasdf aweawef awef adsf we faew', '2011-12-05 10:02:14', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (11, 29, 3, 'fger wgwerg wrgwer were', '2011-12-05 11:02:16', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (9, 22, 12, 'fd dsgsreg resg esr', '2011-12-05 10:18:26', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (10, 23, 12, 'fdv sfdvfds vs vsr', '2011-12-05 10:24:26', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (12, 30, 53, 'fdsf gaewr aew', '2011-12-09 05:48:02', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (13, 31, 53, 'a fwefaw efawe', '2011-12-09 05:48:04', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (14, 31, 53, 'af wef ', '2011-12-09 05:48:05', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (15, 30, 53, 'awef waef aw', '2011-12-09 05:48:07', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (18, 20, 3, '', '2011-12-26 09:49:28', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (19, 29, 12, 'afeefweaw eawef awef awe', '2012-01-09 05:57:22', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (20, 29, 12, 'ewafawef', '2012-01-20 11:43:07', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (21, 29, 12, 'asefasefsa ef\n', '2012-01-20 11:43:18', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (22, 29, 12, 'dfsafewfawefawef', '2012-01-20 11:43:21', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (23, 29, 12, 'gsdgregserg', '2012-01-20 11:43:23', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (24, 29, 12, 'dgbdtbrdtr', '2012-01-20 11:43:25', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (25, 29, 12, 'efewfawfeawfe', '2012-01-20 11:43:27', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (26, 29, 12, 'asefaesfwafe', '2012-01-20 11:45:26', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (27, 29, 12, 'safwf', '2012-01-20 11:45:29', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (28, 32, 12, 'fewrfwerf\nfewqef', '2012-01-20 11:50:56', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (29, 32, 12, 'refewrf', '2012-01-20 11:50:58', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (30, 37, 12, 'afesfewf', '2012-01-20 11:55:38', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (31, 37, 12, 'trgrtret', '2012-01-20 11:55:40', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (32, 37, 12, 'mgymnyumyug', '2012-01-20 11:55:51', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (33, 37, 12, 'yunyutuy', '2012-01-20 11:55:54', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (34, 37, 12, 'dfhrthrdth', '2012-01-20 11:55:56', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (35, 37, 12, 'mghjmhjh', '2012-01-20 11:55:58', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (36, 37, 12, 'sergserg', '2012-01-20 11:55:59', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (37, 37, 12, 'qwerqwedqew', '2012-01-20 11:56:01', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (38, 37, 12, 'ferrtvrtv', '2012-01-20 11:56:05', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (39, 37, 12, 'arvrtv', '2012-01-20 11:56:11', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (40, 37, 12, 'rtvreqew', '2012-01-20 11:56:12', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (41, 37, 12, 'Â´wrevwervÃ©rÂ´qewrtÂ´regÂ´wÃ©wrÂ´tÃ©Â´Ã‘Ã‘Ã‘', '2012-01-20 11:56:21', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (42, 27, 12, 'afseafse', '2012-01-20 12:16:02', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (43, 36, 12, 'seafsefeawf', '2012-01-20 12:47:52', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (44, 35, 12, 'awefawefawef', '2012-01-20 12:47:55', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (45, 35, 12, 'awefawef', '2012-01-20 12:47:57', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (46, 36, 12, 'awefawef', '2012-01-20 12:47:59', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (47, 35, 12, 'zvxcxzcvzvdsvzd', '2012-01-20 12:48:15', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (48, 37, 12, 'vrtsvesrvesr', '2012-01-20 01:10:02', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (49, 37, 12, 'tgrbretb', '2012-01-20 01:10:04', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (50, 37, 12, 'jhmymj', '2012-01-20 01:10:09', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (51, 29, 12, 'jjjjjjjjj', '2012-01-20 01:10:17', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (52, 29, 12, 'kkkkkk', '2012-01-20 01:10:20', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (53, 34, 12, 'yhth tyh tyd h', '2012-01-20 01:47:28', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (54, 34, 12, 'f nfgnfg nfg', '2012-01-20 01:47:31', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (55, 34, 12, 'srgs se ser gser gser', '2012-01-20 01:47:33', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (56, 38, 12, 'srtbsrtb', '2012-01-26 03:54:14', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (57, 38, 12, 'uymutium', '2012-01-26 03:54:17', 1);
INSERT INTO `proveedores_publicaciones_comentarios` VALUES (58, 41, 12, 'bg wtr ewr werwer tewr t', '2012-01-26 03:55:36', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_recomendados`
-- 

INSERT INTO `proveedores_recomendados` VALUES (9, 20, '220044_apple.jpg', 'http://www.holas.com.pe', 1);
INSERT INTO `proveedores_recomendados` VALUES (10, 20, '232735_hp.jpg', 'http://www.hp.com', 1);
INSERT INTO `proveedores_recomendados` VALUES (11, 45, 'sin-imagen.jpg', 'http://www.google.com.pe', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `proveedores_redes_sociales`
-- 

INSERT INTO `proveedores_redes_sociales` VALUES (3, 20, 1, 'http://facebook.com/redsocial', '1');
INSERT INTO `proveedores_redes_sociales` VALUES (4, 20, 2, 'http://twitter.com/twitter', '1');
INSERT INTO `proveedores_redes_sociales` VALUES (5, 20, 1, 'http://facebook.com/bodas', '1');
INSERT INTO `proveedores_redes_sociales` VALUES (6, 45, 1, 'facebook/gian', '1');
INSERT INTO `proveedores_redes_sociales` VALUES (7, 20, 3, 'asdfsa.com', '1');

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
-- Estructura de tabla para la tabla `revistas`
-- 

CREATE TABLE `revistas` (
  `id_revista` int(11) NOT NULL auto_increment,
  `link` text NOT NULL,
  `titulo` text NOT NULL,
  `imagen` text NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_revista`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `revistas`
-- 

INSERT INTO `revistas` VALUES (1, '', 'Edicion actual', '172447_apple.jpg', '<p>\r\n	dsa fawef ewaf eaw</p>\r\n', 1);
INSERT INTO `revistas` VALUES (2, 'asdf.com.pe', 'otra edicion 1', '173828_hp.jpg', '', 1);
INSERT INTO `revistas` VALUES (3, 'google.com.pe', 'otra edicion 2', '173820_apple.jpg', '', 1);
INSERT INTO `revistas` VALUES (6, 'google.com.pe', 'aeffbxcfgb', '180130_firefox.jpg', '', 1);
INSERT INTO `revistas` VALUES (7, 'issuu.com/bodas/docs/b63?mode=window&backgroundColor=%23222222', 'hnfghnfghngf', '180136_indice.jpg', '', 1);

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
-- Estructura de tabla para la tabla `rubros_articulos`
-- 

CREATE TABLE `rubros_articulos` (
  `id_rubro_noticia` int(11) NOT NULL auto_increment,
  `id_rubro` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  PRIMARY KEY  (`id_rubro_noticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- 
-- Volcar la base de datos para la tabla `rubros_articulos`
-- 

INSERT INTO `rubros_articulos` VALUES (59, 47, 24);
INSERT INTO `rubros_articulos` VALUES (58, 47, 16);
INSERT INTO `rubros_articulos` VALUES (57, 49, 24);
INSERT INTO `rubros_articulos` VALUES (56, 49, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes`
-- 

INSERT INTO `usuarios_clientes` VALUES (3, 1, 16, 'rece', 'mace', '100342_apple.jpg', 'recemace@hotmail.com', '123456', '996828889', '0000-00-00', 'Cinthia', '0000-00-00', '2011-11-21 04:37:52', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (4, 1, 16, 'mace', '', '180003_win7.jpg', 'macerece@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 04:38:07', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (8, 2, 16, 'mael', '', '185131_apple.jpg', 'mael@localhost.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 06:51:31', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (12, 2, 16, 'Administrador de proveedor 05', '', '170254_hp.jpg', 'recemace@hotmail.co', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-23 12:20:12', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (10, 2, 16, 'Asrael', '', '185218_hp.jpg', 'asrael@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-11-21 06:52:30', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (51, 1, 16, 'mace', 'rece', '164813_win7.jpg', 'raulmace@hotmail.com', 'miterimos', '996828889', '1985-07-28', 'Cinthia', '2011-12-30', '2011-11-29 04:48:13', 1, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (52, 1, 20, 'macuco', 'macaco', '165738_apple.jpg', 'macuco@hotmail.com', '123456', '996828889', '2011-12-31', 'Katty', '2011-12-31', '2011-12-02 04:57:38', 0, 1, 1);
INSERT INTO `usuarios_clientes` VALUES (53, 2, 16, 'gian', 'gian', '173938_apple.jpg', 'gian@hotmail.com', '123456', '', '0000-00-00', '', '0000-00-00', '2011-12-09 05:39:38', 0, 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_clientes_me_gusta`
-- 

CREATE TABLE `usuarios_clientes_me_gusta` (
  `id_usuario_cliente_me_gusta` int(11) NOT NULL auto_increment,
  `id_usuario_cliente` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_me_gusta` datetime NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente_me_gusta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes_me_gusta`
-- 

INSERT INTO `usuarios_clientes_me_gusta` VALUES (9, 12, 45, '2012-01-26 03:58:10');
INSERT INTO `usuarios_clientes_me_gusta` VALUES (8, 12, 20, '2012-01-24 03:23:26');
INSERT INTO `usuarios_clientes_me_gusta` VALUES (10, 12, 18, '2012-01-26 03:58:53');
INSERT INTO `usuarios_clientes_me_gusta` VALUES (11, 3, 20, '2012-01-26 04:17:59');
INSERT INTO `usuarios_clientes_me_gusta` VALUES (12, 52, 20, '2012-01-26 05:12:24');
INSERT INTO `usuarios_clientes_me_gusta` VALUES (13, 51, 20, '2012-01-24 03:23:24');
INSERT INTO `usuarios_clientes_me_gusta` VALUES (14, 53, 20, '2013-01-24 03:23:27');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_clientes_proveedores`
-- 

CREATE TABLE `usuarios_clientes_proveedores` (
  `id_usuario_cliente_proveedor` int(11) NOT NULL auto_increment,
  `id_usuario_cliente` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente_proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes_proveedores`
-- 

INSERT INTO `usuarios_clientes_proveedores` VALUES (15, 10, 16);
INSERT INTO `usuarios_clientes_proveedores` VALUES (14, 8, 18);
INSERT INTO `usuarios_clientes_proveedores` VALUES (18, 12, 20);
INSERT INTO `usuarios_clientes_proveedores` VALUES (19, 53, 45);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_clientes_publicaciones`
-- 

CREATE TABLE `usuarios_clientes_publicaciones` (
  `id_usuario_cliente_publicacion` int(11) NOT NULL auto_increment,
  `id_usuario_cliente` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `fecha_me_gusta` datetime NOT NULL,
  PRIMARY KEY  (`id_usuario_cliente_publicacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_clientes_publicaciones`
-- 

INSERT INTO `usuarios_clientes_publicaciones` VALUES (34, 12, 50, '2012-01-27 05:10:20');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (23, 12, 38, '2012-01-26 03:52:25');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (33, 12, 46, '2012-01-26 05:16:20');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (32, 3, 47, '2012-01-26 05:05:39');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (31, 3, 48, '2012-01-26 05:05:38');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (30, 12, 44, '2012-01-26 05:05:12');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (29, 12, 45, '2012-01-26 05:05:11');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (28, 12, 40, '2012-01-26 04:57:37');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (27, 12, 100, '2012-01-27 16:57:00');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (26, 12, 99, '2012-01-26 16:56:54');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (25, 12, 41, '2012-01-26 03:53:13');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (24, 12, 39, '2012-01-26 03:52:58');
INSERT INTO `usuarios_clientes_publicaciones` VALUES (35, 12, 49, '2012-01-27 05:10:21');

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

INSERT INTO `usuarios_paginas` VALUES (2, 22);
INSERT INTO `usuarios_paginas` VALUES (2, 24);
INSERT INTO `usuarios_paginas` VALUES (2, 19);
INSERT INTO `usuarios_paginas` VALUES (2, 20);
INSERT INTO `usuarios_paginas` VALUES (2, 23);
INSERT INTO `usuarios_paginas` VALUES (2, 1);
INSERT INTO `usuarios_paginas` VALUES (2, 21);
