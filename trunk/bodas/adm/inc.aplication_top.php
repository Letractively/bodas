<?php

	ini_set("session.cookie_lifetime", 10800);
	ini_set("session.gc_maxlifetime", 10800);

	include_once("../inc.core.php");

	require_once(_model_."Utilitarios.php");

	require_once(_model_."AdminMain.php");
	require_once(_model_."Conexion.php");
	require_once(_model_."Configuration.php");
	require_once(_model_."Plantilla.php");
	require_once(_model_."Menu.php");
	require_once(_model_."Acceso.php");
	require_once(_model_."Sesion.php");
	require_once(_model_."Usuarios.php");
	require_once(_model_."ModuloUsuario.php");
	require_once(_model_."Sesion.php");
	require_once(_model_."Informacion.php");
	require_once(_model_."NavegadorAdmin.php");
	require_once(_model_."Opciones.php");
	require_once(_util_.'net/upload.cls.php');
	require_once(_model_."Mysql.php");
	require_once(_nativos_."lib.cls.php");

	$link = new Conexion($_cfg['bd']['host'],$_cfg['bd']['user'],$_cfg['bd']['password'],$_cfg['bd']['bd']); 
	define("ID_IDIOMA","1");

	session_start();
	if($_GET['procesar']=="si"){
		$acceso = new Acceso();
		$acceso->AccesoRecuperar();
		header("Location:index.php");
	}

	$config_site = new Configuration();
	$configs = $config_site->getData();

	foreach($configs as $clave=>$valor){
		define($clave,$valor);
	}

?>