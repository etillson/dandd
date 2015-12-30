<?php
session_start();
$servername = "localhost";
$uname = "root";
$pass = "3INecuador";
$dbname = "characterbasics";


// Create connection
$conn = new mysqli($servername, $uname, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
