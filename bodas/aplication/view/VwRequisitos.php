<?php
	class VwRequisitos extends Utiles{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-requisitos">

						<div class="titulo">Requisitos para tu boda</div>
                        
                        <div class="texto">
                        
                        	<p><span>Boda Civil</span></p>
                        
                        	<p><b>PERUANOS</b></p>
                            <p><b>Solteros Mayores de Edad:</b></p>
                            
                            <p>Presentación de copia simple de Libreta electoral o DNI y muestra del original.</p>
							<p>Partida de Nacimiento actualizada.</p>
                            <p>Publicación de edicto matrimonial.</p>
                            <p>Presentación de los certificados médicos, indicando en ellos la fecha de emisión de los mismos.</p>
                        
                        	<p><b>Solteros Menores de Edad:</b></p>
                        
                        	<p>Partida de Nacimiento actualizada.</p>
                            <p>Presentación de los certificados médicos, indicando en ellos la fecha de emisión de los mismos.</p>
                            <p>Autorización Judicial o Notarial.</p>
                            <p>Copia simple de Libreta militar.</p>
                        
                        	<p><b>Viudos:</b></p>
                        
                        	<p>Todos los documentos para peruanos solteros mayores de edad.</p>
                            <p>Partida de Defunción correspondiente.</p>
                            <p>Declaración jurada de bienes y descendencia.</p>
                            
                            <p><b>EXTRANJEROS</b></p>
                        
                        	<p>Solteros Mayores de Edad:</p>
                            <p>Presentación de copia simple del pasaporte o carnet de extranjería, y muestra de los originales.</p>
                            <p>Partida de nacimiento.</p>
                            <p>Certificado de Soltería.</p>
                            <p>Certificado Domiciliario emitido por la comisaría del Distrito.</p>
                            <p>Certificado médicos correspondientes.</p>
                            <p>Requisitos mencionados en ítems 2,3,4 según el estado civil de los contrayentes.</p>

                        	<p><span>Boda Religiosa</span></p>
                        
                        	<p>La Boda debe ser celebrada en la iglesia perteneciente al distrito donde resida uno de los contrayentes, de lo contrario deberán realizar los trámites correspondientes al traslado y efectuar el pago respectivo por cambio de iglesia, el cual varía según distrito.</p>

							<p>Deberán presentar la partida de Bautizo de ambos, así como las constancias de primera comunión y confirmación. Toma en cuenta el tiempo que te llevará recaudarlas, sobre todo si realizaste ambos sacramentos fuera de la ciudad.</p>

							<p>Escoger a dos amigos, no familiares, como testigos de soltería, quienes deberán acercarse a la iglesia en el transcurso de los días previos a la ceremonia. El día de la boda deben acercarse dos testigos más, uno por cada contrayente, quienes quedarán asentados en el acta matrimonial. Ambos testigos deben ser bautizados y confirmados.</p>

							<p>Publicar los edictos de matrimonio religioso los cuales deben ser antes tramitados en la iglesia donde se realice la boda. La publicidad del mismo debe ser efectuada con tres semanas de anticipación a la ceremonia.</p>
                        
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>