<?php 
	if ( isset($_POST['txtNombres']) && isset($_POST['txtEmail']) && isset($_POST['txtFechaBoda']) ){

		$mens = "
			Estimados Señores de BODAS:

			El Señor(a): ".$_POST['txtNombres']." envio a travez del formulario de boletin de bodas los siguientes datos:
			Email: ".$_POST['txtEmail']." 
			Fecha de boda: ".$_POST['txtFechaBoda']."

			BODAS
		";

		@mail('atencionalcliente@bodas.com.pe','Consulta',$mens,'from: Incripcion boletin BODAS');
		?><script type="text/javascript">alert('Su mensaje fue enviado, en breve nos comunicaremos con usted.');</script><?php
	}
?>
<div class="pie-fijo">
	<div id="pagina">
        <span class="inicial">Recibe nuestro boletin</span>
        <form id="frmBoletin" name="frmBoletin" method="post">
            <span><input type="text" id="txtNombres" name="txtNombres" class="labely" title="Nombre"></span>
            <span><input type="text" id="txtEmail" name="txtEmail" class="labely" title="Email"></span>
            <span><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="labely" title="Fecha de boda"></span>
            <span><input type="submit" id="btnEnviar" value="Enviar"></span>
        </form>
        <span class="cerrar"></span>
        <span class="right">
            <a href="http://www.facebook.com/bodasperu" target="_blank"><img src="<?php echo _img_?>icon-facebook.png"></a>
            <a href="http://www.twitter.com/bodasperu" target="_blank"><img src="<?php echo _img_?>icon-twitter.png"></a>
            <a href="http://www.youtube.com/revistabodasperu" target="_blank"><img src="<?php echo _img_?>icon-youtube.png"></a>
        </span>
	</div>
</div>

<div class="pie-fijo2">
	<div id="pagina">
    	<span class="abrir"></span>
    </div>
</div>