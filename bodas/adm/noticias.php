<?php 
	include("inc.aplication_top.php");
	Sesion::SesionSiNoLogeado($url="index.php");
	$objPlantilla = new Plantilla();
	$obj = new Noticias;
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
                	<div class="opciones_internas"><?php $obj->cabecera(); ?></div>
                    <div class="contenido_interno">
						<div class="contenido_item">
							<?php
                                switch($_GET['opcion']){
                                    case 'nuevo':
                                        $obj->nuevo();
                                    break;
                                    case 'add_new':
                                        $obj->agregar();
                                        $obj->nuevo();
                                    break;
                                    case 'add_list':
                                        $obj->agregar();
                                        $obj->listar();
                                    break;
                                    case 'editar':
                                        $obj->editar($_GET['id']);	
                                    break;
                                    case 'actualizar':												
                                        $obj->actualizar($_GET['id']);
                                        $obj->listar();
                                    break;
                                    case 'eliminar':
                                        $obj->eliminar($_GET['id']);
                                        $obj->listar();
                                    break;
                                    case 'listar':
                                        $obj->listar();
                                    break;
                                    default:
                                        $obj->listar();
                                    break;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
		</div>

        <div class="wrapper"><div class="push"></div></div>
		<div class="pie"><?php $objPlantilla->pie(); ?></div>

    </body>

</html>
