<?php  
include ("config/database.php");
	if(isset($_POST["submit"]))
	{	
 		$username = trim(mysqli_real_escape_string($con, $_POST['username']));
		$password = trim(mysqli_real_escape_string($con, $_POST['password']));
		 
		$sql = "SELECT * FROM users where username='$username' ";
		$result = mysqli_query($con, $sql);
		// mysqli_num_row is counting table row
		$count = mysqli_num_rows($result);

// If user already exist
if($count>=1) {
					echo "<script type=\"text/javascript\">
						alert(\"User already exist .\");
						window.location = \"index.html\"
					</script>";
}else{
$result="INSERT INTO users (username,password) VALUES ('$username',md5('$password'))";
   if(mysqli_query($con, $result)) {

      echo "<script type=\"text/javascript\">
						alert(\"Registration Successful.\");
						window.location = \"index.html\"
					</script>";
} else {
	echo "<script type=\"text/javascript\">
						alert(\"Error in Registration .\");
						window.location = \"index.html\"
					</script>";
  }
	}
}
	   
?>