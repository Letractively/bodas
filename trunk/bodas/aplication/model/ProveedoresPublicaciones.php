<?php
	class ProveedoresPublicaciones extends Utilitarios{

		public function cabecera(){
			$objProveedor = new Proveedor($_SESSION['id_proveedor']);
			?>
            <script type="text/javascript" src="<?php echo _js_?>Proveedor.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de publicaciones de <b><?php echo $objProveedor->nombre_proveedor; ?></b></div>
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
				  id_proveedor_publicacion,
				  texto_proveedor_publicacion,
				  fecha_proveedor_publicacion
				FROM 
					proveedores_publicaciones
				WHERE
					id_proveedor = ".$_SESSION['id_proveedor']."
				ORDER BY id_proveedor_publicacion DESC
			";

			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Id</th>
                        <th>Texto</th>
                        <th>Fecha</th>
                        <th>Opc.</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                        while ($rw = mysql_fetch_array($qry->Consulta_ID)) {
                            ?>
                            <tr>
                            	<td><?php echo $rw[0]?></td>
                                <td><?php echo $rw[1]?></td>
                                <td><?php echo $rw[2]?></td>
                                <td align="center">
                                	<a href='ProveedorPublicacionComentario.php?id_proveedor_publicacion=<?php echo $rw[0]?>' title="Comentarios"><img src="<?php echo _icn_ ?>publicaciones.png"></a>
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

				$Query = new Consulta("DELETE FROM proveedores_publicaciones WHERE id_proveedor_publicacion = ".$id."");

				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}

		
	}
?>