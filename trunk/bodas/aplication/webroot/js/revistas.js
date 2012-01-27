// JavaScript Document
$(document).ready(function(){


	$('#frmNuevo').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtCodigo: 'required',
			txtTitulo: 'required',
			fleLogo: { required:true, accept:'jpg|gif' }
		},
		messages:{
			txtCodigo: 'Ingrese el link del articulo',
			txtTitulo: 'Ingrese el titulo del articulo',
			fleLogo: { required:'Seleccione un archivo', accept:'solo se acepta archivos .jpg y .gif' },
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
			txtCodigo: 'required',
			txtTitulo: 'required',
			fleLogo: { accept:'jpg|gif' }
		},
		messages:{
			txtCodigo: 'Ingrese el link del articulo',
			txtTitulo: 'Ingrese el titulo del articulo',
			fleLogo: { accept:'solo se acepta archivos .jpg y .gif' }
		}
	});


	$('#editar_lista').click(function(){
		$('#frmEdita').attr('action','?opcion=actualizar&id=' + $('#id_revista').attr('value') );
		$('#frmEdita').submit();
	});
});