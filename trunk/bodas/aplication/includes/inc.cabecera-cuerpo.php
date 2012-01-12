
<div class="logo-opciones">
    <div class="logo"><img src="<?php echo _img_?>logo-bodas.jpg"></div>
    <div class="opciones<?php if(isset($_SESSION['login_usuario_cliente'])){ echo "2"; } ?>">
    	<?php if(!isset($_SESSION['login_usuario_cliente'])){ ?>
            <div class="contenedor-cuenta"><a id="des_login" href="#">Inicia sesión</a> / <a href="<?=_bs_?>usuario/registrate/">Regístrate</a></div>
            <div class="contenedor-login" <?php if($_SESSION['mensaje_error'] != ''){ echo "style='display:block'"; }?>>
                <form id="frmAcceso" name="frmAcceso" method="post" action="<?=_bs_?>validacion/login/">
                    <p>E-mail</p>
                    <p><input type="text" id="txtUsuario" name="txtUsuario"></p>
                    <p>Contrase&ntilde;a</p>
                    <p><input type="password" id="txtPassword" name="txtPassword"></p>
                    <input type="hidden" id="url_actual" name="url_actual" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
                    <p class="mensaje"><?php echo $_SESSION['mensaje_error'] ?></p>
                    <p><a href="<?=_bs_?>usuario/recordar_contrasenia/">Olvide mi contrase&ntilde;a</a></p>
                    <p>
                    	<div class="recordar-cuenta"><input type="checkbox" id="chkRecordar" name="chkRecordar">Recordar cuenta</div>
                        <input type="submit" value="ENTRAR">
                    </p>
                </form>
            </div>
        <?php }else{ 
			$objNombre = new UsuarioCliente($_SESSION['login_usuario_cliente']);
			?>
            <div class="contenedor-cuenta"><span>Bienvenido: <?php echo $objNombre->nombre_usuario_cliente." ".$objNombre->apellido_usuario_cliente; ?></span></div>
        	<div class="contenedor-cuenta"><a id="des_login" href="<?=_bs_?>usuario/editar_cuenta/">Editar cuenta</a> / <a href="<?=_bs_?>validacion/salir/">Salir</a></div>
        <?php } ?>
        
        <div class="contenedor-buscar">
        	<form id="frmBuscar" name="frmBuscar">
            	<input type="text" id="txtBuscar" name="txtBuscar" />
                <a id="btnBuscar"><img src="<?php echo _img_?>imgBuscar.png" alt="Buscar"></a>
            </form>
        </div>
    </div>
</div>

<div class="menu-general">
	<a href="<?=_bs_?>portada/">Inicio</a>
    <a href="<?=_bs_?>revista/">Revista</a>
    <a href="<?=_bs_?>eventos/">Eventos</a>
    <a id="lnk-tuboda">Tu Boda</a>
    <a href="<?=_bs_?>noticias/0/">Noticias</a>
    <a href="<?=_bs_?>tendencias/">Tendencias</a>
    <a href="<?=_bs_?>luna_de_miel/">Luna de Miel</a>
    <a href="<?=_bs_?>suscripcion/">Suscripción</a>
    <a href="<?=_bs_?>contacto/" style="width:112px;">Contacto</a>
</div>

<div id="menu-tuboda">
	<p><a href="<?=_bs_?>requisitos/">Requisitos</a></p>
    <p><a href="<?=_bs_?>municipalidades/">Municipalidades</a></p>
    <p><a href="<?=_bs_?>iglesias/">Iglesias</a></p>
    <p><a href="#">Paso a paso</a></p>
    <p><a href="#">Shower</a></p>
    <p><a href="#">Invitaciones y recuerdos</a></p>
    <p><a href="#">Catering y tortas</a></p>
    <p><a href="#">Decoración</a></p>
    <p><a href="#">Bouquets</a></p>
    <p><a href="#">La Fiesta</a></p>
    <p><a href="#">Foto y Video</a></p>
    <p><a href="#">Transporte</a></p>
    <p><a href="#">Anuncios</a></p>
    <p><a href="#">Bodas de Famosos</a></p>
</div>