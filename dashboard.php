<?php
session_start();
ob_start();
error_reporting(0);
$username = $_SESSION['username'];

// Check for more than one session
// if (!isset($_SESSION['email']) and $_SESSION['role'] != 'super_admin' and $_SESSION['status'] != 'active' ){
//     header("location: index?msg=Please login to access the dashboard");
// }

if (!isset($_SESSION['username'])) { // if session variable "username" does not exist.
    // Use javascript Alert to display the message
              echo "<script type=\"text/javascript\">
						alert(\"Please login to access the dashboard.\");
						window.location = \"index.php\"
                    </script>";
        // Use header location Alert to display the message
    // header("location: index.php?msg=Please login to access the dashboard"); // Re-direct to index page
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PHP | Dashboad</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet" href="./assets/css/style.css">
  
</head>
<body>
  <div class="login-wrap">
  <div class="login-html">
      <h5>Welcome <b><?php echo $username ?></b></h5>
    <a href="logout.php">Logout</a>
    <div class="login-form">

    </div>
  </div>
</div>
  
  
</body>
</html>