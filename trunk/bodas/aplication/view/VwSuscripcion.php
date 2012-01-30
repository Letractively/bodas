<?php
	class VwSuscripcion extends Utiles{

		public function __construct(){}

		public function vista(){
			
			$objDistrito = new Distrito;
			$aryDistritos = $objDistrito->obtenerDistritos();
			
			if ( isset($_POST['txtNombre']) && isset($_POST['txtApellido']) && isset($_POST['txtDireccion']) && isset($_POST['txtFijo']) && isset($_POST['txtDireccionEntrega']) && isset($_POST['txtReferencia']) && isset($_POST['txtCumple']) ){

				$mens="Estimados Señores de BODAS:

El Señor(a): ".$_POST['txtNombre']." ".$_POST['txtApellido']." envio a travez del formulario de suscripcion de bodas los siguientes datos:
Direccion: ".$_POST['txtDireccion']." 
Email: ".$_POST['txtEmail']." 
Fijo: ".$_POST['txtFijo']."
Anexo: ".$_POST['txtAnexo']."
Celular: ".$_POST['txtCelular']."
Nextel: ".$_POST['txtNextel']."

Dirección de entrega: ".$_POST['txtDireccionEntrega']."
Distrito: ".$_POST['sleDistritos']."
Referencia: ".$_POST['txtReferencia']."
Fecha de boda: ".$_POST['txtFechaBoda']."
Cumpleaños: ".$_POST['txtCumple']."

BODAS";

				@mail('suscripciones@bodas.com.pe, receapd@gmail.com','Consulta',$mens,'from: Suscripciones BODAS');
				$msj = "Su mensaje fue enviado, en breve nos comunicaremos con usted.";

			}
		?>
				<div class="margen-index">

                	<?php include(_inc_."inc.menu-rubros.php"); ?>

                    <div class="contenido-central-suscripcion">

						<div class="titulo">
                        	<p class="nombre-rubro">SUSCRIPCIÓN</p>
                        </div>

						<div class="datos-contacto">
                        	<p style="font-size:20px"><span><b><?php echo $msj; ?></b></span></p>
                        	<p>SUSCRÍBETE A REVISTA BODAS Y OBTÉN HASTA 20% DE DESCUENTO</p>
                            <p><span>3 EDICIONES (medio año) = S/. 50.00</span></p>
                            <p><span>6 EDICIONES (un año) = S/. 95.00</span></p>
                            <p><img src="<?php echo _img_?>imagen-suscripcion.jpg"></p>
                            <p>Además, participa de los sorteos mensuales de interesantes premios.</p>
                        </div>

						<div class="formulario-contacto">
                        	<p><b>LLENE LOS DATOS A EN LA BREVEDAD NOS COMUNICAREMOS CON UD.</b></p>
                        	<form id="frmSuscripcion" name="frmSuscripcion" method="post">
                                <div class="itm"><label>Nombre: </label><input type="text" id="txtNombre" name="txtNombre" value=""></div>
                                <div class="itm"><label>Apellido: </label><input type="text" id="txtApellido" name="txtApellido" value=""></div>
                                <div class="itm"><label>Email: </label><input type="text" id="txtEmail" name="txtEmail" value=""></div>
                                <div class="itm"><label>Dirección (Según DNI): </label><input type="text" id="txtDireccion" name="txtDireccion" value=""></div>
                                <div class="itm"><label>Teléfono fijo: </label><input type="text" id="txtFijo" name="txtFijo" value=""></div>
                                <div class="itm"><label>Anexo: </label><input type="text" id="txtAnexo" name="txtAnexo" value=""></div>
                                <div class="itm"><label>Celular: </label><input type="text" id="txtCelular" name="txtCelular" value=""></div>
                                <div class="itm"><label>Nextel: </label><input type="text" id="txtNextel" name="txtNextel" value=""></div>
                                <div class="itm"><label>Dirección de entrega (Lima): </label><input type="text" id="txtDireccionEntrega" name="txtDireccionEntrega" value=""></div>
                                <div class="itm">
                                    <label>Distrito:</label>
                                    <select id="sleDistritos" name="sleDistritos">
                                        <?php for($x = 0 ; $x < count($aryDistritos) ; $x++){ ?>
                                      <option value="<?php echo $aryDistritos[$x]['nombre_distrito']?>"
                                      <?php if($aryDistritos[$x]['id_distrito'] == 16){ echo "selected='selected'";}?>
                                      ><?php echo utf8_encode($aryDistritos[$x]['nombre_distrito'])?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="itm"><label>Referencia como llegar: </label><input type="text" id="txtReferencia" name="txtReferencia" value=""></div>
                                <div class="itm"><label>Fecha de boda: </label><input type="text" id="txtFechaBoda" name="txtFechaBoda" class="dp2" value=""></div>
                                <div class="itm"><label>Cumpleaños: </label><input type="text" id="txtCumple" name="txtCumple" class="dp" value=""></div>
    
                                <div class="itm"><input type="submit" value="ENVIAR"></div>
                            </form>
                        </div>

						<div class="puntos-venta">
                            <p>*Descuento de 20% para suscripción por 6 ediciones. Y para suscripción por 3 ediciones 
  el descuento es de 16.70%</p>
                            <p>*Los precios incluyen reparto sin costo adicional en Distritos de Lima.</p>
                            <p>*Para provincias y el extranjero, consultar costos de envío.</p>
                            <p>*Precio de venta al público S/. 20.00</p>
                        </div>

                    </div>


                    <?php include(_inc_.'inc.derecha.php'); ?>

                </div>
			<?php
		}

	}
?>