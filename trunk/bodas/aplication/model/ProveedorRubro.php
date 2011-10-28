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

	}
?>