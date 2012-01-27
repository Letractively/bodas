<?php
	class VwAnuncio extends Utiles{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-anuncios">

						<div class="titulo">Anuncios</div>
                        
                        <div class="texto">
                            <p>¿La boda terminó? Este es un espacio donde podrás publicar anuncios ofreciendo por ejemplo tu vestido de novia o alguna otra prenda o accesorio indispensable en una boda.</p>
							<p><center><img src="<?php echo _img_?>boton-anuncio.png"></center></p>
							<p><img src="<?php echo _img_?>anuncio.png"></p>
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>