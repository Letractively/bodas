<?php 	
	include("aplication/inc.config.php");

	define("_includes_",$_cfg['sitio']['ruta']."aplication/includes/");

	define("_imgs_",$_cfg['sitio']['url']."aplication/webroot/imgs/");
	define("_icons_",$_cfg['sitio']['url']."aplication/webroot/imgs/icons/");
	define("_imgs_prod_",$_cfg['sitio']['url']."aplication/webroot/imgs/catalogo/");
	define("_imgs_file_",$_cfg['sitio']['url']."aplication/utilities/img.php");
	define("_imagen_","aplication/utilities/imagen.php");
	define("_js_",$_cfg['sitio']['url']."aplication/webroot/js/");
	define("_css_",$_cfg['sitio']['url']."aplication/webroot/css/");
	define("_flash_",$_cfg['sitio']['url']."aplication/webroot/flash/");
	define("_util_",$_cfg['sitio']['ruta']."aplication/utilities/");

	define("_view_", $_cfg['sitio']['ruta']."aplication/view/");
	define("_model_",$_cfg['sitio']['ruta']."aplication/model/");
	define("_controller_",$_cfg['sitio']['ruta']."aplication/controller/");
	define("_nativos_",$_cfg['sitio']['ruta']."aplication/nativos/");
	define('BS_',$_cfg['sitio']['url']);

	define("_img_tem_",BS_."aplication/webroot/imgs/temas/");
	define("_img_rnk_",BS_."aplication/webroot/imgs/programa_sonido/");
	define("_img_not_",BS_."aplication/webroot/imgs/noticias/");
	define("_img_rut_",BS_."aplication/utilities/img_ruta.php?");
	define("_tt_",BS_."aplication/utilities/tt.php?");
	define("_dot",".");

?>