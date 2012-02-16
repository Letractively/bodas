<?php
	class VwCatalogo{

		public function __construct(){}

		public function vista(){
			$objProveedor = new Proveedor($_GET['id_proveedor']);
			$objProveedorRubro2 = new ProveedorRubro($objProveedor->id_proveedor_rubro);
			$objProveedorGaleria = new ProveedorGaleria;
			$aryImagenesXProveedor = $objProveedorGaleria->getGaleriaXProveedor($_GET['id_proveedor']);

			$objProveedorRed = new ProveedorRed;
			$aryRedesSocuales = $objProveedorRed->obtenerRedesXProveedor($_GET['id_proveedor']);

			$objProveedorRecomendado = new ProveedorRecomendado;
			$aryRecomendados = $objProveedorRecomendado->obtenerProveedoresRecomendadosXProveedor($_GET['id_proveedor']);
			if(isset($_SESSION['login_usuario_cliente'])){
				$objUsuarioCliente = new UsuarioCliente($_SESSION['login_usuario_cliente']);
				if($objUsuarioCliente->id_tipo_cuenta == 2){
					$id_proveedor_del_usuario = $objUsuarioCliente->obtenerProveedorXAdministrador($_SESSION['login_usuario_cliente']);
				}
			}

			$objProveedorPublicacion = new ProveedorPublicacion;
			$aryPosts = $objProveedorPublicacion->obtenerPublicacionesXProveedor($_GET['id_proveedor']);

			$aryPostsAntiguos = $objProveedorPublicacion->obtenerPublicacionesAntiguasXProveedor($_GET['id_proveedor']);

			$objProveedorPublicacionComentario = new ProveedorPublicacionComentario;

			$objUsuarioClienteMeGusta = new UsuarioClienteMeGusta;
			$objUsuarioClientePublicacion = new UsuarioClientePublicacion;

			$arySeguidores = $objUsuarioClienteMeGusta->obtenerSeguidores($_GET['id_proveedor']);
			

			$objUsuarioClienteProveedor = new UsuarioClienteProveedor;
			$aryAdmin = $objUsuarioClienteProveedor->obtenerUsuarioClienteAdministradorXProveedor($_GET['id_proveedor']);
			$objAdministrador = new UsuarioCliente($aryAdmin[0]['id_usuario_cliente']);

			?>

				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-catalogo">

						<div class="titulo">
							<span id="tit-pag"><?php echo mb_strtoupper($objProveedor->nombre_proveedor,'utf-8'); ?></span>
                            <div class="regresar"><a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro2->id_proveedor_rubro ?>/0/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro2->nombre_proveedor_rubro) ?>">&laquo; Regresar a <?php echo $objProveedorRubro2->nombre_proveedor_rubro; ?></a></div>
                        </div>

                        <div class="izquierda">

                        	<div class="contenedor_me_gusta">
                                <div class="item_me_gusta">
                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                    </div>
                                    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f04b6af30eeab4f"></script>
                                    <!-- AddThis Button END -->
                                </div>
                                <div class="item_me_gusta2">
                                    <?php if(isset($_SESSION['login_usuario_cliente'])){
											$bool = $objUsuarioClienteMeGusta->verificar_me_gusta($_SESSION['login_usuario_cliente'], $objProveedor->id_proveedor);
										?>
                                        <input type="hidden" id="hdi_id_usuario" value="<?php echo $_SESSION['login_usuario_cliente'] ?>">
                                        <input type="hidden" id="hdi_id_proveedor" value="<?php echo $objProveedor->id_proveedor ?>">
									<?php if($bool == "true"){ ?>
										<a class="lnk_me_gusta" id="lnk_no_me_gusta" style="background:#CCC !important;">Seguir proveedor</a>
                                        <a class="lnk_me_gusta" id="lnk_me_gusta" style="display:none">Seguir proveedor</a>
                                    <?php }else{ ?>
                                    	<a class="lnk_me_gusta" id="lnk_no_me_gusta" style="display:none; background:#CCC !important;" >Seguir proveedor</a>
										<a class="lnk_me_gusta" id="lnk_me_gusta">Seguir proveedor</a>
									<?php }} ?>
                                </div>

                            </div>

                        	<br clear="all">

							<!--<link rel="stylesheet" type="text/css" href="<?=_js_?>pikachoose/bottom.css"/>
                            <script src="<?=_js_?>pikachoose/jquery.pikachoose.full.js"></script>

                            <div class="pikachoose">
                                <ul id="pikame" class="jcarousel-skin-pika">
                                    <?php for($x = 0 ; $x < count($aryImagenesXProveedor) ; $x++){?>
                                            <li><a href="http://www.bodas.com.pe"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores_fotos/".$aryImagenesXProveedor[$x]['imagen_proveedor_imagen']."&w=504";?>"></a></li>
                                    <?php } ?>
                                </ul>
                            </div>-->

							<style> .galleria-errors{ visibility:hidden; display:none; } </style>


                            <div id="galleria">
                                <?php for($x = 0 ; $x < count($aryImagenesXProveedor) ; $x++){?>
                                    <img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores_fotos/".$aryImagenesXProveedor[$x]['imagen_proveedor_imagen']."&w=504";?>">
                                <?php } ?>
                            </div>

							<script>
								Galleria.loadTheme('<?php echo _js_?>galleria/galleria.classic.min.js');
								$('#galleria').Galleria({
									autoplay: 5000,
									width:504,
									height:366	
								});
							</script>

    						<div class="texto">
                            	<img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$objProveedor->logo_proveedor."&w=150&h=80";?>" align="left">
                                <p><b><?php echo $objProveedor->nombre_proveedor ?></b></p>
                                <style>
                                	.descripcion_dos{ font-family:Verdana, Geneva, sans-serif !important; font-size:11px !important; }
									.descripcion_dos p{ font-family:Verdana, Geneva, sans-serif !important; font-size:11px !important; }
									.descripcion_dos p span{ font-family:Verdana, Geneva, sans-serif !important; font-size:11px !important; }
                                </style>
                                <p><div class="descripcion_dos"><?php echo $objProveedor->descripcion2_proveedor ?></div></p>
                            </div>

							<?php if(isset($_SESSION['login_usuario_cliente'])){
								if($objUsuarioCliente->id_tipo_cuenta == 2){
									
									if( $objProveedor->id_proveedor == $id_proveedor_del_usuario[0]['id_proveedor'] ){
								?>
								<div class="frmPublicar">
                                    <form id="frmPublicar" name="frmPublicar">
                                        <img src="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objAdministrador->foto_usuario_cliente."&w=55&h=55";?>" alt="<?=$objProveedor->nombre_proveedor ?>" id="img_proveedor" style="display:none" />
                                        <textarea id="areaPublicacion" name="areaPublicacion" title="Actualiza tu estado..." class="labely"></textarea>
                                        <input type="hidden" id="id_proveedor" name="id_proveedor" value="<?php echo $objProveedor->id_proveedor; ?>" />
                                        <div id="btnPublicar">Publicar</div>
                                    </form>
                                </div>
                            <?php }}} ?>

							<div class="cnt_actividad">

                            	<div class="titulo-actividad">Últimas actualizaciones</div>

								<?php if(count($aryPosts) > 0){
                                    for( $x = 0 ; $x < count($aryPosts) ; $x++ ){
                                ?>
                                    <div id="post<?php echo $aryPosts[$x]['id_proveedor_publicacion'] ?>" class="item">
                                        <div class="imagen"><img src="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objAdministrador->foto_usuario_cliente."&w=55&h=55";?>" alt="<?=$objProveedor->nombre_proveedor ?>" /></div>
                                        <div class="contenido">
											<p><b><?php echo $objProveedor->nombre_proveedor; ?></b></p>

											<p class="texto"><?php echo $aryPosts[$x]['texto_proveedor_publicacion'] ?></p>

                                            <p class="fecha1">

                                            	<?php 
												$aryPostsComentarios = $objProveedorPublicacionComentario->obtenerComentariosXPublicacion($aryPosts[$x]['id_proveedor_publicacion']); 
												?>

                                            	<span>
													 <?php if(isset($_SESSION['login_usuario_cliente'])){
                                                $bool2 = $objUsuarioClientePublicacion->verificar_me_gusta($_SESSION['login_usuario_cliente'], $aryPosts[$x]['id_proveedor_publicacion']);
                                                    ?>
                                                    <input type="hidden" id="hdi_pub_id_usuario" value="<?php echo $_SESSION['login_usuario_cliente'] ?>">
                                                    <?php if($bool2 == "false"){ ?>
                                                        <a class="lnk_pub_me_gusta" title="<?php echo $aryPosts[$x]['id_proveedor_publicacion'] ?>">Me gusta</a>
                                                    <?php }} ?>
                                            	</span>

                                            	<span><?php echo count($aryPostsComentarios); ?></span> Comentario(s) - 
												<?php
                                                	$a = explode ("-", substr($aryPosts[$x]['fecha_proveedor_publicacion'],0,10) );
													echo $a[2]." - ".$a[1]." - ".$a[0]." ".substr($aryPosts[$x]['fecha_proveedor_publicacion'],11,5);
												?>

                                            </p>

											<?php if(isset($_SESSION['login_usuario_cliente'])){
											if($objUsuarioCliente->id_tipo_cuenta == 2){
												if( $objProveedor->id_proveedor == $id_proveedor_del_usuario[0]['id_proveedor'] ){
											?>
                                        		<div class="del" id="<?php echo $aryPosts[$x]['id_proveedor_publicacion'] ?>">x</div>
											<?php }}} ?>

										</div>

										<div class="contenedor-comentarios">

											<?php if(isset($_SESSION['login_usuario_cliente'])){ ?>
												<input type="hidden" id="hidImagenUser" name="hidImagenUser" value="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objUsuarioCliente->foto_usuario_cliente."&w=36&h=36";?>" />
                                            <?php } ?>

                                            <div class="lista-publicacion-comentarios">
                                                <ul class="lista_comentarios">
                                                	
                                                    <?php 
                                                        if(count($aryPostsComentarios) > 0){ 
                                                            for( $y = 0 ; $y < count($aryPostsComentarios) ; $y++ ){
                                                                ?><li id="comentario_<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>" class="<?php
                                                                if(count($aryPostsComentarios) > 8){
																	echo "comentarios-ocultos mostrar-".$aryPosts[$x]['id_proveedor_publicacion'];
																} ?>">
                                                                
                                                                <?php 
																	if(isset($_SESSION['login_usuario_cliente'])){
																		if($objUsuarioCliente->id_tipo_cuenta == 2){
																			if( $objProveedor->id_proveedor == $id_proveedor_del_usuario[0]['id_proveedor'] ){
																			?><div class="del_comentario" id="<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>">x</div><?php
																			}elseif($_SESSION['login_usuario_cliente'] == $aryPostsComentarios[$y]['id_usuario_cliente']){
																				?><div class="del_comentario" id="<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>">x</div><?php
																			}
																		}else{
																			if($_SESSION['login_usuario_cliente'] == $aryPostsComentarios[$y]['id_usuario_cliente']){
																				?><div class="del_comentario" id="<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>">x</div><?php
																			}
																		}
																	} 
																?>
                                                                
                                                                <img src="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$aryPostsComentarios[$y]['foto_usuario_cliente']."&w=36&h=36";?>" align="left" alt="<?php echo $aryPostsComentarios[$y]['nombre_usuario_cliente'] ?>" />
                                                                <b><?php echo $aryPostsComentarios[$y]['nombre_usuario_cliente'] ?> dijo: </b><?php echo $aryPostsComentarios[$y]['comentario'] ?></li>

																<?php
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                                
                                                <?php if(count($aryPostsComentarios) > 4){ ?>
                                                <div class="abrir-comentarios-ocultos" id="<?php echo $aryPosts[$x]['id_proveedor_publicacion'] ?>">Ver todos los comentarios</div>
                                                <?php } ?>
                                                
                                            </div>

                                            <?php if(isset($_SESSION['login_usuario_cliente'])){ ?>
                                                <div class="frmComentarios">
                                                    <form id="frmComentarios" name="frmComentarios">
                                                        <p><textarea id="areaPublicacionComentario<?php echo $aryPosts[$x]['id_proveedor_publicacion'] ?>" name="areaPublicacionComentario" title="Escribe un comentario..." class="areaPublicacionComentario labely"></textarea></p>
                                                        <input type="hidden" id="id_proveedor_publicacion" name="id_proveedor_publicacion" value="<?php echo $aryPosts[$x]['id_proveedor_publicacion'] ?>">
                                                        <input type="hidden" id="id_usuario_cliente" name="id_usuario_cliente" value="<?php echo $_SESSION['login_usuario_cliente'] ?>">
                                                        <div id="<?php echo $aryPosts[$x]['id_proveedor_publicacion'] ?>" class="btnPublicarComentario">Publicar comentario</div>
                                                    </form>
                                                </div>
                                            <?php } ?>
										</div>
										

                                    </div>

                                <?php
                                    }
									
									?>

									<div id="abrir-entradas-antiguas">Ver entradas antiguas</div>

									<div id="entradas-antiguas">

									<?php
									
									for( $x = 0 ; $x < count($aryPostsAntiguos) ; $x++ ){
                                ?>
                                    <div id="post<?php echo $aryPostsAntiguos[$x]['id_proveedor_publicacion'] ?>" class="item">
                                        <div class="imagen"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$objProveedor->logo_proveedor."&w=55&h=55";?>" alt="<?=$objProveedor->nombre_proveedor ?>" /></div>
                                        <div class="contenido">
											<p><b><?php echo $objProveedor->nombre_proveedor; ?></b></p>

											<p class="texto"><?php echo $aryPostsAntiguos[$x]['texto_proveedor_publicacion'] ?></p>

											<?php 
												$aryPostsComentarios = $objProveedorPublicacionComentario->obtenerComentariosXPublicacion($aryPostsAntiguos[$x]['id_proveedor_publicacion']); 
											?>

                                            <p class="fecha1">

                                            	<span>
													 <?php if(isset($_SESSION['login_usuario_cliente'])){
                                                $bool2 = $objUsuarioClientePublicacion->verificar_me_gusta($_SESSION['login_usuario_cliente'], $aryPostsAntiguos[$x]['id_proveedor_publicacion']);
                                                    ?>
                                                    <input type="hidden" id="hdi_pub_id_usuario" value="<?php echo $_SESSION['login_usuario_cliente'] ?>">
                                                    <?php if($bool2 == "false"){ ?>
                                                        <a class="lnk_pub_me_gusta" title="<?php echo $aryPostsAntiguos[$x]['id_proveedor_publicacion'] ?>">Me gusta</a>
                                                    <?php }} ?>
                                            	</span>

                                            	<span><?php echo count($aryPostsComentarios); ?></span> Comentario(s) - 
												<?php
                                                	$a = explode ("-", substr($aryPostsAntiguos[$x]['fecha_proveedor_publicacion'],0,10) );
													echo $a[2]." - ".$a[1]." - ".$a[0]." ".substr($aryPostsAntiguos[$x]['fecha_proveedor_publicacion'],11,5);
												?>
                                                
                                            </p>

											<?php if(isset($_SESSION['login_usuario_cliente'])){
											if($objUsuarioCliente->id_tipo_cuenta == 2){
												if( $objProveedor->id_proveedor == $id_proveedor_del_usuario[0]['id_proveedor'] ){
											?>
                                        		<div class="del" id="<?php echo $aryPostsAntiguos[$x]['id_proveedor_publicacion'] ?>">x</div>
											<?php }}} ?>

										</div>

										<div class="contenedor-comentarios">

											<?php if(isset($_SESSION['login_usuario_cliente'])){ ?>
												<input type="hidden" id="hidImagenUser" name="hidImagenUser" value="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objUsuarioCliente->foto_usuario_cliente."&w=36&h=36";?>" />
                                            <?php } ?>

                                            <div class="lista-publicacion-comentarios">
                                                <ul class="lista_comentarios">
                                                	
                                                    <?php 
                                                        if(count($aryPostsComentarios) > 0){ 
                                                            for( $y = 0 ; $y < count($aryPostsComentarios) ; $y++ ){
                                                                ?><li id="comentario_<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>" class="<?php
                                                                if(count($aryPostsComentarios) > 8){
																	echo "comentarios-ocultos mostrar-".$aryPostsAntiguos[$x]['id_proveedor_publicacion'];
																} ?>">
                                                                
                                                                <?php 
																	if(isset($_SESSION['login_usuario_cliente'])){
																		if($objUsuarioCliente->id_tipo_cuenta == 2){
																			if( $objProveedor->id_proveedor == $id_proveedor_del_usuario[0]['id_proveedor'] ){
																			?><div class="del_comentario" id="<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>">x</div><?php
																			}elseif($_SESSION['login_usuario_cliente'] == $aryPostsComentarios[$y]['id_usuario_cliente']){
																				?><div class="del_comentario" id="<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>">x</div><?php
																			}
																		}else{
																			if($_SESSION['login_usuario_cliente'] == $aryPostsComentarios[$y]['id_usuario_cliente']){
																				?><div class="del_comentario" id="<?php echo $aryPostsComentarios[$y]['id_proveedor_publicacion_comentario'] ?>">x</div><?php
																			}
																		}
																	} 
																?>
                                                                
                                                                <img src="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$aryPostsComentarios[$y]['foto_usuario_cliente']."&w=36&h=36";?>" align="left" alt="<?php echo $aryPostsComentarios[$y]['nombre_usuario_cliente'] ?>" />
                                                                <b><?php echo $aryPostsComentarios[$y]['nombre_usuario_cliente'] ?> dijo: </b><?php echo $aryPostsComentarios[$y]['comentario'] ?></li><?php
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                                
                                                <?php if(count($aryPostsComentarios) > 4){ ?>
                                                <div class="abrir-comentarios-ocultos" id="<?php echo $aryPostsAntiguos[$x]['id_proveedor_publicacion'] ?>">Ver todos los comentarios</div>
                                                <?php } ?>
                                                
                                            </div>

                                            <?php if(isset($_SESSION['login_usuario_cliente'])){ ?>
                                                <div class="frmComentarios">
                                                    <form id="frmComentarios" name="frmComentarios">
                                                        <p><textarea id="areaPublicacionComentario<?php echo $aryPostsAntiguos[$x]['id_proveedor_publicacion'] ?>" name="areaPublicacionComentario" title="Escribe un comentario..." class="areaPublicacionComentario labely"></textarea></p>
                                                        <input type="hidden" id="id_proveedor_publicacion" name="id_proveedor_publicacion" value="<?php echo $aryPostsAntiguos[$x]['id_proveedor_publicacion'] ?>">
                                                        <input type="hidden" id="id_usuario_cliente" name="id_usuario_cliente" value="<?php echo $_SESSION['login_usuario_cliente'] ?>">
                                                        <div id="<?php echo $aryPostsAntiguos[$x]['id_proveedor_publicacion'] ?>" class="btnPublicarComentario">Publicar comentario</div>
                                                    </form>
                                                </div>
                                            <?php } ?>
										</div>
										

                                    </div>

                                <?php
                                    }
									
									?></div><?php
									
                                }else{ ?>
                                    <p id="sin_publicacion">No hay post publicados aun.</p>
                                <?php } ?>

                        	</div>

                        </div>

                        <div class="derecha">
                        	
                            <div class="redes">
                            	
                                <div style="position:relative; float:right; width:200px; height:auto; margin:6px 0px;">
                                <div style="position:relative; float:left; width:auto; height:auto; ">Compartir: </div>
                                <!-- AddThis Button BEGIN -->
                                	<div class="addthis_toolbox addthis_default_style">
                                        <a class="addthis_button_preferred_1"></a>
                                        <a class="addthis_button_preferred_2"></a>
                                        <a class="addthis_button_preferred_3"></a>
                                        <a class="addthis_button_preferred_4"></a>
                                        <a class="addthis_button_compact"></a>
                                        <a class="addthis_counter addthis_bubble_style"></a>
                                    </div>
                                    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f04b6af30eeab4f"></script>
                                <!-- AddThis Button END -->
						</div>
                            
                            </div>

                        	<div class="titulo">SIGUENOS EN:</div>

                        	<div class="redes">
                            	<?php for($x = 0 ; $x < count($aryRedesSocuales) ; $x++){ ?>
									<a href="http://<?php echo $aryRedesSocuales[$x]['link_proveedor_red_social']?>" target="_blank" title="<?php echo $aryRedesSocuales[$x]['link_proveedor_red_social']?>"><img src="<?php echo _img_?>/<?php echo $aryRedesSocuales[$x]['imagen_red_social']?>"></a>
								<?php } ?>
                            </div>

                        	<div class="titulo">TE RECOMENDAMOS A:</div>

                        	<div class="recomendados">
                            	<?php for($x = 0 ; $x < count($aryRecomendados) ; $x++){ ?>
									<a href="http://<?php echo $aryRecomendados[$x]['link_proveedor_recomendado']?>" target="_blank" title="<?php echo $aryRecomendados[$x]['link_proveedor_recomendado']?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores_recomendados/".$aryRecomendados[$x]['imagen_proveedor_recomendado']."&w=54&h=54";?>"></a>
								<?php } ?>
                            </div>

                        	<div class="titulo">SEGUIDORES</div>

                            <div class="seguidores">
                            	<?php for($x = 0 ; $x < count($arySeguidores) ; $x++){ ?>
									<img src="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$arySeguidores[$x]['foto_usuario_cliente']."&w=54&h=54";?>" alt="<?php echo $arySeguidores[$x]['nombre_usuario_cliente']; ?>" title="<?php echo $arySeguidores[$x]['nombre_usuario_cliente']; ?>">
								<?php } ?>
                            </div>

                            <div class="titulo">UBICANOS</div>
                            
                            <div class="datos-direccion">
                            	<p><b>Dirección</b></p>
                                <p><?php echo $objProveedor->direccion_proveedor ?></p>
                                
                                <p><b>Teléfono</b></p>
                                <p><?php echo $objProveedor->telefono1_proveedor ?></p>
                                <p><?php echo $objProveedor->telefono2_proveedor ?></p>
                                <p><?php echo $objProveedor->telefono3_proveedor ?></p>
                                <p><?php echo $objProveedor->telefono4_proveedor ?></p>
                                
                                <p><b>Email</b></p>
                                <p><?php echo $objProveedor->email_proveedor ?></p>
                                
                                <p><b>Web</b></p>
                                <p><a href="http://<?php echo $objProveedor->web_proveedor ?>" target="_blank"><?php echo $objProveedor->web_proveedor ?></a></p>
                            </div>

                            <div class="mapa">
                            	<?php 
								if($objProveedor->mapa_estado1 == 1){ echo $objProveedor->mapa_codigo1;
								}else{ echo "<img src='"._tt_."src=/aplication/webroot/imgs/proveedores/".$objProveedor->mapa_imagen1."&w=300' />"; }
								?>
                            </div>

                            <div class="mapa">
                            	<?php 
								if($objProveedor->mapa_estado2 == 1){ echo $objProveedor->mapa_codigo2;
								}else{ echo "<img src='"._tt_."src=/aplication/webroot/imgs/proveedores/".$objProveedor->mapa_imagen2."&w=300' />"; }
								?>
                            </div>

                        </div>   

                    </div>

                </div>
			<?php
		}

	}
?>