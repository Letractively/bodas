// JavaScript Document

$(document).ready(function() {
	
	if($('#base').length > 0){
		var base = $('#base').val();
		var loader = '<img id="loader" src="' + base + 'aplication/webroot/imgs/icons/ajax-loader.gif" />';
	}
	
	if($('#galleria').length > 0){
		Galleria.loadTheme(base+'aplication/webroot/js/galleria/galleria.classic.min.js');
		$('#galleria').galleria({
			width:504,
			height:356	
		});
	}

	if($('.dp').length > 0){ 
		$('.dp').datepicker({dateFormat:'yy-mm-dd',changeMonth: true,changeYear: true, yearRange: '1970:2011', }); 
	}
	
	if($('#des_2').length){
		CKEDITOR.replace('des_2',
			{
			skin:'kama',
			uiColor:'#e6edf3',
			toolbar:[
				['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print','SpellChecker','Scayt'],
				['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
				['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
				['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Styles','Format','Font','FontSize','-','TextColor','BGColor'],
				['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
				['Link','Unlink','Anchor']
			]
		});
	}	
	
	if($('#frmRegistrese').length > 0){ 
		$('#frmRegistrese').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				fleLogo: { required:true, accept:'jpg' },
				txtNombre: 'required',
				txtApellido: 'required',
				txtCorreo: { 
					required: true, 
					email: true,
					remote: {
						url: base+"usuario_cliente_validacion.php",
						type: "post",
						data: { verificar_email_repetido: "1" }
					}
				},
				txtTelefono: 'required',
				txtPassword1: 'required',
				txtPassword2: { required: true, equalTo: "#txtPassword1" },
				txtFechaCumple: 'required',
				txtNombrePareja: 'required',
				txtFechaBoda: 'required',
				txtPais: 'required',
				txtProvincia: 'required',
				txtDistrito: 'required',
				chkCondiciones: 'required'
				
			},
			messages:{
				fleLogo: { required:'Seleccione un archivo', accept:'solo se acepta archivos .jpg' },
				txtNombre: 'Ingresa su nombre.',
				txtApellido: 'Ingresa su apellido.',
				txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
				txtTelefono: 'Ingresa su telefono.',
				txtPassword1: 'Ingrese una contraseña',
				txtPassword2: { required: 'Escriba de nuevo la contraseña', equalTo: "La contraseña no coincide" },
				txtFechaCumple: 'Ingrese la fecha de su cumpleaños',
				txtNombrePareja: 'Ingrese el nombre de su pareja',
				txtFechaBoda: 'Ingrese la fecha de su boda',
				txtPais: 'Ingrese su Pais',
				txtProvincia: 'Ingrese su provincia / estado',
				txtDistrito: 'Ingrese su distrito',
				chkCondiciones: 'Debe aceptar las condiciones'
			}
		});
	}


	/*	Editar cuenta	*/
	if($('#frmEditarCuenta').length > 0){ 
		$('#frmEditarCuenta').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				fleLogo: { accept:'jpg' },
				txtNombre: 'required',
				txtApellido: 'required',
				txtCorreo: { 
					required: true, 
					email: true,
					remote: {
						url: base+"usuario_cliente_validacion.php",
						type: "post",
						data: { verificar_email_repetido: "2", correo_actual: $('#correo_actual').val() }
					}
				},
				txtTelefono: 'required',
				txtPassword2: { equalTo: "#txtPassword1" },
				txtFechaCumple: 'required',
				txtNombrePareja: 'required',
				txtFechaBoda: 'required',
				txtPais: 'required',
				txtProvincia: 'required',
				txtDistrito: 'required'
			},
			messages:{
				fleLogo: { accept:'solo se acepta archivos .jpg' },
				txtNombre: 'Ingresa su nombre.',
				txtApellido: 'Ingresa su apellido.',
				txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
				txtTelefono: 'Ingresa su telefono.',
				txtPassword2: { equalTo: "La contraseña no coincide" },
				txtFechaCumple: 'Ingrese la fecha de su cumpleaños',
				txtNombrePareja: 'Ingrese el nombre de su pareja',
				txtFechaBoda: 'Ingrese la fecha de su boda',
				txtPais: 'Ingrese su Pais',
				txtProvincia: 'Ingrese su provincia / estado',
				txtDistrito: 'Ingrese su distrito'
			}
		});
	}

	/*	Editar proveedor	*/
	$('#frmEditarInformacionEmpresa').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtNombre: 'required',
			fleLogo: { accept:'jpg|gif' },
			txtDescripcionCorta: 'required'
		},
		messages:{
			txtNombre: 'Ingresa un nombre.',
			fleLogo: { accept:'solo se acepta archivos .jpg y .gif' },
			txtDescripcionCorta: 'Ingrese una descripcion corta.'
		}
	});
	
	/*	Nuevo recomendado	*/
	$('#frmNuevoRecomendado').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			fleLogo: { accept:'jpg|gif' },
			txtLink: 'required'
		},
		messages:{
			fleLogo: { accept:'solo se acepta archivos .jpg y .gif' },
			txtLink: 'Ingrese una url.'
		}
	});

	/*	Nuevo recomendado	*/
	$('#frmNuevoRedSocial').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtLink: 'required'
		},
		messages:{
			txtLink: 'Ingrese una url.'
		}
	});

	/*	Acceso	*/
	if($('.contenedor-login').length > 0){ 
		if($('#frmAcceso').length > 0){ 
			$('#frmAcceso').validate({
				errorElement: 'label',
				errorClass: 'error',
				rules:{
					txtUsuario: { required: true, email: true },
					txtPassword: 'required'
				},
				messages:{
					txtUsuario: { required: '' , email: '' },
					txtPassword: ''
				}
			});
		}

		$('#des_login').click(function() {
			$('.contenedor-login').toggle('fast');
		});
	}

	/*	Recuperar clave	*/
	if($('#frmRecuperarClave').length > 0){ 
		$('#frmRecuperarClave').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				txtEmailRecuperar: { required: true, email: true }
			},
			messages:{
				txtEmailRecuperar: { required: 'Ingrese un correo' , email: 'Correo invalido' }
			}
		});
	}

	$('.delete, .eliminar').click(function(){
		if($(this).attr('class') == "delete" || $(this).attr('class') == "eliminar"){
			if(!confirm("Esta completamente seguro?, recuerde que puede cambiar de estado el registro.")){
				return false;
			}else{
				var url = base + '/' + $(this).attr('name') + '/' + $(this).attr('id')+'/';
				location.replace(url);		
			}		
		}
	});


	var peso_proveedor = '50 KB';
	var trig = false;
	var gif = base + 'aplication/webroot/js/swfupload/ajax-loader.gif';
	var sus = 'Archivo guardado!, espere...';
	var flash_url = base + 'aplication/webroot/js/swfupload/swfupload.swf';
	var button_image_url = base + 'aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png';


	$.fn.bindAll = function(options) { var $this = this; $.each(options, function(key, val){ $this.bind(key, val); }); return this; }


	// Cargador de fotos del proveedor
	var listeners_proveedor_imagenes = {
		fileQueued: function(event, file){
			$(this).swfupload('startUpload');
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo '"+file.name+"' es demasiado pesado, el limite es 80 KB."); exit;
					case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
						alert("El archivo esta vacio."); exit;
					case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
						alert("El archivo no tiene el tipo permitido."); exit;
					default:
						alert("A ocurrido un error en la carga de archivos, intentelo mas tarde."); exit;
				}
			} catch (e) {}
			result = errorCode;
		},
		fileDialogStart: function(event){ },
		fileDialogComplete: function(event, numFilesSelected, numFilesQueued){ },
		uploadStart: function(event, file){ },
		uploadProgress: function(event, file, bytesLoaded){ 
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load').remove();
			$('.log').after('<b id="load"><img src="'+gif+'">'+file.name+' - Subiendo... '+ porciento +'%</b>');
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load').remove();
			$('.log').after('<b id="load"><img src="'+gif+'">'+file.name+' - Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			regencoded = jQuery.parseJSON(serverData);
			newItemFoto = '<div id="foto_'+regencoded.data[0].id_proveedor_imagen+'" nom_foto="'+regencoded.data[0].imagen_proveedor_imagen+'" class="item_img"><div class="eliminar_imagen" title="'+regencoded.data[0].id_proveedor_imagen+'">X</div><div class="nombre"><img src="' + base + 'aplication/utilities/tt.php?src=/aplication/webroot/imgs/proveedores_fotos/'+regencoded.data[0].imagen_proveedor_imagen+'&w=80"></div></div>';
			$('.cont_imagenes').append(newItemFoto);

			$('#load').remove();
			$('.log').after('<b id="load">'+file.name+' - Completado!!</b>');
		},
		uploadComplete: function(event, file){
			$('#load').remove();
			$('.log').after('<b id="load">Carga terminada, a la espera de mas archivos.</b>');
			$(this).swfupload('startUpload'); 
		},
		uploadError: function(event, file, errorCode, message){ }
	};


	$('.swfupload-proveedor-imagenes').bindAll(listeners_proveedor_imagenes);
	$('.swfupload-proveedor-imagenes').each(function(){
		$(this).swfupload({
			upload_url: base + "upload.php?proveedores_fotos&id_proveedor="+$('#id_proveedor').attr('value'),
			file_size_limit : "50 KB",
			file_types : "*.jpg",
			file_types_description : "Imagenes",
			file_upload_limit : "0",
			flash_url : flash_url,
			button_image_url : button_image_url,
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button', this)[0],
			debug: false
		});
	});


	if($('.eliminar_imagen').length > 0){
		$(".eliminar_imagen").live("click", function(){
			id_cls = $(this).parent(0).attr('id');
			nom_foto = $(this).parent(0).attr('nom_foto');
			id_foto = id_cls.substring(5);
			$(this).html('<img src="' + base + 'aplication/webroot/js/swfupload/ajax-loader.gif">');
			$.post(base + 'delete_imagen.php', 
				{
					opcion: 'foto',
					id: id_foto,
					nom_foto: nom_foto
				},
				function(response){
					$('#foto_'+id_foto).remove();
				}
			);
		});
	}


	$('#btnPublicar').click(function(){
		if( $('#areaPublicacion').val() != '' && $('#areaPublicacion').val() != 'Escribe aqui tu publicacion' ){
			$(loader).insertAfter( $('#btnPublicar') );
			$('.aler_error').remove();
			
			$.post(base+'ajax.php',{
					agregar_publicacion: 1,
					id_proveedor: $('#id_proveedor').val(),
					publicacion: $('#areaPublicacion').val()
				},
				function (response) {
					var record = response.data;
					$('#loader, .aler_error, #sin_publicacion').remove();
					$('.cnt_actividad').prepend('<div id="post'+record[0].id_proveedor_publicacion+'" class="item"><div class="imagen"><img src="'+$('#img_proveedor').attr('src')+'" /></div><div class="contenido"><p class="texto">'+record[0].texto_proveedor_publicacion+'</p><p class="num_com">0 Comentarios '+record[0].fecha1+' '+record[0].fecha2+'</p><div class="del" id="'+record[0].id_proveedor_publicacion+'">x</div></div></div>');
				}, 'json'
			);
			$('#areaPublicacion').val('');
		}
		return false;
	});


	$('.del').live("click", function(){
		$.post(base+'ajax.php',{
				eliminar_post_banda: 1,
				idpublicacion: $(this).attr('id')
			},
			function (response) {}
		);
		$('#post'+$(this).attr('id')).remove();
	});


	var options = {
		'maxCharacterSize': 80,  
		'originalStyle': 'originalDisplayInfo',  
		'warningStyle': 'warningDisplayInfo',    
		'warningNumber': 40,  
		'displayFormat': '#input / #max caracteres &nbsp;|&nbsp; #words Palabras.'  
	};

	if($('#areaPublicacion').length > 0){ 
    	$('#areaPublicacion').textareaCount(options);
	}
	if($('.areaPublicacionComentario').length > 0){ 
		$('.areaPublicacionComentario').textareaCount(options);  
	}
	if($('.labely').length > 0){ 
		$(".labely").labelify({ labelledClass: "labelHighlight" });
	}

	$('.btnPublicarComentario').click(function(){

		var var_c = $(this).attr('id');

		if( $('#post'+var_c+' .areaPublicacionComentario').val() != '' && $('#post'+var_c+' .areaPublicacionComentario').val() != 'Comentario' ){

			$(loader).insertAfter( $('#btnPublicar') );
			$('.aler_error').remove();

			$.post(base+'ajax.php',{
					agregar_publicacion_comentario: 1,
					id_proveedor_publicacion: var_c,
					id_usuario_cliente: $('#id_usuario_cliente').val(),
					comentario: $('#post'+var_c+' .areaPublicacionComentario').val()
				},
				function (response) {
					var record = response.data;
					$('#loader, .aler_error, #sin_publicacion').remove();

					$('#post'+var_c+' .lista_comentarios').append('<li id="comentario_'+record[0].id_comentario+'"><div class="del_comentario" id="'+record[0].id_comentario+'">x</div><img src="'+$('#hidImagenUser').val()+'" align="left" /><b>'+record[0].nombre_usuario_cliente+' dijo: </b>'+record[0].comentario+'</li>');

				}, 'json'
			);

			$('#post'+var_c+' #sin_comentarios').remove();
			$('#post'+var_c+' .num_com span').html($( '#post' + var_c + ' .lista_comentarios li').size()+1 );
			$('#post'+var_c+' .areaPublicacionComentario').val('');
		}
		return false;
	});

	$('.del_comentario').live("click", function(){
		$.post(base+'ajax.php',{
				eliminar_comentario: 1,
				id_comentario: $(this).attr('id')
			},
			function (response) {}
		);
		$('#comentario_'+$(this).attr('id')).remove();
	});

});