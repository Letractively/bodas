<?php
	include('inc.apptop.php');
	$objUtilitarios = new Utilitarios();
	$img = $objUtilitarios->subirImagenCarpeta2($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'proveedores_fotos');
	$objProveedorGaleria = new ProveedorGaleria();
	echo $objProveedorGaleria->agregarFotos($img, $_GET['id_proveedor']);
?>