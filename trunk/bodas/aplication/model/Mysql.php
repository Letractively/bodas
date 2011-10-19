<?

class Consulta{
	
	var $Consulta_ID = 0;
	var $Errno = 0;
	var $Error = "";

	public function Consulta($sql = ""){
		if ($sql == "") {
			$this->Error = "No ha especificado una consulta SQL";
			return 0;
		}

		$this->Consulta_ID = mysql_query($sql) or die("<div id='error'>".mysql_error()."<br><br> ".$sql."<div>");
		if (!$this->Consulta_ID) {
			$this->Errno = mysql_errno();
			$this->Error = mysql_error();
		}

		return $this->Consulta_ID;
	
	} 

	public function NumeroCampos() {
		return mysql_num_fields($this->Consulta_ID);
	}

	public function NuevoId() {
		return mysql_insert_id($this->Consulta_ID);
	}
	
	public function Nombretabla(){
		return mysql_field_table($this->Consulta_ID, 'name');
	}
	
	public function flagscampo($numcampo){
		return mysql_field_flags($this->Consulta_ID, $numcampo);
	}
	
	public function NumeroRegistros(){
		return mysql_num_rows($this->Consulta_ID);
	}

	public function nombrecampo($numcampo){
		return mysql_field_name($this->Consulta_ID, $numcampo);
	}
	
	public function tipocampo($numcampo){
		return mysql_field_type($this->Consulta_ID, $numcampo);
	}
	
	public function tamaniocampo($numcampo){
		return mysql_field_len($this->Consulta_ID, $numcampo);
	}

	public function VerRegistro(){
		return mysql_fetch_array($this->Consulta_ID);
	}

	public function VerListado($url="",$url_det="") {
		$colspan=$this->NumeroCampos();
		echo "<table border=0  id=reporte  cellspacing='1'>\n";	
		echo "<tr>";
		for ($i = 1; $i < $this->NumeroCampos(); $i++){
			echo "<td class=subtitulo><b>".str_replace("_"," ",$this->nombrecampo($i))."</b></td>\n";
		}
		echo "<td class=subtitulo>Opciones</td></tr>\n";
		$x=0;
		while ($row = mysql_fetch_row($this->Consulta_ID)) {
			$id=$row[0];
			$id1=$row[1];	
			echo "<tr "; if($x==0){ echo "class=reg1";}else{ echo "class=reg2";} echo "> \n";
			for ($i = 1; $i < $this->NumeroCampos(); $i++){
				echo "<td align=left class=celda>".$row[$i]."</td>\n";
			}
			echo "<td>"; 
			if($_SESSION['session'][4]=="SI" ){
				echo"<div id=opciones>
				<a href='#' onClick=mantenimiento('".$url."',".$id.",'edit') title=Editar > <img src='"._icons_."x_edit.png' border='0' /></a> 
				<a href='#' onClick=mantenimiento('".$url."',".$id.",'delete') title=Eliminar> <img src='"._icons_."x_delete.png' border='0' /></a>";
				if(!empty($url_det)){
					echo" <a href=# onClick=mantenimiento_det('".$url_det."',".$id.") title='Ver Detalle'><img src='"._icons_."x-detail.png' border='0' /></a></div>";
				}
			} 
			echo "</td></tr>";
			if($x==0){$x++;}else{$x=0;}
		}
		echo '</table>';
	}

