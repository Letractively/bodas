<?php
	class UsuariosClientes extends Utilitarios{


		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>UsuarioCliente.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de usuarios registrados.</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="UsuarioCliente.php?opcion=listar"> Listar </a></li>
                        <li><a href="UsuarioCliente.php?opcion=nuevo"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){
			$sql = "
				SELECT 
					uc.id_usuario_cliente,
					uc.nombre_usuario_cliente,
					uc.email_usuario_cliente,
					tc.nombre_tipo_cuenta
				FROM 
					usuarios_clientes uc
					JOIN tipos_cuentas tc ON uc.id_tipo_cuenta = tc.id_tipo_cuenta
				ORDER BY uc.id_tipo_cuenta DESC
			";

			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo de cuenta</th>
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
                                <td><?php echo $rw[3]?></td>
                                <td align="center">
                                    <a href='UsuarioCliente.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="UsuarioCliente.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
							<?php echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
			<?php	
		}


		public function nuevo(){
			$objProveedor = new Proveedor;
			$aryProveedores = $objProveedor->obtenerProveedoresDestacadoNormal();
			
			$objDistrito = new Distrito;
			$aryDistritos = $objDistrito->obtenerDistritos();
			
			?>
			<form id="frmUsuarioNuevo" name="frmUsuarioNuevo" action="" method="post" enctype="multipart/form-data">

				<h2>Nuevo usuario</h2>

				<div class="itm"><label>Nombre(s): </label><input type="text" id="txtNombre" name="txtNombre" /></div>
                <div class="itm"><label>Apellido(s):</label><input type="text" id="txtApellido" name="txtApellido"></div>
                <div class="itm">
                    	<label>Imagen: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>
				<div class="itm"><label>Correo: </label><input type="text" id="txtCorreo" name="txtCorreo" /></div>
				<div class="itm"><label>Contraseña: </label><input type="password" id="txtPassword1" name="txtPassword1" autocomplete="off" /></div>
				<div class="itm"><label>Ingrese de nuevo la contraseña: </label><input type="password" id="txtPassword2" name="txtPassword2" autocomplete="off" /></div>
				<div class="itm">
                    <label>Estado: </label>
                    <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                    <input type="radio" id="rdoEstado" name="rdoEstado" value="0">Desactivado
            	</div>
                <div class="itm">
                    <label>Administrador: </label>
                    <input type="radio" id="rdoAdmin" name="rdoAdmin" class="rdoAdmin" value="1">Si |
                    <input type="radio" id="rdoAdmin" name="rdoAdmin" class="rdoAdmin" value="0" checked="checked">No
            	</div>
                <div class="itm panel_admin_proveedor">
                	<label>Proveedor: </label>
                    <select id="selProveedores" name="selProveedores" size="10">
                    	<?php for($x = 0 ; $x < count($aryProveedores) ; $x++){ ?>
                    	<option value="<?php echo $aryProveedores[$x]['id_proveedor']?>" <?php if($x == 0){ echo 'selected="selected"'; }?>><?php echo $aryProveedores[$x]['nombre_proveedor']?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="itm"><br><h4>Datos de usuario normal</h4></div>
                
                <div class="itm">
                    <label>Distrito:</label>
                    <select id="sleDistritos" name="sleDistritos">
                        <?php for($x = 0 ; $x < count($aryDistritos) ; $x++){ ?>
                      <option value="<?php echo $aryDistritos[$x]['id_distrito']?>"
                      <?php if($aryDistritos[$x]['id_distrito'] == 16){ echo "selected='selected'";}?>
                      ><?php echo utf8_encode($aryDistritos[$x]['nombre_distrito'])?></option>
                        <?php }?>
                    </select>
                </div>
                
                <div class="itm"><label>Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono"></div>
             	<div class="itm"><label>Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp" readonly="readonly"></div>
                <div class="itm"><label>Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja"></div>
                <div class="itm"><label>Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp" readonly="readonly"></div>
                <div class="itm2"><label></label><input type="checkbox" id="chkBoletin" name="chkBoletin">Activar / Desactivar solicitud de boletin</div>

				<div class="itm">
					<input type="submit" id="usuario_guardar_nuevo" value="Guardar y crear nuevo" />
					<input type="submit" id="usuario_guardar_listar" value="Guardar y listar" />
				  <input type="reset" name="reset" value="Limpiar">
				</div>
				<div class="itm"><a href="usuarios.php">Regresar</a></div>
			</form>
			<?php		
		}


		public function agregar(){

			if($_FILES['fleLogo']['type'] == 'image/jpeg'){ $img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'usuarios_clientes');
			}else{ $img = "sin-imagen.jpg"; }

			if($_POST['chkBoletin'] == 'on'){ $bol = 1; }else{ $bol = 0; }

			$Query = new Consulta("INSERT INTO usuarios_clientes VALUES('',
				'1',
				'".$_POST['sleDistritos']."',
				'".$_POST['txtNombre']."',
				'".$_POST['txtApellido']."',				
				'".$img."',
				'".$_POST['txtCorreo']."',
				'".$_POST['txtPassword2']."',
				'".$_POST['txtTelefono']."',
				'".$_POST['txtFechaCumple']."',
				'".$_POST['txtNombrePareja']."',
				'".$_POST['txtFechaBoda']."',
				'".date('Y-m-d h:i:s')."',
				'".$bol."',
				'1',
				'1'
			)");

			if($_POST['rdoAdmin'] == 1){
				$id_new_usuario = mysql_insert_id();
				$Query = new Consulta("UPDATE usuarios_clientes SET id_tipo_cuenta = '2' 
					WHERE id_usuario_cliente = '".$id_new_usuario."'");
				$Query = new Consulta("INSERT INTO usuarios_clientes_proveedores VALUES('',
					".$id_new_usuario.",
					".$_POST['selProveedores']."
				)");
			}

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
		}


		public function editar($id){

			$objUsuarioCliente = new UsuarioCliente($id);

			if($objUsuarioCliente->id_tipo_cuenta == 2){
				$objUsuarioClienteProveedor = new UsuarioClienteProveedor;
				$aryAdminDeProveedor = $objUsuarioClienteProveedor->verificarRelacionClienteProveedor($id);
				$objProveedor = new Proveedor( $aryAdminDeProveedor[0]['id_proveedor'] );
			}

			$objNewProveedor = new Proveedor;
			$aryProveedores = $objNewProveedor->obtenerProveedoresDestacadoNormal();			

			$objDistrito = new Distrito;
			$aryDistritos = $objDistrito->obtenerDistritos();

			?>
                <form id="frmUsuarioEditar" name="frmUsuarioEditar" action="" method="post" enctype="multipart/form-data">
                	<h2>Editar Usuario</h2>

                	<div class="itm"><label>Nombre(s): </label><input type="text" id="txtNombre" name="txtNombre" value="<?php echo $objUsuarioCliente->nombre_usuario_cliente; ?>" /></div>
					<div class="itm"><label>Apellido(s):</label><input type="text" id="txtApellido" name="txtApellido" value="<?php echo $objUsuarioCliente->apellido_usuario_cliente; ?>" /></div>
                    <div class="itm">
                    	<label>Logo: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>

					<div class="itm">
                    	<label>Logo actual: </label>
                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objUsuarioCliente->foto_usuario_cliente."&w=170";?>" alt="<?php echo $objUsuarioCliente->nombre_usuario_cliente; ?>" />
                        <?php echo $objUsuarioCliente->foto_usuario_cliente; ?>
                    </div>

                    <div class="itm">
                    	<label>Correo: </label>
                    	<input type="text" id="txtCorreo" name="txtCorreo" value="<?php echo $objUsuarioCliente->email_usuario_cliente; ?>" />
                    	<input type="hidden" id="txtCorreo2" name="txtCorreo2" value="<?php echo $objUsuarioCliente->email_usuario_cliente; ?>" />
                    </div>

					<div class="itm"><br><div class="alert2"><img src="<?php echo _icn_?>alert.png">Si no desea cambiar la contraseña, solo deje los campos en blanco</div></div>

                    <div class="itm"><label>Contraseña: </label><input type="password" id="txtPassword1" name="txtPassword1" autocomplete="off" /></div>

                    <div class="itm"><label>Ingrese de nuevo la contraseña: </label><input type="password" id="txtPassword2" name="txtPassword2" autocomplete="off" /></div>

                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0" <?php if($objUsuarioCliente->estado_cuenta_usuario_cliente == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

					<input type="hidden" id="id_tipo_cuenta" name="id_tipo_cuenta" value="<?php echo $objUsuarioCliente->id_tipo_cuenta ?>">

					<?php if( $objUsuarioCliente->id_tipo_cuenta == 2 ){ ?>
                        <div class="itm">
                            <label>Administrador de </label>
                            <label class="resultado"><b><?php echo $objProveedor->nombre_proveedor; ?></b></label>
                        </div>

                        <div class="itm">
                            <label>Opciones: </label>
                            <div class="resultado">
                                <input type="radio" name="rdoAdmin" class="rdoAdmin" value="0" checked="checked">No hacer nada<br>
                                <input type="radio" name="rdoAdmin" class="rdoAdmin" value="1">Cambiar administracion<br>
                                <input type="radio" name="rdoAdmin" class="rdoAdmin" value="2">Quitar administracion<br>
                            </div>
                        </div>

                        <div class="itm panel_admin_proveedor">
                            <label>Proveedor: </label>
                            <select id="selProveedores" name="selProveedores" size="10">
                                <?php for($x = 0 ; $x < count($aryProveedores) ; $x++){ ?>
                                <option value="<?php echo $aryProveedores[$x]['id_proveedor']?>" <?php if($x == 0){ echo 'selected="selected"'; }?>><?php echo $aryProveedores[$x]['nombre_proveedor']?></option>
                                <?php } ?>
                            </select>
                        </div>                        
                        
					<?php }else{ ?>

                        <div class="itm">
                            <label>Administrador: </label>
                            <input type="radio" id="rdoAdmin" name="rdoAdmin" class="rdoAdmin" value="1">Si |
                            <input type="radio" id="rdoAdmin" name="rdoAdmin" class="rdoAdmin" value="0" checked="checked">No
                        </div>

                        <div class="itm panel_admin_proveedor">
                            <label>Proveedor: </label>
                            <select id="selProveedores" name="selProveedores" size="10">
                                <?php for($x = 0 ; $x < count($aryProveedores) ; $x++){ ?>
                                <option value="<?php echo $aryProveedores[$x]['id_proveedor']?>" <?php if($x == 0){ echo 'selected="selected"'; }?>><?php echo $aryProveedores[$x]['nombre_proveedor']?></option>
                                <?php } ?>
                            </select>
                        </div>

                    <?php } ?>

                    <div class="itm"><br><h4>Datos de usuario normal</h4></div>
                                    
                    <div class="itm">
                        <label>Distrito:</label>
                        <select id="sleDistritos" name="sleDistritos">
                            <?php for($x = 0 ; $x < count($aryDistritos) ; $x++){ ?>
                          <option value="<?php echo $aryDistritos[$x]['id_distrito']?>"
                          <?php if($aryDistritos[$x]['id_distrito'] == $objUsuarioCliente->id_distrito){ echo "selected='selected'";}?>
                          ><?php echo utf8_encode($aryDistritos[$x]['nombre_distrito'])?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="itm"><label>Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono" value="<?php echo $objUsuarioCliente->telefono_usuario_cliente; ?>"/></div>
                    <div class="itm"><label>Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp" readonly="readonly" value="<?php echo $objUsuarioCliente->fecha_cumple_usuario_cliente; ?>"/></div>
                    <div class="itm"><label>Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja" value="<?php echo $objUsuarioCliente->	nombre_pareja_usuario_cliente; ?>"/></div>
                    <div class="itm"><label>Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp" readonly="readonly" value="<?php echo $objUsuarioCliente->	fecha_boda_usuario_cliente; ?>"/></div>
                    <div class="itm2"><label></label><input type="checkbox" id="chkBoletin" name="chkBoletin" <?php if($objUsuarioCliente->estado_boletin_usuario_cliente == 1){ echo "checked='checked'";}?>>Activar / Desactivar solicitud de boletin</div>

                    <div class="itm">
                   		<input type="hidden" id="id_usuario" value="<?php echo $objUsuarioCliente->id_usuario_cliente; ?>" />
                        <input type="submit" id="usuario_editar_listar" value="Guardar y listar" />
                    	<input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="UsuarioCliente.php">Regresar</a></div>
                </form>
			<?php
		}


		public function actualizar($id){
			
			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
					$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'usuarios_clientes');
					$logo = "foto_usuario_cliente = '".$img."',";
			}

			if($_POST['chkBoletin'] == 'on'){ $bol = 1; }else{ $bol = 0; }

			$sqlUpdate = " UPDATE usuarios_clientes SET 
										nombre_usuario_cliente = '".$_POST['txtNombre']."',
										".$logo."
										email_usuario_cliente = '".$_POST['txtCorreo']."',
										estado_cuenta_usuario_cliente = '".$_POST['rdoEstado']."',
										telefono_usuario_cliente = '".$_POST['txtTelefono']."',
										fecha_cumple_usuario_cliente = '".$_POST['txtFechaCumple']."',
										nombre_pareja_usuario_cliente = '".$_POST['txtNombrePareja']."',
										fecha_boda_usuario_cliente = '".$_POST['txtFechaBoda']."',
										estado_boletin_usuario_cliente = '".$bol."'
									WHERE id_usuario_cliente = '".$id."'";

			$Query = new Consulta($sqlUpdate);

			if(isset($_POST['txtPassword1']) && $_POST['txtPassword1'] != ''){
				if(isset($_POST['txtPassword2']) && $_POST['txtPassword2'] != ''){
					$Query = new Consulta(" UPDATE usuarios_clientes SET clave_usuario_cliente = '".$_POST['txtPassword1']."' WHERE id_usuario_cliente = ".$id);
				}
			}

			/*	Si el tipo de la cuenta ya es de un administrador	*/
			if(isset($_POST['id_tipo_cuenta']) && $_POST['id_tipo_cuenta'] == 2){

				if($_POST['rdoAdmin'] == 1){
					/*	Si se cambia la administracion	*/
					$Query = new Consulta("DELETE FROM usuarios_clientes_proveedores WHERE id_usuario_cliente = ".$id."");
					$Query = new Consulta("INSERT INTO usuarios_clientes_proveedores VALUES('',
						".$id.",
						".$_POST['selProveedores']."
					)");
				}elseif($_POST['rdoAdmin'] == 2){
					/*	Si se quita la administracion	*/
					$Query = new Consulta("DELETE FROM usuarios_clientes_proveedores WHERE id_usuario_cliente = ".$id."");
					$Query = new Consulta("UPDATE usuarios_clientes SET id_tipo_cuenta = '1' 
						WHERE id_usuario_cliente = '".$id."'");
				}

			/*	Si es un usuario normal	*/
			}else{

				if($_POST['rdoAdmin'] == 1){
					$id_new_usuario = mysql_insert_id();
					$Query = new Consulta("UPDATE usuarios_clientes SET id_tipo_cuenta = '2' 
						WHERE id_usuario_cliente = '".$id."'");
					$Query = new Consulta("INSERT INTO usuarios_clientes_proveedores VALUES('',
						".$id.",
						".$_POST['selProveedores']."
					)");
				}

			}

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


		public function eliminar($id){
			if($id > 0){
				$objUsuarioCliente = new UsuarioCliente($id);
				if (file_exists('../aplication/webroot/imgs/usuarios_clientes/'.$objUsuarioCliente->foto_usuario_cliente)){ 
					unlink('../aplication/webroot/imgs/usuarios_clientes/'.$objUsuarioCliente->foto_usuario_cliente);
				}
				$Query = new Consulta("DELETE FROM usuarios_clientes WHERE id_usuario_cliente = ".$id."");
				$Query = new Consulta("DELETE FROM usuarios_clientes_proveedores WHERE id_usuario_cliente = ".$id."");
				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}


	}
?>