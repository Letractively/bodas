<?php
	class VwCatalogo{

		public function __construct(){}

		public function vista(){
			$objProveedor = new Proveedor($_GET['id_proveedor']);
			$objProveedorRubro2 = new ProveedorRubro($objProveedor->id_proveedor_rubro);
			$objProveedorGaleria = new ProveedorGaleria;
			$aryImagenesXProveedor = $objProveedorGaleria->getGaleriaXProveedor($_GET['id_proveedor']);
			
			$objProveedorRed = new ProveedorRed;
			$aryRedesSocuales = $objProveedorRed->obtenerRedesXProveedor($_GET['id_proveedor']);
			
			$objProveedorRecomendado = new ProveedorRecomendado;
			$aryRecomendados = $objProveedorRecomendado->obtenerProveedoresRecomendadosXProveedor($_GET['id_proveedor']);
			
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
    
    						<div class="texto">
                            	<img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$objProveedor->logo_proveedor."&w=150&h=80";?>" align="left">
                                <?php echo $objProveedor->descripcion2_proveedor ?>
                            </div>

                        </div>
                        <div class="derecha">
                        	
                            <div class="titulo">UBICANOS</div>
                            
                            <div class="datos-direccion">
                            	<p><b>Direccion</b></p>
                                <p><?php echo $objProveedor->direccion_proveedor ?></p>
                                
                                <p><b>Telefono</b></p>
                                <p><?php echo $objProveedor->telefono1_proveedor ?></p>
                                <p><?php echo $objProveedor->telefono2_proveedor ?></p>
                                <p><?php echo $objProveedor->telefono3_proveedor ?></p>
                                <p><?php echo $objProveedor->telefono4_proveedor ?></p>
                                
                                <p><b>Email</b></p>
                                <p><?php echo $objProveedor->email_proveedor ?></p>
                                
                                <p><b>Web</b></p>
                                <p><?php echo $objProveedor->web_proveedor ?></p>
                            </div>
                        
                        	<div class="mapa">
                            	<?php echo $objProveedor->mapa_proveedor ?>
                            </div>
                        
                        	<div class="titulo">SIGUENOS EN:</div>
                        	
                        	<div class="redes">
                            	<?php for($x = 0 ; $x < count($aryRedesSocuales) ; $x++){ ?>
									<a href="<?php echo $aryRedesSocuales[$x]['link_proveedor_red_social']?>" target="_blank" title="<?php echo $aryRedesSocuales[$x]['link_proveedor_red_social']?>"><img src="<?php echo _img_?>/<?php echo $aryRedesSocuales[$x]['imagen_red_social']?>"></a>
								<?php } ?>
                            </div>
                        
                        	<div class="titulo">TE RECOMENDAMOS A:</div>
                        
                        	<div class="recomendados">
                            	<?php for($x = 0 ; $x < count($aryRecomendados) ; $x++){ ?>
									<a href="<?php echo $aryRecomendados[$x]['link_proveedor_recomendado']?>" target="_blank" title="<?php echo $aryRecomendados[$x]['link_proveedor_recomendado']?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores_recomendados/".$aryRecomendados[$x]['imagen_proveedor_recomendado']."&w=54&h=54";?>"></a>
								<?php } ?>
                            </div>
                        
                        </div>   
                        
                    </div>

                </div>
			<?php
		}

	}
?>