<?php
session_set_cookie_params(0);
session_start();

$_SESSION['valid'] = true;
$otp_id= $_SESSION['voter_id'];

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="">
    <link rel="icon" href="new_logo.png" type="image/x-icon">
    <title>VoteBlocks - Register</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheet1.css" rel="stylesheet">
    <script>
          // Set the date we're counting down to
          var countDownDate = new Date("April 9, 2021 15:00:00").getTime();

          // Update the count down every 1 second
          var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
              
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
              
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
              
            // Output the result in an element with id="timer"
            document.getElementById("timer").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";
              
            // If the count down is over, write some text 
            if (distance < 0) {
              clearInterval(x);
              document.getElementById("timer").innerHTML = "EXPIRED";
            }
          }, 1000);


          function limit2(e) {           
              if (e.length <= 1) {
                alert("2 images are required.");
                document.getElementById('files').value = '';
                document.getElementById('img1').src = '';
                document.getElementById('img2').src = '';
              }
              else if (e.length > 2) {
                alert("Only 2 images are allowed.");
                document.getElementById('files').value = '';
                document.getElementById('img1').src = '';
                document.getElementById('img2').src = '';
              }
          }

          function change_form_status() {
            document.getElementById("form_status").disabled = true;
          }
    </script>

  </head>

  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <p style="font-size:150%;" class="py-1 text-white navbar-nav">VoteBlocks Registration</p>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log Out</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="https://metamask.io/" target="_blank">Metamask</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav> 
<?php
if (isset($_SESSION['valid'])){
  $upload_dir = "uploads/".$otp_id."/";
  if (file_exists($upload_dir)) {
?>
    <script>change_form_status();</script>
<?php
  }
?>
    <!-- Page Content -->
    <div class="container">
      <h1 class="my-4">Guidelines</h1>
      <ul>
        <li>Create a new MetaMask Wallet.</li>
        <li>Remember password used and seed phrase. (This will be required on the day of the ballot)</li>
        <li>Copy your wallet address and proceed for User Registration.<br><img src="copy_address.png" style="width: 25%; border: 1px solid gray;"></li>
        <li>Submit 2 recent images of yourself and enter your wallet adress.</li>
      </ul><br>
      <strong style="color: crimson; font-size: 25px;">Registration will close in <div style="display: inline;" id="timer"></div></strong>               

      <h1 class="my-4">User Registration</h1>
      <div style="border: 5px solid lightgrey; border-radius: 15px; background: rgba(255, 255, 255, 0.5);" class="col-lg-8">
        <ol>
          <li>Enter your wallet address here.</li>
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <fieldset id="form_status">
            Enter Wallet Address:
            <input type="text" name="wallet" id="wallet" required>
          <br><br>
          <li>Upload 2 recent images of yourself.</li>
            Select images to upload:<br>
            <img id="img1" alt="image1" width="100" height="100" />
            <img id="img2" alt="image2" width="100" height="100" /><br>
            <input type="file" multiple="multiple" id="files" name="files[]" accept="image/jpg, image/jpeg, image/png" required onchange="document.getElementById('img1').src = window.URL.createObjectURL(files[0]); document.getElementById('img2').src = window.URL.createObjectURL(files[1]); limit2(files);"><br><br>
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
          </fieldset>
          </form>
                          
        </ol>
      </div>  

      <h1 class="my-4">Steps to create a New MetaMask Wallet</h1>
      <ol>
        <li>Install <a href="https://metamask.io/download.html" target="_blank">MetaMask</a> based on your device.</li>
        <li>Get Started.<br><img src="get_started.png"></li>
        <li>Create a Wallet.<br><img src="create_wallet.png"></li>
        <li>Agree to MetaMask terms<br><img src="i_agree.png"></li>
        <!--<li><br><img src=".png"></li>-->                 
      </ol>

    <h1 class="my-4">Requirements for Voting</h1>
    <ul>
      <li>Active internet connection.</li>
      <li>Device with camera.</li>
      <li>Permitted devices: Android, iOS, PC with Chrome.</li>
    </ul>

    

      <hr>
      
       <!-- Call to Action Section -->
      <div class="row mb-2" align="center">
        <div class="col-lg-12">
          <p>VoteBlocks: An E-Voting System Using Blockchain<br>
            <small>Department of Computer Engineering<br>St. Francis Institute of Technology<br>2020-2021</small>
          </p>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><a href="index.html">VoteBlocks</a></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>

  </body>

  </html>
<?php
} else {
    echo 'Session expired.';
    header('Refresh: 2; URL = login.php');
}
?>

