<?php
	class VwQuienesSomos extends Utiles{

		public function __construct(){}

		public function vista(){
			?>
				<div class="margen-index">
                
                	<?php include(_inc_."inc.menu-rubros.php"); ?>
                    
                    <div class="contenido-central-quienes-somos">

						<div class="titulo">Quiénes Somos</div>
                        
                        <div class="texto">

							<img src="<?php echo _img_ ?>img-somos.png" align="left">
                            <p>Ut ante venenatis aliquet et et ligula. Duis aliquet, tellus et dictum aliquam, ligula enim sodales libero, non auctor urna neque adipiscing felis. In a vehicula mi. Suspendisse eu velit in neque aliquam iaculis ut sed. Ut ante venenatis aliquet et et ligula. Duis aliquet, tellus et dictum aliquam, ligula enim sodales libero, non auctor urna neque adipiscing felis. In a vehicula mi. Suspendisse eu velit in neque aliquam iaculis ut sed.</p>

							<p>Ut ante venenatis aliquet et et ligula. Duis aliquet, tellus et dictum aliquam, ligula enim sodales libero, non auctor urna neque adipiscing felis. In a vehicula mi. Suspendisse eu velit in neque aliquam iaculis ut sed.</p>
                            
                            <p><b>Misión</b></p>
                            
                            <p>Ut ante venenatis aliquet et et ligula. Duis aliquet, tellus et dictum aliquam, ligula enim sodales libero, non auctor urna neque adipiscing felis. In a vehicula mi. Suspendisse eu velit in neque aliquam iaculis ut sed.</p>
                            
                            <p><b>Visión</b></p>
                            
                            <p>Ut ante venenatis aliquet et et ligula. Duis aliquet, tellus et dictum aliquam, ligula enim sodales libero, non auctor urna neque adipiscing felis. In a vehicula mi. Suspendisse eu velit in neque aliquam iaculis ut sed.</p>
                            
                        </div>

                    </div>
                    <?php include(_inc_.'inc.derecha.php'); ?>
                </div>
			<?php
		}

	}
?>