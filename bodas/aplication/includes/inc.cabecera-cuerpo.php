
<div class="logo-opciones">
    <div class="logo"><img src="<?php echo _img_?>logo-bodas.jpg"></div>
    <div class="opciones<?php if(isset($_SESSION['login_usuario_cliente'])){ echo "2"; } ?>">
    	<?php if(!isset($_SESSION['login_usuario_cliente'])){ ?>
        
            <div class="contenedor-cuenta"><a id="des_login">Inicia sesión</a> / <a href="<?=_bs_?>usuario/registrate/">Regístrate</a></div>
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
            <br clear="all">
        <?php }else{ 
			$objNombre = new UsuarioCliente($_SESSION['login_usuario_cliente']);
			?>
            
            <div class="contenedor-cuenta"><span>Bienvenido: <?php echo $objNombre->nombre_usuario_cliente." ".$objNombre->apellido_usuario_cliente; ?></span></div>
        	<div class="contenedor-cuenta"><a id="des_login" href="<?=_bs_?>usuario/editar_cuenta/">Editar cuenta</a> / <a href="<?=_bs_?>validacion/salir/">Salir</a></div>
            
        <?php } ?>
        
        <form id="frmBuscar" name="frmBuscar" method="post" action="<?=_bs_?>resultados/0/">
            <div class="contenedor-buscar">
                    <input type="text" id="txtBuscar" name="txtBuscar" class="labely" title="Buscar proveedor..." />
                    <input type="image" src="<?php echo _img_?>imgBuscar.png" id="btnBuscar">
            </div>
            <div class="contenedor-criterio-busqueda"><div class="cnt_crit"><input type="radio" id="rdoOpc" name="rdoOpc" value="rubros" checked="checked"><span>Rubro</span> <input type="radio" id="rdoOpc" name="rdoOpc" value="proveedores" <?php if( $_SESSION['rdoOpc'] == 'proveedores' ){ echo "checked='checked'"; } ?>> <span>Proveedor</span> </div></div>
        </form>
    </div>
</div>

<div class="menu-general">
	<a href="<?=_bs_?>portada/" style="width:36px;">Inicio</a>
    <a href="<?=_bs_?>revista/">Revista</a>
    <!--<a href="<?=_bs_?>eventos/">Eventos</a>-->
    <a id="lnk-tuboda">Tu Boda</a>
    <a href="<?=_bs_?>noticias/0/">Noticias</a>
    <a id="lnk-tendencias">Tendencias</a>
    <a href="<?=_bs_?>luna_de_miel/">Luna de Miel</a>
    <a href="<?=_bs_?>entrevistas/0/">Entrevistas</a>
    <a href="<?=_bs_?>suscripcion/">Suscripción</a>
    <a href="<?=_bs_?>contacto/">Contacto</a>
</div>

<div id="menu-tuboda">
	<p><a href="<?=_bs_?>requisitos/">Requisitos</a></p>
    <p><a href="<?=_bs_?>municipalidades/">Municipalidades</a></p>
    <p><a href="<?=_bs_?>iglesias/">Iglesias</a></p>
    <p><a href="<?=_bs_?>paso-a-paso/0/">Paso a paso</a></p>
    <p><a href="<?=_bs_?>shower/0/">Shower</a></p>
    <p><a href="<?=_bs_?>invitaciones-y-recuerdos/0/">Invitaciones y recuerdos</a></p>
    <p><a href="<?=_bs_?>catering-y-tortas/0/">Catering y tortas</a></p>
    <p><a href="<?=_bs_?>decoracion/0/">Decoración</a></p>
    <p><a href="<?=_bs_?>bouquets/0/">Bouquets</a></p>
    <p><a href="<?=_bs_?>la-fiesta/0/">La Fiesta</a></p>
    <p><a href="<?=_bs_?>foto-y-video/0/">Foto y Video</a></p>
    <p><a href="<?=_bs_?>transporte/0/">Transporte</a></p>
    <!--<p><a href="<?=_bs_?>anuncio/">Anuncios</a></p>-->
    <p><a href="<?=_bs_?>bodas-de-famosos/0/">Bodas de Famosos</a></p>
</div>

<div id="menu-tendencias">
	<p><a href="<?=_bs_?>vestidos-de-novia/0/">Vestidos de novia</a></p>
    <p><a href="<?=_bs_?>trajes-de-novio/0/">Trajes de novio</a></p>
    <p><a href="<?=_bs_?>joyeria-y-accesorios/0/">Joyeria y accesorios</a></p>
    <p><a href="<?=_bs_?>peinado-y-maquillaje/0/">Peinado y maquillaje</a></p>
    <p><a href="<?=_bs_?>belleza-y-salud/0/">Belleza y salud</a></p>
    <p><a href="<?=_bs_?>los-invitados/0/">Los invitados</a></p>
</div>