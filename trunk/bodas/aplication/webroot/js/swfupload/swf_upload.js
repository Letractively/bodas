$(document).ready(function(){

	/*-------------------------------------VARIADAS---------------------------------------*/
	var gif = '../aplication/webroot/js/swfupload/ajax-loader.gif';
	var sus = 'Archivo guardado!, espere...';
	
	$.fn.bindAll = function(options) {
		var $this = this;
		$.each(options, function(key, val){
			$this.bind(key, val);
		});
		return this;
	}
	/*----------------------------------------------------------------------------------- */

	/*-------------------------------------UPLOAD DE PUBLICIDAD---------------------------------------*/
	var listeners = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 100 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control').bindAll(listeners);
	$('.swfupload-control').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?publicidad",
			file_post_name: "Filedata",
			file_size_limit : "100 KB",
			file_types : "*.jpg; *.swf",
			file_types_description : "Imagen o animación",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*----------------------------------------------------------------------------------------------*/

	/*-------------------------------------UPLOAD DE NOTICIAS---------------------------------------*/
	var numfilesUpNot = 0;

	var listeners_noticias = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 100 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-noticias');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-noticias').bindAll(listeners_noticias);
	$('.swfupload-control-noticias').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?noticia",
			file_post_name: "Filedata",
			file_size_limit : "100 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/

	/*-------------------------------------UPLOAD DE BANDAS---------------------------------------*/
	var numfilesUpNot = 0;

	var listeners_bandas = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 60 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-bandas');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-bandas').bindAll(listeners_bandas);
	$('.swfupload-control-bandas').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?bandas",
			file_post_name: "Filedata",
			file_size_limit : "60 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/

	/*-------------------------------------UPLOAD DE AUSPICIADORES------------------------------------*/
	var listeners_auspiciadores1 = {
		fileQueued: function(event, file){
			$('#nombre_archivo1').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 100 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-auspiciadores1');
			$('#nombre_archivo1').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load1').remove();
			$('#nombre_archivo1').after('<b id="load1"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo1').attr('value',serverData);
		},
		uploadComplete: function(event, file){
			if (us == true) {
				if( $('#nombre_archivo2').attr('value') == '' ){
					$('#load1').remove();
					$('#nombre_archivo1').after('<b id="load1">'+sus+'</b>');
					document.f1.submit();
				}else{
					$('#load1').remove();
					$('#nombre_archivo1').after('<b id="load1">'+sus+'</b>');
					$('.swfupload-control-auspiciadores2').swfupload('startUpload');
				}
			}
		}
	};

	$('.swfupload-control-auspiciadores1').bindAll(listeners_auspiciadores1);
	$('.swfupload-control-auspiciadores1').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?auspiciadores",
			file_post_name: "Filedata",
			file_size_limit : "100 KB",
			file_types : "*.swf",
			file_types_description : "Animacion",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});

	var listeners_auspiciadores2 = {
		fileQueued: function(event, file){
			$('#nombre_archivo2').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 100 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-auspiciadores2');
			$('#nombre_archivo2').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo2').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo2').attr('value',serverData);
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load2').remove();
				$('#nombre_archivo2').after('<b id="load2">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-auspiciadores2').bindAll(listeners_auspiciadores2);
	$('.swfupload-control-auspiciadores2').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?auspiciadores",
			file_post_name: "Filedata",
			file_size_limit : "100 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/

	/*---------------------------------------UPLOAD DE EVENTOS----------------------------------------*/
	var listener_eventos = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 150 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-eventos');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load').remove();
			$('#nombre_archivo').after('<b id="load"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load').remove();
				$('#nombre_archivo').after('<b id="load">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-eventos').bindAll(listener_eventos);
	$('.swfupload-control-eventos').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?evento",
			file_post_name: "Filedata",
			file_size_limit : "150 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/

	/*---------------------------------------UPLOAD DE CONCURSOS--------------------------------------*/
	var listener_concursos = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 250 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-concursos');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load').remove();
			$('#nombre_archivo').after('<b id="load"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load').remove();
				$('#nombre_archivo').after('<b id="load">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-concursos').bindAll(listener_concursos);

	$('.swfupload-control-concursos').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?concursos",
			file_post_name: "Filedata",
			file_size_limit : "250 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/

	/*---------------------------------------UPLOAD DE CONCURSOS--------------------------------------*/
	var listener_concursos = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 4 MB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-articuloAudio');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load').remove();
			$('#nombre_archivo').after('<b id="load"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load').remove();
				$('#nombre_archivo').after('<b id="load">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-articuloAudio').bindAll(listener_concursos);

	$('.swfupload-control-articuloAudio').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?articuloAudio",
			file_post_name: "Filedata",
			file_size_limit : "4 MB",
			file_types : "*.mp3",
			file_types_description : "Audio mp3",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/


	/*-----------------------------------------UPLOAD DE STAFF----------------------------------------*/
	var listener_staf = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 100 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-staf');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load').remove();
			$('#nombre_archivo').after('<b id="load"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load').remove();
				$('#nombre_archivo').after('<b id="load">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-staf').bindAll(listener_staf);
	$('.swfupload-control-staf').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?staf",
			file_post_name: "Filedata",
			file_size_limit : "100 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/

	/*------------------------------------UPLOAD DE PAGINAS AMIGAS------------------------------------*/
	var listeners_webamiga = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 100 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-webamiga');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load').remove();
			$('#nombre_archivo').after('<b id="load"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load').remove();
				$('#nombre_archivo').after('<b id="load">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-webamiga').bindAll(listeners_webamiga);

	$('.swfupload-control-webamiga').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?webamiga",
			file_post_name: "Filedata",
			file_size_limit : "100 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*----------------------------------------------------------------------------------------------------*/

	/*------------------------------------CONFIGURACION UPLOAD DE IMAGEN DE PROGRAMACION------------------------------------*/
	var listeners_imagen_programa = {
		fileQueued: function(event, file){
			$('#nombre_archivo1').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 150 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-programaImagen');
			$('#nombre_archivo1').attr('value','');
			swfu.cancelUpload();
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo1').attr('value',serverData);
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load1').remove();
			$('#nombre_archivo1').after('<b id="load1"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				if( $('#nombre_archivo2').attr('value') == '' ){
					$('#load1').remove();
					$('#nombre_archivo1').after('<b id="load1">'+sus+'</b>');
					document.f1.submit();
				}else{
					$('#load1').remove();
					$('#nombre_archivo1').after('<b id="load1">'+sus+'</b>');
					$('.swfupload-control-programaSonido').swfupload('startUpload');
				}
			}
		}
	};

	$('.swfupload-control-programaImagen').bindAll(listeners_imagen_programa);
	
	$('.swfupload-control-programaImagen').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?programa_imagen",
			file_post_name: "Filedata",
			file_size_limit : "150 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*----------------------------------------------------------------------------------------------------*/

	/*------------------------------------UPLOAD DE SONIDO DE PROGRAMA------------------------------------*/
	var listeners_sonido_programa = {
		fileQueued: function(event, file){
			$('#nombre_archivo2').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 5 MB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-programaSonido');
			$('#nombre_archivo2').attr('value','');
			swfu.cancelUpload();
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo2').attr('value',serverData);
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo2').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load2').remove();
				$('#nombre_archivo2').after('<b id="load2">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-programaSonido').bindAll(listeners_sonido_programa);
	
	$('.swfupload-control-programaSonido').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?programa_sonido",
			file_post_name: "Filedata",
			file_size_limit : "5 MB",
			file_types : "*.mp3",
			file_types_description : "Sonido",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*----------------------------------------------------------------------------------------------------------*/

	/*------------------------------------UPLOAD DE ARCHIVO DE CONFIGURACION------------------------------------*/
	var listeners_config_PROGRAMACION = {
		fileQueued: function(event, file){
			$('#PROGRAMACION').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo '"+file.name+"' es demasiado pesado, el limite es 100 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-PROGRAMACION');
			$('#PROGRAMACION').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load1').remove();
			$('#PROGRAMACION').after('<b id="load1"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#PROGRAMACION').attr('value',serverData);
		},
		uploadComplete: function(event, file){
			if (us == true) {
				if( $('#ARCHIVO_INGRESO_SEMANA').attr('value') != '' ){
					$('#load1').remove();
					$('#PROGRAMACION').after('<b id="load1">'+sus+'</b>');
					$('.swfupload-control-ARCHIVO_INGRESO_SEMANA').swfupload('startUpload');
				}else{
					$('#load1').remove();
					$('#PROGRAMACION').after('<b id="load1">'+sus+'</b>');
					document.f1.submit();
				}
			}
		}
	};

	$('.swfupload-control-PROGRAMACION').bindAll(listeners_config_PROGRAMACION);
	$('.swfupload-control-PROGRAMACION').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?PROGRAMACION",
			file_post_name: "Filedata",
			file_size_limit : "100 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});


	var listeners_config_ARCHIVO_INGRESO_SEMANA = {
		fileQueued: function(event, file){
			$('#ARCHIVO_INGRESO_SEMANA').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo '"+file.name+"' es demasiado pesado, el limite es 4 MB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-ARCHIVO_INGRESO_SEMANA');
			$('#ARCHIVO_INGRESO_SEMANA').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#ARCHIVO_INGRESO_SEMANA').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#ARCHIVO_INGRESO_SEMANA').attr('value',serverData);
		},
		uploadComplete: function(event, file){
			if (us == true) {
				$('#load2').remove();
				$('#ARCHIVO_INGRESO_SEMANA').after('<b id="load2">'+sus+'</b>');
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-ARCHIVO_INGRESO_SEMANA').bindAll(listeners_config_ARCHIVO_INGRESO_SEMANA);
	$('.swfupload-control-ARCHIVO_INGRESO_SEMANA').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?ARCHIVO_INGRESO_SEMANA",
			file_post_name: "Filedata",
			file_size_limit : "4 MB",
			file_types : "*.mp3",
			file_types_description : "Sonido",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});

	/*------------------------------------------------------------------------------------------------------*/

	/*-------------------------------------UPLOAD GALERIA DE IMAGENES---------------------------------------*/

	var listeners_galeria = {
		swfuploadLoaded: function(event){ },
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
		uploadSuccess: function(event, file, serverData){

			regencoded = jQuery.parseJSON(serverData);
			
			newItemFoto = '<div id="foto_'+regencoded.data[0].id_foto+'" nom_foto="'+regencoded.data[0].foto+'" class="item_img"><div class="eliminar_imagen" title="'+regencoded.data[0].id_foto+'">X</div><div class="nombre"><img src="../aplication/utilities/tt.php?src=../aplication/webroot/imgs/galeria/'+regencoded.data[0].foto+'&w=80"></div></div>';
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

	$('.swfupload-control-galeria').bindAll(listeners_galeria);
	$('.swfupload-control-galeria').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?galeria&idgal="+$('#id_gal').attr('value'),
			file_size_limit : "400 KB",
			file_types : "*.jpg",
			file_types_description : "Imagenes",
			file_upload_limit : "0",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button', this)[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------------*/

	/*-------------------------------------UPLOAD DE TEMAS---------------------------------------*/
	var numfilesUpNot = 0;

	var listeners_noticias = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 5 MB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-temas');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-temas').bindAll(listeners_noticias);
	$('.swfupload-control-temas').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?temas",
			file_post_name: "Filedata",
			file_size_limit : "5 MB",
			file_types : "*.mp3",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/

	/*-------------------------------------BLOG USUARIO - UPLOAD DE IMAGEN-------------------------------------*/
	var listeners_blog = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 150 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-blog');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-blog').bindAll(listeners_blog);
	$('.swfupload-control-blog').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?foto_blog",
			file_post_name: "Filedata",
			file_size_limit : "150 KB",
			file_types : "*.jpg; *.swf",
			file_types_description : "Imagen o animación",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*----------------------------------------------------------------------------------------------------------*/

	/*-------------------------------------UPLOAD DE ARTICULOS---------------------------------------*/
	var numfilesUpNot = 0;

	var listeners_articulos = {
		fileQueued: function(event, file){
			$('#nombre_archivo').attr('value',file.name);
		},
		fileQueueError: function(event, file, errorCode, message){
			try {
				switch (errorCode) {
					case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
						alert("Solo se permite un archivo."); exit;
					case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
						alert("El archivo es demasiado pesado, el limite es 150 KB."); exit;
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
			var swfu = $.swfupload.getInstance('.swfupload-control-articulos');
			$('#nombre_archivo').attr('value','');
			swfu.cancelUpload();
		},
		uploadProgress: function(event, file, bytesLoaded){
			porciento = parseInt((bytesLoaded * 100 ) / file.size);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2"><img src="'+gif+'"> Subiendo... '+ porciento +'%</b>');
		},
		uploadSuccess: function(event, file, serverData){
			if (serverData === "") { us = false; }else{ us = true; }
			$('#nombre_archivo').attr('value',serverData);
			$('#load2').remove();
			$('#nombre_archivo').after('<b id="load2">'+sus+'</b>');
		},
		uploadComplete: function(event, file){
			if (us == true) {
				document.f1.submit();
			}
		}
	};

	$('.swfupload-control-articulos').bindAll(listeners_articulos);
	$('.swfupload-control-articulos').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?articulos",
			file_post_name: "Filedata",
			file_size_limit : "150 KB",
			file_types : "*.jpg",
			file_types_description : "Imagen",
			file_upload_limit : "0",
			file_queue_limit : "1",
			flash_url : "../aplication/webroot/js/swfupload/swfupload.swf",
			button_image_url : '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png',
			button_width : 61,
			button_height : 22,
			button_placeholder : $('#upload_button')[0],
			debug: false
		});
	});
	/*------------------------------------------------------------------------------------------------*/


});