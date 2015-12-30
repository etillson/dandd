<?php
include ('config.php');
include ('pageLayout.php');
include ('validation.php');
include ('randoms.php');

if(isset($_POST['submit'])){

  $email_check = $_POST['email_check'];

  if(!email($email_check)){
    $error = 'You must enter a valid email address';
  }
  else{
    $message = 'Please check your email for your temporary password';
  }

  if($formPasses){
    	$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email_check'");
      $res = mysqli_fetch_assoc($query);
      $user = $res['uname'];
      $rows = mysqli_num_rows($query);
      if($rows >= 1){
        $tempPass = generateRandomString('8');
        $hashTempPass = md5($tempPass);

        $sql = "UPDATE users SET passResetKey = '$hashTempPass' WHERE email = '$email_check'";

        //send email to the user containing the reset Code
        $to=$email_check;
        $subject="Forget Password";
        $from = 'erictillson@yahoo.com';
        $body='Hi, <br/> <br/>Your reset code is '.$tempPass.'';
        $headers = "From: " . strip_tags($from) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to,$subject,$body,$headers);

        if(mysqli_query($conn, $sql)){
          $message = 'A temporary password has been sent to your email address';
          header('refresh:5;url=tempkey.php');
        }
        else{
          $formErr = 'There was a problem, please try again';
        }

      }
  }


}

$body = <<<EOT
<body>
<div id="main">
	<div class="swingSpective">
	<div id="sign"><div class="signtext">Forgot Thy Oath<img id="signicon" src="../crossedswords.png"></div></div>
</div>
<div id="inputarea">
	<form action="{$_SERVER['PHP_SELF']}" method="post">
		<div class="cred">Enter Your Email: <input type="text" name="email_check" class="style1"></div>
<input type="submit" name="submit" value="Submit"> <br><div id="notification"></div>
&nbsp<a href="index.php">Login</a> &nbsp<a href="register.php">Register</a>
</form>
<div class="hidden"><div style="margin-top:0px;" class="errorMessage">{$error}</div></div>
<div class="hidden"><div style="margin-top:0px;font-size:16pt;" class="successMessage">{$message}</div></div>
</div>

EOT;

echo $header;
echo $body;
echo $footer;




?>
