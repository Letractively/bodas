<?php 
	error_reporting(E_ALL ^ E_NOTICE);
		
	ini_set("session.cookie_lifetime", 10800);
	ini_set("session.gc_maxlifetime", 10800);

	include_once("inc.core.php");

	// Utilitarios
	require_once(_model_."Main.php");
	require_once(_model_."AdminMain.php");
	require_once(_model_."Mysql.php");
	require_once(_model_."Conexion.php");
	require_once(_util_."net/ftp.cls.php");
	require_once(_util_."kses.php");
	require_once(_nativos_."lib.cls.php");
	require_once(_util_."class.message.php");
	require_once(_nativos_."tags_html.php");
	require_once(_model_."Utilitarios.php");

	// Modelos
	require_once(_model_."RedSocial.php");
	require_once(_model_."UsuarioCliente.php");
	require_once(_model_."UsuarioClienteProveedor.php");
	
	require_once(_model_."ProveedorRubro.php");
	require_once(_model_."ProveedorTipo.php");
	require_once(_model_."ProveedorGaleria.php");
	require_once(_model_."ProveedorRed.php");
	require_once(_model_."ProveedorRecomendado.php");
	require_once(_model_."ProveedorPublicacion.php");
	require_once(_model_."ProveedorPublicacionComentario.php");
	require_once(_model_."Proveedor.php");
	require_once(_model_."Distrito.php");

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

	require_once(_model_."UsuarioClienteMeGusta.php");
	require_once(_model_."UsuarioClientePublicacion.php");

	require_once(_model_."Variado.php");
	require_once(_model_."Variados.php");

	require_once(_model_."Evento.php");
	require_once(_model_."Eventos.php");

	require_once(_model_."Popup.php");
	require_once(_model_."Popups.php");

	// Vistas
	require_once(_view_."Utiles.php");
	require_once(_view_."VwIndex.php");
	require_once(_view_."VwProveedores.php");
	require_once(_view_."VwCatalogo.php");
	require_once(_view_."VwUsuarioCliente.php");
	require_once(_view_."VwNoticias.php");
	require_once(_view_."VwContacto.php");
	require_once(_view_."VwSuscripcion.php");
	require_once(_view_."VwRevistas.php");

	require_once(_view_."VwEventos.php");
	require_once(_view_."VwLunaMiel.php");
	require_once(_view_."VwTendencias.php");
	require_once(_view_."VwTuboda.php");
	require_once(_view_."VwRequisitos.php");
	require_once(_view_."VwMunicipalidades.php");
	require_once(_view_."VwIglesias.php");
	require_once(_view_."VwQuienesSomos.php");
	require_once(_view_."VwAnuncio.php");
	require_once(_view_."VwTemas.php");	
	require_once(_view_."VwPasoAPaso.php");	
	require_once(_view_."VwShower.php");	
	
	require_once(_view_."VwCateringYTortas.php");
	require_once(_view_."VwDecoracion.php");
	require_once(_view_."VwBouquets.php");
	require_once(_view_."VwLaFiesta.php");
	require_once(_view_."VwFotoYVideo.php");	
	require_once(_view_."VwTransporte.php");
	require_once(_view_."VwBodaDeFamosos.php");

	require_once(_view_."VwVestidosDeNovia.php");
	require_once(_view_."VwTrajesDeNovio.php");
	require_once(_view_."VwJoyeriaYAccesorios.php");
	require_once(_view_."VwPeinadoYMaquillaje.php");
	require_once(_view_."VwBellezaYSalud.php");
	require_once(_view_."VwLosInvitados.php");
	require_once(_view_."VwResultados.php");
	require_once(_view_."VwLunaDeMiel.php");
	require_once(_view_."VwDestinosPeru.php");
	require_once(_view_."VwDestinosExtranjero.php");
	require_once(_view_."VwEntrevistas.php");
	require_once(_view_."VwCheckList.php");
	require_once(_view_."VwRecomendaciones.php");
	
	session_start();

	// Configuracion de base de datos.
	$link = new Conexion($_cfg['bd']['host'],$_cfg['bd']['user'],$_cfg['bd']['password'],$_cfg['bd']['bd']); 
	
	// Buscar
	if(isset($_POST['rdoOpc'])){
		$_SESSION['rdoOpc'] = $_POST['rdoOpc'];
	}else if(!isset($_SESSION['rdoOpc'])){
		$_SESSION['rdoOpc'] = "rub";
	}
	
?>