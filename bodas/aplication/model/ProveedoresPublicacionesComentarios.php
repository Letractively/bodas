<?php
	class ProveedoresPublicacionesComentarios extends Utilitarios{

		public function cabecera(){
			$objProveedorPublicacion = new ProveedorPublicacion($_SESSION['id_proveedor_publicacion']);
			?>
            <script type="text/javascript" src="<?php echo _js_?>Proveedor.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de publicaciones de <b><?php echo $objProveedorPublicacion->texto_proveedor_publicacion; ?></b></div>
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
				  id_proveedor_publicacion_comentario,
				  comentario,
				  fecha
				FROM 
					proveedores_publicaciones_comentarios
				WHERE
					id_proveedor_publicacion = ".$_SESSION['id_proveedor_publicacion']."
				ORDER BY id_proveedor_publicacion_comentario DESC
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
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="ProveedorPublicacionComentario.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
							<?php echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
            
            <div class="itm"><a href="ProveedorPublicacion.php?id_proveedor=<?php echo $_SESSION['id_proveedor']?>">Regresar</a></div>
            
			<?php	
		}

		public function eliminar($id){
			if($id > 0){

				$Query = new Consulta("DELETE FROM proveedores_publicaciones_comentarios WHERE id_proveedor_publicacion_comentario = ".$id."");

				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}

		
	}
?>