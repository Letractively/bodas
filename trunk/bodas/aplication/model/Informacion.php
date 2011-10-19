<?php 

class Informacion{
	 
	var $id;
	var $nombre;
	var $imagen;
	var $descripcion;
	
	function Informacion($id=0){
		$this->id = $id;
		
		if($this->id > 0){
			$sql = " SELECT * FROM informaciones WHERE id_informacion = '".$this->id."' ";
			$query = new Consulta($sql);
			if($row = $query->VerRegistro()){
				$this->nombre = $row['nombre_informacion'];
				$this->imagen = $row['imagen_informacion'];
				$this->descripcion = $row['descripcion_informacion'];
				$this->fecha = $row['fecha_informacion'];
			}			
		}
	}	
	
	function getId(){
		return $this->id;
	}
		
	function getNombre(){
		return $this->nombre;		
	}
	
	function getDescripcion(){
		return $this->descripcion;
	}
	
	function getFecha(){
		return $this->fecha;
	}
	
	function getImagen(){
		return $this->imagen;
	}
	
	function newInformacion(){
		$sql = "SELECT id_informacion, nombre_informacion, descripcion_informacion, imagen_informacion FROM informaciones";
		$query= new Consulta($sql);		
		$query->Crud("new","informacion.php");	
	}
	
	function editInformacion(){
		$sql = "SELECT id_informacion, nombre_informacion, descripcion_informacion, imagen_informacion FROM informaciones 
				WHERE id_informacion = '".$this->id."'";
		$query= new Consulta($sql);
		
		$query->Crud("edit","informacion.php");	
	}
	
	function addInformacion(){
		$destino = '../aplication/webroot/imgs/catalogo/';
		$upload = new Upload();
		$nombre = "";
		
		if(isset($_FILES[ 'imagen_informacion' ][ 'name' ]) && $_FILES[ 'imagen_informacion' ][ 'name' ]!=""){			
			
			$nombre  = $_FILES [ 'imagen_informacion' ][ 'name' ]; 
			$tamano  = $_FILES [ 'imagen_informacion' ][ 'size' ];
			$tarchivo= $_FILES [ 'imagen_informacion' ][ 'type' ]; 
			$temp    = $_FILES [ 'imagen_informacion' ][ 'tmp_name' ];
			
			if($upload->upload_imagen($nombre, $temp, $destino, $tarchivo, $tamano)){
				// $nombre = " , imagen_informacion = '".$nombre."' ";		
			}
		}
				
		 	 
		$sql=" INSERT INTO informaciones VALUES('','".$_POST['nombre_informacion']."','".$_POST['descripcion_informacion']."','".$nombre."','".date('Y-m-d H:i:s')."')";									
			$query = new Consulta($sql);	
		 			
		
												
	}
	
	function updateInformacion(){
		$destino = '../aplication/webroot/imgs/catalogo/';
		$upload = new Upload();		
		
		if(isset($_FILES [ 'imagen_informacion' ][ 'name' ]) && $_FILES [ 'imagen_informacion' ][ 'name' ]!=""){
			$nombre  = $_FILES [ 'imagen_informacion' ][ 'name' ]; 
			$tamano  = $_FILES [ 'imagen_informacion' ][ 'size' ];
			$tarchivo= $_FILES [ 'imagen_informacion' ][ 'type' ]; 
			$temp    = $_FILES [ 'imagen_informacion' ][ 'tmp_name' ];
			
			if($upload->upload_imagen($nombre, $temp, $destino, $tarchivo, $tamano)){
				$update = " , imagen_informacion = '".$nombre."' ";		
			}
		}
		
		$sql = " UPDATE informaciones SET 
									nombre_informacion = '".$_POST['nombre_informacion']."',
									descripcion_informacion = '".str_replace("<br />","<xx>",$_POST['descripcion_informacion'])."'  
									".$update."WHERE id_informacion='".$this->id."' ";			 																	
		$query = new Consulta($sql);
															
	}
	
	function deleteInformacion(){
		$sql = "DELETE FROM informaciones WHERE id_informacion='".$this->id."'";
		$query = new Consulta($sql);
	}	
	
	function listInformacion(){
		 
		if(!isset($_GET['pag'])){ $_GET['pag'] = 1; } 
		$tampag = 20;
		$reg1 = ($_GET['pag']-1) * $tampag;	  
		
		$sql = "SELECT id_informacion , nombre_informacion 	, imagen_informacion , fecha_informacion FROM informaciones ORDER BY id_informacion ASC";
		$queryt= new Consulta($sql);	 
				
		$num=$queryt->NumeroRegistros();	
		$limit=$sql_pag." LIMIT ".$reg1.",".$tampag."";
		
		$sql .= $limit ;		
		$query= new Consulta($sql);	 
		echo $query->VerListado("informacion.php");
		if( $num > $tampag ){ echo paginar($_GET['pag'], $num, $tampag, "informacion.php?pag="); }	
	}	
	
	function getInformaciones($id_categoria = 0){
		
		$datos;
		
		$sql   = "SELECT id_informacion , nombre_informacion 	, imagen_informacion , fecha_informacion FROM informaciones ";
		$query = new Consulta($sql);
		
		while($row = $query->VerRegistro()){
			$datos[] = array(
				'id' 		=> $row['id_informacion'],
				'nombre' 	=> $row['nombre_informacion'],
				//'descripcion' => $row['descripcion_informacion'],
				'imagen' 	=> $row['imagen_informacion'],
				'fecha' 	=> $row['fecha_informacion']
			);
		}
		return $datos;	
	}
	
	function VerInformacion(){ ?>
		<div class="tb_bg1"><div class="margen_left"><?php echo $this->nombre ?></div></div>
		<div id="secciones">
			<div id="detalle_producto">
				<div class="detalle_producto_bg"> <?php 
				if( trim($this->imagen) != "" ){?>
					<div class="centrado"><img src="<?php echo _img_file_?>?imagen=<?php echo $this->imagen ?>&w=301&h=210" /></div>
				<?php			
				} ?>
					<div class="descripcion"> <p><?php $format = str_replace("<br />" , "" ,nl2br($this->descripcion));
					echo str_replace("<xx>","<br />",$format) ?></p> </div> 
					<br />  
					<div class="notificacion"> Ultima Actualización <?php echo date('d-m-Y H:i:s', strtotime($this->fecha)); ?></div>
				</div>
			</div>
		</div> <?php		
	} 
}

?>