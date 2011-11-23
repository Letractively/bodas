<?php
	class UsuarioClienteProveedor{


		private $id_usuario_cliente_proveedor;
		private $id_usuario_cliente;
		private $id_proveedor;


		public function __construct($id = 0){
			$this->id_usuario_cliente_proveedor = $id;
			if($this->id_usuario_cliente_proveedor > 0){
				$sql = "SELECT * FROM usuarios_clientes_proveedores WHERE id_usuario_cliente_proveedor = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_usuario_cliente 	= $rw['id_usuario_cliente'];
					$this->id_proveedor 	= $rw['id_proveedor'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function obtenerUsuarioClienteAdministradorXProveedor($id)
		{
			$sql = "SELECT * FROM usuarios_clientes_proveedores WHERE id_proveedor = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_usuario_cliente' => $rw['id_usuario_cliente'],
					'id_proveedor'	=> $rw['id_proveedor']
				);
			}
			return $rst;			
		}

		public function verificarRelacionClienteProveedor($id)
		{
			$sql = "SELECT * FROM usuarios_clientes_proveedores WHERE id_usuario_cliente = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_usuario_cliente' => $rw['id_usuario_cliente'],
					'id_proveedor'	=> $rw['id_proveedor']
				);
			}
			return $rst;			
		}
		

	}
?>