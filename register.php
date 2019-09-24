<?php  
require('PHPMailer/PHPMailerAutoload.php'); 
require('crediantial.php');
include ("config/database.php");
	if(isset($_POST["submit"]))
	{	
		 $username = trim(mysqli_real_escape_string($con, $_POST['username']));
		 $email = trim(mysqli_real_escape_string($con, $_POST['email']));
		 $password = trim(mysqli_real_escape_string($con, $_POST['password']));
		 
		$sql = "SELECT * FROM users where username='$username' or email='$email' ";
		$result = mysqli_query($con, $sql);
		
		// mysqli_num_row is counting table row
		$count = mysqli_num_rows($result);

// If user already exist
if($count>=1) {
					echo "<script type=\"text/javascript\">
						alert(\"User already exist .\");
						window.location = \"index.php\"
					</script>";
}else{
$result="INSERT INTO users (username,email,password) VALUES ('$username','$email',md5('$password'))";
   if(mysqli_query($con, $result)) {
	$output = '<div>Thanks for registering with us.</div>';
	$mail = new PHPMailer;
	$mail->isSMTP();
	// $mail->SMTPDebug = 2;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = true;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = EMAIL;
	$mail->Password = PASS;
	$mail->setFrom('example@gmail.com');
	$mail->addAddress($email, $username);
	$mail->Subject = 'Hello from PHPMailer!';
	$mail->isHTML(true);
	$mail->Body = $output;

	//send the message, check for errors
	if (!$mail->send()) {
		echo "<script type=\"text/javascript\">
						alert(\"Message not sent.\");
						window.location = \"index.php\"
					</script>";

		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
      echo "<script type=\"text/javascript\">
						alert(\"Registration Successful.\");
						window.location = \"index.php\"
					</script>";
} else {
	echo "<script type=\"text/javascript\">
						alert(\"Error in Registration .\");
						window.location = \"index.php\"
					</script>";
  }
	}
}
	   
?>