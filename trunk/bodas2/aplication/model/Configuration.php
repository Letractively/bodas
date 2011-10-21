<?php 

class Configuration{

	var $data = array();
	public function cabecera(){
		?>
			<div id="menuSuperior">
				<div class="tit_pagina">Listado de configuraci&oacute;n.</div>
				<div class="cont_items_menu">
					<ul>
						<li><a href="configuracion.php"> Listar </a></li>
                        <li><a href="#" onclick="mantenimiento('configuracion.php',4,'edit')"> Editar </a></li>
					</ul>
				</div>
			</div>
		<?php
	}

	public function listConfiguration(){
		$sql = "SELECT id_configuracion, nombre_configuracion, valor_configuracion, posicion FROM configuracion ORDER BY posicion ASC";
		$query = new Consulta($sql);
		?>
            <table class='reporte display' cellpadding="0" cellspacing="0" border="0">
            	<thead>
                    <tr>
                    	<th>Nro.</th>
                        <th>Nombre</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
					<?php while ($rown = mysql_fetch_array($query->Consulta_ID)) { ?>
                        <tr>
                            <td><?php echo $rown[3]?></td>
                            <td><?php echo $rown[1]?></td>
                            <td><?php echo substr(strip_tags($rown[2]),0,40)."..." ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
			</table>
		<?php
	}

	public function editConfiguration(){ ?>
		<form name="f1" action="<?php echo $_SERVER['PHP_SELF']."?opcion=update"?>" method="post">
            <table id="mantenimiento" cellpadding="1" cellspacing="1">
                <tr>
                    <td colspan="2" class="accion">EDITAR CONFIGURACI&Oacute;N</td>
                </tr>
				<?php foreach($this->getData() as $clave => $valor){ ?> 
                <tr>
                    <td align="right" width="30%"><?php echo str_replace("_"," ",$clave); ?>: </td>
                    <?php if($clave == 'ARCHIVO_INGRESO_SEMANA' || $clave == 'PROGRAMACION'){ ?>
                    	<td width="70%" align="left">
                            <div class="swfupload-control-<?php echo $clave; ?>">
                                <input type="button" id="upload_button" />
                                <input type="text" id="<?php echo $clave; ?>" name="<?php echo $clave; ?>" class="input" readonly><br>
                                <?php echo $valor; ?>
                            </div>
                        </td>
                    <?php }else if($clave == 'QUIENES_SOMOS'){ ?>
                    	<td width="70%" align="left"><textarea type="text" id="<?php echo $clave; ?>" name="<?php echo $clave; ?>"><?php echo $valor; ?></textarea></td>
                    <?php }else{ ?>
                    	<td width="70%" align="left"> <input type="text" id="<?php echo $clave; ?>" name="<?php echo $clave; ?>" value="<?php echo $valor; ?>" class="input"></td>
                    <?php } ?>
                </tr>
				<?php } ?>
                <tr>
                    <td colspan="3" align="center">
                        <input type="button" name="guarda" value="Guardar" class="btn" onclick="return validar_configuracion()">
                        <input type="reset" name="limpia" value="Limpiar" class="btn">
                    </td>
                </tr>
			</table>
		</form>
		<?php				
	}

	public function updateConfiguration(){


		$sql = "UPDATE configuracion SET valor_configuracion = '".$_POST['NOMBRE_SITIO']."' WHERE nombre_configuracion = 'NOMBRE_SITIO'";
		$query = new Consulta($sql);
		$sql = "UPDATE configuracion SET valor_configuracion = '".$_POST['EMAIL_VOTAR_RANKING']."' WHERE nombre_configuracion = 'EMAIL_VOTAR_RANKING'";
		$query = new Consulta($sql);

		$sql = "UPDATE configuracion SET valor_configuracion = '".$_POST['QUIENES_SOMOS']."' WHERE nombre_configuracion = 'QUIENES_SOMOS'";
		$query = new Consulta($sql);
		$sql = "UPDATE configuracion SET valor_configuracion = '".$_POST['CORREO_QUIENES_SOMOS']."' WHERE nombre_configuracion = 'CORREO_QUIENES_SOMOS'";
		$query = new Consulta($sql);

		if($_POST['ARCHIVO_INGRESO_SEMANA'] != ''){
			$sql = "UPDATE configuracion SET valor_configuracion = '".$_POST['ARCHIVO_INGRESO_SEMANA']."' WHERE nombre_configuracion = 'ARCHIVO_INGRESO_SEMANA'";
			$query = new Consulta($sql);
		}

		if($_POST['PROGRAMACION'] != ''){
			$sql = "UPDATE configuracion SET valor_configuracion = '".$_POST['PROGRAMACION']."' WHERE nombre_configuracion = 'PROGRAMACION'";
			$query = new Consulta($sql);
		}

	}

	public function getData(){
		$sql   = "SELECT * FROM configuracion ORDER BY posicion ASC";
		$query = new Consulta($sql);
		while($row = $query->VerRegistro()){
			$this->data[$row['nombre_configuracion']] = $row['valor_configuracion'];			
		}
		return $this->data;		
	}

}

?>