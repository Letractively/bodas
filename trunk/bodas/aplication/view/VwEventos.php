<?php
	class VwEventos extends Utiles{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-eventos">

						<div class="titulo">Eventos proximos</div>

                        <div class="redes">

                            <div style="position:relative; float:left; width:auto; height:auto; margin:4px 0 0 0;">
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style ">
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                    <a class="addthis_button_tweet"></a>
                                </div>
                                <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f04b6af30eeab4f"></script>
                                <!-- AddThis Button END -->
                            </div>
                        
                            <div style="position:relative; float:right; width:200px; height:auto; margin:6px 0px;">
                                <div style="position:relative; float:left; width:auto; height:auto; ">Compartir: </div>
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_preferred_1"></a>
                                <a class="addthis_button_preferred_2"></a>
                                <a class="addthis_button_preferred_3"></a>
                                <a class="addthis_button_preferred_4"></a>
                                <a class="addthis_button_compact"></a>
                                <a class="addthis_counter addthis_bubble_style"></a>
                                </div>
                                <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f04b6af30eeab4f"></script>
                                <!-- AddThis Button END -->
                            </div>
                        
                        </div>

						<div class="imagen"><img src="<?=_img_?>eventos/img-evento.png"></div>

						<script type="text/javascript">
                            $(document).ready(function() {
                                $(".mnutab").click(function(){
                                    $(".cnttab").hide();
                                    $( "#cnt" + $(this).attr('id') ).show();
                                });
                            });
                        </script>

						<div class="cnt-tabs">

                        	<div class="menu-tabs">
                                <a class="mnutab" id="1" style="width:104px">Acerca del evento</a>
                                <a class="mnutab" id="2">Expositores</a>
                                <a class="mnutab" id="3">Programa</a>
                                <a class="mnutab" id="4">Preguntas frecuentes</a>
                                <a class="mnutab" id="5">Prensa</a>
                            </div>

                            <div class="cnttab" id="cnt1">Acerca del evento</div>
                            <div class="cnttab" id="cnt2">Expositores</div>
                            <div class="cnttab" id="cnt3">Programa</div>
                            <div class="cnttab" id="cnt4">Preguntas frecuentes</div>
                            <div class="cnttab" id="cnt5" style="display:block">
                            	<p>Bodas & Novios, contará con la presencia de medios de prensa, antes, durante y después del evento.</p>
								<p>Llenar el formulario con los datos solicitados. Para mayor información llamar al 717 3737 o escribir a atencionalcliente@bodas.com.pe Posteriormente, todos los asistentes y expositores podrán compartir el fin de fiesta.</p>

                                <p>
                                <form id="frmPrensaEventos" method="post">
                                
                                	<p><span>INFORMACION GENERAL</span></p>
                                    
                                    <table class="tbls1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>Nombre de medio</td>
                                            <td><input type="text" id="txtNombreMedio" name="txtNombreMedio" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Teléfono</td>
                                            <td><input type="text" id="txtTelefono1" name="txtTelefono1" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td><input type="text" id="txtEmail" name="txtEmail" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Página web</td>
                                            <td><input type="text" id="txtPaginaWeb" name="txtPaginaWeb" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Medio</td>
                                            <td>
                                            	<table class="tbls2" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Televisión"> Televisión </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Radio"> Radio </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Agencia de noticias"> Agencia de noticias </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Diario, Periodico"> Diario, Periodico </td>
                                                    </tr>
                                                    <tr>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Revista"> Revista </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Internet"> Internet </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Blog"> Blog </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio" value="Otros"> Otros</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <p><span>INFORMACION DEL REPRESENTANTE</span></p>
                                    <table class="tbls1" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>Apellidos</td>
                                            <td><input type="text" id="txtApellido" name="txtApellido" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Nombres</td>
                                            <td><input type="text" id="txtNombres" name="txtNombres" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de Identificación y Nº</td>
                                            <td><input type="text" id="txtDocumento" name="txtDocumento" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Cargo</td>
                                            <td><input type="text" id="txtCargo" name="txtCargo" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Teléfonos</td>
                                            <td><input type="text" id="txtTelefono2" name="txtTelefono2" value=""></td>
                                        </tr>
                                    </table>
                                </form>
                                    
                                </p>
                            </div>

                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>