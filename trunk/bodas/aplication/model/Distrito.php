<?php
	class Distrito{

		private $id_distrito;
		private $nombre_distrito;

		public function __construct($id = 0){
			$this->id_distrito = $id;

			if($this->id_distrito > 0){
				$sql = "SELECT * FROM distritos WHERE id_distrito = ".$this->id_distrito;
				$qry = new Consulta($sql);

				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->nombre_distrito = $rw['nombre_distrito'];
				}
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function obtenerDistritos(){
			$sql = "SELECT * FROM distritos ORDER BY id_distrito ASC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_distrito'			=> $rw['id_distrito'],
					'nombre_distrito'		=> $rw['nombre_distrito']
				);
			}
			return $rst;			
		}

	}
?>