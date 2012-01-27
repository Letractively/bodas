<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();
	$objUsuariosClientes = new UsuariosClientes();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include("includes/header.php"); ?>
    <body>
    	<div class="contenedor-principal">
            <div class="cabecera"><?php $objPlantilla->cabecera(); ?></div>
        	<div class="cuerpo">

                <div class="opciones"><?php $objPlantilla->izquierda(); ?></div>

                <div class="contenido">
                	<div class="opciones_internas"><?php $objUsuariosClientes->cabecera(); ?></div>
                    <div class="contenido_interno">
					<?php
						switch($_GET['opcion']){
							case 'nuevo':
								$objUsuariosClientes->nuevo();
							break;
							case 'add_new':
								$objUsuariosClientes->agregar();
								$objUsuariosClientes->nuevo();
							break;
							case 'add_list':
								$objUsuariosClientes->agregar();
								$objUsuariosClientes->listar();
							break;
							case 'editar':
								$objUsuariosClientes->editar($_GET['id']);	
							break;
							case 'actualizar':												
								$objUsuariosClientes->actualizar($_GET['id']);
								$objUsuariosClientes->listar();
							break;
							case 'eliminar':
								$objUsuariosClientes->eliminar($_GET['id']);
								$objUsuariosClientes->listar();
							break;
							case 'imagenes':
								$objUsuariosClientes->imagenes($_GET['id']);
							break;
							default:
								$objUsuariosClientes->listar();
							break;
						}
					?>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper"><div class="push"></div></div>
		<div class="pie"><?php $objPlantilla->pie(); ?></div>

    </body>

</html>
