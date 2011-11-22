// JavaScript Document
$(document).ready(function(){


	$('#frmUsuarioNuevo').validate({
		errorElement: 'label',
		errorClass: 'error',
		rules:{
			txtNombre: 'required',
			fleLogo: { required:true, accept:'jpg' },
			txtCorreo: { 
				required: true, 
				email: true,
				remote: {
					url: "usuario_cliente_validacion.php",
					type: "post",
					data: { verificar_email_repetido: "1" }
				}
			},
			txtPassword1: 'required',
			txtPassword2: { required: true, equalTo: "#txtPassword1" }
		},
		messages:{
			txtNombre: 'Ingresa un nombre.',
			fleLogo: { required:'Seleccione un archivo', accept:'solo se acepta archivos .jpg' },
			txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
			txtPassword1: 'Ingrese una contraseña',
			txtPassword2: { required: 'Escriba de nuevo la contraseña', equalTo: "La contraseña no coincide" }
		}
	});


	$('#usuario_guardar_nuevo').click(function(){
		$('#frmUsuarioNuevo').attr('action','?opcion=add_new');
		$('#frmUsuarioNuevo').submit();
	});


	$('#usuario_guardar_listar').click(function(){
		$('#frmUsuarioNuevo').attr('action','?opcion=add_list');
		$('#frmUsuarioNuevo').submit();
	});


	$('#frmUsuarioEditar').validate({
		errorElement: 'label',
		errorClass: 'error',
		rules:{
			txtNombre: 'required',
			fleLogo: { accept:'jpg' },
			txtCorreo: { 
				required: true, 
				email: true,
				remote: {
					url: "usuario_cliente_validacion.php",
					type: "post",
					data: { verificar_email_repetido: "2", correo_actual: $('#txtCorreo2').attr('value') }
				}
			},
			txtPassword2: { equalTo: "#txtPassword1" }
		},
		messages:{
			txtNombre: 'Ingresa un nombre.',
			fleLogo: { accept:'solo se acepta archivos de tipo jpg.' },
			txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
			txtPassword2: { equalTo: "La contraseña no coincide" }
		}
	});


	$('#usuario_editar_listar').click(function(){
		$('#frmUsuarioEditar').attr('action','?opcion=actualizar&id=' + $('#id_usuario').attr('value') );
		$('#frmUsuarioEditar').submit();
	});

	$(".rdoAdmin").click(function () {
		if($(this).val() == 1){
			$(".panel_admin_proveedor").show('fast');
		}else{
			$(".panel_admin_proveedor").hide('fast');
		}
	});
	$(".panel_admin_proveedor").hide('fast');

});