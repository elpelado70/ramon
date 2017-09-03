<?
   if ($_SERVER [REQUEST_METHOD]=="POST")
		
	include("include/validar.php");	
	
?>
<table align="center" cellpadding="15"><tr><td>Sus comentarios y preguntas son muy importantes para nosotros.<br />
Nuestro objetivo es responder todas las preguntas enviadas por correo electrónico tan pronto como sea posible. Por favor, no dude en utilizar el formulario en esta página. Atentamente<br /><br />Proyecto Mongolia.<br /><br /></td></tr></table>
<table align="center"><tr><td><? echo "<font color='red'> $msg </font>"; ?></td></tr></table>
<form action="contacto.php" method="post" />
<input name="remoteip" type="hidden" value="<?=$_SERVER["REMOTE_ADDR"];?>" />
<table align="center">
<tr>
<td>Nombre:&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input name="nombre" type="text" size="30" maxlength="30"></td>
<td>Email: </td>
<td><input name="email" type="text" size="30" maxlength="30"></td>
<td rowspan="4" valign="top"><? include ("include/datacontact.php");?></td>
</tr>
<tr>
<td>Comentario</td>
<td colspan="3"><textarea name="comentario" cols="45" rows="10"></textarea></td>
</tr>
<tr>
<td colspan="4" align="right"><input type="submit" value="Enviar Consulta"></td>
</tr>
</table>
</form>