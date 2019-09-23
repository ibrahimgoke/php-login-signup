<?php
session_start();
if (isset($_SESSION['username'])) {
        header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PHP Login - Sign Up</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet" href="./assets/css/style.css">
  
</head>
<body>
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">
      <form class="sign-in-htm" action="check_login.php" method="post">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" required name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" required name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" name="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
      </form>
      <form class="sign-up-htm" action="register.php" method="POST">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" required name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="user" class="label">Email Address</label>
          <input id="email" required name="email" type="email" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" required name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" name="submit" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </form>
    </div>
  </div>
</div>
  
  
</body>
</html>