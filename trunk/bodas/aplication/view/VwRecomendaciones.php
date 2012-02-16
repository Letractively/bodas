<?php
	class VwRecomendaciones extends Utiles{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-recomendaciones">

						<div class="titulo">Recomendaciones<span><a href="<?=_bs_?>luna_de_miel/">Regresar</a></span></div>
                        
                        <div class="texto">

                            <p>A la hora de planear un viaje y sobretodo el de luna de miel, se suelen tener en cuenta factores como la fecha, la temporada, la agencia de viajes, la línea aérea, el clima del destino, el costo del alojamiento, y demás.</p>
                            <p>Pero no se suele tener en cuenta el asunto de la prevención de enfermedades y las vacunas para viajar a ciertos lugares.</p>
                            <p>Para ello debemos seguir unas mínimas recomendaciones generales y consultar de forma orientadora las medidas de prevención más adecuadas entre las que se encuentran las vacunas para los viajeros según los diferentes destinos, sin olvidar medidas en relación a otros factores.</p>
                            <p>Aquí puedes descargar un PDF con las vacunas recomendadas para cada país: <a href="<?=_bs_?>aplication/webroot/archivos/vacunas.pdf" target="_blank">vacunas.pdf</a></p>
                            <p>Entre las recomendaciones que les podemos dar hay algunas que pueden interesarle a viajeros de cualquier parte del mundo según las siguientes enfermedades más comunes:</p>

							<p><span>La Malaria</span></p>
							<p>Se encuentra sobre todo en el África Subsahariana (toda la región al sur del Desierto del Sahara), en América Central, partes de Sudamérica, el Sudeste de Asia y Oceanía.</p>
                            
							<p>No hay vacuna, pero hay una medicación antimalárica preventiva para tomar antes y durante al viaje.</p>
                            
							<p><span>La Fiebre Amarilla</span></p>
							<p>Se encuentra sobre todo y a modo de endemia en África y Sudamérica.
Se recomienda vacunarse contra la Fiebre Amarilla antes de llegar a la zona endémica.</p>

							<p><span>Lyme</span></p>
							<p>Se encuentra sobre todo en la zona de bósques de Alemania, aunque incluso en esas áreas hay muy poco riesgo de contagio.</p>
							<p>Se transmite por picaduras de garrapatas (extraerse la garrapata antes de que pasen 72 horas puede prevenir la infección).</p>
							<p>No hay vacuna contra la enfermedad, pero hay ciertas medidas de prevención que se pueden averiguar.</p>
                            
							<p><span>La Hepatitis A</span></p>
							<p>Es una enfermedad endémica que se encuentra tanto en países desarrollados como subdesarrollados.</p>
							<p>Para prevención se puede dar la vacuna de la Hepatitis A y tener un buen control del agua y los alimentos que se consumen.</p>
                            
							<p><span>La Hepatitis B</span></p>
							<p>Se transmite a través de la sangre, las mucosas o el contacto sexual de infectados por el virus.</p>
    						<p>La vacuna contra la Hepatitis B es actualmente obligatoria desde el nacimiento, pero en todo caso a quienes estén en contacto con sangre o en situaciones riesgosas, se les recomienda prioritariamente vacunarse.</p>
                            
                            <p><span>El Cólera</span></p>
                            <p>Una enfermedad de distribución universal que hasta hoy tiene lugar sobre todo en países de Asia, África y Latinoamérica.</p>
                            <p>La vacuna contra el Cólera no se comercializa en todas partes, pero a modo de prevención se recomienda tomar precauciones con el agua y los alimentos que se consumen.</p>
                            
                            <p><span>La Fiebre Tifoidea</span></p>
                            <p>Se contagia por la contaminación de alimentos con la bacteria Salmonella Typhi o por el contacto de persona a persona.</p>
                            <p>Es endémica especialmente en países de África, India y en el Perú.</p>
                            <p>La vacuna contra la Fiebre Tifoidea se recomienda para quienes vayan a estar en esas zonas por más de 4 semanas o para quienes vayan a participar de viajes con pobres condiciones de higiene (como pueden ser viajes de aventura, o demás).</p>
                            
                            <p><span>La Polioemilitis</span></p>
                            <p>Aunque está en su mayoría erradicada, es endémica en zonas como el África Subsahariana o países al Sudoeste de Asia como India.</p>
                            <p>Se recomienda la vacuna sólo para los adultos que quieran visitar alguno de esos países.</p>
                            
                            <p><span>La Rabia</span></p>
                            <p>Se produce por mordedura o lamedura de algún animal contagiado en una herida abierta.</p>
                            <p>Tiene un período de incubación de 20 a 90 días antes de surgir efecto.</p>
                            <p>Para prevenir se recomienda la vacuna antirrábica.</p>
                            
                            <p><span>La Meningitis</span></p>
                            <p>Se transmite de persona a persona por medio de la tos, estornudos, o el contacto directo.</p>
                            <p>Se recomienda la vacuna meningococo para los que viajen a las zonas de África Subsahariana, el Medio Oriente o los peregrinos a la Meca.</p>

                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>