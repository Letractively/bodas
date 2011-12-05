<?php include('inc.apptop.php'); ?>
<?php 
	$objProveedorRecomendado = new ProveedorRecomendado();
	$objProveedorRecomendado->eliminar($_GET['id_proveedor_recomendado']);
?>
<script type="text/javascript">location.replace('<?=_bs_?>/usuario/listar_recomendados/');</script>