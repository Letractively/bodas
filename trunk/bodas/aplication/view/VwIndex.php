<?php
	class VwIndex extends Utiles{

		public function __construct(){}

		public function vista(){
			
			$objArticuloPortada = new ArticuloPortada;
			$aryPortadas = $objArticuloPortada->obtener_portadas();
			
			$objProveedorPublicacion = new ProveedorPublicacion;
			$aryUltimasPublicaciones = $objProveedorPublicacion->obtenerUltimasPublicaciones();
			
			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="contenido-central">

                        <div id='coin-slider'>
                        	<?php for($x = 0 ; $x < 4 ; $x++){ ?>
                                <a href="<?=_bs_."noticias_detalle/".$aryPortadas[$x]['id']."/".$this->procesar_url_2($aryPortadas[$x]['titulo'])?>">
                                     <img src="<?php echo _tt_."src=../aplication/webroot/imgs/articulos_fotos/".$aryPortadas[$x]['imagen']."&w=505&h=299";?>" alt="<?php echo $aryPortadas[$x]['imagen_1']; ?>" />
                                    <span><p><b><?php echo $aryPortadas[$x]['titulo']; ?></b><p><p><?php echo substr($aryPortadas[$x]['descripcion1'],0,150); ?></p></span>
                                </a>
							<?php } ?>
                        </div>

                        <div class="columna columna1">
                        	<div class="item-portada">
                            	<p><b class="b1">Portada actual</b></p>
                                <p><img src="<?php echo _img_?>revista-ejemplo.png" /></p>
                            </div>
                        	<p><b class="b1"><?php echo substr($aryPortadas[6]['titulo'],0,80) ?></b></p>
                                <p><a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[6]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[4]['titulo']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryPortadas[6]['imagen']."&w=161&h=120";?>"></a></p>
                                <p><?php echo substr($aryPortadas[6]['descripcion1'],0,120); ?> <a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[6]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[4]['titulo']) ?>">Ver más</a></p>
                        </div>

                        <div class="columna columna1">
                       		<div class="item">
                            	<p><b class="b1"><?php echo substr($aryPortadas[4]['titulo'],0,80) ?></b></p>
                                <p><a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[4]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[4]['titulo']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryPortadas[4]['imagen']."&w=161&h=120";?>"></a></p>
                                <p><?php echo substr($aryPortadas[4]['descripcion1'],0,120); ?> <a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[4]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[4]['titulo']) ?>">Ver más</a></p>
                            </div>
                            <div class="item">
                            	<p><b class="b1"><?php echo substr($aryPortadas[7]['titulo'],0,80) ?></b></p>
                                <p><a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[7]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[7]['titulo']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryPortadas[7]['imagen']."&w=161&h=120";?>"></a></p>
                                <p><?php echo substr($aryPortadas[7]['descripcion1'],0,120); ?> <a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[7]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[7]['titulo']) ?>">Ver más</a></p>
                            </div>
                        </div>

                        <div class="columna columna2">
                        	<div class="item">
                            	<p><b class="b1"><?php echo substr($aryPortadas[5]['titulo'],0,80) ?></b></p>
                                <p><a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[5]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[5]['titulo']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryPortadas[5]['imagen']."&w=161&h=120";?>"></a></p>
                                <p><?php echo substr($aryPortadas[5]['descripcion1'],0,120); ?> <a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[5]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[5]['titulo']) ?>">Ver más</a></p>
                            </div>
                            <div class="item">
                            	<p><b class="b1"><?php echo substr($aryPortadas[8]['titulo'],0,80) ?></b></p>
                                <p><a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[8]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[8]['titulo']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$aryPortadas[8]['imagen']."&w=161&h=120";?>"></a></p>
                                <p><?php echo substr($aryPortadas[8]['descripcion1'],0,120); ?> <a href="<?=_bs_?>noticias_detalle/<?php echo $aryPortadas[8]['id']?>/<?php echo $objUtilitarios->procesar_url_2($aryPortadas[7]['titulo']) ?>">Ver más</a></p>
                            </div>
                        </div>

                        <div class="otros-items">
                            <div class="index-luna-miel">
                                <div class="titulo"><img src="<?php echo _img_?>tit-index-lunamiel.png"></div>
                                <div class="texto">
                                    <img src="<?php echo _img_?>img-index-lunamiel.png" align="left">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas convallis dignissim semper. Duis feugiat dui sit amet est hendrerit a blandit turpis ultricies. Quisque ut porttitor nibh. Fusce convallis adipiscing porttitor. Cras ut nisi a sem molestie accumsan. Suspendisse fringilla, erat eget blandit ultricies.</p>
                                </div>
                            </div>

                            <div class="index-eventos">
                                <div class="titulo"><img src="<?php echo _img_?>tit-index-eventos.png"></div>
                                <div class="texto">
                                    <img src="<?php echo _img_?>img-index-eventos.png">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas convallis dignissim semper. </p>
                                </div>
                            </div>
                        </div>

                        <div class="otros-items2">
                        	<div class="titulo"><img src="<?php echo _img_?>tit-index-posts.png"></div>
                            
                            <?php for( $x = 0 ; $x < 8; $x++ ){ ?>
                                <div class="contenido">
                                    <p class="nombre-proveedor"><a href="<?=_bs_?>catalogo/<?php echo $aryUltimasPublicaciones[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryUltimasPublicaciones[$x]['nombre_proveedor']) ?>"><?php echo $aryUltimasPublicaciones[$x]['nombre_proveedor']?></a></p>
                                    <p class="publicacion"><?php echo substr($aryUltimasPublicaciones[$x]['texto_proveedor_publicacion'],0,30)."..."; ?></p>
                                </div>
                            <?php } ?>
                            
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>