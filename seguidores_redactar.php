<html>
<head>
<script language="javascript" type="text/javascript">
function chequeo(f){
	var email = /^(.+\@.+\..+)$/
	
	if (bookings.name.value == ""){
		alert("Debe ingresar un nombre");
		bookings.name.focus()
		return false;
	}
	if (bookings.mail.value == ""){
		alert("Debe completar un email");
		bookings.mail.focus()
		return false;
	}else if(!email.test(bookings.mail.value)){			
			alert("La direccion de email no es valida")
			bookings.mail.focus()
            return false;		
	}
	if (bookings.comentario.value == ""){
		alert("Debe escribir un comentario");
		bookings.comentario.focus()
		return false;
	}
}
</script>
</head>

<body>
<table width="800" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left"><span class="gral"><a href="adhesiones.php?op=0#cyberseguidores" target="_self"><img src="img/read-icon.gif" border="0" align="absmiddle"><b>** LEE LOS COMENTARIOS **</b></a></span></td>
	</tr>
</table>
<table width="460" border="0" cellpadding="0" cellspacing="0">
<form name="bookings" method="post" action="seguidores_insertar.php" onSubmit="return chequeo();" >
	<tr> 
		<td class="texto">Nombre</td> 
		<td><input type="text" size="50" name="name"  /></td>
	</tr>
	<tr> 
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr> 
		<td class="texto">E-mail</td>
		<td><input type="text" size="50" name="mail"  /></td>
	</tr>
	<tr> 
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr> 
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr> 
		<td class="texto" valign="top">Comentarios</td>
		<td valign="top"><textarea cols="38" rows="8" name="comentario"></textarea></td>
	</tr>
	<tr> 
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr> 
	    <td>&nbsp;</td>
		<td align="left">
		<a onClick="bookings.reset();"><img src="img/btn_cancelar.gif" border="0"></a>&nbsp;&nbsp;
		<input type="image" src="img/btn_enviar.gif" border="0" name="Next" value="Next" onClick="submit"></td>
	</tr>
</table>
</form>
</body>
</html>
