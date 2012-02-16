<?php
	class VwProveedores{


		public function __construct(){}


		public function vista(){
			$objProveedor = new Proveedor;
			
			$aryProveedoresNormal = $objProveedor->obtenerProveedoresXRubroYTipo(2,$_GET['id_rubro']);

			$aryProveedoresMensionados = $objProveedor->obtenerProveedoresXRubroYTipo(3,$_GET['id_rubro']);

			if(count($aryProveedoresMensionados) > 0){
				$aryPaginasProveedores = array_chunk($aryProveedoresMensionados,27);
			}

			$objRubrosArticulos = new RubrosArticulos;
			$aryArticulosRelacionados = $objRubrosArticulos->obtenerArticulosXRubro($_GET['id_rubro']);

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-proveedor">
                    
						<?php $objProveedorRubro = new ProveedorRubro($_GET['id_rubro']); ?>
                        
                        <div class="titulo">
                        	<p class="nombre-rubro"><?php echo $objProveedorRubro->nombre_proveedor_rubro ?></p>
                        </div>

                        <div class="articulos-relacionador">
                        	<div class="titulo-articulo">Articulos relacionados</div>
                            
                            <?php for($x = 0 ; $x < 2 ; $x++){ 
								$objArticulo = new Articulo($aryArticulosRelacionados[$x]['id_articulo']);
								?>
                                <div class="item-articulo <?php if($x == 0){ echo "borde"; }?>">
                                    <a href="<?=_bs_?>noticias_detalle/<?php echo $objArticulo->id; ?>/<?php echo $objUtilitarios->procesar_url_2($objArticulo->titulo) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/articulos_fotos/".$objArticulo->imagen."&w=110&h=90";?>" align="left"></a>
                                    <h4><?php echo substr($objArticulo->titulo,0,60); ?></h4>
                                    <p><?php echo substr($objArticulo->descripcion1,0,80); ?> <a href="<?=_bs_?>noticias_detalle/<?php echo $objArticulo->id; ?>/<?php echo $objUtilitarios->procesar_url_2($objArticulo->titulo) ?>">Ver más</a></p>
                                </div>
                            <?php } ?>

                        </div>

						<?php if(count($aryProveedoresNormal) > 0){ ?>
                            <div class="proveedores-normal">
                                <div class="titulo"><p>LISTADO PROVEEDORES CON PERFIL</p></div>
                                <div class="texto-descriptivo">Haz click en la imagen para acceder a los perfiles.</div>
                                <?php for($x = 0 ; $x < count($aryProveedoresNormal) ; $x++){?>
                                    <div class="item">
                                        <p><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresNormal[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresNormal[$x]['nombre_proveedor']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$aryProveedoresNormal[$x]['logo_proveedor']."&w=150&h=80";?>"></a></p>
                                        <p><b><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresNormal[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresNormal[$x]['nombre_proveedor']) ?>"><?php echo $aryProveedoresNormal[$x]['nombre_proveedor'] ?></a></b></p>
                                        <p><?php echo substr($aryProveedoresNormal[$x]['descripcion1_proveedor'],0,50); ?></p>
                                        <div class="btn-verperfil"><a href="<?=_bs_?>catalogo/<?php echo $aryProveedoresNormal[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryProveedoresNormal[$x]['nombre_proveedor']) ?>">Ver perfil</a></div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if(count($aryProveedoresMensionados) > 0){ ?>
                            <div class="proveedores-normal">
                                <div class="titulo"><p>LISTADO PROVEEDORES</p></div>
                                <?php for($x = 0 ; $x < count($aryProveedoresMensionados) ; $x++){?>
                                    <div class="item">
                                        <p><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$aryProveedoresMensionados[$x]['logo_proveedor']."&w=150&h=80";?>"></p>
                                        <p><b><?php echo $aryProveedoresMensionados[$x]['nombre_proveedor'] ?></b></p>
                                        <p><?php echo $aryProveedoresMensionados[$x]['descripcion1_proveedor'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}


	}
?>