<?php

use PHPMailer\PHPMailer\PHPMailer;

  function sendMail($name, $emails, $subject, $body){
		require_once "../PHPMailer/PHPMailer.php";
		require_once "../PHPMailer/SMTP.php";
		require_once "../PHPMailer/Exception.php";

		$mail = new PHPMailer();

		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "aictd26@gmail.com";
		$mail->Password = 'ict4d1234';
		$mail->Port = 465;
		$mail->SMTPSecure = "ssl";
		$mail->isHTML(true);
		$mail->setFrom($emails, $name);
		$mail->addAddress($emails);
		$mail->Subject = ("$emails ($subject)");
		$mail->Body = $body;

		if($mail->send()) {
			return true;
			header("Location: login.php");
		} else {
			return false;
		}
	}
?>