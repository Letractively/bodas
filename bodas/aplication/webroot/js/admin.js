$(document).ready(function(){

	if($('.dp').length > 0){ $('.dp').datepicker({dateFormat:'yy-mm-dd'}); }
	if($('.tp').length > 0){ $('.tp').timepicker({tepMinute: 10, ampm: true }); }
	if($('.dtp').length > 0){ $('.dtp').datetimepicker({dateFormat:'yy-mm-dd'}); }
	if($('.dtp2').length > 0){ $('.dtp2').datetimepicker({dateFormat:'yy-mm-dd ', timeFormat: 'hh:mm:ss',}); }
 
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

	if($('.reporte').length){ $('.reporte').dataTable({"sPaginationType": "full_numbers", "iDisplayLength": 25}); }
	if($('.reporte2').length){ 
		$('.reporte2').dataTable({
			"sPaginationType": "full_numbers",
			"aaSorting": [[ 0, "desc" ]],
			"iDisplayLength": 25
		}); 
	}

	if($('.reporte3').length){ 
		$('.reporte3').dataTable({
			"sPaginationType": "full_numbers",
			"aaSorting": [[ 0, "desc" ]],
			"iDisplayLength": 25,
			"sDom": 'T<"clear">lfrtip',
			"oTableTools": {
				"sSwfPath": "../aplication/webroot/js/tabletools/swf/copy_cvs_xls_pdf.swf"
			}
		}); 
	}

	$('.coment').tooltip({
		track: true,
		delay: 0,
		showURL: false,
		showBody: " - ",
		fade: 250
	});

	if($('#des_1').length){
		CKEDITOR.replace('des_1',
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

	$('.delete, .eliminar').live("click", function(){
		if($(this).attr('class') == "delete" || $(this).attr('class') == "eliminar"){
			if(!confirm("Esta completamente seguro?, recuerde que puede cambiar de estado el registro.")){
				return false;
			}else{
				location.replace( $(this).attr('name') + '?id=' + $(this).attr('id') + '&opcion=' + $(this).attr('class') );		
			}		
		}
	});

});