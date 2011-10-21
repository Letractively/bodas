<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$template = new Plantilla();
	$id1 = $_GET['id1'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include("includes/header.php"); ?>
    <body>
        <table id="principal" align="center"cellpadding="0" cellspacing="0">
            <tr><td colspan="2"><?php $template->PlantillaEncabezado(); ?></td></tr>
            <tr>
                <td class="menu"><?php $template->PlantillaIzquierdo(); ?></td>
                <td class="contenido">
                    <div id="cuerpo">
						<?php
							
                            if($_SESSION['session'][3]=="SI" ){
                                SeccionAdmin::SeccionAdminCabezera();
								?><div class="contenido_item"><?php
                                switch($_GET['opcion']){
                                    case 'add':
                                    SeccionAdmin::SeccionAdminAdd($id1, $_POST);
                                    break;
                                    case 'list':
                                    SeccionAdmin::SeccionAdminList($id1);
                                    break;
                                    default:
                                    SeccionAdmin::SeccionAdminList($id1);
                                    break;
                                }
								?></div><?php
                            }else if($_SESSION['session'][3]=="NO") {
                                echo "<div id=error> CUIDADO: Usted es Usuario del sistema pero no esta Autorizado para ver esta informacin </div><br><br>";
                            }else{
                                echo " ERROR: Usted esta entrando de manera Incorrecta !!! " ;
                            }
                        ?>
                    </div>	
                </td>
            </tr>
            <tr><td colspan="2" class="pie"><?php $template->PlantillaPie(); ?></td></tr>	
        </table>
    </body>
</html>


