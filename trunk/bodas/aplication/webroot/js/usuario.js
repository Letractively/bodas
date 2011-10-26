// JavaScript Document
	$(document).ready(function(){

		$('#frmUsuario').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				txtNombre: 'required',
				txtApellido: 'required',
				txtCorreo: { required: true, email: true },
				txtUsuario: 'required',
				txtPassword1: 'required',
				txtPassword2: { required: true, equalTo: "#txtPassword1" }
			},
			messages:{
				txtNombre: 'Ingresa un nombre.',
				txtApellido: 'Ingresa un apellido.',
				txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido' },
				txtUsuario: 'Ingresa un nombre de usuario',
				txtPassword1: 'Ingrese una contraseña',
				txtPassword2: { required: 'Escriba de nuevo la contraseña', equalTo: "La contraseña no coincide" }
			}
		});

	});