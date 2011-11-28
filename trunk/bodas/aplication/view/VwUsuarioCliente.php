<?php
	class VwUsuarioCliente{


		public function __construct(){}


		public function vista(){
			
		}

		public function registrate(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-proveedor">

						<div class="titulo">REGISTRATE</div>
                        
                        <div class="izquierda">
                        
                        	<div class="texto">
                            	<p><b>Beneficios</b></p>
                                <p>
                                	<ul>
                                    	<li>Conoce a otros novios.</li>
                                        <li>Sigue a tus proveedores.</li>
                                        <li>Comparte tus opiniones.</li>
                                        <li>Recibe actualizaciones.</li>
                                        <li>Publica un anuncio.</li>
                                    </ul>
                                </p>
                            </div>
                            
                            <div class="formulario">
                            	<div class="itm"><label>* Nombre:</label><input type="text" id="txtNombre" name="txtNombre"></div>
                                <div class="itm"><label>* Apellido:</label><input type="text" id="txtApellido" name="txtApellido"></div>
                                <div class="itm"><label>* Email:</label><input type="text" id="txtEmail" name="txtEmail"></div>
                                <div class="itm"><label>* Tel&eacute;fono:</label><input type="text" id="txtTelefono" name="txtTelefono"></div>
                                <div class="itm"><label>* Contrase&ntilde;a:</label><input type="text" id="txtContrasenia1" name="txtContrasenia1"></div>
                                <div class="itm"><label>* Confirmas contrase&ntilde;a:</label><input type="text" id="txtContrasenia2" name="txtContrasenia2"></div>
                                <div class="itm"><label>* Fecha de cumplea&ntilde;os:</label><input type="text" id="txtFechaCumple" name="txtFechaCumple"></div>
                                <div class="itm"><label>* Nombre de tu pareja:</label><input type="text" id="txtNombrePareja" name="txtNombrePareja"></div>
                                <div class="itm"><label>* Fecha de boda:</label><input type="text" id="txtFechaBoda" name="txtFechaBoda"></div>
                                <div class="itm"><label>* Pa&iacute;s:</label><input type="text" id="txtPais" name="txtPais"></div>
                                <div class="itm"><label>* Provincia:</label><input type="text" id="txtProvincia" name="txtProvincia"></div>
                                <div class="itm"><label>* Distrito:</label><input type="text" id="txtDistrito" name="txtDistrito"></div>
                            </div>
                        
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}


	}
?>