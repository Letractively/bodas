<?php 
	error_reporting(E_ALL ^ E_NOTICE);
		
	ini_set("session.cookie_lifetime", 10800);
	ini_set("session.gc_maxlifetime", 10800);

	include_once("inc.core.php");

	require_once(_model_."Main.php");
	require_once(_model_."AdminMain.php");
	require_once(_model_."Mysql.php");
	require_once(_model_."Conexion.php");
	require_once(_model_."Configuration.php");
	require_once(_util_."net/ftp.cls.php");
	require_once(_util_."kses.php");
	require_once(_nativos_."lib.cls.php");
	require_once(_util_."class.message.php");
	require_once(_nativos_."tags_html.php");

	require_once(_model_."Utilitarios.php");

	require_once(_model_."Staf.php");
	require_once(_model_."Stafs.php");
	require_once(_model_."StafTipo.php");

	require_once(_model_."Noticia.php");
	require_once(_model_."ComentarioNoticia.php");
	require_once(_model_."ComentariosNoticias.php");

	require_once(_model_."Evento.php");
	require_once(_model_."ComentarioEvento.php");
	require_once(_model_."ComentariosEventos.php");

	require_once(_model_."UsuarioRegistrado.php");
	require_once(_model_."UsuariosRegistrados.php");

	require_once(_model_."Publicidad.php");
	require_once(_model_."TipoPublicidad.php");
	require_once(_model_."Auspiciador.php");
	require_once(_model_."Concurso.php");

	require_once(_model_."PaginaAmiga.php");
	require_once(_model_."PaginasAmigas.php");

	require_once(_view_."Utiles.php");
	require_once(_view_."Secciones.php");

	require_once(_model_."Programa.php");
	require_once(_model_."Programas.php");

	require_once(_model_."Video.php");
	require_once(_model_."Videos.php");

	require_once(_model_."Horario.php");
	require_once(_model_."Horarios.php");

	require_once(_model_."Galeria.php");
	require_once(_model_."Galerias.php");

	require_once(_model_."Tema.php");
	require_once(_model_."Temas.php");

	require_once(_model_."Ranking.php");
	require_once(_model_."Rankings.php");

	require_once(_model_."ComentarioGaleria.php");
	require_once(_model_."ComentariosGalerias.php");

	require_once(_model_."Banda.php");
	require_once(_model_."Blog.php");
	require_once(_model_."Articulo.php");
	
	require_once(_model_."ComentarioArticulo.php");
	require_once(_model_."ComentariosArticulos.php");

	require_once(_model_."ArticuloAudio.php");

	require_once(_view_."ViewBandas.php");
	require_once(_view_."ViewStaff.php");
	require_once(_view_."ViewFotos.php");
	require_once(_view_."ViewConcursos.php");

	session_start();

	//Configuracion de base de datos.
	$link = new Conexion($_cfg['bd']['host'],$_cfg['bd']['user'],$_cfg['bd']['password'],$_cfg['bd']['bd']); 
	if(!isset($_SERVER['HTTP_REFERER'])){$_SERVER['HTTP_REFERER']="http://".$_SERVER['HTTP_HOST'];}

	$config_site = new Configuration();
	$configs = $config_site->getData();

	foreach($configs as $clave=>$valor){
		define($clave,$valor);
	}

	if(!isset($_SESSION['suscripcion'])){
		$_SESSION['suscripcion'] = 1;
	}else{
		$_SESSION['suscripcion'] = 0;
	}

?>