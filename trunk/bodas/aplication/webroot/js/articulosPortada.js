// JavaScript Document
$(document).ready(function(){
	
	$('#selArticuloTipo').change(function(){
		var val = $('#selArticuloTipo').val();
		
			$.post('ajax.php',{
					obtener_articulos: 1,
					id_articulo_tipo: val
				},
				function (response) {
					var record = response.data;

					$('#selArticulo').html('');

					for(x = 0 ; x < record.length ; x++){
						$('#selArticulo').append('<option value="'+record[x].id+'">'+record[x].titulo+'</option>');
					}
				}, 'json'
			);		
		
	});	
	
});