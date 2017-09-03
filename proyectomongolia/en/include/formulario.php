<?
   if ($_SERVER [REQUEST_METHOD]=="POST")
		
	include("include/validar.php");	
	
?>
<table align="center" cellpadding="15"><tr><td>Your feedback and questions are very important to us. 
We aim to answer all e-mailed questions as soon as possible. <br />Please don't hesitate to fill out the form in this page.
Sincerely.<br /><br />

Mongolia Project.<br /><br /><div align="center"><a href="http://www.rutadelaseda.com.ar/adhesiones.php#cyberseguidores"><img src="../images/cyberseguidores2.png" border="0" /></a></div></td></tr></table>
<table align="center"><tr><td><? echo "<font color='red'> $msg </font>"; ?></td></tr></table>
<form action="contact.php" method="post" />
<input name="remoteip" type="hidden" value="<?=$_SERVER["REMOTE_ADDR"];?>" />
<table align="center">
<tr>
<td>Name:&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input name="nombre" type="text" size="30" maxlength="30"></td>
<td>Email: </td>
<td><input name="email" type="text" size="30" maxlength="30"></td>
<td rowspan="4" valign="top"><? include ("include/datacontact.php");?></td>
</tr>
<tr>
<td>Comment: </td>
<td colspan="3"><textarea name="comentario" cols="45" rows="10"></textarea></td>
</tr>
<tr>
<td colspan="4" align="right"><input type="submit" value="Post Comment"></td>
</tr>
</table>
</form>