<?php 	

	header ('Content-type: text/html; charset=utf-8');

	include("aplication/inc.config.php");

	define("_inc_",$_cfg['sitio']['ruta']."aplication/includes/");

	define("_img_",$_cfg['sitio']['url']."aplication/webroot/imgs/");
	define("_icn_",$_cfg['sitio']['url']."aplication/webroot/imgs/icons/");
	define("_imagen_","aplication/utilities/imagen.php");
	define("_js_",$_cfg['sitio']['url']."aplication/webroot/js/");
	define("_css_",$_cfg['sitio']['url']."aplication/webroot/css/");
	define("_flash_",$_cfg['sitio']['url']."aplication/webroot/flash/");
	define("_util_",$_cfg['sitio']['ruta']."aplication/utilities/");

	define("_view_", $_cfg['sitio']['ruta']."aplication/view/");
	define("_model_",$_cfg['sitio']['ruta']."aplication/model/");
	define("_controller_",$_cfg['sitio']['ruta']."aplication/controller/");
	define("_nativos_",$_cfg['sitio']['ruta']."aplication/nativos/");
	define('_bs_',$_cfg['sitio']['url']);

	define("_tt_",_bs_."aplication/utilities/tt.php?");
?>