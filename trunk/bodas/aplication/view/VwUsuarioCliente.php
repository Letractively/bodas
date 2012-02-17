<?php
	class VwUsuarioCliente extends Utilitarios{


		public function login(){
			if(isset($_POST['txtUsuario']) && $_POST['txtUsuario'] != ''){
				if(isset($_POST['txtPassword']) && $_POST['txtPassword'] != ''){
					$objUsuarioCliente = new UsuarioCliente();
					$res = $objUsuarioCliente->verificarUsuario( $_POST['txtUsuario'] ,$_POST['txtPassword'] );
					if($res != 0){
						$_SESSION['login_usuario_cliente'] = $res;
						header("Location: ".$_POST['url_actual']);
					}else{
						$_SESSION['mensaje_error'] = 'Error en los datos';
						header("Location: ".$_POST['url_actual']);
					}
				}
			}		
		}


		public function registrate(){
			if(isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}
			$objDistrito = new Distrito;
			$aryDistritos = $objDistrito->obtenerDistritos();
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
                                    <div class="itm"><label>* Contraseña:</label><input type="password" id="txtPassword1" name="txtPassword1"></div>
                                    <div class="itm"><label>* Confirmas contraseña:</label><input type="password" id="txtPassword2" name="txtPassword2"></div>
                                    <div class="itm"><label>* Fecha de cumpleaños:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp" readonly="readonly"></div>
                                    <div class="itm"><label>* Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja"></div>
                                    <div class="itm"><label>* Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp2" readonly="readonly"></div>
                                    <div class="itm">
                                    	<label>* Distrito:</label>
                                    	<select id="sleDistritos" name="sleDistritos">
                                        	<?php for($x = 0 ; $x < count($aryDistritos) ; $x++){ ?>
                                       	  <option value="<?php echo $aryDistritos[$x]['id_distrito']?>"
                                          <?php if($aryDistritos[$x]['id_distrito'] == 16){ echo "selected='selected'";}?>
                                          ><?php echo utf8_encode($aryDistritos[$x]['nombre_distrito'])?></option>
                                            <?php }?>
                                        </select>
                                    </div>
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

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo'] != ''){
				$img = date('His').'_'.$_FILES['fleLogo']['name'];
				$fnImagen = 'aplication/webroot/imgs/usuarios_clientes/'.$img;
				move_uploaded_file($_FILES['fleLogo']['tmp_name'], $fnImagen);
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

			$_SESSION['login_usuario_cliente'] = mysql_insert_id();
			?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
		}


		public function editar_cuenta(){
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}

			$objUsuarioCliente = new UsuarioCliente($_SESSION['login_usuario_cliente']);

			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);
			$objProveedor = new Proveedor($id_proveedor[0]['id_proveedor']);

			$objDistrito = new Distrito;
			$aryDistritos = $objDistrito->obtenerDistritos();

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

					<?php if($objUsuarioCliente->id_tipo_cuenta == 1){ ?>
                        <div class="opciones-editarcuenta">
                            <a href="#" class="item" id="activo">Información de perfil</a>
                            <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> -->
                        </div>
					<?php }else{ ?>
                        <div class="opciones-editarcuenta">
                            <a href="<?=_bs_?>usuario/editar_cuenta/" class="item" id="activo">Información de usuario</a>
                            <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                            <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                            <a href="<?=_bs_?>usuario/listar_recomendados/" class="item">Recomendados</a>
                            <a href="<?=_bs_?>usuario/listar_red_social/" class="item">Redes sociales</a>
                            <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                            <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a>-->
                            <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                        </div>
                    <?php } ?>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

                            <form id="frmEditarCuenta" name="frmEditarCuenta" method="post" enctype="multipart/form-data" autocomplete='off' action="<?=_bs_?>usuario/updateusuario/">
                                <div class="formulario">
                                
                                	<div class="itm_subtit">Información basica</div>
                                
                                    <div class="itm"><label>Foto de usuario:</label><input type="file" id="fleLogo" name="fleLogo"></div>
                                    <div class="itm_subtit2">(Un peso de 150kb maximo y dimensiones de 55x55 pixeles.) </div>
                                    <div class="itm">
                                        <label style="color:#FFF;">.</label>
                                        <p style="color:#333; padding:2px 0px;">Previsualización de la imagen</p>
                                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objUsuarioCliente->foto_usuario_cliente."&w=55&h=55";?>" alt="<?php echo $objUsuarioCliente->nombre_usuario_cliente; ?>" align="left" /><p class="itm_subtit20">Esta imagen se mostrara en sus actualizaciones de estado y comentarios de articulos u otros perfiles.</p>
                                        <div class="itm_subtit2"><?php echo $objUsuarioCliente->foto_usuario_cliente; ?></div>
                                    </div>
                                    <div class="itm"><label>Nombre:</label><input type="text" id="txtNombre" name="txtNombre" value="<?php echo $objUsuarioCliente->nombre_usuario_cliente; ?>"></div>
                                    
                                    <?php if($objUsuarioCliente->id_tipo_cuenta == 1){?>
                                    	<div class="itm"><label>Apellido:</label><input type="text" id="txtApellido" name="txtApellido" value="<?php echo $objUsuarioCliente->apellido_usuario_cliente; ?>"></div>
                                    <?php } ?>
                                    
                                    <div class="itm"><label>Email:</label><input type="text" id="txtCorreo" name="txtCorreo" value="<?php echo $objUsuarioCliente->email_usuario_cliente; ?>"></div>
                                    <input type="hidden" id="correo_actual" name="correo_actual" value="<?php echo $objUsuarioCliente->email_usuario_cliente; ?>">
                                    
                                    <?php if($objUsuarioCliente->id_tipo_cuenta == 1){?>
                                    	<div class="itm"><label>Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono" value="<?php echo $objUsuarioCliente->telefono_usuario_cliente; ?>"></div>
                                    <?php } ?>
                                    
                                    <div class="itm_subtit">Cambiar contraseña</div>
                                    
                                    <div class="itm2">Si no desea cambiar la contraseña deje los campos en blanco</div>
                                    <div class="itm"><label>Nueva Contrase&ntilde;a:</label><input type="password" id="txtPassword1" name="txtPassword1"></div>
                                    <div class="itm"><label>Confirmas contrase&ntilde;a:</label><input type="password" id="txtPassword2" name="txtPassword2"></div>
                                    
                                    <?php if($objUsuarioCliente->id_tipo_cuenta == 1){?>
                                        <div class="itm"></div>
                                        <div class="itm"><label>Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple" class="dp"  value="<?php echo $objUsuarioCliente->fecha_cumple_usuario_cliente; ?>" readonly="readonly"></div>
                                        <div class="itm"><label>Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja" value="<?php echo $objUsuarioCliente->nombre_pareja_usuario_cliente; ?>"></div>
                                        <div class="itm"><label>Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp" value="<?php echo $objUsuarioCliente->fecha_boda_usuario_cliente; ?>" readonly="readonly"></div>
                                        <div class="itm">
                                            <label>* Distrito:</label>
                                            <select id="sleDistritos" name="sleDistritos">
                                                <?php for($x = 0 ; $x < count($aryDistritos) ; $x++){ ?>
                                              <option value="<?php echo $aryDistritos[$x]['id_distrito']?>"
                                              <?php if($aryDistritos[$x]['id_distrito'] == $objUsuarioCliente->id_distrito){ echo "selected='selected'";}?>
                                              ><?php echo utf8_encode($aryDistritos[$x]['nombre_distrito'])?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    <?php } ?>
                                    
                                    <div class="itm_subtit3">
                                    
                                    	<div class="itm">
                                        	<label>Boletín Bodas:</label>
                                            <input type="checkbox" id="chkBoletin" name="chkBoletin" <?php if($objUsuarioCliente->estado_boletin_usuario_cliente == 1){ echo "checked='checked'";}?>>
                                            <label class="texto_boletin">Deseo recibir el boletin de la Revista Bodas.</label>
                                        </div>

                                    </div>
                                    
                                    <div class="itm"><label class="advertencia"><input type="submit" value="Guardar Cambios"></label></div>
                                </div>
                            </form>
                        
                        
                        </div>

                    </div>

                </div>
			<?php
		}


		public function updateusuario(){

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
						$img = date('His').'_'.$_FILES['fleLogo']['name'];
						$logo = "foto_usuario_cliente = '".$img."',";
						$fnImagen = 'aplication/webroot/imgs/usuarios_clientes/'.$img;
						move_uploaded_file($_FILES['fleLogo']['tmp_name'], $fnImagen);
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
			
			$objUsuarioCliente = new UsuarioCliente($_SESSION['login_usuario_cliente']);
			
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>

					<?php if($objUsuarioCliente->id_tipo_cuenta == 1){ ?>
                        <div class="opciones-editarcuenta">
                            <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de perfil</a>
                            <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item" id="activo">FAQ's</a> -->
                        </div>
					<?php }else{ ?>
                        <div class="opciones-editarcuenta">
                            <a href="<?=_bs_?>usuario/editar_cuenta/" class="item" >Información de usuario</a>
                            <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                            <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                            <a href="<?=_bs_?>usuario/listar_recomendados/" class="item">Recomendados</a>
                            <a href="<?=_bs_?>usuario/listar_red_social/" class="item">Redes sociales</a>
                            <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                            <!--<a href="#" class="item" id="activo">FAQ's</a>-->
                            <div class="btn-verperfil">VER PERFIL</div>
                        </div>
                    <?php } ?>

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


		/* Espacio para informacion de empresas */
		public function editar_informacion_empresa(){
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}

			$objUsuarioCliente = new UsuarioCliente($_SESSION['login_usuario_cliente']);
			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);
			$objProveedor = new Proveedor($id_proveedor[0]['id_proveedor']);

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="opciones-editarcuenta">
                        <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de usuario</a>
                        <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item" id="activo">Informacion de la empresa</a>
                        <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                        <a href="<?=_bs_?>usuario/listar_recomendados/" class="item">Recomendados</a>
                        <a href="<?=_bs_?>usuario/listar_red_social/" class="item">Redes sociales</a>
                        <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                        <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> -->
                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                    </div>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

							<form id="frmEditarInformacionEmpresa" name="frmEditarInformacionEmpresa" method="post" enctype="multipart/form-data" autocomplete='off' action="<?=_bs_?>usuario/updateinformacionempresa/">
                                <div class="formulario">

									<div class="itm_subtit">Información de perfil</div>

                                    <div class="itm"><label>Nombre: </label><input type="text" id="txtNombre" name="txtNombre" value="<?php echo $objProveedor->nombre_proveedor; ?>" /></div>
                                    <div class="itm">
                                        <label>Logo o foto de perfil: </label>
                                        <input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                                    </div>
                                    <div class="itm_subtit2">Esta imagen debe tener un peso de hasta 150kb y dimensiones de 150x80 pixeles. </div>
                                    <div class="itm">
                                        <label>.</label>
                                        <p>Previsualización foto perfil</p>
                                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/proveedores/".$objProveedor->logo_proveedor."&w=150&h=80";?>" alt="<?php echo $objProveedor->nombre_proveedor; ?>"/>
                                        <div class="itm_subtit2"><?php echo $objProveedor->logo_proveedor; ?></div>
                                    </div>
                                    
                                    
                                    <div class="itm">
                                        <label>Descripción corta: </label>
                                        <textarea id="txtDescripcionCorta" name="txtDescripcionCorta"><?php echo $objProveedor->descripcion1_proveedor; ?></textarea>
                                    </div>
                                    <div class="itm_subtit2">Esta descripción se mostrará en el listado de proveedores.</div>
                                    
                                    
                                    <div class="itm">
                                        <label>Descripción larga: </label>
                                        <textarea id="txtDescripcionLarga" name="txtDescripcionLarga"><?php echo $objProveedor->descripcion2_proveedor; ?></textarea>
                                    </div>
                                    <div class="itm_subtit2">Esta descripción se mostrará en el perfil de la empresa.</div>
                                    
                                    <div class="itm"><label>Dirección: </label><input type="text" id="txtDireccion" name="txtDireccion" value="<?php echo $objProveedor->direccion_proveedor; ?>"/></div>
                                    <div class="itm"><label>Teléfono 1: </label><input type="text" id="txtTelefono1" name="txtTelefono1" value="<?php echo $objProveedor->telefono1_proveedor; ?>"/></div>
                                    <div class="itm"><label>Teléfono 2: </label><input type="text" id="txtTelefono2" name="txtTelefono2" value="<?php echo $objProveedor->telefono2_proveedor; ?>"/></div>
                                    <div class="itm"><label>Teléfono 3: </label><input type="text" id="txtTelefono3" name="txtTelefono3" value="<?php echo $objProveedor->telefono3_proveedor; ?>"/></div>
                                    <div class="itm"><label>Teléfono 4: </label><input type="text" id="txtTelefono4" name="txtTelefono4" value="<?php echo $objProveedor->telefono4_proveedor; ?>"/></div>
                                    <div class="itm"><label>Email: </label><input type="text" id="txtEmail" name="txtEmail" value="<?php echo $objProveedor->email_proveedor; ?>"/></div>
                                    <div class="itm"><label>Web: </label><input type="text" id="txtWeb" name="txtWeb" value="<?php echo $objProveedor->web_proveedor; ?>"/></div>
                                    
                                    
                                    
                                    
                                    <div class="itm">
                                    	<label>Mapa 1: </label>
                                        <textarea id="txtMapa1" name="txtMapa1"><?php echo $objProveedor->mapa_codigo1; ?></textarea>
                                    </div>
                                    <div class="itm_subtit2">Ingrese codigo HTML de Google Maps</div>
                                    
                                    <div class="itm">
                                        <label>Imagen de mapa 1: </label>
                                        <input type="file" id="fleMapa1" name="fleMapa1" accept="image/jpeg"/><?php echo $objProveedor->mapa_imagen1 ?>
                                    </div>
                                    <div class="itm_subtit2">Dimensiones sugeridas 300 x 300 pixeles.</div>
                                    
                                    <div class="itm">
                                    	<label>Estado de mapa 1: </label>
                                        <input type="radio" id="rdoEstMap1" name="rdoEstMap1" value="1" checked="checked"> <span>Mapa</span> | <input type="radio" id="rdoEstMap1" name="rdoEstMap1" value="0" <?php if($objProveedor->mapa_estado1 == 0){ echo "checked = 'checked'";  } ?>> <span>Imagen</span>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="itm">
                                    	<label>Mapa 2: </label>
                                        <textarea id="txtMapa2" name="txtMapa2"><?php echo $objProveedor->mapa_codigo2; ?></textarea>
                                    </div>
                                    <div class="itm_subtit2">Ingrese codigo HTML de Google Maps</div>
                                    
                                    <div class="itm">
                                        <label>Estado de mapa 1: </label>
                                        <input type="file" id="fleMapa2" name="fleMapa2" accept="image/jpeg"/><?php echo $objProveedor->mapa_imagen2 ?>
                                    </div>
                                    <div class="itm_subtit2">Dimensiones sugeridas 300 x 300 pixeles.</div>
                                    
                                    <div class="itm">
                                    	<label>Mapa estado 2: </label>
                                        <input type="radio" id="rdoEstMap2" name="rdoEstMap2" value="1" checked="checked"> <span>Mapa</span> | <input type="radio" id="rdoEstMap2" name="rdoEstMap2" value="0" <?php if($objProveedor->mapa_estado2 == 0){ echo "checked = 'checked'";  } ?>> <span>Imagen</span>
                                    </div>




                                    <input type="hidden" id="id_proveedor" name="id_proveedor" value="<?php echo $objProveedor->id_proveedor; ?>">
                                    <div class="itm"><label class="advertencia"><input type="submit" value="Guardar Cambios"></label></div>
                        		</div>
                            </form>
                        
                        </div>

                    </div>

                </div>
			<?php
		}

		public function updateinformacionempresa(){

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
				$img = date('His').'_'.$_FILES['fleLogo']['name'];
				$logo = "logo_proveedor = '".$img."',";
				$fnImagen = 'aplication/webroot/imgs/proveedores/'.$img;
				move_uploaded_file($_FILES['fleLogo']['tmp_name'], $fnImagen);
			}

			if(isset($_FILES['fleMapa1']) && $_FILES['fleMapa1']['name'] != ''){
				$img = date('His').'_'.$_FILES['fleMapa1']['name'];
				$mapa1 = "mapa_imagen1 = '".$img."',";
				$fnImagen = 'aplication/webroot/imgs/proveedores/'.$img;
				move_uploaded_file($_FILES['fleMapa1']['tmp_name'], $fnImagen);
			}
			
			if(isset($_FILES['fleMapa2']) && $_FILES['fleMapa2']['name'] != ''){
				$img = date('His').'_'.$_FILES['fleMapa2']['name'];
				$mapa2 = "mapa_imagen2 = '".$img."',";
				$fnImagen = 'aplication/webroot/imgs/proveedores/'.$img;
				move_uploaded_file($_FILES['fleMapa2']['tmp_name'], $fnImagen);
			}

			$sql = " UPDATE proveedores SET 
										nombre_proveedor = '".$_POST['txtNombre']."',
										".$logo."
										descripcion1_proveedor = '".$_POST['txtDescripcionCorta']."',
										descripcion2_proveedor = '".$_POST['txtDescripcionLarga']."',
										direccion_proveedor = '".$_POST['txtDireccion']."',
										telefono1_proveedor = '".$_POST['txtTelefono1']."',
										telefono2_proveedor = '".$_POST['txtTelefono2']."',
										telefono3_proveedor = '".$_POST['txtTelefono3']."',
										telefono4_proveedor = '".$_POST['txtTelefono4']."',
										email_proveedor = '".$_POST['txtEmail']."',
										web_proveedor = '".$_POST['txtWeb']."',
										
										".$mapa1."
										mapa_codigo1 = '".$_POST['txtMapa1']."',
										mapa_estado1 = '".$_POST['rdoEstMap1']."',
										
										".$mapa2."
										mapa_codigo2 = '".$_POST['txtMapa2']."',
										mapa_estado2 = '".$_POST['rdoEstMap2']."'
										
									WHERE id_proveedor = '".$_POST['id_proveedor']."'";

			$Query = new Consulta($sql);

			?><script type="text/javascript">location.replace('<?=_bs_?>/usuario/editar_informacion_empresa/');</script><?php
		}

		public function listar_recomendados(){
			$objUsuarioCliente = new UsuarioCliente;
			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);
			$objProveedorRecomendado = new ProveedorRecomendado;
			$aryRecomendados = $objProveedorRecomendado->obtenerProveedoresRecomendadosXProveedor($id_proveedor[0]['id_proveedor']);
			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="opciones-editarcuenta">
                        <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de usuario</a>
                        <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                        <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                        <a href="<?=_bs_?>usuario/listar_recomendados/" class="item" id="activo">Recomendados</a>
                        <a href="<?=_bs_?>usuario/listar_red_social/" class="item">Redes sociales</a>
                        <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                        <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> -->
                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                    </div>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

							<div class="itm_subtit">Recomendados</div>

							<div class="itm_subtit2">Podemos crear recomendados serán vinculos a otros catalogos o webs amigas y se mostrarán en nuestro perfil. Debemos ingresar la URL y la imagen con dimensiones recomendadas de 54x54 pixeles.</div>

                        	<a class="lnk_crear" href="<?=_bs_?>usuario/nuevo_recomendado/">Crear recomendado</a>

                            <table class='tabla-recomendados' cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>Link</th>
                                        <th>Imagen</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($x = 0 ; $x < count($aryRecomendados) ; $x++){
                                            ?>
                                            <tr>
                                                <td><a href="<?php echo $aryRecomendados[$x]['link_proveedor_recomendado']?>" target="_blank"><?php echo $aryRecomendados[$x]['link_proveedor_recomendado']?></a></td>
                                                <td align="center"><a href="<?php echo $aryRecomendados[$x]['link_proveedor_recomendado']?>" target="_blank"><img src="<?php echo _tt_."src=/aplication/webroot/imgs/proveedores_recomendados/".$aryRecomendados[$x]['imagen_proveedor_recomendado']."&w=30";?>" /></a></td>
                                                <td align="center">
                                                    <a title="Eliminar" class="eliminar" id="<?php echo $aryRecomendados[$x]['id_proveedor_recomendado']?>" name="eliminar_recomendado"><img src="<?php echo _icn_ ?>x_delete.png"></a>
                                            	</td><?php
                                        }
                                    ?>
                                </tbody>
                            </table>

						</div>
                    </div>
                </div>
			<?php
		}
		
		public function nuevo_recomendado(){
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}
			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="opciones-editarcuenta">
                        <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de usuario</a>
                        <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                        <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                        <a href="<?=_bs_?>usuario/listar_recomendados/" class="item" id="activo">Recomendados</a>
                        <a href="<?=_bs_?>usuario/listar_red_social/" class="item">Redes sociales</a>
                        <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                        <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> -->
                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                    </div>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

                            <form id="frmNuevoRecomendado" name="frmNuevoRecomendado" method="post" enctype="multipart/form-data" autocomplete='off' action="<?=_bs_?>usuario/guardar_recomendado/">
                                <div class="formulario">
                                    <div class="itm"><label>Foto (max 150 KB. ):</label><input type="file" id="fleLogo" name="fleLogo"></div>
                                    <div class="itm"><label>Link: </label><input type="text" id="txtLink" name="txtLink" /></div>
                                    
                                    <div class="itm"><label class="advertencia"><input type="submit" value="GUARDAR"></label></div>
                                </div>
                            </form>
                        
                        
                        </div>

                    </div>

                </div>
			<?php
		}
		
		public function guardar_recomendado(){

			$objUsuarioCliente = new UsuarioCliente;
			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo'] != ''){
				$img = date('His').'_'.$_FILES['fleLogo']['name'];
				$fnImagen = 'aplication/webroot/imgs/proveedores_recomendados/'.$img;
				move_uploaded_file($_FILES['fleLogo']['tmp_name'], $fnImagen);
			}else{ $img = "sin-imagen.jpg"; }

			if($_POST['chkBoletin'] == 'on'){ $bol = 1; }else{ $bol = 0; }

			$Query = new Consulta("INSERT INTO proveedores_recomendados VALUES('',
				'".$id_proveedor[0]['id_proveedor']."',				
				'".$img."',
				'".$_POST['txtLink']."',
				'1'
			)");

			?><script type="text/javascript">location.replace('<?=_bs_?>/usuario/listar_recomendados/');</script><?php
		}

		public function listar_red_social(){
			$objUsuarioCliente = new UsuarioCliente;
			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);
			$objProveedorRed = new ProveedorRed;
			$aryRedesSociales = $objProveedorRed->obtenerRedesXProveedor($id_proveedor[0]['id_proveedor']);
			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="opciones-editarcuenta">
                        <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de usuario</a>
                        <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                        <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                        <a href="<?=_bs_?>usuario/listar_recomendados/" class="item">Recomendados</a>
                        <a href="<?=_bs_?>usuario/listar_red_social/" class="item" id="activo">Redes sociales</a>
                        <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                        <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> -->
                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                    </div>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

							<div class="itm_subtit">Redes Sociales</div>

							<div class="itm_subtit2">Ingresa tus cuentas de Facebook, Twitter, Youtube, Vimeo, Serán accesos directos en tu perfil principal.</div>

                        	<a class="lnk_crear" href="<?=_bs_?>usuario/nuevo_red_social/">Agregar nueva red</a>

                            <table class='tabla-recomendados' cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>Red</th>
                                        <th>Link</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($x = 0 ; $x < count($aryRedesSociales) ; $x++){
                                            ?>
                                            <tr>
                                                <td align="center"><a href="<?php echo $aryRedesSociales[$x]['link_proveedor_red_social']?>" target="_blank"><img src="<?php echo _tt_."src=/aplication/webroot/imgs/".$aryRedesSociales[$x]['imagen_red_social']."&w=30";?>" /></a></td>
                                                <td><a href="<?php echo $aryRedesSociales[$x]['link_proveedor_red_social']?>" target="_blank"><?php echo $aryRedesSociales[$x]['link_proveedor_red_social']?></a></td>
                                                <td align="center">
                                                    <a title="Eliminar" class="eliminar" id="<?php echo $aryRedesSociales[$x]['id_proveedor_red_social']?>" name="eliminar_red_social"><img src="<?php echo _icn_ ?>x_delete.png"></a>
                                            	</td><?php
                                        }
                                    ?>
                                </tbody>
                            </table>

						</div>
                    </div>
                </div>
			<?php
		}

		public function nuevo_red_social(){
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}
			
			$objRedSocial = new RedSocial;
			$aryRedesSociales = $objRedSocial->obtenerRedesSociales();
			
			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="opciones-editarcuenta">
                        <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de usuario</a>
                        <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                        <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                        <a href="<?=_bs_?>usuario/listar_recomendados/" class="item">Recomendados</a>
                        <a href="<?=_bs_?>usuario/listar_red_social/" class="item" id="activo">Redes sociales</a>
                        <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                        <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> -->
                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                    </div>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

                            <form id="frmNuevoRedSocial" name="frmNuevoRedSocial" method="post" enctype="multipart/form-data" autocomplete='off' action="<?=_bs_?>usuario/guardar_red_social/">
                                <div class="formulario">
                                    <div class="itm">
                                        <label>Red social: </label>
                                        <select id="selRedSocial" name="selRedSocial">
                                            <?php for($x = 0 ; $x < count($aryRedesSociales) ; $x++){?>
                                                <option value="<?php echo $aryRedesSociales[$x]['id_red_social'] ?>"><?php echo $aryRedesSociales[$x]['nombre_red_social'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="itm"><label>Link: </label><input type="text" id="txtLink" name="txtLink" /></div>
                                                    
                                    <div class="itm"><label class="advertencia"><input type="submit" value="GUARDAR"></label></div>
                                </div>
                            </form>
                        
                        
                        </div>

                    </div>

                </div>
			<?php
		}
		
		public function guardar_red_social(){

			$objUsuarioCliente = new UsuarioCliente;
			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);

			$Query = new Consulta("INSERT INTO proveedores_redes_sociales VALUES('',
				'".$id_proveedor[0]['id_proveedor']."',
				'".$_POST['selRedSocial']."',
				'".$_POST['txtLink']."',
				'1'
			)");

			?><script type="text/javascript">location.replace('<?=_bs_?>/usuario/listar_red_social/');</script><?php
		}

		public function galeria_proveedor(){

			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}

			$objUsuarioCliente = new UsuarioCliente;
			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);

			$objGaleria = new ProveedorGaleria;
			$aryFotos = $objGaleria->getGaleriaXProveedor($id_proveedor[0]['id_proveedor']);

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="opciones-editarcuenta">
                        <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de usuario</a>
                        <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                        <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item" id="activo">Galeria</a>
                        <a href="<?=_bs_?>usuario/listar_recomendados/" class="item">Recomendados</a>
                        <a href="<?=_bs_?>usuario/listar_red_social/" class="item">Redes sociales</a>
                        <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item">Estadisticas</a> 
                        <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a> -->
                        
                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                    </div>

                    <div class="contenido-central-editarcuenta">

                        <div class="izquierda">

							<div class="itm_subtit">Galeria de fotos</div>

							<div class="itm_subtit2">Las imagenes para la galeria no deben sobrepasar los 250kb de peso. Dimensiones recomendadas 504 x 306 pixeles.</div>

                            <div class="itm">
                                <label>Elegir imagenes: </label>
                                <div class="swfupload-proveedor-imagenes">
                                    <input type="button" id="upload_button" />
                                    <input type="hidden" id="nombre_archivo" name="nombre_archivo" class="input file" readonly>
                                <ol class="log"></ol>
                            </div>
                            </div>


                            <div class="cont_imagenes">
                                <div class="eliminar_imagen"></div>
                                <?php for($x=0 ; $x < count($aryFotos) ; $x++){ ?>
                                    <div id="foto_<?php echo $aryFotos[$x]['id_proveedor_imagen'] ?>" nom_foto="<?php echo $aryFotos[$x]['imagen_proveedor_imagen']; ?>" class="item_img">
                                        <div class="eliminar_imagen" title="<?php echo $aryFotos[$x]['id_proveedor_imagen'] ?>" >Eliminar imagen X</div>
                                        <div class="nombre"><img src="<?=_tt_."src=../aplication/webroot/imgs/proveedores_fotos/".$aryFotos[$x]['imagen_proveedor_imagen']."&w=80&h=80";?>"></div>
                                    </div>
                                <?php } ?>
                            </div>

                            <input type="hidden" id="id_proveedor" name="id_proveedor" value="<?php echo $id_proveedor[0]['id_proveedor'] ?>">
                        </div>
                    </div>
                </div>
			<?php			
		}

		public function resumen_estadisticas(){
			if(!isset($_SESSION['login_usuario_cliente'])){
				?><script type="text/javascript">location.replace('<?=_bs_?>/');</script><?php
			}

			$objUsuarioCliente = new UsuarioCliente($_SESSION['login_usuario_cliente']);

			$id_proveedor = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);
			$objProveedor = new Proveedor($id_proveedor[0]['id_proveedor']);
			
			$objUsuarioClienteMeGusta = new UsuarioClienteMeGusta;
			$objUsuarioClientePublicacion = new UsuarioClientePublicacion;

			$arySeguidores = $objUsuarioClienteMeGusta->obtenerSeguidoresSinLimit($id_proveedor[0]['id_proveedor']);
			
			$aryListaSeguidores = $objUsuarioClienteMeGusta->obtenerListaSeguidores($id_proveedor[0]['id_proveedor']);
			
			$arySeguidoresXPublicacion = $objUsuarioClientePublicacion->obtenerSeguidoresXPublicacionesSinLimit($id_proveedor[0]['id_proveedor']);

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

					<script type="text/javascript" src="<?php echo _js_?>hightcharts/highcharts.js"></script>
                    <script type="text/javascript" src="<?php echo _js_?>hightcharts/modules/exporting.js"></script>

                    <div class="opciones-editarcuenta">
                        <a href="<?=_bs_?>usuario/editar_cuenta/" class="item">Información de usuario</a>
                        <a href="<?=_bs_?>usuario/editar_informacion_empresa/" class="item">Informacion de la empresa</a>
                        <a href="<?=_bs_?>usuario/galeria_proveedor/" class="item">Galeria</a>
                        <a href="<?=_bs_?>usuario/listar_recomendados/" class="item">Recomendados</a>
                        <a href="<?=_bs_?>usuario/listar_red_social/" class="item">Redes sociales</a>
                        <a href="<?=_bs_?>usuario/resumen_estadisticas/" class="item" id="activo">Estadisticas</a> 
                        <!--<a href="<?=_bs_?>usuario/faqs_usuario_cliente/" class="item">FAQ's</a>-->

                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?=$id_proveedor[0]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($objProveedor->nombre_proveedor) ?>" target="_blank">VER PERFIL</a></div>
                    </div>

                    <div class="contenido-central-estadistica">

                        <div class="izquierda">

							<div class="lista-de-seguidores">
                            	<div class="titulo-lista">Lista de seguidores</div>
                                
								<?php for($x = 0 ; $x < count($aryListaSeguidores) ; $x++){ ?>
                                    <div class="item-lista"><img src="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$aryListaSeguidores[$x]['foto_usuario_cliente']."&w=54&h=54";?>" alt="<?php echo $aryListaSeguidores[$x]['nombre_usuario_cliente']; ?>" title="<?php echo $aryListaSeguidores[$x]['nombre_usuario_cliente']; ?>"></div>
                                <?php } ?>
                            
                            </div>

							<div class="grafico-seguidores-diarios">
                            	<?php if(count($arySeguidores)){ ?>
									<script type="text/javascript">
								var chart;
								$(document).ready(function() {
									chart = new Highcharts.Chart({
										chart: {
											renderTo: 'container01',
											defaultSeriesType: 'line',
											marginRight: 130,
											marginBottom: 25
										},
										colors: [
											'#B16EC9'
										], 
										title: {
											text: 'Usuario que le dan "Me gusta" a su perfil',
											x: -20 //center
										},
										xAxis: {
											categories: [
												<?php 
													for($x = 0 ; $x < count($arySeguidores) ; $x++){ 
														echo "'".$arySeguidores[$x]['d_me_gusta']."-".$arySeguidores[$x]['m_me_gusta']."-".$arySeguidores[$x]['y_me_gusta']."'";
														if($x != count($arySeguidores)-1){ echo ","; }
													}
												?>
											]
										},
										yAxis: {
											title: {
												text: 'Cantidad de usuarios'
											},
											plotLines: [{
												value: 0,
												width: 1,
												color: '#B16EC9',
											}],
											tickInterval:1,
										},
										tooltip: {
											formatter: function() {
													return '<b>'+ this.series.name +'</b><br/>'+
													this.x +': '+ this.y;
											}
										},
										legend: {
											layout: 'vertical',
											align: 'right',
											verticalAlign: 'top',
											x: -10,
											y: 100,
											borderWidth: 0
										},
										series: [{
											name: 'Usuarios',
											data: [
												<?php 
													for($x = 0 ; $x < count($arySeguidores) ; $x++){ 
														echo $arySeguidores[$x]['num_usuarios'];
														if($x != count($arySeguidores)-1){ echo ","; }
													} 
												?>
											]
										}]
									});

								});
									
							</script>
                            		<div id="container01"></div>
                                <?php }else{ ?>
                                	<div class="mensaje-sin-seguidores">No tiene seguidores aun</div>
                                <?php } ?>
							</div>

                            <div class="grafico-seguidores-diarios">
                            	<?php if(count($arySeguidoresXPublicacion)){ ?>
									<script type="text/javascript">
								var chart;
								$(document).ready(function() {
									chart = new Highcharts.Chart({
										chart: {
											renderTo: 'container02',
											defaultSeriesType: 'line',
											marginRight: 130,
											marginBottom: 25
										},
										colors: [
											'#B16EC9'
										], 
										title: {
											text: 'Usuario que le dan "Me gusta" a sus publicaciones',
											x: -20 //center
										},
										xAxis: {
											categories: [
												<?php 
													for($x = 0 ; $x < count($arySeguidoresXPublicacion) ; $x++){ 
														echo "'".$arySeguidoresXPublicacion[$x]['d_me_gusta']."-".$arySeguidoresXPublicacion[$x]['m_me_gusta']."-".$arySeguidoresXPublicacion[$x]['y_me_gusta']."'";
														if($x != count($arySeguidoresXPublicacion)-1){ echo ","; }
													}
												?>
											]
										},
										yAxis: {
											title: {
												text: 'Cantidad de usuarios'
											},
											plotLines: [{
												value: 0,
												width: 1,
												color: '#B16EC9'
											}]
										},
										tickInterval:1,
										tooltip: {
											formatter: function() {
													return '<b>'+ this.series.name +'</b><br/>'+
													this.x +': '+ this.y;
											}
										},
										legend: {
											layout: 'vertical',
											align: 'right',
											verticalAlign: 'top',
											x: -10,
											y: 100,
											borderWidth: 0
										},
										series: [{
											name: 'Usuarios',
											data: [
												<?php 
													for($x = 0 ; $x < count($arySeguidoresXPublicacion) ; $x++){ 
														echo $arySeguidoresXPublicacion[$x]['num_usuarios'];
														if($x != count($arySeguidoresXPublicacion)-1){ echo ","; }
													} 
												?>
											]
										}]
									});

								});
									
							</script>
                            		<div id="container02"></div>
                                <?php }else{ ?>
                                	<div class="mensaje-sin-seguidores">No tiene seguidores aun</div>
                                <?php } ?>
							</div>

                        </div>

                    </div>
                </div>
            <?php
		}

	}
?>