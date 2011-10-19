<?
class SeccionAdmin{

	function SeccionAdminCabezera(){ 
		?>
        
            <div id="menuSuperior">
                <div class="tit_pagina">Permisos</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="usuarios.php?opcion=list"> Listar </a></li>
                        <li><a href="usuarios.php?opcion=new"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
		<?php		
	}

	function SeccionAdminAdd($id, $_POST){
		if(!$_POST){
			echo "<div id=error>ERROR: No se pudo Agregar Usuario por falta de datos </div>";
		}else{
			$DelQuery=new Consulta($sql="DELETE FROM usuarios_paginas WHERE id_usuario=".$id."");
			for($j=0; $j<sizeof($_POST['seccion']);$j++){
				if($_POST['seccion'][$j]){
					$Query= new Consulta($sql = "INSERT INTO usuarios_paginas VALUES('".$id."' ,'".$_POST['seccion'][$j]."') ");
				}
			}
			echo "<div id=error> Se Modificaron los permisos correctamente. </div>";			
			Usuarios::UsuariosList();
		}
	}

	function SeccionAdminList($id=""){
		if(!$id){
			echo "<br><div id=error>ERROR: no se encontro ningun usuario con ese Id ó le falta Id  </div>";
		}else{
			$Query= new Consulta($sql = "SELECT id_pagina, nombre_pagina AS PAGINAS, url_pagina AS URL FROM paginas");
			?>
			<form name="f1" action="" method="post">		
                <table class='display' cellpadding="0" cellspacing="0" border="0">
                    <thead>
                		<tr>
						<?php for($i = 1; $i < $Query->NumeroCampos(); $i++){ ?>
                            <th><?php echo $Query->nombrecampo($i)?></th>
                        <? } ?>
                        <th>Activar</th>
                    	</tr>
                    </thead>
                    <tbody>
					<?
					$x=0;
					while($row = mysql_fetch_row($Query->Consulta_ID)){ 
					?>
						<tr>
						<?php for ($i = 1; $i < $Query->NumeroCampos(); $i++){ ?>
							<td><?php echo $row[$i]?></td>
						<?
							}
						$Query_SA = mysql_query("SELECT * FROM usuarios_paginas WHERE id_usuario=".$id." AND id_pagina=".$row[0]."");
						$NUM = mysql_num_rows($Query_SA);
						?>
						<td><input type="checkbox" name="seccion[]" value="<?php echo $row[0]?>" <?php if($NUM==1){ echo "checked"; }?>></td></tr><?
						if($x==0){$x++;}else{$x=0;} 
					}
					?>
                    <tbody>
                 </table>  
                 <table class='display'>
                    <tr>
                        <td>
                            <input type="submit" name="guardar" value="GUARDAR" onClick="void(document.f1.action='modulo_usuario.php?id1=<?php echo $id?>&opcion=add');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" name="cancelar" value="CANCELAR">
                        </td>
                    </tr>
				</table>
			</form>
			<?
		}
	}

}
?>