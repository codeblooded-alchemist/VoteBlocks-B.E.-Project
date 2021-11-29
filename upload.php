<html lang="en">
    <head>
        <link rel="icon" href="new_logo.png" type="image/x-icon">
        <title>Upload Status</title>
    </head>
</html>
<?php
session_start();
echo "";
// Check if form was submited
if(isset($_POST['submit'])) {


    $myfile = fopen("wallets.txt", "a") or die("Unable to open file!");
    $address = $_POST['wallet']."\n";
    fwrite($myfile, $address);
    fclose($myfile);

    // Configure upload directory and allowed file types
    $otp_id= $_SESSION['voter_id'];
    $upload_dir = "uploads/".$otp_id."/";
    if(!is_dir("uploads/". $otp_id ."/")) {
        mkdir("uploads/". $otp_id ."/");
    }
    $allowed_types = array('jpg', 'png', 'jpeg');
    
    // Define maxsize for files i.e 2MB
    $maxsize = 2 * 1024 * 1024;

    // Checks if user sent an empty form
    if(!empty(array_filter($_FILES['files']['name']))) {

        // Loop through each file in files[] array
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            
            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            // Set upload file path
            $filepath = $upload_dir.$file_name;

            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {

                // Verify file size - 2MB max
                if ($file_size > $maxsize)      
                    echo "Error: File size is larger than the allowed limit.";

                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                if(file_exists($filepath)) {
                    $filepath = $upload_dir.time().$file_name;
                    
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                    }
                    else {                  
                        echo "Error uploading {$file_name} <br />";
                    }
                }
                else {
                
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                    }
                    else {                  
                        echo "Error uploading {$file_name} <br />";
                    }
                }
            }
            else {
                
                // If file extention not valid
                echo "Error uploading {$file_name} ";
                echo "({$file_ext} file type is not allowed)<br / >";
            }
        }
    }
    else {
        
        // If no files selected
        echo "No files selected.";
    }
}
header('Refresh: 2; URL = register.php');
?>
