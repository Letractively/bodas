<?php
	class VwTendencias extends Utiles{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-noticias">

						<img src="<?php echo _img_?>imagenes-temporales-tendencias.jpg">

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>