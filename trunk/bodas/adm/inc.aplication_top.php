<?php
	ini_set("session.cookie_lifetime", 10800);
	ini_set("session.gc_maxlifetime", 10800);

	include_once("../inc.core.php");

	require_once(_model_."Utilitarios.php");

	require_once(_model_."AdminMain.php");
	require_once(_model_."Conexion.php");
	require_once(_model_."Plantilla.php");
	require_once(_model_."Menu.php");
	require_once(_model_."Acceso.php");
	require_once(_model_."Sesion.php");
	require_once(_model_."Usuario.php");
	require_once(_model_."Usuarios.php");

	require_once(_model_."ModuloUsuario.php");
	require_once(_model_."Mysql.php");

	require_once(_model_."ProveedorRubro.php");
	require_once(_model_."ProveedoresRubros.php");
	require_once(_model_."ProveedorGaleria.php");

	require_once(_model_."ProveedorPublicacion.php");
	require_once(_model_."ProveedoresPublicaciones.php");

	require_once(_model_."ProveedorPublicacionComentario.php");
	require_once(_model_."ProveedoresPublicacionesComentarios.php");

	require_once(_model_."ProveedorRecomendado.php");
	require_once(_model_."ProveedoresRecomendados.php");

	require_once(_model_."ProveedorRed.php");
	require_once(_model_."ProveedoresRedes.php");

	require_once(_model_."Proveedor.php");
	require_once(_model_."Proveedores.php");

	require_once(_model_."Distrito.php");

	require_once(_model_."RedSocial.php");
	require_once(_model_."TipoCuenta.php");
	require_once(_model_."UsuarioCliente.php");
	require_once(_model_."UsuariosClientes.php");

	require_once(_model_."UsuarioClienteProveedor.php");

	require_once(_model_."ProveedorTipo.php");
	require_once(_model_."Proveedores.php");

	require_once(_model_."ArticuloTipo.php");
	require_once(_model_."ArticulosTipos.php");
	require_once(_model_."ArticuloGaleria.php");

	require_once(_model_."Articulo.php");
	require_once(_model_."Articulos.php");

	require_once(_model_."ArticuloComentario.php");
	require_once(_model_."ArticulosComentarios.php");

	require_once(_model_."ArticuloPortada.php");
	require_once(_model_."ArticulosPortadas.php");

	require_once(_model_."RubrosArticulos.php");

	require_once(_model_."Revista.php");
	require_once(_model_."Revistas.php");

	require_once(_model_."Variado.php");
	require_once(_model_."Variados.php");
	
	require_once(_model_."Evento.php");
	require_once(_model_."Eventos.php");

	require_once(_model_."Popup.php");
	require_once(_model_."Popups.php");

	require_once(_model_."InscripcionIndex.php");
	require_once(_model_."InscripcionesIndex.php");

	$link = new Conexion($_cfg['bd']['host'],$_cfg['bd']['user'],$_cfg['bd']['password'],$_cfg['bd']['bd']);
	session_start();
?>