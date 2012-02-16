<?php
	class VwCheckList extends Utiles{

		public function __construct(){}

		public function vista(){
			?>
            <script type="text/javascript">
            	$(document).ready(function() {
					$(".titlista").click(function(){
						$(".clista").slideUp("slow");
						$( "#lst"+$(this).attr('id') ).slideDown("slow");
					});
					$(".clista").slideUp("slow");
					$("#lst1").slideDown("slow");
				});
            </script>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-checklist">
						<div class="titulo">Check List<span><a href="<?=_bs_?>luna_de_miel/">Regresar</a></span></div>
                        <div class="texto">

							<div class="item">
                            	<p><b class="titlista" id="1">GENERAL</b></p>
                                <div class="clista" id="lst1">
                                    <p>
                                        <ul>
                                            <li><p>Maleta</p></li>
                                            <li><p>Bolsa de viaje para compras</p></li>
                                            <li><p>Bolsa de mano porta documentos</p></li>
                                            <li><p>Dinero en efectivo </p></li>
                                            <li><p>Tarjetas de crédito</p></li>
                                            <li><p>Candado</p></li>
                                            <li><p>Pequeña linterna + pilas</p></li>
                                            <li><p>Pañuelos de papel</p></li>
                                            <li><p>Libreta + Bolígrafo</p></li>
                                            <li><p>Libro + Guía +Mapa</p></li>
                                            <li><p>Impermeables</p></li>
                                            <li><p>Teléfono móvil + cargador</p></li>
                                            <li><p>Adaptador enchufe</p></li>
                                            <li><p>Lentes de medida</p></li>
                                            <li><p>Lentes de sol</p></li>
                                            <li><p>Cinta embalaje</p></li>
                                            <li><p>Bolsas de basura</p></li>
                                            <li><p>Botella agua mineral</p></li>
                                            <li><p>Pastillas purificadoras agua</p></li>
                                            <li><p>Reloj - Despertador</p></li>
                                            <li><p>Kit costura</p></li>
                                            <li><p>Bañador</p></li>
                                            <li><p>Pequeña toalla</p></li>
                                            <li><p>Calzado (bota monte - bota trekk - chancletas)</p></li>
                                            <li><p>Ropa interior</p></li>
                                            <li><p>Camisas</p></li>
                                            <li><p>Camisetas</p></li>
                                            <li><p>Pantalón - Falda</p></li>
                                            <li><p>Jean</p></li>
                                            <li><p>Pijama</p></li>
                                            <li><p>Bolsa de dormir</p></li>
                                            <li><p>Navaja Suiza</p></li>
                                            <li><p>Fósforos</p></li>
                                            <li><p>Fotos carnet</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>

							<div class="item">
                            	<p><b class="titlista" id="2">ASEO E HIGIENE</b></p>
                                <div class="clista" id="lst2">
                                    <p>
                                        <ul>
                                            <li><p>Neceser</p></li>
                                            <li><p>Pasta dientes</p></li>
                                            <li><p>Cepillo dientes</p></li>
                                            <li><p>Jabón líquido antibacterial</p></li>
                                            <li><p>Utensilios afeitar</p></li>
                                            <li><p>Tampones</p></li>
                                            <li><p>Champú </p></li>
                                            <li><p>Peine - Cepillo</p></li>
                                            <li><p>Toallitas húmedas</p></li>
                                            <li><p>Pañuelos de papel</p></li>
                                            <li><p>Protector solar</p></li>
                                            <li><p>Protector labial</p></li>
                                            <li><p>Cortauñas - tijeras</p></li>
                                            <li><p>Preservativos</p></li>
                                            <li><p>Anticonceptivos</p></li>
                                            <li><p>Otros cosméticos necesarios</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>

							<div class="item">
                            	<p><b class="titlista" id="3">DOCUMENTACIÓN</b></p>
                                <div class="clista" id="lst3">
                                    <p>
                                        <ul>
                                            <li><p>Foto carnet</p></li>
                                            <li><p>Fotocopia de la documentación (dni, pasaporte)</p></li>
                                            <li><p>DNI</p></li>
                                            <li><p>Pasaporte</p></li>
                                            <li><p>Visado</p></li>
                                            <li><p>Certificado internacional de vacunación</p></li>
                                            <li><p>Tarjeta de conducir</p></li>
                                            <li><p>Tarjeta seguridad social</p></li>
                                            <li><p>Guía de la zona o país</p></li>
                                            <li><p>Mapas de carretera</p></li>
                                            <li><p>Diccionario pequeño</p></li>
                                            <li><p>Direcciones embajadas y consulados</p></li>
                                            <li><p>Seguro de viaje</p></li>
                                            <li><p>Billete avión - tren - autobús</p></li>
                                            <li><p>Justificante reserva hotel - coche</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="item">
                            	<p><b class="titlista" id="4">FOTOGRAFÍA Y VIDEO</b></p>
                                <div class="clista" id="lst4">
                                    <p>
                                        <ul>
                                            <li><p>Cámara de fotos - vídeo</p></li>
                                            <li><p>Tarjetas memoria</p></li>
                                            <li><p>Funda para la cámara</p></li>
                                            <li><p>Protector contra agua y arena</p></li>
                                            <li><p>Baterías de recambio</p></li>
                                            <li><p>Cargadores de Baterías</p></li>
                                            <li><p>Cámara acuática</p></li>
                                            <li><p>Pequeño trípode</p></li>
                                            <li><p>Adaptador de corriente</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="item">
                            	<p><b class="titlista" id="5">ZONAS TROPICALES</b></p>
                                <div class="clista" id="lst5">
                                    <p>
                                        <ul>
                                            <li><p>Pantalones largos</p></li>
                                            <li><p>Camisas de manga larga</p></li>
                                            <li><p>Prendas anchas y ligeras</p></li>
                                            <li><p>Sombrero o gorra</p></li>
                                            <li><p>Redecilla mosquitera</p></li>
                                            <li><p>Pañuelo para cubrirse el cuello y proteger quemaduras</p></li>
                                            <li><p>Botas y sandalias</p></li>
                                            <li><p>Repelente mosquitos</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="item">
                            	<p><b class="titlista" id="6">ZONAS DESÉRTICAS</b></p>
                                <div class="clista" id="lst6">
                                <p>
                                	<ul>
                                        <li><p>Gorra con cuello</p></li>
                                        <li><p>Pantalón largo</p></li>
                                        <li><p>Camisa manga larga</p></li>
                                        <li><p>Pañuelo para cuello</p></li>
                                        <li><p>Ropa de abrigo para las noches</p></li>
                                        <li><p>Prendas anchas y ligeras para el día</p></li>
                                        <li><p>Botas herméticas para impedir la entrada de arena</p></li>
                                        <li><p>Ropa interior y calcetines</p></li>
                                    </ul>
                                </p>
                                </div>
                            </div>
                            
                            <div class="item">
                            	<p><b class="titlista" id="7">CLIMAS FRÍOS Y ÁRTICOS</b></p>
                                <div class="clista" id="lst7">
                                    <p>
                                        <ul>
                                            <li><p>Guantes</p></li>
                                            <li><p>Bufanda </p></li>
                                            <li><p>Medias de lana</p></li>
                                            <li><p>Botas de monte</p></li>
                                            <li><p>Gorro con orejeras</p></li>
                                            <li><p>Casacas polar</p></li>
                                            <li><p>Cortavientos</p></li>
                                            <li><p>Pantalón forrado</p></li>
                                            <li><p>Ropa interior térmica</p></li>
                                            <li><p>Paraguas</p></li>
                                            <li><p>Camisetas manga larga</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="item">
                            	<p><b class="titlista" id="8">MARES Y COSTAS</b></p>
                                <div class="clista" id="lst8">
                                    <p>
                                        <ul>
                                            <li><p>Zapatillas de goma</p></li>
                                            <li><p>Bañador</p></li>
                                            <li><p>Toalla</p></li>
                                            <li><p>Camiseta manga corta</p></li>
                                            <li><p>Bermudas</p></li>
                                            <li><p>Lentes de buceo + tubo</p></li>
                                            <li><p>Gorra</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="item">
                            	<p><b class="titlista" id="9">BOTIQUÍN</b></p>
                                <div class="clista" id="lst9">
                                    <p>
                                        <ul>
                                            <li><p>Vendas</p></li>
                                            <li><p>Kit serpientes</p></li>
                                            <li><p>Analgésicos</p></li>
                                            <li><p>Calmantes</p></li>
                                            <li><p>Esparadrapo</p></li>
                                            <li><p>Agua oxigenada</p></li>
                                            <li><p>Parche para ampollas</p></li>
                                            <li><p>Medicamentos habituales (alergias)</p></li>
                                            <li><p>Medicamentos específicos</p></li>
                                            <li><p>Laxante</p></li>
                                            <li><p>Anti diarreico</p></li>
                                            <li><p>Colirio</p></li>
                                            <li><p>Spray nasal</p></li>
                                            <li><p>Yodo</p></li>
                                            <li><p>Tijeras punta redonda</p></li>
                                            <li><p>Curitas</p></li>
                                            <li><p>Paracetamol</p></li>
                                            <li><p>Aspirinas</p></li>
                                            <li><p>Acidez Gástrica</p></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>