<?php
session_start();
include('config.php');
include('menus.php');
include('session.php');

 ?>

 <?php include('header.html');?>

 <body>
   <div id="main">

   <?php
   echo $_SESSION['nav'];
   ?>
   <div ng-controller="spellsCtrl">
     <div class="listsearch">
     Search: <input class="listsearch" ng-model="query">
     <?php
     echo $itemsMenu;
     ?>
   </div>
      <div class="listpage">
     <table class="listpage">
       <tr><th ng-repeat="x in titles(spells[0])">{{x}}</th></tr>
       <tr ng-repeat="y in spells | filter:query track by $index"><td ng-repeat="x in titles(spells[0])">{{y[x]}}</td>
       </tr>
     </table>
   </div>

   </div>


  <?php include('footer.html'); ?>
