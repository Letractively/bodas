<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();

	if(isset($_GET['id_proveedor_publicacion'])){ $_SESSION['id_proveedor_publicacion'] = $_GET['id_proveedor_publicacion']; }
	if(!isset($_SESSION['id_proveedor_publicacion'])){ header("Location: ProveedorPublicacion.php"); }

	$objProveedoresPublicacionesComentarios = new ProveedoresPublicacionesComentarios();
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
                	<div class="opciones_internas"><?php $objProveedoresPublicacionesComentarios->cabecera(); ?></div>
                    <div class="contenido_interno">
					<?php
						switch($_GET['opcion']){
							case 'eliminar':
								$objProveedoresPublicacionesComentarios->eliminar($_GET['id']);
								$objProveedoresPublicacionesComentarios->listar();
							break;
							default:
								$objProveedoresPublicacionesComentarios->listar();
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
