-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 19-10-2011 a las 19:52:07
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `bd_bodas`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `configuracion`
-- 

CREATE TABLE `configuracion` (
  `id_configuracion` int(11) NOT NULL auto_increment,
  `nombre_configuracion` text NOT NULL,
  `valor_configuracion` text NOT NULL,
  `posicion` int(11) NOT NULL,
  PRIMARY KEY  (`id_configuracion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `configuracion`
-- 

INSERT INTO `configuracion` VALUES (5, 'ARCHIVO_INGRESO_SEMANA', '184952_big bang - salta.mp3', 7);
INSERT INTO `configuracion` VALUES (2, 'EMAIL_VOTAR_RANKING', 'contactos@radioinsomnio.com.pe', 2);
INSERT INTO `configuracion` VALUES (4, 'NOMBRE_INGRESO_SEMANA', 'Ingreso de la semana', 6);
INSERT INTO `configuracion` VALUES (1, 'NOMBRE_SITIO', '.: RADIO INSOMNIO :.', 1);
INSERT INTO `configuracion` VALUES (3, 'PROGRAMACION', '165909_horario_red.jpg', 3);
INSERT INTO `configuracion` VALUES (6, 'QUIENES_SOMOS', '<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:28px;"><span style="color:#ff0000;">Radio Insomnio</span></span><span style="color:#000000;"> </span><span style="color:#808080;">- www.radioinsomnio.com.pe</span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#000000;">Es una </span><span style="color:#ff0000;">radio online en vivo</span><span style="color:#000000;"> que transmite ininterrumpidamente las </span><span style="color:#ff0000;">24 horas del d&iacute;a, todos los d&iacute;as del a&ntilde;o</span><span style="color:#000000;">. Transmitimos v&iacute;a web con un formato de radio convencional, contando para este fin con </span><span style="color:#ff0000;">programas especializados &uacute;nicos en su g&eacute;nero</span><span style="color:#000000;">, los cuales tienen como esencia </span><span style="color:#ff0000;">la m&uacute;sica hecha en el Per&uacute;</span><span style="color:#000000;">, empezando por el </span><span style="color:#ff0000;">Rock</span><span style="color:#000000;"> y sin dejar de lado todos aquellos ritmos precursores y derivados.</span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">Radio Insomnio</span><span style="color:#000000;"> es una marca reconocida y vinculada durante a&ntilde;os al </span><span style="color:#ff0000;">Rock Peruano</span><span style="color:#000000;"> durante los cuales hemos llegado a nuestro p&uacute;blico a trav&eacute;s de distintos medios y programas como: </span><span style="color:#ff0000;">Radio Insomnio </span><span style="color:#808080;">(<em>Radio Am&eacute;rica 94.3 FM 2000 &ndash; 2004)</em></span><span style="color:#ff0000;">, TV Insomnio </span><span style="color:#808080;"><em>(Frecuencia Latina - 2002)</em></span><span style="color:#ff0000;"> y Radio Insomnio.com </span><span style="color:#808080;"><em>(Primera radio por Internet del Per&uacute; 2004 - 2005)</em></span><span style="color:#ff0000;"> </span><span style="color:#000000;">siempre manteniendo la prioridad en la m&uacute;sica hecha en el Per&uacute; pero sin dejar de lado la m&uacute;sica que se hacen en otros lugares del planeta.</span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#000000;">Hoy </span><span style="color:#ff0000;">Radio Insomnio transmite en vivo por internet</span><span style="color:#000000;"> y esta potenciado el </span><span style="color:#ff0000;">portal web</span><span style="color:#000000;"> el cual completa el objetivo de difundir toda clase de noticias relacionadas a la m&uacute;sica y la actualidad, as&iacute; como una agenda cultural que cubre m&uacute;sica, teatro, eventos, entre otros. El objetivo del </span><span style="color:#ff0000;">portal de Radio Insomnio</span><span style="color:#000000;"> es convertirse en el punto de encuentro de la gente que ama el arte hecho en el per&uacute; y que quiere saber y disfrutar de sus bandas favoritas.</span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#000000;">P&oacute;ngase en contacto con nosotros a trav&eacute;s de nuestras distintas &aacute;reas, estaremos gustosos de poder atenderlo.</span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Ventas y RRPP</span><br />\r\n	<span style="color:#000000;"> </span><span style="color:#808080;"><span style="font-size:14px;">relacionespublicas@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Publicidad</span><br />\r\n	<span style="color:#000000;"> </span><span style="color:#808080;"><span style="font-size:14px;">publicidad@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Administraci&oacute;n</span><br />\r\n	<span style="color:#000000;"> </span><span style="color:#808080;"><span style="font-size:14px;">administracion@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Producci&oacute;n General</span><br />\r\n	<span style="color:#000000;"> </span><span style="font-size:14px;"><span style="color:#808080;">radioinsomnio@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Producci&oacute;n Ejecutiva</span><br />\r\n	<span style="color:#000000;"> </span><span style="font-size:14px;"><span style="color:#808080;">produccion@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Programacion Radial</span><br />\r\n	<span style="color:#000000;"> </span><span style="font-size:14px;"><span style="color:#808080;">programacionradio@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Prensa</span><br />\r\n	<span style="color:#000000;"> </span><span style="font-size:14px;"><span style="color:#808080;">prensa@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color:#ff0000;">&raquo; Web</span><br />\r\n	<span style="color:#000000;"> </span><span style="font-size:14px;"><span style="color:#808080;">webmaster@radioinsomnio.com.pe</span></span></span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 4);
INSERT INTO `configuracion` VALUES (7, 'CORREO_QUIENES_SOMOS', 'correo@radioinsomnio.com.pe', 5);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `paginas`
-- 

INSERT INTO `paginas` VALUES (1, 1, 'Administraci&oacute;n de usuarios', 'usuarios.php');
INSERT INTO `paginas` VALUES (2, 1, 'Configuracion', 'configuracion.php');

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
  `lectura_usuario` char(2) NOT NULL default '',
  `escritura_usuario` char(2) NOT NULL default '',
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (27, 1, 'user2', 'user2', 'user2@sitio.com', 'user2', '12345', '2011-10-19', 'SI', 'SI');
INSERT INTO `usuarios` VALUES (25, 1, 'usuario', 'usuario', 'usuario@sitio.com', 'usuario', '123456', '2011-06-22', 'SI', 'SI');

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

INSERT INTO `usuarios_paginas` VALUES (2, 17);
INSERT INTO `usuarios_paginas` VALUES (2, 16);
INSERT INTO `usuarios_paginas` VALUES (2, 15);
INSERT INTO `usuarios_paginas` VALUES (2, 14);
INSERT INTO `usuarios_paginas` VALUES (2, 13);
INSERT INTO `usuarios_paginas` VALUES (2, 12);
INSERT INTO `usuarios_paginas` VALUES (2, 11);
INSERT INTO `usuarios_paginas` VALUES (2, 10);
INSERT INTO `usuarios_paginas` VALUES (2, 9);
INSERT INTO `usuarios_paginas` VALUES (2, 8);
INSERT INTO `usuarios_paginas` VALUES (2, 7);
INSERT INTO `usuarios_paginas` VALUES (2, 6);
INSERT INTO `usuarios_paginas` VALUES (2, 3);
INSERT INTO `usuarios_paginas` VALUES (2, 4);
INSERT INTO `usuarios_paginas` VALUES (2, 5);
INSERT INTO `usuarios_paginas` VALUES (2, 2);
INSERT INTO `usuarios_paginas` VALUES (2, 1);
INSERT INTO `usuarios_paginas` VALUES (2, 18);
INSERT INTO `usuarios_paginas` VALUES (25, 18);
INSERT INTO `usuarios_paginas` VALUES (25, 17);
INSERT INTO `usuarios_paginas` VALUES (25, 16);
INSERT INTO `usuarios_paginas` VALUES (25, 15);
INSERT INTO `usuarios_paginas` VALUES (25, 14);
INSERT INTO `usuarios_paginas` VALUES (25, 13);
INSERT INTO `usuarios_paginas` VALUES (25, 12);
INSERT INTO `usuarios_paginas` VALUES (25, 11);
INSERT INTO `usuarios_paginas` VALUES (25, 10);
INSERT INTO `usuarios_paginas` VALUES (25, 9);
INSERT INTO `usuarios_paginas` VALUES (25, 8);
INSERT INTO `usuarios_paginas` VALUES (25, 7);
INSERT INTO `usuarios_paginas` VALUES (25, 6);
INSERT INTO `usuarios_paginas` VALUES (25, 3);
INSERT INTO `usuarios_paginas` VALUES (25, 4);
INSERT INTO `usuarios_paginas` VALUES (25, 5);
INSERT INTO `usuarios_paginas` VALUES (25, 2);
INSERT INTO `usuarios_paginas` VALUES (25, 1);
INSERT INTO `usuarios_paginas` VALUES (26, 1);
INSERT INTO `usuarios_paginas` VALUES (26, 2);
INSERT INTO `usuarios_paginas` VALUES (26, 5);
INSERT INTO `usuarios_paginas` VALUES (26, 4);
INSERT INTO `usuarios_paginas` VALUES (26, 3);
INSERT INTO `usuarios_paginas` VALUES (26, 6);
INSERT INTO `usuarios_paginas` VALUES (26, 7);
INSERT INTO `usuarios_paginas` VALUES (26, 8);
INSERT INTO `usuarios_paginas` VALUES (26, 9);
INSERT INTO `usuarios_paginas` VALUES (26, 10);
INSERT INTO `usuarios_paginas` VALUES (26, 11);
INSERT INTO `usuarios_paginas` VALUES (26, 12);
INSERT INTO `usuarios_paginas` VALUES (26, 13);
INSERT INTO `usuarios_paginas` VALUES (26, 14);
INSERT INTO `usuarios_paginas` VALUES (26, 15);
INSERT INTO `usuarios_paginas` VALUES (26, 16);
INSERT INTO `usuarios_paginas` VALUES (26, 17);
INSERT INTO `usuarios_paginas` VALUES (26, 18);
