<?php
	class VwProveedores{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central">

                        <?php 
							$objProveedorRubro = new ProveedorRubro($_GET['id_rubro']);
							echo $objProveedorRubro->id_proveedor_rubro;
							echo $objProveedorRubro->nombre_proveedor_rubro;
						?>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>