<?php
	class VwContacto extends Utiles{

		public function __construct(){}

		public function vista(){
			
			if ( isset($_POST['txtNombre']) && isset($_POST['txtApellido']) && isset($_POST['txtEmail']) && isset($_POST['txtTelefono']) && isset($_POST['areaMensaje']) ){

				$mens="
					Estimados Señores de BODAS:

					El Señor(a): ".$_POST['txtNombre']." ".$_POST['txtApellido']." envio a travez del formulario de contacto de bodas los siguientes datos:
					Email: ".$_POST['txtEmail']." 
					Telefono: ".$_POST['txtTelefono']."
					Mensaje: ".$_POST['areaMensaje']."

					BODAS
						
				";

				@mail('contact@bodas.com.pe','Consulta',$mens,'from: Web site BODAS');
				$msj = "Su mensaje fue enviado, en breve nos comunicaremos con usted.";
			}

			?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="contenido-central-contacto">

						<div class="titulo">
                        	<p class="nombre-rubro">CONTACTO</p>
                        </div>

						<div class="formulario-contacto">
                        	<p style="font-size:20px"><b><?php echo $msj; ?></b></p>
                        	<form id="frmContacto" name="frmContacto" method="post">
                                <div class="itm"><label>* Nombre: </label><input type="text" id="txtNombre" name="txtNombre" value=""></div>
                                <div class="itm"><label>* Apellido: </label><input type="text" id="txtApellido" name="txtApellido" value=""></div>
                                <div class="itm"><label>* E-mail: </label><input type="text" id="txtEmail" name="txtEmail" value=""></div>
                                <div class="itm"><label>Teléfono: </label><input type="text" id="txtTelefono" name="txtTelefono" value=""></div>
                                <div class="itm"><label>Mensaje: </label><textarea id="areaMensaje" name="areaMensaje"></textarea></div>
                                <div class="itm"><div class="alert">* Campos obligatorios</div><input type="submit" value="ENVIAR"></div>
                            </form>
                        </div>

						<div class="datos-contacto">
                        	<p><span>Central Telefónica</span> (511) 717 3737</p>
                            <p><span>Celular / Nextel</span> (99) 405*4086</p>
                            <p><span>Atención al cliente</span> atencionalcliente@bodas.com.pe</p>
                            <p><span>Suscripciones</span> suscripciones@bodas.com.pe</p>
							<br>
                            <p><b>Si desea anunciar en nuestro portal web o revista</b></p>
                            <p><b>contáctenos a <a href="mailto:ventas@bodas.com.pe">ventas@bodas.com.pe</a></b></p>
                            <br>
                            <p><span>Dirección</span> Teodosio Parreño 429 - Barranco, Lima - Perú</p>
                            <p><iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps/ms?msa=0&msid=212443072502452155323.0004b41406026c5c86591&hl=es&ie=UTF8&ll=-12.13246,-77.020022&spn=0,0&t=m&vpsrc=6&output=embed"></iframe></p>
                        </div>

						<div class="puntos-venta">
                        	<p><b><span>PUNTOS DE VENTA</span></b></p>
                            <p>Encuentra revista bodas en los siguientes puntos de ventas</p>
                            <p><b>En lima:</b> Wong, Tottus, Metro y principales kioscos. Además en Zeta Book Store, Librerías Crisol, Mini Market, grifos y farmacias.</p>
                            <p><b>En provincias:</b> Kioscos y locales cerrados en Arequipa, Chiclayo, Cusco, Cajamarca, Piura, Trujillo, Ica.</p>
                            <p><b>Novios Falabella:</b> Recibe tu revista BODAS de forma gratuita al inscribirte en la lista de novios de Saga Falabella.</p>
                        </div>

                    </div>

                    <?php include(_inc_.'inc.derecha.php'); ?>

                </div>
			<?php
		}

	}
?>