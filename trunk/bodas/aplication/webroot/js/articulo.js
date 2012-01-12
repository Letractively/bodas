// JavaScript Document
$(document).ready(function(){


	$('#frmNuevo').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtTitulo: 'required',
			txtFecha: 'required',
			txtDescripcionCorta: 'required'
		},
		messages:{
			txtTitulo: 'Ingrese el titulo del articulo',
			txtFecha: 'Ingrese la fecha del articulo',
			txtDescripcionCorta: 'Ingrese una descripcion corta.'
		}
	});


	$('#guardar_nuevo').click(function(){
		$('#frmNuevo').attr('action','?opcion=add_new');
		$('#frmNuevo').submit();
	});


	$('#guardar_listar').click(function(){
		$('#frmNuevo').attr('action','?opcion=add_list');
		$('#frmNuevo').submit();
	});


	$('#frmEdita').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtTitulo: 'required',
			txtFecha: 'required',
			txtDescripcionCorta: 'required'
		},
		messages:{
			txtTitulo: 'Ingrese el titulo del articulo',
			txtFecha: 'Ingrese la fecha del articulo',
			txtDescripcionCorta: 'Ingrese una descripcion corta.'
		}
	});


	$('#editar_lista').click(function(){
		$('#frmEdita').attr('action','?opcion=actualizar&id=' + $('#id_articulo').attr('value') );
		$('#frmEdita').submit();
	});


	var peso_proveedor = '500 KB';
	var trig = false;
	var gif = '../aplication/webroot/js/swfupload/ajax-loader.gif';
	var sus = 'Archivo guardado!, espere...';
	var flash_url = '../aplication/webroot/js/swfupload/swfupload.swf';
	var button_image_url = '../aplication/webroot/js/swfupload/XPButtonUploadText_61x22.png';


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
						alert("El archivo '"+file.name+"' es demasiado pesado, el limite es 500 KB."); exit;
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
			newItemFoto = '<div id="foto_'+regencoded.data[0].id_articulo_imagen+'" nom_foto="'+regencoded.data[0].imagen+'" class="item_img"><div class="eliminar_imagen" title="'+regencoded.data[0].id_articulo_imagen+'">X</div><div class="nombre"><img src="../aplication/utilities/tt.php?src=../aplication/webroot/imgs/articulos_fotos/'+regencoded.data[0].imagen+'&w=80"></div></div>';
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


	$('.swfupload-articulo-imagenes').bindAll(listeners_proveedor_imagenes);
	$('.swfupload-articulo-imagenes').each(function(){
		$(this).swfupload({
			upload_url: "upload.php?articulos_fotos&id_articulo="+$('#id_articulo').attr('value'),
			file_size_limit : "500 KB",
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
			$(this).html('<img src="../aplication/webroot/js/swfupload/ajax-loader.gif">');
			$.post('delete_imagen.php', 
				{
					opcion: 'foto_articulo',
					id: id_foto,
					nom_foto: nom_foto
				},
				function(response){
					$('#foto_'+id_foto).remove();
				}
			);
		});
	}


});