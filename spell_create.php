<?php
include('config.php');
include('pageLayout.php');
include('validation.php');
include('menus.php');

$formErr = '';

if(ISSET($_POST['submit'])){

  $name = $_POST['name'];
  $class = $_POST['class'];
  $level = $_POST['level'];
  $castingtime = $_POST['castingtime'];
  $range = $_POST['range'];
  $components = $_POST['components'];
  $duration = $_POST['duration'];
  $description = $_POST['description'];

  $sql = "INSERT INTO spells (name, class, level, castingtime, spellrange, components, duration, description)
          VALUES ('$name', '$class', '$level', '$castingtime', '$range', '$components', '$duration', '$description')";

  if(mysqli_query($conn, $sql)){
    $message = "Spell was successfully added";
  }
  else {
    $formErr = "Error spell was not added";
  }
}
?>
<?php echo $header; ?>

        <body>
        <div id="main">
          <?php
          echo $_SESSION['nav'];
          ?>

        <div id="inputarea">
        <?php
        echo $settingsMenu;
        ?>
          <div id="signSettings" class="signAngle"><div class="signtext">Create Spell<img id="signicon" src="../crossedswords.png"></div></div>
        <div class="register">


        <h3><i class="fa fa-pencil-square-o"></i> Create a new spell</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        Spell Name: <input type="text" name="name"><br>
        Class: <input type="text" name="class"><br>
        Spell Level: <input type="text" name="level"><br>
        Casting Time: <input type="text" name="castingtime"><br>
        Range: <input type="text" name="range"><br>
        Components: <input type="text" name="components"><br>
        Duration: <input type="text" name="duration"><br>
        Description: <input type="textarea" name="description"><br>
        <input type="submit" value="Submit Spell" name="submit">


        </form>

        <div class="hidden"><div id="alert" style="margin-top:0px;" class="errorMessage"><?php echo $formErr ?></div>
        <div id="alert" style="margin-top:0px;" class="successMessage"><?php echo $message ?></div></div>
        </div>
        </div>






<?php echo $footer; ?>
