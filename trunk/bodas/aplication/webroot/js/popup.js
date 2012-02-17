// JavaScript Document

$(document).ready(function(){

	$('#frmEdita').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			fleLogo: { accept:'jpg|gif' }
		},
		messages:{
			fleLogo: { accept:'solo se acepta archivos .jpg y .gif' }
		}
	});

	$('#editar_lista').click(function(){
		$('#frmEdita').attr('action','?opcion=actualizar&id=' + $('#id_popup').attr('value') );
		$('#frmEdita').submit();
	});

	$('#editar_regresar').click(function(){
		$('#frmEdita').attr('action','?opcion=editar_regresar&id=' + $('#id_popup').attr('value') );
		$('#frmEdita').submit();
	});

});