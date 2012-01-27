<?php
	class Noticia{

		private $id;
		private $fecha;
		private $titulo;
		private $descripcion_1;
		private $descripcion_2;
		private $imagen_1;
		private $imagen_2;
		private $estado_comentarios;
		private $estado_noticia;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){
				$sql = "SELECT * FROM noticias WHERE id_noticia = ".$id;
				$query = new Consulta($sql);
				if($query->NumeroRegistros() > 0){
					$row = $query->VerRegistro();
					$this->fecha 			= $row['fecha'];
					$this->titulo 			= $row['titulo'];
					$this->descripcion_1 	= $row['descripcion_1'];
					$this->descripcion_2	= $row['descripcion_2'];
					$this->imagen_1 		= $row['imagen_1'];
					$this->imagen_2 		= $row['imagen_2'];
					$this->estado_comentarios  	= $row['estado_comentarios'];
					$this->estado_noticia  	= $row['estado_noticia']; 
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function getNoticias(){
			$sql = "SELECT * FROM noticias ORDER BY id_noticia DESC";
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id'					=> $row['id_noticia'],
					'fecha'					=> $row['fecha'],
					'titulo' 				=> $row['titulo'],
					'descripcion_1'			=> $row['descripcion_1'],
					'descripcion_2'			=> $row['descripcion_2'],
					'imagen_1'				=> $row['imagen_1'],
					'imagen_2' 				=> $row['imagen_2'],
					'estado_comentarios'	=> $row['estado_comentarios'],
					'estado_noticia' 		=> $row['estado_noticia']
				);
			}
			return $result;		
		}

		public function getNoticiasLimit($ini, $num_reg){
			$sql = "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT ".$ini.",".$num_reg."";
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id'			=> $row['id_noticia'],
					'fecha'			=> $row['fecha'],
					'titulo' 		=> $row['titulo'],
					'descripcion_1' => $row['descripcion_1'],
					'descripcion_2'	=> $row['descripcion_2'],
					'imagen_1'		=> $row['imagen_1'],
					'imagen_2' 		=> $row['imagen_2'],
					'estado_comentarios'	=> $row['estado_comentarios'],
					'estado_noticia' 		=> $row['estado_noticia']
				);
			}
			return $result;		
		}

	}
?>