	public function VerListadoCodigos($url="",$url_det="") {
		$colspan=$this->NumeroCampos();
		$objc = new Categoria($_SESSION['idt']);
		$objp = new Producto($_SESSION['idp']);
		
		echo "<table border=0  id=reporte  cellspacing='1'>\n
		<tr>
						<td style='text-align: left;' class='subtitulo' colspan=3>&nbsp;<a style='color:#eee; text-decoration: none;' href=tarjetas-telefonicas.php>Tarjetas Telefonicas</a> &raquo; <a href='tarjetas-telefonicas.php?idt=".$objc->getId()."' style='color:#eee; text-decoration: none;'>".$objc->getNombre()."</a> &raquo; <b style='color:#fff'>".$objp->getNombre()."</b> </td>
						
					</tr>
		";
		echo "<tr>";
		for ($i = 1; $i < $this->NumeroCampos(); $i++){
			echo "<td class=subtitulo><b>".str_replace("_"," ",$this->nombrecampo($i))."</b></td>\n";
		}
		echo "<td class=subtitulo>Opciones</td></tr>\n";
		$x=0;
		while ($row = mysql_fetch_row($this->Consulta_ID)) {
			$id=$row[0];
			$id1=$row[1];	
			echo "<tr "; if($x==0){ echo "class=reg1";}else{ echo "class=reg2";} echo "> \n";
			for ($i = 1; $i < $this->NumeroCampos(); $i++){
				if($row[$i] == 'Activo'){ $campo = "<font color='green'><b>".$row[$i]."</b></font>";}
				else if($row[$i] == 'Inactivo'){ $campo = "<font color='#ff0000'><b>".$row[$i]."</b></font>";}
				else{$campo = $row[$i];}
				
				echo "<td align=left class=celda>".$campo."</td>\n";
			}
			echo "<td>"; 
			if($_SESSION['session'][4]=="SI" ){
				echo"<div id=opciones>
				<a href='#' onClick=mantenimiento('".$url."',".$id.",'edit') title=Editar > <img src='"._icons_."x_edit.png' border='0' /></a> 
				<a href='#' onClick=mantenimiento('".$url."',".$id.",'delete') title=Eliminar><img src='"._icons_."x_delete.png' border='0' /></a>";
				if(!empty($url_det)){
					echo" <a href=# onClick=mantenimiento_det('".$url_det."',".$id.") title='Ver Detalle'>D</a></div>";
				}
				
			} 
			echo "</td></tr>";
			
			if($x==0){$x++;}else{$x=0;}
		}
		echo '</table>';
	}

	public function VerInforme() {
		$colspan=$this->NumeroCampos();
		echo "<table border=0  id=reporte  width='90%'>\n";	
		echo "<tr>";
		for ($i = 0; $i < $this->NumeroCampos(); $i++){
			echo "<td class=subtitulo><b>".ucwords(str_replace("_"," ",$this->nombrecampo($i)))."</b></td>\n";
		}	
		$x=0;
		while ($row = mysql_fetch_row($this->Consulta_ID)) {
			$id=$row[0];
			$id1=$row[1];	
			echo "<tr "; if($x==0){ echo "class=reg1";}else{ echo "class=reg2";} echo "> \n";
			for ($i = 0; $i < $this->NumeroCampos(); $i++){
				echo "<td align=left class=celda>".$row[$i]."</td>\n";
			}		
			echo "</tr>";
			
			if($x==0){$x++;}else{$x=0;}
		}
		echo '</table>';
	}

