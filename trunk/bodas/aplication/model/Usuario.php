<?php
	class Usuario
	{

		private $id_usuario;
		private $id_rol;
		private $nombre_usuario;
		private $apellidos_usuario;
		private $email_usuario;
		private $login_usuario;
		private $password_usuario;
		private $fecha_ingreso_usuario;
		private $lectura_usuario;
		private $escritura_usuario;

		public function __construct($id = 0)
		{
			
			$this->id_usuario = $id;
			
			if($this->id_usuario > 0){
				$sql = " SELECT * FROM usuarios WHERE id_usuario = '".$this->id_usuario."' ";

				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0 ){
					$rw = $qry->VerRegistro();
					$this->id_rol 				= $rw["id_rol"];
					$this->nombre_usuario 		= $rw["nombre_usuario"];
					$this->apellidos_usuario 	= $rw["apellidos_usuario"];
					$this->email_usuario 		= $rw["email_usuario"];
					$this->login_usuario 		= $rw["login_usuario"];
					$this->password_usuario 	= $rw["password_usuario"];
					$this->fecha_ingreso_usuario = $rw["fecha_ingreso_usuario"];
					$this->lectura_usuario 		= $rw["lectura_usuario"];
					$this->escritura_usuario 	= $rw["escritura_usuario"];
				}
			}
		}

		public function __get($cls_atributo)
		{
			return $this->$cls_atributo;
		}

		public function verificar_email_repetido($correo)
		{
			$sql = "SELECT email_usuario FROM usuarios WHERE email_usuario = '".mysql_real_escape_string($correo)."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){ 
				return 'false';
			}else{ 
				return 'true'; 
			}
		}

		public function verificar_usuario_repetido($usuario)
		{
			$sql = "SELECT login_usuario FROM usuarios WHERE login_usuario = '".mysql_real_escape_string($usuario)."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){ 
				return 'false';
			}else{ 
				return 'true'; 
			}
		}

		public function verificar_email_repetido2($correo, $correo2)
		{
			$sql = "SELECT email_usuario FROM usuarios WHERE email_usuario = '".mysql_real_escape_string($correo)."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){
				$rw = $qry->VerRegistro();
				if($rw["email_usuario"] == $correo2){
					return 'true';
				}else{
					return 'false';
				}
			}else{
				return 'true'; 
			}
		}

		public function verificar_usuario_repetido2($usuario, $usuario2)
		{
			$sql = "SELECT login_usuario FROM usuarios WHERE login_usuario = '".mysql_real_escape_string($usuario)."'";
			$qry = new Consulta($sql);
			if( $qry->NumeroRegistros() > 0 ){ 
				$rw = $qry->VerRegistro();
				if($rw["login_usuario"] == $usuario2){
					return 'true';
				}else{
					return 'false';
				}
			}else{ 
				return 'true'; 
			}
		}

	}
?>