<?php
	class VwProveedores{


		public function __construct(){}


		public function vista(){
			$objProveedor = new Proveedor;
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-proveedor">
                    
						<?php $objProveedorRubro = new ProveedorRubro($_GET['id_rubro']); ?>
                        
                        <div class="titulo">
                        	<p class="nombre-rubro"><?php echo $objProveedorRubro->nombre_proveedor_rubro ?></p>
                            <p class="regresar">&laquo; <a href="#">regresar</a></p>
                        </div>

                        <div class="articulos-relacionador">
                        	<div class="titulo-articulo">Articulos relacionados</div>
                            
                            <div class="item-articulo borde">
                            	<img src="<?php echo _img_?>img-articulo-relacionado.png" align="left">
                                <h4>Las recepciones</h4>
                                <p>Lorem ipsum dolor sit amet, adipiscing elit. Etiam eleifend rhoncus pellentesque. Suspendisse aliquet convallis mattis. <a href="#">Ver más</a></p>
                            </div>
                            
                            <div class="item-articulo">
                            	<img src="<?php echo _img_?>img-articulo-relacionado.png" align="left">
                                <h4>La fiesta</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eleifend rhoncus pellentesque. Suspendisse aliquet mattis. <a href="#">Ver más</a></p>
                            </div>
                            
                        </div>

                        <!--<div class="proveedores-destacados">
                        	<div class="titulo">PROVEEDORES DESTACADOS</div>

                            <?php 
							$aryProveedoresDestacados = $objProveedor->obtenerProveedoresXRubroYTipo(1,$_GET['id_rubro']);
							for($x = 0 ; $x < count($aryProveedoresDestacados) ; $x++){?>
                                <div class="item">
                                    <p><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresDestacados[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresDestacados[$x]['nombre_proveedor']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$aryProveedoresDestacados[$x]['logo_proveedor']."&w=150&h=80";?>"></a></p>
                                    <p><b><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresDestacados[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresDestacados[$x]['nombre_proveedor']) ?>"><?php echo $aryProveedoresDestacados[$x]['nombre_proveedor'] ?></a></b></p>
                                    <p><?php echo $aryProveedoresDestacados[$x]['descripcion1_proveedor'] ?></p>
                                </div>
                            <?php } ?>
                        </div>-->

                        <div class="proveedores-normal">
                        	<div class="titulo"><p>LISTADO PROVEEDORES</p></div>

                            <?php 
							$aryProveedoresNormal = $objProveedor->obtenerProveedoresXRubroYTipo(2,$_GET['id_rubro']);
							for($x = 0 ; $x < count($aryProveedoresNormal) ; $x++){?>
                                <div class="item">
                                    <p><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresNormal[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresNormal[$x]['nombre_proveedor']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$aryProveedoresNormal[$x]['logo_proveedor']."&w=150&h=80";?>"></a></p>
                                    <p><b><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresNormal[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresNormal[$x]['nombre_proveedor']) ?>"><?php echo $aryProveedoresNormal[$x]['nombre_proveedor'] ?></a></b></p>
                                    <p><?php echo $aryProveedoresNormal[$x]['descripcion1_proveedor'] ?></p>
                                </div>
                            <?php } ?>
                        </div>

						<?php
                       		$aryProveedoresMensionados = $objProveedor->obtenerProveedoresXRubroYTipo(3,$_GET['id_rubro']);
							if(count($aryPaginasProveedores) > 0){
								$aryPaginasProveedores = array_chunk($aryProveedoresMensionados,15);
							}
						?>

						<div class="contenedor-paginacion">
                        	<div class="paginacion">
                            	<a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/a/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>">&laquo;</a>
                                <a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/a/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>">1</a>
                                <?php for($x = 0 ; $x < count($aryPaginasProveedores) ; $x++){ ?>
                                	<a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/<?php echo $x; ?>/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>"><?php echo ($x+2); ?></a>
                                <?php } ?>
                                <a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/<?php 
								if(count($aryPaginasProveedores) > 0)
									{ echo count($aryPaginasProveedores)-1; }
								else
									{ echo "a"; }
								?>/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>">&raquo;</a>
                            </div>
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

		public function mensionados(){
			$objProveedor = new Proveedor;
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-proveedor">
                    
						<?php $objProveedorRubro = new ProveedorRubro($_GET['id_rubro']); ?>
                        
                        <div class="titulo">
                        	<p class="nombre-rubro"><?php echo $objProveedorRubro->nombre_proveedor_rubro ?></p>
                            <p class="regresar">&laquo; <a href="#">regresar</a></p>
                        </div>

                        <div class="articulos-relacionador">
                        	<div class="titulo-articulo">Articulos relacionados</div>
                            
                            <div class="item-articulo borde">
                            	<img src="<?php echo _img_?>img-articulo-relacionado.png" align="left">
                                <h4>Las recepciones</h4>
                                <p>Lorem ipsum dolor sit amet, adipiscing elit. Etiam eleifend rhoncus pellentesque. Suspendisse aliquet convallis mattis. <a href="#">Ver más</a></p>
                            </div>
                            
                            <div class="item-articulo">
                            	<img src="<?php echo _img_?>img-articulo-relacionado.png" align="left">
                                <h4>La fiesta</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eleifend rhoncus pellentesque. Suspendisse aliquet mattis. <a href="#">Ver más</a></p>
                            </div>
                            
                        </div>

                        <!--<div class="proveedores-destacados">
                        	<div class="titulo">PROVEEDORES DESTACADOS</div>

                            <?php 
							$aryProveedoresDestacados = $objProveedor->obtenerProveedoresXRubroYTipo(1,$_GET['id_rubro']);
							for($x = 0 ; $x < count($aryProveedoresDestacados) ; $x++){?>
                                <div class="item">
                                    <p><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresDestacados[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresDestacados[$x]['nombre_proveedor']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$aryProveedoresDestacados[$x]['logo_proveedor']."&w=150&h=80";?>"></a></p>
                                    <p><b><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresDestacados[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresDestacados[$x]['nombre_proveedor']) ?>"><?php echo $aryProveedoresDestacados[$x]['nombre_proveedor'] ?></a></b></p>
                                    <p><?php echo $aryProveedoresDestacados[$x]['descripcion1_proveedor'] ?></p>
                                </div>
                            <?php } ?>
                        </div>-->

                        <div class="proveedores-normal">
                        	<div class="titulo"><p>LISTADO PROVEEDORES</p></div>

                            <?php 
							
                       		$aryProveedoresMensionados = $objProveedor->obtenerProveedoresXRubroYTipo(3,$_GET['id_rubro']);
							$aryPaginasProveedores = array_chunk($aryProveedoresMensionados,15);
							$aryProveedores = $aryPaginasProveedores[$_GET['pag']];
							
							for($x = 0 ; $x < count($aryProveedores) ; $x++){?>
                                <div class="item">
                                    <p><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$aryProveedores[$x]['logo_proveedor']."&w=150&h=80";?>"></p>
                                    <p><b><?php echo $aryProveedores[$x]['nombre_proveedor'] ?></b></p>
                                    <p><?php echo $aryProveedores[$x]['descripcion1_proveedor'] ?></p>
                                </div>
                            <?php } ?>
                        </div>

						<div class="contenedor-paginacion">
                        	<div class="paginacion">
                            	<a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/a/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>">&laquo;</a>
                                <a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/a/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>">1</a>
                                <?php for($x = 0 ; $x < count($aryPaginasProveedores) ; $x++){ ?>
                                	<a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/<?php echo $x; ?>/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>"><?php echo ($x+2); ?></a>
                                <?php } ?>
                                <a href="<?=_bs_?>proveedores/<?php echo $objProveedorRubro->id_proveedor_rubro ?>/<?php echo count($aryPaginasProveedores)-1; ?>/<?php echo $objUtilitarios->procesar_url_2($objProveedorRubro->nombre_proveedor_rubro) ?>">&raquo;</a>
                            </div>
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}
		
	}
?>