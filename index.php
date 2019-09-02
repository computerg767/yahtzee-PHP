<?php
session_start();
$_SESSION['dice_one'] = isset($_SESSION['dice_one'])?$_SESSION['dice_one']:0;
$_SESSION['dice_two'] = isset($_SESSION['dice_two'])?$_SESSION['dice_two']:0;
$_SESSION['dice_three'] = isset($_SESSION['dice_three'])?$_SESSION['dice_three']:0;
$_SESSION['dice_four'] = isset($_SESSION['dice_four'])?$_SESSION['dice_four']:0;
$_SESSION['dice_five'] = isset($_SESSION['dice_five'])?$_SESSION['dice_five']:0;
$_SESSION['dice_six'] = isset($_SESSION['dice_six'])?$_SESSION['dice_six']:0;

//Initializing variables
$Dice1 = 0;
$Dice2 = 0;
$Dice3 = 0;
$Dice4 = 0;
$Dice5 = 0;
$Dice6 = 0;
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
 //Get roll from form
 //$roll = isset($_POST['roll'])?$_POST['roll']:false;

 if(isset($_POST['roll'])){
     //Dice 1
     if(IsChecked('Dice','1')){
        $Dice1 = $_SESSION['dice_one'];
     } else {
        $Dice1 = rand(1, 6);
        $_SESSION['dice_one'] = $Dice1;
     }
     //Dice 2
     if(IsChecked('Dice','2')){
        $Dice2 = $_SESSION['dice_two'];
     } else {
        $Dice2 = rand(1, 6);
        $_SESSION['dice_two'] = $Dice2;
     }
     //Dice 3
     if(IsChecked('Dice','3')){
        $Dice3 = $_SESSION['dice_three'];
     } else {
        $Dice3 = rand(1, 6);
        $_SESSION['dice_three'] = $Dice3;
     }
     //Dice 4
     if(IsChecked('Dice','4')){
        $Dice4 = $_SESSION['dice_four'];
     } else {
        $Dice4 = rand(1, 6);
        $_SESSION['dice_four'] = $Dice4;
     }
     //Dice 5
     if(IsChecked('Dice','5')){
        $Dice5 = $_SESSION['dice_five'];
     } else {
        $Dice5 = rand(1, 6);
        $_SESSION['dice_five'] = $Dice5;
     }
     //Dice 6
     if(IsChecked('Dice','6')){
        $Dice6 = $_SESSION['dice_six'];
     } else {
        $Dice6 = rand(1, 6);
        $_SESSION['dice_six'] = $Dice6;
     }
}
?>
 <form method="post" action="<?php print $_SERVER['PHP_SELF']?>">
  <table>
   <tr>
    <th><?=$Dice1?></th>
    <th><?=$Dice2?></th>
    <th><?=$Dice3?></th>
    <th><?=$Dice4?></th>
    <th><?=$Dice5?></th>
    <th><?=$Dice6?></th>
   </tr>
   <tr>
    <th>Hold</th>
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
    <th><input type="checkbox" name="Dice[]" value="6" <?php if(isset($_POST['Dice'][5])) {
        if($_POST['Dice'][5]=="6"){ echo "checked='checked'";}} ?> /></th>
   </tr>
   <tr>
    <td>
     <input type="submit" name="roll" value="Roll">
    </td>
   </tr>
  </table>

 </form>
</body>

</html>