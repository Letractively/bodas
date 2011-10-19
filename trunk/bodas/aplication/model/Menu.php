<?php
class Menu{
	function MenuIzquierdo(){
		if($_SESSION['session'][0]){
			/* SECCIONES */
			$array=Acceso::AccesoSecciones($_SESSION['session'][0]);
			if(is_array($array)){ ?>
				<div id="menu_izquierdo">
					<div class="item"><a href="index.php"> &nbsp; Inicio </a> </div> <?php 
				for($c=0;$c<sizeof($array);$c++){?>
					<!--<tr>
						<td bgcolor="lavender" class="titulo" ><?php echo $array[$c]['seccion']?></td></tr>--><?php 
						/*   PAGINAS  */
						$paginas=Acceso::AccesoPaginasSecciones($array[$c]['id_modulo'], $_SESSION['session'][0]);
						if(is_array($paginas)){ 
							for($z=0;$z<sizeof($paginas);$z++){?>
							<div class="item"> 
								<a href="<?php echo $paginas[$z]['url']?>"> &nbsp; <?php echo utf8_encode($paginas[$z]['pagina'])?></a>
							</div>								
							<?php
							} 
						}					
				} ?>
				</div> <?php
			}
		}
	}

	function MenuIzquierdoBlog(){
		if($_SESSION['session'][0]){
		?>
            <div id="menu_izquierdo">
                <div class="item"><a href="index.php"> &nbsp; Inicio </a> </div>
                <div class="item"><a href="cuenta.php"> &nbsp; Cuenta</a></div>
                <div class="item"><a href="articulos.php"> &nbsp; Articulos</a></div>
            </div>
		<?php 
		}
	}

}
 ?>
