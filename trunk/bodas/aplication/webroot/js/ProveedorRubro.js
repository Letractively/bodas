// JavaScript Document
	$(document).ready(function(){

		$('#frmProveedorRubrosNuevo').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				txtNombre: 'required'
			},
			messages:{
				txtNombre: 'Ingresa un nombre.'
			}
		});

		$('#ProveedorRubros_guardar_nuevo').click(function(){
			$('#frmProveedorRubrosNuevo').attr('action','?opcion=add_new');
			$('#frmProveedorRubrosNuevo').submit();
		});

		$('#ProveedorRubros_guardar_listar').click(function(){
			$('#frmProveedorRubrosNuevo').attr('action','?opcion=add_list');
			$('#frmProveedorRubrosNuevo').submit();
		});

		$('#frmProveedorRubrosEdita').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				txtNombre: 'required'
			},
			messages:{
				txtNombre: 'Ingresa un nombre.'
			}
		});

		$('#ProveedorRubros_editar_listar').click(function(){
			$('#frmProveedorRubrosEdita').attr('action','?opcion=actualizar&id=' + $('#id_proveedor_rubro').attr('value') );
			$('#frmProveedorRubrosEdita').submit();
		});

	});