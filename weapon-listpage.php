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
       <tr><th ng-repeat="z in titles(weapons[0])">{{z}}</th></tr>
       <tr ng-repeat="y in weapons | filter:query track by $index">
         <td ng-model="content" ng-repeat="x in titles(weapons[0])">
         <img ng-if="containsImg(y[x])" class="tableIcon" ng-src="{{iconModifier(y[x], '../img/icons/')}}"><span ng-if="!containsImg(y[x])">{{y[x]}}</span></td>
       </tr>
     </table>
   </div>

   </div>


  <?php include('footer.html'); ?>
