<?php

$header = <<<EOT
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link href="../site.css" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../jqscript.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

</head>

EOT;

$footer = <<<EOT
<footer id="foot01"></footer>

</div>
<script src="../dandd.js"></script>
<script src="../controllers.js"></script>
<script src="../script.js"></script>
</body>
</html>

EOT;

if($_SESSION['role']=="admin"){
  $nav  = '<nav id="nav02"></nav>';
}
else
  $nav = '<nav id="nav01"></nav>';

?>
