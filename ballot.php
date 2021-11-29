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
    <title>VoteBlocks - Ballot</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheet1.css" rel="stylesheet">

    <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("n_candidates").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("candidate_details");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                var hr = document.createElement("hr");
                hr.style = "height:2px; background-color:lightgrey;";
                container.appendChild(hr);
                container.appendChild(document.createTextNode("Candidate " + (i+1) + ":"));
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createTextNode("Name: "));
                var input = document.createElement("input");
                input.type = "text";
                input.class = "form-control";
                input.name = "candidate_name" + i;
                container.appendChild(input);
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));

                container.appendChild(document.createTextNode("Upload Candidate's Image/Smbol: "));
                container.appendChild(document.createElement("br"));
                var input = document.createElement("input");
                input.type = "file";
                input.name = "candidate_img" + i;
                container.appendChild(input);
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));

            }
        }
    </script>

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
    <div class="container" style="width: 40%; margin: auto;" align="center">
      <form method="post">
          <br><br>
          <div style="border: 5px solid lightgrey; border-radius: 15px; background: rgba(255, 255, 255, 0.5);" class="p-4" align="left">
          <h3>Ballot Details</h3>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Voting start time:</label><br>
                  Date: <input type="date" name="start_date" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Time: <input type="time" name="start_time" required><br><br>
                  <label>Voting ends at:</label><br>
                  Date: <input type="date" name="end_date" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Time: <input type="time" name="end_time" required><br>
                </div>
              </div>

              <div class="control-group form-group">
                <div class="controls">
                  <label>Number of Candidates:</label>
                  <input type="number" min="2" value="2" class="form-control" name="n_candidates" id="n_candidates" required data-validation-required-message="Please enter number of candidates.">
                </div>
              </div>
              <button type="button" class="btn btn-primary" onclick="addFields()">Fill candidate details</button><br><br>
              <div id="candidate_details"></div>
          </div>

          <br><br>
          <div style="border: 5px solid lightgrey; border-radius: 15px; background: rgba(255, 255, 255, 0.5);" class="p-4" align="left">
          <h3>Particpants List</h3>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Upload list containg email addresses of all eligible participants (.xlsx):</label><br>
                  <input type="file" name="voters_list" accept=".csv, .xls, .xlsx" required>
                </div>
              </div>
          </div>

          <br><br>
          <div style="border: 5px solid lightgrey; border-radius: 15px; background: rgba(255, 255, 255, 0.5);" class="p-4" align="left">
          <h3>Personal Contact Details</h3>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Full Name:</label>
                  <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block"></p>
                </div>
              </div>

              <div class="control-group form-group">
                <div class="controls">
                  <label>Phone Number:</label>
                  <input type="tel" class="form-control" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
                </div>
              </div>

              <div class="control-group form-group">
                <div class="controls">
                  <label>Email Address:</label>
                  <input type="email" name="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                </div>
              </div>
          </div>

          <br>
          <button type="submit" class="btn btn-primary" id="submit_ballot">Submit</button>
      </form>

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
$all_candidates="";
require_once("mail_ballot.php");

for ($i=0;$i<$_POST["n_candidates"];$i++){
  $candidatex=$_POST["candidate_name"+$i];
  $all_candidates.=$candidatex;
  }
$mail_status = sendBallot($_POST["start_date"], $_POST["start_time"], $_POST["end_date"], $_POST["end_time"], $_POST["n_candidates"], $_POST["candidate_name0"], $_POST["candidate_name1"], $_POST["name"], $_POST["phone"], $_POST["email"]);

} else {
	echo "Session expired.";
	header('Refresh: 2; URL = admin_login.php');
}
?>

