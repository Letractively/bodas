// JavaScript Document
$(document).ready(function(){


	$('#frmNoticiaNuevo').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			titulo: 'required',
			fleLogo: { required:true, accept:'jpg|gif' },
			des_1: 'required'
		},
		messages:{
			titulo: 'Ingresa un titulo.',
			fleLogo: { required:'Seleccione un archivo', accept:'solo se acepta archivos .jpg y .gif' },
			des_1: 'Ingrese una descripcion'
		}
	});


	$('#noticia_guardar_nuevo').click(function(){
		$('#frmNoticiaNuevo').attr('action','?opcion=add_new');
		$('#frmNoticiaNuevo').submit();
	});


	$('#noticia_guardar_listar').click(function(){
		$('#frmNoticiaNuevo').attr('action','?opcion=add_list');
		$('#frmNoticiaNuevo').submit();
	});


	$('#frmNoticiaEdita').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			titulo: 'required',
			fleLogo: { accept:'jpg|gif' },
			des_1: 'required'
		},
		messages:{
			titulo: 'Ingresa un titulo.',
			fleLogo: { accept:'solo se acepta archivos .jpg y .gif' },
			des_1: 'Ingrese una descripcion'
		}
	});


	$('#noticia_editar_listar').click(function(){
		$('#frmNoticiaEdita').attr('action','?opcion=actualizar&id=' + $('#id_noticia').attr('value') );
		$('#frmNoticiaEdita').submit();
	});

});