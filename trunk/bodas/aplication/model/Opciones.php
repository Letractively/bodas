<?php 
class Opciones{	


	function OpcionesNew(){	?>
	<form name="f1" action="" method="post"  >
		<table width="98%" border="1" bordercolor="#CCCCCC" style="border:1px solid #B8012F; border-collapse:collapse;" bgcolor="#EFEFEF">
			<tr>
				<td colspan="7" style="color:#FEF0C5; font:BOLD 11px tahoma; background-color:#B8012F; text-align:center">ASIGNACION DE ATRIBUTOS </td>
			</tr>					
			<tr>
				<td > Producto <BR /> <?php 				
				$sql_prods="SELECT * FROM productos p, productos_idiomas pi 
							WHERE p.id_producto=pi.id_producto ";				
				$query_prods=new Consulta($sql_prods);	?>
                  <select name="productos" >
                    <option value="">Seleccione Producto...</option> <?
						while($row_prods=$query_prods->VerRegistro()){?>
                    <option value="<?php echo $row_prods['id_producto']?>">
                    <?php echo $row_prods['nombre_producto']?>
                    </option> <?					
					} ?>
                </select></td>
			  	<td align="center" > Opcion <BR /> <?php  
   $xtra ='onChange="cargarContenido();"'; 
   impSelect("atributos",$xtra,"");  ?> </td>
				<td align="center" > Valor <BR />
				  <div id="contenedor"> 
				    <select name="atributos_valores" class="navLink" id="valores"> 
				      <option value="-99">  </option> 
			        </select> 
		                       </div></td> <input type="hidden" name="prefijo" size="1" value="+" dir="rtl" />
				<!--<td align="center" >Prefijo<BR />
			   </td>-->
				<td align="center" >  Stock <BR />
			    <input type="hidden" name="precio" size="6" dir="rtl"  value="0" /> <input type="text" size="6" name="stock" /></td>
				<td align="center" style="vertical-align:middle" ><input type="submit" name="enviar" value="AGREGAR" onclick=" return validar_opciones('add')"></td>
		    </tr>
				</table>
</form>	<?php 		
	}
	
	function OpcionesEdit($id){
		$sql="SELECT * FROM productos_atributos
				WHERE id_producto_atributo='".$id."' ";
		$query=new Consulta($sql);
		$row=$query->VerRegistro();
		$productos=$row['id_producto'];
		$atributos_valores=$row['id_atributo_valor'];
		$atributos=$row['id_atributos'];
		$prefijo=$row['prefijo_producto_atributo_valor'];
		$precio=$row['precio_producto_atributo_valor'];	?>
		<form name="f1" action="" method="post"  >
		<table width="98%" border="1" bordercolor="#CCCCCC" style="border:1px solid #B8012F; border-collapse:collapse;" bgcolor="#EFEFEF">
			<tr>
				<td colspan="7" style="color:#FEF0C5; font:BOLD 11px tahoma; background-color:#B8012F; text-align:center">ASIGNACION DE ATRIBUTOS</td>
			</tr>					
			<tr>
				<td > Producto <BR /> <?php 				
				$sql_prods="SELECT * FROM productos p, productos_idiomas pi 
							WHERE p.id_producto=pi.id_producto ";				
				$query_prods=new Consulta($sql_prods);	?>
                  <select name="productos" >
                    <option value="">Seleccione Producto...</option> <?php 
						while($row_prods=$query_prods->VerRegistro()){?>
                    <option value="<?php echo $row_prods['id_producto']?>"> <?php echo $row_prods['nombre_producto']?> </option><?					
					} ?>
                </select></td>
			  	<td align="center" > Opcion <BR /><?php  
	   $xtra ='onChange="cargarContenido();"'; 
	   impSelect("atributos",$xtra,"");  ?> </td>
				<td align="center" > Valor <BR />
				  <div id="contenedor"> 
				    <select name="atributos_valores" class="navLink" id="valores"> 
				      <option value="-99">  </option> 
			        </select> 
		                       </div></td>
				<td align="center" > Prefijo <BR />
			    <input type="text" name="prefijo" size="1" value="+" dir="rtl" /></td>
				<td align="center" > Precio <BR />
			    <input type="text" name="precio" size="6" dir="rtl" /></td>
				<td align="center" style="vertical-align:middle" ><input type="submit" name="enviar" value="AGREGAR" onclick=" return validar_opciones('update',<?php echo id?>)"></td>
		    </tr>
				</table>
</form>	<?php 
	}
	
