<?php
	class InscripcionIndex{

		private $id_registro;
		private $nombre;
		private $direccion;
		private $distrito;
		private $telefono;
		private $celular;
		private $email;
		private $fecha_boda;
		private $medio;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){

				$sql = "SELECT 
						id_registro,
						nombre,
						direccion,
						distrito,
						telefono,
						celular,
						email,
						fecha_boda,
						medio
					FROM incripciones_index
					WHERE id_registro = ".$id;

				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_registro	= $rw['id_registro'];
					$this->nombre		= $rw['nombre'];
					$this->direccion	= $rw['direccion'];
					$this->distrito		= $rw['distrito'];
					$this->telefono		= $rw['telefono'];
					$this->celular		= $rw['celular'];
					$this->email		= $rw['email'];
					$this->fecha_boda	= $rw['fecha_boda'];
					$this->medio		= $rw['medio'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}

	}
?>