<?php
	include("inc.aplication_top.php");
	$objUtilitarios = new Utilitarios();
	if(isset($_GET['publicidad'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'publicidad');
		echo $img;
	}else if(isset($_GET['noticia'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'noticias');
		echo $img;
	}else if(isset($_GET['temas'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'temas');
		echo $img;
	}else if(isset($_GET['bandas'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'bandas');
		echo $img;
	}else if(isset($_GET['evento'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'eventos');
		echo $img;
	}else if(isset($_GET['auspiciadores'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'auspiciadores');
		echo $img;
	}else if(isset($_GET['concursos'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'concursos');
		echo $img;
	}else if(isset($_GET['staf'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'staf');
		echo $img;
	}else if(isset($_GET['webamiga'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'webamiga');
		echo $img;
	}else if(isset($_GET['programa_imagen'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'programa_imagen');
		echo $img;
	}else if(isset($_GET['programa_sonido'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'programa_sonido');
		echo $img;
	}else if(isset($_GET['galeria'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'galeria');
		$objGalerias = new Galerias();
		echo $objGalerias->agregarFotos($img, $_GET['idgal']);
	}else if(isset($_GET['ARCHIVO_INGRESO_SEMANA'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'configuracion');
		echo $img;
	}else if(isset($_GET['PROGRAMACION'])){
		$img = $objUtilitarios->subirImagenCarpeta($_FILES['Filedata']['tmp_name'], $_FILES['Filedata']['name'], 'configuracion');
		echo $img;
	}
?>