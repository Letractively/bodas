<?php
	require_once("media/class.thumbnail.php");
	$rut = "../webroot/imgs/".$_GET['rut']."/".$_GET['img'];
	$image = new Thumbnail($rut);
	$image->SetfontColor("grisclaro");
	$image->CreateThumbnail($_GET['w'],$_GET['h']);
?>