<?php 
class Navegador extends dwAdminMain{
	
	var $ruta = array();
	var $inicio = array();
	var $actual = array();
	var $id_parent;
	var $categoria; 
	
	function Navegador($id_categoria = 0){
		$this->id_parent = $id_categoria;
		if($this->id_parent > 0 ){
			$categoria = new Categoria($this->id_parent);
		}		
	}
	
	function setActual($name,$url){
		$this->actual['name'][$name];
		$this->actual['url'][$url];
	}

	function bucleCatTrail($id_cat = 0, $id_prod = 0, $id_ec = 0){		
		
		$rx = 0; 
		
		for($x = 0; $x < 10; $x++){ 
			 
			if($id_cat > 0 ){
				$sql   = "	SELECT * FROM categorias c, categorias_idiomas ci 
							WHERE 	c.id_categoria = '".$id_cat."' AND 
									c.id_categoria = ci.id_categoria AND
									ci.id_idioma = '".$this->getIdIdioma()."' ";
				$query = new Consulta($sql);
				$row   = $query->VerRegistro();
				
				$id_cat = $row['id_parent'];
				$id     = $row['id_categoria']; 
				$nombre = $row['nombre_categoria']; 				
				
				$this->ruta[$rx] = array(
					'id'	=> 	$id,
					'url'	=>	'productos.php?id1='.$id,
					'nombre'=>  $nombre);		
			}else{
				break;
			}			
			$rx++;   		
		}
		sort($this->ruta);
		if($id_prod > 0 && $id_ec == 0){
			$producto = new Producto($id_prod); 
			$id_cat   = $id_cat;			 
			$this->ruta[$rx] = array(
				'id'	=> 	$producto->getId(),		
				'url'	=>	'productos.php?id='.$producto->getId(),
				'nombre'=>  $producto->getNombre() );			
			$rx++; 
		}
		
		if($id_ec > 0){
			$obj_c = new Categoria($id_ec); 
			$this->ruta[$rx] = array(
				'id'	=> 	$obj_c->getId(),		
				'url'	=>	'productos.php?id='.$obj_c->getId(),
				'nombre'=>  $obj_c->getNombre() );			
			$rx++; 
		}
							
	}	
	
	function display($id_actual=0){
		if(is_array($this->ruta) && count($this->ruta) > 0){
			$x = 0;
			//sort($this->ruta);
			//print_r($this->ruta);
			$navegador = ' <a href="productos.php?id1=0">PRODUCTOS</a>	';		
			for($x=0; $x<count($this->ruta); $x++){   
				$navegador .= ' &raquo; '; 
				if($id_actual == $this->ruta[$x]['id'] && $x == (count($this->ruta) - 1)){ 					
					$navegador .=  "<strong>".$this->ruta[$x]['nombre']."</strong>";
				}else{
					$navegador .= '<a href="'.$this->ruta[$x]['url'].'">'.$this->ruta[$x]['nombre'].'</a>';
				}  			
			}
		}
		
		return $navegador;
	}		
}
?>