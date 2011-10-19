<?php
	session_start();
	if( !isset($_SESSION['session']) ){
		include("inc.aplication_top.php");
		if( isset($_POST['txtUsuario']) && isset($_POST['txtPassword']) ){
			$valida = Acceso::AccesoValida($_POST);
		}
		if($valida == 0 || $valida == ''){
			$error = $error + 1;
			header("Location: index.php?error=".$error);	
		}else{
			Sesion::SesionLogear($valida);
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
?>