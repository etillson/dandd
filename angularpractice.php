<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('config.php');

$result = $conn->query("SELECT name, lname, uname, email FROM users");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"First Name":"' .  $rs["name"] . '", ';
  $outp .= '"Last Name":"'   .  $rs["lname"]. '",';
  $outp .= '"Username":"'    .  $rs["uname"]. '",';
  $outp .= '"Email":"'       .  $rs["email"]. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

 ?>
