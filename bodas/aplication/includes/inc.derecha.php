<div class="contenido-derecha">
	<!--<div class="banner-300-100">
    
			<?php if( _file_ == 'index.php'){ ?>

                <div id='div-gpt-ad-1328744417031-1' style='width:300px; height:100px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-1'); });
                </script>
                </div>

            <?php }else{ ?>
                
                <div id='div-gpt-ad-1328744417031-1' style='width:300px; height:100px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-1'); });
                </script>
                </div>
                

                <div id='div-gpt-ad-1328744417031-6' style='width:300px; height:100px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-6'); });
                </script>
                </div>

            <?php } ?>
        
    </div>-->

	<?php if( _file_ != 'index.php'){ ?>
    <div class="banner-300-100">
    	<img src="<?=_img_?>bodasynovios.jpg">
    </div>
    <?php } ?>

    <?php if( _file_ == 'index.php'){ ?>
        <div class="banner-libre">
            <img src="<?=_img_?>head_formindex.jpg">
            <br clear="all">
            <div class="cnt_inscripcion">
            
            	<script type="text/javascript">
					$(document).ready(function() {
						
						jQuery.fn.reset = function () {
							$(this).each (function() { if (!$(this).is(':hidden')) this.reset(); });
						}
						
						if($('#base').length > 0){ var base = $('#base').val(); }
						
						$('#frm_inscripcion').submit(function() { return false; });
						
						$('#frm_inscripcion').validate({
							errorElement: 'label',
							errorClass: 'error',
							rules:{
								txtINombres: 'required',
								txtIDireccion: 'required',
								txtIDistrito: 'required',
								txtITelefono: 'required',
								txtICelular: 'required',
								txtIEmail: { required: true, email: true },
								txtIFechaBoda: 'required'
							},
							messages:{
								txtINombres: '',
								txtIDireccion: '',
								txtIDistrito: '',
								txtITelefono: '',
								txtICelular: '',
								txtIEmail: { required: '', email: '' },
								txtIFechaBoda: ''
							},
							submitHandler: function(form) {
								$.post(base+'ajax.php', 
									{
										enviar_correo_index: 1,
										txtINombres: $('#txtINombres').attr('value'),
										txtIDireccion: $('#txtIDireccion').attr('value'),
										txtIDistrito: $('#txtIDistrito').attr('value'),
										txtITelefono: $('#txtITelefono').attr('value'),
										txtICelular: $('#txtICelular').attr('value'),
										txtIEmail: $('#txtIEmail').attr('value'),
										txtIFechaBoda: $('#txtIFechaBoda').attr('value')
									},
									function (response) {
									}, 'json'
								);
								$('#frm_inscripcion').reset();
								$('#submit-ok').attr('style','display:block');
								setTimeout(function(){ $('#submit-ok').fadeOut() }, 2000 );
							}
						});

					});
                </script>
                
            	<form id="frm_inscripcion" name="frm_inscripcion" action="" method="post">
                	<label>Nombres y apellidos:</label><input type="text" id="txtINombres" name="txtINombres"><br clear="all">
                    <label>Dirección:</label><input type="text" id="txtIDireccion" name="txtIDireccion"><br clear="all">
                    <label>Distrito:</label><input type="text" id="txtIDistrito" name="txtIDistrito"><br clear="all">
                    <label>Teléfono:</label><input type="text" id="txtITelefono" name="txtITelefono"><br clear="all">
                    <label>Celular:</label><input type="text" id="txtICelular" name="txtICelular"><br clear="all">
                    <label>E-mail:</label><input type="text" id="txtIEmail" name="txtIEmail"><br clear="all">
                    <label>Fecha de boda:</label><input type="text" id="txtIFechaBoda" name="txtIFechaBoda" class="dp2"><br clear="all">
					<input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar">
                    <div id="submit-ok">Su mensaje fue enviado correctamente</div>
                </form>
                
            </div>
        </div>
    <?php } ?>

	<?php if( _file_ != 'index.php'){ ?>
        <div class="banner-300-250">
            <?php if( _file_ == 'index.php'){ ?>
    
                <!-- index-principal -->
                <div id='div-gpt-ad-1328744417031-3' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-3'); });
                </script>
                </div>
    
            <?php }else{ ?>
                
                <!-- index-principal -->
                <div id='div-gpt-ad-1328744417031-3' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-3'); });
                </script>
                </div>
                
                <!-- interiores-principal -->
                <!--<div id='div-gpt-ad-1328744417031-8' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-8'); });
                </script>
                </div>-->
    
            <?php } ?>
        </div>
    <?php } ?>
    
    <div class="video-semana">
    	<p class="titulo"><img src="<?php echo _img_?>titulo-index-video.png"></p>
        <p class="video"><iframe width="292" height="240" src="http://www.youtube.com/embed/videoseries?list=PL259019E1DC0785F6&amp;hl=es_ES&amp;wmode=opaque" frameborder="0" allowfullscreen></iframe></p>
    </div>
    <div class="banner-300-250" style="margin:10px 0 0 0;">
    
			<?php if( _file_ == 'index.php'){ ?>

                <!-- index-medio -->
                <div id='div-gpt-ad-1328744417031-2' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-2'); });
                </script>
                </div>


            <?php }else{ ?>
                
                <!-- index-medio -->
                <div id='div-gpt-ad-1328744417031-2' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-2'); });
                </script>
                </div>
                
                <!-- interiores-medio -->
                <!--<div id='div-gpt-ad-1328744417031-7' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-7'); });
                </script>
                </div>-->

            <?php } ?>
        
    </div>
    <div class="banner-300-250">

			<?php if( _file_ == 'index.php'){ ?>

                <!-- index-inferior -->
                <div id='div-gpt-ad-1328744417031-0' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-0'); });
                </script>
                </div>
   
            <?php }else{ ?>
                
                <!-- index-inferior -->
                <div id='div-gpt-ad-1328744417031-0' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-0'); });
                </script>
                </div>
                
                <!-- interiores-inferior -->
                <!--<div id='div-gpt-ad-1328744417031-5' style='width:300px; height:250px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1328744417031-5'); });
                </script>
                </div>-->

            <?php } ?>

    </div>
</div>