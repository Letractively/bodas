// JavaScript Document
	$(document).ready(function(){


		$('#frmUsuarioNuevo').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				txtNombre: 'required',
				txtApellido: 'required',
				txtCorreo: { 
					required: true, 
					email: true,
					remote: {
						url: "usuario_validacion.php",
						type: "post",
						data: { verificar_email_repetido: "1" }
					}
				},
				txtUsuario: { 
					required: true, 
					remote: {
						url: "usuario_validacion.php",
						type: "post",
						data: { verificar_usuario_repetido: "1" }
					}
				},
				txtPassword1: 'required',
				txtPassword2: { required: true, equalTo: "#txtPassword1" }
			},
			messages:{
				txtNombre: 'Ingresa un nombre.',
				txtApellido: 'Ingresa un apellido.',
				txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
				txtUsuario: { required: 'Ingresa un nombre de usuario', remote:'Nombre de usuario en uso' },
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
				txtApellido: 'required',
				txtCorreo: { 
					required: true, 
					email: true,
					remote: {
						url: "usuario_validacion.php",
						type: "post",
						data: { verificar_email_repetido: "2", correo_actual: $('#txtCorreo2').attr('value') }
					}
				},
				txtUsuario: {
					required: true,
					remote: {
						url: "usuario_validacion.php",
						type: "post",
						data: { verificar_usuario_repetido: "2", usuario_actual: $('#txtUsuario2').attr('value') }
					}
				},
				txtPassword2: { equalTo: "#txtPassword1" }
			},
			messages:{
				txtNombre: 'Ingresa un nombre.',
				txtApellido: 'Ingresa un apellido.',
				txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
				txtUsuario: { required: 'Ingresa un nombre de usuario', remote:'Nombre de usuario en uso' },
				txtPassword2: { equalTo: "La contraseña no coincide" }
			}
		});


		$('#usuario_editar_listar').click(function(){
			$('#frmUsuarioEditar').attr('action','?opcion=update&id=' + $('#id_usuario').attr('value') );
			$('#frmUsuarioEditar').submit();
		});


	});