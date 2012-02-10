<?php include('inc.apptop.php'); ?>
<?php 
	include(_inc_."inc.header.php");
	$objVwLunaDeMiel = new VwLunaDeMiel();
?>
<body>
    <div id="window-cabecera"><div id="pagina"><?php include(_inc_.'inc.cabecera.php'); ?></div></div>

    <div id="window">
        <div id="pagina">
            <div id="cuerpo">
            		<?php include(_inc_.'inc.cabecera-cuerpo.php'); ?>
                    <?php $objVwLunaDeMiel->vista(); ?>
            </div>
        </div>
	</div>

    <div id="window-pie-menu"><div id="pagina"><?php include(_inc_.'inc.pie-menu.php'); ?></div></div>
    <div id="window-pie-datos"><div id="pagina"><?php include(_inc_.'inc.pie-datos.php'); ?></div></div>
	<?php include(_inc_.'inc.pie-fijo.php'); ?>
</body>
</html>
<?php include('inc.appbot.php'); ?>