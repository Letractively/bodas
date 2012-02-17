// JavaScript Document
$(document).ready(function(){

	if($('#txtDescripcion1').length){
		CKEDITOR.replace('txtDescripcion1',
			{
			skin:'kama',
			uiColor:'#e6edf3',
			toolbar:[
				['Undo','Redo','-','Find','Replace','-','SelectAll'],
				['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
				['Table','NumberedList','BulletedList'],
				['Styles','Format','Font','FontSize','-','TextColor'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Link','Unlink','Anchor']
			]
		});
	}
	
	if($('#txtDescripcion2').length){
		CKEDITOR.replace('txtDescripcion2',
			{
			skin:'kama',
			uiColor:'#e6edf3',
			toolbar:[
				['Undo','Redo','-','Find','Replace','-','SelectAll'],
				['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
				['Table','NumberedList','BulletedList'],
				['Styles','Format','Font','FontSize','-','TextColor'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Link','Unlink','Anchor']
			]
		});
	}
	
	if($('#txtDescripcion3').length){
		CKEDITOR.replace('txtDescripcion3',
			{
			skin:'kama',
			uiColor:'#e6edf3',
			toolbar:[
				['Undo','Redo','-','Find','Replace','-','SelectAll'],
				['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
				['Table','NumberedList','BulletedList'],
				['Styles','Format','Font','FontSize','-','TextColor'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Link','Unlink','Anchor']
			]
		});
	}
	if($('#txtDescripcion4').length){
		CKEDITOR.replace('txtDescripcion4',
			{
			skin:'kama',
			uiColor:'#e6edf3',
			toolbar:[
				['Undo','Redo','-','Find','Replace','-','SelectAll'],
				['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
				['Table','NumberedList','BulletedList'],
				['Styles','Format','Font','FontSize','-','TextColor'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Link','Unlink','Anchor']
			]
		});
	}
	if($('#txtDescripcion5').length){
		CKEDITOR.replace('txtDescripcion5',
			{
			skin:'kama',
			uiColor:'#e6edf3',
			toolbar:[
				['Undo','Redo','-','Find','Replace','-','SelectAll'],
				['Source','-','Bold','Italic','Underline','-','Find','SelectAll','-'],
				['Table','NumberedList','BulletedList'],
				['Styles','Format','Font','FontSize','-','TextColor'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Link','Unlink','Anchor']
			]
		});
	}

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
		$('#frmEdita').attr('action','?opcion=actualizar&id=' + $('#id_evento').attr('value') );
		$('#frmEdita').submit();
	});

	$('#editar_regresar').click(function(){
		$('#frmEdita').attr('action','?opcion=editar_regresar&id=' + $('#id_evento').attr('value') );
		$('#frmEdita').submit();
	});


});