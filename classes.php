<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('config.php');

$result = $conn->query("SELECT classId, class, description, hitdie, primaryability, savingthrow, armorandweapon FROM classes");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"ClassID":"'           .  $rs["classId"] . '", ';
  $outp .= '"Class":"'             .  $rs["class"]. '",';
  $outp .= '"Description":"'       .  $rs["description"]. '",';
  $outp .= '"Hit Die":"'           .  $rs["hitdie"]. '",';
  $outp .= '"Primary Ability":"'   .  $rs["primaryability"]. '",';
  $outp .= '"Saving Throw":"'      .  $rs["savingthrow"]. '",';
  $outp .= '"Armor and Weapons":"' .  $rs["armorandweapon"]. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

 ?>