	function OpcionesAdd(){
		if(!$_POST){
			echo "<div id='error'>ERROR: No se pudo Agregar Oferta por falta de datos </div><br>";		
		}else{			
			$sq=new Consulta("SELECT * FROM productos_atributos
				WHERE id_producto='".$_POST['productos']."' AND
						id_atributo='".$_POST['atributos']."' ");	
			if($sq->NumeroRegistros()==0){
				$insert= new Consulta("INSERT INTO productos_atributos
					VALUES('','".$_POST['productos']."','".$_POST['atributos']."')");							
				$id_pa=mysql_insert_id();
			}else{
				$row_pa= $sq->VerRegistro();
				$id_pa = $row_pa['id_producto_atributo'];
			}
				
			$sq_pav = new Consulta("SELECT * FROM productos_atributos_valores
				WHERE id_producto_atributo='".$id_pa."' AND
					  id_atributo_valor='".$_POST['atributos_valores']."' ");	
			if($sq_pav->NumeroRegistros()==0){
				$inser= new Consulta("INSERT INTO productos_atributos_valores
					VALUES('','".$id_pa."','".$_POST['atributos_valores']."', '".$_POST['prefijo']."','".$_POST['precio']."','".$_POST['stock']."')");							
					echo "<div id=error> Se Ingreso el Atributo Correctamente </div><br>";
			}else{
				$inser = "UPDATE productos_atributos_valores SET 
						prefijo_producto_atributo_valor='".$_POST['prefijo']."',
						precio_producto_atributo_valor ='".$_POST['precio']."',
						stock_producto_atributo_valor ='".$_POST['stock']."'  
						WHERE id_producto_atributo='".$id_pa."' AND
					  id_atributo_valor='".$_POST['atributos_valores']."'  ";
				$sq_inser = new Consulta($inser);	
					echo "<div id=error> Se actualizo el Atributo Correctamente </div><br>";		
			}	
											
		}	
		$obj = new Producto($_POST['productos']);
		$val = $obj->updateStock();
		
	}
	
	function OpcionesUpdate($id){					
		if(empty($id)){
			echo "<br><div id=error>La actualizacion no se puede efectuar por falta de Id </div><br>";	
		}else{			
			$Query = new Consulta(" UPDATE productos_atributos
										SET precio_oferta='".$_POST['precio']."',
											fecha_inicio_oferta='".formato_date('/',$_POST['inicio'])."',
											fecha_termino_oferta='".formato_date('/',$_POST['termino'])."'
											WHERE id_oferta='".$id."'");
																				
			echo "<br><div id=error>La actualizacion se realizo Correctamente </div><br>";					
		}	
	}	

	
	function OpcionesDelete($id){
		if(empty($id)){
			echo "<br><div id=error>La Eliminación no se puede efectuar por falta de Id </div><br>";	
		}else{	
			
			$Query = new Consulta($sql = "DELETE FROM productos_atributos_valores WHERE id_producto_atributo_valor='".$id."'");
			$obj   = new Producto($_GET['idp']);
			$val   = $obj->updateStock();
			if($val == FALSE){
				$Queryp = new Consulta("DELETE FROM productos_atributos WHERE id_producto='".$_GET['idp']."'");
			}
			echo "<br><div id=error>Se elimino el registro Correctamente </div><br>";
		}	
	}

	function OpcionesList(){					
		if(empty($id1)){$id1=0; }
				
		$sqlp = "SELECT * FROM productos p, productos_idiomas pi, atributos a, productos_atributos_valores pav, atributos_valores av, productos_atributos pa
				WHERE p.id_producto = pi.id_producto AND 
					pa.id_producto  = p.id_producto AND
					pa.id_atributo  = a.id_atributo AND
					pav.id_atributo_valor=av.id_atributo_valor AND
					pav.id_producto_atributo=pa.id_producto_atributo AND			 
					pi.id_idioma=1 
				ORDER BY p.id_producto	";
									
		$queryp= new Consulta($sqlp);
		$nump=$queryp->NumeroRegistros(); ?>				
		<table align='center' bgcolor='#FFFFFF' id='reporte' width="96%" >	
			<tr>
				<td class='subtitulo'> Producto </td>
				<td class='subtitulo'> Opcion </td>
				<td class='subtitulo'> Valor </td>
				<td class='subtitulo'> Stock </td>
				<td class='subtitulo'> Acción </td>
			</tr><?php 
		$x=0;
		$z=0;
		while ($row = mysql_fetch_array($queryp->Consulta_ID)){
		if($x==0){ $class="class=reg1"; $color="#F2EFE3";}else{ $class="class=reg2"; $color="#E2DCC2";}?>	
			<tr <?php echo $class?> onMouseOver=this.style.background='#FFCC99' onMouseOut=this.style.background='<?php echo $color?>' >
				<td align="left"   class='celda'> <img src="imgs/ps.gif" /> <?php echo $row['nombre_producto']?></td>
				<td align="right"  class='celda'> <?php echo $row['nombre_atributo']?> </td>
				<td align="right"  class='celda'> <?php echo $row['valor_atributo_valor']?> </td>
				<td align="center" class='celda'> <?php echo $row['stock_producto_atributo_valor']?> </td>
				<td align="center"><?php 
			if($_SESSION['session'][4]=="SI"){ ?>			
				<!--<a href='opciones.php?id=<?php echo $row['id_producto_atributo_valor']?>&opcion=edit') title="Editar Opcion" ><img src="imgs/b_edit.png" border="0" /></a>		-->	
				<a href='opciones.php?id=<?php echo $row['id_producto_atributo_valor']?>&opcion=delete&idp=<?php echo $row['id_producto'] ?>' onclick="return validar_delete()" title="Eliminar Opcion"><img src="../aplication/webroot/imgs/icons/x_delete.png" border="0"  /></a> <?				
			} 
			echo "</td></tr>"; 								
			if($x==0){$x++;}else{$x=0;}
			$z++;
		}?>
		</table><?php 	
	}
}

?>