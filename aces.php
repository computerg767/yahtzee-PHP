<?php 
//testing aces function
function aces($a , $b , $c , $d , $e , $f ){
 $dice = array($a , $b , $c , $d , $e , $f );
 $total = 0;
 $arrlength = count($dice);
 for($x = 0; $x < $arrlength; $x++){
   if ($dice[$x] == 1){
    $total++;
   }
 }
 return $total;
}

echo aces(1, 1, 1, 1, 1, 1);
?>