<?
//recupero los datos
		$nombre 		= $_REQUEST["nombre"];
		$email 			= $_REQUEST["email"];
		$comentario 	= $_REQUEST["comentario"];
		$remoteip       = $_REQUEST["remoteip"];
		$sumensaje		= "<b>This is your message or query, thanks for contacting us, we will respond promptly.</b>";
		$firma			= "<br><b>Yours sincerely.<br>Proyecto Mongolia.<br>www.proyectomongolia.com.ar";
		$msg="";
		
			if (empty($nombre))
			
			$msg=$msg."The name is a required field<br>";
			
			if ( !ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $email) )
			
            $msg=$msg."Email is a required field<br>";
			
			if (empty($comentario))

			$msg=$msg."The comment is a required field<br>";			

		
			if (empty($msg))
	
			{
				
				//MANDO UN MAIL
				$headers = "Content-type: text/html;\n Content-Type: image/jpg;\n Content-Transfer-Encoding: base64;\n charset=iso-8859-1\n";
				$headers .= utf8_decode("From: Comment on Mongolia Project<contacto@proyectomongolia.com.ar>\n\r");
				
				$cuerpo = '<b>Dear '.$nombre.'</b><br>'.$sumensaje.'<br><br>'.utf8_decode ($comentario).'<br>'.$firma.'';
				$cuerpo2 = '<b>Message sent '.$nombre.' and your mail is '.$email.'</b><br><br><b>The message is as follows: </b>'.utf8_decode($comentario).'<br><br><b>The IP who sent the message is: </b>'.$remoteip.'';
				mail("$email","Commentary on Mongolia Project",$cuerpo,$headers);
				mail("contacto@proyectomongolia.com.ar","Commentary on Mongolia Project",$cuerpo2,$headers);
				echo "<META http-equiv='refresh' content='0;URL=contacto_ok.php'>";
			}



?>