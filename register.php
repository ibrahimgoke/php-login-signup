<?php  
require('PHPMailer/PHPMailerAutoload.php'); 
include ("config/database.php");
	if(isset($_POST["submit"]))
	{	
		 $username = trim(mysqli_real_escape_string($con, $_POST['username']));
		 $email = trim(mysqli_real_escape_string($con, $_POST['email']));
		 $password = trim(mysqli_real_escape_string($con, $_POST['password']));
		 
		$sql = "SELECT * FROM users where username='$username' ";
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
	$mail = new PHPMailer();
	$mail->isSMTP();  									// Set mailer to use SMTP
	//$mail->SMTPDebug = 2;                                   
	$mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'olagokeibrahim165@gmail';                 		// SMTP username
	$mail->Password = 'wearethebest_MAN100';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('olagokeibrahim165@gmail.com', 'info');
	$mail->addAddress($email, $username);     // Add a recipient
	
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');     // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	
	
	$mail->isHTML(true);

	$mail->Subject = 'Register confirmation';
	$mail->Body    = $output;
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
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