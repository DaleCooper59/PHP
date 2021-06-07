
<?php
mail("dave.loper@afpa.com", "Confirmation d'inscription", "Bienvenue sur Jarditou ! 
Tu peux y acheter des tomates cerises pour l'apéro et une brouette pour les transporter. Sors vite ton American Express !", 
array('MIME-Version' => '1.0',
'Content-Type' => 'text/html; charset=utf-8',"From" => "contact@jarditou.com", "Reply-To" => "commercial@jarditou.com", "X-Mailer" => "PHP/".phpversion()));

$destinataire = "Dave Loper <dave.loper@afpa.fr>, jessica.pikatchien@laposte.net, alain.terieur@gmail.com";


/*
if(isset($subject) && isset($body)){
	$to = "test@mailhog.local";
	$subject = $_POST['sujet'];
$body = $_POST['corps'];

$subject = "Hey, I’m Pi Hog Pi!";
$body = "Hello, MailHog!";
$headers = "From: pihogpi@kinsta.com" . "\r\n";
mail($to,$subject,$body,$headers);
}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<form action="" method="POST">
<input type="text" name="sujet">
<input type="text" name="corps">
<input type="submit" name="boutton">
</form>
	
</body>
</html>