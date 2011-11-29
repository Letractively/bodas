// JavaScript Document

$(document).ready(function() {
	
	if($('#base').length > 0){
		var base = $('#base').val();
	}
	
	if($('#galleria').length > 0){
		Galleria.loadTheme('http://local.bodas.com/aplication/webroot/js/galleria/galleria.classic.min.js');
		$('#galleria').galleria({
			width:504,
			height:356	
		});
	}

	if($('.dp').length > 0){ 
		$('.dp').datepicker({dateFormat:'yy-mm-dd',changeMonth: true,changeYear: true, yearRange: '1970:2011', }); 
	}
	
	if($('#frmRegistrese').length > 0){ 
		$('#frmRegistrese').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				fleLogo: { required:true, accept:'jpg' },
				txtNombre: 'required',
				txtApellido: 'required',
				txtCorreo: { 
					required: true, 
					email: true,
					remote: {
						url: base+"usuario_cliente_validacion.php",
						type: "post",
						data: { verificar_email_repetido: "1" }
					}
				},
				txtTelefono: 'required',
				txtPassword1: 'required',
				txtPassword2: { required: true, equalTo: "#txtPassword1" },
				txtFechaCumple: 'required',
				txtNombrePareja: 'required',
				txtFechaBoda: 'required',
				txtPais: 'required',
				txtProvincia: 'required',
				txtDistrito: 'required',
				chkCondiciones: 'required',
				
			},
			messages:{
				fleLogo: { required:'Seleccione un archivo', accept:'solo se acepta archivos .jpg' },
				txtNombre: 'Ingresa su nombre.',
				txtApellido: 'Ingresa su apellido.',
				txtCorreo: { required: 'Ingrese un correo' , email: 'Correo invalido', remote:'Correo en uso' },
				txtTelefono: 'Ingresa su telefono.',
				txtPassword1: 'Ingrese una contraseña',
				txtPassword2: { required: 'Escriba de nuevo la contraseña', equalTo: "La contraseña no coincide" },
				txtFechaCumple: 'Ingrese la fecha de su cumpleaños',
				txtNombrePareja: 'Ingrese el nombre de su pareja',
				txtFechaBoda: 'Ingrese la fecha de su boda',
				txtPais: 'Ingrese su Pais',
				txtProvincia: 'Ingrese su provincia / estado',
				txtDistrito: 'Ingrese su distrito',
				chkCondiciones: 'Debe aceptar las condiciones',
			}
		});
	}


	/*	Acceso	*/
	if($('.contenedor-login').length > 0){ 
		if($('#frmAcceso').length > 0){ 
			$('#frmAcceso').validate({
				errorElement: 'label',
				errorClass: 'error',
				rules:{
					txtUsuario: { required: true, email: true },
					txtPassword: 'required'
				},
				messages:{
					txtUsuario: { required: '' , email: '' },
					txtPassword: ''
				}
			});
		}

		$('#des_login').click(function() {
			$('.contenedor-login').toggle('fast');
		});
	}

	/*	Recuperar clave	*/
	if($('#frmRecuperarClave').length > 0){ 
		$('#frmRecuperarClave').validate({
			errorElement: 'label',
			errorClass: 'error',
			rules:{
				txtEmailRecuperar: { required: true, email: true },
			},
			messages:{
				txtEmailRecuperar: { required: 'Ingrese un correo' , email: 'Correo invalido' },
			}
		});
	}

});