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


	function SeccionAdminList($id=""){
		if(!$id){
			?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error - ModuloUsuario.</div><?php
		}else{
			$Query= new Consulta($sql = "SELECT id_pagina, nombre_pagina AS Nombre, url_pagina AS url FROM paginas");
			?>
			<form name="f1" action="modulo_usuario.php?id=<?php echo $id?>&opcion=add" method="post">		
                <table class='reporte display'>
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
                            <td align="center"><input type="checkbox" name="seccion[]" value="<?php echo $row[0]?>" <?php if($NUM==1){ echo "checked"; }?>></td></tr><?
                            if($x==0){$x++;}else{$x=0;} 
                        }
                        ?>
                    <tbody>
                </table>  
				<div class="itm"><input type="submit" name="guardar" value="Guardar permisos" /></div>
			</form>
			<?
		}
	}


	function SeccionAdminAdd($id, $_POST){
		if(!$_POST){
			?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error - ModuloUsuario.</div><?php
		}else{
			$DelQuery=new Consulta("DELETE FROM usuarios_paginas WHERE id_usuario=".$id."");
			for($j=0; $j<sizeof($_POST['seccion']);$j++){
				if($_POST['seccion'][$j]){
					$Query= new Consulta("INSERT INTO usuarios_paginas VALUES('".$id."' ,'".$_POST['seccion'][$j]."') ");
				}
			}
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Se modificaron los permisos.</div><?php
		}
	}


}
?>