<?php
class Acceso{

	function AccesoValida($_POST){

		$noaceptados = array('select', '*', 'delete', 'update', 'insert', 'from', 'where', 'like', 'and', ' ', 'mysqldump', 'echo', 'print', 'printf');
		$usuario = str_replace($noaceptados, '', $_POST['txtUsuario']);
		$password = str_replace($noaceptados, '', $_POST['txtPassword']);

		$sql = "SELECT a.id_usuario, CONCAT(a.nombre_usuario,' ',a.apellidos_usuario )AS user, r.nombre_rol, a.lectura_usuario AS lectura, a.escritura_usuario AS escritura
						FROM usuarios a, rol r 
						WHERE a.id_rol = r.id_rol AND 
						 a.login_usuario = '".mysql_real_escape_string($usuario)."' AND 
						 a.password_usuario = '".mysql_real_escape_string($password)."' ";

		$query = mysql_query($sql) or die(mysql_error());

		$nums = mysql_num_rows($query);
		if($nums == 0){
			$sesion = $nums;
		}else{
			while($row = mysql_fetch_array($query)){
				$sesion[] = array(
					'id' => $row['id_usuario'],
					'user' => $row['user'],
					'rol' => $row['nombre_rol'],
					'lectura' => $row['lectura'],
					'escritura' => $row['escritura']
				);
			}
		}
		
		return $sesion;
	}


	function AccesoRecuperar(){
		
		$sql = "SELECT a.login_usuario, password_usuario, CONCAT(a.nombre_usuario, ' ', a.apellidos_usuario )AS user, r.nombre_rol FROM usuarios a, rol r WHERE a.id_rol = r.id_rol AND a.email_usuario = '".$_POST['txtEmail']."'";

		$query = mysql_query($sql) or die(mysql_error());
		$nums = mysql_num_rows($query);

		if($nums == 0){
			$sesion = $nums;
		}else{
			while($row = mysql_fetch_array($query)){
				$sesion[] = array( 'usuario' => $row['login_usuario'],
								'password' => $row['password_usuario'],
							  		'user' => $row['user'],
							   		 'rol' => $row['nombre_rol']);
			}

			$email = $_POST['txtEmail'];
			$titulo = "Recuperacion de contraseña";
			$msg = " Estimado(a) ".$sesion[0]['rol']." ".$sesion[0]['user']." 

			Estimado usuario, a su solicitud a continuación se detalla la información de su cuenta:

			Usuario  :".$sesion[0]['usuario']."
			Password : ".$sesion[0]['password']."

			Atentamente 
			Soporte del Sistema

			";

			$from = "from: raulmace@hotmail.com";
			if(!mail($email, titulo, $mensaje, $from)){
				echo "Error al enviar correo electronico.";
			}else{
				$sesion = $nums;
			}
		}
		return $sesion;
	}


	function AccesoSecciones($id_usuario){
		$query=mysql_query("SELECT id_modulo, nombre_modulo FROM modulo ");
		$nums=mysql_num_rows($query) or die(mysql_error());		
		if($nums==0){
			return 0;
		}else{
			while($row=mysql_fetch_array($query)){				
				$queryPS=mysql_query("SELECT * FROM  usuarios_paginas ap, paginas sp 
					WHERE ap.id_pagina=sp.id_pagina AND 
						ap.id_usuario='".$id_usuario."' AND
						sp.id_modulo='".$row['id_modulo']."'");
				$numsPS=mysql_num_rows($queryPS);
				if($numsPS!=0){
					$modulo[]=array('id_modulo'=>$row['id_modulo'],
									'modulo'=>$row['nombre_modulo']);
				}
				
			}
			return $modulo;
		}
	}
	
	function AccesoPaginasSecciones($id_modulo="", $id_usuario){
		$query=mysql_query("SELECT sp.nombre_pagina, sp.url_pagina 
							FROM  usuarios_paginas ap, usuarios a, paginas sp 
							WHERE a.id_usuario=ap.id_usuario AND 
							ap.id_pagina=sp.id_pagina AND 
							ap.id_usuario='$id_usuario' AND
							sp.id_modulo='$id_modulo'							
							ORDER BY sp.id_pagina ");
		$nums=mysql_num_rows($query) or die(mysql_error());		
		if($nums==0){
			return 0;
		}else{
			while($row=mysql_fetch_array($query)){
				$paginas[]=array('pagina'=>$row['nombre_pagina'],
									 'url'=>$row['url_pagina']);
			}
			return $paginas;
		}
	}
}

?>