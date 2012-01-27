<?php
	class Utilitarios {
		private $_notificacion;

		public function updateCampo($table, $value, $id){
			$sql = "UPDATE ".$table." SET ".$value." WHERE ".$id;
			$sq = new Consulta($sql);
			return $sql;
		}

		public function subirImagen($ftmp, $nombre){
			$nombre = $this->procesar_nombre_imagen($nombre);
			$fname = '../aplication/webroot/imgs/catalogo/'.$nombre;
			chmod($fname, 0777);
			move_uploaded_file($ftmp, $fname);
			return $nombre;
		}

		public function subirImagenCarpeta($ftmp, $nombre, $carpeta){
			$nombre = $this->procesar_nombre_imagen($nombre);
			$fname = '../aplication/webroot/imgs/'.$carpeta.'/'.$nombre;
			move_uploaded_file($ftmp, $fname);
			return $nombre;
		}

		public function subirImagenCarpeta2($ftmp, $nombre, $carpeta){
			$nombre = $this->procesar_nombre_imagen($nombre);
			$fname = 'aplication/webroot/imgs/'.$carpeta.'/'.$nombre;
			move_uploaded_file($ftmp, $fname);
			return $nombre;
		}

		public function procesar_nombre_imagen($string) {
			$string = substr($string,0, -4);
			$string = utf8_decode($string);
			$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
			$repl = array('a', 'e', 'i', 'o', 'u', 'n');
			$string = str_replace ($find, $repl, $string);
			$NOT_acceptable_caracteres_regex = '#[^-a-zA-Z0-9_ ]#';
			$string = preg_replace($NOT_acceptable_caracteres_regex, '', $string);
			$string = trim($string);
			$string = preg_replace('#[-_ ]+#', '-', $string);
			return date('His').'_'.strtolower($string).".jpg";
		}

		public function subirImagenCarpetaValidar($ftmp, $nombre, $size, $tipo, $carpeta){
			$type = substr(strrchr($nombre, "."),1);
			if($size > 1081469 || $size == 0){
				return "101";
			}else{
				if($type == 'swf' || $type == 'jpg' || $type == 'png'){
					$this->subirImagenCarpeta($ftmp, $nombre, $carpeta);
				}else{ return "102"; }
			}
		}

		public function fecha_entrada($cad){
			$uno=substr($cad, 0, 2);
			$dos=substr($cad, 3, 2);
			$tres=substr($cad, 6, 4);
			$cad = ($tres."/".$dos."/".$uno);
			return $cad;
		}

		public function fecha_salida($cad){
			$tres=substr($cad, 0, 4);
			$dos=substr($cad, 5, 2);
			$uno=substr($cad, 8, 2);
			$cad = ($uno."-".$dos."-".$tres);
			return $cad;
		}

		public function encode_json($array){
			$array_claves = array_keys($array);
			$filas = count($array, COUNT_RECURSIVE);
			$filas_array = count($array);
			if($filas == 0 or $filas == "")
				return false;
			else{
				if($filas>$filas_array){
					$coma = "";
					for($j=0; $j<$filas_array; $j++){
						$array_claves = array_keys($array[$j]);
						$filas = count($array[$j]);
						$array_array = $array[$j];
						$vector = $vector . $coma . $this->recuperar_array($array_claves,$filas,$array_array);
						$coma=", ";
					}
					$vector = '['.$vector.']';
					return $vector;
				}
				else
				{
				$vector = $this->recuperar_array($array_claves,$filas,$array);
				}			
			}
		}

		public function recuperar_array($array_claves,$filas,$array){
			for($i=0; $i<$filas; $i++){
				$coma=", ";
				if(($i+1)==$filas)
				$coma="";
				$vector= $vector . '"' . $array_claves[$i] . '":"' . eregi_replace("[\n|\r|\n\r]", ' ', utf8_encode($array[$array_claves[$i]])). '"' . $coma;
			}
			$vector="{".$vector."}";
			return $vector;
		}
		
		public function setNotificacion($var="", $type=0){
			switch($type){
				case 1:
					$this->_notificacion = '<div class="error">'.$var.'</div>';
				break;
				case 2:
					$this->_notificacion = '<div class="success">'.$var.'</div>';
				break;
				case 3:
					$this->_notificacion = '<div class="info">'.$var.'</div>';
				break;
				default:
					$this->_notificacion = '';
				break;
				
			}
		}
	
		public function printNotificacion(){			
			return $this->_notificacion;
		}
		
		public function getNotification(){
			return $this->_notificacion;
		}

		public function getExt($nombre_archivo){
			return substr(strrchr($nombre_archivo, "."),1);
		}

		public function filtro_tags($texto){
			$tags_permitidos = array('b' => array('style' => 1),
			   'span' => array('style' => 1),               
			   'i' => array('style' => 1),
			   'a' => array('style' => 1, 'href' => 1, 'title' => 1),
			   'p' => array('style' => 1, 'align' => 1),
			   'br' => array(),
			   'blockquote' => array('style' => 1),
			   'li' => array('style' => 1),
			   'ul' => array('style' => 1),
			   'ol' => array('style' => 1),
			   'u' => array('style' => 1),
			   'table' => array('cellpadding' => 1, 'cellspacing' => 1, 'border' => 1, 'style' => 1),
			   'tr' => array('style' => 1),
			   'td' => array('valign' => 1, 'align' => 1, 'rowspan' => 1, 'colspan' => 1, 'style' => 1)
			);
			$texto_filtrado = kses($texto,$tags_permitidos); 
			return $texto_filtrado;
		}


		public function procesar_url_2($string) {
			
			$string = utf8_decode($string);
			$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
			$repl = array('a', 'e', 'i', 'o', 'u', 'n');
			$string = str_replace ($find, $repl, $string);
			
			$NOT_acceptable_caracteres_regex = '#[^-a-zA-Z0-9_ ]#';
			$string = preg_replace($NOT_acceptable_caracteres_regex, '', $string);
			$string = trim($string);
			$string = preg_replace('#[-_ ]+#', '-', $string);
			return strtolower($string);
		}

		public function imprimir_flash_independiente($archivo, $ancho, $alto){
			$ext = $this->getExt($archivo);
			if($ext == 'swf'){
				return "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0' width='".$ancho."' height='".$alto."'>
						<param name='movie' value='".BS_."aplication/webroot/flash/".$archivo."' />
						<param name='quality' value='high' />
						<param name='wmode' VALUE='transparent' />
						<param name='quality' value='low'>
						<embed src='".BS_."aplication/webroot/flash/".$archivo."' quality='low' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='".$ancho."' height='".$alto."' wmode='transparent' align='top'></embed>
					</object>";
			}else if($ext == 'jpg'){
				return "<img src='".BS_."aplication/webroot/flash/".$archivo."' width='".$ancho."' height='".$alto."'>";
			}
		}

		public function convertir_hora_set($hora){
			$h = substr($hora,0,2);
			$m = substr($hora,3,2);
			$ampm = substr($hora,6,2);
			if($ampm == 'pm' && $h != '12'){ $h = $h + 12; }
			if($ampm == 'am' && $h == '12'){ $h = '00'; }
			$hora = $h.":".$m.":"."00";
			return $hora;
		}

		public function getIP(){
			if($_SERVER['HTTP_X_FORWARDED_FOR'] != ''){
      			$client_ip =
         			( !empty($_SERVER['REMOTE_ADDR']) ) ?
            		$_SERVER['REMOTE_ADDR']
            		:
            		( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               		$_ENV['REMOTE_ADDR']
               		:
               		"unknown" );
      			$entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
				reset($entries);
				while (list(, $entry) = each($entries)){
					$entry = trim($entry);
					if ( preg_match("/^([0-9]+\\.[0-9]+\\.[0-9]+\\.[0-9]+)/", $entry, $ip_list) ){
						$private_ip = array(
							'/^0\\./',
							'/^127\\.0\\.0\\.1/',
							'/^192\\.168\\..*/',
							'/^172\\.((1[6-9])|(2[0-9])|(3[0-1]))\\..*/',
							'/^10\\..*/');
						$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
						if ($client_ip != $found_ip){
							$client_ip = $found_ip;
							break;
						}
					}
				}
			}else{
				$client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR']:( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR']:"unknown" );
			}
			return $client_ip;
		}

		public function obtenerIdSeccion($nom){
			$sql = "SELECT * FROM secciones WHERE url = '".$nom."'";
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id'		=> $row['id_seccion'],
					'nombre'	=> $row['nombre'],
					'url'		=> $row['url'],
					'orden'		=> $row['orden']
				);
			}
			return $result;	
		}

		public function obtenerNombreMes($id){
			switch($id){
				case '1': $nommes = 'Enero'; break;
				case '2': $nommes = 'Febrero'; break;
				case '3': $nommes = 'Marzo'; break;
				case '4': $nommes = 'Abril'; break;
				case '5': $nommes = 'Mayo'; break;
				case '6': $nommes = 'Junio'; break;
				case '7': $nommes = 'Julio'; break;
				case '8': $nommes = 'Agosto'; break;
				case '9': $nommes = 'Setiembre'; break;
				case '10': $nommes = 'Octubre'; break;
				case '11': $nommes = 'Noviembre'; break;
				case '12': $nommes = 'Diciembre'; break;
			}
			return $nommes;
		}

	}
?>