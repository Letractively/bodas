<?php
	class ProveedoresRubros extends Utilitarios{

		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>ProveedorRubro.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de rubros del proveedor.</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="ProveedorRubro.php?opcion=listar"> Listar </a></li>
                        <li><a href="ProveedorRubro.php?opcion=nuevo"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}

		public function listar(){
			$sql = "SELECT id_proveedor_rubro, nombre_proveedor_rubro FROM proveedores_rubros ORDER BY id_proveedor_rubro DESC";
			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Id</th>
                        <th>Nombre</th>
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
                                <td align="center">
                                    <a href='ProveedorRubro.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="ProveedorRubro.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
							<?php echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
			<?php	
		}

		public function nuevo(){
			$objArticulo = new Articulo;
			$objArticuloTipo = new ArticuloTipo;
			
			$aryArticulos = $objArticulo->getArticuloXTipo(1);

			$aryArticulosTipos = $objArticuloTipo->getColeccionTipo();

			?>
                <form id="frmProveedorRubrosNuevo" name="frmProveedorRubrosNuevo" action="" method="post">
                	<h2>Nuevo rubro</h2>
                	<div class="itm"><label>Nombre: </label><input type="text" id="txtNombre" name="txtNombre" /></div>

                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0">Desactivado
                    </div>

					<div class="itm">
                    	<label>Tipo de articulo</label>
                        <select id="sleRubrosArticulos1" name="sleRubrosArticulos1">
                        	<?php for($x = 0 ; $x < count($aryArticulosTipos); $x++){ ?>
                            	<option 
                                <?php if($aryArticulosTipos[$x]['id'] == 1){ echo "selected='selected'";}?>
                                value="<?php echo $aryArticulosTipos[$x]['id']?>"><?php echo $aryArticulosTipos[$x]['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="itm">
                    	<label>Primera noticia relacionada: </label>
                        <select id="noticia1" name="noticia1">
                        	<?php for($x = 0 ; $x < count($aryArticulos); $x++){ ?>
                            	<option value="<?php echo $aryArticulos[$x]['id']?>"><?php echo $aryArticulos[$x]['titulo']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
					<div class="itm">
                    	<label>Tipo de articulo</label>
                        <select id="sleRubrosArticulos2" name="sleRubrosArticulos2">
                        	<?php for($x = 0 ; $x < count($aryArticulosTipos); $x++){ ?>
                            	<option 
                                <?php if($aryArticulosTipos[$x]['id'] == 1){ echo "selected='selected'";}?>
                                value="<?php echo $aryArticulosTipos[$x]['id']?>"><?php echo $aryArticulosTipos[$x]['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="itm">
                    	<label>Segunda noticia relacionada: </label>
                        <select id="noticia2" name="noticia2">
                        	<?php for($x = 0 ; $x < count($aryArticulos); $x++){ ?>
                            	<option value="<?php echo $aryArticulos[$x]['id']?>"><?php echo $aryArticulos[$x]['titulo']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="itm">
                        <input type="submit" id="ProveedorRubros_guardar_nuevo" value="Guardar y crear nuevo" />
                        <input type="submit" id="ProveedorRubros_guardar_listar" value="Guardar y listar" />
                      <input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="ProveedorRubro.php">Regresar</a></div>
                </form>
			<?php
		}

		public function agregar(){
			$Query = new Consulta("INSERT INTO proveedores_rubros VALUES('',
				'".$_POST['txtNombre']."',
				'".$_POST['rdoEstado']."'
			)");

			$id = mysql_insert_id();

			$Query = new Consulta("INSERT INTO rubros_articulos VALUES('',".$id.",".$_POST['noticia1'].")");
			$Query = new Consulta("INSERT INTO rubros_articulos VALUES('',".$id.",".$_POST['noticia2'].")");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
		}

		public function editar($id){

			$objProveedorRubro = new ProveedorRubro($id);

			$objRubrosArticulos = new RubrosArticulos;
			$aryArticulosSel = $objRubrosArticulos->obtenerArticulosXRubro($id);

			$objArticuloSeleccionado1 = new Articulo($aryArticulosSel[0]['id_articulo']);
			$objArticuloSeleccionado2 = new Articulo($aryArticulosSel[1]['id_articulo']);

			$objArticulo = new Articulo;

			if($objArticuloSeleccionado1->id_articulo_tipo != ''){
				$aryArticulos1 = $objArticulo->getArticuloXTipo($objArticuloSeleccionado1->id_articulo_tipo);
			}else{
				$aryArticulos1 = $objArticulo->getArticuloXTipo(1);	
			}

			if($objArticuloSeleccionado2->id_articulo_tipo != ''){
				$aryArticulos2 = $objArticulo->getArticuloXTipo($objArticuloSeleccionado2->id_articulo_tipo);
			}else{
				$aryArticulos2 = $objArticulo->getArticuloXTipo(1);	
			}

			$objArticulo = new Articulo();

			$objArticuloTipo = new ArticuloTipo;
			$aryArticulosTipos = $objArticuloTipo->getColeccionTipo();

			?>
                <form id="frmProveedorRubrosEdita" name="frmProveedorRubrosEdita" action="" method="post">
                    <h2>Editar rubro</h2>
                    <div class="itm"><label>Nombre(s): </label><input type="text" id="txtNombre" name="txtNombre" value="<?php echo $objProveedorRubro->nombre_proveedor_rubro; ?>" /></div>
                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0" <?php if($objProveedorRubro->estado_proveedor_rubro !=1){ echo "checked='checked'"; }?>>Desactivado
                    </div>

					<div class="itm">
                    	<label>Tipo de articulo</label>
                        <select id="sleRubrosArticulos1" name="sleRubrosArticulos1">
                        	<?php for($x = 0 ; $x < count($aryArticulosTipos); $x++){ ?>
                            	<option 
                                <?php if($aryArticulosTipos[$x]['id'] == $objArticuloSeleccionado1->id_articulo_tipo){ echo "selected='selected'";}?>
                                value="<?php echo $aryArticulosTipos[$x]['id']?>"><?php echo $aryArticulosTipos[$x]['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="itm">
                    	<label>Primera noticia relacionada: </label>
                        <select id="noticia1" name="noticia1">
                        	<?php for($x = 0 ; $x < count($aryArticulos1); $x++){ ?>
                            	<option value="<?php echo $aryArticulos1[$x]['id']?>"
                                <?php if($aryArticulosSel[0]['id_articulo'] == $aryArticulos1[$x]['id']){ echo "selected='selected'"; }?>
                                ><?php echo $aryArticulos1[$x]['titulo']?></option>
                            <?php } ?>
                        </select>
                    </div>

					<div class="itm">
                    	<label>Tipo de articulo</label>
                        <select id="sleRubrosArticulos2" name="sleRubrosArticulos2">
                        	<?php for($x = 0 ; $x < count($aryArticulosTipos); $x++){ ?>
                            	<option 
                                <?php if($aryArticulosTipos[$x]['id'] == $objArticuloSeleccionado2->id_articulo_tipo){ echo "selected='selected'";}?>
                                value="<?php echo $aryArticulosTipos[$x]['id']?>"><?php echo $aryArticulosTipos[$x]['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="itm">
                    	<label>Segunda noticia relacionada: </label>
                        <select id="noticia2" name="noticia2">
                        	<?php for($x = 0 ; $x < count($aryArticulos2); $x++){ ?>
                            	<option value="<?php echo $aryArticulos2[$x]['id']?>"
                                <?php if($aryArticulosSel[1]['id_articulo'] == $aryArticulos2[$x]['id']){ echo "selected='selected'"; }?>
                                ><?php echo $aryArticulos2[$x]['titulo']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="itm">
                        <input type="hidden" id="id_proveedor_rubro" value="<?php echo $objProveedorRubro->id_proveedor_rubro; ?>" />
                        <input type="submit" id="ProveedorRubros_editar_listar" value="Editar y listar" />
                        <input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="ProveedorRubro.php">Regresar</a></div>
                </form>
			<?php
		}

		public function actualizar($id){
			$Query = new Consulta(" UPDATE proveedores_rubros SET 
										nombre_proveedor_rubro = '".$_POST['txtNombre']."',
										estado_proveedor_rubro = '".$_POST['rdoEstado']."'
									WHERE id_proveedor_rubro = '".$id."'");

			$Query = new Consulta("DELETE FROM rubros_articulos WHERE id_rubro = ".$id."");
			$Query = new Consulta("INSERT INTO rubros_articulos VALUES('',".$id.",".$_POST['noticia2'].")");
			$Query = new Consulta("INSERT INTO rubros_articulos VALUES('',".$id.",".$_POST['noticia1'].")");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}

		public function eliminar($id){
			if($id > 0){
				$Query = new Consulta("DELETE FROM proveedores_rubros WHERE id_proveedor_rubro = ".$id."");
				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}

	}
?>