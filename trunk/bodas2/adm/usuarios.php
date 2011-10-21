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
                            if($_SESSION['session'][3]=="SI"){
                                Usuarios::UsuariosCabezera();
								?><div class="contenido_item"><?php
                                switch($_GET['opcion']){
                                    case 'new':
                                        Usuarios::UsuariosNew();		
                                    break;
                                    case 'add':
                                        Usuarios::UsuariosAdd();
                                        Usuarios::UsuariosList();			
                                    break;									
                                    case 'edit':										
                                        Usuarios::UsuariosEdit($_GET['id']);	
                                    break;
                                    case 'update':
                                        Usuarios::UsuariosUpdate($id, $_POST);
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
								?></div><?php
                            }else if($_SESSION['session'][3]=="NO") {
                                echo "<div id='error'> Sin permisos </div>";		
                            }else{
                                echo " Sin autorizaci&oacute;n " ;
                            }	
                        ?>
                    </div>
                </td>		
            </tr>
            <tr><td colspan="2" class="pie"><?php $template->pie(); ?></td></tr>	
        </table>
    </body>
</html>
