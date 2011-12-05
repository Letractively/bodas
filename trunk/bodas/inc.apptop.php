<?php 
	error_reporting(E_ALL ^ E_NOTICE);
		
	ini_set("session.cookie_lifetime", 10800);
	ini_set("session.gc_maxlifetime", 10800);

	include_once("inc.core.php");

	// Utilitarios
	require_once(_model_."Main.php");
	require_once(_model_."AdminMain.php");
	require_once(_model_."Mysql.php");
	require_once(_model_."Conexion.php");
	require_once(_util_."net/ftp.cls.php");
	require_once(_util_."kses.php");
	require_once(_nativos_."lib.cls.php");
	require_once(_util_."class.message.php");
	require_once(_nativos_."tags_html.php");
	require_once(_model_."Utilitarios.php");


	// Modelos
	require_once(_model_."RedSocial.php");
	require_once(_model_."UsuarioCliente.php");
	
	require_once(_model_."ProveedorRubro.php");
	require_once(_model_."ProveedorTipo.php");
	require_once(_model_."ProveedorGaleria.php");
	require_once(_model_."ProveedorRed.php");
	require_once(_model_."ProveedorRecomendado.php");
	require_once(_model_."ProveedorPublicacion.php");
	require_once(_model_."ProveedorPublicacionComentario.php");
	require_once(_model_."Proveedor.php");
	require_once(_model_."Distrito.php");


	// Vistas
	require_once(_view_."VwIndex.php");
	require_once(_view_."VwProveedores.php");
	require_once(_view_."VwCatalogo.php");
	require_once(_view_."VwUsuarioCliente.php");
	
	session_start();

	//Configuracion de base de datos.
	$link = new Conexion($_cfg['bd']['host'],$_cfg['bd']['user'],$_cfg['bd']['password'],$_cfg['bd']['bd']); 
?>