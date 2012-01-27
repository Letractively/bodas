<?php
	class ProveedorRecomendado{


		private $id_proveedor_recomendado;
		private $id_proveedor;
		private $imagen_proveedor_recomendado;
		private $link_proveedor_recomendado;
		private $estado_proveedor_recomendado;


		public function __construct($id = 0){
			$this->id_proveedor_recomendado = $id;
			if($this->id_proveedor_recomendado > 0){
				$sql = "SELECT * FROM proveedores_recomendados WHERE id_proveedor_recomendado = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_proveedor	= $rw['id_proveedor'];
					$this->imagen_proveedor_recomendado	= $rw['imagen_proveedor_recomendado'];
					$this->link_proveedor_recomendado 	= $rw['link_proveedor_recomendado'];
					$this->estado_proveedor_recomendado = $rw['estado_proveedor_recomendado'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerProveedoresRecomendadosXProveedor($id){
			$sql = "SELECT * FROM proveedores_recomendados WHERE id_proveedor = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor_recomendado'		=> $rw['id_proveedor_recomendado'],
					'imagen_proveedor_recomendado'	=> $rw['imagen_proveedor_recomendado'],
					'link_proveedor_recomendado'	=> $rw['link_proveedor_recomendado'],
					'estado_proveedor_recomendado'	=> $rw['estado_proveedor_recomendado']
				);
			}
			return $rst;			
		}

		public function eliminar($id){
			if($id > 0){
				$Query = new Consulta("DELETE FROM proveedores_recomendados WHERE id_proveedor_recomendado = ".$id."");
			}
		}

	}
?>