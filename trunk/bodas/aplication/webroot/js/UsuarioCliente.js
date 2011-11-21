// JavaScript Document
$(document).ready(function(){

	var peso_proveedor = '7050 KB';
	var trig = false;
	var gif = '../aplication/webroot/js/swfupload/ajax-loader.gif';
	var sus = 'Archivo guardado!, espere...';
	var flash_url = '../aplication/webroot/js/swfupload/swfupload.swf';
	var button_image_url = '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png';

	$.fn.bindAll = function(options) { var $this = this; $.each(options, function(key, val){ $this.bind(key, val); }); return this; }


	$('#frmUsuarioNuevo').validate({
		errorElement: 'label',
		errorClass: 'error',
		rules:{
			txtNombre: 'required',
			campo_archivo: 'required',
			txtCorreo: { 
				required: true, 
				email: true,
				remote: {
					url: "usuario_cliente_validacion.php",
					type: "post",
					data: { verificar_email_repetido: "1" }
				}
			},
			txtPassword1: 'required',
			txtPassword2: { required: true, equalTo: "#txtPassword1" }
		},
		messages:{
			txtNombre: 'Ingresa un nombre.',
			campo_archivo: 'Seleccione un foto.',
			txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
			txtPassword1: 'Ingrese una contraseña',
			txtPassword2: { required: 'Escriba de nuevo la contraseña', equalTo: "La contraseña no coincide" }
		},
		submitHandler: function(form) {
			if(trig == false){ trig = true; return false; }else{ form.submit();	}
		}
	});


	$('#usuario_guardar_nuevo').click(function(){
		$('#frmUsuarioNuevo').attr('action','?opcion=add_new');
		$('.swfupload-usuarioCliente').swfupload('startUpload');
	});


	$('#usuario_guardar_listar').click(function(){
		$('#frmUsuarioNuevo').attr('action','?opcion=add_list');
		$('.swfupload-usuarioCliente').swfupload('startUpload');
	});


	$('#frmUsuarioEditar').validate({
		errorElement: 'label',
		errorClass: 'error',
		rules:{
			txtNombre: 'required',
			txtCorreo: { 
				required: true, 
				email: true,
				remote: {
					url: "usuario_cliente_validacion.php",
					type: "post",
					data: { verificar_email_repetido: "2", correo_actual: $('#txtCorreo2').attr('value') }
				}
			},
			txtPassword2: { equalTo: "#txtPassword1" }
		},
		messages:{
			txtNombre: 'Ingresa un nombre.',
			txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
			txtPassword2: { equalTo: "La contraseña no coincide" }
		},
		submitHandler: function(form) {
			if($('#campo_archivo').val() == ''){
				form.submit();
			}else{
				if(trig == false){ trig = true; return false; }else{ form.submit();	}
			}
		}
	});


	$('#usuario_editar_listar').click(function(){
		$('#frmUsuarioEditar').attr('action','?opcion=actualizar&id=' + $('#id_usuario').attr('value') );
		if($('#campo_archivo').val() == ''){
			$('#frmUsuarioEditar').submit();
		}else{
			$('.swfupload-usuarioCliente').swfupload('startUpload');
		}
	});

	// Cargador de logo del proveedor
	var listeners = {
		fileQueued: function(event, file){
			$('#campo_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es "+peso_proveedor+"."); exit;
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
		fileDialogStart: function(event){
			var swfu = $.swfupload.getInstance('.swfupload-usuarioCliente');
			$('#campo_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#campo_archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#campo_archivo').attr('value',serverData);
			$('#load2').remove();
			$('#campo_archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if(us == true){
				if ($('#frmUsuarioNuevo').length){
					$('#frmUsuarioNuevo').submit();
				}else{
					$('#frmUsuarioEditar').submit();
				}
				
			}
		}
	};

	$('.swfupload-usuarioCliente').bindAll(listeners);
	$('.swfupload-usuarioCliente').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?usuario_cliente",
			file_size_limit : peso_proveedor,
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_post_name: "Filedata", file_upload_limit : "0", file_queue_limit : "1", flash_url : flash_url, button_image_url : button_image_url, button_width : 61, button_height : 22, button_placeholder : $('#upload_button')[0], debug: false
		});
	});

	$(".rdoAdmin").click(function () {
		if($(this).val() == 1){
			$(".panel_admin_proveedor").show('fast');
		}else{
			$(".panel_admin_proveedor").hide('fast');
		}
	});
	$(".panel_admin_proveedor").hide('fast');

});