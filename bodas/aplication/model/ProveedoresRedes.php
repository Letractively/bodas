<?php
	class ProveedoresRedes extends Utilitarios{


		public function cabecera(){
			$objProveedor = new Proveedor($_SESSION['id_proveedor']);
			?>
            <script type="text/javascript" src="<?php echo _js_?>ProveedorRedes.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de redes del proveedor <b><?php echo $objProveedor->nombre_proveedor; ?></b></div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="ProveedorRed.php?opcion=listar"> Listar </a></li>
                        <li><a href="ProveedorRed.php?opcion=nuevo"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){

			$sql = "
				SELECT 
					prs.id_proveedor_red_social,
					rs.nombre_red_social,
					rs.imagen_red_social,
					prs.link_proveedor_red_social
				FROM 
					proveedores_redes_sociales prs
					JOIN redes_sociales rs ON prs.id_red_social = rs.id_red_social
				WHERE
					prs.id_proveedor = ".$_SESSION['id_proveedor']."
				ORDER BY prs.id_proveedor_red_social DESC
			";

			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Id</th>
                        <th>Nombre</th>
                        <th>Red</th>
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
                                <td><?php echo $rw[1]?></td>
                                <td><img src="<?php echo _img_.$rw[2]?>" /></td>
                                <td><a href="<?php echo $rw[3]?>" target="_blank"><?php echo $rw[3]?></a></td>
                                <td align="center">
                                    <a href='ProveedorRed.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="ProveedorRed.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
							<?php echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
			<?php	
		}


		public function nuevo(){
			$objRedSocial = new RedSocial;
			$aryRedesSociales = $objRedSocial->obtenerRedesSociales();
			?>
                <form id="frmProveedorRedNuevo" name="frmProveedorRedNuevo" action="" method="post">
                	<h2>Nuevo enlace a red social</h2>

                    <div class="itm">
                    	<label>Red social: </label>
                        <select id="selRedSocial" name="selRedSocial">
                        	<?php for($x = 0 ; $x < count($aryRedesSociales) ; $x++){?>
                        		<option value="<?php echo $aryRedesSociales[$x]['id_red_social'] ?>"><?php echo $aryRedesSociales[$x]['nombre_red_social'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                	<div class="itm"><label>Link: </label><input type="text" id="txtLink" name="txtLink" /></div>

                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0">Desactivado
                    </div>
                    
                    <div class="itm">
                        <input type="submit" id="ProveedorRed_guardar_nuevo" value="Guardar y crear nuevo" />
                        <input type="submit" id="ProveedorRed_guardar_listar" value="Guardar y listar" />
                      <input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="ProveedorRed.php">Regresar</a></div>
                </form>
			<?php
		}


		public function agregar(){
			$Query = new Consulta("INSERT INTO proveedores_redes_sociales VALUES('',
				'".$_SESSION['id_proveedor']."',
				'".$_POST['selRedSocial']."',
				'".$_POST['txtLink']."',
				'".$_POST['rdoEstado']."'
			)");
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
		}


		public function editar($id){
			
			$objProveedorRed = new ProveedorRed($id);
			
			$objRedSocial = new RedSocial;
			$aryRedesSociales = $objRedSocial->obtenerRedesSociales();
			?>
                <form id="frmProveedorRedEdita" name="frmProveedorRedEdita" action="" method="post">
                	<h2>Editar Proveedor</h2>

                    <div class="itm">
                    	<label>Rubro: </label>
                        <select id="selRedSocial" name="selRedSocial">
							<?php for($x = 0 ; $x < count($aryRedesSociales) ; $x++){?>
                        		<option value="<?php echo $aryRedesSociales[$x]['id_red_social'] ?>"
                                 <?php if( $objProveedorRed->id_red_social == $aryRedesSociales[$x]['id_red_social'] ){ echo 'selected="selected"'; } ?>
                                ><?php echo $aryRedesSociales[$x]['nombre_red_social'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                	<div class="itm"><label>Link: </label><input type="text" id="txtLink" name="txtLink" value="<?php echo $objProveedorRed->link_proveedor_red_social; ?>" /></div>

                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0" <?php if($objProveedorRed->estado_proveedores_red_social == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

                    <div class="itm">
                   		<input type="hidden" id="id_proveedor_red_social" value="<?php echo $id ?>" />
                        <input type="submit" id="ProveedorRed_editar_listar" value="Guardar y listar" />
                    	<input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="Proveedor.php">Regresar</a></div>
                </form>
			<?php
		}


		public function actualizar($id){

			$Query = new Consulta(" UPDATE proveedores_redes_sociales SET 
										id_red_social = '".$_POST['selRedSocial']."',
										link_proveedor_red_social = '".$_POST['txtLink']."',
										estado_proveedores_red_social = '".$_POST['rdoEstado']."'
									WHERE id_proveedor_red_social = '".$id."'");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


		public function eliminar($id){
			if($id > 0){
				/*	Finalmente eliminar el registro del proveedor	*/
				$Query = new Consulta("DELETE FROM proveedores_redes_sociales WHERE id_proveedor_red_social = ".$id."");
				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}


	}
?>