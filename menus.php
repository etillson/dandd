<?php
session_start();

if($_SESSION['role']=="admin"){
  $_SESSION['nav']="<ul id='menu'>
      <li><a href='index.php'>Home</a></li>
      <li><a href='about.html'>About</a></li>
      <li><a href='customers.html'>Weapons</a></li>
      <li><a href='create_character.php'>Create Character</a></li>
      <li><a href='character.php'>Character</a></li>
      <li><a href='items&abilities.php'>Items & Abilities</a></li>
      <li><a href='../maps.html'>Maps</a></li>
      <li><a href='settings.php'>Settings</a></li>
      <li><a href='logout.php'>Logout</a></li>
      </ul>";
    }
  else{
    $_SESSION['nav']="<ul id='menu'>
        <li><a href='index.php'>Home</a></li>
        <li><a href='about.html'>About</a></li>
        <li><a href='customers.html'>Weapons</a></li>
        <li><a href='create_character.php'>Create Character</a></li>
        <li><a href='character.php'>Character</a></li>
        <li><a href='items&abilities.php'>Items & Abilities</a></li>
        <li><a href='../maps.html'>Maps</a></li>
        <li><a href='logout.php'>Logout</a></li>
        </ul>";
  }

  $settingsMenu="<ul id='subNav'>
                  <a href='spell_create.php'><li>Create Spell</li></a>
                  <a href='weapon_create.php'><li>Create Weapon</li></a>
                  <a href='customers.html'><li>Create Item</li></a>
                  <a href='spell_create.php'><li>Character Images</li></a>
                  <a href='about.html'><li>Map Manager</li></a>
                  <a href='customers.html'><li>Something Else</li></a>
                  </ul>";

  $itemsMenu="<ul id='subNav2'>
                  <a href='weapon-listpage.php'><li>Weapons</li></a>
                  <a href='spell-listpage.php'><li>Spells</li></a>
                  <a href='customers.html'><li>Items</li></a>
                  <a href='spell_create.php'><li>Character Images</li></a>
                  <a href='about.html'><li>Map Manager</li></a>
                  <a href='customers.html'><li>Something Else</li></a>
                  </ul>";




 ?>
