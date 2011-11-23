<?php
	class ProveedoresRecomendados extends Utilitarios{


		public function cabecera(){
			$objProveedor = new Proveedor($_SESSION['id_proveedor']);
			?>
            <script type="text/javascript" src="<?php echo _js_?>Proveedor.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de empresas recomendadas por <b><?php echo $objProveedor->nombre_proveedor; ?></b></div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="ProveedorPublicacion.php?opcion=listar"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){
			$sql = "
				SELECT 
				  id_proveedor_recomendado,
				  imagen_proveedor_recomendado,
				  link_proveedor_recomendado
				FROM 
					proveedores_recomendados
				WHERE
					id_proveedor = ".$_SESSION['id_proveedor']."
				ORDER BY id_proveedor_recomendado DESC
			";

			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Id</th>
                        <th>Imagen</th>
                        <th>Link</th>
                        <th>Opc.</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                        while ($rw = mysql_fetch_array($qry->Consulta_ID)) {
                            ?>
                            <tr>
                            	<td><?php echo $rw[0]?></td>
                                <td><img src="<?php echo _tt_."src=/aplication/webroot/imgs/proveedores_recomendados/".$rw[1]."&w=30";?>" /></td>
                                <td><a href="<?php echo $rw[2]?>" target="_blank"><?php echo $rw[2]?></a></td>
                                <td align="center">
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="ProveedorPublicacion.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
							<?php echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
            
            <div class="itm"><a href="Proveedor.php">Regresar</a></div>
            
			<?php	
		}


		public function eliminar($id){
			if($id > 0){

				$Query = new Consulta("DELETE FROM proveedores_recomendados WHERE id_proveedor_recomendado = ".$id."");

				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}


	}
?>