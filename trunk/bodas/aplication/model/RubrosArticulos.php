<?php
	class RubrosArticulos{

		private $id;
		private $id_rubro;
		private $id_articulo;		

		public function __construct($id = 0){
			$this->id = $id;

			if($this->id_proveedor_tipo > 0){
				$sql = "SELECT * FROM rubros_articulos WHERE id_rubro_noticia= ".$this->id;
				$qry = new Consulta($sql);

				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_rubro 	= $rw['id_rubro'];
					$this->id_articulo 	= $rw['id_articulo'];
				}
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function obtenerRubrosArticulos(){
			$sql = "SELECT * FROM rubros_articulos ORDER BY id_rubro_noticia DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_rubro'		=> $rw['id_rubro'],
					'id_articulo'	=> $rw['id_articulo']
				);
			}
			return $rst;			
		}

		public function obtenerArticulosXRubro($id){
			$sql = "SELECT * FROM rubros_articulos WHERE id_rubro = ".$id." ORDER BY id_rubro_noticia DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_rubro'		=> $rw['id_rubro'],
					'id_articulo'	=> $rw['id_articulo']
				);
			}
			return $rst;			
		}

	}
?>