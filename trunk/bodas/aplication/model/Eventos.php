<?php
	class Eventos extends Utilitarios{


		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>eventos.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de informacion de evento</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="eventos.php?opcion=listar"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){
			$sql = "SELECT 
					id_evento,
					texto_acerca
				FROM eventos";
			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <div id="contentLeft">
                <input type="hidden" id="opcion" name="opcion" value="catalogo">
                <table class='reporte2 display' cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Texto acerca</th>
                            <th>Opc.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($rw = mysql_fetch_array($qry->Consulta_ID)) {
                                ?>
                                <tr>
                                    <td><?php echo $rw[0]?></td>
									<td>Eventos</td>
                                    <td align="center">
                                    	<a href='eventos.php?id=<?php echo $rw[0]?>&opcion=editar' title="Editar"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                <?php echo "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
			<?php	
		}


		public function editar($id){
			$obj = new Evento($id);
			?>
                <form id="frmEdita" name="frmEdita" action="" method="post" enctype="multipart/form-data">
                	<h2>Editar evento</h2>

                    <div class="itm">
                    	<label>Texto acerca: </label>
                        <br clear="all">
                    	<textarea id="txtDescripcion1" name="txtDescripcion1"><?php echo $obj->texto_acerca; ?></textarea>
                    </div>

                    <div class="itm">
                    	<label>Imagen: </label>
                    	<input type="file" id="fleLogo" name="fleLogo" accept="image/jpeg"/>
                    </div>

                    <div class="itm">
                    	<label>Imagen actual: </label>
                        <img src="<?php echo _tt_."src=/aplication/webroot/imgs/eventos/".$obj->imagen_acerca."&w=170";?>" />
                        <?php echo $obj->imagen_acerca; ?>
                    </div>

                    <div class="itm">
                    	<label>Texto expo: </label>
                        <br clear="all">
                    	<textarea id="txtDescripcion2" name="txtDescripcion2"><?php echo $obj->texto_expo; ?></textarea>
                    </div>
                    
                    <div class="itm">
                    	<label>Texto desfile: </label>
                        <br clear="all">
                    	<textarea id="txtDescripcion3" name="txtDescripcion3"><?php echo $obj->texto_desfile; ?></textarea>
                    </div>
                    
                    <div class="itm">
                    	<label>Texto coro: </label>
                        <br clear="all">
                    	<textarea id="txtDescripcion4" name="txtDescripcion4"><?php echo $obj->texto_coro; ?></textarea>
                    </div>
                    
                    <div class="itm">
                    	<label>Texto charlas: </label>
                        <br clear="all">
                    	<textarea id="txtDescripcion5" name="txtDescripcion5"><?php echo $obj->texto_charlas; ?></textarea>
                    </div>

                    <div class="itm">
                   		<input type="hidden" id="id_evento" value="<?php echo $obj->id; ?>" />
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
					$img = $this->subirImagenCarpeta($_FILES['fleLogo']['tmp_name'], $_FILES['fleLogo']['name'], 'eventos');
					$logo = "imagen_acerca = '".$img."',";
			}

			$Query = new Consulta(" UPDATE eventos SET 
				texto_acerca = '".$_POST['txtDescripcion1']."',
				".$logo."
				texto_expo = '".$_POST['txtDescripcion2']."',
				texto_desfile = '".$_POST['txtDescripcion3']."',
				texto_coro = '".$_POST['txtDescripcion4']."',
				texto_charlas = '".$_POST['txtDescripcion5']."'
			WHERE id_evento = '".$id."'");

			?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
		}


	}
?>