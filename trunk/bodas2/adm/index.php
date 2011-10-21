<?php  
	include("inc.aplication_top.php");
	$objPlantilla = new Plantilla(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include("includes/header.php"); ?>
    <body>
        <table id="principal" align="center"cellpadding="0" cellspacing="0">
            <tr><td colspan="2"><?php $objPlantilla->cabecera(); ?></td></tr>
            <tr>
                <td class="menu"><?php $objPlantilla->izquierda(); ?></td>	
                <td style="width:500px;">
                	<div id="cuerpo">
						<?php
                            if($_GET['opcion']=='recuperar'){						
                                $objPlantilla->recuperar_acceso();
                            }else if($_SESSION['session']){
                                
                            }else{
                                $objPlantilla->logeo();
                            }
                        ?>							
                    </div>			
                </td>		
            </tr>
            <tr>
                <td colspan="2" class="pie"><?php $objPlantilla->pie(); ?></td>
            </tr>	
        </table>	
    </body>

</html>