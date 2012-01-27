<?php

class Moneda{
	
	var $id;
	var $nombre; 
	var $codigo;
	var $sLeft;
	var $sRight;
	var $valor;
	var $actualizado;
	
	function Moneda($id){
		$this->id = $id;	
		$sql    = "SELECT * FROM monedas WHERE id_moneda = '".$this->id."' ";
		$query  = new Consulta($sql);
		$row    = $query->VerRegistro();
		$this->nombre 	= $row['nombre_moneda']; 
	 	$this->codigo 	= $row['codigo_moneda']; 
		$this->sLeft  	= $row['simbolo_izquierdo_moneda']; 
		$this->sRight 	= $row['simbolo_derecho_moneda']; 
		$this->valor  	= $row['valor_moneda']; 
		$this->actualizado = $row['ultima_actualizacion_moneda']; 						
	}
	
	function conversor($monto){			
		$retorno = round($monto * $this->valor,2);
		return $retorno;							
	}
	function getCodigo(){
		return  $this->codigo;
	}
	function setId($id){
		$this->id = $id;	
		$sql    = "SELECT * FROM monedas WHERE id_moneda = '".$this->id."' ";
		$query  = new Consulta($sql);
		$row    = $query->VerRegistro();
		$this->nombre = $row['nombre_moneda']; 
	 	$this->codigo = $row['codigo_moneda']; 
		$this->sLeft  = $row['simbolo_izquierdo_moneda']; 
		$this->sRight = $row['simbolo_derecho_moneda']; 
		$this->valor  = $row['valor_moneda']; 
		$this->actualizado = $row['ultima_actualizacion_moneda']; 	
	
	}	
	function getId(){
		return $this->id;
	}
	function getSLeft(){
		return $this->sLeft;
	}
	
	function getSRight(){
		return $this->sRight;
	}
	
	function getMonedas($id = 0){
		$where = "";
		if($id > 0){ $where = " WHERE id_moneda = '".$id."' "; }	
		
		$sql    = "SELECT * FROM monedas ".$where;
		$query  = new Consulta($sql);
		$retorno;
		while($row  = $query->VerRegistro()){
			$retorno[] = array(
			'id' 			=> $row['id_moneda'],
			'nombre' 		=> $row['nombre_moneda'],
	 		'codigo' 		=> $row['codigo_moneda'],
			'sLeft'  		=> $row['simbolo_izquierdo_moneda'],
			'sRight' 		=> $row['simbolo_derecho_moneda'], 
			'valor'  		=> $row['valor_moneda'], 
			'actualizado' 	=> $row['ultima_actualizacion_moneda'] 
			);
		}
		return $retorno;
								
	}
	
}

?>