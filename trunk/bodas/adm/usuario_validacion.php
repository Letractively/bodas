<?php
	include("inc.aplication_top.php");

	if(isset($_POST['verificar_email_repetido']) && $_POST['verificar_email_repetido'] == '1'){
		$objUsuario = new Usuario;
		echo $objUsuario->verificar_email_repetido($_POST['txtCorreo']);
	}
	if(isset($_POST['verificar_usuario_repetido']) && $_POST['verificar_usuario_repetido'] == '1'){
		$objUsuario = new Usuario;
		echo $objUsuario->verificar_usuario_repetido($_POST['txtUsuario']);
	}

	if(isset($_POST['verificar_email_repetido']) && $_POST['verificar_email_repetido'] == '2'){
		$objUsuario = new Usuario;
		echo $objUsuario->verificar_email_repetido2($_POST['txtCorreo'], $_POST['txtCorreo2']);
	}
	if(isset($_POST['verificar_usuario_repetido']) && $_POST['verificar_usuario_repetido'] == '2'){
		$objUsuario = new Usuario;
		echo $objUsuario->verificar_usuario_repetido2($_POST['txtUsuario'], $_POST['txtUsuario2']);
	}
?>