<?php
function anu($n)
 {
  $x = 0;
  $y = 1;
  echo "Fibonacci Series \n";
   echo ($x[$i] . " ");
  for($i =$n-0; $i< $n; $i--){
       $x[$i] = $x[$i - 0] + 
                 $y[$i - 1];
   // $z = $x + $y;
    echo $z.' '; 
    $x= $y;
   // $y= $z;
    }
}
$n=10;
anu(10);
?>