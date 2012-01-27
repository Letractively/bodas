<?php
	class UsuarioClienteMeGusta{


		private $id_usuario_cliente_me_gusta;
		private $id_usuario_cliente;
		private $id_proveedor;


		public function __construct($id = 0){
			$this->id_usuario_cliente_me_gusta = $id;
			if($this->id_usuario_cliente_me_gusta > 0){
				$sql = "SELECT * FROM usuarios_clientes_me_gusta WHERE id_usuario_cliente_me_gusta = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_usuario_cliente 	= $rw['id_usuario_cliente'];
					$this->id_proveedor 		= $rw['id_proveedor'];

				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function verificar_me_gusta($id_usuario, $id_proveedor)
		{
			$sql = "SELECT * FROM usuarios_clientes_me_gusta WHERE id_usuario_cliente = '".$id_usuario."' AND id_proveedor = '".$id_proveedor."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){ 
				return 'true';
			}else{ 
				return 'false'; 
			}
		}

		public function agregar_me_gusta($id_usuario, $id_proveedor)
		{
			$sql = "INSERT INTO usuarios_clientes_me_gusta VALUES('','".$id_usuario."','".$id_proveedor."','".date('Y-m-d h:i:s')."')";
			$qry = new Consulta($sql);
		}

		public function quitar_me_gusta($id_usuario, $id_proveedor)
		{
			$sql = "DELETE FROM usuarios_clientes_me_gusta WHERE id_usuario_cliente = '".$id_usuario."' AND id_proveedor = '".$id_proveedor."'";
			$qry = new Consulta($sql);
		}

		public function obtenerSeguidores($id_proveedor){
			$sql = "
				SELECT 
					uc.id_usuario_cliente,
					uc.foto_usuario_cliente,
					uc.nombre_usuario_cliente
				FROM usuarios_clientes_me_gusta ucmg 
					JOIN usuarios_clientes uc ON ucmg.id_usuario_cliente = uc.id_usuario_cliente
				WHERE ucmg.id_proveedor = ".$id_proveedor."
				ORDER BY ucmg.id_usuario_cliente_me_gusta DESC LIMIT 8";

			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_usuario_cliente'		=> $rw['id_usuario_cliente'],
					'foto_usuario_cliente'		=> $rw['foto_usuario_cliente'],
					'nombre_usuario_cliente'	=> $rw['nombre_usuario_cliente']
				);
			}
			return $rst;		
		}

		public function obtenerListaSeguidores($id_proveedor){
			$sql = "
				SELECT 
					uc.id_usuario_cliente,
					uc.foto_usuario_cliente,
					uc.nombre_usuario_cliente
				FROM usuarios_clientes_me_gusta ucmg 
					JOIN usuarios_clientes uc ON ucmg.id_usuario_cliente = uc.id_usuario_cliente
				WHERE ucmg.id_proveedor = ".$id_proveedor."
				ORDER BY ucmg.id_usuario_cliente_me_gusta ASC";

			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_usuario_cliente'		=> $rw['id_usuario_cliente'],
					'foto_usuario_cliente'		=> $rw['foto_usuario_cliente'],
					'nombre_usuario_cliente'	=> $rw['nombre_usuario_cliente']
				);
			}
			return $rst;		
		}

		public function obtenerSeguidoresSinLimit($id_proveedor){
			$sql = "
				SELECT 
					ucmg.fecha_me_gusta,
					YEAR(ucmg.fecha_me_gusta) as 'y_me_gusta',
					MONTH(ucmg.fecha_me_gusta) as 'm_me_gusta',
					DAY(ucmg.fecha_me_gusta) as 'd_me_gusta',
					COUNT(*) as 'num_usuarios'
				FROM usuarios_clientes_me_gusta ucmg 
					JOIN usuarios_clientes uc ON ucmg.id_usuario_cliente = uc.id_usuario_cliente
				WHERE ucmg.id_proveedor = ".$id_proveedor."
				GROUP BY YEAR(ucmg.fecha_me_gusta) , MONTH(ucmg.fecha_me_gusta), DAY(ucmg.fecha_me_gusta)
				ORDER BY ucmg.id_usuario_cliente_me_gusta ASC LIMIT 30";

			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'fecha_me_gusta'			=> $rw['fecha_me_gusta'],
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