<?php
	class VwUsuarioCliente{

		public function login(){
			if(isset($_POST['txtUsuario']) && $_POST['txtUsuario'] != ''){
				if(isset($_POST['txtPassword']) && $_POST['txtPassword'] != ''){
					$objUsuarioCliente = new UsuarioCliente();
					$res = $objUsuarioCliente->verificarUsuario( $_POST['txtUsuario'] ,$_POST['txtPassword'] );
					if($res != 0){
						$_SESSION['login_usuario_cliente'] = $res;
						?><script type="text/javascript">location.replace('<?=$_POST['url_actual']?>');</script><?php
					}else{
						$_SESSION['mensaje_error'] = 'Error en los datos';
						?><script type="text/javascript">location.replace('<?=$_POST['url_actual']?>');</script><?php
					}
				}
			}		
		}

		public function registrate(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="contenido-central-registrese">

						<div class="titulo">REGISTRATE</div>

                        <div class="izquierda">

                        	<div class="texto">
                            	<p><b>Beneficios</b></p>
                                <p>
                                	<ul>
                                    	<li><b>*</b> Conoce a otros novios.</li>
                                        <li><b>*</b> Sigue a tus proveedores.</li>
                                        <li><b>*</b> Comparte tus opiniones.</li>
                                        <li><b>*</b> Recibe actualizaciones.</li>
                                        <li><b>*</b> Publica un anuncio.</li>
                                    </ul>
                                </p>
                            </div>

                            <form id="frmRegistrese" name="frmRegistrese" method="post" action="<?=_bs_?>usuario/addusuario/" enctype="multipart/form-data">
                                <div class="formulario">
                                    <div class="itm"><label>* Foto:</label><input type="file" id="fleLogo" name="fleLogo"></div>
                                    <div class="itm"><label>* Nombre:</label><input type="text" id="txtNombre" name="txtNombre"></div>
                                    <div class="itm"><label>* Apellido:</label><input type="text" id="txtApellido" name="txtApellido"></div>
                                    <div class="itm"><label>* Email:</label><input type="text" id="txtCorreo" name="txtCorreo"></div>
                                    <div class="itm"><label>* Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono"></div>
                                    <div class="itm"><label>* Contrase&ntilde;a:</label><input type="password" id="txtPassword1" name="txtPassword1"></div>
                                    <div class="itm"><label>* Confirmas contrase&ntilde;a:</label><input type="password" id="txtPassword2" name="txtPassword2"></div>
                                    <div class="itm"><label>* Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp"></div>
                                    <div class="itm"><label>* Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja"></div>
                                    <div class="itm"><label>* Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp"></div>
                                    <div class="itm"><label>* Pa&iacute;s:</label><input type="text" id="txtPais" name="txtPais"></div>
                                    <div class="itm"><label>* Provincia:</label><input type="text" id="txtProvincia" name="txtProvincia"></div>
                                    <div class="itm"><label>* Distrito:</label><input type="text" id="txtDistrito" name="txtDistrito"></div>
                                    <div class="itm"><label class="advertencia">* Campos obligatorios</label></div>
                                    <div class="itm2"><input type="checkbox" id="chkBoletin" name="chkBoletin" checked="checked">Deseo recibir el boletin de bodas.</div>
                                    <div class="itm2"><input type="checkbox" id="chkCondiciones" name="chkCondiciones">Acepto los terminos y condiciones de privacidad del sitio.</div>
                                    <div class="itm"><label class="advertencia"><input type="submit" value="REGISTRARSE"></label></div>
                                </div>
                            </form>
                        
                        
                        </div>

                    </div>

                </div>
			<?php
		}


		public function agregar_usuario(){
			if($_FILES['fleLogo']['type'] == 'image/jpeg'){
				$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'usuarios_clientes');
			}else{ $img = "sin-imagen.jpg"; }
			
			$Query = new Consulta("INSERT INTO usuarios_clientes VALUES('',
				'1',
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
				'".$_POST['chkBoletin']."',
				'1',
				'1'
			)");

			$_SESSION['login_usuario_cliente'] = mysql_insert_id();
			?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
		}


		public function editar_cuenta(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="contenido-central-registrese">

                        <div class="izquierda">

                            <form id="frmRegistrese" name="frmRegistrese" method="post" action="<?=_bs_?>usuario/addusuario/" enctype="multipart/form-data">
                                <div class="formulario">
                                    <div class="itm"><label>* Foto:</label><input type="file" id="fleLogo" name="fleLogo"></div>
                                    <div class="itm"><label>* Nombre:</label><input type="text" id="txtNombre" name="txtNombre"></div>
                                    <div class="itm"><label>* Apellido:</label><input type="text" id="txtApellido" name="txtApellido"></div>
                                    <div class="itm"><label>* Email:</label><input type="text" id="txtCorreo" name="txtCorreo"></div>
                                    <div class="itm"><label>* Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono"></div>
                                    <div class="itm"><label>* Contrase&ntilde;a:</label><input type="password" id="txtPassword1" name="txtPassword1"></div>
                                    <div class="itm"><label>* Confirmas contrase&ntilde;a:</label><input type="password" id="txtPassword2" name="txtPassword2"></div>
                                    <div class="itm"><label>* Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp"></div>
                                    <div class="itm"><label>* Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja"></div>
                                    <div class="itm"><label>* Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp"></div>
                                    <div class="itm"><label>* Pa&iacute;s:</label><input type="text" id="txtPais" name="txtPais"></div>
                                    <div class="itm"><label>* Provincia:</label><input type="text" id="txtProvincia" name="txtProvincia"></div>
                                    <div class="itm"><label>* Distrito:</label><input type="text" id="txtDistrito" name="txtDistrito"></div>
                                    <div class="itm"><label class="advertencia">* Campos obligatorios</label></div>
                                    <div class="itm2"><input type="checkbox" id="chkBoletin" name="chkBoletin" checked="checked">Deseo recibir el boletin de bodas.</div>
                                    <div class="itm"><label class="advertencia"><input type="submit" value="REGISTRARSE"></label></div>
                                </div>
                            </form>
                        
                        
                        </div>

                    </div>

                </div>
			<?php
		}



		public function recordar(){
			if(isset($_POST['txtEmailRecuperar']) && $_POST['txtEmailRecuperar'] != ''){

				$mail = $_POST['txtEmailRecuperar'];

				$objUsuarioCliente = new UsuarioCliente();
				$res = $objUsuarioCliente->verificarEmailDeUsuario( $_POST['txtEmailRecuperar'] );
				if($res != 0){

					$titulo = "Recuperacion de contraseña";
					$msg = " 
						Estimado ".$res[0]['nombre_usuario_cliente']." ".$res[0]['apellido_usuario_cliente']." 
						A continuación le informo que por su solicitud le ha sido enviado sus datos de acceso: 		
						Usuario  :".$res[0]['email_usuario_cliente']."
						Clave : ".$res[0]['clave_usuario_cliente']."
					";
					$from = "from: soporte@bodas.com.pe";
					if(!mail($res[0]['email_usuario_cliente'], $titulo, $msg, $from)){
						$mensaje = "No se pudo enviar el email.";
					}else{
						$mensaje = "Enviado correctamente";
					}
				}else{
					$mensaje = "Usuario no registrado";
				}
			}
			?>
            <div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="contenido-central-registrese">

						<div class="titulo">RECUPERAR CONTRASE&Ntilde;A</div>

                        <div class="izquierda">

                            <form id="frmRecuperarClave" name="frmRecuperarClave" method="post" autocomplete="off">
                                <div class="formulario">
	                                <div class="itm">Ingresa tu email de registro:</div>
                                    <div class="itm"><label>Email</label><input type="text" id="txtEmailRecuperar" name="txtEmailRecuperar"></div>
                                    <div class="itm"><input type="submit" value="Enviar"></div>
                                    <div class="itm"><?php echo $mensaje ?></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			<?php
		}

		public function salir(){
			$_SESSION['login_usuario_cliente'] = '';
			session_destroy();
			?><script type="text/javascript">location.replace('<?=_bs_?>portada/');</script><?php
		}

	}
?>