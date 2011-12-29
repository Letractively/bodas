<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bodas</title>
    <link rel="stylesheet" type="text/css" href="<?php echo _css_?>sitio_general.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo _css_?>sitio_estructura.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo _css_?>sitio_contenido.css"/>

    <script type="text/javascript" src="<?php echo _js_?>jquery-1.7.1.min.js"></script>
    
    <?php if(_file_ == 'index.php'){?>
			<script type="text/javascript" src="<?php echo _css_?>coin-slider/coin-slider.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo _css_?>coin-slider/coin-slider-styles.css" />	
	<?php }?>

    <?php if(_file_ == 'catalogo.php' || _file_ == 'noticias_detalle.php'){?>
    	<script type="text/javascript" src="<?php echo _js_?>galleria/galleria-1.2.5.min.js"></script>
	<?php }?>

    <link rel="stylesheet" type="text/css" href="<?php echo _css_?>smoothness/jquery-ui-1.8.16.custom.css"/>
    <script type="text/javascript" src="<?php echo _js_?>jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo _js_?>jquery.validate.min.js"></script>

	<script type="text/javascript" src="<?php echo _js_?>ckeditor/ckeditor.js"></script>

    <script type="text/javascript" src="<?php echo _js_?>swfupload/swfupload.js"></script>
    <script type="text/javascript" src="<?php echo _js_?>swfupload/jquery.swfupload.js"></script>
	<script type="text/javascript" src="<?php echo _js_?>swfupload/swf_upload.js"></script>

	<script type="text/javascript" src="<?php echo _js_?>jquery.textareaCounter.plugin.js"></script>
    <script type="text/javascript" src="<?php echo _js_?>jquery.labelify.js"></script>


    <script type="text/javascript" src="<?php echo _js_?>js.js"></script>
    
	<script type='text/javascript'>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];
		(function() {
		var gads = document.createElement('script');
		gads.async = true;
		gads.type = 'text/javascript';
		var useSSL = 'https:' == document.location.protocol;
		gads.src = (useSSL ? 'https:' : 'http:') + 
		'//www.googletagservices.com/tag/js/gpt.js';
		var node = document.getElementsByTagName('script')[0];
		node.parentNode.insertBefore(gads, node);
		})();
    </script>
    
    <script type='text/javascript'>
		googletag.cmd.push(function() {
		googletag.defineSlot('/15180053/index_bodas', [300, 100], 'div-gpt-ad-1323706037489-0').addService(googletag.pubads());
		googletag.defineSlot('/15180053/index_inferior', [300, 250], 'div-gpt-ad-1323706037489-1').addService(googletag.pubads());
		googletag.defineSlot('/15180053/index_medio', [300, 250], 'div-gpt-ad-1323706037489-2').addService(googletag.pubads());
		googletag.defineSlot('/15180053/index_principal', [300, 250], 'div-gpt-ad-1323706037489-3').addService(googletag.pubads());
		googletag.defineSlot('/15180053/index_superior', [728, 90], 'div-gpt-ad-1323706037489-4').addService(googletag.pubads());
		googletag.pubads().enableSingleRequest();
		googletag.enableServices();
		});
    </script>
    
    
</head>