<?php
	class ProveedorPublicacion{


		private $id_proveedor_publicacion;
		private $id_proveedor;
		private $texto_proveedor_publicacion;
		private $fecha_proveedor_publicacion;
		private $estado_proveedor_publicacion;


		public function __construct($id = 0){
			$this->id_proveedor_publicacion = $id;
			if($this->id_proveedor_publicacion > 0){
				$sql = "SELECT * FROM proveedores_publicaciones WHERE id_proveedor_publicacion = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_proveedor	= $rw['id_proveedor'];
					$this->texto_proveedor_publicacion	= $rw['texto_proveedor_publicacion'];
					$this->fecha_proveedor_publicacion 	= $rw['fecha_proveedor_publicacion'];
					$this->estado_proveedor_publicacion = $rw['estado_proveedor_publicacion'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerPublicacionesXProveedor($id){
			$sql = "SELECT * FROM proveedores WHERE id_proveedor = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'texto_proveedor_publicacion'	=> $rw['texto_proveedor_publicacion'],
					'fecha_proveedor_publicacion'	=> $rw['fecha_proveedor_publicacion'],
					'estado_proveedor_publicacion'	=> $rw['estado_proveedor_publicacion']
				);
			}
			return $rst;			
		}


	}
?>