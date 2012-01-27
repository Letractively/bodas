<?php

require_once("media/class.thumbnail.php");
$image = new Thumbnail("../webroot/imgs/catalogo/".$_GET['imagen']);
//$image->SetTexto(" XDAVISION");
$image->SetfontColor("grisclaro");
$image->CreateThumbnail($_GET['w'],$_GET['h']);

?>