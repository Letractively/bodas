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
                	<?php
                        $configuration = new configuration();
						$configuration->cabecera();
						?><div class="contenido_item"><?php
                        switch($_GET['opcion']){
                            case 'edit':
                                $configuration->editConfiguration($_GET['id1']);
                            break;
                            case 'update':
                                $configuration->updateConfiguration($_GET['id1']);
                                $configuration->listConfiguration();
                            break;
                            case 'listado':
                                $configuration->listConfiguration();
                            break;
                            default:
                                $configuration->listConfiguration();
                            break;
                        }
						?></div><?php
                    ?>
                </div>
            </div>
        </div>

        <div class="wrapper"><div class="push"></div></div>
		<div class="pie"><?php $objPlantilla->pie(); ?></div>

    </body>

</html>