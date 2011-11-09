$(document).ready(function(){

	/*-------------------------------------VARIADAS---------------------------------------*/
	var gif = '../aplication/webroot/js/swfupload/ajax-loader.gif';
	var sus = 'Archivo guardado!, espere...';
	var flash_url = '../aplication/webroot/js/swfupload/swfupload.swf';
	var button_image_url = '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png';

	$.fn.bindAll = function(options) {
		var $this = this;
		$.each(options, function(key, val){
			$this.bind(key, val);
		});
		return this;
	}

	/*-------------------------------------UPLOAD DE PROVEEDOR---------------------------------------*/
	var peso_proveedor = '50 KB';
	var listeners = {
		fileQueued: function(event, file){
			$('#archivo').attr('value',file.name);
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
			var swfu = $.swfupload.getInstance('.swfupload-proveedor');
			$('#archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#archivo').attr('value',serverData);
			$('#load2').remove();
			$('#archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) { document.f1.submit(); }
		},
	};

	$('.swfupload-proveedor').bindAll(listeners);
	$('.swfupload-proveedor').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?proveedor",
			file_size_limit : peso_proveedor,
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_post_name: "Filedata", file_upload_limit : "0", file_queue_limit : "1", flash_url : flash_url, button_image_url : button_image_url, button_width : 61, button_height : 22, button_placeholder : $('#upload_button')[0], debug: false
		});
	});

});