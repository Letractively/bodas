<?php
	class ProveedorPublicacionComentario{


		private $id_proveedor_publicacion_comentario;
		private $id_proveedor_publicacion;
		private $comentario;
		private $fecha;
		private $estado_proveedor_publicacion;


		public function __construct($id = 0){
			$this->id_proveedor_publicacion_comentario = $id;
			if($this->id_proveedor_publicacion_comentario > 0){
				$sql = "SELECT * FROM proveedores_publicaciones_comentarios WHERE id_proveedor_publicacion_comentario = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_proveedor_publicacion	= $rw['id_proveedor_publicacion'];
					$this->comentario				= $rw['comentario'];
					$this->fecha 					= $rw['fecha'];
					$this->estado 					= $rw['estado'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerPublicacionesXPublicacion($id){
			$sql = "SELECT * FROM proveedores_publicaciones_comentarios WHERE id_proveedor_publicacion = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'comentario'	=> $rw['comentario'],
					'fecha'			=> $rw['fecha'],
					'estado'		=> $rw['estado']
				);
			}
			return $rst;			
		}


	}
?>