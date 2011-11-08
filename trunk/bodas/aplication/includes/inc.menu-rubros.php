<?php 
	$objProveedorRubro = new ProveedorRubro;
	$aryRubros = $objProveedorRubro->obtenerProveedores();
?>
<div id="menu-categorias">
	<div class="titulo"><p>PROVEEDORES</p></div>
    <div class="lista">
        <ul>
        <?php for($x = 0 ; $x < count($aryRubros) ; $x++){ ?>
                <li><p><a href="/proveedores/<?php echo $aryRubros[$x]['id_proveedor_rubro']?>/<?php echo $aryRubros[$x]['nombre_proveedor_rubro']?>"><?php echo $aryRubros[$x]['nombre_proveedor_rubro']?></a></p></li>
        <?php } ?>
        </ul>
    </div>
</div>