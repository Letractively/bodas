<?php

	include("inc.aplication_top.php");
	$objUtilitarios = new Utilitarios();
	
	
	if(isset($_GET['proveedor'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'proveedores');
		echo $img;
		
		
	}else if(isset($_GET['proveedores_fotos'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'proveedores_fotos');
		$objProveedorGaleria = new ProveedorGaleria();
		echo $objProveedorGaleria->agregarFotos($img, $_GET['id_proveedor']);
		
		
	}else if(isset($_GET['usuario_cliente'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'usuarios_clientes');
		echo $img;
	}


?>