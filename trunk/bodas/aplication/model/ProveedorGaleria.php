<?php
	class ProveedorGaleria{

		private $id_proveedor_imagen;
		private $imagen_proveedor_imagen;
		private $estado_proveedor_imagen;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){
				$sql = "SELECT * FROM proveedores_imagenes WHERE id_proveedor_imagen = ".$id;
				$query = new Consulta($sql);
				if($query->NumeroRegistros() > 0){
					$row = $query->VerRegistro();
					$this->fecha		 	= $row['fecha'];
					$this->nombre			= $row['nombre'];
					$this->descripcion 		= $row['descripcion'];
				}
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function getGalerias(){
			$sql = "SELECT * FROM galerias ORDER BY id_galeria DESC";
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){

				$aryFotoPortada = $this->getFotos($row['id_galeria']);

				$result[] = array(
					'id_galeria'			=> $row['id_galeria'],
					'id_evento_relacionado'	=> $row['id_evento_relacionado'],
					'fecha'					=> $row['fecha'],
					'nombre'				=> $row['nombre'],
					'descripcion'			=> $row['descripcion'],
					'foto_portada'			=> $aryFotoPortada[0]['foto']
				);
			}
			return $result;
		}

		public function getFotos($id){
			$sql = "SELECT * FROM fotos WHERE id_galeria =".$id." ORDER BY id_foto DESC";
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id'			=> $row['id_foto'],
					'id_galeria'	=> $row['id_galeria'],
					'foto'			=> $row['foto']
				);
			}
			return $result;
		}


	}
?>