<?php
//session_start();
require('pageLayout.php');

?>

<?php include ('pageLayout.php'); echo $header; ?>

  <body ng-app="dandd" ng-controller="driversController">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
    <div id="main">
    <table>
      <thead>
        <tr><th colspan="4">Drivers Championship Standings</th></tr>
      </thead>
      <tbody>
        <tr ng-repeat="driver in driversList">
          <td>{{$index + 1}}</td>
          <td>
            <img src="img/flags/{{driver.Driver.nationality}}.png" />
            {{driver.Driver.givenName}}&nbsp;{{driver.Driver.familyName}}
          </td>
          <td>{{driver.Constructors[0].name}}</td>
          <td>{{driver.points}}</td>
        </tr>
      </tbody>
    </table>
  <?php include ('pageLayout.php'); echo $footer; ?>
