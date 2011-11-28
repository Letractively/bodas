<?php
	include("inc.apptop.php");

	if(isset($_POST['verificar_email_repetido']) && $_POST['verificar_email_repetido'] == '1'){
		$objUsuario = new UsuarioCliente;
		echo $objUsuario->verificar_email_repetido($_POST['txtCorreo']);
	}
	if(isset($_POST['verificar_email_repetido']) && $_POST['verificar_email_repetido'] == '2'){
		$objUsuario = new UsuarioCliente;
		echo $objUsuario->verificar_email_repetido2($_POST['txtCorreo'], $_POST['correo_actual']);
	}
?>