<?
include("connection.php");

$dia=date("Y/m/d");

$cadena = $comentario;
$patron = "http://";
$cadena_nueva = eregi_replace($patron, "", $cadena);

if ($cadena==$cadena_nueva){
	$sql = "insert into seguidores (apeynom, email, comentario, fecha) values ('$name', '$mail', '$comentario', '$dia')";
	//echo $sql;
	$insert = mysql_query($sql);
}


$destinatario = "raoc@fibertel.com.ar";
$asunto = "Nuevo comentario de Cyberseguidor";
$cuerpo = "Ha recibido un comentario de ".$name.' - '.$mail;
$headers = "From: ".$mail;


mail($destinatario,$asunto,$cuerpo,$headers);


header('Location: adhesiones.php?op=0');

?>
