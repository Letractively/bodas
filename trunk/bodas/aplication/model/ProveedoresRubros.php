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
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
		}

		public function editar($id){
			$objProveedorRubro = new ProveedorRubro($id);
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