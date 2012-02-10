<?php
	class ArticuloPortada{


		private $id;
		private $nombre;
		private $id_articulo;
		private $id_articulo_tipo;			


		public function __construct($id = 0){
			$this->id = $id;

			if($this->id > 0){
				$sql = "SELECT * 
					FROM portadas_articulos pa LEFT JOIN
						articulos a ON pa.id_articulo = a.id_articulo
					WHERE id_portada_articulo = ".$this->id."";
				$qry = new Consulta($sql);

				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->nombre 				= $rw['nombre'];
					$this->id_articulo 			= $rw['id_articulo'];
					$this->id_articulo_tipo 	= $rw['id_articulo_tipo'];
				}
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtener_portadas(){
			$sql = "
			SELECT * 
			FROM portadas_articulos 
			ORDER BY id_portada_articulo ASC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				
				$objArticulo = new Articulo($rw['id_articulo']);
				
				$objArticuloGaleria = new ArticuloGaleria;
				$aryImagen = $objArticuloGaleria->getGaleriaXArticulo($rw['id_articulo']);
				
				$rst[] = array(
					'nombre'		=> $rw['nombre'],
					'id'	=> $rw['id_articulo'],
					'id_articulo'	=> $rw['id_articulo'],
					'titulo'		=> $objArticulo->titulo,
					'imagen'		=> $aryImagen[0]['imagen'],
					'descripcion1'	=> $objArticulo->descripcion1,
					'fecha'			=> $objArticulo->fecha
				);
			}
			return $rst;			
		}


	}
?>