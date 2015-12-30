<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link href="../site.css" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../jqscript.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>


</head>
<body>
<div ng-app="myApp" ng-controller="usersCtrl">

<table>
  <tr ng-repeat="x in names">
    <td>{{ x['First Name'] }}</td>
    <td>{{ x['Last Name'] }}</td>
    <td>{{ x.Email }}</td>
  </tr>
</table>

<select>
  <option ng-repeat="x in names">
    {{x.Username}}
  </option>
</select>

</div>

<h1> WTF</h1>
<script src="controllers.js"></script>
</body>
</html>
