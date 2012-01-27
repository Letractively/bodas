<?php


function zoom_imagen($img, $w, $h){
		$tratar = "<a href=\"#\" onclick=\"window.open('"._util_."imagen.php?img="._imgs_prod_.$img."','','scrollbars=NO,resizable=YES')\" title=\" zoom ".$img."\" >";
	   $tratar .="<img src=\""._imgs_file_."?imagen=".$img."&w=".$w."&h=".$h."\"  border=\"0\"   /></a>";
		return $tratar;
	}

function resize_imagen($img, $w, $h, $url){
		$tratar = "<a href=\"".$url."\"   >";
	   $tratar .="<img src=\""._imgs_file_."?imagen=".$img."&w=".$w."&h=".$h."\" /></a>";
		return $tratar;
	}

?>