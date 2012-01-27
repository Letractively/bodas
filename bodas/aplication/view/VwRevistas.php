<?php
	class VwRevistas extends Utiles{

		public function __construct(){}

		public function vista(){
			$objRevista = new Revista();
			$aryRevistas = $objRevista->getRevistas();
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-revistas">

						<div class="edicion-actual">
                        	<div class="titulo"><?php echo $aryRevistas[count($aryRevistas)-1]['titulo']; ?></div>
                            <div class="imagen"><img src="<?=_tt_."src=/aplication/webroot/imgs/revistas/".$aryRevistas[count($aryRevistas)-1]['imagen']."&w=175&h=251";?>"></div>
                            <div class="texto">
                            	<p><?php echo $aryRevistas[count($aryRevistas)-1]['descripcion']; ?></p>
                                <p><a href="<?=_bs_?>suscripcion/"><div class="btn_suscribete">Suscribete Aquí</div></a></p>
                            </div>
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
                        </div>

                        <div class="otras-ediciones">
                        	<div class="titulo-otras-ediciones">BODAS ONLINE</div>
							<?php for($x = 0 ; $x < count($aryRevistas)-1 ; $x++){ ?>
                            	<div class="item">
                                    <div class="imagen"><a href="http://<?php echo $aryRevistas[$x]['codigo']; ?>" target="_blank"><img src="<?=_tt_."src=/aplication/webroot/imgs/revistas/".$aryRevistas[$x]['imagen']."&w=158&h=228";?>"></a></div>
                                    <div class="titulo-int"><?php echo $aryRevistas[$x]['titulo']; ?></div>
                                    <div class="ver"><a href="http://<?php echo $aryRevistas[$x]['codigo']; ?>" target="_blank">Ver</a></div>
                                </div>
                            <?php } ?>
                        </div>

						<div class="puntos-venta">
                        	<p><b><span>PUNTOS DE VENTA</span></b></p>
                            <p>Encuentra revista bodas en los siguientes puntos de ventas</p>
                            <p><b>En lima:</b> Wong, Tottus, Metro y principales kioscos. Además en Zeta Book Store, Librerías Crisol, Mini Market, grifos y farmacias.</p>
                            <p><b>En provincias:</b> Kioscos y locales cerrados en Arequipa, Chiclayo, Cusco, Cajamarca, Piura, Trujillo, Ica.</p>
                            <p><b>Novios Falabella:</b> Recibe tu revista BODAS de forma gratuita al inscribirte en la lista de novios de Saga Falabella.</p>
                        </div>

                    </div>

                    <?php include(_inc_.'inc.derecha.php'); ?>

                </div>
			<?php
		}
	}
?>