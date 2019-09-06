<?php
function twos($a , $b , $c , $d , $e , $f ){
  $dice = array($a , $b , $c , $d , $e , $f );
  $total = 0;
  $arrlength = count($dice);
  for($x = 0; $x < $arrlength; $x++){
    if ($dice[$x] == 2){
     $total++;
    }
  }
  return $total;
 }
}
?>