<?php
	include("inc.aplication_top.php");
	$objUtilitarios = new Utilitarios();
	if(isset($_GET['proveedor'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'proveedores');
		echo $img;
	}
?>