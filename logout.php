<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="refresh" content="">
		<link rel="icon" href="new_logo.png" type="image/x-icon">
		<title>Log Out</title>

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

<?php
   session_start();
   session_destroy();
   
?>
   <div align="center" style="border: 5px solid lightgrey; border-radius: 15px; margin: auto;" class="col-lg-4 my-5 py-3">
   	<p style="color:#31ab00;">Log out successful.</p>
   </div>
<?php
   header('Refresh: 2; URL = login.php');
?>
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