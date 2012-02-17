<?php
	class Popup{

		private $id_popup;
		private $imagen;
		private $link;
		private $estado;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){

				$sql = "SELECT 
						p.id_popup,
						p.imagen,
						p.link,
						p.estado
					FROM popup p
					WHERE p.id_popup = ".$id;

				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_popup 	= $rw['id_popup'];
					$this->imagen		= $rw['imagen'];
					$this->link			= $rw['link'];
					$this->estado		= $rw['estado'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

	}
?>