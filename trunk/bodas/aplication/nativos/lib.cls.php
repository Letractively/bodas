<?php
function paginar($actual, $total, $por_pagina, $enlace) {
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
/*  if ($actual>1)
    $texto = "<a href=\"$enlace$anterior$variables\">&laquo;</a> ";
  else
    $texto = "<b class='bl'>&laquo;</b> ";*/
  for ($i=1; $i<$actual; $i++)
    $texto .= "<a href=\"$enlace$i$variables\"></a> ";
  $texto   .= "<a href=\"javascript:;\" class=\"sombra\"></a>";
  for ($i=$actual+1; $i<=$total_paginas; $i++)
    $texto .= "<a class='bl' href=\"$enlace$i$variables\"></a> ";
 /* if ($actual<$total_paginas)
    $texto .= "<a class='bl' href=\"$enlace$posterior$variables\">&raquo;</a>";
  else
    $texto .= "<b class='bl'>&raquo;</b>";*/
  return $texto;
}

function paginar_catalogo($actual, $total, $por_pagina, $enlace) {
	$total_paginas = ceil($total/$por_pagina);
	$anterior = $actual - 1;
	$posterior = $actual + 1;
	if ($actual>1)  
		$texto .= "<a href=\"$enlace$anterior\">&laquo;</a>";
	else
		$texto .= "<a href='#'>&laquo;</a>";
	for ($i=1; $i<$actual; $i++)
		$texto .= "<a href=\"$enlace$i\">$i</a>";
		$texto .= "<b>$actual</b>";
	for ($i=$actual+1; $i<=$total_paginas; $i++)
		$texto .= "<a href=\"$enlace$i\">$i</a>";
		$texto .= "";
	if ($actual < $total_paginas)
		$texto .= "<a href=\"$enlace$posterior\">&raquo;</a>";
	else
		$texto .= "<a href='#'>&raquo;</a>";
	return $texto;
}


function fabricante($id){
	$sql="SELECT * FROM fabricantes WHERE id_fabricante='".$id."'";
	$query= new Consulta($sql);
	$row=$query->VerRegistro(); 
	return $row['nombre_fabricante'];	
}

function formato_date($comodin,$fecha){
	$nfecha=explode($comodin,$fecha);
	$dia=$nfecha[0];
	$mes=$nfecha[1];
	$año=$nfecha[2];
	$ufecha=$año."-".$mes."-".$dia;
	return $ufecha;
}
function formato_slash($comodin,$fecha){
	$nfecha=explode($comodin,$fecha);
	$dia=$nfecha[2];
	$mes=$nfecha[1];
	$año=$nfecha[0];
	$ufecha=$dia."/".$mes."/".$año;
	return $ufecha;
}

function send($text){
    header("Content-type: text/html; charset=utf-8");
    echo utf8_encode($text);
}

function passcont($psw){
	$txt=strlen($psw);
	$txt1=substr($psw,0,3);
	$txt2=substr($psw,3,3);

}

function verifica_oferta($id_producto=0){
	$oferta=false;
	
	$sql="SELECT precio_oferta FROM ofertas 
			WHERE id_producto='".$id_producto."' AND
				fecha_termino_oferta > date(now()) AND 
				fecha_inicio_oferta <= date(now()) ";
	$query=new Consulta($sql);
	if($query->NumeroRegistros()>0){
		$row=$query->VerRegistro();
		$oferta=$row[0];
	}
	return $oferta;
}

function verifica_oferta_pedido($id_producto, $fecha_limite){
	
	$oferta = 0;	
	
	$sql="SELECT precio_oferta FROM ofertas 
			WHERE id_producto='".$id_producto."' AND
				fecha_termino_oferta >= '".$fecha_limite."' AND 
				fecha_inicio_oferta <= date(now()) ";
				echo $sql;
	$query = new Consulta($sql);
	if($query->NumeroRegistros() > 0){
		$row = $query->VerRegistro();
		$oferta = $row[0];
	}
	return $oferta;
}
function verifica_detalle($id_producto=''){
	$detalle=false;
	
	$sql="SELECT * FROM productos_atributos WHERE id_producto='".$id_producto."' ";
	$query=new Consulta($sql);
	if($query->NumeroRegistros() > 0){
		$detalle=true;
	}
	return $detalle;
}

function comillas_inteligentes($valor){
    // Retirar las barras
    if (get_magic_quotes_gpc()) {
        $valor = stripslashes($valor);
    }

    // Colocar comillas si no es entero
    if (!is_numeric($valor)) {
        $valor = "'" . mysql_real_escape_string($valor) . "'";
    }
	//utilizar con sprintf($consulta)
    return $valor;
}

