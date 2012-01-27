<?php
	include("inc.apptop.php");
	$id = isset($_POST['id']) ? $_POST['id'] : 0; 
	if(isset($_POST['opcion']) && $_POST['opcion'] == 'foto'){
		if($_POST['nom_foto'] != '') unlink('aplication/webroot/imgs/proveedores_fotos/'.$_POST['nom_foto']);
		$sql = " DELETE FROM proveedores_imagenes WHERE id_proveedor_imagen = '".$id."' ";
		$query = new Consulta($sql);
		echo "La imagen fue suprimida del servidor.";
	}
?>