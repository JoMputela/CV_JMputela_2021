<?php
	
	/*
		The Send Mail php Script for Contact Form
		Server-side data validation is also added for good data validation.
	*/
	
	$data['error'] = false;
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	if( empty($name) ){
		$data['error'] = 'Please enter your name.';
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		$data['error'] = 'Please enter a valid email address.';
	}else if( empty($subject) ){
		$data['error'] = 'Please enter your subject.';
	}else if( empty($message) ){
		$data['error'] = 'The message field is required!';
	}else{
		
		$formcontent="From: $name\nSubject: $subject\nEmail: $email\nMessage: $message";
		
		
		//Place your Email Here
		$recipient = "mputelajoseph@gmail.com";
		
		$mailheader = "From: $email \r\n";
		
		if( mail($recipient, $name, $formcontent, $mailheader) == false ){
			$data['error'] = 'Sorry, an error occured!';
		}else{
			$data['error'] = false;
		}
	
	}
	
	echo json_encode($data);
	
?>





<?php

// if(!empty($_POST["send"])) {
// 	$name = $_POST["userName"];
// 	$email = $_POST["userEmail"];
// 	$subject = $_POST["subject"];
// 	$content = $_POST["content"];

// 	$s = "admin@phppot_samples.com";
// 	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
// 	if(mail($toEmail, $subject, $content, $mailHeaders)) {
// 	    $message = "Your contact information is received successfully.";
// 	    $type = "success";
// 	}
// }
// require_once "contact-view.php";

?>