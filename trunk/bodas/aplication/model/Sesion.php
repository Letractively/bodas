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
	
		public function SessionDelete( $url=""){
				session_unset();
				session_destroy();		
			header("Location: $url");
		}
	}
?>