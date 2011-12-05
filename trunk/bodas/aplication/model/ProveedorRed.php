<?php
	class ProveedorRed{


		private $id_proveedor_red_social;
		private $id_proveedor;
		private $id_red_social;
		private $link_proveedor_red_social;

		public function __construct($id = 0){
			$this->id_proveedor_red_social = $id;
			if($this->id_proveedor_red_social > 0){
				$sql = "SELECT * FROM proveedores_redes_sociales WHERE id_proveedor_red_social = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_proveedor 				= $rw['id_proveedor'];
					$this->id_red_social 				= $rw['id_red_social'];
					$this->link_proveedor_red_social 	= $rw['link_proveedor_red_social'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerRedesXProveedor($id){
			$sql = "SELECT * 
						FROM proveedores_redes_sociales prs
							JOIN redes_sociales rs ON prs.id_red_social = rs.id_red_social
						WHERE prs.id_proveedor = ".$id."
						AND rs.estado_red_social = 1";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor_red_social'	=> $rw['id_proveedor_red_social'],
					'id_proveedor'				=> $rw['id_proveedor'],
					'id_red_social'				=> $rw['id_red_social'],
					'imagen_red_social'			=> $rw['imagen_red_social'],
					'link_proveedor_red_social'	=> $rw['link_proveedor_red_social']					
				);
			}
			return $rst;			
		}

		public function eliminar($id){
			if($id > 0){
				$Query = new Consulta("DELETE FROM proveedores_redes_sociales WHERE id_proveedor_red_social = ".$id."");
			}
		}

	}
?>