function impSelect($tabla,$extra,$edo){

if(!empty($edo)){
	$where=" WHERE id_atributo=".$edo;
}
if($tabla=="atributos"){
	$row_id=0;	
	$row_show=1;	
}else if($tabla=="atributos_valores"){
	$row_id=0;	
	$row_show=2;	
}


$sql="SELECT * FROM ".$tabla."  ".$where."" ;
$query=mysql_query($sql); ?>

<select name="<?php echo $tabla?>" <?php echo $extra?> >
	<option value="">Seleccionar...</option><?php	
	while($row=mysql_fetch_array($query)){ ?> 
		<option value="<?php echo $row[$row_id]?>"><?php echo $row[$row_show]?></option><?
	} 
	echo $nuevo_valor; ?>
</select>
	<?
}
/*function select_01($table, $extra, $campos, $filtro){
	$sql="SELECT * FROM ".$table." ".$filtro;
	$query=new Consulta($sql);
	$camp=explode("-",$campos); ?>
	<select name="<?php echo $table?>">
		<option value="">Seleccione...</option><?
		while($row=$query->VerRegistro()){ ?>
			<option value="<?php echo $row[$camp[0]]?>"><?php echo $row[$camp[1]]?></option> <?php		
		} ?>
	</select> <?
}*/
	
	function encriptar($valor){
		$cad=strlen($valor);
		$subcad=ceil($cad/2);
		$prev_valor=substr(strrev($valor),0,$subcad);
		$next_valor=substr(strrev($valor),$subcad,$cad);
		$pcad=$cad*6464;	
		$pass=$pcad.'&'.$prev_valor.'$'.$subcad.'&'.$next_valor.'$w3809245n0t9';	
		return $pass;		
	}
	
		function desencriptar($valor){
		$cad=strlen($valor);
		$subcad=ceil($cad/2);
		$new_valor=explode("&",$valor);
		
		$pvalor=explode("$",$new_valor[1]);
		$prev_valor=$pvalor[0];
		
		$nvalor=explode("$",$new_valor[2]);
		$next_valor=$nvalor[0];
		
		$pass=strrev($prev_valor.$next_valor);
		return $pass;		
	}
	
	function producto($id){
		$sql="SELECT nombre_producto FROM productos_idiomas WHERE id_idioma='".ID_IDIOMA."' AND id_producto='".$id."'";
		$query=new Consulta($sql);	
		$row=$query->VerRegistro();
		return $row[0];		
	}
		
	function categoria($id){
		$sql = "SELECT nombre_categoria FROM categorias_idiomas WHERE id_idioma='1' and id_categoria='".$id."'";
		$query = new Consulta($sql);	
		$row = $query->VerRegistro();
		return $row[0];	
	}
	function get_uid_producto($prid, $params){
		$uprid = $prid;
		if ( (is_array($params)) && (!strstr($prid, '{')) ) {			
			while (list($option, $value) = each($params)){				
				$uprid = $uprid . '{' .$option . '}' . $value;
			}
    	}
    	return $uprid;
  	}
	
	function get_id_producto($uprid) {
    $pieces = explode('{', $uprid);

    return $pieces[0];
  }
    
  function calcula_impuesto($precio, $idimpuesto){
		
		$sql   = "SELECT porcentaje_impuesto FROM impuesto WHERE id_impuesto='".$idimpuesto."' ";
		$query = new Consulta($sql);
		$row   = $query->VerRegistro();
		$impuesto = $row[0];
		$precioi = ($precio + (($impuesto * $precio) / 100)); 
		return  $precioi;		
  }
  
  function precio_con_opciones($id_pedido_producto ){
  	//Verifica opciones
	$precio = 0;
	/*$sqOP = new Consulta("SELECT * FROM pedidos_productos_opciones 
								WHERE id_pedido_producto='".$id_pedido_producto."'");			
	if($sqOP->NumeroRegistros()){
				
		while($rOP = $sqOP->VerRegistro()){			
			$atributos = new Consulta("SELECT precio_producto_atributo_valor, prefijo_producto_atributo_valor						
				FROM productos_atributos_valores 
				WHERE id_producto_atributo = '" . (int)$rOP['id_producto_atributo']. "' AND												
					id_producto_atributo_valor = '" . (int)$rOP['id_producto_atributo_valor']. "'");
												
			  	$attribute_price = $atributos->VerRegistro();
			  	if ($attribute_price['prefijo_producto_atributo_valor'] == '+') {			  	
					$precio += $attribute_price['precio_producto_atributo_valor'];
			  	} else {
					$precio -= $attribute_price['precio_producto_atributo_valor'];
			  	}
			}
		}*/
		return $precio;	
  	}
  
  	
	function estado($id){
		$sql = "SELECT nombre_estado_pedido FROM estados_pedidos WHERE id_estado_pedido='".$id."'";
		$query = new Consulta($sql);	
		$row = $query->VerRegistro();
		return $row[0];	
	}
	
	function cantidad_productos_pedido($id_pedido){
		$sql = "SELECT sum(cantidad_pedido_producto) AS cantidad FROM pedidos_productos WHERE id_pedido='".$id_pedido."' GROUP BY id_pedido";
		$query = new Consulta($sql);
		$cantidad = 0;
		while($row = $query->VerRegistro()){
			$cantidad += $row['cantidad'];
		}
		
		return $cantidad; 	
	}
	
	
	function cliente_destino($id_pedido){
		$sql = "SELECT * FROM clientes_direcciones cd, pedidos p 
				WHERE p.id_pedido = '".$id_pedido."' AND
					p.id_direccion_envio = cd.id_cliente_direccion";
		$query = new Consulta($sql);
		$cantidad = 0;
		$row = $query->VerRegistro();
		
		return $row['nombre_cliente_direccion'].' '.$row['apellidos_cliente_direccion'];
			
	}
	
	function GetPeso($id_pedido){
				
			$peso_cesta=0;
			$sq = new Consulta("SELECT * FROM pedidos_productos WHERE id_pedido='".$id_pedido."'");
			 		
			while($r = $sq->VerRegistro()){
					$sql="SELECT peso_producto FROM productos WHERE id_producto='".(int)$r['id_producto']."' ";
					$query=new Consulta($sql);
					$row=$query->VerRegistro();	
					$peso=$row['peso_producto'];					
					$peso_cesta += ($peso * $r['cantidad_pedido_producto']);
			}				
							
			return $peso_cesta;							
		}
  
  function monto_productos_pedido($id_pedido){
		$sql = "SELECT * FROM pedidos_productos WHERE id_pedido='".$id_pedido."' ";
		$query = new Consulta($sql);
		$monto = 0;
				
			while($rdP=$query->VerRegistro()){
							
				$sP ="SELECT * FROM productos p, productos_idiomas pi
						WHERE  p.id_producto = pi.id_producto  AND
							p.id_producto = '".(int)$rdP['id_producto']."'";
							
				$qP = new Consulta($sP);
				$rP = $qP->VerRegistro(); 							
				$precio = $rP['precio_producto'];
														
				$sqI = new Consulta("SELECT * FROM impuesto WHERE id_impuesto='".$rP['id_impuesto']."'");
				$rI  = $sqI->VerRegistro();	
							
				//verifica oferta
				$oferta = verifica_oferta_pedido($rP['id_producto'], $rdP['fecha_pedido']);
				if($oferta > 0){ $precio = $oferta;	}
											
				//Verifica opciones
				$precio += precio_con_opciones($rdP['id_pedido_producto']);	
							
				//verifica impuesto							
				if($rP['id_impuesto']!=0){ $precio = calcula_impuesto($precio, $rP['id_impuesto']); }
					
				  	$precio = number_format(($precio * $rdP['cantidad_pedido_producto']),2); 
				$monto += $precio;  	
			}
		
		return $monto; 	
	}
	
  function monto_total_pedido($id_pedido){
  	
	$sql = "SELECT * FROM pedidos WHERE id_pedido='".$id_pedido."' ";
	$query = new Consulta($sql);
	$row = $query->VerRegistro();
	
  	$subtotal = monto_productos_pedido($id_pedido);
	
	$envios = new FormasEnvio(); 
	$peso = GetPeso($id_pedido);						
	$montoEnvio = $envios->calculaMontoEnvio($row['id_metodo_envio'], $peso);																					
	
	//echo number_format($montoEnvio,2); 
	
	$pagos = new FormasPago(); 
	$pformas = $pagos->getFormasPago($row['id_metodo_pago']);	
	$metodo_pago = 0;
	$subtotal += $montoEnvio;
							
	if($pformas[0]['porcentaje'] > 0 ){								
		$metodo_pago = (($pformas[0]['porcentaje'] * $subtotal) / 100); 		
		//echo str_replace("*","",$pformas[0]['nombre'])
		//echo number_format($metodo_pago,2); 
	}	
	
	$total = ($subtotal + $metodo_pago); 
	
	return $total;	
  }
  
function AtributoPrecio($id) {
	$atributo_precio = 0;			
	$query_opciones = new Consulta("SELECT * FROM pedidos_productos_opciones 
					WHERE id_pedido_producto = '".$id."' ");
	while($rop=$query_opciones->VerRegistro()){													
		if ($rop['prefijo_precio'] == '+') {			  	
			$atributo_precio += $rop['producto_opcion_precio'];
		} else {
			$atributo_precio -= $rop['producto_opcion_precio'];
		}
	}
	return $atributo_precio;
}

 function cortarTexto($texto, $cantidad){
	$tamano = $cantidad; // tamaño máximo
	$contador = 0;
	// Cortamos la cadena por los espacios
	$leters = strlen($texto);
	$arrayTexto = split(' ',$texto);
	$texto = '';
	
	 
	// Reconstruimos la cadena
	while($tamano >= strlen($texto) + strlen($arrayTexto[$contador])){
		$texto .= ' '.$arrayTexto[$contador];
		$contador++;
	}
	if($leters > $cantidad){ $texto.= ".."; }
	return $texto; 
}
?>