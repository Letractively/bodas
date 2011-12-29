<?php
	class ArticuloTipo{

		private $id;
		private $nombre;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){
				$sql = "SELECT * FROM articulos_tipos WHERE id_articulo_tipo = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->nombre	= $rw['nombre'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function getColeccionTipo(){
			$sql = "SELECT * FROM articulos_tipos ORDER BY id_articulo_tipo DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id'	=> $rw['id_articulo_tipo'],
					'nombre'	=> $rw['nombre']
				);
			}
			return $rst;
		}

	}
?>