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
	}else if( $_POST['me_gusta'] == 1 && isset($_POST['id_usuario']) && isset($_POST['id_proveedor']) ){
		$objUsuarioClienteMeGusta = new UsuarioClienteMeGusta;
		echo $objUsuarioClienteMeGusta->agregar_me_gusta($_POST['id_usuario'], $_POST['id_proveedor']);

	/*}else if( $_POST['no_me_gusta'] == 1 && isset($_POST['id_usuario']) && isset($_POST['id_proveedor']) ){
		$objUsuarioClienteMeGusta = new UsuarioClienteMeGusta;
		echo $objUsuarioClienteMeGusta->quitar_me_gusta($_POST['id_usuario'], $_POST['id_proveedor']);*/

	}else if( $_POST['pub_me_gusta'] == 1 && isset($_POST['id_usuario']) && isset($_POST['id_publicacion']) ){
		$objUsuarioClientePublicacion = new UsuarioClientePublicacion;
		echo $objUsuarioClientePublicacion->agregar_me_gusta($_POST['id_usuario'], $_POST['id_publicacion']);
	}
	
?>