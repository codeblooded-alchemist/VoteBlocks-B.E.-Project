<?php	
	function sendOTP($email,$otp) {
		require('vendor/phpmailer/phpmailer/src/PHPMailer.php');
		require('vendor/phpmailer/phpmailer/src/smtp.php');
	
		$message_body = "To authenticate, please use the following One Time Password (OTP):<br/><br/>" . $otp;
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = "587";
		$mail->Username = "voteblocks2021@gmail.com";
		$mail->Password = "beproject";
		$mail->Host     = "smtp.gmail.com";
		$mail->Mailer   = "smtp";
		$mail->SetFrom('voteblocks2021@gmail.com', 'VoteBlocks');
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->send();
		
		return $result;
	}
?>