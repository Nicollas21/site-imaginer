<?php
	
	/*
		Verify and validate POST attributes
	*/

	require 'html-purifier-include.php';

	$errors = array();
	$data = array();

	if(isset($_POST['name']) == false ||
	 isset($_POST['email']) == false ||
	 isset($_POST['subject']) == false ||
	 isset($_POST['message']) == false || 
	 !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		die(json_encode(array( 'error' => TRUE ,'message' => 'Informe os dados necessários ao formulário para entrar em contato conosco.')));
	}

	$message = $purifier->purify($_POST['message']); //strip_tags($_POST['message']);
	$subject = $purifier->purify($_POST['subject']);
	$name = $purifier->purify($_POST['name']);	
	
	// Create the email and send the message
	$to = 'studioimaginer@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$email_subject = $subject;
	$email_body = $message;
	$headers = "From:" . $_POST['email'] . '\n'; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	mail($to,$email_subject,$email_body,$headers);
	return true;			

?>