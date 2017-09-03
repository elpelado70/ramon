<?
//recupero los datos
		$nombre 		= $_REQUEST["nombre"];
		$email 			= $_REQUEST["email"];
		$comentario 	= $_REQUEST["comentario"];
		$remoteip       = $_REQUEST["remoteip"];
		$sumensaje		= "<b>Este es su mensaje o consulta, gracias por comunicarse con nosotros, le responderemos a la brevedad.</b>";
		$firma			= "<br><b>Saluda Cordialmente.<br>Proyecto Mongolia.<br>www.proyectomongolia.com.ar";
		$msg="";
		
			if (empty($nombre))
			
			$msg=$msg."El nombre es un dato obligatorio<br>";
			
			if ( !ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $email) )
			
            $msg=$msg."El email es un dato obligatorio<br>";
			
			if (empty($comentario))

			$msg=$msg."El comentario es un dato obligatorio<br>";			

		
			if (empty($msg))
	
			{
				
				//MANDO UN MAIL
				$headers = "Content-type: text/html;\n Content-Type: image/jpg;\n Content-Transfer-Encoding: base64;\n charset=iso-8859-1\n";
				$headers .= utf8_decode("From: Comentario a Proyecto Mongolia<contacto@proyectomongolia.com.ar>\n\r");
				
				$cuerpo = '<b>Estimado/a Sr/a. '.$nombre.'</b><br>'.$sumensaje.'<br><br>'.utf8_decode ($comentario).'<br>'.$firma.'';
				$cuerpo2 = '<b>Mensaje enviado por '.$nombre.' y su mail es '.$email.'</b><br><br><b>El mensaje es el siguiente: </b>'.utf8_decode($comentario).'<br><br><b>La IP de quien envia el mensaje es: </b>'.$remoteip.'';
				mail("$email","Comentario a Proyecto Mongolia",$cuerpo,$headers);
				mail("contacto@proyectomongolia.com.ar","Comentario a Proyecto Mongolia",$cuerpo2,$headers);
				echo "<META http-equiv='refresh' content='0;URL=contacto_ok.php'>";
			}



?>