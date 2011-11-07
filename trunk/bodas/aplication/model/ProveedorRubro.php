<?php
	class ProveedorRubro{

		private $id_proveedor_rubro;
		private $nombre_proveedor_rubro;

		public function __construct($id = 0){
			$this->id_proveedor_rubro = $id;
			if($this->id_proveedor_rubro > 0){
				$sql = "SELECT * FROM proveedores_rubros WHERE id_proveedor_rubro = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->nombre_proveedor_rubro = $rw['nombre_proveedor_rubro'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function obtenerProveedores(){
			$sql = "SELECT * FROM proveedores_rubros ORDER BY nombre_proveedor_rubro ASC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor_rubro'		=> $rw['id_proveedor_rubro'],
					'nombre_proveedor_rubro'	=> $rw['nombre_proveedor_rubro']
				);
			}
			return $rst;			
		}

	}
?>