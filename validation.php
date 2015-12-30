<?php

$formPasses = true;

function inputLength ($var, $length){
  $stringLength = strlen($var);
  if($stringLength > $length){
    return true;
  }
  else{
    global $formPasses;
    $formPasses = false;
  }

}

function inputValid ($var){
  if($var == ''){
    global $formPasses;
    $formPasses = false;

    return false;
  }
  else {

    return true;
  }
}

function email ($var){
  $pos = strpos($var, '@');
  $pos2 = strpos($var, '.');
  if($pos !== false && $pos2 !== false){
    return true;
  }
  else{
    global $formPasses;
    $formPasses = false;
    return false;
  }

}

function userNameTaken($uname, $conn){
  $query = mysqli_query($conn, "SELECT * FROM users WHERE uname='$uname'");
  $rows = mysqli_num_rows($query);
  if($rows == 1){
    $uname = $username;
    global $formPasses;
    $formPasses = false;
    return true;
  }
  else {
    return false;
  }
}

?>
