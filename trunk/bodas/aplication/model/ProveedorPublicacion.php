<?php
	class ProveedorPublicacion extends Utilitarios{


		private $id_proveedor_publicacion;
		private $id_proveedor;
		private $texto_proveedor_publicacion;
		private $fecha_proveedor_publicacion;
		private $estado_proveedor_publicacion;


		public function __construct($id = 0){
			$this->id_proveedor_publicacion = $id;
			if($this->id_proveedor_publicacion > 0){
				$sql = "SELECT * FROM proveedores_publicaciones WHERE id_proveedor_publicacion = ".$id;
				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_proveedor	= $rw['id_proveedor'];
					$this->texto_proveedor_publicacion	= $rw['texto_proveedor_publicacion'];
					$this->fecha_proveedor_publicacion 	= $rw['fecha_proveedor_publicacion'];
					$this->estado_proveedor_publicacion = $rw['estado_proveedor_publicacion'];
				}					
			}
		}


		public function __get($atributo){
			return $this->$atributo;
		}


		public function obtenerPublicacionesXProveedor($id){
			$sql = "SELECT * FROM proveedores_publicaciones WHERE id_proveedor = ".$id;
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				$rst[] = array(
					'id_proveedor_publicacion'		=> $rw['id_proveedor_publicacion'],
					'id_proveedor'					=> $rw['id_proveedor'],
					'texto_proveedor_publicacion'	=> $rw['texto_proveedor_publicacion'],
					'fecha_proveedor_publicacion'	=> $rw['fecha_proveedor_publicacion'],
					'estado_proveedor_publicacion'	=> $rw['estado_proveedor_publicacion']
				);
			}
			return $rst;			
		}


		public function obtenerUltimasPublicaciones(){
			$sql = "SELECT * FROM proveedores_publicaciones ORDER BY id_proveedor_publicacion DESC";
			$qry = new Consulta($sql);
			while( $rw = $qry->VerRegistro() ){
				
				$objProveedor = new Proveedor($rw['id_proveedor']);
				
				$rst[] = array(
					'id_proveedor_publicacion'	=> $rw['id_proveedor_publicacion'],
					'id_proveedor'					=> $rw['id_proveedor'],
					'nombre_proveedor'				=> $objProveedor->nombre_proveedor,
					'texto_proveedor_publicacion'	=> $rw['texto_proveedor_publicacion'],
					'fecha_proveedor_publicacion'	=> $rw['fecha_proveedor_publicacion'],
					'estado_proveedor_publicacion'	=> $rw['estado_proveedor_publicacion']
				);
			}
			return $rst;			
		}


		public function agregar_publicacion(){
			$texto_filtrado = $this->filtro_tags($_POST['publicacion']);
			$Query = new Consulta("INSERT INTO proveedores_publicaciones VALUES('',
				'".$_POST['id_proveedor']."',
				'".$texto_filtrado."',
				'".date('Y-m-d H:i:s')."',
				'1'
			)");

			$id = mysql_insert_id();
			$respuesta['data'] = $this->getPublicacionJson($id);
			$respuesta['error'] = 'ok';

			header('Content-type: text/plain');
			return json_encode($respuesta);
		}


		public function getPublicacionJson($id){

			$sql = "SELECT * FROM proveedores_publicaciones WHERE id_proveedor_publicacion = ".$id;
			$query = new Consulta($sql);

			while( $row = $query->VerRegistro() ){

			if( substr($row['fecha_proveedor_publicacion'],0,10) == date('Y-m-d') ){
				$fecha1 = "Hoy";
			}else{
				$a = explode ("-", substr($row['fecha_proveedor_publicacion'],0,10) );
				$fecha_formateada = $a[2]." - ".$a[1]." - ".$a[0];
				$fecha1 = $fecha_formateada; 
			}


			if( substr($row['fecha_proveedor_publicacion'],11,5) == date('H:i') ){
				$fecha2 = "comparti&oacute; hace unos instantes";
			}else{
				$fecha2 = "comparti&oacute; a las ".substr($row['fecha_hora'],11,5);
			}
				
				$result[] = array(
					'id_proveedor_publicacion'		=> $row['id_proveedor_publicacion'],
					'id_proveedor'					=> $row['id_proveedor'],
					'texto_proveedor_publicacion' 	=> $row['texto_proveedor_publicacion'],
					'fecha1' 						=> $fecha1,
					'fecha2' 						=> $fecha2
				);
			}
			return $result;

		}


		public function eliminar_publicacion(){
			$Query = new Consulta("DELETE FROM proveedores_publicaciones WHERE id_proveedor_publicacion = ".$_POST['idpublicacion']);
			$Query = new Consulta("DELETE FROM proveedores_publicaciones_comentarios WHERE id_proveedor_publicacion = ".$_POST['idpublicacion']);
		}


	}
?>