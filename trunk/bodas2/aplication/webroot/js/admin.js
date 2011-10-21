// Javascript control de administrador.

	$(document).ready(function(){
	
		if($('.dp').length > 0){ $('.dp').datepicker({dateFormat:'yy-mm-dd'}); }
		if($('.tp').length > 0){ $('.tp').timepicker({tepMinute: 10, ampm: true }); }
		if($('.dtp').length > 0){ $('.dtp').datetimepicker({dateFormat:'yy-mm-dd'}); }
	
		if($("#inicio, #termino").length > 0){ 
			var dates = $("#inicio, #termino").datetimepicker({
				minDate: 0,
				dateFormat:'yy-mm-dd',
				onSelect: function( selectedDate ) {
					var option = this.id == "inicio" ? "minDate" : "maxDate",
						instance = $( this ).data( "datepicker" ),
						date = $.datepicker.parseDate(
							instance.settings.dateFormat ||
							$.datepicker._defaults.dateFormat,
							selectedDate, instance.settings );
					dates.not( this ).datepicker( "option", option, date );
				}
			});
		}

		if($('.reporte').length){ $('.reporte').dataTable({"sPaginationType": "full_numbers"}); }
		if($('.reporte2').length){ 
			$('.reporte2').dataTable({
				"sPaginationType": "full_numbers",
				"aaSorting": [[ 0, "desc" ]]
			}); 
		}
	
		$('.coment').tooltip({
			track: true,
			delay: 0,
			showURL: false,
			showBody: " - ",
			fade: 250
		});
	
		if($('#des_2').length){
			CKEDITOR.replace('des_2',
				{
				skin:'kama',
				uiColor:'#e6edf3',
				toolbar:[
					['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print','SpellChecker','Scayt'],
					['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
					['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
					['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['Styles','Format','Font','FontSize','-','TextColor','BGColor'],
					['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
					['Link','Unlink','Anchor']
				]
			});
		}
	
		if($('#des_3').length){
			CKEDITOR.replace('des_3',
				{
				skin:'kama',
				uiColor:'#e6edf3',
				toolbar:[
					['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print','SpellChecker','Scayt'],
					['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
					['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
					['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['Styles','Format','Font','FontSize','-','TextColor','BGColor'],
					['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
					['Link','Unlink','Anchor']
				]
			});
		}
	
	});

	function validar_usuarios(opcion, id){
		if(document.f1.nombre.value==""){
			alert(" ERROR: Por favor ingrese el nombre ");
			document.f1.nombre.focus();
			return false
		}else if(document.f1.apellidos.value==""){
			alert(" ERROR: Por favor ingrese el apellido ");
			document.f1.apellidos.focus();
			return false	
		}else if(document.f1.email.value==""){
			alert(" ERROR: Por favor ingrese el email ");
			document.f1.email.focus();
			return false	
		}else if(document.f1.rol.value==""){
			alert(" ERROR: Por favor Seleccione un rol ");
			document.f1.rol.focus();
			return false	
		}else if(document.f1.usuario.value==""){
			alert(" ERROR: Por favor ingrese un admin \n que le servira para logearse en el sistema ");
			document.f1.usuario.focus();
			return false	
		}else if(document.f1.password.value==""){
			alert(" ERROR: Por favor ingrese el password \n que le servira para ingresar al sistema ");
			document.f1.password.focus();	
			return false;				
		}else{
			document.f1.action='usuarios.php?opcion='+opcion+'&id='+id;
			document.f1.submit();
		}
	}
	
	function mantenimiento(url,id,opcion){
		if(opcion!="delete"){ 
			location.replace(url+'?id='+id+'&opcion='+opcion);
		}else if(opcion=="delete"){
			if(!confirm("Esta Seguro que desea Eliminar el Registro")){
				return false;	
			}else{
				location.replace(url+'?id='+id+'&opcion='+opcion);			
			}		
		}
	}	