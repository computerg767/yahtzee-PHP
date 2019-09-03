<?php
session_start();
//dice Values
$diceNames = ['one', 'two', 'three', 'four', 'five'];
//For loop to redice lines of code
$size_diceNames = sizeof($diceNames);
for($i = 0; $i < $size_diceNames;$i++) {
   $_SESSION['dice_' . $diceNames[$i]] = isset($_SESSION['dice_' . $diceNames[$i]])?$_SESSION['dice_' . $diceNames[$i]]:0;
}
//NUmber of rolls
$_SESSION['rollNum'] = ((isset($_SESSION['rollNum'])) ? $_SESSION['rollNum'] : 0);

$disable = "";
// Funtions
// Finding out checkedboxes to hold number
function IsChecked($chkname,$value) {
    if(!empty($_POST[$chkname])){
        foreach($_POST[$chkname] as $chkval) {
            if($chkval == $value){
                return true;
            }
        }
    }
    return false;
}
?>
<!DOCTYPE html>
<html>

<head>
 <title>Yatzee Starting</title>
 <style>
 th,
 td {
  padding: 15px;
 }
 </style>
</head>

<body>

 <h1>Alpha 1.2</h1>

 <?php

$diceNames = ['zero', 'one', 'two', 'three', 'four', 'five'];
$diceNumbers = [];

if(isset($_POST['roll'])){
   $_SESSION['rollNum']++;
   // gets the size of the dies
   $size_diceNames = sizeof($diceNames);
   // goes through all the dies
   for($i = 1; $i < 6 ;$i++) {
      // adds the number to the die array if present
      if(IsChecked('Dice', $i)){
         array_push($diceNumbers, $_SESSION['dice_' . $diceNames[$i]]);
         echo "This dice: " . 'dice_' . $diceNames[$i] . "<br>";
      } else {
         // creates new die number for new roll
         array_push($diceNumbers, rand(1, 6));
      }
   }
}
if(isset($_POST['reset'])){
$_SESSION['rollNum'] = 0;
for($i = 0; $i < 5 ;$i++){
   array_push($diceNumbers, 0);
}
}
?>
 <form method="post" action="<?php print $_SERVER['PHP_SELF']?>">
  <table>
   <tr>
    <?php  
    $arraylength = count($diceNumbers);
    for($i = 0; $i < $arraylength;$i++) {
         echo "<th>" . $diceNumbers[$i] . "</th>"; 
    }
    ?>
   </tr>
   <tr>
    <th>Hold</th>
    <th>Hold</th>
    <th>Hold</th>
    <th>Hold</th>
    <th>Hold</th>
   </tr>
   <tr>
    <th><input type="checkbox" name="Dice[]" value="1" <?php if(isset($_POST['Dice'][0])) {
        if($_POST['Dice'][0]=="1"){ echo "checked='checked'";}} ?>  /></th>
    <th><input type="checkbox" name="Dice[]" value="2" <?php if(isset($_POST['Dice'][1])) {
        if($_POST['Dice'][1]=="2"){ echo "checked='checked'";}} ?> /></th>
    <th><input type="checkbox" name="Dice[]" value="3" <?php if(isset($_POST['Dice'][2])) {
        if($_POST['Dice'][2]=="3"){ echo "checked='checked'";}} ?> /></th>
    <th><input type="checkbox" name="Dice[]" value="4" <?php if(isset($_POST['Dice'][3])) {
        if($_POST['Dice'][3]=="4"){ echo "checked='checked'";}} ?> /></th>
    <th><input type="checkbox" name="Dice[]" value="5" <?php if(isset($_POST['Dice'][4])) {
        if($_POST['Dice'][4]=="5"){ echo "checked='checked'";}} ?>/></th>
   </tr>
   <tr>
    <td>
     <input type="submit" name="roll" value="Roll" <?=$disable?>>
     <input type="submit" name="reset" Value="Reset">
    </td>
   </tr>
  </table>
 </form>
<?php echo ($_SESSION['rollNum']);?>
</body>
</html>