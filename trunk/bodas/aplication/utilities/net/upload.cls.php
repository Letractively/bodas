<?php

class Upload{

	function load($name, $type, $temp, $destino, $tamanio){
		$tam = number_format(($tamanio / 1024),2);
		if(!(strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "png") || strpos($type, "bmp")) ){
				
				echo "<div id=error>La extensión del archivo ".$name." no es correcta. <br><br>
					<table><tr><td align='left'>
						<li>Se permiten archivos .gif, .bmp, .jpg y .png </td></tr></table></div><br>"; 
		}elseif($tamanio > 2000000){
			echo "<div id=error>La extensión o el tamaño ".$tam." MB  del archivo ".$name." no es correcta. <br><br>
					<table><tr><td align='left'>						
						<li>se permiten archivos de MB máximo.</td></tr></table></div><br>"; 
		}else{
			if(!move_uploaded_file ( $temp, $destino . $name)){	
				echo "Ocurrió algún error al subir la imagen No pudo guardarse."; 
			}                 
		}	
	}
	
	function upload_imagen($nombre, $temp, $destino, $tarchivo, $tamano ){
	
		if(!((strpos($tarchivo, "gif") || strpos($tarchivo, "jpeg") || strpos($tarchivo, "png") || strpos($tarchivo, "bmp")))){
			echo "<div id=error>La extensión ".$tarchivo." del archivo ".$nombre." no es correcta. <br><br>
				<table>
					<tr>
						<td align='left'>
							<li>Se permiten archivos .gif, .bmp, .jpg y .png <br>
						</td>
					</tr>
				</table></div>"; 
		}elseif($tamano > 1500000){
				echo "<div id=error>La extensión o el tamaño ".$tamano * 1024 ." del archivo ".$nombre." no es correcta. <br><br>
				<table>
					<tr>
						<td align='left'>
							<li>se permiten archivos de 1.5 MB máximo.
						</td>
					</tr>
				</table></div>"; 
		}else{
			if(move_uploaded_file($temp,$destino.$nombre)){	
				return true;												
			}else{
				return false;
			}
		}			
	}	
}

?>