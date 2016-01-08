<?php
include('login.php');
include('pageLayout.php');
if(isset($_SESSION['login_user'])){
	header("location: character.php");
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	$servername = "localhost";
	$uname = "root";
	$pass = "3INecuador";
	$dbname = "characterbasics";


	// Create connection
	$conn = new mysqli($servername, $uname, $pass, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$error=''; //variable to store error messages
	if (isset($_POST['submit'])){
	if (empty($_POST['username']) || empty($_POST['password']))
	{
		//header("location: index.php");
	  $error = "You must enter both a username and password";
	}
	else
	{
		//Define username and password
		$username=$_POST['username'];
		$password=$_POST['password'];

		$username = stripslashes($username);
		$password = stripslashes($password);

		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
	//	$db = mysqli_select_db($conn, "users");

		$password = md5($password);
		$query = mysqli_query($conn, "SELECT * FROM users WHERE pass='$password' AND uname='$username'");
		$rows = mysqli_num_rows($query);
		if($rows == 1){
			$_SESSION['login_user']=$username;
			header("location: character.php");
		}else{
	    header("location: index.php");
	    $message = "<span>Username and/or Password incorrect. Try again. </span>";
			//$error = "Username or Password is invalid";
		}
		mysqli_close($conn);
	}

	/*if($error!=''){
	$message = "Username and/or Password incorrect.\\nTry again.";
	//echo "<script type='text/javascript'>alert('$message');</script>";
	//header("location:../index.php");
	}

	}

}
*/
}


$body = <<<EOT
<body>
<div id="main">
	<div class="swingSpective" id="firstStop">
	<div id="sign"><div class="signtext">Login Thyself<img id="signicon" src="../crossedswords.png"></div></div>
</div>
<div id="inputarea">
	<form action="{$_SERVER['PHP_SELF']}" method="POST">
		<div class="cred">Username: <input type="text" name="username" class="style1"></div>
		<div class="cred">Password: <input type="password" name="password" class="style1"></div>
<input type="submit" name="submit" value="Login"> <br><div id="notification"></div>
&nbsp<a href="register.php">Register</a> &nbsp<a href="forgot_password.php">Forgot your login?</a>
</form>
<div class="hidden"><div style="margin-top:0px;" class="errorMessage">{$error}</div></div>
<div class="hidden"><div style="margin-top:0px;" class="errorMessage">{$message}</div></div>
</div>
<script src="../foundation/js/foundation/foundation.joyride.js"></script>
<script src="../foundation/js/foundation/foundation.js"></script>
<script src="../foundation/js/vendor/jquery.js"></script>
<script>
  $(document).foundation();
</script>
$(document).foundation('joyride', 'start');
EOT;

echo $header;
echo $body;

echo $footer;
?>
