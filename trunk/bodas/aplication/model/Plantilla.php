<?php
	class Plantilla{


		public function logeo(){
			?>
				<div id="cnt_login">
					<form id="f1" name="f1" method="post" action="validacion.php">
						<div><label>Usuario: </label><input type="text" name="txtUsuario" id="txtUsuario" class="txtLogin"></div>
						<div><label>Contraseña: </label><input type="password" name="txtPassword" id="txtPassword" class="txtLogin"></div>
						<div><input type="submit" value="Aceptar"></div>
                        <div><a href="index.php?opcion=recuperar">Recordar contrase&ntilde;a</a></div>
                        <div class="error"><?php if($_GET['error']){ echo "Error en los datos."; }?></div>
					</form>

				</div> 
			<?php
		}


		public function recuperar_acceso(){
			?>
				<div id="cnt_recuperar_contrasenia">
					<form name="f1" method="post" action="index.php">
						<div> Para recuperar su contrase&ntilde;a escriba su email y rebice su buz&oacute;n de correos </div>
						<div> Email : <input type="email" name="password" size="26" /> <a href="javascript:document.f1.action='index.php?opcion=recuperar&procesar=si', document.f1.submit();"> ENVIAR</a></div>		
						<div><?php if($_GET['error']){ echo "ERROR: Usuario ó Password Incorrecto, Por favor ingrese de nuevo ! <BR> <br>"; }?></div>
					</form>
				</div>
			<?php		
		} 


		public function cabecera(){ 
			?>
				<table id="cabezera" cellpadding="0" cellspacing="0">
					<tr>
						<td class="superior" colspan="2"><img src="../aplication/webroot/imgs/logo_admin.png"></td>
					</tr>
					<?php if($_SESSION['session']){ ?>
						<tr> 
							<td class="vertical_line1">&nbsp;&nbsp;Bienvenido: <?php echo ucwords($_SESSION['session'][1])?></td>
							<td class="vertical_line2"> <a href="salir.php"> Salir </a> </td>
						</tr>
					<?php } ?>
				</table>
			<?php
		}


		public function izquierda(){
			?>
				<div id="menu_izquierdo">
					<div class="date">Tareas de Administración</div>
					<div><?php Menu::MenuIzquierdo(); ?></div>
				</div>
			<?php
		}	


		public function pie(){ 
			?>
				<div align="center"></div>	
			<?php
		}


	}
?>