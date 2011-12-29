<?php
	class Utiles{

		public function sub_menu(){
			if(isset($_GET['sub'])){
				return $_GET['sub'];
			}else{
				return 1;
			}
		}

		public function procesar_url($url) {
			$url = utf8_decode($url);
			$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
			$repl = array('a', 'e', 'i', 'o', 'u', 'n');
			$url = str_replace ($find, $repl, $url);
			$find = array(' ', '&', '\r\n', '\n', '+'); 
			$url = str_replace ($find, '-', $url);
			$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
			$repl = array('', '-', '');
			$url = preg_replace ($find, $repl, $url);
			return $url;
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

		public function fecha_actual(){
			$week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
			$months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$year_now = date ("Y");
			$month_now = date ("n");
			$day_now = date ("j");
			$week_day_now = date ("w");
			$date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;
			return $date; 
		}

		public function formatear_fecha($fecha){
			$week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
			$months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$year_now = substr($fecha,0,4);
			
			if(substr($fecha,5,2) != 10 ){
				$month_now = str_replace('0','',substr($fecha,5,2));
			}else{
				$month_now = substr($fecha,5,2);
			}

			$day_now = substr($fecha,8,2);
			
			$fechats = strtotime($fecha);
			$week_day_now = date ("w",$fechats);

			$date = $week_days[$week_day_now] . ", " . $day_now . " de ". $months[$month_now] . " de " . $year_now;
			return $date; 
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

		public function getExt($nombre_archivo){
			return substr(strrchr($nombre_archivo, "."),1);
		}

		public function media_noche($hora){
			if($hora == '12:00 am'){
				$hora = '0:00';
			}
			return $hora;
		}

		public function agregar_http($str){
			if(eregi('http://',$str)){
				$str = $str;
			}else{
				$str = 'http://'.$str;
			}
			return $str;
		}

		public function quitar_http($str){
			$str = str_replace("http://","",$str);
			return $str;
		}

		public function getPrimerDiaSem($date){
			$getdate = getdate($date);
			$seconds = $getdate['wday']*24*60*60;
			$sunday = date($getdate[0])-$seconds;
			return $sunday;
		}

		public function updateCampo($table, $value, $id){
			$sql = "UPDATE ".$table." SET ".$value." WHERE ".$id;
			$sq = new Consulta($sql);
			return $sql;
		}


	}
?>