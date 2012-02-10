<?php
	class VwLunaDeMiel extends Utiles{

		public function __construct(){}

		public function vista(){
			
			$objArticulo = new Articulo;
			
			$aryArticulos = $objArticulo->getArticuloXViaje();
			
			$objVariado = new Variado(1);
			
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-lunademiel">

						<div class="titulo">Luna de miel</div>
                        
                        <div class="texto">
                        
                            <div class="redes">

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

                            <div class="tit-luna"><?=$objVariado->titulo?></div>
                            
                            <div class="descripcion"><?=$objVariado->descripcion?> <a href="<?=$objVariado->link?>" target="_blank">ver más</a></div>
                            
                            <div class="imagen-central"><a href="<?=$objVariado->link?>" target="_blank"><img src="<?=_img_?>variados/<?=$objVariado->imagen?>"></a></div>

                            <div class="cnt-destinos">
                                <div class="des-destinos item1">
                                	<div class="des-tit"><b><a href="<?=_bs_?>destinos-peru/0/">Destinos Perú</a></b></div>
                                    <div class="des-img"><a href="<?=_bs_?>destinos-peru/0/"><img src="<?=_img_?>img-luna-art.png"></a></div>
                                    <div class="des-des">La luna de miel es el viaje más especial de tu vida, por ello Revista Bodas te recomienda los destinos más bellos del Perú...<a href="<?=_bs_?>destinos-peru/0/">ver más</a></div>
                                </div>
                                <div class="des-destinos item2">
                                	<div class="des-tit"><b><a href="<?=_bs_?>destinos-extranjero/0/">Destinos Extranjero</a></b></div>
                                    <div class="des-img"><a href="<?=_bs_?>destinos-extranjero/0/"><img src="<?=_img_?>img-viaje2.png"></a></div>
                                    <div class="des-des">Ponemos a tu alcance notas exclusivas de los destinos más bellos del mundo y estes al tanto de que lugar visitar en ese viaje tan especail...<a href="<?=_bs_?>destinos-extranjero/0/">ver más</a></div>
                                </div>
                            </div>

							<div class="cnt-mas-notas">
                            
                            	<div class="tit-mas-notas">Más notas de Luna de miel</div>
                                
                                <ul>
                                	<?php for($x = 0 ; $x < 4 ; $x++){ 
										if($aryArticulos[$x]['id_articulo_tipo'] == 18){
											$tit = "peru";	}else{	$tit = "extranjero";	}
									?>
                                		<li><?php echo $aryArticulos[$x]['titulo']?> <a href="<?=_bs_."destinos-".$tit."_detalle/".$aryArticulos[$x]['id']."/".$this->procesar_url_2($aryArticulos[$x]['titulo'])?>">ver más</a></li>
                                    <?php } ?>
                                </ul>
                            
                            </div>                            

                            <div class="cnt-otros">
                                <div class="des-otros">
	                                <div class="otr-tit"><a href="<?=_bs_?>check_list/">Chek List</a></div>
                                	<div class="otr-img"><a href="<?=_bs_?>check_list/"><img src="<?=_img_?>img-chklist.png"></a></div>
                                    <div class="otr-des">Aquí podras acceder a una lista de todo lo indispensable que necesitas llevar a tu luna miel ...<a href="<?=_bs_?>check_list/">ver más</a></div>
                                </div>
                                <div class="des-otros item2">
	                                <div class="otr-tit"><a href="<?=_bs_?>check_list/">Recomendaciones</a></div>
                                	<div class="otr-img"><a href="<?=_bs_?>check_list/"><img src="<?=_img_?>img-reco.png"></a></div>
                                    <div class="otr-des">Si vas al extranjero o a destinos muy inhóspitos hay recomendaciones básicas a seguir ...<a href="<?=_bs_?>recomendaciones/">ver más</a></div>
                                </div>
                            </div>
                            
                        </div>

                    </div>

                    <?php include(_inc_.'inc.derecha.php'); ?>

                </div>
			<?php
		}
	}
?>