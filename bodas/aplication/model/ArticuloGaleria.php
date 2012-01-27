<?php
	class ArticuloGaleria{

		private $id_articulo_imagen;
		private $id_articulo;
		private $imagen;
		private $fecha;
		private $estado;

		public function __construct($id = 0){
			$this->id_proveedor_imagen = $id;
			if($this->id_proveedor_imagen > 0){
				$sql = "SELECT * FROM articulos_imagenes WHERE id_articulo_imagen = ".$id;
				$query = new Consulta($sql);
				if($query->NumeroRegistros() > 0){
					$row = $query->VerRegistro();
					$this->id_articulo_imagen	= $row['id_articulo_imagen'];
					$this->id_articulo			= $row['id_articulo'];
					$this->imagen				= $row['imagen'];
					$this->fecha 				= $row['fecha'];
					$this->estado				= $row['estado'];
				}
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function getGaleriaXArticulo($id){
			$sql = "SELECT * FROM articulos_imagenes 
					WHERE id_articulo = ".$id."
					ORDER BY id_articulo_imagen DESC";
	
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id_articulo_imagen'	=> $row['id_articulo_imagen'],
					'id_articulo'			=> $row['id_articulo'],
					'imagen'				=> $row['imagen'],
					'fecha'					=> $row['fecha'],
					'estado'				=> $row['estado']
				);
			}
			return $result;
		}

		public function agregarFotos($img, $id_proveedor){
			$sql = "INSERT INTO articulos_imagenes VALUES('',
				'".$id_proveedor."',
				'".$img."',
				'".date('Y-m-d h:i:s')."',
				'1'
			)";
			$Query = new Consulta($sql);
			$id = mysql_insert_id();
			$respuesta['data'] = $this->obtenerFotoJson($id);
			$respuesta['error'] = 'ok';
			header('Content-type: text/plain');
			return json_encode($respuesta);
		}

		public function obtenerFotoJson($id){
			$sql = "SELECT * FROM articulos_imagenes WHERE id_articulo_imagen = ".$id;
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id_articulo_imagen'				=> $row['id_articulo_imagen'],
					'id_articulo'						=> $row['id_articulo'],
					'imagen'							=> $row['imagen'],
					'fecha'								=> $row['fecha'],
					'estado'							=> $row['estado']
				);
			}
			return $result;
		}

		public function eliminar($id){
			$Query = new Consulta( "DELETE FROM articulos_imagenes WHERE id_articulo_imagen = ".$id."");
			echo "<div id=error>Se elimino el registro correctamente.</div>";
		}

	}
?>