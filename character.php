<?php
session_start();
include('session.php');
include('pageLayout.php');

$db = "characterinfo";

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

$currentuser = $_SESSION['login_user'];

$sql ="SELECT * FROM $db WHERE username = '$currentuser'";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
$char_name = $res['name'];
$backstory = $res['backstory'];
?>
<?php echo $header; ?>
<body>
<div id="main">
  <?php
  echo $_SESSION['nav'];
  ?>
<div id="scrollcontain">
<div id="topscroll"></div>
<div id="midscroll"><h2 id="name"><?php echo $char_name;?></h2><p id="descript">
  <img id="charimage" src="../img/characters/Ranger.png"><?php echo $res['backstory'];?>
<i class="fa fa-camera-retro"></i>

</p>
</div>
<div id="bottomscroll"></div>
<div id="shadowscroll"></div>
</div>
</form>




<?php
echo $footer;
?>
