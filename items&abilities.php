<?php
session_start();
include('menus.php');

?>

 <?php include('header.html'); ?>
 <div id="main">

 <?php
 echo $_SESSION['nav'];
 ?>

 <div id="inputarea">
   <?php
   echo $itemsMenu;
   ?>
 <div class="register">


 </div>
 </div>
 <?php include('footer.html'); ?>
