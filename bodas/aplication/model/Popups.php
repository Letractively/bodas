<?php
	class Popups extends Utilitarios{


		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>popup.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Popups</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="popups.php?opcion=listar"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}

		public function listar(){
			$sql = "SELECT 
					id_popup,
					imagen
				FROM popup";
			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <div id="contentLeft">
                <input type="hidden" id="opcion" name="opcion" value="catalogo">
                <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Opc.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($rw = mysql_fetch_array($qry->Consulta_ID)) {
                                ?>
                                <tr>
                                    <td><?php echo $rw[0]?></td>
									<td>Popup</td>
                                    <td align="center">
                                    	<a href='popups.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                <?php echo "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
			<?php	
		}

		public function editar($id){
			$obj = new Popup($id);
			?>
                <form id="frmEdita" name="frmEdita" action="" method="post" enctype="multipart/form-data">
                	<h2>Editar evento</h2>

                    <div class="itm">
                    	<label>Imagen: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>

                    <div class="itm">
                    	<label>Imagen: </label>
                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/popup/".$obj->imagen."&w=170";?>" />
                        <?php echo $obj->imagen; ?>
                    </div>

                    <div class="itm"><label>Link: </label><input type="text" id="txtLink" name="txtLink" value="<?php echo $obj->link; ?>"/></div>

                    <div class="itm">
                    	<label>Estado: </label>
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="1" checked="checked">Activado |
                        <input type="radio" id="rdoEstado" name="rdoEstado" value="0" <?php if($obj->estado == 0){ echo 'checked="checked"'; }?>>Desactivado
                    </div>

                    <div class="itm">
                   		<input type="hidden" id="id_popup" value="<?php echo $obj->id; ?>" />
                        <input type="submit" id="editar_lista" value="Guardar y listar" />
                        <input type="submit" id="editar_regresar" value="Actualizar" />
                    	<input type="reset" name="reset" value="Limpiar">
                    </div>
                    <div class="itm"><a href="popups.php">Regresar</a></div>
                </form>
			<?php
		}

		public function actualizar($id){

			if(isset($_FILES['fleLogo']) && $_FILES['fleLogo']['name'] != ''){
					$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'popup');
					$logo = "imagen = '".$img."',";
			}

			$Query = new Consulta(" UPDATE popup SET 
				".$logo."
				link = '".$_POST['txtLink']."',
				estado = '".$_POST['rdoEstado']."'
			WHERE id_popup = '".$id."'");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


	}
?>