<?php
	include("inc.aplication_top.php");
	if( isset($_POST['obtener_articulos']) && $_POST['obtener_articulos'] == 1){
		$objArticulos = new Articulo();
		echo $objArticulos->getArticuloXTipoJSON($_POST['id_articulo_tipo']);
	}
?>