	public function Crud($opcion, $url='', $array_embed=''){
		$row = mysql_fetch_row($this->Consulta_ID);
		$table = $this->nombretabla();
		if($opcion=="edit"){ $action="update"; $input="Actualizar"; }
		else if($opcion=="new"){ $action="add"; $input="Guardar"; }  ?>
		<script type="text/javascript"> <?php
		if($opcion=="edit"){ ?>
			function load_imgs(){<?php
				for ($i = 1; $i < $this->NumeroCampos(); $i++){							
					if($this->tamaniocampo($i)==71){ ?> document.<?php echo $table.".".$this->nombrecampo($i)?>.value="<?php echo $row[$i]?>"; <?php }
				}	?>			   				
			} <?php
		} ?>
			function valida_<?php echo $table?>(){ <?php
				for ($i = 1; $i < $this->NumeroCampos(); $i++){
					$name = $this->nombrecampo($i);
					$flags= $this->flagscampo($i);
					$type = $this->tipocampo($i);
					$len  = $this->tamaniocampo($i);		
					$validar=explode(' ', $flags);
					//echo "validar= '".$validar[0]."'";
					
					
					
					if($validar[0]=="not_null"){
						if($len==71 && $opcion!="edit"){ ?>					
							if(document.<?php echo $table.".".$name?>.value==""){
								alert('ERROR: El campo <?php echo str_replace("_"," ",$name)?> debe llenarse');
								document.<?php echo $table.".".$name?>.focus();
								return false;
							}						
						 <?php
						 }
					}
					
					if($len==71){ $enctype="enctype=\"multipart/form-data\""; }
				} ?>
					document.<?php echo $table?>.action="<?php echo $url?>?opcion=<?php echo $action?>&id=<?php echo $row[0]?>";
					document.<?php echo $table?>.submit();
			}			
		</script>  <?php			
		echo "
			<form name='".$table."' method='post' action='' ".$enctype." > \n 
			<table border=0  id='reporte' align='center' cellspacing='1' cellpadding='1' > \n 
			
				<tr  class='subtitulo'>
					<td class='subtitulo' > ".ucfirst($opcion)." Registro </td>
					<td class='subtitulo' align='right' > 
						<input type='reset' name='cancelar' value='Cancelar' class='button' >  
						<input type='button' name='actualizar' value='".$input."' onclick='return valida_".$table."()' class='button'>
					</td> \n 
				</tr>\n";	
		for ($i = 1; $i < $this->NumeroCampos(); $i++){
			$name = $this->nombrecampo($i);
			$type = $this->tipocampo($i);
			$len  = $this->tamaniocampo($i);
			if($opcion=="edit"){ $r=$row[$i]; }else{ $r=""; }
			//echo $type;
								
			echo "<tr>
					<td class='cuerporight' align='right'><b>".ucwords(str_replace("_"," ",$this->nombrecampo($i)))."</b>  </td>\n
					<td class='cuerpoleft' align='left'>";
			if(is_array($array_embed) && array_key_exists($i, $array_embed)){
				echo $array_embed[$i];			
			}else{	
				switch($type){					
					case 'int':
						if($len == 1){							
							echo " <input type='radio' name='".$name."' value=1 "; 
									if($r==1 && $r!=0){ echo "checked='checked'"; } echo"> SI &nbsp; &nbsp; ";
							echo " <input type='radio' name='".$name."' value=0 ";
									if($r==0 && $r!=1){ echo "checked='checked'"; } echo"> NO ";
						}else{
						echo "<input type='text' name='".$name."'  size='22'  value='".$r."' onKeyPress='return validnum(event)' >";
						}
						
					break;
					case 'real':
						echo "<input type='text' name='".$name."' value='".$r."' size=20  onKeyPress='return validnum(event)' >";
					break;
					case 'string':
						if($len==71){
							//if($opcion=="edit"){ echo "<input type='hidden' name='$name1' value='".$r."'";}
							echo "<input type='file' name='".$name."' value='".$r."' size=34 ><br><div align='left'><img src='../aplication/webroot/imgs/home/".$r."' width='310' height='150' /></div>";
						}else{
							echo "<input type='text' name='".$name."' value='".$r."' size=50 class='input'>";
						}
						
					break;
					case 'blob':
						echo "<textarea name='".$name."' cols=70 style='height:140px' class='input'> ".$r."</textarea> ";
					break;
					case 'date':
						if(!empty($r)){ $r=formato_slash("-",$r);}
						echo '<input type="text" name="'.$name.'" value="'.$r.'" 
						 readonly="true" size="10" > <input type="button" name="lanzador$name" id="lanzador'.$name.'" value="..."/>
						 
						 <script type="text/javascript"> 
							Calendar.setup({ 
							inputField : "'.$name.'",     
							ifFormat  : "%d/%m/%Y",   
							button    : "lanzador'.$name.'" 
							});		
						</script> ';
					break;									
				}		
			}		
			echo "</td>\n
			</tr> \n";
			}			
		
		echo "<tr>
				<td class='cuerpocenter' colspan='2' align='center'> <br> 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				
				<br><br></td>
			</tr> ";
		echo '</table>';			
	}
	
