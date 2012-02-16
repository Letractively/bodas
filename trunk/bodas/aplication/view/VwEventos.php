<?php
	class VwEventos extends Utiles{

		public function __construct(){}

		public function vista(){
			
			$objEvento = new Evento(1);
			
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

								jQuery.validator.addMethod("complete_url", function(val, elem) {
									// if no url, don't do anything
									if (val.length == 0) { return true; }

									// if user has not entered http:// https:// or ftp:// assume they mean http://
									if(!/^(https?|ftp):\/\//i.test(val)) {
										val = 'http://'+val; // set both the value
										$(elem).val(val); // also update the form element
									}
									// now check if valid url
									// http://docs.jquery.com/Plugins/Validation/Methods/url
									// contributed by Scott Gonzalez: http://projects.scottsplayground.com/iri/
									return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(val);
								});

								jQuery.fn.reset = function () {
									$(this).each (function() { if (!$(this).is(':hidden')) this.reset(); });
								}

                                $(".mnutab").click(function(){
                                    $(".cnttab").hide();
                                    $( "#cnt" + $(this).attr('id') ).show();

									$(".mnutab").removeClass("tabactivo");
									$(this).addClass("tabactivo");
                                });

								$('#frmPrensaEventos').submit(function() {
									return false;
								});

								$('#frmPrensaEventos').validate({
									errorElement: 'label',
									errorClass: 'error',
									rules:{
										txtNombreMedio: 'required',
										txtTelefono1: 'required',
										txtEmail: { required: true, email: true },
										txtPaginaWeb: { required: true, complete_url: true },
										chkMedio: 'required',
										txtApellido: 'required',
										txtNombres: 'required',
										txtDocumento: 'required',
										txtCargo: 'required',
										txtTelefono2: 'required'
									},
									messages:{
										txtNombreMedio: '',
										txtTelefono1: '',
										txtEmail: { required: '', email: '' },
										txtPaginaWeb: { required: '', complete_url: '' },
										chkMedio: '',
										txtApellido: '',
										txtNombres: '',
										txtDocumento: '',
										txtCargo: '',
										txtTelefono2: ''
									},
									submitHandler: function(form) {
										
										var selectedItems;
										$("#frmPrensaEventos input[@name='itemSelect[]']:checked").each(function(){
											selectedItems = selectedItems + $(this).val() + ", ";
										});

										selectedItems = selectedItems.replace('undefined','');

										$.post('../ajax.php', 
											{
												enviar_correo_evento: 1,
												txtNombreMedio: $('#txtNombreMedio').attr('value'),
												txtTelefono1: $('#txtTelefono1').attr('value'),
												txtEmail: $('#txtEmail').attr('value'),
												txtPaginaWeb: $('#txtPaginaWeb').attr('value'),
												Medios: selectedItems,
												txtApellido: $('#txtApellido').attr('value'),
												txtNombres: $('#txtNombres').attr('value'),
												txtDocumento: $('#txtDocumento').attr('value'),
												txtCargo: $('#txtCargo').attr('value'),
												txtTelefono2: $('#txtTelefono2').attr('value')
											},
											function (response) {
											}, 'json'
										);
										$('#frmPrensaEventos').reset();
										$('#submit-ok').attr('style','display:block');
										setTimeout(function(){ $('#submit-ok').fadeOut() }, 2000 );
									}
								});

                            });
                        </script>

						<div class="cnt-tabs">

                        	<div class="menu-tabs">
                                <a class="mnutab" id="1" style="width:104px">Acerca del evento</a>
                                <a class="mnutab" id="2">Expositores</a>
                                <a class="mnutab" id="3">Programa</a>
                                <a class="mnutab tabactivo" id="4">Preguntas frecuentes</a>
                                <a class="mnutab" id="5">Prensa</a>
                            </div>

                            <div class="cnttab" id="cnt1">
                                <?php echo "<img src='"._tt_."src=/aplication/webroot/imgs/eventos/".$objEvento->imagen_acerca."&w=267' align='right' />"; ?>
                                <p><?php echo $objEvento->texto_acerca; ?></p>
                            </div>

                            <div class="cnttab" id="cnt2"><?php echo $objEvento->texto_expo; ?></div>
                            
                            <div class="cnttab" id="cnt3"><?php echo $objEvento->texto_desfile; ?></div>

                            <div class="cnttab" id="cnt4" style="display:block">
                            
                                <div class="faqtit1">PREGUNTAS FRECUENTES SOBRE EL EVENTO EXPOBODAS ORGANIZADO POR REVISTA BODAS</div>
                                
                                <div class="faqtit2">SOBRE EL EVENTO</div>
                                
                                <div class="faqtit3">¿Qué es EXPOBODAS?</div>
                                <div class="faqtext">Es la feria de novios donde encontrarás todos los productos y servicios que necesitas para la elaboración de tu boda. Este evento es organizado por revista BODAS</div>
                                <div class="faqtit3">¿Cómo puedo asistir al EXPOBODAS?</div>
                                <div class="faqtext">Inscribiéndote a nuestro portal: www.bodas.com.pe, enviándonos un correo a: contacto@bodas.com.pe o llamándonos al 717 3737</div>
                                <div class="faqtit3">Si ya me registré y no me llegó la confirmación ¿Igual estoy inscrita?</div>
                                <div class="faqtext">No, si la confirmación no llegó correctamente puede que algún dato no haya sido ingresado de manera correcta. En ese caso comunícate con nosotros al 717 3737 para confirmar tu inscripción.</div>
                                
                                <div class="faqtit2">SOBRE EL INGRESO</div>
                                
                                <div class="faqtit3">¿Puedo ir acompañada?</div>
                                <div class="faqtext">Si, puedes ir acompañada de tu novio, familiares o amigos.</div>
                                <div class="faqtit3">¿Tengo que registrar a todos los que me acompañen al EXPOBODAS?</div>
                                <div class="faqtext">No, sólo es necesario la inscripción de la novia.</div>
                                <div class="faqtit3">¿Debo presentar algún documento al ingreso?</div>
                                <div class="faqtext">No es necesario presentar algún documento para el ingreso.</div>
                                <div class="faqtit3">¿El ingreso, tiene algún costo?</div>
                                <div class="faqtext">Es gratuito, no tiene costo.</div>
                                <div class="faqtit3">¿Debo inscribirme el día del evento?</div>
                                <div class="faqtext">Si, deberás inscribirte en el módulo de BODAS para poder participar de los sorteos que se realizarán a lo largo del evento.</div>
                                <div class="faqtext">Si ya me inscribí por el portal www.bodas.com.pe ¿por qué tengo que inscribirme de nuevo en el evento?</div>
                                <div class="faqtext">Porque tu inscripción por el portal es para tu asistencia y la inscripción el día del evento es para los sorteos.</div>
                                <div class="faqtit3">¿Puedo salir e ingresar al evento de nuevo?</div>
                                <div class="faqtext">Sí, puedes ingresar y salir las veces que desees.</div>
                                <div class="faqtit3">¿Pueden entrar niños?</div>
                                <div class="faqtext">No, no se permite el ingreso a niños debido a que el Centro de Convenciones Atlantic City también es Centro de Entretenimiento y Casino.</div>
                                
                                <div class="faqtit2">SOBRE EXPOSICIÓN DE COROS</div>
                                
                                <div class="faqtit3">¿Habrá exposición de coros?</div>
                                <div class="faqtext">Si, podrás disfrutar de los grupos corales en diferentes horarios.</div>
                                <div class="faqtit3">¿Qué coros se presentan y a qué horas?</div>
                                <div class="faqtext">La información la podrás encontrar en: www.bodas.com.pe/expobodas2011</div>
                                
                                <div class="faqtit2">SOBRE ESTACIONAMIENTO</div>
                                <div class="faqtit3">¿Hay estacionamiento?</div>
                                <div class="faqtext">Si, el Centro de Convenciones Atlantic City pone a tu disposición el estacionamiento con una tarifa plana especial de S/.10 para los asistentes al evento.</div>

                            </div>

                            <div class="cnttab" id="cnt5">
                            	<p>Bodas & Novios, contará con la presencia de medios de prensa, antes, durante y después del evento.</p>
								<p>Llenar el formulario con los datos solicitados. Para mayor información llamar al 717 3737 o escribir a atencionalcliente@bodas.com.pe Posteriormente, todos los asistentes y expositores podrán compartir el fin de fiesta.</p>

                                <p>

                                <form id="frmPrensaEventos" name="frmPrensaEventos" method="post" action="">
                                
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
                                            <td>Medio <br>(Al menos marque uno)</td>
                                            <td>
                                                <table class="tbls2" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Televisión"> Televisión </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Radio"> Radio </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Agencia de noticias"> Agencia de noticias </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Diario, Periodico"> Diario, Periodico </td>
                                                    </tr>
                                                    <tr>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Revista"> Revista </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Internet"> Internet </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Blog"> Blog </td>
                                                    <td><input type="checkbox" id="chkMedio" name="chkMedio[]" value="Otros"> Otros</td>
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
                                        <tr>
                                            <td colspan="2" align="right"><input type="submit" id="btnEnviar" name="btnEnviar" value="ENVIAR"></td>
                                        </tr>
                                    </table>
                                    <div id="submit-ok">Su mensaje fue enviado correctamente.</div>
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