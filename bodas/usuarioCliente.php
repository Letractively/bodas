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
							case 'updateusuario':
								$objVwUsuarioCliente->updateusuario(); 
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
							case 'faqs_usuario_cliente':
								$objVwUsuarioCliente->faqs_usuario_cliente(); 
							break;
							case 'editar_informacion_empresa':
								$objVwUsuarioCliente->editar_informacion_empresa(); 
							break;
							case 'updateinformacionempresa':
								$objVwUsuarioCliente->updateinformacionempresa(); 
							break;
							
							case 'faqs_usuario_cliente':
								$objVwUsuarioCliente->faqs_usuario_cliente(); 
							break;
							
							case 'listar_recomendados':
								$objVwUsuarioCliente->listar_recomendados(); 
							break;
							case 'nuevo_recomendado':
								$objVwUsuarioCliente->nuevo_recomendado(); 
							break;
							case 'guardar_recomendado':
								$objVwUsuarioCliente->guardar_recomendado(); 
							break;
							
							case 'listar_red_social':
								$objVwUsuarioCliente->listar_red_social(); 
							break;
							case 'nuevo_red_social':
								$objVwUsuarioCliente->nuevo_red_social(); 
							break;
							case 'guardar_red_social':
								$objVwUsuarioCliente->guardar_red_social(); 
							break;
							
							case 'galeria_proveedor':
								$objVwUsuarioCliente->galeria_proveedor(); 
							break;
							
							case 'resumen_estadisticas':
								$objVwUsuarioCliente->resumen_estadisticas(); 
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