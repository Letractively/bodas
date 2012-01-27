<?php
	class UsuarioClientePublicacion{


		private $id_usuario_cliente_publicacion;
		private $id_usuario_cliente;
		private $id_publicacion;


		public function __construct($id = 0){
			$this->id_usuario_cliente_me_gusta = $id;
			if($this->id_usuario_cliente_me_gusta > 0){
				$sql = "SELECT * FROM usuarios_clientes_publicaciones WHERE id_usuario_cliente_publicacion = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_usuario_cliente 	= $rw['id_usuario_cliente'];
					$this->id_publicacion 		= $rw['id_publicacion'];

				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function verificar_me_gusta($id_usuario, $id_publicacion)
		{
			$sql = "SELECT * FROM usuarios_clientes_publicaciones WHERE id_usuario_cliente = '".$id_usuario."' AND id_publicacion = '".$id_publicacion."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){ 
				return 'true';
			}else{ 
				return 'false'; 
			}
		}


		public function agregar_me_gusta($id_usuario, $id_publicacion)
		{
			$sql = "INSERT INTO usuarios_clientes_publicaciones VALUES('','".$id_usuario."','".$id_publicacion."','".date('Y-m-d h:i:s')."')";
			$qry = new Consulta($sql);
		}


		public function quitar_me_gusta($id_usuario, $id_publicacion)
		{
			$sql = "DELETE FROM usuarios_clientes_publicaciones WHERE id_usuario_cliente = '".$id_usuario."' AND id_publicacion = '".$id_publicacion."'";
			$qry = new Consulta($sql);
		}

		public function obtenerSeguidoresXPublicaciones($id_proveedor){
			$sql = "
				SELECT 
					uc.id_usuario_cliente,
					uc.foto_usuario_cliente,
					uc.nombre_usuario_cliente,
					ucp.fecha_me_gusta,
					pp.id_proveedor

				FROM usuarios_clientes_publicaciones ucp 
					JOIN usuarios_clientes uc ON ucp.id_usuario_cliente = uc.id_usuario_cliente
					JOIN proveedores_publicaciones pp ON ucp.id_publicacion = pp.id_proveedor_publicacion

				WHERE pp.id_proveedor = ".$id_proveedor."

				ORDER BY ucp.id_usuario_cliente_publicacion DESC LIMIT 8";

			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_usuario_cliente'		=> $rw['id_usuario_cliente'],
					'foto_usuario_cliente'		=> $rw['foto_usuario_cliente'],
					'nombre_usuario_cliente'	=> $rw['nombre_usuario_cliente'],
					'fecha_me_gusta'			=> $rw['fecha_me_gusta'],
					'id_proveedor'				=> $rw['id_proveedor']
				);
			}
			return $rst;		
		}

		public function obtenerSeguidoresXPublicacionesSinLimit($id_proveedor){
			$sql = "
				SELECT 
					uc.id_usuario_cliente,
					uc.foto_usuario_cliente,
					uc.nombre_usuario_cliente,
					YEAR(ucp.fecha_me_gusta) as 'y_me_gusta',
					MONTH(ucp.fecha_me_gusta) as 'm_me_gusta',
					DAY(ucp.fecha_me_gusta) as 'd_me_gusta',
					ucp.fecha_me_gusta,
					pp.id_proveedor,
					COUNT(*) as 'num_usuarios'
				FROM usuarios_clientes_publicaciones ucp 
					JOIN usuarios_clientes uc ON ucp.id_usuario_cliente = uc.id_usuario_cliente
					JOIN proveedores_publicaciones pp ON ucp.id_publicacion = pp.id_proveedor_publicacion
				WHERE pp.id_proveedor = ".$id_proveedor."
				GROUP BY YEAR(ucp.fecha_me_gusta) , MONTH(ucp.fecha_me_gusta), DAY(ucp.fecha_me_gusta)
				ORDER BY ucp.id_usuario_cliente_publicacion ASC LIMIT 30";

			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_usuario_cliente'		=> $rw['id_usuario_cliente'],
					'foto_usuario_cliente'		=> $rw['foto_usuario_cliente'],
					'nombre_usuario_cliente'	=> $rw['nombre_usuario_cliente'],
					'fecha_me_gusta'			=> $rw['fecha_me_gusta'],
					'id_proveedor'				=> $rw['id_proveedor'],
					'y_me_gusta'				=> $rw['y_me_gusta'],
					'm_me_gusta'				=> $rw['m_me_gusta'],
					'd_me_gusta'				=> $rw['d_me_gusta'],
					'num_usuarios'				=> $rw['num_usuarios']
				);
			}
			return $rst;		
		}

	}
?>