<?php
session_start();
require('config.php');
require('roles.php');


$user_check=$_SESSION['login_user'];

/*
$ses_sql = mysqli_query($conn, "SELECT uname FROM users WHERE uname='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['uname'];
*/
if(time() - $_SESSION['timestamp'] > 600){
  unset($_SESSION['uname'], $_SESSION['pass'], $_SESSION['timestamp'],  $_SESSION['login_user']);

} else {
  $_SESSION['timestamp'] = time();

}

if(!isset($_SESSION['login_user'])){

  mysqli_close($conn);
  header('Location: index.php');
  exit;
}
else {
  $_SESSION['role'] = setRole($_SESSION['login_user'], $conn);
}

?>
