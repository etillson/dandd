<?php
session_start();
include('config.php');
/*
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

*/
$error=''; //variable to store error messages
if (isset($_POST['submit'])){
if (empty($_POST['username']) || empty($_POST['password']))
{
	//header("location: poo.php");
  $error = "Thou sir name or encantation of entry escapeth thee?";
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
    $_SESSION['timestamp'] = time();
		header("location: character.php");
	}else{
    //header("location: index.php");
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
*/
}

?>
