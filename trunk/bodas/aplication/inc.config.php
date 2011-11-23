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
		$_cfg['sitio']['url'] = "http://www.radioinsomnio.com.pe/ensamble/";
		$_cfg['sitio']['ruta']= $_SERVER['DOCUMENT_ROOT']."/";

		$_cfg['bd']['host']		= "bdensamble.db.6550763.hostedresource.com";
		$_cfg['bd']['bd']		= "bdensamble";
		$_cfg['bd']['user']		= "bdensamble";
		$_cfg['bd']['password'] = "M1t3r1m05";
	}
?>