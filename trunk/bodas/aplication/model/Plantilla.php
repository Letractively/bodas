<?php
	class Plantilla{

		public function logeo(){
			?>
				<div id="cnt_login">
					<form id="f1" name="f1" method="post" action="validacion.php">
						<div><label>Usuario: </label><input type="text" name="txtUsuario" id="txtUsuario" class="txtLogin"></div>
						<div><label>Contraseña: </label><input type="password" name="txtPassword" id="txtPassword" class="txtLogin"></div>
						<div><input type="submit" value="Aceptar"></div>
                        <div class="recuperar_contrasenia"><a href="index.php?opcion=recuperar">Recordar contrase&ntilde;a</a></div>
                        <div class="error"><?php if($_GET['error']){ echo "Error en los datos."; }?></div>
					</form>

				</div> 
			<?php
		}


		public function recuperar_acceso(){
			if( isset($_POST['txtEmail']) && $_POST['txtEmail'] != '' ){
				$valida = Acceso::AccesoRecuperar();
				if($valida > 0){
					$mensaje = "Los datos de su cuenta fueron enviados a su correo electrónico.";
				}else{
					$mensaje = "Error en los datos.";
				}
			} ?>
				<div id="cnt_recuperar_contrasenia">
					<form id="f1" name="f1" method="post" action="index.php?opcion=recuperar">
						<div>Ingrese su email de registro y se le enviara un correo electronico con los datos de su cuenta.</div>
						<div><label> Email: </label><input type="text" id="txtEmail" name="txtEmail" /></div>
                        <div><input type="submit" value="Aceptar"></div>
                        <div><a href="index.php">Regresar</a></div>
                        <div class="error"><?php echo $mensaje; ?></div>
					</form>
				</div>
			<?php
		}


		public function cabecera(){ 
			?>
            <div class="logo-imagen-empresa"><img src="../aplication/webroot/imgs/logo_admin.png" alt="Logo empresa"></div>
            <?php if($_SESSION['session']){ ?>
                <div class="nombre-usuario">Bienvenido: <?php echo $_SESSION['session'][1]; ?></div>
                <div class="salir"><a href="salir.php">Salir</a></div>
            <?php }
		}


		public function izquierda(){
			if($_SESSION['session']){ ?>
				<div id="menu_izquierdo">
					<div class="date">Opciones</div>
					<div><?php Menu::MenuIzquierdo(); ?></div>
				</div>
			<?php
			}
		}	


		public function pie(){ 
			?>Powered by <a href="mailto:receapd@gmail.com">Rael</a><?php
		}

	}
?>