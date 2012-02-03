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

		$("#sleRubrosArticulos1").change(function(){
			$.post('ajax.php',{
					ver_articulos: 1,
					id_articulo_tipo: $(this).val()
				},
				function (response) {
					$('#noticia1').html('');
					var record = response.data;
					var x = 0;
					for(x = 0 ; x < record.length ; x++){
						$('#noticia1').append('<option value="'+record[x].id+'">'+record[x].titulo+'</option>');
					}

				}, 'json'
			);
		});

		$("#sleRubrosArticulos2").change(function(){
			$.post('ajax.php',{
					ver_articulos: 1,
					id_articulo_tipo: $(this).val()
				},
				function (response) {
					$('#noticia2').html('');
					var record = response.data;
					var x = 0;
					for(x = 0 ; x < record.length ; x++){
						$('#noticia2').append('<option value="'+record[x].id+'">'+record[x].titulo+'</option>');
					}

				}, 'json'
			);
		});

	});