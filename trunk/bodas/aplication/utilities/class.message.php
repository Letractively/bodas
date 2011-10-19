<?php 

class Message{
	
	public $msg;
/*
	public static function Message(){
		
	}*/
	
	public static function Error($msg){
	 	return $tipo.': '.$msg;
	}
	
	public static function Warning($msg){
		return $tipo.': '.$msg;
	}
	
	public static function Notificacion($msg){
		return $tipo.': '.$msg;
	}
	
	public static function Confirmacion($msg){
		return $tipo.': '.$msg;
	}
	
}
?>