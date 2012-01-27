<?php
	$x = 0;
	if( $x == 0 ){
		$_cfg['sitio']['url'] = "http://local.bodas.com/";
		$_cfg['sitio']['ruta']= $_SERVER['DOCUMENT_ROOT']."/";

		$_cfg['bd']['host']		= "localhost";
		$_cfg['bd']['bd']		= "bd_bodas";
		$_cfg['bd']['user']		= "root";
		$_cfg['bd']['password'] = "root";
	}else if( $x == 1 ){
		$_cfg['sitio']['url'] = "http://www.bodas.com.pe/new_bodas/";
		$_cfg['sitio']['ruta']= $_SERVER['DOCUMENT_ROOT']."/new_bodas/";

		$_cfg['bd']['host']		= "localhost";
		$_cfg['bd']['bd']		= "bodas_newbodas";
		$_cfg['bd']['user']		= "bodas_newbodas";
		$_cfg['bd']['password'] = "M1t3r1m05";
	}
?>