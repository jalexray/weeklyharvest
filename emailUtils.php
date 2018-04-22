<?php
require 'vendor/autoload.php';


$ADMIN_USER = "weeklyharvestapp@gmail.com";
$ADMIN_PASSWORD = "HarvestAdmin";

function doSendMail($to, $from, $subject, $body) {
	$to = $to;
	$subject = $subject;
	$message = $body;
	$email = $from;

	$mail = new PHPMailer ();
	$mail->isSMTP ();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'weeklyharvestapp@gmail.com';
	$mail->Password = 'HarvestAdmin';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->From = $email;
	$mail->FromName = "Weekly Harvest";
	$mail->addAddress ( $to );
	$mail->addReplyTo ( $email );

	$mail->Subject = $subject;
	$mail->Body = $message;

	if (! $mail->send ()) {
		return false;
	} else {
		return true;
	}
}

function doSendMailCustom($to, $from, $fromName, $subject, $body) {
	$to = $to;
	$subject = $subject;
	$message = $body;
	$email = $from;

	$mail = new PHPMailer ();
	$mail->isSMTP ();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'weeklyharvestapp@gmail.com';
	$mail->Password = 'HarvestAdmin';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->From = $email;
	$mail->FromName = $fromName;
	$mail->addAddress ( $to );
	$mail->addReplyTo ( $email );

	$mail->Subject = $subject;
	$mail->Body = $message;

	if (! $mail->send ()) {
		return false;
	} else {
		return true;
	}
}

function generalSendMailWithFile($to, $from, $fromName, $subject, $body, $filePath = null, $fileName = null) {
	$mail = new PHPMailer ();
	$mail->isSMTP ();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'weeklyharvestapp@gmail.com';
	$mail->Password = 'HarvestAdmin';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->From = $from;
	$mail->FromName = $fromName;
	$mail->addAddress ( $to );
	$mail->addReplyTo ( $from );

	$mail->Subject = $subject;
	$mail->Body = $body;

	if ($filePath != null && $fileName != null) {
		$mail->AddAttachment ( $filePath, $fileName );
	}
	if (! $mail->send ()) {
		return false;
	} else {
		return true;
	}
}

function generalSendMail($to, $subject, $body, $cc=array(), $bcc=array(), $from=null, $fromName="Weekly Harvest Administrator", $user=null, $password=null){
	if($from===null) $from = $GLOBALS["ADMIN_USER"];
	if($user===null) $user = $GLOBALS["ADMIN_USER"];
	if($password===null) $password = $GLOBALS["ADMIN_PASSWORD"];

	$mail = new PHPMailer ();
	$mail->isSMTP ();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = $user;
	$mail->Password = $password;
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->From = $from;
	$mail->FromName = $fromName;
	$mail->addReplyTo ( $from );

	//add "to" addresses
	if(is_array($to)){
		foreach($to as $address){
			$mail->addAddress ( $address );
		}
	}else{
		$mail->addAddress ( $to );
	}

	//add "cc" addresses
	if(is_array($cc)){
		foreach($cc as $address){
			$mail->addCC ( $address );
		}
	}else{
		$mail->addCC ( $cc );
	}

	//add "bcc" addresses
	if(is_array($bcc)){
		foreach($bcc as $address){
			$mail->addBCC($address);
		}
	}else{
		$mail->addBCC ( $bcc );
	}

	$mail->Subject = $subject;
	$mail->Body = $body;

	return $mail->send();
}
?>
