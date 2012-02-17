<?php
	class Variado{


		private $id;
		private $titulo;
		private $descripcion;
		private $descripcion_larga;
		private $imagen;
		private $link;


		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){

				$sql = "SELECT 
						v.id_variado,
						v.titulo,
						v.descripcion,
						v.descripcion_larga,
						v.imagen,
						v.link
					FROM variados v
					WHERE v.id_variado =".$id;

				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id 			= $rw['id_variado'];
					$this->titulo		= $rw['titulo'];
					$this->descripcion	= $rw['descripcion'];
					$this->descripcion_larga	= $rw['descripcion_larga'];
					$this->imagen		= $rw['imagen'];
					$this->link			= $rw['link'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}

	}
?>