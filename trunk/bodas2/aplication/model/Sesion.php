<?php
class Sesion{
	
	public function SesionLogear($array=""){
		if(isset($array)){	
			if(is_array($array)){				
					$_SESSION['session'][0] = $array[0]['id'];
					$_SESSION['session'][1] = $array[0]['user'];
					$_SESSION['session'][2] = $array[0]['rol'];
					$_SESSION['session'][3] = $array[0]['lectura'];	
					$_SESSION['session'][4] = $array[0]['escritura'];			
			}else{ echo "<br> no es array"; }
		}else{			
			header("Location: index.php");
		}
	}

	public function SesionLogeado( $url=""){
		if(isset($_SESSION['session'] )){	
			Header("Location: $url");
		}
	}

	public function SesionSiNoLogeado($url=""){
		if(!isset($_SESSION['session'])){	
			Header("Location: $url");
		}
	}

	public function NoticiasComentarios(){
		if(isset($_GET['id_not'])){
			$_SESSION['id_noticia'] = $_GET['id_not'];
		}
		if(!isset($_SESSION['id_noticia'])){
			Header("Location: noticias.php");
		}
	}

	public function EventosComentarios(){
		if(isset($_GET['id_even'])){
			$_SESSION['id_evento'] = $_GET['id_even'];
		}
		if(!isset($_SESSION['id_evento'])){
			Header("Location: eventos.php");
		}
	}

	public function GaleriasComentarios(){
		if(isset($_GET['id_gal'])){
			$_SESSION['id_galeria'] = $_GET['id_gal'];
		}
		if(!isset($_SESSION['id_galeria'])){
			Header("Location: galerias.php");
		}
	}

	public function SesionRanking(){
		if(isset($_GET['id_pro'])){
			$_SESSION['id_programa'] = $_GET['id_pro'];
		}
		if(!isset($_SESSION['id_programa'])){
			Header("Location: ranking.php");
		}
	}

	public function SessionDelete( $url=""){
			session_unset();
			session_destroy();		
		header("Location: $url");
	}
}


?>