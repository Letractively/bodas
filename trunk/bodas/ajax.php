<?php
	include('inc.apptop.php');
	if( isset($_POST['agregar_publicacion']) && $_POST['agregar_publicacion'] == 1){
		$objProveedorPublicacion = new ProveedorPublicacion();
		echo $objProveedorPublicacion->agregar_publicacion();
	}else if( isset($_POST['eliminar_post_banda']) && $_POST['eliminar_post_banda'] == 1){
		$objProveedorPublicacion = new ProveedorPublicacion();
		echo $objProveedorPublicacion->eliminar_publicacion();
	}else if( isset($_POST['publicar_comentario_banda']) && $_POST['publicar_comentario_banda'] == 1){
		$objBandaPost = new BandaPost();
		echo $objBandaPost->agregar_comentario();
	}
?>