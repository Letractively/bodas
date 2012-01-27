<?php
	class ArticulosTipos extends Utilitarios{

		public function cabecera(){
			?>
            <div id="menuSuperior">
                <div class="tit_pagina">Tipos de articulos</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="articuloTipo.php?opcion=listar"> Listar </a></li>
                    </ul>
                </div>
            </div>
			<?php
		}

		public function listar(){
			$sql = "SELECT nombre, id_articulo_tipo FROM articulos_tipos ORDER BY id_articulo_tipo ASC";
			$qry = new Consulta($sql);
			$num = $qry->NumeroRegistros();
			?>
            <div id="contentLeft">
                <table class='reporte display' cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($rw = mysql_fetch_array($qry->Consulta_ID)) {
                                ?>
                                <tr>
                                    <td><?php echo utf8_encode($rw[0]) ?></td>
                                    <td align="center">
                                        <a href='articulo.php?id_articulo_tipo=<?php echo $rw[1]?>&opcion=listar' title="Ver articulos"><img src="<?php echo _icn_ ?>x_edit.png"></a>
                                <?php echo "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
			<?php	
		}


	}
?>