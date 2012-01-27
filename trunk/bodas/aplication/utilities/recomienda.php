<?php session_start();
if($_POST['enviar']){ 
$from="From: ".$email;

$msg="
Hello, ".$nombre_amigo.": 

 ".$nombre." send a message:

".$mensaje." 


--- TELEVENTAS INFO ---

";
mail($email_amigo,$titulo,$msg,$from); ?>

<div style="font:normal 11px tahoma; color:#666666; text-align:center; margin-top:100px"><b>Su mensaje se envio correctamente ! <a href="#" style="color:#006699; text-decoration:none" onClick="top.close()">CERRAR</a></b></div>
<?php
}else{

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recomienda a un amigo Exactmetal.com</title>
<script language="javascript" src="../webroot/js/js.js"></script>
<link href="../webroot/css/stylos.css" type="text/css" rel="stylesheet" />
</head>
<body ><br />
<table cellpadding="0" cellspacing="0" width="240" height="200" align="center" id="cuerpo" >
		<tr>
			<td align="center"><h5 align="center">Diselo a un Amigo</h5></td>
		</tr>
		<tr>
		<td>
			<form name="f1" action="recomienda.php" method="post">
			<table style="margin-bottom:10px" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td align="right">Tu Nombre:</td>
					<td><input type="text" size="20" name="nombre" /></td>
				</tr>
				<tr>
					<td align="right">Tu E-mail: </td>
					<td><input type="text" size="20" name="email" /></td>
				</tr>
				<tr>
					<td align="right">Nombre de tu Amigo: </td>
					<td><input type="text" size="20" name="nombre_amigo" /></td>
				</tr>
				<tr>
					<td align="right">E-mail de tu amigo:</td>
					<td><input type="text" size="20" name="email_amigo" /></td>
				</tr>
				<tr>
					<td align="right">Asunto:</td>
					<td><input type="text" size="20" name="titulo" /></td>
				</tr>
				<tr>
					<td align="right">Mensaje:</td>
					<td><textarea name="mensaje" cols="25" rows="5"></textarea></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" ><input type="reset" name="limpiar" value="LIMPIAR" /></td>
					<td align="center" ><input type="submit" name="enviar" value="ENVIAR" onClick=" return valida_diselo()" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
	<tr>
		<td align="right"><div id="evento"><a href="#" onClick="javascript:void(top.close())" title="Cerrar Ventana"> X </a></div></td>
	</tr>
</table>
<?
}
?>
</body>
</html>
