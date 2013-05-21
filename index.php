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
	$mail="rsvp@glass120ocean.com";
        $to = $mail;
	$subject = "Glass";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: contact@glass120ocean.com" . "\r\n";
	$body = "";
        $body.= 'Name: '.$_POST['name'].'<br/>';		
	$body.= 'Mail: '.$_POST['mail'].'<br/>';
        $body.= 'Phone: '.$_POST['phone'].'<br/>';
        $body.= 'Opinion: '.$_POST['yours'].'<br/>';
	if(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['phone'])){  
            //header("location:index.php");	
            exit;
        }
	mail($to, $subject, $body, $headers);
	echo 1;
        exit;
	//header("Location: ok.html");
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Glass 120 Ocean Drive – Miami Beach</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
</head>

<body>

<div id="container">

<p id="send" class="text"><img src="images/top.jpg"  /></p>

<div class="form" style="
    margin: auto;
    width: 500px;">
<form action="" method="post" id="contactform">
   <p> <label><img src="images/name.jpg"/></label><input name="name" type="text" id="name" size="30" /></p>
   <p> <label><img src="images/phone.jpg"/></label><input name="phone" type="text" id="maiphonel" size="30" /></p>
   <p> <label><img src="images/mail.jpg"/></label><input name="mail" type="text" id="mail" size="30" /></p>
   <p> <label><img src="images/yours.jpg"/></label><input style="margin-top:21px;width: 238px;" name="yours" type="text" id="mail" size="30" /></p>
<input type="hidden" id="action" name="action" value="submitform" />
<br />
<button type="submit" value="Send">	</button>
</form>
</div>
<p id="send" class="text toggle"><img src="images/by_clicking.jpg"  /></p>
<p id="sendSMS" class="text toggle" style="display:none"><img src="images/message_sent.jpg"  /></p>

</div>
    <script>
        $("#contactform").submit(function(){
            $.post('',$("#contactform").serialize(), function(data) {
                if(data){
                    $(".toggle").toggle();
                }
            });
            return false;
        });
    </script>
</body>
</html>