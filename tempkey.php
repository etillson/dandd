<?php
include ('config.php');
include ('pageLayout.php');
include ('validation.php');

if(isset($_POST['submit'])){
  if(empty($_POST['resetcode'])){
    $error = "Thou hath entered nothing";
  }
  $key = $_POST['resetcode'];
  $query = mysqli_query($conn, "SELECT * FROM users WHERE passResetKey='$key'");
  $res = mysqli_fetch_assoc($query);
  $user = $res['uname'];
  $rows = mysqli_num_rows($query);
  if($rows == 1){

    echo 'it worked';
  }


}

$body = <<<EOT
<body>
<div id="main">
	<div class="swingSpective">
	<div id="sign"><div class="signtext">Reset Code<img id="signicon" src="../crossedswords.png"></div></div>
</div>
<div id="inputarea">
	<form action="{$_SERVER['PHP_SELF']}" method="post">
		<div class="cred">Enter Temporary Code: <input type="text" name="resetcode" class="style1"></div>
<input type="submit" name="submit" value="Submit"> <br><div id="notification"></div>
&nbsp<a href="index.php">Take me back to login</a>
</form>
<div class="hidden"><div style="margin-top:0px;" class="errorMessage">{$error}</div></div>
<div class="hidden"><div style="margin-top:0px;font-size:16pt;" class="successMessage">{$message}</div></div>
</div>

EOT;

echo $header;
echo $body;
echo $footer;

?>
