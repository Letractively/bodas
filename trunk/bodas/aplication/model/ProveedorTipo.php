<?php
	class ProveedorTipo{

		private $id_proveedor_tipo;
		private $nombre_proveedor_tipo;

		public function __construct($id = 0){
			$this->id_proveedor_tipo = $id;

			if($this->id_proveedor_tipo > 0){
				$sql = "SELECT * FROM proveedores_tipos WHERE id_proveedor_tipo = ".$this->id_proveedor_tipo;
				$qry = new Consulta($sql);

				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->nombre_proveedor_tipo = $rw['nombre_proveedor_tipo'];
				}
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function obtenerProveedoresTipos(){
			$sql = "SELECT * FROM proveedores_tipos ORDER BY id_proveedor_tipo ASC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor_tipo'			=> $rw['id_proveedor_tipo'],
					'nombre_proveedor_tipo'		=> $rw['nombre_proveedor_tipo']
				);
			}
			return $rst;			
		}

	}
?>