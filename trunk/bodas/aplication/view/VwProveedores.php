<?php
	class VwProveedores{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-proveedor">
						<?php $objProveedorRubro = new ProveedorRubro($_GET['id_rubro']); ?>
                        <div class="titulo">
                        	<p class="nombre-rubro"><?php echo $objProveedorRubro->nombre_proveedor_rubro ?></p>
                            <p class="regresar">&laquo; <a href="#">regresar</a></p>
                        </div>

                        <?php 
							echo $objProveedorRubro->id_proveedor_rubro."<br>";
							echo $objProveedorRubro->nombre_proveedor_rubro."<br>";
							echo $_GET['pag'];
							
							$objProveedor = new Proveedor;
							
						?>
                        
                        <div class="articulos-relacionador">
                        	<div class="titulo-articulo">Articulos relacionados</div>
                            <div class="item-articulo">
                            	<img src="<?php echo _img_?>img-articulo-relacionado.png" align="left">
                                <p><h2></h2></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eleifend rhoncus pellentesque. Suspendisse aliquet convallis mattis. <a href="#">Ver més</a></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>