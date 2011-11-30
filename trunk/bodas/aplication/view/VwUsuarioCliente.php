<?php
	class VwUsuarioCliente extends Utilitarios{


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
			if(isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}
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
                                    <div class="itm"><label>* Foto (max 150 KB. ):</label><input type="file" id="fleLogo" name="fleLogo"></div>
                                    <div class="itm"><label>* Nombre:</label><input type="text" id="txtNombre" name="txtNombre"></div>
                                    <div class="itm"><label>* Apellido:</label><input type="text" id="txtApellido" name="txtApellido"></div>
                                    <div class="itm"><label>* Email:</label><input type="text" id="txtCorreo" name="txtCorreo"></div>
                                    <div class="itm"><label>* Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono"></div>
                                    <div class="itm"><label>* Contrase&ntilde;a:</label><input type="password" id="txtPassword1" name="txtPassword1"></div>
                                    <div class="itm"><label>* Confirmas contrase&ntilde;a:</label><input type="password" id="txtPassword2" name="txtPassword2"></div>
                                    <div class="itm"><label>* Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp" readonly="readonly"></div>
                                    <div class="itm"><label>* Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja"></div>
                                    <div class="itm"><label>* Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp" readonly="readonly"></div>
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
				if(isset($_FILES['fleLogo'])){
					$img = date('His').'_'.$_FILES['fleLogo']['name'];
					$fnImagen = 'aplication/webroot/imgs/usuarios_clientes/'.$img;
					move_uploaded_file($_FILES['fleLogo']['tmp_name'], $fnImagen);
				}
			}else{ $img = "sin-imagen.jpg"; }

			if($_POST['chkBoletin'] == 'on'){ $bol = 1; }else{ $bol = 0; }

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
				'".$bol."',
				'1',
				'1'
			)");

			$_SESSION['login_usuario_cliente'] = mysql_insert_id();
			?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
		}


		public function editar_cuenta(){
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}

			$objUsuarioCliente = new UsuarioCliente($_SESSION['login_usuario_cliente']);

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

					<?php if($objUsuarioCliente->id_tipo_cuenta == 1){ ?>
                        <div class="opciones-editarcuenta">
                            <a href="#" class="item" id="activo">Información de perfil</a>
                            <a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> 
                            <div class="btn-verperfil">VER PERFIL</div>
                        </div>
					<?php }else{ ?>
                        <div class="opciones-editarcuenta">
                            <a href="#" class="item" id="activo">Información del administrador</a>
                            <a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">Informacion de la empresa</a>
                            <a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">Galeria</a>
                            <a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">Recomendados</a>
                            <a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">Redes sociales</a>
                            <a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> 
                            <div class="btn-verperfil">VER PERFIL</div>
                        </div>
                    <?php } ?>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

                            <form id="frmEditarCuenta" name="frmEditarCuenta" method="post" enctype="multipart/form-data" autocomplete='off' action="<?=_bs_?>usuario/updateusuario/">
                                <div class="formulario">
                                    <div class="itm"><label>Foto (max 150 KB. ):</label><input type="file" id="fleLogo" name="fleLogo"></div>
                                    <div class="itm">
                                        <label>Foto actual: </label>
                                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objUsuarioCliente->foto_usuario_cliente."&w=70";?>" alt="<?php echo $objUsuarioCliente->nombre_usuario_cliente; ?>" />
                                        <?php echo $objUsuarioCliente->foto_usuario_cliente; ?>
                                    </div>
                                    <div class="itm"><label>Nombre:</label><input type="text" id="txtNombre" name="txtNombre" value="<?php echo $objUsuarioCliente->nombre_usuario_cliente; ?>"></div>
                                    <div class="itm"><label>Apellido:</label><input type="text" id="txtApellido" name="txtApellido" value="<?php echo $objUsuarioCliente->apellido_usuario_cliente; ?>"></div>
                                    <div class="itm"><label>Email:</label><input type="text" id="txtCorreo" name="txtCorreo" value="<?php echo $objUsuarioCliente->email_usuario_cliente; ?>"></div>
                                    <input type="hidden" id="correo_actual" name="correo_actual" value="<?php echo $objUsuarioCliente->email_usuario_cliente; ?>">
                                    <div class="itm"><label>Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono" value="<?php echo $objUsuarioCliente->telefono_usuario_cliente; ?>"></div>
                                    <div class="itm2">Si no desea cambiar la contraseña deje los campos en blanco</div>
                                    <div class="itm"><label>Contrase&ntilde;a:</label><input type="password" id="txtPassword1" name="txtPassword1"></div>
                                    <div class="itm"><label>Confirmas contrase&ntilde;a:</label><input type="password" id="txtPassword2" name="txtPassword2"></div>
                                    <div class="itm"></div>
                                    <div class="itm"><label>Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp"  value="<?php echo $objUsuarioCliente->fecha_cumple_usuario_cliente; ?>" readonly="readonly"></div>
                                    <div class="itm"><label>Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja" value="<?php echo $objUsuarioCliente->nombre_pareja_usuario_cliente; ?>"></div>
                                    <div class="itm"><label>Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp" value="<?php echo $objUsuarioCliente->fecha_boda_usuario_cliente; ?>" readonly="readonly"></div>
                                    <div class="itm"><label>Pa&iacute;s:</label><input type="text" id="txtPais" name="txtPais"></div>
                                    <div class="itm"><label>Provincia:</label><input type="text" id="txtProvincia" name="txtProvincia"></div>
                                    <div class="itm"><label>Distrito:</label><input type="text" id="txtDistrito" name="txtDistrito"></div>
                                    <div class="itm2"><input type="checkbox" id="chkBoletin" name="chkBoletin" <?php if($objUsuarioCliente->estado_boletin_usuario_cliente == 1){ echo "checked='checked'";}?>>Deseo recibir el boletin de bodas.</div>
                                    <div class="itm"><label class="advertencia"><input type="submit" value="REGISTRARSE"></label></div>
                                </div>
                            </form>
                        
                        
                        </div>

                    </div>

                </div>
			<?php
		}


		public function updateusuario(){

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
					$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'usuarios_clientes');
					$logo = "foto_usuario_cliente = '".$img."',";
			}

			if($_POST['chkBoletin'] == 'on'){ $bol = 1; }else{ $bol = 0; }

			$sqlUpdate = " UPDATE usuarios_clientes SET 
										nombre_usuario_cliente = '".$_POST['txtNombre']."',
										apellido_usuario_cliente = '".$_POST['txtApellido']."',
										".$logo."
										email_usuario_cliente = '".$_POST['txtCorreo']."',
										telefono_usuario_cliente = '".$_POST['txtTelefono']."',
										fecha_cumple_usuario_cliente = '".$_POST['txtFechaCumple']."',
										nombre_pareja_usuario_cliente = '".$_POST['txtNombrePareja']."',
										fecha_boda_usuario_cliente = '".$_POST['txtFechaBoda']."',
										estado_boletin_usuario_cliente = '".$bol."'
									WHERE id_usuario_cliente = '".$_SESSION['login_usuario_cliente']."'";

			$Query = new Consulta($sqlUpdate);

			if(isset($_POST['txtPassword1']) && $_POST['txtPassword1'] != ''){
				if(isset($_POST['txtPassword2']) && $_POST['txtPassword2'] != ''){
					$Query = new Consulta(" UPDATE usuarios_clientes SET clave_usuario_cliente = '".$_POST['txtPassword1']."' WHERE id_usuario_cliente = ".$_SESSION['login_usuario_cliente']);
				}
			}

			?><script type="text/javascript">location.replace('<?=_bs_?>/usuario/editar_cuenta/');</script><?php

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


		public function faqs_usuario_cliente(){
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>

					<div class="opciones-editarcuenta">
                    	<a href="<?=_bs_?>usuario/editar_cuenta/" class="item" >Información de perfil</a>
                        <a href="#" class="item" id="activo">FAQ's</a> 
                        <div class="btn-verperfil">VER PERFIL</div>
                    </div>

                    <div class="contenido-central-faqs">

                        <div class="izquierda">

                        	<p><b>Preguntas frecuentes</b></p>
                            
                            <ul>
                            	
                                <li><p><b>1)</b> Pregunta</p></li>
                            	<li>Respuesta</li>
                            	<li><p><b>2)</b> Pregunta</p></li>
                            	<li>Respuesta</li>
                                <li><p><b>3)</b> Pregunta</p></li>
                            	<li>Respuesta</li>
                                <li><p><b>4)</b> Pregunta</p></li>
                            	<li>Respuesta</li>
                                <li><p><b>5)</b> Pregunta</p></li>
                            	<li>Respuesta</li>
                                
                            </ul>
                        
                        </div>

                    </div>

                </div>
			<?php
		}


	}
?>