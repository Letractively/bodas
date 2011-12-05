<?php
	class ProveedorPublicacionComentario extends Utilitarios{


		private $id_proveedor_publicacion_comentario;
		private $id_proveedor_publicacion;
		private $id_usuario_cliente;
		private $comentario;
		private $fecha;
		private $estado_proveedor_publicacion;


		public function __construct($id = 0){
			$this->id_proveedor_publicacion_comentario = $id;
			if($this->id_proveedor_publicacion_comentario > 0){
				$sql = "SELECT * FROM proveedores_publicaciones_comentarios WHERE id_proveedor_publicacion_comentario = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_proveedor_publicacion	= $rw['id_proveedor_publicacion'];
					$this->id_usuario_cliente		= $rw['id_usuario_cliente'];
					$this->comentario				= $rw['comentario'];
					$this->fecha 					= $rw['fecha'];
					$this->estado 					= $rw['estado'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerComentariosXPublicacion($id){
			$sql = "SELECT * 
				FROM proveedores_publicaciones_comentarios ppc
					JOIN usuarios_clientes uc ON ppc.id_usuario_cliente = uc.id_usuario_cliente
				WHERE id_proveedor_publicacion = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor_publicacion_comentario' => $rw['id_proveedor_publicacion_comentario'],
					'id_usuario_cliente'	=> $rw['id_usuario_cliente'],
					'foto_usuario_cliente'	=> $rw['foto_usuario_cliente'],
					'nombre_usuario_cliente'	=> $rw['nombre_usuario_cliente'],
					'comentario'			=> $rw['comentario'],
					'fecha'					=> $rw['fecha'],
					'estado'				=> $rw['estado']
				);
			}
			return $rst;			
		}

		public function agregar_comentario(){
			$texto_filtrado = $this->filtro_tags($_POST['comentario']);
			$Query = new Consulta("INSERT INTO proveedores_publicaciones_comentarios VALUES('',
				'".$_POST['id_proveedor_publicacion']."',
				'".$_POST['id_usuario_cliente']."',
				'".$texto_filtrado."',
				'".date('Y-m-d h:i:s')."',
				'1' 
			)");

			$id = mysql_insert_id();
			$respuesta['data'] = $this->getComentarioJson($id);
			$respuesta['error'] = 'ok';

			header('Content-type: text/plain');
			return json_encode($respuesta);
		}

		public function getComentarioJson($id){
			$sql = "SELECT * FROM proveedores_publicaciones_comentarios WHERE id_proveedor_publicacion_comentario 	 = ".$id;
			$query = new Consulta($sql);

			while( $row = $query->VerRegistro() ){

				$objUsuarioCliente = new UsuarioCliente($row['id_usuario_cliente']);
				$result[] = array(
					'nombre_usuario_cliente'	=> $objUsuarioCliente->nombre_usuario_cliente,
					'comentario' 				=> $row['comentario']
				);
			}
			return $result;
		}

		public function eliminar_comentario(){
			$Query = new Consulta("DELETE FROM proveedores_publicaciones_comentarios WHERE id_proveedor_publicacion_comentario = ".$_POST['id_comentario']);
		}

	}
?>