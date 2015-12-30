<?php
session_start();
require('config.php');

function setRole($user, $conn){
  $query = mysqli_query($conn, "SELECT * FROM users WHERE uname = '$user'");
  $rows = mysqli_num_rows($query);
  if($rows == 1){
    $result = mysqli_fetch_assoc($query);
    return $result['role'];

  }
}


 ?>
