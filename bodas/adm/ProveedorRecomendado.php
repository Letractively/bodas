<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();
	
	if(isset($_GET['id_proveedor'])){ $_SESSION['id_proveedor'] = $_GET['id_proveedor']; }
	if(!isset($_SESSION['id_proveedor'])){ header("Location: Proveedor.php"); }
	
	$objProveedoresRecomendados = new ProveedoresRecomendados();
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
                	<div class="opciones_internas"><?php $objProveedoresRecomendados->cabecera(); ?></div>
                    <div class="contenido_interno">
					<?php
						switch($_GET['opcion']){
							case 'nuevo':
								$objProveedoresRecomendados->nuevo();
							break;
							case 'add_new':
								$objProveedoresRecomendados->agregar();
								$objProveedoresRecomendados->nuevo();
							break;
							case 'add_list':
								$objProveedoresRecomendados->agregar();
								$objProveedoresRecomendados->listar();
							break;
							case 'editar':
								$objProveedoresRecomendados->editar($_GET['id']);	
							break;
							case 'actualizar':												
								$objProveedoresRecomendados->actualizar($_GET['id']);
								$objProveedoresRecomendados->listar();
							break;
							case 'eliminar':
								$objProveedoresRecomendados->eliminar($_GET['id']);
								$objProveedoresRecomendados->listar();
							break;
							case 'imagenes':
								$objProveedoresRecomendados->imagenes($_GET['id']);
							break;
							default:
								$objProveedoresRecomendados->listar();
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
