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
		private $mapa_codigo1;
		private $mapa_imagen1;
		private $mapa_estado1;
		private $mapa_codigo2;
		private $mapa_imagen2;
		private $mapa_estado2;
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
					$this->mapa_codigo1 			= $rw['mapa_codigo1'];
					$this->mapa_imagen1 			= $rw['mapa_imagen1'];
					$this->mapa_estado1 			= $rw['mapa_estado1'];
					$this->mapa_codigo2 			= $rw['mapa_codigo2'];
					$this->mapa_imagen2 			= $rw['mapa_imagen2'];
					$this->mapa_estado2 			= $rw['mapa_estado2'];
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
				SELECT p.id_proveedor, p.nombre_proveedor
				FROM proveedores p
				LEFT JOIN usuarios_clientes_proveedores ucp ON p.id_proveedor = ucp.id_proveedor
				WHERE p.estado_cuenta_proveedor =1
				AND ucp.id_proveedor IS NULL
				AND p.id_proveedor_tipo IN(1,2)
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


		public function obtenerProveedoresXRubroYTipo($id_tipo, $id_rubro){
			$sql = "
				SELECT 
					p.id_proveedor,
					p.nombre_proveedor,
					p.logo_proveedor,
					p.descripcion1_proveedor,
					p.telefono1_proveedor,
					p.telefono2_proveedor
				FROM proveedores p
				WHERE p.estado_cuenta_proveedor = 1
				AND p.id_proveedor_tipo = ".$id_tipo."
				AND p.id_proveedor_rubro = ".$id_rubro."
				ORDER BY p.nombre_proveedor ASC";

			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor'				=> $rw['id_proveedor'],
					'nombre_proveedor'			=> $rw['nombre_proveedor'],
					'logo_proveedor'			=> $rw['logo_proveedor'],
					'descripcion1_proveedor'	=> $rw['descripcion1_proveedor'],
					'telefono1_proveedor'	=> $rw['telefono1_proveedor'],
					'telefono2_proveedor'	=> $rw['telefono2_proveedor']
				);
			}
			return $rst;		
		}


		public function obtenerProveedoresXTexto($id_tipo, $texto){
			$sql = "
				SELECT 
					p.id_proveedor,
					p.nombre_proveedor,
					p.logo_proveedor,
					p.descripcion1_proveedor,
					p.telefono1_proveedor,
					p.telefono2_proveedor
				FROM proveedores p, proveedores_rubros pr
				WHERE p.estado_cuenta_proveedor = 1
				AND p.id_proveedor_rubro = pr.id_proveedor_rubro
				AND p.id_proveedor_tipo = ".$id_tipo."
				".$texto."
				ORDER BY p.nombre_proveedor ASC";

			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor'				=> $rw['id_proveedor'],
					'nombre_proveedor'			=> $rw['nombre_proveedor'],
					'logo_proveedor'			=> $rw['logo_proveedor'],
					'descripcion1_proveedor'	=> $rw['descripcion1_proveedor'],
					'telefono1_proveedor'		=> $rw['telefono1_proveedor'],
					'telefono2_proveedor'		=> $rw['telefono2_proveedor']
				);
			}
			return $rst;		
		}


	}
?>