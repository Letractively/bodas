<?php 

abstract class dwMain{
	
	var $notificacion = "";		
	function Main(){
		
	}
	
	function setNotificacion($var="", $type=0){
		switch($type){
			case 1:
				$this->notificacion = '<div class="error">'.$var.'</div>';
			break;
			case 2:
				$this->notificacion = '<div class="success">'.$var.'</div>';
			break;
			default:
				$this->notificacion = '';
			break;
			
		}
	}
	
 	function printNotificacion(){			
		return $this->notificacion;
	}
	
	function getNotification(){
		return $this->notificacion;
	}
	
}
?>