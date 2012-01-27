<?php
	class RedSocial{

		private $id_red_social;
		private $nombre_red_social;
		private $imagen_red_social;
		private $estado_red_social;

		public function __construct($id = 0){
			$this->id_red_social = $id;
			if($this->id_red_social > 0){
				$sql = "SELECT * FROM redes_sociales WHERE id_red_social = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->nombre_red_social = $rw['nombre_red_social'];
					$this->imagen_red_social = $rw['imagen_red_social'];
					$this->estado_red_social = $rw['estado_red_social'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function obtenerRedesSociales(){
			$sql = "SELECT * FROM redes_sociales";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_red_social'	=> $rw['id_red_social'],
					'nombre_red_social'	=> $rw['nombre_red_social'],
					'imagen_red_social' => $rw['imagen_red_social'],
					'estado_red_social'	=> $rw['estado_red_social']					
				);
			}
			return $rst;			
		}

	}
?>