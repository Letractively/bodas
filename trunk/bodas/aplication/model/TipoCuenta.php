<?php
	class TipoCuenta{

		private $id_tipo_cuenta;
		private $nombre_tipo_cuenta;
		private $estado_tipo_cuenta;

		public function __construct($id = 0){
			$this->id_tipo_cuenta = $id;

			if($this->id_tipo_cuenta > 0){
				$sql = "SELECT * FROM tipos_cuentas WHERE id_tipo_cuenta = ".$this->id_tipo_cuenta;
				$qry = new Consulta($sql);

				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->nombre_tipo_cuenta = $rw['nombre_tipo_cuenta'];
					$this->estado_tipo_cuenta = $rw['estado_tipo_cuenta'];
				}
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function obtenerTipoCuenta(){
			$sql = "SELECT * FROM tipos_cuentas ORDER BY id_tipo_cuenta ASC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_tipo_cuenta'			=> $rw['id_tipo_cuenta'],
					'nombre_tipo_cuenta'		=> $rw['nombre_tipo_cuenta'],
					'estado_tipo_cuenta'		=> $rw['estado_tipo_cuenta']
				);
			}
			return $rst;			
		}

	}
?>