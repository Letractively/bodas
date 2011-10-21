<?php  
	include("inc.aplication_top.php");
	$objPlantilla = new Plantilla(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include("includes/header.php"); ?>
    <body>

		<style>
            html, body { height: 100%; }
            .wrapper { min-height: 100%; height: auto !important; height: 100%; margin: 0 auto -4em; }
            .pie, .push { height: 4em; }
        </style>

    	<div class="contenedor-principal">
            <div class="cabecera"><?php $objPlantilla->cabecera(); ?></div>
        	<div class="cuerpo">

                <div class="opciones"><?php $objPlantilla->izquierda(); ?></div>

                <div class="contenido">
                	<?php
						if($_GET['opcion']=='recuperar'){						
							$objPlantilla->recuperar_acceso();
						}else if($_SESSION['session']){
							
						}else{
							$objPlantilla->logeo();
						}
                    ?>
                </div>

            </div>

			<div class="wrapper"><div class="push"></div></div>

            <div class="pie"><?php $objPlantilla->pie(); ?></div>

        </div>

    </body>

</html>