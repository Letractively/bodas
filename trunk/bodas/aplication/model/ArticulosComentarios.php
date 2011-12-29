<?php
	class ArticulosComentarios extends Utilitarios{

		public function cabecera(){
			$obj = new Articulo($_SESSION['id_articulo']);
			?>
            <script type="text/javascript" src="<?php echo _js_?>articuloComentario.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de comentarios de <b><?php echo $obj->titulo; ?></b></div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="articuloComentario.php?opcion=listar"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}

		public function listar(){
			$sql = "
				SELECT 
				  id_articulo_comentario,
				  comentario,
				  fecha
				FROM 
					articulos_comentarios
				WHERE
					id_articulo = ".$_SESSION['id_articulo']."
				ORDER BY id_articulo_comentario DESC
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
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="articuloComentario.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
							<?php echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
            
            <div class="itm"><a href="articulo.php">Regresar</a></div>
            
			<?php	
		}

		public function eliminar($id){
			if($id > 0){

				$Query = new Consulta("DELETE FROM articulos_comentarios WHERE id_articulo_comentario = ".$id."");

				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}

		
	}
?>