<?php

function sendEmail($email){
	$to      = $email;
    $subject = '[DropboxUpdater] Inscription';
	$message = 'Merci de votre inscription, vous aurez rapidement vos 500Mo supplémentaire sur Dropbox.';
	$headers = 'From: jsamsoninfo@gmail.com' . "\r\n" .
	     	   'Reply-To: jsamsoninfo@gmail.com' . "\r\n" .
	     	   'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}

function sendEmailToMe($email){
	$to      = "jeremie.samson76@gmail.com";
    $subject = '[DropboxUpdater] ' . $email;
	$message = '';
	$headers = 'From: jsamsoninfo@gmail.com' . "\r\n" .
	     	   'Reply-To: jsamsoninfo@gmail.com' . "\r\n" .
	     	   'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
?>