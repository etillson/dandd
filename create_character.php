<?php
session_start();
include('session.php');
include('pageLayout.php');
include('config.php');
include('menus.php');

 ?>
<?php include('header.html'); ?>

<body>


<div id="main">

<div my-dom-directive>Click Me!</div>
<?php
echo $_SESSION['nav'];
?>

<div ng-controller="spellsCtrl">

<div id="inputarea">
<div class="register">
<div style="height:40px;"><div id="trap"></div></div>

<img src="../title.png" style="height:150px; float:left; margin-top:-50px;">
<div id="drag">
Name: <input type='text' name='charname'><br>
</div>
Class: <select ng-model="selectedClass" ng-options="class.Class for class in charClasses">
            <option value="">--Select A Class--</option>
       </select>
Race: <select>
            <option value="Dwarf">Dwarf</option>
            <option value="Elf">Elf</option>
            <option value="Human">Human</option>
       </select>
       <br>
Alignment: <select>
            <option value="Lawful Good">Lawful Good</option>
            <option value="Neutral Good">Neutral Good</option>
            <option value="Chaotic Good">Chaotic Good</option>
       </select>
Level: <input type="number" ng-model="level" ng-init="level=0" style="width:50px; text-align:center;">


</div>

<div id="stats">

<table id="centerstats" style="float:right;">
<tr><td>
<table id="ait">
<tr><td>
  <table id="stat">
    <tr><td><input type="text" name="intelligencesub" id="absub"></td></tr>
    <tr><th>ARMOR CLASS</th></tr>
  </table>
  </td><td>
  <table id="stat">
    <tr><td><input type="text" name="intelligencesub" id="absub"></td></tr>
    <tr><th>INITIATIVE</th></tr>
  </table>
  </td><td>
  <table id="stat">
    <tr><td><input type="text" name="intelligencesub" id="absub"></td></tr>
    <tr><th>SPEED</th></tr>
  </table></td></tr>

      <tr id="hp"><td>Hit Points<br><small>Max HP 30</small></td><td><button onClick="lifeUp()"><i class="fa fa-chevron-circle-up"></i></button>
      <button onClick="lifeDown()"><i class="fa fa-chevron-circle-down"></i></button></td><td>
      <span id="life">10</span> <i class="fa fa-heart" style="color:#842F2F;"></i></td></tr>
      <tr id="hp"><td>Temporary Hit Points</td><td><button onClick="lifeUp()"><i class="fa fa-chevron-circle-up"></i></button>
      <button onClick="lifeDown()"><i class="fa fa-chevron-circle-down"></i></button></td><td>
      <span id="templife">10</span> <i class="fa fa-heart" style="color:#842F2F;"></i></td></tr>

</table>
</td></tr>
<tr><td>
<table id="spells"><tr>
<td>
<strong>Your Class:</strong> {{selectedClass.Class}}</br>
<select ng-model="selectedSpell" ng-change="addSpell()" ng-options="spell.Name for spell in spells | filter:{ Class: selectedClass.Class} | filter: levelFilter">
  <option value="">--Select A Spell--</option>
  </select>
<div id="spellDescript" ng-if="selectedSpell != null">
  <table id="spellDescript">
    <tr ng-repeat="spell in spellList">
      <td><button ng-click='remove($index)' style="float:right;"><i class="fa fa-close"></i></button><strong>{{spell.name}}: </strong>{{spell.description}}</td>
    </tr>
  </table>

</div>



 </td></tr>
</table>
</td></tr>


</table>
<table style="float:right;">
<tr><td>
<table id="inspiration">
<tr><td><input type="text" name="intelligencesub" id="absub"></td><td>INPIRATION</td></tr>
</table>
</td></tr>

<tr><td>
<table id="inspiration">
<tr><td><input type="text" name="intelligencesub" id="absub"></td><td>PROFICIENCY BONUS</td></tr>
</table>
</td></tr>

<tr><td>
<table id="savingthrows">
 <tr><td><input id="check" type="checkbox"></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Performance (Cha)</td></tr>
 <tr><td><input id="check" type="checkbox"></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Persuasion (Cha)</td></tr>
 <tr><td><input id="check" type="checkbox"></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Religion (Int)</td></tr>
 <tr><td><input id="check" type="checkbox"></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Sleight of Hand (Dex)</td></tr>
 <tr><td><input id="check" type="checkbox"></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Stealth (Dex)</td></tr>
 <tr><td><input id="check" type="checkbox"></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Survival (Wis)</td></tr>
 <tr><th colspan="3">SAVING THROWS</th></tr>
 </table>
 </td></tr>

<tr><td>

<table id="savingthrows">
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Acrobatics (Dex)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Animal Handeling (Wis)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Arcana (Int)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Athletics (Str)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Deception (Cha)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>History (Int)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Insight (Wis)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Intimidation (Cha)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Investigation (Int)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Medicine (Wis)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Nature (Int)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Perception (Wis)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Performance (Cha)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Persuasion (Cha)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Religion (Int)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Sleight of Hand (Dex)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Stealth (Dex)</td></tr>
<tr><td><input id="check" type="checkbox" name="field" value="option"></input></td><td><input type="text" name="intelligencesub" id="absub"></td><td>Survival (Wis)</td></tr>
<tr><th colspan="3">SKILLS</th></tr>
 </table>
 </td></tr>
</table>



<table id="abilities" my-draggable>
  <tr><td>
    <div ng-controller="tempController">
      <div my-customer></div>
    </div>
  </td></tr>

  <tr><td>
  <table id="innerability">
  <tr><th>
  DEXTERITY
  </th>
  </tr>
  <tr><td><input type="text" name="dexterity" id="abtop"></td></tr>
  <tr><td><span class="oval"><input type="text" name="dexteritysub" id="absub"></span></td></tr>
  </table>
  </td></tr>

  <tr><td>
  <table id="innerability">
  <tr><th>
  CONSTITUTION
  </th>
  </tr>
  <tr><td><input type="text" name="constitution" id="abtop"></td></tr>
  <tr><td><span class="oval"><input type="text" name="constitutionsub" id="absub"></span></td></tr>
  </table>
  </td></tr>

  <tr><td>
  <table id="innerability">
  <tr><th>
  INTELLIGENCE
  </th>
  </tr>
  <tr><td><input type="text" name="intelligence" id="abtop"></td></tr>
  <tr><td><span class="oval"><input type="text" name="intelligencesub" id="absub"></span></td></tr>
  </table>
  </td></tr>

  <tr><td>
  <table id="innerability">
  <tr><th>
  WISDOM
  </th>
  </tr>
  <tr><td><input type="text" name="widsom" id="abtop"></td></tr>
  <tr><td><span class="oval"><input type="text" name="wisdomsub" id="absub"></span></td></tr>
  </table>
  </td></tr>

  <tr><td>
  <table id="innerability">
  <tr><th>
  CHARISMA
  </th>
  </tr>
  <tr><td><input type="text" name="charisma" id="abtop"></td></tr>
  <tr><td><span class="oval"><input type="text" name="charismasub" id="absub"></span></td></tr>
  </table>
  </td></tr>
</table>



<table id="innerability">
 <tr><td>5</td></td>
   <tr><td>4</td></td>
</table>




</div>
</div>

</div>
</div>
<?php include('footer.html'); ?>
