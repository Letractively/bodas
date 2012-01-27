<?php include('inc.apptop.php'); ?>
<?php 
	$objProveedorRed = new ProveedorRed();
	$objProveedorRed->eliminar($_GET['id_proveedor_red_social']);
?>
<script type="text/javascript">location.replace('<?=_bs_?>/usuario/listar_red_social/');</script>