	public function CrudCodigos($opcion, $url='', $array_embed=''){
		$objc = new Categoria($_SESSION['idt']);
		$objp = new Producto($_SESSION['idp']);
		$row = mysql_fetch_row($this->Consulta_ID);
		$table = $this->nombretabla();
		if($opcion=="edit"){ $action="update"; $input="Actualizar"; }
		else if($opcion=="new"){ $action="add"; $input="Guardar"; }  ?>
		<script type="text/javascript"> <?php
		if($opcion=="edit"){ ?>
			function load_imgs(){<?php
				for ($i = 1; $i < $this->NumeroCampos(); $i++){							
					if($this->tamaniocampo($i)==71){ ?> document.<?php echo $table.".".$this->nombrecampo($i)?>.value="<?php echo $row[$i]?>"; <?php }
				}	?>			   				
			} <?php
		} ?>
			function valida_<?php echo $table?>(){ <?php
				for ($i = 1; $i < $this->NumeroCampos(); $i++){
					$name = $this->nombrecampo($i);
					$flags= $this->flagscampo($i);
					$type = $this->tipocampo($i);
					$len  = $this->tamaniocampo($i);		
					$validar=explode(' ', $flags);
					//echo "validar= '".$validar[0]."'";
					
					
					
					if($validar[0]=="not_null"){
						if($len==71 && $opcion!="edit"){ ?>					
							if(document.<?php echo $table.".".$name?>.value==""){
								alert('ERROR: El campo <?php echo str_replace("_"," ",$name)?> debe llenarse');
								document.<?php echo $table.".".$name?>.focus();
								return false;
							}						
						 <?php
						 }
					}
					
					if($len==71){ $enctype="enctype=\"multipart/form-data\""; }
				} ?>
					document.<?php echo $table?>.action="<?php echo $url?>?opcion=<?php echo $action?>&id=<?php echo $row[0]?>";
					document.<?php echo $table?>.submit();
			}			
		</script>  <?php			
		echo "
			<form name='".$table."' method='post' action='' ".$enctype." > \n 
			<table border=0  id='reporte' align='center' cellspacing='1' cellpadding='1' > \n 
			<tr>
						<td style='text-align: left;' class='subtitulo' colspan=2>&nbsp;<a style='color:#eee; text-decoration: none;' href=tarjetas-telefonicas.php>Tarjetas Telefonicas</a> &raquo; <a href='tarjetas-telefonicas.php?idt=".$objc->getId()."' style='color:#eee; text-decoration: none;'>".$objc->getNombre()."</a> &raquo; <b style='color:#fff'>".$objp->getNombre()."</b> </td>
						
					</tr>
		
				<tr  class='subtitulo'>
					<td class='subtitulo' > ".ucfirst($opcion)." Registro </td>
					<td class='subtitulo' align='right' > 
						<input type='reset' name='cancelar' value='Cancelar' class='button' >  
						<input type='button' name='actualizar' value='".$input."' onclick='return valida_".$table."()' class='button'>
					</td> \n 
				</tr>\n";	
		for ($i = 1; $i < $this->NumeroCampos(); $i++){
			$name = $this->nombrecampo($i);
			$type = $this->tipocampo($i);
			$len  = $this->tamaniocampo($i);
			if($opcion=="edit"){ $r=$row[$i]; }else{ $r=""; }
			//echo $type;
								
			echo "<tr>
					<td class='cuerporight' align='right'><b>".ucwords(str_replace("_"," ",$this->nombrecampo($i)))."</b>  </td>\n
					<td class='cuerpoleft' align='left'>";
			if(is_array($array_embed) && array_key_exists($i, $array_embed)){
				echo $array_embed[$i];			
			}else{	
				switch($type){					
					case 'int':
						if($len == 1){							
							echo " <input type='radio' name='".$name."' value=1 "; 
									if($r==1 && $r!=0){ echo "checked='checked'"; } echo"> SI &nbsp; &nbsp; ";
							echo " <input type='radio' name='".$name."' value=0 ";
									if($r==0 && $r!=1){ echo "checked='checked'"; } echo"> NO ";
						}else{
						echo "<input type='text' name='".$name."'  size='12'  value='".$r."' onKeyPress='return validnum(event)' >";
						}
						
					break;
					case 'real':
						echo "<input type='text' name='".$name."' value='".$r."' size=50  onKeyPress='return validnum(event)' >";
					break;
					case 'string':
						if($len==71){
							//if($opcion=="edit"){ echo "<input type='hidden' name='$name1' value='".$r."'";}
							echo "<input type='file' name='".$name."' value='".$r."' size=34 ><br><div align='left'><img src='../aplication/webroot/imgs/catalogo/".$r."' width='210' height='200' /></div>";
						}else{
							echo "<input type='text' name='".$name."' value='".$r."' size=50 class='input'>";
						}
						
					break;
					case 'blob':
						echo "<textarea name='".$name."' cols=70 style='height:140px' class='input'> ".$r."</textarea> ";
					break;
					case 'date':
						if(!empty($r)){ $r=formato_slash("-",$r);}
						echo '<input type="text" name="'.$name.'" value="'.$r.'" 
						 readonly="true" size="10" > <input type="button" name="lanzador$name" id="lanzador'.$name.'" value="..."/>
						 
						 <script type="text/javascript"> 
							Calendar.setup({ 
							inputField : "'.$name.'",     
							ifFormat  : "%d/%m/%Y",   
							button    : "lanzador'.$name.'" 
							});		
						</script> ';
					break;									
				}		
			}		
			echo "</td>\n
			</tr> \n";
			}			
		
		echo "<tr>
				<td class='cuerpocenter' colspan='2' align='center'> <br> 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				
				<br><br></td>
			</tr> ";
		echo '</table>';			
	}

}
?>
