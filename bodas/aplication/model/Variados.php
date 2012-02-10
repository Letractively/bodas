<?php
	class Variados extends Utilitarios{


		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>variados.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de informacion variada</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="variados.php?opcion=listar"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){
			$sql = "SELECT 
					id_variado,
					titulo
				FROM variados";
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
                                    	<a href='variados.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                <?php echo "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
			<?php	
		}


		public function editar($id){
			$obj = new Variado($id);
			?>
                <form id="frmEdita" name="frmEdita" action="" method="post" enctype="multipart/form-data">
                	<h2>Editar articulo</h2>

                    <div class="itm"><label>Titulo: </label><input type="text" id="txtTitulo" name="txtTitulo" value="<?php echo $obj->titulo; ?>" /></div>
                    
                    <div class="itm">
                    	<label>Descripción: </label>
                    	<textarea id="txtDescripcion" name="txtDescripcion"><?php echo $obj->descripcion; ?></textarea>
                    </div>

                    <div class="itm">
                    	<label>Imagen: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>
                    
                    <div class="itm">
                    	<label>Imagen actual: </label>
                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/variados/".$obj->imagen."&w=170";?>" alt="<?php echo $obj->titulo; ?>" />
                        <?php echo $obj->imagen; ?>
                    </div>

					<div class="itm"><label>Link: </label><input type="text" id="txtLink" name="txtLink" value="<?php echo $obj->link; ?>" /></div>
                    
                    <div class="itm">
                   		<input type="hidden" id="id_variado" value="<?php echo $obj->id; ?>" />
                        <input type="submit" id="editar_lista" value="Guardar y listar" />
                        <input type="submit" id="editar_regresar" value="Actualizar" />
                    	<input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="variados.php">Regresar</a></div>
                </form>
			<?php
		}

		public function actualizar($id){

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
					$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'variados');
					$logo = "imagen = '".$img."',";
			}

			$Query = new Consulta(" UPDATE variados SET 
				titulo = '".$_POST['txtTitulo']."',
				".$logo."
				descripcion = '".$_POST['txtDescripcion']."',
				link = '".$_POST['txtLink']."'
			WHERE id_variado = '".$id."'");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


	}
?>