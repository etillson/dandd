<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('config.php');

$result = $conn->query("SELECT name, class, level, castingtime, spellrange, components, duration, description FROM spells");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"Name":"'         .  $rs["name"] . '",';
  $outp .= '"Class":"'         .  $rs["class"]. '",';
  $outp .= '"Level":"'         .  $rs["level"]. '",';
  $outp .= '"Casting Time":"'  .  $rs["castingtime"]. '",';
  $outp .= '"Spell Range":"'   .  $rs["spellrange"]. '",';
  $outp .= '"Components":"'    .  $rs["components"]. '",';
  $outp .= '"Duration":"'      .  $rs["duration"]. '",';
  $outp .= '"Description":"'   .  $rs["description"]. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

 ?>
