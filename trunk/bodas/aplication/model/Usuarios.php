<?php
class Usuarios{

	function UsuariosCabezera(){ 
		?>
            <div id="menuSuperior">
                <div class="tit_pagina">Listado de usuarios.</div>
                <div class="cont_items_menu">
                    <ul>
                        <li><a href="usuarios.php?opcion=list"> Listar </a></li>
                        <li><a href="usuarios.php?opcion=new"> Nuevo </a></li>
                    </ul>
                </div>
            </div>
		<?php		
	}

	function UsuariosList(){
		$sqln = "SELECT 
					a.id_usuario, 
					CONCAT(a.nombre_usuario,
					' ',
					a.apellidos_usuario) AS Usuario, 
					a.email_usuario AS Email, 
					r.nombre_rol as Rol, 
					lectura_usuario AS Lectura, 
					escritura_usuario AS Escritura
				FROM usuarios a, rol r 
				WHERE a.id_rol=r.id_rol ";
		$qryn = new Consulta($sqln);		
		$numc = $qryn->NumeroRegistros();
		?>
		<table class='reporte display' cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Rol</th>
                    <th>Lectura</th>
                    <th>Escritura</th>
                    <th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while ($rown = mysql_fetch_array($qryn->Consulta_ID)) {
					?>
					<tr>
						<td><?php echo $rown[1]?></td>
                        <td><?php echo $rown[2]?></td>
                        <td><?php echo $rown[3]?></td>
                        <td><?php echo $rown[4]?></td>
                        <td><?php echo $rown[5]?></td>
						<td>
						<?php if($_SESSION['session'][4]=="SI" ){ ?>
                        	<a title="Editar" onclick="mantenimiento('usuarios.php',<?php echo $rown[0]?>,'edit')" href="#"> <img src="../aplication/webroot/imgs/icons/x_edit.png"></a>
                        	
                            <a title="Eliminar" onclick="mantenimiento('usuarios.php',<?php echo $rown[0]?>,'delete')" href="#"> <img src="../aplication/webroot/imgs/icons/x_delete.png"></a>
                        
                        	<a title="Permisos" onclick="mantenimiento_det('modulo_usuario.php',<?php echo $rown[0]?>)" href="#"><img border="0" src="../aplication/webroot/imgs/icons/x-detail.png"></a>
						<?php }
					echo "</td></tr>";
				}
			?>
			</tbody>
		</table>
		<?php
	}

	function UsuariosNew(){
				
		$QueryRol= new Consulta("SELECT * FROM rol ");?>
		<form name="f1" action="" method="post">
			<table id="mantenimiento" cellpadding="0" cellspacing="1">
				<tr>
				  <td colspan="5" class="accion">NUEVO USUARIO</td>
				</tr>
				<tr>
					<td align="right" width="40%"><br>Nombre :</td>
					<td width="60%" colspan="3" align="left"><br><input type="text" size="30" name="nombre" ></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td align="right"> Apellidos :</td>
					<td colspan="3" align="left"><input type="text" size="30"  name="apellidos" ></td></tr>
				<tr>
					<td align="right"> Email :</td>
					<td colspan="3" align="left"><input type="text" size="30"  name="email" ></td></tr>
				<tr>
					<td align="right"> Rol :</td>
					<td colspan="3" align="left"><select name="rol">
						<option value="">--------- Seleccione Rol --------</option>
						<?php while($RowRol= $QueryRol->VerRegistro()){ ?>
							<option value="<?php echo $RowRol[0] ?>" <?php if($RowRol[0]==$rol){ echo "Selected";}?>><?php echo $RowRol[1] ?></option>
						<?php } ?>
						</select></td></tr>
				<tr>
					<td align="right"> Usuario :</td>
					<td colspan="3" align="left"><input type="text" size="30" id="usuario"  name="usuario" >&nbsp;<a href="#" onClick="checkName(document.f1.usuario)" title="Ver Disponibilidad">Disponible</a>
					<div id="result"></div></td></tr>
				<tr>
					<td align="right"> Password :</td>
					<td colspan="3" align="left"><input type="text" size="30"  name="password" ></td></tr>
				<tr>
					<td align="right">Lectura :</td>
					<td align="left"><input type="checkbox" name="lectura" value="SI" ></td>
				  	<td align="right">Escritura :</td>
				  	<td align="left"><input type="checkbox" name="escritura" value="SI"></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td></tr>
				<tr>
					<td colspan="5" align="center"><input type="submit" name="enviar2" value="GUARDAR" onclick="return  validar_usuarios('add')" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="reset" name="cancelar" value="CANCELAR" onClick="javascript:window.history.go(-1)"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
		</form> <?php		
	}


