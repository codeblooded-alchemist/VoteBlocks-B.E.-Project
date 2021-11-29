<?php

session_start();
unset($_SESSION["admin_valid"]);

$success = 1;
$error_message = "";
$conn = mysqli_connect("localhost","root","","voteblocks_admins");

if(!empty($_POST["submit_admin"])) {
   $sql="SELECT * FROM admins WHERE username='" . $_POST["username"] . "'";
   $result = mysqli_query($conn,$sql);

   $result1 = $conn->query($sql);
   if ($result1->num_rows > 0) {
    // output data of each row
       while($row = $result1->fetch_assoc()) {
           $correct_pass =  $row["password"];
           
           if ($_POST["password"] == $correct_pass) {
            $success = 2;
           }
           else {
            $error_message = "Incorrect password.";
            $success =1;
           }
       }
   }
   else {
      $error_message = "Incorrect Username.";
      $success =1;
   }
}

?>

<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="refresh" content="">
      <link rel="icon" href="new_logo.png" type="image/x-icon">
      <title>Admin Log In</title>

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
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="index.html">VoteBlocks</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php">Admin</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                    <a class="dropdown-item" href="https://metamask.io/">Metamask</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <br><br>

      <!-- Page Content -->
      <div align="center" style="border: 5px solid lightgrey; border-radius: 15px; margin: auto;" class="col-lg-4 my-5 py-3">
        <div class="tableheader"><h3>Admin Login</h3></div><br>
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
               <div class="tablerow">
                  Username: <input type="text" name="username" placeholder="Username" required><br><br>
                  Password: <input type="password" name="password" placeholder="Password" required>
               </div><br>
               <div class="tableheader"><input type="submit" name="submit_admin" value="Submit" class="btn btn-primary"></div>
               <?php 
                  } else if ($success == 2) {
                     $_SESSION['admin_valid'] = true;
                 ?>
               <p style="color:#31ab00;">Welcome, You have successfully logged in!</p>
               <!-- <a class="nav-link" href="register.php">Register Here</a> -->
               <?php
                  header('Refresh: 3; URL = admin.php');
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