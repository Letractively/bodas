<?php
	class VwIndex{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    <div class="contenido-central">
                    	<img src="<?php echo _img_?>galeria-index.png" />
                        <div class="columna1">
                        	<div class="item">
                            	<p><b>Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla. Nullam interdum convallis orci nec blandit.<a href="#">Ver más</a></p>
                            </div>
                        </div>
                        <div class="columna1">
                       		<div class="item">
                            	<p><b>Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla. Nullam interdum convallis orci nec blandit.<a href="#">Ver más</a></p>
                            </div>
                        </div>
                        <div class="columna2">
                        	<div class="item">
                            	<p><b>Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla. Nullam interdum convallis orci nec blandit.<a href="#">Ver más</a></p>
                            </div>
                        </div>
                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>