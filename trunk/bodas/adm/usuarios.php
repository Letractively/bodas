<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();
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
                	<div class="opciones_internas"><?php Usuarios::UsuariosCabezera(); ?></div>
                    <div class="contenido_interno">
					<?php
					switch($_GET['opcion']){
						case 'new':
							Usuarios::UsuariosNew();
						break;
						case 'add_new':
							Usuarios::UsuariosAdd();
							Usuarios::UsuariosNew();
						break;
						case 'add_list':
							Usuarios::UsuariosAdd();
							Usuarios::UsuariosList();
						break;
						case 'edit':
							Usuarios::UsuariosEdit($_GET['id']);
						break;
						case 'update':
							Usuarios::UsuariosUpdate($_GET['id']);
							Usuarios::UsuariosList();
						break;
						case 'delete':
							Usuarios::UsuariosDelete($_GET['id']);
							Usuarios::UsuariosList();
						break;
						case 'list':
							Usuarios::UsuariosList();
						break;
						default:
							Usuarios::UsuariosList();
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
