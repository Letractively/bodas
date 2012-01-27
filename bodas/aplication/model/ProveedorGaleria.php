<?php
	class ProveedorGaleria{

		private $id_proveedor_imagen;
		private $id_proveedor;
		private $imagen_proveedor_imagen;
		private $fecha_registro_proveedor_imagen;
		private $estado_proveedor_imagen;

		public function __construct($id = 0){
			$this->id_proveedor_imagen = $id;
			if($this->id_proveedor_imagen > 0){
				$sql = "SELECT * FROM proveedores_imagenes WHERE id_proveedor_imagen = ".$id;
				$query = new Consulta($sql);
				if($query->NumeroRegistros() > 0){
					$row = $query->VerRegistro();
					$this->imagen_proveedor_imagen			= $row['imagen_proveedor_imagen'];
					$this->id_proveedor						= $row['id_proveedor'];
					$this->imagen_proveedor_imagen			= $row['imagen_proveedor_imagen'];
					$this->fecha_registro_proveedor_imagen 	= $row['fecha_registro_proveedor_imagen'];
					$this->estado_proveedor_imagen 			= $row['estado_proveedor_imagen'];
				}
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function getGaleriaXProveedor($id){
			$sql = "SELECT * FROM proveedores_imagenes 
					WHERE id_proveedor = ".$id."
					ORDER BY id_proveedor_imagen DESC";
	
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id_proveedor_imagen'				=> $row['id_proveedor_imagen'],
					'id_proveedor'						=> $row['id_proveedor'],
					'imagen_proveedor_imagen'			=> $row['imagen_proveedor_imagen'],
					'fecha_registro_proveedor_imagen'	=> $row['fecha_registro_proveedor_imagen'],
					'estado_proveedor_imagen'			=> $row['estado_proveedor_imagen']
				);
			}
			return $result;
		}

		public function agregarFotos($img, $id_proveedor){
			$sql = "INSERT INTO proveedores_imagenes VALUES('',
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
			$sql = "SELECT * FROM proveedores_imagenes WHERE id_proveedor_imagen = ".$id;
			$query = new Consulta($sql);
			while( $row = $query->VerRegistro() ){
				$result[] = array(
					'id_proveedor_imagen'				=> $row['id_proveedor_imagen'],
					'id_proveedor'						=> $row['id_proveedor'],
					'imagen_proveedor_imagen'			=> $row['imagen_proveedor_imagen'],
					'fecha_registro_proveedor_imagen'	=> $row['fecha_registro_proveedor_imagen'],
					'estado_proveedor_imagen'			=> $row['estado_proveedor_imagen']
				);
			}
			return $result;
		}

		public function eliminar($id){
			$Query = new Consulta( "DELETE FROM proveedores_imagenes WHERE id_proveedor_imagen = ".$id."");
			echo "<div id=error>Se elimino el registro correctamente.</div>";
		}

	}
?>