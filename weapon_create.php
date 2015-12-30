<?php
include('config.php');
include('pageLayout.php');
include('validation.php');
include('menus.php');

$formErr = '';

if(ISSET($_POST['submit'])){

  $name = $_POST['name'];
  $cost = $_POST['cost'];
  $damage = $_POST['damage'];
  $weight = $_POST['weight'];
  $properties = $_POST['properties'];
  $rangeweapon = $_POST['rangeweapon'];
  $distance = $_POST['distance'];
  $versatile = $_POST['versatile'];
  $icon = $_POST['iconSet'];


  $sql = "INSERT INTO weapons (name, cost, damage, weight, properties, rangeweapon, distance, versatile, icon)
          VALUES ('$name', '$cost', '$damage', '$weight', '$properties', '$rangeweapon', '$distance', '$versatile', '$icon')";

  if(mysqli_query($conn, $sql)){
    $message = "Weapon was successfully added";
  }
  else {
    $formErr = "Weapon was not added";
  }
}
?>

<?php include('header.html'); ?>

        <body>
        <div id="main">

          <?php
          echo $_SESSION['nav'];
          ?>

<div ng-app="myApp" ng-controller="spellsCtrl">

        <div id="inputarea">
        <?php
        echo $settingsMenu;
        ?>
          <div id="signSettings" class="signAngle"><div class="signtext">Create Weapon<img id="signicon" src="../crossedswords.png"></div></div>


        <div class="register">



        <h3><i class="fa fa-pencil-square-o"></i> Create a weapon</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        Weapon Name: <input type="text" name="name"><br>
        Cost: <input type="text" name="cost"><br>
        Damage: <input type="text" name="damage"><br>
        Weight: <input type="text" name="weight"><br>
        Properties: <input type="text" name="properties"><br>
        Range: <input type="text" name="rangeweapon"><br>
        Distance: <input type="text" name="distance"><br>
        Versatile: <input type="textarea" name="versatile"><br>
        Icon: <select ng-model="icon" ng-options="x for x in icons" class="createPage" name="iconSet" ng-value={{icon}}></select><br>
        <input type="submit" value="Submit Weapon" name="submit">


        </form>

        <div class="hidden"><div id="alert" style="margin-top:0px;" class="errorMessage"><?php echo $formErr ?></div>
        <div id="alert" style="margin-top:0px;" class="successMessage"><?php echo $message ?></div></div>
        <div id="signSettings" style="float:left;" ng-if="icon != null" ng-cloak> <img src="../img/icons/{{icon}}"  style="height:100px"></div>

      </div>
  </div>





<?php include('footer.html'); ?>
