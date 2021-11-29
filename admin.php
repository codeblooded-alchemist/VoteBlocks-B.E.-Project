<?php
session_set_cookie_params(0);
session_start();

//$_SESSION['admin_valid'] = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="refresh" content="">
  <link rel="icon" href="new_logo.png" type="image/x-icon">
  <title>VoteBlocks - Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="stylesheet1.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">VoteBlocks</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin_logout.php">Log Out</a>
            </li>
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
<?php
if (isset($_SESSION['admin_valid'])){
?>

  

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Admin</li>
    </ol>
    <br><br><br>    

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-6 mb-3" align="center">
        <div class="card h-100">
          <h4 class="card-header">Submit Ballot Details</h4>
          <div class="card-body">
            <p class="card-text">Submit the required details for your ballot here.</p>
          </div>
          <div class="card-footer">
            <a href="ballot.php" class="btn btn-primary" target="_blank">Fill Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-3" align="center">
        <div class="card h-100">
          <h4 class="card-header">Ballot Results</h4>
          <div class="card-body">
            <p class="card-text">Results will be available once voting ends.</p>
          </div>
          <div class="card-footer">
            <a href="https://voteblocks.tk/result/" class="btn btn-primary" target="_blank">View Results</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <br><br><hr>
    
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
	echo "Session expired.";
	header('Refresh: 2; URL = admin_login.php');
}
?>
