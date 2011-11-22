<?php
	class Proveedor{


		private $id_proveedor;
		private $id_proveedor_rubro;
		private $id_proveedor_tipo;
		private $nombre_proveedor;
		private $logo_proveedor;
		private $descripcion1_proveedor;
		private $descripcion2_proveedor;
		private $direccion_proveedor;
		private $telefono1_proveedor;
		private $telefono2_proveedor;
		private $telefono3_proveedor;
		private $telefono4_proveedor;
		private $email_proveedor;
		private $web_proveedor;
		private $mapa_proveedor;
		private $fecha_registro_proveedor;
		private $estado_cuenta_proveedor;


		public function __construct($id = 0){
			$this->id_proveedor = $id;
			if($this->id_proveedor > 0){
				$sql = "SELECT * FROM proveedores WHERE id_proveedor = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_proveedor_rubro 		= $rw['id_proveedor_rubro'];
					$this->id_proveedor_tipo 		= $rw['id_proveedor_tipo'];
					$this->nombre_proveedor 		= $rw['nombre_proveedor'];
					$this->logo_proveedor 			= $rw['logo_proveedor'];
					$this->descripcion1_proveedor 	= $rw['descripcion1_proveedor'];
					$this->descripcion2_proveedor 	= $rw['descripcion2_proveedor'];
					$this->direccion_proveedor 		= $rw['direccion_proveedor'];
					$this->telefono1_proveedor 		= $rw['telefono1_proveedor'];
					$this->telefono2_proveedor 		= $rw['telefono2_proveedor'];
					$this->telefono3_proveedor 		= $rw['telefono3_proveedor'];
					$this->telefono4_proveedor 		= $rw['telefono4_proveedor'];
					$this->email_proveedor 			= $rw['email_proveedor'];
					$this->web_proveedor 			= $rw['web_proveedor'];
					$this->mapa_proveedor 			= $rw['mapa_proveedor'];
					$this->fecha_registro_proveedor = $rw['fecha_registro_proveedor'];
					$this->estado_cuenta_proveedor 	= $rw['estado_cuenta_proveedor'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerProveedores(){
			$sql = "SELECT * FROM proveedores WHERE estado_cuenta_proveedor = 1";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor'		=> $rw['id_proveedor'],
					'nombre_proveedor'	=> $rw['nombre_proveedor']
				);
			}
			return $rst;			
		}


		public function obtenerProveedoresDestacadoNormal(){	
			$sql = "
				SELECT 
						p.id_proveedor,
						p.nombre_proveedor
					FROM proveedores p 
					LEFT JOIN usuarios_clientes_proveedores ucp ON p.id_proveedor = ucp.id_proveedor 
					WHERE p.estado_cuenta_proveedor = 1 
					AND ucp.id_proveedor IS NULL
					AND p.id_proveedor_tipo = 1 OR p.id_proveedor_tipo = 2
			";	
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor'		=> $rw['id_proveedor'],
					'nombre_proveedor'	=> $rw['nombre_proveedor']
				);
			}
			return $rst;			
		}
		
		
	}
?>