	function UsuariosAdd(){
		if(!$_POST){
			echo "<div id=error>ERROR: No se pudo Agregar Usuario por falta de datos </div><br>";		
		}else{
			if(!$_POST['lectura']){$_POST['lectura']="NO";}
			if(!$_POST['escritura']){$_POST['escritura']="NO";}
			
			$sq=new Consulta("SELECT * FROM usuarios WHERE nombre_usuario='".$_POST['nombre']."' AND apellidos_usuario='".$_POST['apellidos']."' AND email_usuario='".$_POST['email']."' ");
			
			$sq_bu=new Consulta("SELECT * FROM usuarios WHERE login_usuario='".$_POST['usuario']."'");			
			if($sq->NumeroRegistros()==0){
				$sql = "INSERT INTO usuarios 
				VALUES( '',
				'".$_POST['rol']."',
				'".$_POST['nombre']."' ,
				'".$_POST['apellidos']."',
				'".$_POST['email']."',
				'".$_POST['usuario']."',
				'".$_POST['password']."',
				'".date('Y-m-d')."',
				'".$_POST['lectura']."',
				'".$_POST['escritura']."') ";
				$Query= new Consulta($sql);			
				echo "<div id=error> Se Ingreso el Nuevo Usuario Correctamente </div><br>";			
			}else if($sq_bu->NumeroRegistros()){?>
				<script>
					alert(" El usuario ya existe, por favor ingrese otro nombre de usuario ");
					location.replace("usuarios.php?opcion=new")	
				</script><?php					
			}else{
				echo "<div id=error> ERROR: no se puedo ingresar el usuario </div><br>";
							
			}			
		}
		
	}

	function UsuariosUpdate($id, $_POST){
		if(empty($id)){
			echo "<br><div id=error>La actualizacion no se puede efectuar por falta de Id </div><br>";	
		}else if(!$_POST){
			echo "<br><div id=error>La actualizacion no se puede efectuar por que no pasaron los datos </div><br>";	
		}else{
			if(!$_POST['lectura']){$_POST['lectura']="NO";}
			if(!$_POST['escritura']){$_POST['escritura']="NO";}
			$Query=new Consulta($sql = " UPDATE usuarios
										SET nombre_usuario='".$_POST['nombre']."' ,
											apellidos_usuario='".$_POST['apellidos']."',
											email_usuario='".$_POST['email']."',
											id_rol='".$_POST['rol']."',
											login_usuario='".$_POST['usuario']."',
											password_usuario='".$_POST['password']."',
											lectura_usuario='".$_POST['lectura']."',
											escritura_usuario='".$_POST['escritura']."'
									    WHERE id_usuario='".$id."'");
			echo "<br><div id=error>La actualizacion se realizo Correctamente </div><br>";	
		}
	}


	function UsuariosEdit($id){ 
		if(!$id){
			echo "<br><div id=error>ERROR: no se encontro ningun usuario con ese Id ó le falta Id  </div><br>";	
		}else{
			$Query= new Consulta($sql = " SELECT * FROM usuarios WHERE id_usuario='".$id."'");
			$Row= $Query->VerRegistro();
			$QueryRol= new Consulta($sql = " SELECT * FROM rol ");				
			$rol=$Row['id_rol'];?>
			<form name="f1" action="" method="post">
				<table id="mantenimiento" cellpadding="0" cellspacing="1">
					<TR>
						<TD colspan="5" class="accion">EDITAR DATOS DE USUARIO</TD></TR>
					<tr>
						<td align="right" width="40%"><br>Nombre :</td>
						<td width="60%" colspan="3"><br><input type="text" size="30" name="nombre" value="<?php echo $Row['nombre_usuario']?>"></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td align="right"> Apellidos :</td>
						<td colspan="3"><input type="text" size="30"  name="apellidos" value="<?php echo $Row['apellidos_usuario']?>"></td></tr>
					<tr>
						<td align="right"> Email :</td>
						<td colspan="3"><input type="text" size="30"  name="email" value="<?php echo $Row['email_usuario']?>"></td></tr>
					<tr>
						<td align="right"> Rol :</td>
						<td colspan="3"><select name="rol">
								<option value="">--------- Seleccione Rol --------</option><?php
							while($RowRol= $QueryRol->VerRegistro()){ ?>
								<option value="<?php echo $RowRol[0] ?>" <?php if($RowRol[0]==$rol){ echo "Selected";}?>><?php echo $RowRol[1] ?></option><?php			
							}			
								?></select></td></tr>
					<tr>
						<td align="right"> Usuario :</td>
						<td colspan="3"><input type="text" size="30"  name="usuario" value="<?php echo $Row['login_usuario']?>"></td></tr>
					<tr>
						<td align="right"> Password :</td>
						<td colspan="3"><input type="text" size="30"  name="password" value="<?php echo $Row['password_usuario']?>"></td></tr>
					<tr>
					  <td  align="right">Lectura :</td>
						<td align="left"><input type="checkbox" name="lectura" value="SI" <?php if($Row['lectura_usuario']=="SI"){  echo "checked";} ?> />                    
					  <td align="right">Escritura: </td>                      
					  <td align="left"><input type="checkbox" name="escritura" value="SI"  <?php if($Row['escritura_usuario']=="SI"){  echo "checked";} ?>/></td>                      
					</tr>
					<tr><td colspan="4">&nbsp;&nbsp;&nbsp;</tr>
					<tr>
						<td colspan="5" align="center"><input type="submit" name="enviar2" value="GUARDAR" onclick="return  validar_usuarios('update', <?php echo $id?>)" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    <input type="reset" name="cancelar" value="CANCELAR" onClick="javascript:window.history.go(-1)"></td></tr>
					<tr><td>&nbsp;</td></tr>
				</table>
			</form>	<?php
		}
	}

	function UsuariosDelete($id){
		if(empty($id)){
			echo "<br><div id=error>La actualizacion no se puede efectuar por falta de Id </div><br>";	
		}else{		
			
			$Query= new Consulta($sql = "DELETE FROM usuarios WHERE id_usuario='$id'");
			echo "<br><div id=error>Se elimino el registro Correctamente </div><br>";
		}
	}

}
?>