// JavaScript Document
$(document).ready(function(){


	$('#frmEdita').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtTitulo: 'required',
			fleLogo: { accept:'jpg|gif' },
			txtLink: 'required',
			txtDescripcion: 'required'
		},
		messages:{
			txtTitulo: 'Ingrese el titulo',
			fleLogo: { accept:'solo se acepta archivos .jpg y .gif' },
			txtLink: 'Ingrese el link del tema',
			txtDescripcion: 'Ingrese una descripcion corta.'
		}
	});


	$('#editar_lista').click(function(){
		$('#frmEdita').attr('action','?opcion=actualizar&id=' + $('#id_variado').attr('value') );
		$('#frmEdita').submit();
	});

	$('#editar_regresar').click(function(){
		$('#frmEdita').attr('action','?opcion=editar_regresar&id=' + $('#id_variado').attr('value') );
		$('#frmEdita').submit();
	});


});