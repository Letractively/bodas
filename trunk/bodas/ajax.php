<?php
	include('inc.apptop.php');
	if( isset($_POST['agregar_publicacion']) && $_POST['agregar_publicacion'] == 1){
		$objProveedorPublicacion = new ProveedorPublicacion();
		echo $objProveedorPublicacion->agregar_publicacion();
	}else if( isset($_POST['eliminar_post_banda']) && $_POST['eliminar_post_banda'] == 1){
		$objProveedorPublicacion = new ProveedorPublicacion();
		echo $objProveedorPublicacion->eliminar_publicacion();
	}else if( isset($_POST['agregar_publicacion_comentario']) && $_POST['agregar_publicacion_comentario'] == 1){
		$objProveedorPublicacionComentario = new ProveedorPublicacionComentario();
		echo $objProveedorPublicacionComentario->agregar_comentario();
	}else if( isset($_POST['eliminar_comentario']) && $_POST['eliminar_comentario'] == 1){
		$objProveedorPublicacion = new ProveedorPublicacionComentario();
		echo $objProveedorPublicacion->eliminar_comentario();
	}else if( isset($_POST['agregar_publicacion_comentario_noticia']) && $_POST['agregar_publicacion_comentario_noticia'] == 1){
		$objArticuloComentario = new ArticuloComentario();
		echo $objArticuloComentario->agregar_comentario();
	}else if( isset($_POST['eliminar_comentario_noticia']) && $_POST['eliminar_comentario_noticia'] == 1){
		$objArticuloComentario = new ArticuloComentario();
		echo $objArticuloComentario->eliminar_comentario();
	}
?>