<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::::::: WAYLLA ::::::</title>
<link href="../webroot/css/stylos.css" type="text/css" rel="stylesheet" />
<script language="javascript">
var i=0;
function redimencionar() {
if (navigator.appName == "Netscape") i=20;
if (document.images[0]) window.resizeTo(document.images[0].width, document.images[0].height+60);
var y = (((screen.height-(document.images[0].height)-70) /2));
var x= (((screen.width-(document.images[0].width)-i) / 2));
moveTo(x,y);
self.focus();
}
</script>
</head>
<body onload="redimencionar();" >
	<table align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td><img src="<?php echo str_replace("thumb_","",$_GET['img'])?>" id="image"/></td>
		</tr>
	</table>
</body>
</html>
