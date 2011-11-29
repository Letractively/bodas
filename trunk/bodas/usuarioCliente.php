<?php include('inc.apptop.php'); ?>
<?php 
	include(_inc_."inc.header.php");
	$objVwUsuarioCliente = new VwUsuarioCliente();
?>
<body>
    <div id="window-cabecera"><div id="pagina"><?php include(_inc_.'inc.cabecera.php'); ?></div></div>

    <div id="window">
        <div id="pagina">
            <div id="cuerpo">
            		<?php include(_inc_.'inc.cabecera-cuerpo.php'); ?>
            		<?php include(_inc_.'inc.izquierda.php'); ?>
                    <?php
						switch($_GET['opcion']){
							case 'registrate':
								$objVwUsuarioCliente->registrate(); 
							break;
							case 'addusuario':
								$objVwUsuarioCliente->agregar_usuario(); 
							break;
							case 'editar_cuenta':
								$objVwUsuarioCliente->editar_cuenta(); 
							break;
							case 'login':
								$objVwUsuarioCliente->login(); 
							break;
							case 'recordar_contrasenia':
								$objVwUsuarioCliente->recordar(); 
							break;
							case 'salir':
								$objVwUsuarioCliente->salir(); 
							break;
							default:
								$objVwUsuarioCliente->registrate();
							break;
						}
					?>
            </div>
        </div>
	</div>

    <div id="window-pie-menu"><div id="pagina"><?php include(_inc_.'inc.pie-menu.php'); ?></div></div>
    <div id="window-pie-datos"><div id="pagina"><?php include(_inc_.'inc.pie-datos.php'); ?></div></div>
	<?php include(_inc_.'inc.pie-fijo.php'); ?>
</body>
</html>
<?php include('inc.appbot.php'); ?>