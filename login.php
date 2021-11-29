<?php

session_start();
unset($_SESSION["valid"]);

$success = "";
$error_message = "";
$conn = mysqli_connect("localhost","root","","voteblocks_voters");

if(!empty($_POST["submit_email"])) {
	$sql="SELECT * FROM eligible_users WHERE email='" . $_POST["email"] . "'";
	$result = mysqli_query($conn,$sql);

	$result1 = $conn->query($sql);
	if ($result1->num_rows > 0) {
    // output data of each row
	    while($row = $result1->fetch_assoc()) {
	        $otp_id =  $row["id"];
	    }
	}

	$count  = mysqli_num_rows($result);
	if($count>0) {
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
		require_once("mail_function.php");
		$mail_status = sendOTP($_POST["email"],$otp);
		
		if($mail_status == 1) {
			$result = mysqli_query($conn,"REPLACE INTO otp_expiry(id,otp,is_expired,create_at) VALUES ('" . $otp_id . "', '" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$_SESSION['voter_id'] = $otp_id;
			$current_id = mysqli_insert_id($conn);
			$success=1;
		}
	} else {
		$error_message = "Not eligible! If you think this is a mistake try contacting your organisation.";
	}
}

if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($conn,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}
	
}
?>


<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="refresh" content="">
		<link rel="icon" href="new_logo.png" type="image/x-icon">
		<title>Voter Log In</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="stylesheet1.css" rel="stylesheet">
		<style>			
			.error_message {
			  color: #b12d2d;
			    background: #ffb5b5;
			    border: #c76969 1px solid;
			}
			.message {
			  width: 100%;
			    max-width: 300px;
			    padding: 10px 30px;
			    border-radius: 4px;
			    margin-bottom: 5px;    
			}
		</style>
	</head>

	<body>
		<nav class="py-3 bg-dark fixed-top">
		  <div class="container">
		  	<p style="font-size:150%;" class="py-1 text-center text-white">VoteBlocks Registration</p>
		  </div>
		</nav>
		<br><br>

		<!-- Page Content -->
		<div align="center" style="border: 5px solid lightgrey; border-radius: 15px; margin: auto;" class="col-lg-4 my-5 py-3">
			<?php
				if(!empty($error_message)) {
			?>
			<div class="message error_message"><?php echo $error_message; ?></div>
			<?php
				}
			?>

			<form name="frmUser" method="post" action="">
				<div class="tblLogin">
					<?php 
						if(!empty($success == 1)) { 
					?>
					<div class="tableheader">Enter OTP</div>
					<p style="color:#31ab00;">Check your email for the OTP</p>
						
					<div class="tablerow">
						<input type="text" name="otp" placeholder="One Time Password" required>
					</div><br>
					<div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btn btn-primary"></div>
					<?php 
						} else if ($success == 2) {
							$_SESSION['valid'] = true;
			        ?>
					<p style="color:#31ab00;">Welcome, You have successfully logged in!</p>
					<!-- <a class="nav-link" href="register.php">Register Here</a> -->
					<?php
						header('Refresh: 3; URL = register.php');
						}
						else {
					?>
					
					<div class="tableheader"><h3>Voter's Login</h3></div><br>
					<div class="tablerow"><input type="text" name="email" placeholder="Email" class="form-control" required></div><br>
					<div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btn btn-primary"></div>
					<?php 
						}
					?>
				</div>
			</form>
		</div>
		<!-- /.container -->

		<!-- Footer -->
		<footer style="position: fixed; bottom: 0; width: 100%;">
			<div class="container" align="center">
				<hr>
				<div class="col-lg-12">
			      <p>VoteBlocks: An E-Voting System Using Blockchain<br>
			        <small>Department of Computer Engineering<br>St. Francis Institute of Technology<br>2020-2021</small>
			      </p>
		    	</div>
		    </div>
			<div class="py-5 bg-dark">
		    	<p class="m-0 text-center text-white"><a href="index.html">VoteBlocks</a></p>
		  	</div>
		</footer>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>