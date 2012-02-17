<?php
	class InscripcionesIndex extends Utilitarios{


		public function cabecera(){
			?>
            <script type="text/javascript" src="<?php echo _js_?>eventos.js"></script>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de inscritos</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="inscripcionesIndex.php?opcion=listar"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}


		public function listar(){
			$sql = "SELECT 
						id_registro,
						nombre,
						direccion,
						distrito,
						telefono,
						celular,
						email,
						fecha_boda,
						medio
					FROM incripciones_index";
			$qry = new Consulta($sql);		
			$num = $qry->NumeroRegistros();
			?>
            <div id="contentLeft">
                <input type="hidden" id="opcion" name="opcion" value="catalogo">
                <table class='reporte3 display' cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Distrito</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Fecha de boda</th>
                            <th>Como se entero</th>
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
                                    <td><?php echo $rw[3]?></td>
                                    <td><?php echo $rw[4]?></td>
                                    <td><?php echo $rw[5]?></td>
                                    <td><?php echo $rw[6]?></td>
                                    <td><?php echo $rw[7]?></td>
                                    <td><?php echo $rw[8]?></td>
                                <?php echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
			<?php	
		}

	}
?>