<?php

require('config.php');
require('pageLayout.php');
require('validation.php');


if(isset($_POST['submit'])){

  //peform the verificaiton of the form
  $formErr = '';
  $email1 = $_POST['email1'];
  $email2 = $_POST['email2'];

  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];

  if($email1 == $email2){
    if($pass1 == $pass2){

      $name =mysqli_real_escape_string($conn, $_POST['name']);
        if(!inputValid($name)){
          $formErr = 'You must enter a first name.';
        }
      $lname =mysqli_real_escape_string($conn, $_POST['lname']);
        if(!inputValid($lname)){
          $formErr = 'You must enter a last name.';
        }
      $uname =mysqli_real_escape_string($conn, $_POST['uname']);
        if(!inputValid($uname)){
          $formErr = 'You must enter a username.';
        }
        if(userNameTaken($uname, $conn)){
          $formErr = 'The username you entered is not available';
        }
        if(!inputLength($uname, '5')){
          $formErr = 'Your username needs to be at least 6 characters';
        }
      $email1 =mysqli_real_escape_string($conn, $_POST['email1']);
        if(!inputValid($email1)){
          $formErr = 'You must enter an email address.';
        }
        if(!email($email1)){
          $formErr = 'You must enter a valid email address';
        }
      $email2 =mysqli_real_escape_string($conn, $_POST['email2']);
        if(!inputValid($email2)){
          $formErr = 'You must enter a confirmation email.';
        }
        if(!email($email1)){
          $formErr = 'You must enter a valid email address';
        }
      $pass1 =mysqli_real_escape_string($conn, $_POST['pass1']);
        if(!inputValid($pass1)){
          $formErr = 'You must enter a password.';
        }
      $pass2 =mysqli_real_escape_string($conn, $_POST['pass2']);
        if(!inputValid($pass2)){
          $formErr = 'You must enter a confirmation password.';
        }

      $pass1 = md5($pass1);

      if($formPasses){
        $sql = "INSERT INTO users (id, name, lname, uname, email, pass)
        VALUES (NULL, '$name', '$lname', '$uname', '$email1', '$pass1')";

        if(mysqli_query($conn, $sql)){
          $message = 'Account added successfully';


        } else{

          $formErr = 'Record not added. Database connection error.';

        }
      }

    }
    else{

      $formErr = "Sorry, your passwords don't match.";

    }
  }else{

    $formErr = "Sorry, your email's don't match.<br>";

    //echo "Sorry, your email's don't match.<br>";
  }

}



$body = <<<EOT
<body>
<div id="main">
<div id="sign"><div class="signtext">Register Thyself<img id="signicon" src="../crossedswords.png"></div></div>

<div id="inputarea">
<div class="register">

<h3><i class="fa fa-pencil-square-o"></i> Register A New Account</h3>
<form action="{$_SERVER['PHP_SELF']}" method="POST">
First Name: <input type="text" name="name"><br>
Last Name: <input type="text" name="lname"><br>
Username: <input type="text" name="uname"><br>
Email: <input type="text" name="email1"><br>
Confirm Email: <input type="text" name="email2"><br>
Password: <input type="password" name="pass1"><br>
Confirm Password: <input type="password" name="pass2"><br>
<input type="submit" value="Register" name="submit">
<br><a href="index.php">Login</a>

</form>

<div class="hidden"><div id="alert" style="margin-top:0px;" class="errorMessage">{$formErr}</div>
<div id="alert" style="margin-top:0px;" class="successMessage">{$message}</div></div>
</div>
</div>
EOT;



echo $header;
echo $body;

echo $footer;


?>
