<?php include('inc.apptop.php'); ?>
<?php
	$objVwUsuarioCliente = new VwUsuarioCliente();
	switch($_GET['opcion']){
		case 'login':
			$objVwUsuarioCliente->login(); 
		break;
		case 'salir':
			$objVwUsuarioCliente->salir(); 
		break;
	}
?>