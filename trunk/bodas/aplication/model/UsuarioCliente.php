<?php
	class UsuarioCliente{

		private $id_usuario_cliente;
		private $id_tipo_cuenta;
		private $nombre_usuario_cliente;
		private $foto_usuario_cliente;
		private $email_usuario_cliente;
		private $clave_usuario_cliente;
		private $fecha_registro_usuario_cliente;
		private $estado_registro_usuario_cliente;
		private $estado_cuenta_usuario_cliente;

		public function __construct($id = 0){
			$this->id_usuario_cliente = $id;
			if($this->id_usuario_cliente > 0){
				$sql = "SELECT * FROM usuarios_clientes WHERE id_usuario_cliente = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_tipo_cuenta 			= $rw['id_tipo_cuenta'];
					$this->nombre_usuario_cliente 	= $rw['nombre_usuario_cliente'];
					$this->foto_usuario_cliente 	= $rw['foto_usuario_cliente'];
					$this->email_usuario_cliente 	= $rw['email_usuario_cliente'];
					$this->clave_usuario_cliente 	= $rw['clave_usuario_cliente'];
					$this->fecha_registro_usuario_cliente 	= $rw['fecha_registro_usuario_cliente'];
					$this->estado_registro_usuario_cliente 	= $rw['estado_registro_usuario_cliente'];
					$this->estado_cuenta_usuario_cliente 	= $rw['estado_cuenta_usuario_cliente'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function verificar_email_repetido($correo)
		{
			$sql = "SELECT email_usuario_cliente FROM usuarios_clientes WHERE email_usuario_cliente = '".mysql_real_escape_string($correo)."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){ 
				return 'false';
			}else{ 
				return 'true'; 
			}
		}

		public function verificar_email_repetido2($correo, $correo2)
		{
			$sql = "SELECT email_usuario_cliente FROM usuarios_clientes WHERE email_usuario_cliente = '".mysql_real_escape_string($correo)."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){
				$rw = $qry->VerRegistro();
				if($rw["email_usuario_cliente"] == $correo2){
					return 'true';
				}else{
					return 'false';
				}
			}else{
				return 'true'; 
			}
		}

		public function verificarEmailDeUsuario($user){
			$sql = "SELECT * FROM usuarios_clientes WHERE email_usuario_cliente = '".mysql_real_escape_string($user)."' ";
			$query = new Consulta($sql);
			$res = $query->NumeroRegistros();
			if($res > 0){
				while( $row = $query->VerRegistro() ){
					$result[] = array(
						'id_usuario_cliente'		=> $row['id_usuario_cliente'],
						'nombre_usuario_cliente'	=> $row['nombre_usuario_cliente'],
						'apellido_usuario_cliente'	=> $row['apellido_usuario_cliente'],
						'email_usuario_cliente'		=> $row['email_usuario_cliente'],
						'clave_usuario_cliente'		=> $row['clave_usuario_cliente']
					);
				} 
				$res = $result;
			}else{
				$res = 0;
			}
			return $res;
		}

		public function verificarUsuario($user, $clave){
			$sql = "SELECT * FROM usuarios_clientes WHERE email_usuario_cliente = '".mysql_real_escape_string($user)."' AND clave_usuario_cliente = '".mysql_real_escape_string($clave)."' ";

			$query = new Consulta($sql);
			$res = $query->NumeroRegistros();
			if($res > 0){
				while( $row = $query->VerRegistro() ){
					$result[] = array(
						'id'			=> $row['id_usuario_cliente']
					);
				} 
				$res = $result[0]['id'];
			}else{
				$res = 0;
			}
			return $res;
		}

	}
?>