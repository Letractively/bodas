<?php
	class VwDecoracion extends Utiles{

		public function __construct(){}

		public function vista(){
			$objArticulo = new Articulo;
			$aryNoticias = $objArticulo->getArticuloXTipo(6);

			if(count($aryNoticias) > 0){
				$listaPaginas = array_chunk($aryNoticias,6);
				$aryPagina = $listaPaginas[$_GET['pag']];
			}

			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-temas">

						<div class="titulo">
                        	<p class="nombre-rubro">Decoración</p>
                            <p class="regresar">

                                <div class="contenedor-paginacion">
                                    <div class="paginacion">
                                        <a href="<?=_bs_?>decoracion/0/">&laquo;</a>
                                        <?php for($x = 0 ; $x < count($listaPaginas) ; $x++){ ?>
                                            <a href="<?=_bs_?>decoracion/<?php echo $x ?>/"><?php echo ($x+1); ?></a>
                                        <?php } ?>
                                        <a href="<?=_bs_?>decoracion/<?php echo count($listaPaginas)-1; ?>/">&raquo;</a>
                                    </div>
                                </div>
                                
                            </p>
                        </div>

						<div class="imagen-principal"><img src="<?php echo _img_?>decoracion.jpg"></div>

						<?php if(count($aryNoticias) > 0){ ?>

                            <div class="listado-noticias">
    
                                <?php for($x = 0 ; $x < count($aryPagina) ; $x++){?>
                                    <div class="item">
                                        <div class="imagen"><a href="<?=_bs_?>decoracion-detalle/<?php echo $aryPagina[$x]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPagina[$x]['titulo']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryPagina[$x]['imagen']."&w=190&h=132";?>"></a></div>
                                        <div class="texto">
                                        	<p class="fecha-item"><?php echo $this->formatear_fecha($aryPagina[$x]['fecha']); ?></p>
                                        	<p class="titulo-item"><b><a href="<?=_bs_?>decoracion-detalle/<?php echo $aryPagina[$x]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPagina[$x]['titulo']) ?>"><?php echo $aryPagina[$x]['titulo'] ?></a></b></p>
                                            <p><?php echo substr($aryPagina[$x]['descripcion1'],0,120); ?> <a href="<?=_bs_?>decoracion-detalle/<?php echo $aryPagina[$x]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPagina[$x]['titulo']) ?>">Ver más</a></p>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
						
                        <?php } ?>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

		public function detalle(){
			
			$objArticulo = new Articulo($_GET['id_articulo']);
			$objArticuloGaleria = new ArticuloGaleria($_GET['id_articulo']);
			$aryImagenesArticulo = $objArticuloGaleria->getGaleriaXArticulo($_GET['id_articulo']);
			$aryArticulosRelacionados = $objArticulo->getArticuloXTipo(6);
			
			if(isset($_SESSION['login_usuario_cliente'])){
				$objUsuarioCliente = new UsuarioCliente($_SESSION['login_usuario_cliente']);
			}

			$objArticuloComentario = new ArticuloComentario;
			$aryPostsComentarios = $objArticuloComentario->obtenerComentariosXArticulo($_GET['id_articulo']); 

			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-detalle-noticias">

						<div class="titulo">
                            <p class="regresar">
                                <div class="contenedor-paginacion">
                                    <a href="<?=_bs_?>decoracion/0/">&lt; Regresar a Decoración</a>
                                </div>
                            </p>
                        </div>

                        <div class="fecha"><?php echo $this->formatear_fecha($objArticulo->fecha); ?></div>
                        
                        <div class="fecha">
                        
                        <div style="position:relative; float:left; width:auto; height:auto; margin:4px 0 0 0;">
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                            	<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            	<a class="addthis_button_tweet"></a>
                            </div>
                            <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f04b6af30eeab4f"></script>
                            <!-- AddThis Button END -->
						</div>
					
						<div style="position:relative; float:right; width:200px; height:auto; margin:6px 0px;">
                        	<div style="position:relative; float:left; width:auto; height:auto; ">Compartir: </div>
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
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
                        
                        <div class="titulo-noticia"><?php echo $objArticulo->titulo; ?></div>
                        <div class="texto">
                            <?php if(count($aryImagenesArticulo) == 1){ ?>
                                <img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryImagenesArticulo[0]['imagen']."&w=280&h=188";?>" align="left" class="imagen-noticia">
                            <?php }else if(count($aryImagenesArticulo) > 1){ ?>
                                <div id="galleria">
                                    <?php for($x = 0 ; $x < count($aryImagenesArticulo) ; $x++){?>
                                        <img src="<?php echo _img_?>articulos_fotos/<?php echo $aryImagenesArticulo[$x]['imagen']?>">
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php echo $objArticulo->descripcion2; ?>
                        </div>
                        
                        <div class="mas-noticias">
                        	<div class="titulo-mas-noticias">Más noticias</div>
                            <div class="lista">
                        	<?php for($z = 0 ; $z < 3 ; $z++){ ?>
                            	<div class="item">
                                	<p><a href="<?=_bs_?>decoracion-detalle/<?php echo $aryArticulosRelacionados[$z]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryArticulosRelacionados[$z]['titulo']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryArticulosRelacionados[$z]['imagen']."&w=145&h=86";?>"></a></p>
                                    <p><a href="<?=_bs_?>decoracion-detalle/<?php echo $aryArticulosRelacionados[$z]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryArticulosRelacionados[$z]['titulo']) ?>"><?php echo $aryArticulosRelacionados[$z]['titulo']; ?></a></p>
                                </div>
                            <?php } ?>
                            </div>
                        </div>

                            <div class="contenedor-comentarios">
    
                                <?php if(isset($_SESSION['login_usuario_cliente'])){ ?>
                                    <input type="hidden" id="hidImagenUser" name="hidImagenUser" value="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$objUsuarioCliente->foto_usuario_cliente."&w=36&h=36";?>" />
                                <?php } ?>

								<div id="post<?php echo $_GET['id_articulo'] ?>" class="item">

                                    <div class="lista-publicacion-comentarios">
                                        <ul class="lista_comentarios">
                                            <?php 
                                                if(count($aryPostsComentarios) > 0){ 
                                                    for( $y = 0 ; $y < count($aryPostsComentarios) ; $y++ ){
                                                        ?><li id="comentario_<?php echo $aryPostsComentarios[$y]['id_articulo_comentario'] ?>">
                                                        <?php 
                                                            if(isset($_SESSION['login_usuario_cliente'])){
                                                                if($_SESSION['login_usuario_cliente'] == $aryPostsComentarios[$y]['id_usuario_cliente']){
                                                                    ?><div class="del_comentario_noticia" id="<?php echo $aryPostsComentarios[$y]['id_articulo_comentario'] ?>">x</div><?php
                                                                }
                                                            } 
                                                        ?>
                                                        <img src="<?=_tt_."src=/aplication/webroot/imgs/usuarios_clientes/".$aryPostsComentarios[$y]['foto_usuario_cliente']."&w=36&h=36";?>" align="left" alt="<?php echo $aryPostsComentarios[$y]['nombre_usuario_cliente'] ?>" />
                                                        <b><?php echo $aryPostsComentarios[$y]['nombre_usuario_cliente'] ?> dijo: </b><?php echo $aryPostsComentarios[$y]['comentario'] ?></li><?php
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
        
									<?php if($objArticulo->estado_comentarios == 1){ ?>
        
										<?php if(isset($_SESSION['login_usuario_cliente'])){ ?>
                                            <div class="frmComentarios">
                                                <form id="frmComentarios" name="frmComentarios">
                                                    <p><textarea id="areaPublicacionComentario<?php echo $_GET['id_articulo'] ?>" name="areaPublicacionComentario" title="Comentario" class="areaPublicacionComentario labely"></textarea></p>
                                                    <input type="hidden" id="id_proveedor_publicacion" name="id_proveedor_publicacion" value="<?php echo $_GET['id_articulo'] ?>">
                                                    <input type="hidden" id="id_usuario_cliente" name="id_usuario_cliente" value="<?php echo $_SESSION['login_usuario_cliente'] ?>">
                                                    <div id="<?php echo $_GET['id_articulo'] ?>" class="btnPublicarComentarioNoticia">Publicar comentario</div>
                                                </form>
                                            </div>
                                        <?php } ?>
                                
                                	<?php } ?>
                                
                                </div>
                                
                            </div>
						


                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php

		}

	}
?>