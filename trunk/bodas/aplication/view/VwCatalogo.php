<?php
	class VwCatalogo{

		public function __construct(){}

		public function vista(){
			$objProveedor = new Proveedor($_GET['id_proveedor']);
			$objProveedorRubro2 = new ProveedorRubro($objProveedor->id_proveedor_rubro);
			$objProveedorGaleria = new ProveedorGaleria;
			$aryImagenesXProveedor = $objProveedorGaleria->getGaleriaXProveedor($_GET['id_proveedor']);
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-catalogo">
						<div class="titulo">
							<?php echo $objProveedor->nombre_proveedor; ?>
                            <div class="regresar"><a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro2->id_proveedor_rubro ?>/1/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro2->nombre_proveedor_rubro) ?>">&laquo; Regresar a <?php echo $objProveedorRubro2->nombre_proveedor_rubro; ?></a></div>
                        </div>

                        <div class="izquierda">
                        
                            <div id="galleria">
                                <?php for($x = 0 ; $x < count($aryImagenesXProveedor) ; $x++){?>
                                    <a href="<?php echo _img_?>proveedores_fotos/<?php echo $aryImagenesXProveedor[$x]['imagen_proveedor_imagen']?>">
                                        <img title="qwer" alt="qewr" src="<?php echo _img_?>proveedores_fotos/<?php echo $aryImagenesXProveedor[$x]['imagen_proveedor_imagen']?>">
                                    </a>
                                <?php } ?>
                            </div>
    
                        </div>
                        <div class="derecha"></div>   
                        
                    </div>

                </div>
			<?php
		}

	}
?>