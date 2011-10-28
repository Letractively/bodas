<?php 
	session_start();
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();
	$objProveedoresRubros = new ProveedoresRubros();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include("includes/header.php"); ?>
    <body>
		<script type="text/javascript" src="<?php echo _js_?>ProveedorRubro.js"></script>
    	<div class="contenedor-principal">
            <div class="cabecera"><?php $objPlantilla->cabecera(); ?></div>
        	<div class="cuerpo">

                <div class="opciones"><?php $objPlantilla->izquierda(); ?></div>

                <div class="contenido">
                	<div class="opciones_internas"><?php $objProveedoresRubros->cabecera(); ?></div>
                    <div class="contenido_interno">
					<?php
						switch($_GET['opcion']){
							case 'nuevo':
								$objProveedoresRubros->nuevo();
							break;
							case 'add_new':
								$objProveedoresRubros->agregar();
								$objProveedoresRubros->nuevo();
							break;
							case 'add_list':
								$objProveedoresRubros->agregar();
								$objProveedoresRubros->listar();
							break;
							case 'editar':
								$objProveedoresRubros->editar($_GET['id']);	
							break;
							case 'actualizar':												
								$objProveedoresRubros->actualizar($_GET['id']);
								$objProveedoresRubros->listar();
							break;
							case 'eliminar':
								$objProveedoresRubros->eliminar($_GET['id']);
								$objProveedoresRubros->listar();
							break;
							case 'listar':
								$objProveedoresRubros->listar();
							break;
							default:
								$objProveedoresRubros->listar();
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
