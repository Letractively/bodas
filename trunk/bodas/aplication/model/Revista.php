<?php
	class Revista{


		private $id;
		private $codigo;
		private $titulo;
		private $imagen;
		private $descripcion;
		private $estado;


		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){

				$sql = "SELECT 
						r.id_revista,
						r.link,
						r.titulo,
						r.imagen,
						r.descripcion,
						r.estado
					FROM revistas r
					WHERE r.id_revista =".$id."";

				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id		 			= $rw['id_revista'];
					$this->codigo				= $rw['link'];					
					$this->titulo				= $rw['titulo'];
					$this->imagen				= $rw['imagen'];
					$this->descripcion			= $rw['descripcion'];
					$this->estado				= $rw['estado'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function getRevistas(){
			$sql = "SELECT * FROM revistas WHERE estado = 1 ORDER BY id_revista DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id'					=> $rw['id_revista'],
					'codigo'				=> $rw['link'],
					'titulo'				=> $rw['titulo'],
					'imagen'				=> $rw['imagen'],
					'descripcion'			=> $rw['descripcion'],
					'estado'				=> $rw['estado']
				);
			}
			return $rst;
		}


	}
?>