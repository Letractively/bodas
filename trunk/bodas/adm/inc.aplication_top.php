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
	require_once(_model_."Usuario.php");
	require_once(_model_."Usuarios.php");
	
	require_once(_model_."ModuloUsuario.php");
	require_once(_model_."Mysql.php");

	$link = new Conexion($_cfg['bd']['host'],$_cfg['bd']['user'],$_cfg['bd']['password'],$_cfg['bd']['bd']); 
	session_start();

	$config_site = new Configuration();
	$configs = $config_site->getData();

	foreach($configs as $clave=>$valor){
		define($clave,$valor);
	}

?>