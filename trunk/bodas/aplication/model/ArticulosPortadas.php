<?php
	class ArticulosPortada extends Utilitarios{

		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>articulosPortada.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Articulos de portada</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="articulosPortada.php"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}

		public function listar(){
			$sql = "SELECT id_portada_articulo, nombre, titulo 
				FROM portadas_articulos pr LEFT JOIN
					articulos a ON pr.id_articulo = a.id_articulo
				ORDER BY pr.id_portada_articulo DESC";
			$qry = new Consulta($sql);
			$num = $qry->NumeroRegistros();
			?>
            <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Id</th>
                        <th>Nombre</th>
                        <th>Titulo</th>
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
                                    <a href='articulosPortada.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="articulosPortada.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
							<?php echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
			<?php	
		}

		public function editar($id){

			$objArticuloPortada = new ArticuloPortada($id);

			echo $objArticuloPortada->id_articulo_tipo;

			$objArticuloTipo = new ArticuloTipo;
			$aryTipos = $objArticuloTipo->getColeccionTipo();

			$objArticulo = new Articulo;
			$aryArticulos = $objArticulo->getArticuloXTipo($objArticuloPortada->id_articulo_tipo);

			?>
                <form id="frmEditar" name="frmEditar" action="articulosPortada.php?opcion=actualizar&id=<?php echo $objArticuloPortada->id; ?>" method="post">
                    <h2>Editar articulos de portada <b><?php echo $objArticuloPortada->nombre; ?></b></h2>

                        <div class="itm">
                            <label>Tipo de articulo: </label>
                            <select id="selArticuloTipo" name="selArticuloTipo">
                            <?php for($y = 0 ; $y < count($aryTipos); $y++){ ?>
                            	<option value="<?php echo $aryTipos[$y]['id']?>"
                                <?php if($aryTipos[$y]['id'] == $objArticuloPortada->id_articulo_tipo){ echo "selected='selected'"; } ?>
                                ><?php echo $aryTipos[$y]['nombre']?></option>
                            <?php } ?>
                            </select>
                        </div>
                        
                        <div class="itm">
                            <label>Articulo seleccionado: </label>
                            <select id="selArticulo" name="selArticulo">
                            <?php for($z = 0 ; $z < count($aryArticulos); $z++){ ?>
                            	<option value="<?php echo $aryArticulos[$z]['id']?>"
                                <?php if($aryArticulos[$z]['id'] == $objArticuloPortada->id_articulo){ echo "selected='selected'"; } ?>
                                ><?php echo $aryArticulos[$z]['titulo']?></option>
                            <?php } ?>
                            </select>
                        </div>

                    <div class="itm">
                        <input type="hidden" id="id_portada_articulo" value="<?php echo $objArticuloPortada->id; ?>" />
                        <input type="submit" id="ProveedorRubros_editar_listar" value="Editar y ver" />
                        <input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="articulosPortada.php">Regresar</a></div>
                </form>
			<?php
		}

		public function actualizar($id){
			$Query = new Consulta(" UPDATE portadas_articulos SET 
										id_articulo = '".$_POST['selArticulo']."'
									WHERE id_portada_articulo = '".$id."'");
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}

	}
?>