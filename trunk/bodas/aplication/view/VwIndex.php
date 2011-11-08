<?php
	class VwIndex{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central">
                    	<img src="<?php echo _img_?>galeria-index.png" />
                        <div class="columna columna1">
                        	<div class="item-portada">
                            	<p><b class="b1">Portada actual</b></p>
                                <p><img src="<?php echo _img_?>revista-ejemplo.png" /></p>
                            </div>
                        	<div class="item">
                            	<p><b class="b1">Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p><b class="b2">Titulo</b></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla.<a href="#">Ver más</a></p>
                            </div>
                        </div>
                        
                        <div class="columna columna1">
                       		<div class="item">
                            	<p><b class="b1">Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p><b class="b2">Titulo</b></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla.<a href="#">Ver más</a></p>
                            </div>
                            <div class="item">
                            	<p><b class="b1">Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p><b class="b2">Titulo</b></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla.<a href="#">Ver más</a></p>
                            </div>
                        </div>
                        
                        <div class="columna columna2">
                        	<div class="item">
                            	<p><b class="b1">Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p><b class="b2">Titulo</b></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla.<a href="#">Ver más</a></p>
                            </div>
                            <div class="item">
                            	<p><b class="b1">Titulo</b></p>
                                <p><img src="<?php echo _img_?>imagen-articulo-index.png" /></p>
                                <p><b class="b2">Titulo</b></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit pharetra aliquam. Aliquam erat volutpat. Proin at condimentum nulla.<a href="#">Ver más</a></p>
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
                            
                            <div class="contenido">
                            	<p class="nombre-proveedor">Proveedor</p>
                                <p class="publicacion">Post publicado por el proveedor</p>
                                <p class="rubro-proveedor">Rubro</p>
                            </div>
                            
                            <div class="contenido">
                            	<p class="nombre-proveedor">Proveedor</p>
                                <p class="publicacion">Post publicado por el proveedor, Post publicado por el proveedor</p>
                                <p class="rubro-proveedor">Rubro</p>
                            </div>
                            
                            <div class="contenido">
                            	<p class="nombre-proveedor">Proveedor</p>
                                <p class="publicacion">Post publicado por el proveedor</p>
                                <p class="rubro-proveedor">Rubro</p>
                            </div>
                            
                            <div class="contenido">
                            	<p class="nombre-proveedor">Proveedor</p>
                                <p class="publicacion">Post publicado por el proveedor, Post publicado por el proveedor</p>
                                <p class="rubro-proveedor">Rubro</p>
                            </div>
                            
                            <div class="contenido">
                            	<p class="nombre-proveedor">Proveedor</p>
                                <p class="publicacion">Post publicado por el proveedor</p>
                                <p class="rubro-proveedor">Rubro</p>
                            </div>
                            
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>