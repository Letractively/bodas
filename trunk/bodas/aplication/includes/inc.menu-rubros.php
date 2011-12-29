<?php 
	$objProveedorRubro = new ProveedorRubro;
	$aryRubros = $objProveedorRubro->obtenerProveedores();
	$objUtilitarios = new Utilitarios;
?>
<div id="menu-categorias">
	<div class="titulo"><p>PROVEEDORES</p></div>
    <div class="lista">
        <ul>
        <?php for($x = 0 ; $x < count($aryRubros) ; $x++){ ?>
                <li><p><a id="<?php if($_GET['id_rubro'] == $aryRubros[$x]['id_proveedor_rubro'] ){ echo "activo"; }?>" href="<?=_bs_?>proveedores/<?php echo $aryRubros[$x]['id_proveedor_rubro']?>/a/<?php echo $objUtilitarios->procesar_url_2($aryRubros[$x]['nombre_proveedor_rubro']) ?>"><?php echo $aryRubros[$x]['nombre_proveedor_rubro']?></a></p></li>
        <?php } ?>
        </ul>
    </div>
</div>