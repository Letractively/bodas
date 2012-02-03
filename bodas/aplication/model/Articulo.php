<?php
	class Articulo{


		private $id;
		private $id_articulo_tipo;
		private $titulo;
		private $descripcion1;
		private $descripcion2;
		private $fecha;
		private $estado;
		private $imagen;
		private $estado_comentarios;
		private $estado_fecha;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){

				$sql = "SELECT 
						a.id_articulo,
						a.id_articulo_tipo,
						a.titulo,
						a.descripcion1,
						a.descripcion2,
						a.fecha,
						a.estado,
						ai.imagen,
						a.estado_comentarios,
						a.estado_fecha
					FROM articulos a
					LEFT JOIN articulos_imagenes ai ON a.id_articulo = ai.id_articulo
					WHERE a.id_articulo =".$id." 
					GROUP BY a.id_articulo
					ORDER BY a.id_articulo DESC";

				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_articulo_tipo 	= $rw['id_articulo_tipo'];
					$this->titulo				= $rw['titulo'];
					$this->descripcion1			= $rw['descripcion1'];
					$this->descripcion2			= $rw['descripcion2'];
					$this->fecha				= $rw['fecha'];
					$this->estado				= $rw['estado'];
					$this->imagen				= $rw['imagen'];
					$this->estado_comentarios	= $rw['estado_comentarios'];
					$this->estado_fecha			= $rw['estado_fecha'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function getArticulos(){
			$sql = "SELECT * FROM articulos ORDER BY id_articulo_tipo DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id'					=> $rw['id_articulo'],
					'id_articulo_tipo'		=> $rw['id_articulo_tipo'],
					'titulo'				=> $rw['titulo'],
					'descripcion1'			=> $rw['descripcion1'],
					'descripcion2'			=> $rw['descripcion2'],
					'fecha'					=> $rw['fecha'],
					'estado'				=> $rw['estado'],
					'estado_comentarios'	=> $rw['estado_comentarios'],
					'estado_fecha'			=> $rw['estado_fecha']
				);
			}
			return $rst;
		}

		public function getArticuloXTipo($id){
			$sql = "SELECT 
					a.id_articulo,
					a.id_articulo_tipo,
					a.titulo,
					a.descripcion1,
					a.descripcion2,
					a.fecha,
					a.estado,
					a.estado_comentarios,
					a.estado_fecha
				FROM articulos a
				WHERE a.id_articulo_tipo =".$id." 
				AND a.estado = 1
				ORDER BY a.id_articulo DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){

				$objArticulo = new Articulo($rw['id_articulo']);

				$objArticuloGaleria = new ArticuloGaleria;
				$aryImagen = $objArticuloGaleria->getGaleriaXArticulo($rw['id_articulo']);

				$rst[] = array(
					'id'					=> $rw['id_articulo'],
					'id_articulo_tipo'		=> $rw['id_articulo_tipo'],
					'titulo'				=> $rw['titulo'],
					'descripcion1'			=> $rw['descripcion1'],
					'descripcion2'			=> $rw['descripcion2'],
					'fecha'					=> $rw['fecha'],
					'estado'				=> $rw['estado'],
					'imagen'				=> $aryImagen[0]['imagen'],
					'estado_comentarios'	=> $rw['estado_comentarios'],
					'estado_fecha'			=> $rw['estado_fecha']
				);
			}
			return $rst;
		}

		public function getArticuloXTipoJSON($id){
			$sql = "SELECT * FROM articulos WHERE id_articulo_tipo =".$id." ORDER BY id_articulo DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id'					=> $rw['id_articulo'],
					'id_articulo_tipo'		=> $rw['id_articulo_tipo'],
					'titulo'				=> $rw['titulo'],
					'descripcion1'			=> $rw['descripcion1'],
					'descripcion2'			=> $rw['descripcion2'],
					'fecha'					=> $rw['fecha'],
					'estado'				=> $rw['estado'],
					'estado_comentarios'	=> $rw['estado_comentarios'],
					'estado_fecha'			=> $rw['estado_fecha']
				);
			}

			$respuesta['data'] = $rst;
			$respuesta['error'] = 'ok';

			header('Content-type: text/plain');
			return json_encode($respuesta);
		}

	}
?>