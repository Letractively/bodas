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
					uc.email_usuario_cliente
				FROM 
					usuarios_clientes uc
				ORDER BY uc.id_usuario_cliente DESC
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
			?>
			<form id="frmUsuarioNuevo" name="frmUsuarioNuevo" action="" method="post">

				<h2>Nuevo usuario</h2>

				<div class="itm"><label>Nombre(s): </label><input type="text" id="txtNombre" name="txtNombre" /></div>
                <div class="itm">
                    <label>Foto: </label>
                    <div class="file_upload swfupload-usuarioCliente">
                        <input type="button" id="upload_button" class="file"/>
                        <input type="text" id="campo_archivo" name="campo_archivo" readonly>
                    </div>
                </div>
				<div class="itm"><label>Correo: </label><input type="text" id="txtCorreo" name="txtCorreo" /></div>
				<div class="itm"><label>Contraseña: </label><input type="password" id="txtPassword1" name="txtPassword1" /></div>
				<div class="itm"><label>Ingrese de nuevo la contraseña: </label><input type="password" id="txtPassword2" name="txtPassword2" /></div>
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
                    <select id="selProveedores" name="sleProveedores" size="10">
                    	<?php for($x = 0 ; $x < count($aryProveedores) ; $x++){ ?>
                    	<option value="<?php echo $aryProveedores[$x]['id_proveedor']?>" <?php if($x == 0){ echo 'selected="selected"'; }?>><?php echo $aryProveedores[$x]['nombre_proveedor']?></option>
                        <?php } ?>
                    </select>
                </div>
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
			$Query = new Consulta("INSERT INTO usuarios_clientes VALUES('',
				'1',
				'".$_POST['txtNombre']."',
				'".$_POST['campo_archivo']."',
				'".$_POST['txtCorreo']."',
				'".$_POST['txtPassword2']."',
				'".date('Y-m-d h:i:s')."',
				'1',
				'1'
			)");

			if(isset($_POST['rdoAdmin']) && $_POST['rdoAdmin'] == 1){

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
			?>
                <form id="frmUsuarioEditar" name="frmUsuarioEditar" action="" method="post">
                	<h2>Editar Usuario</h2>

                	<div class="itm"><label>Nombre(s): </label><input type="text" id="txtNombre" name="txtNombre" value="<?php echo $objUsuarioCliente->nombre_usuario_cliente; ?>" /></div>

                    <div class="itm">
                        <label>Foto: </label>
                        <div class="file_upload swfupload-usuarioCliente">
                            <input type="button" id="upload_button" class="file"/>
                            <input type="text" id="campo_archivo" name="campo_archivo" readonly>
                        </div>
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

                    <div class="itm"><label>Contraseña: </label><input type="password" id="txtPassword1" name="txtPassword1" /></div>

                    <div class="itm"><label>Ingrese de nuevo la contraseña: </label><input type="password" id="txtPassword2" name="txtPassword2" /></div>

                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0" <?php if($objUsuarioCliente->estado_cuenta_usuario_cliente == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

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
			if(isset($_POST['campo_archivo']) && $_POST['campo_archivo'] != ''){
					$logo = "foto_usuario_cliente = '".$_POST['campo_archivo']."',";
			}
			
			$sqlUpdate = " UPDATE usuarios_clientes SET 
										nombre_usuario_cliente = '".$_POST['txtNombre']."',
										".$logo."
										email_usuario_cliente = '".$_POST['txtCorreo']."',
										estado_cuenta_usuario_cliente = '".$_POST['rdoEstado']."'
									WHERE id_usuario_cliente = '".$id."'";
			
			$Query = new Consulta($sqlUpdate);

			if(isset($_POST['txtPassword1']) && $_POST['txtPassword1'] != ''){
				if(isset($_POST['txtPassword2']) && $_POST['txtPassword2'] != ''){
					$Query = new Consulta(" UPDATE usuarios_clientes SET clave_usuario_cliente = '".$_POST['txtPassword1']."' WHERE id_usuario_cliente = ".$id);
				}
			}

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


		public function eliminar($id){
			if($id > 0){
				$objUsuarioCliente = new UsuarioCliente($id);
				unlink('../aplication/webroot/imgs/usuarios_clientes/'.$objUsuarioCliente->foto_usuario_cliente);
				$Query = new Consulta("DELETE FROM usuarios_clientes WHERE id_usuario_cliente = ".$id."");
				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}


	}
?>