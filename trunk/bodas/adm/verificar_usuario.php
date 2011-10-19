<?php
	include("inc.aplication_top.php");
	$objUtilitarios = new UsuarioBlog();
	if(isset($_POST['opcion']) && $_POST['opcion'] == 'verificar_usuario'){
		if(isset($_POST['user'])){
			$aryUser = $objUtilitarios->buscarUsuario($_POST['user']);
		}
		echo count($aryUser);
	}
?>