<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();
	$id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include("includes/header.php"); ?>
    <body>
		<script type="text/javascript" src="<?php echo _js_?>usuario.js"></script>
    	<div class="contenedor-principal">
            <div class="cabecera"><?php $objPlantilla->cabecera(); ?></div>
        	<div class="cuerpo">

                <div class="opciones"><?php $objPlantilla->izquierda(); ?></div>

                <div class="contenido">
                	<div class="opciones_internas"><?php SeccionAdmin::SeccionAdminCabezera(); ?></div>
                    <div class="contenido_interno">
						<?php
						switch($_GET['opcion']){
							case 'add':
								SeccionAdmin::SeccionAdminAdd($id, $_POST);
								SeccionAdmin::SeccionAdminList($id);
							break;
							case 'list':
								SeccionAdmin::SeccionAdminList($id);
							break;
							default:
								SeccionAdmin::SeccionAdminList($id);
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