<?php
	class Articulos extends Utilitarios{


		public function cabecera(){
			$obj = new ArticuloTipo($_SESSION['id_articulo_tipo']);
			?>
            <script type="text/javascript" src="<?php echo _js_?>articulo.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de articulos de <b><?php echo utf8_encode($obj->nombre); ?></b></div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="articulo.php?opcion=listar"> Listar </a></li>
                        <li><a href="articulo.php?opcion=nuevo"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){
			$sql = "
				SELECT 
				  id_articulo,			
				  titulo,
				  fecha
				FROM 
					articulos
				WHERE
					id_articulo_tipo = ".$_SESSION['id_articulo_tipo']."
				ORDER BY id_articulo DESC
			";

			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <div id="contentLeft">
                <input type="hidden" id="opcion" name="opcion" value="catalogo">
                <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Opc.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($rw = mysql_fetch_array($qry->Consulta_ID)) {
                                ?>
                                <tr>
                                    <td><?php echo $rw[0]?></td>
									<td><?php echo $rw[1]?></td>
                                    <td><?php echo $rw[2]?></td>
                                    <td align="center">
                                    	<a href='articulo.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                        <a href='articuloComentario.php?id_articulo=<?php echo $rw[0]?>' title="Comentarios"><img src="<?php echo _icn_ ?>publicaciones.png"></a>
										<a href='articulo.php?id=<?php echo $rw[0]?>&opcion=imagenes' title="Imagenes"><img src="<?php echo _icn_ ?>images.png"></a>
										<a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="articulo.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
                                <?php echo "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="itm"><a href="articuloTipo.php">Regresar</a></div>
            
			<?php	
		}


		public function nuevo(){
			?>
                <form id="frmNuevo" name="frmNuevo" action="" method="post" enctype="multipart/form-data">
                	<h2>Nuevo articulo</h2>

                	<div class="itm"><label>Titulo: </label><input type="text" id="txtTitulo" name="txtTitulo" /></div>

                    <div class="itm">
                    	<label>Descripción corta: </label>
                    	<textarea id="txtDescripcionCorta" name="txtDescripcionCorta"></textarea>
                    </div>
                    <div class="itm">
                    	<label>Descripción larga: </label>
                        <br clear="all">
                        <textarea id="des_2" name="des_2"></textarea>
                    </div>
                    <div class="itm"><label>Fecha: </label><input type="text" id="txtFecha" name="txtFecha" class="dtp2" value="<?php echo date('Y-m-d h:i:s'); ?>" /></div>
                    
                    <div class="itm">
                    	<label>Estado articulo: </label>
                        <input type="radio" id="rdoEstadoArticulo" name="rdoEstadoArticulo" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoArticulo" name="rdoEstadoArticulo" value="0">Desactivado
                    </div>

					<div class="itm">
                    	<label>Estado comentarios: </label>
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="0">Desactivado
                    </div>
                    
                    <div class="itm">
                    	<label>Estado fecha: </label>
                        <input type="radio" id="rdoEstadoFecha" name="rdoEstadoFecha" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoFecha" name="rdoEstadoFecha" value="0">Desactivado
                    </div>

                    <div class="itm">
                        <input type="submit" id="guardar_nuevo" value="Guardar y crear nuevo" />
                        <input type="submit" id="guardar_listar" value="Guardar y listar" />
                      <input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="articulo.php">Regresar</a></div>
                </form>
			<?php
		}

		public function agregar(){

			$Query = new Consulta("INSERT INTO articulos VALUES('',
				'".$_SESSION['id_articulo_tipo']."',
				'".$_POST['txtTitulo']."',
				'".$_POST['txtDescripcionCorta']."',
				'".$_POST['des_2']."',
				'".$_POST['txtFecha']."',
				'".$_POST['rdoEstadoArticulo']."',
				'".$_POST['rdoEstadoComentarios']."',
				'".$_POST['rdoEstadoFecha']."'
			)");
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
		}

		public function editar($id){
			$obj = new Articulo($id);
			?>
                <form id="frmEdita" name="frmEdita" action="" method="post" enctype="multipart/form-data">
                	<h2>Editar articulo</h2>

                    <div class="itm"><label>Titulo: </label><input type="text" id="txtTitulo" name="txtTitulo" value="<?php echo $obj->titulo; ?>" /></div>
                    
                    <div class="itm">
                    	<label>Descripción corta: </label>
                    	<textarea id="txtDescripcionCorta" name="txtDescripcionCorta"><?php echo $obj->descripcion1; ?></textarea>
                    </div>
                    <div class="itm">
                    	<label>Descripción larga: </label>
                        <br clear="all">
                        <textarea id="des_2" name="des_2"><?php echo $obj->descripcion2; ?></textarea>
                    </div>
                    <div class="itm"><label>Fecha: </label><input type="text" id="txtFecha" name="txtFecha" class="dtp2" value="<?php echo $obj->fecha; ?>" /></div>
                    
                    <div class="itm">
                    	<label>Estado articulo: </label>
                        <input type="radio" id="rdoEstadoArticulo" name="rdoEstadoArticulo" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoArticulo" name="rdoEstadoArticulo" value="0" <?php if($obj->estado == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

					<div class="itm">
                    	<label>Estado comentarios: </label>
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoComentarios" name="rdoEstadoComentarios" value="0" <?php if($obj->estado_comentarios == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

					<div class="itm">
                    	<label>Estado fecha: </label>
                        <input type="radio" id="rdoEstadoFecha" name="rdoEstadoFecha" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstadoFecha" name="rdoEstadoFecha" value="0" <?php if($obj->estado_fecha == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

                    <div class="itm">
                   		<input type="hidden" id="id_articulo" value="<?php echo $obj->id; ?>" />
                        <input type="submit" id="editar_lista" value="Guardar y listar" />
                        <input type="submit" id="editar_regresar" value="Actualizar" />
                    	<input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="articulo.php">Regresar</a></div>
                </form>
			<?php
		}

		public function actualizar($id){

			$Query = new Consulta(" UPDATE articulos SET 
				titulo = '".$_POST['txtTitulo']."',
				descripcion1 = '".$_POST['txtDescripcionCorta']."',
				descripcion2 = '".$_POST['des_2']."',
				fecha = '".$_POST['txtFecha']."',
				estado = '".$_POST['rdoEstadoArticulo']."',
				estado_comentarios = '".$_POST['rdoEstadoComentarios']."',
				estado_fecha = '".$_POST['rdoEstadoFecha']."'
			WHERE id_articulo = '".$id."'");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


		public function eliminar($id){
			if($id > 0){
				$Query = new Consulta("DELETE FROM articulos WHERE id_articulo = ".$id."");
				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}

		public function imagenes($id){

			$obj = new ArticuloGaleria;
			$aryFotos = $obj->getGaleriaXArticulo($id);

			?>
				<h2>Editar imagenes del proveedor</h2>
                <div class="swfupload-articulo-imagenes">
                    <input type="button" id="upload_button" />
                    <input type="hidden" id="nombre_archivo" name="nombre_archivo" class="input file" readonly>
                    <ol class="log"></ol>
                </div>
                
                <div class="cont_imagenes">
                    <div class="eliminar_imagen"></div>
                    <?php for($x=0 ; $x < count($aryFotos) ; $x++){ ?>
                        <div id="foto_<?php echo $aryFotos[$x]['id_articulo_imagen'] ?>" nom_foto="<?php echo $aryFotos[$x]['imagen']; ?>" class="item_img">
                            <div class="eliminar_imagen" title="<?php echo $aryFotos[$x]['id_articulo_imagen'] ?>" >X</div>
                            <div class="nombre"><img src="<?=_tt_."src=../aplication/webroot/imgs/articulos_fotos/".$aryFotos[$x]['imagen']."&w=80";?>"></div>
                        </div>
                    <?php } ?>
                </div>
                
                <input type="hidden" id="id_articulo" name="id_articulo" value="<?php echo $id ?>">
			<?php	
		}

	}
?>