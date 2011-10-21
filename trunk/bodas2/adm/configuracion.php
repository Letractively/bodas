<?php
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$template = new Plantilla();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include("includes/header.php"); ?>
    <body>
        <table id="principal" align="center"cellpadding="0" cellspacing="0">
            <tr><td colspan="2"><?php $template->cabecera(); ?></td></tr>
            <tr>
                <td class="menu"><?php $template->izquierda(); ?></td>	
                <td class="contenido">
                    <div id="cuerpo">
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
                </td>		
            </tr>
            <tr>
                <td colspan="2" class="pie"><?php $template->pie(); ?></td>
            </tr>	
        </table>	
    </body>

</html>