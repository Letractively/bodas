<?php
	class VwResultados extends Utiles{

		public function __construct(){}

		public function vista(){
			$objProveedor = new Proveedor;

			if( $_SESSION['rdoOpc'] == 'proveedores' ){

				if(isset($_POST['txtBuscar'])){
					$_SESSION['criterio'] = $_POST['txtBuscar'];
					$like = " AND p.nombre_proveedor LIKE '%".$_SESSION['criterio']."%' ";
				}else{
					if(isset($_SESSION['criterio'])){
						$like = " AND p.nombre_proveedor LIKE '%".$_SESSION['criterio']."%' ";
					}else{
						$_SESSION['criterio'] = $_POST['txtBuscar'];
						$like = " AND p.nombre_proveedor LIKE '%".$_SESSION['criterio']."%' ";
					}
				}

			}else if( $_SESSION['rdoOpc'] == 'rubros' ){
			
				if(isset($_POST['txtBuscar'])){
					$_SESSION['criterio'] = $_POST['txtBuscar'];
					$like = " AND pr.nombre_proveedor_rubro LIKE '%".$_SESSION['criterio']."%' ";
				}else{
					if(isset($_SESSION['criterio'])){
						$like = " AND pr.nombre_proveedor_rubro LIKE '%".$_SESSION['criterio']."%' ";
					}else{
						$_SESSION['criterio'] = $_POST['txtBuscar'];
						$like = " AND pr.nombre_proveedor_rubro LIKE '%".$_SESSION['criterio']."%' ";
					}
				}

			}

			$aryProveedores = $objProveedor->obtenerProveedoresXTexto(2,$like);

			if(count($aryProveedores) > 0){
				$listaPaginas = array_chunk($aryProveedores,12);
				$aryPagina = $listaPaginas[$_GET['pag']];
			}

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="contenido-central-temas">

						<div class="titulo">
                        	<p class="nombre-rubro">Resultados de la palabra "<?php echo $_SESSION['criterio'] ?>" en <?php echo $_SESSION['rdoOpc'] ?></p>
                            <p class="regresar">

                                <div class="contenedor-paginacion">
                                    <div class="paginacion">
                                        <a href="<?=_bs_?>resultados/0/">&laquo;</a>
                                        <?php for($x = 0 ; $x < count($listaPaginas) ; $x++){ ?>
                                            <a href="<?=_bs_?>resultados/<?php echo $x ?>/"><?php echo ($x+1); ?></a>
                                        <?php } ?>
                                        <a href="<?=_bs_?>resultados/<?php echo count($listaPaginas)-1; ?>/">&raquo;</a>
                                    </div>
                                </div>
                                
                            </p>
                        </div>

						<?php if(count($aryProveedores) > 0){ ?>

                            <div class="listado-noticias">

                                <?php 
								for($x = 0 ; $x < count($aryPagina) ; $x++){ ?>
                                    <div class="item">
                                        <div class="imagen"><a href="<?=_bs_?>catalogo/<?php echo $aryPagina[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryPagina[$x]['nombre_proveedor']) ?>"><img src="<?=_tt_."src=/aplication/webroot/imgs/proveedores/".$aryPagina[$x]['logo_proveedor']."&w=150&h=80";?>"></a></div>
                                        <div class="texto">
                                        	<p class="titulo-item"><b><a href="<?=_bs_?>catalogo/<?php echo $aryPagina[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryPagina[$x]['nombre_proveedor']) ?>"><?php echo $aryPagina[$x]['nombre_proveedor'] ?></a></b></p>
                                            <p><?php echo substr($aryPagina[$x]['descripcion1_proveedor'],0,120); ?> <a href="<?=_bs_?>catalogo/<?php echo $aryPagina[$x]['id_proveedor']?>/<?php echo $objUtilitarios->procesar_url_2($aryPagina[$x]['nombre_proveedor']) ?>">Ver más</a></p>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
						
                        <?php }else{ ?>
							<div class="item">No se encontraron resultados.</div>
						<?php } ?>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>