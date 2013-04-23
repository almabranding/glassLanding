<?php

function ValidarDatos($campo){
	
	//Array con las posibles cabeceras a utilizar por un spammer
	$badHeads = array("Content-Type:",
	"MIME-Version:",
	"Content-Transfer-Encoding:",
	"Return-path:",
	"Subject:",
	"From:",
	"Envelope-to:",
	"To:",
	"bcc:",
	"cc:");
	
	//Comprobamos que entre los datos no se encuentre alguna de
	//las cadenas del array. Si se encuentra alguna cadena se
	//dirige a una página de Forbidden
	foreach($badHeads as $valor){
		
		if(strpos(strtolower($campo), strtolower($valor)) !== false){
			header("HTTP/1.0 403 Forbidden");
			exit;
		}
	
	}
}

if(isset($_POST['action']) && $_POST['action'] == 'submitform') {
	
	ValidarDatos($_POST['mail']);
	$mail="contact@glass120ocean.com";
	//$mail = "dmartin@glass120ocean.com,anna@glass120ocean.com,eloy@glass120ocean.com,nherrera@terragroup.com,contact@glass120ocean.com,info@glass120ocean.com";
        $to = $mail;
	$subject = "Glass";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: contact@glass120ocean.com" . "\r\n";
	$body = "";
        $body.= 'Name: '.$_POST['name'].'<br/>';		
	$body.= 'Mail: '.$_POST['mail'].'<br/>';
        $body.= 'Phone: '.$_POST['phone'].'<br/>';
	if(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['phone'])){
            header("location:form.php");	
            exit;
        }
	mail($to, $subject, $body, $headers);
	
	header("Location: ok.html");
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Glass 120 Ocean Drive – Miami Beach</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
		swfobject.embedSWF("glas.swf", "footer", "2560", "807", "10.0.0", "expressInstall.swf");
		</script>

<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</head>

<body>

<div id="container">

<p id="home" class="text"><img src="images/text_home.gif" width="546" height="52" /></p>
<p id="send" class="text"><img src="images/text_send.png"  /></p>

<p class="button_home"><a href="#"><img src="images/text_intrigued.gif" width="236" height="26" /></a></p>
<p class="button_video" style="margin-top: 100px; "><a href="index.php"><img src="images/watch.gif" width="" height="" /></a></p>

<div class="form">
<form action="" method="post" id="contactform">
   <p> <label><img src="images/name.png"/></label><input name="name" type="text" id="name" size="30" /></p>
   <p> <label><img src="images/phone.png"/></label><input name="phone" type="text" id="maiphonel" size="30" /></p>
   <p> <label><img src="images/email.png"/></label><input name="mail" type="text" id="mail" size="30" /></p>
<input type="hidden" id="action" name="action" value="submitform" />
<br />
<button type="submit" value="Send">	</button>
</form>
</div>




</div>

<div id="footer">

<img src="images/glas.gif" width="2560" height="807" />


</div>


</body>
</html>