<?php
session_start();
include ("config/database.php");
if(isset($_POST["submit"])) {

// username and password sent from form
$myusername = $_REQUEST['username'];
$mypassword = $_REQUEST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$myusername = mysqli_real_escape_string($con, $myusername);
$mypassword = mysqli_real_escape_string($con, $mypassword);

$sql = "SELECT * FROM users WHERE username='$myusername' and password=md5('$mypassword') or password='$mypassword'";
$result = mysqli_query($con, $sql);
// mysqli_num_row is counting table row
$count = mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
	$row = mysqli_fetch_row($result);
	$_SESSION['username'] = $row[1];
	// $_SESSION['username'] = $myusername;
// Register $myusername, $mypassword and redirect to appropiate file
                    echo "<script type=\"text/javascript\">
						alert(\"Login Successful\");
						window.location = \"dashboard.php\"
					</script>";
    }else{
    echo "<script type=\"text/javascript\">
						alert(\"Wrong Username and Password\");
						window.location = \"index.php\"
					</script>";
}
}
?>