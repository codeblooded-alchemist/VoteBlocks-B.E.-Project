<?php	
	function sendBallot($start_date, $start_time, $end_date, $end_time, $n_candidates, $candidate_name1, $candidate_name2, $name, $phone, $email) {
		require('vendor/phpmailer/phpmailer/src/PHPMailer.php');
		require('vendor/phpmailer/phpmailer/src/smtp.php');
	
		$message_body = "Ballot Details:<br/>"."<br/>Start Date: ".$start_date."<br/>Start Time: ".$start_time."<br/>End Date: ".$end_date."<br/>End Time: ".$end_time."<br/>Number of Candidates: ".$n_candidates."<br/>Candidate1: ".$candidate_name1."<br/>Candidate2: ".$candidate_name2."<br/><br/><br/>Personal Contact Details:<br/>"."<br/>Name: ".$name."<br/>Phone: ".$phone."<br/>Email: ".$email;
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
		$mail->AddAddress('voteblocks2021@gmail.com');
		$mail->Subject = "Ballot Details";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->send();
		
		return $result;
	}
?>