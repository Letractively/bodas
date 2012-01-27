$(document).ready(function(){

	$('#frmProveedorRedNuevo').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtLink: 'required'
		},
		messages:{
			txtLink: 'Ingresa el vinculo de la red'
		}
	});

	$('#ProveedorRed_guardar_nuevo').click(function(){
		$('#frmProveedorRedNuevo').attr('action','?opcion=add_new');
		$('#frmProveedorRedNuevo').submit();
	});


	$('#ProveedorRed_guardar_listar').click(function(){
		$('#frmProveedorRedNuevo').attr('action','?opcion=add_list');
		$('#frmProveedorRedNuevo').submit();
	});


	$('#frmProveedorRedEdita').validate({
		errorElement: 'label', errorClass: 'error',
		rules:{
			txtLink: 'required'
		},
		messages:{
			txtLink: 'Ingresa el vinculo de la red'
		}
	});


	$('#ProveedorRed_editar_listar').click(function(){
		$('#frmProveedorRedEdita').attr('action','?opcion=actualizar&id=' + $('#id_proveedor_red_social').attr('value') );
		$('#frmProveedorRedEdita').submit();
	});

});