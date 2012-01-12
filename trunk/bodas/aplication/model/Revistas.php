<?php
	class Revistas extends Utilitarios{


		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>revistas.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de revistas</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="revista.php?opcion=listar"> Listar </a></li>
                        <li><a href="revista.php?opcion=nuevo"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){
			$sql = "
				SELECT 
				  id_revista,
				  titulo
				FROM 
					revistas
				ORDER BY id_revista DESC
			";

			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <div id="contentLeft">
                <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Titulo</th>
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
                                    <td align="center">
                                            <a href='revista.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                        <?php if($rw[0] != 1){ ?>
                                            <a title="Eliminar" class="eliminar" id="<?php echo $rw[0]?>" name="revista.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
                                        <?php } ?>
                                <?php echo "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>

			<?php	
		}


		public function nuevo(){
			?>
                <form id="frmNuevo" name="frmNuevo" action="" method="post" enctype="multipart/form-data">
                	<h2>Nueva revista</h2>

                    <div class="itm">
                    	<label>Link: </label><input type="text" id="txtCodigo" name="txtCodigo" />
                    </div>

                	<div class="itm"><label>Titulo: </label><input type="text" id="txtTitulo" name="txtTitulo" /></div>

                    <div class="itm">
                    	<label>Imagen: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>

					<?php if($rw[0] == 1){ ?>
                        <div class="itm">
                            <label>Descripción: </label>
                            <br clear="all">
                            <textarea id="des_2" name="des_2"></textarea>
                        </div>
					<?php } ?>
                    
                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0">Desactivado
                    </div>

                    <div class="itm">
                        <input type="submit" id="guardar_nuevo" value="Guardar y crear nuevo" />
                        <input type="submit" id="guardar_listar" value="Guardar y listar" />
                      <input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="revista.php">Regresar</a></div>
                </form>
			<?php
		}

		public function agregar(){

			if($_FILES['fleLogo']['type'] == 'image/jpeg'){ $img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'revistas');
			}else{ $img = "sin-imagen.jpg"; }

			$Query = new Consulta("INSERT INTO revistas VALUES('',
				'".$_POST['txtCodigo']."',
				'".$_POST['txtTitulo']."',
				'".$img."',
				'".$_POST['des_2']."',
				'".$_POST['rdoEstado']."'
			)");
			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
		}

		public function editar($id){
			$obj = new Revista($id);
			?>
                <form id="frmEdita" name="frmEdita" action="" method="post" enctype="multipart/form-data">
                	<h2>Editar articulo</h2>

					<?php if($obj->id != 1){ ?>
                        <div class="itm">
                            <label>Link: </label><input type="text" id="txtCodigo" name="txtCodigo" value="<?php echo $obj->codigo; ?>" />
                        </div>
					<?php } ?>

                	<div class="itm"><label>Titulo: </label><input type="text" id="txtTitulo" name="txtTitulo" value="<?php echo $obj->titulo; ?>"/></div>

                    <div class="itm">
                    	<label>Imagen: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>

					<div class="itm">
                    	<label>Imagen actual: </label>
                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/revistas/".$obj->imagen."&w=170";?>" alt="<?php echo $obj->titulo; ?>" />
                        <?php echo $obj->imagen; ?>
                    </div>

					<?php if($obj->id == 1){ ?>
                        <div class="itm">
                            <label>Descripción: </label>
                            <br clear="all">
                            <textarea id="des_2" name="des_2"><?php echo $obj->descripcion; ?></textarea>
                        </div>
					<?php } ?>
                    
                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0">Desactivado
                    </div>
                    
                    <div class="itm">
                   		<input type="hidden" id="id_revista" value="<?php echo $obj->id; ?>" />
                        <input type="submit" id="editar_lista" value="Guardar y listar" />
                    	<input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="revista.php">Regresar</a></div>
                </form>
			<?php
		}

		public function actualizar($id){

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
					$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'revistas');
					$logo = "imagen = '".$img."',";
			}

			$Query = new Consulta(" UPDATE revistas SET 
				".$logo."
				link = '".$_POST['txtCodigo']."',
				titulo = '".$_POST['txtTitulo']."',
				descripcion = '".$_POST['des_2']."',
				estado = '".$_POST['rdoEstado']."'
			WHERE id_revista = '".$id."'");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


		public function eliminar($id){
			if($id > 0){
				$Query = new Consulta("DELETE FROM revistas WHERE id_revista = ".$id."");
				?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro eliminado correctamente.</div><?php
			}else if($id == ''){
				?><div class="alert"><img src="<?php echo _icn_?>alert.png"> Error al eliminar</div><?php
			}	
		}


	}
?>