<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<?php if(_file_ == 'catalogo.php'){ 
		$objProveedorTit = new Proveedor($_GET['id_proveedor']);
		?>
    	<title>Revista bodas - <?php echo $objProveedorTit->nombre_proveedor ?></title>
   <?php }else if(isset($_GET['id_articulo'])){ 
		$objArticuloTit = new Articulo($_GET['id_articulo']);
		?>
        <title>Revista bodas - <?php echo $objArticuloTit->titulo ?></title>
    <?php }else{ ?>
    	<title>Revista Bodas</title>
    <?php } ?>
    
    <link href="<?php echo _bs_?>favicon.ico" type="image/x-icon" rel="shortcut icon" />

    <link rel="stylesheet" type="text/css" href="<?php echo _css_?>sitio_general.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo _css_?>sitio_estructura.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo _css_?>sitio_contenido.css"/>

    <script type="text/javascript" src="<?php echo _js_?>jquery-1.7.1.min.js"></script>

    <?php if(_file_ == 'index.php'){?>
		<script type="text/javascript" src="<?php echo _css_?>coin-slider/coin-slider.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo _css_?>coin-slider/coin-slider-styles.css" />	
	<?php }?>

    <?php if(_file_ == 'catalogo.php' || _file_ == 'noticias_detalle.php' || _file_ == 'paso_a_paso_detalle.php' || _file_ == 'la_fiesta_detalle.php' || _file_ == 'catering_y_tortas_detalle.php' || _file_ == 'bodas_de_famosos_detalle.php' || _file_ == 'bouquets_detalle.php' || _file_ == 'decoracion_detalle.php' || _file_ == 'foto_y_video_detalle.php' || _file_ == 'paso_a_paso_detalle.php' || _file_ == 'shower_detalle.php' || _file_ == 'temas_detalle.php' || _file_ == 'transporte_detalle.php' || _file_ == 'vestidos_de_novia_detalle.php' || _file_ == 'trajes_de_novio_detalle.php' || _file_ == 'joyeria_y_accesorios_detalle.php' || _file_ == 'peinado_y_maquillaje_detalle.php' || _file_ == 'belleza_y_salud_detalle.php' || _file_ == 'los_invitados_detalle.php'){?>
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
    
	

	
    
    <!--DOUBLE CLICK-->
    
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
    googletag.defineSlot('/15180053/index-inferior', [300, 250], 'div-gpt-ad-1328744417031-0').addService(googletag.pubads());
    googletag.defineSlot('/15180053/index-interno', [300, 100], 'div-gpt-ad-1328744417031-1').addService(googletag.pubads());
    googletag.defineSlot('/15180053/index-medio', [300, 250], 'div-gpt-ad-1328744417031-2').addService(googletag.pubads());
    googletag.defineSlot('/15180053/index-principal', [300, 250], 'div-gpt-ad-1328744417031-3').addService(googletag.pubads());
    googletag.defineSlot('/15180053/index-superior', [728, 90], 'div-gpt-ad-1328744417031-4').addService(googletag.pubads());
    googletag.defineSlot('/15180053/interiores-inferior', [300, 250], 'div-gpt-ad-1328744417031-5').addService(googletag.pubads());
    googletag.defineSlot('/15180053/interiores-interno', [300, 100], 'div-gpt-ad-1328744417031-6').addService(googletag.pubads());
    googletag.defineSlot('/15180053/interiores-medio', [300, 250], 'div-gpt-ad-1328744417031-7').addService(googletag.pubads());
    googletag.defineSlot('/15180053/interiores-principal', [300, 250], 'div-gpt-ad-1328744417031-8').addService(googletag.pubads());
    googletag.defineSlot('/15180053/interiores-superior', [728, 90], 'div-gpt-ad-1328744417031-9').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
    });
    </script>



	<!--<script type='text/javascript'>
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
    </script>-->
    
   <!-- <script type='text/javascript'>
		googletag.cmd.push(function() {
			googletag.defineSlot('/15180053/index_bodas', [300, 100], 'div-gpt-ad-1325713113749-0').addService(googletag.pubads());
			googletag.defineSlot('/15180053/index_inferior', [300, 250], 'div-gpt-ad-1325713113749-1').addService(googletag.pubads());
			googletag.defineSlot('/15180053/index_medio', [300, 250], 'div-gpt-ad-1325713113749-2').addService(googletag.pubads());
			googletag.defineSlot('/15180053/index_principal', [300, 250], 'div-gpt-ad-1325713113749-3').addService(googletag.pubads());
			googletag.defineSlot('/15180053/index_superior', [728, 90], 'div-gpt-ad-1325713113749-4').addService(googletag.pubads());
			googletag.defineSlot('/15180053/interior_bodas', [300, 100], 'div-gpt-ad-1325713113749-5').addService(googletag.pubads());
			googletag.defineSlot('/15180053/interior_inferior', [300, 250], 'div-gpt-ad-1325713113749-6').addService(googletag.pubads());
			googletag.defineSlot('/15180053/interior_medio', [300, 250], 'div-gpt-ad-1325713113749-7').addService(googletag.pubads());
			googletag.defineSlot('/15180053/interior_principal', [300, 250], 'div-gpt-ad-1325713113749-8').addService(googletag.pubads());
			googletag.defineSlot('/15180053/interior_superior', [728, 90], 'div-gpt-ad-1325713113749-9').addService(googletag.pubads());
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
		});
    </script>-->

	 <!--DOUBLE CLICK-->
     
     
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', UA-8015730-1]);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>

</head>