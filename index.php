<?php
session_start();
//dice Values
$diceNames = ['one', 'two', 'three', 'four', 'five'];
//For loop to redice lines of code
$size_diceNames = sizeof($diceNames);
for ($i = 0; $i < $size_diceNames; ++$i) {
    $_SESSION['dice_'.$diceNames[$i]] = isset($_SESSION['dice_'.$diceNames[$i]]) ? $_SESSION['dice_'.$diceNames[$i]] : 0;
}
//NUmber of rolls
$_SESSION['rollNum'] = ((isset($_SESSION['rollNum'])) ? $_SESSION['rollNum'] : 0);

$disable = '';
// Funtions
// Finding out checkedboxes to hold number
function IsChecked($chkname, $value)
{
    if (!empty($_POST[$chkname])) {
        foreach ($_POST[$chkname] as $chkval) {
            if ($chkval == $value) {
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

 <h1>Alpha 1.3</h1>

 <?php

$diceNames = ['zero', 'one', 'two', 'three', 'four', 'five'];
$diceNumbers = [0, 0, 0, 0, 0, 0];

<<<<<<< HEAD
if (isset($_POST['roll'])) {
    ++$_SESSION['rollNum'];
    // gets the size of the dies
    $size_diceNames = sizeof($diceNames);
    // goes through all the dies
    for ($i = 1; $i < 6; ++$i) {
        // adds the number to the die array if present
        if (IsChecked('Dice', $i)) {
            $diceNumbers[$i] = $_SESSION['dice_'.$diceNames[$i]];
            echo 'This dice: '.'dice_'.$diceNames[$i].'<br>';
        } else {
            // creates new die number for new roll
            $diceNumbers[$i] = rand(1, 6);
            $_SESSION['dice_'.$diceNames[$i]] = $diceNumbers[$i];
        }
    }
=======
if(isset($_POST['roll'])){
   $_SESSION['rollNum']++;
   // gets the size of the dies
   $size_diceNames = sizeof($diceNames);
   // goes through all the dies
   for($i = 1; $i < 6 ;$i++) {
      // adds the number to the die array if present
      if(IsChecked('Dice', $i)){
         $diceNumbers[$i] = $_SESSION['dice_' . $diceNames[$i]];
         //line below for testing purposes
         echo "This dice: " . 'dice_' . $diceNames[$i] . "<br>";
      } else {
         // creates new die number for new roll
         $diceNumbers[$i] = rand(1, 6);
         $_SESSION['dice_' . $diceNames[$i]] = $diceNumbers[$i];
      }
   }
}
if(isset($_POST['reset'])){
$_SESSION['rollNum'] = 0;
for($i = 1; $i < 6 ;$i++){
   $diceNumbers[$i] = 0;
>>>>>>> 9582781a29a23a3c5fd863263e33084bf371419f
}
if (isset($_POST['reset'])) {
    $_SESSION['rollNum'] = 0;
    for ($i = 1; $i < 6; ++$i) {
        $diceNumbers[$i] = 0;
    }
}
?>
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table>
   <tr>
    <?php
    for ($i = 1; $i < 6; ++$i) {
        echo '<th>'.$diceNumbers[$i].'</th>';
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
    <th><input type="checkbox" name="Dice[]" value="1"/></th>
    <th><input type="checkbox" name="Dice[]" value="2"/></th>
    <th><input type="checkbox" name="Dice[]" value="3"/></th>
    <th><input type="checkbox" name="Dice[]" value="4"/></th>
    <th><input type="checkbox" name="Dice[]" value="5"/></th>
   </tr>
   <tr>
    <td>
     <input type="submit" name="roll" value="Roll" <?=$disable; ?>>
     <input type="submit" name="reset" Value="Reset">
    </td>
   </tr>
  </table>
 </form>
<?php echo $_SESSION['rollNum']; ?>
</body>
</html>