<?php

require('config.php');
/*$servername = "localhost";
$username = "root";
$password = "3INecuador";
$dbname = "characterbasics";
$db = "characterinfo";





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
*/
//echo "Connected successfully";

$name =mysqli_real_escape_string($conn, $_POST['name']);
$class =mysqli_real_escape_string($conn, $_POST['class']);
$race =mysqli_real_escape_string($conn, $_POST['race']);
$background =mysqli_real_escape_string($conn, $_POST['background']);
$alignment =mysqli_real_escape_string($conn, $_POST['alignment']);
$backstory =mysqli_real_escape_string($conn, $_POST['backstory']);



$sql = "INSERT INTO characterinfo (name, race, background, alignment, class, backstory)
VALUES ('$name', '$class', '$race', '$background', '$alignment', '$backstory')";

if(mysqli_query($conn, $sql)){
  header('Location: ../character.php');
    //echo "Records added successfully.";
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$conn->close();

?>
