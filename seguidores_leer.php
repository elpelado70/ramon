<?
include("connection.php");

$sql="select * from seguidores where activo = 1 order by fecha desc, id desc";
$cons = mysql_query($sql);
$numeroRegistros = mysql_num_rows($cons);

if($numeroRegistros>0){
	//calculo de elementos necesarios para paginacion
	//tamaño de la pagina
	$tamPag=10;

	//pagina actual si no esta definida y limites
	if(!isset($pagina)){
		$pagina=1;
		$inicio=1;
		$final=$tamPag;	
	}
	//calculo del limite inferior
	$limitInf=($pagina-1)*$tamPag;

	//calculo del numero de paginas
	$numPags=ceil($numeroRegistros/$tamPag);
	if(!isset($pagina)){
		$pagina=1;
		$inicio=1;
		$final=$tamPag;	
	}else{
		$seccionActual=intval(($pagina-1)/ $tamPag);
		$inicio=($seccionActual*$tamPag)+1;

		if($pagina< $numPags){
			$final=$inicio+$tamPag-1;		
		}else{
			$final=$numPags;
		}
		
		if ($final>$numPags){
			$final=$numPags;
		}
	}

	//fin de dicho calculo
	//calculo el total de páginas
	$total_paginas = ceil($numeroRegistros / $tamPag);
	
	//construyo la sentencia SQL
	$sql_completo = $sql." LIMIT " .$limitInf. "," . $tamPag;
	$res = mysql_query($sql_completo);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="JavaScript" type="text/javascript">
function nospam(partea, parteb) {
  document.location.href = "mai"+"lto:"+partea+"@"+parteb;
}
</script>

<link rel="stylesheet" href="css/ruta.css">
</head>

<body>
<table width="800" cellpadding="6" cellspacing="0" border="0" class="texto"> 
<tr>
  <td align="left" valign="middle"><span class="gral"><a href="adhesiones.php?op=1#cyberseguidores" target="_self"><img src="img/write-icon.gif" border="0" align="absmiddle"><b>** DEJÁ TUS COMENTARIOS AQUÍ **</b></a></span></td>	
</tr>
  <tr>
	<td align="center"><b>Páginas ( <? echo $pagina; ?> of <? echo $total_paginas; ?>)</b></td>
  </tr>

	<?
	
	while ($fila = mysql_fetch_array($res)){
	
	$apeynom = $fila['apeynom'];
	$fecha = date("d-m-Y",mktime (0,0,0,substr($fila['fecha'],5,2),substr($fila['fecha'],8,2),substr($fila['fecha'],0,4)));
	$mensaje = $fila['comentario'];
	$mail_1 = substr($fila['email'],0,strpos($fila['email'],'@'));
	$mail_2 = substr($fila['email'],strpos($fila['email'],'@')+1,strpos($fila['email'],'.'));
	$mens_admin = $fila['comentario_admin'];

echo <<<HTMLLECUS1
		<tr>
		  <td align="left" bgcolor="#ededed"><a href="javascript:nospam('$mail_1', '$mail_2');"><img src="img/email.gif" border="0" align="absmiddle" title="$mail_1@$mail_2"></a>&nbsp;&nbsp;<b>$apeynom</b><br><span class="nombres">Mensaje enviado el $fecha</span><br><br>
		  $mensaje<br><br>


HTMLLECUS1;
			if ($mens_admin <> ""){
echo <<<HTMLLECUS2
			<br>
			<fieldset>
			<legend>
			<label class="nombres">Comentario de Ramón:</label>
			</legend>
			<i>$mens_admin</i>
			</fieldset>
HTMLLECUS2;

			}
echo <<<HTMLLECUS3
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			
		</tr>
		<tr><td colspan="2">
HTMLLECUS3;

	}


		//a partir de aqui se generan los numeros de pagina
		echo '<table border="0" cellspacing="0" cellpadding="0" align="center">';
		echo '<tr><td align="center" valign="top" >';

		if($pagina>1){
			echo '<span class="gral"><a href="'.$_SERVER["PHP_SELF"].'?pagina='.($pagina-1).'#cyberseguidores">Back&nbsp;</a></span>';
		}

		for($i=$inicio;$i<=$final;$i++){
			if($i==$pagina){
				echo $i;
			}else{
				echo '<span class="gral">&nbsp;<a href="'.$_SERVER["PHP_SELF"].'?pagina='.$i.'#cyberseguidores">'.$i.'&nbsp;</a></span>';
			}
		}

		if($pagina< $numPags){
			echo '&nbsp;<span class="gral"><a href="'.$_SERVER["PHP_SELF"].'?pagina='.($pagina+1).'#cyberseguidores">Next&nbsp;</a></span>';
		}

		//fin de la paginacion
		echo '</td></tr>';
		echo '</table>';
		
?>	

    </td>
  </tr>
</table>
</body>
</html>
