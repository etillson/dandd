<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('config.php');

$result = $conn->query("SELECT name, cost, damage, weight, properties, rangeweapon, distance, versatile, icon FROM weapons");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"Name":"'         .  $rs["name"] . '",';
  $outp .= '"Cost":"'          .  $rs["cost"]. '",';
  $outp .= '"Damage":"'        .  $rs["damage"]. '",';
  $outp .= '"Weight":"'        .  $rs["weight"]. '",';
  $outp .= '"Properties":"'    .  $rs["properties"]. '",';
  $outp .= '"Range":"'         .  $rs["rangeweapon"]. '",';
  $outp .= '"Distance":"'      .  $rs["distance"]. '",';
  $outp .= '"Versatile":"'     .  $rs["versatile"]. '",';
  $outp .= '"Icon":"'          .  $rs["icon"]. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

 ?>
