<?php
	class Noticias extends Utilitarios{


		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>Noticias.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de noticias.</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="noticias.php?opcion=listar"> Listar </a></li>
                        <li><a href="noticias.php?opcion=nuevo"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){

			$sqln = "SELECT id_noticia, titulo, fecha FROM noticias ORDER BY id_noticia";
			$qryn = new Consulta($sqln);		
			$numc = $qryn->NumeroRegistros();
			?>
            <table class='reporte display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Id</th>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Opc.</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                        while ($rw = mysql_fetch_array($qryn->Consulta_ID)) {
                            ?>
                            <tr>
                            	<td><?php echo $rw[0]?></td>
                                <td><?php echo $rw[1]?></td>
                                <td><?php echo $rw[2]?></td>
                                <td align="center">
                                    <a href='noticias.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                    <a href='noticias_comentarios.php?id_not=<?php echo $rw[0]?>' title='Ver comentarios'><img src="<?php echo _icn_ ?>publicaciones.png"></a>
                                    <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="noticias.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
                                <?php
                            echo "</td></tr>";
                        }
                    ?>
                </tbody>
			</table>
			<?php	
		}


		public function nuevo(){
			?>
                <form id="frmNoticiaNuevo" name="frmNoticiaNuevo" action="" method="post" enctype="multipart/form-data">

                	<h2>Nueva noticia</h2>
                    
                    <div class="itm">
                    	<label>Titulo: </label><input type="text" id="titulo" name="titulo" class="input" maxlength="40">
                    </div>
                    
                    <div class="itm">
                    	<label>Fecha: </label><input type="text" id="fecha" name="fecha" class="input dp" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="itm">
                    	<label>Descripción corta: </label>
                    	<textarea id="des_1" name="des_1"></textarea>
                    </div>
                    
                    <div class="itm">
                    	<label>Descripción larga: </label>
                        <br clear="all">
                        <textarea id="des_2" name="des_2"></textarea>
                    </div>

					<div class="itm">
                    	<label>Imagen de la noticia: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>
					
                    <div class="itm">
                    	<label>Estado comentarios: </label>
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="0">Desactivado
                    </div>
                    
                    <div class="itm">
                    	<label>Estado noticia: </label>
                        <input type="radio" id="rdoEstadoNoticia" name="rdoEstadoNoticia" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoNoticia" name="rdoEstadoNoticia" value="0">Desactivado
                    </div>
                    
                    <div class="itm">
                        <input type="submit" id="noticia_guardar_nuevo" value="Guardar y crear nuevo" />
                        <input type="submit" id="noticia_guardar_listar" value="Guardar y listar" />
                      <input type="reset" name="reset" value="Limpiar">
                    </div>

                    <div class="itm"><a href="noticias.php">Regresar</a></div>

                </form>
			<?php
		}


		public function agregar(){
			$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'noticias');

			$Query = new Consulta("INSERT INTO noticias VALUES('',
				'".$_POST['fecha']."',
				'".$_POST['titulo']."',
				'".$_POST['des_1']."',
				'".$_POST['des_2']."',
				'".$img."',
				'',
				'".$_POST['rdoEstadoComentarios']."',
				'".$_POST['rdoEstadoNoticia']."'
			)");
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
		}


		public function editar($id){
			$objNoticia = new Noticia($id);
			?>
            
                <form id="frmNoticiaEdita" name="frmNoticiaEdita" action="" method="post" enctype="multipart/form-data">
                	
                    <h2>Editar noticia</h2>
                    
                    <div class="itm">
                    	<label>Titulo: </label><input type="text" id="titulo" name="titulo" class="input" maxlength="40" value="<?php echo $objNoticia->titulo; ?>">
                    </div>
                    
                    <div class="itm">
                    	<label>Fecha: </label><input type="text" id="fecha" name="fecha" class="input dp" value="<?php echo $objNoticia->fecha; ?>">
                    </div>
                    <div class="itm">
                    	<label>Descripción corta: </label>
                    	<textarea id="des_1" name="des_1"><?php echo $objNoticia->descripcion_1; ?></textarea>
                    </div>
                    
                    <div class="itm">
                    	<label>Descripción larga: </label>
                        <br clear="all">
                        <textarea id="des_2" name="des_2"><?php echo $objNoticia->descripcion_2; ?></textarea>
                    </div>

					<div class="itm">
                    	<label>Imagen de la noticia: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>

                    <div class="itm">
                    	<label>Imagen actual: </label>
                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/noticias/".$objNoticia->imagen_1."&w=170";?>" alt="<?php echo $objNoticia->nombre_proveedor; ?>" />
                        <?php echo $objNoticia->imagen_1; ?>
                    </div>

                    <div class="itm">
                    	<label>Estado comentarios: </label>
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="0" <?php if($objNoticia->estado_comentarios == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>
                    
                    <div class="itm">
                    	<label>Estado noticia: </label>
                        <input type="radio" id="rdoEstadoNoticia" name="rdoEstadoNoticia" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoNoticia" name="rdoEstadoNoticia" value="0" <?php if($objNoticia->estado_noticia == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

                    <div class="itm">
                   		<input type="hidden" id="id_noticia" value="<?php echo $objNoticia->id; ?>" />
                        <input type="submit" id="noticia_editar_listar" value="Guardar y listar" />
                    	<input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="noticias.php">Regresar</a></div>

                </form>

			<?php
		}


		public function actualizar($id){
			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
					$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'noticias');
					$logo = "imagen_1 = '".$img."',";
			}

			$sql = " UPDATE noticias SET 
										fecha			=	'".$_POST['fecha']."', 
										".$logo."
										titulo			=	'".$_POST['titulo']."', 
										descripcion_1	=	'".$_POST['des_1']."', 
										descripcion_2	=	'".$_POST['des_3']."',
										estado_comentarios	=	'".$_POST['rdoEstadoComentarios']."',
										estado_noticia	=	'".$_POST['rdoEstadoNoticia']."'
									WHERE id_noticia = '".$id."'";

			$Query = new Consulta($sql);

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


		public function eliminar($id){	
			$objNoticia = new Noticia($id);
			if($objNoticia->imagen_1 != '') unlink('../aplication/webroot/imgs/noticias/'.$objNoticia->imagen_1);
			$Query = new Consulta( "DELETE FROM noticias WHERE id_noticia=".$id."");
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php			
		}


	}
?>