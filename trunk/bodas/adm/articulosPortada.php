<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();

	$obj = new ArticulosPortada();
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
                	<div class="opciones_internas"><?php $obj->cabecera(); ?></div>
                    <div class="contenido_interno">
					<?php
						switch($_GET['opcion']){
							case 'listar':
								$obj->listar();	
							break;							
							case 'editar':
								$obj->editar($_GET['id']);	
							break;
							case 'actualizar':												
								$obj->actualizar($_GET['id']);
								$obj->listar();
							break;
							
							default:
								$obj->listar();
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
