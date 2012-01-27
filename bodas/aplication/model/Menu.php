<?php
	class Menu{

		public function MenuIzquierdo(){
			$array = Acceso::AccesoSecciones($_SESSION['session'][0]);
			if(is_array($array)){ ?>
				<div id="menu_izquierdo">
					<ul>
                    	<li><a href="index.php">Inicio</a></li>
					<?php
					for( $c = 0 ; $c < sizeof($array) ; $c++ ){
							$paginas = Acceso::AccesoPaginasSecciones($array[$c]['id_modulo'], $_SESSION['session'][0]);
							if(is_array($paginas)){
								for( $z = 0 ; $z < sizeof($paginas) ; $z++ ){?>
								<li><a href="<?php echo $paginas[$z]['url']?>"> <?php echo utf8_encode($paginas[$z]['pagina'])?></a></li>
								<?php
								}
							}
					} ?></ul></div>
					<?php
			}
		}

	}
?>