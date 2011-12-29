<?php
	class ArticuloComentario extends Utilitarios{


		private $id;
		private $id_articulo;
		private $id_usuario_cliente;
		private $comentario;
		private $fecha;

		public function __construct($id = 0){
			$this->id_proveedor_publicacion_comentario = $id;
			if($this->id_proveedor_publicacion_comentario > 0){
				$sql = "SELECT * FROM articulos_comentarios WHERE id_articulo_comentario = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_articulo_comentario	= $rw['id_articulo_comentario'];
					$this->id_articulo				= $rw['id_articulo'];
					$this->id_usuario_cliente		= $rw['id_usuario_cliente'];
					$this->comentario				= $rw['comentario'];
					$this->fecha 					= $rw['fecha'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerComentariosXArticulo($id){
			$sql = "SELECT * 
				FROM articulos_comentarios ac
					JOIN usuarios_clientes uc ON ac.id_usuario_cliente = uc.id_usuario_cliente
				WHERE id_articulo = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_articulo_comentario' 	=> $rw['id_articulo_comentario'],
					'id_usuario_cliente'		=> $rw['id_usuario_cliente'],
					'foto_usuario_cliente'		=> $rw['foto_usuario_cliente'],
					'nombre_usuario_cliente'	=> $rw['nombre_usuario_cliente'],
					'comentario'				=> $rw['comentario'],
					'fecha'						=> $rw['fecha']
				);
			}
			return $rst;			
		}

		public function agregar_comentario(){
			$texto_filtrado = $this->filtro_tags($_POST['comentario']);
			$Query = new Consulta("INSERT INTO articulos_comentarios VALUES('',
				'".$_POST['id_articulo']."',
				'".$_POST['id_usuario_cliente']."',
				'".$texto_filtrado."',
				'".date('Y-m-d h:i:s')."'
			)");

			$id = mysql_insert_id();
			$respuesta['data'] = $this->getComentarioJson($id);
			$respuesta['error'] = 'ok';

			header('Content-type: text/plain');
			return json_encode($respuesta);
		}

		public function getComentarioJson($id){
			$sql = "SELECT * FROM articulos_comentarios WHERE id_articulo_comentario = ".$id;
			$query = new Consulta($sql);

			while( $row = $query->VerRegistro() ){

				$objUsuarioCliente = new UsuarioCliente($row['id_usuario_cliente']);
				$result[] = array(
					'id_comentario' 			=> $row['id_articulo_comentario'],
					'nombre_usuario_cliente'	=> $objUsuarioCliente->nombre_usuario_cliente,
					'comentario' 				=> $row['comentario']
				);
			}
			return $result;
		}

		public function eliminar_comentario(){
			$Query = new Consulta("DELETE FROM articulos_comentarios WHERE id_articulo_comentario = ".$_POST['id_comentario']);
		}

	}
?>