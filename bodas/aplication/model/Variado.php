<?php
	class Variado{


		private $id;
		private $titulo;
		private $descripcion;
		private $imagen;
		private $link;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){

				$sql = "SELECT 
						v.id_variado,
						v.titulo,
						v.descripcion,
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