<?php
class Usuarios{


	public function UsuariosCabezera(){ 
		?>
            <div class="tit_pagina">Listado de usuarios.</div>
            <div class="cont_items_menu">
                <ul>
                    <li><a href="usuarios.php?opcion=list">Listar</a></li>
                    <li><a href="usuarios.php?opcion=new">Nuevo</a></li>
                </ul>
            </div>
		<?php		
	}


	public function UsuariosList(){
		$sql = "SELECT 
					a.id_usuario, 
					CONCAT(a.nombre_usuario,' ',a.apellidos_usuario) AS Usuario, 
					a.email_usuario AS Email, 
					r.nombre_rol AS Rol
				FROM usuarios a, rol r 
				WHERE a.id_rol = r.id_rol ";
		$qry = new Consulta($sql);		
		$num = $qry->NumeroRegistros();
		?>
		<table class='reporte display' cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Rol</th>
                    <th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while ($row = mysql_fetch_array($qry->Consulta_ID)) {
					?>
					<tr>
						<td><?php echo $row[1]?></td>
                        <td><?php echo $row[2]?></td>
                        <td><?php echo $row[3]?></td>
						<td>
                        	<a title="Editar" href="usuarios.php?opcion=edit&id=<?php echo $row[0]?>"> <img src="<?php echo _icn_ ?>x_edit.png"></a>
                            <a title="Eliminar" class="delete" id="<?php echo $row[0]?>" name="usuarios.php"><img src="<?php echo _icn_ ?>x_delete.png"></a>
                        	<a title="Permisos" href="modulo_usuario.php?id=<?php echo $row[0]?>"><img src="<?php echo _icn_ ?>x-detail.png"></a>
						<?php
					echo "</td></tr>";
				}
			?>
			</tbody>
		</table>
		<?php
	}


	public function UsuariosNew(){
		$qryRol = new Consulta(" SELECT * FROM rol ");
		?>
        <form id="frmUsuarioNuevo" name="frmUsuarioNuevo" action="" method="post">

            <h2>Nuevo usuario</h2>

            <div class="itm"><label>Nombre(s): </label><input type="text" id="txtNombre" name="txtNombre" /></div>
            <div class="itm"><label>Apellido(s): </label><input type="text" id="txtApellido" name="txtApellido" /></div>
            <div class="itm"><label>Correo: </label><input type="text" id="txtCorreo" name="txtCorreo" /></div>
            <div class="itm">
                <label>Nivel: </label>
                <select id="sleRol" name="sleRol">
                    <?php while( $rw = $qryRol->VerRegistro() ){ ?>
                        <option value="<?php echo $rw[0] ?>"> <?php echo $rw[1] ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="itm"><label>Usuario: </label><input type="text" id="txtUsuario" name="txtUsuario" /></div>
            <div class="itm"><label>Contraseña: </label><input type="password" id="txtPassword1" name="txtPassword1" /></div>
            <div class="itm"><label>Ingrese de nuevo la contraseña: </label><input type="password" id="txtPassword2" name="txtPassword2" /></div>

            <div class="itm">
                <input type="submit" id="usuario_guardar_nuevo" value="Guardar y crear nuevo" />
                <input type="submit" id="usuario_guardar_listar" value="Guardar y listar" />
              <input type="reset" name="reset" value="Limpiar">
            </div>
            <div class="itm"><a href="usuarios.php">Regresar</a></div>
        </form>
		<?php		
	}


	public function UsuariosAdd(){
		$sql = "INSERT INTO usuarios VALUES('',
			'".$_POST['sleRol']."',
			'".$_POST['txtNombre']."' ,
			'".$_POST['txtApellido']."',
			'".$_POST['txtCorreo']."',
			'".$_POST['txtUsuario']."',
			'".$_POST['txtPassword1']."',
			'".date('Y-m-d')."',
			'1',
			'1'
		)";
		$Query= new Consulta($sql);
		?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro insertado correctamente.</div><?php
	}


	public function UsuariosEdit($id){ 

		$objUsuario = new Usuario($id);
		$qryRol = new Consulta(" SELECT * FROM rol ");				

		?>
		<form id="frmUsuarioEditar" name="frmUsuarioEditar" action="" method="post">

			<h2>Editar usuario</h2>

			<div class="itm"><label>Nombre(s): </label><input type="text" id="txtNombre" name="txtNombre" value="<?php echo $objUsuario->nombre_usuario; ?>" /></div>
			<div class="itm"><label>Apellido(s): </label><input type="text" id="txtApellido" name="txtApellido" value="<?php echo $objUsuario->apellidos_usuario; ?>" /></div>
			<div class="itm"><label>Correo: </label><input type="text" id="txtCorreo" name="txtCorreo" value="<?php echo $objUsuario->email_usuario; ?>" /></div>
            <input type="hidden" id="txtCorreo2" name="txtCorreo2" value="<?php echo $objUsuario->email_usuario; ?>" />
			<div class="itm">
				<label>Nivel: </label>
				<select id="sleRol" name="sleRol">
					<?php while( $rw = $qryRol->VerRegistro() ){ ?>
						<option value="<?php echo $rw[0] ?>"
                        <?php if($objUsuario->id_rol == $rw[0]){ echo "selected='selected'"; } ?>
                        > <?php echo $rw[1] ?> </option>
					<?php } ?>
				</select>
			</div>
			<div class="itm"><label>Usuario: </label><input type="text" id="txtUsuario" name="txtUsuario" value="<?php echo $objUsuario->login_usuario; ?>" /></div>
            <input type="hidden" id="txtUsuario2" name="txtUsuario2" value="<?php echo $objUsuario->login_usuario; ?>" />
            
			<div class="itm"><label>Contraseña: </label><input type="password" id="txtPassword1" name="txtPassword1" /></div>
			<div class="itm"><label>Ingrese de nuevo la contraseña: </label><input type="password" id="txtPassword2" name="txtPassword2" /></div>

			<div class="itm">
            	<input type="hidden" id="id_usuario" value="<?php echo $objUsuario->id_usuario; ?>" />
				<input type="submit" id="usuario_editar_listar" value="Editar y listar" />
			  	<input type="reset" name="reset" value="Limpiar">
			</div>

			<div class="itm"><a href="usuarios.php">Regresar</a></div>
		</form>
		<?php
	}


	public function UsuariosUpdate($id){
		$Query=new Consulta($sql = " UPDATE usuarios SET 
				nombre_usuario = '".$_POST['txtNombre']."' ,
				apellidos_usuario = '".$_POST['txtApellido']."',
				email_usuario = '".$_POST['txtCorreo']."',
				id_rol = '".$_POST['sleRol']."',
				login_usuario = '".$_POST['txtUsuario']."',
				password_usuario = '".$_POST['txtPassword1']."'
			WHERE id_usuario = '".$id."'
		");
		?><div class='ok'><img src="<?php echo _icn_?>ok.png"> Registro editado correctamente.</div><?php
	}


	public function UsuariosDelete($id){
		if(empty($id)){
			echo "<br><div id=error>La actualizacion no se puede efectuar por falta de Id </div><br>";	
		}else{		
			$Query= new Consulta($sql = "DELETE FROM usuarios WHERE id_usuario='$id'");
			echo "<br><div id=error>Se elimino el registro Correctamente </div><br>";
		}
	}


}
?>