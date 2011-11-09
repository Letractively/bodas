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
						?>
                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>