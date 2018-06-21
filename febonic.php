
<?php
$x  = array(58,54,765,986,12,43,35,287); 
//echo implode( ", ", $x );
$count =  count($x);

for($i=0;$i<=$count;$i++){    
   if($x[$i]%2 == 0){
  echo $x[$i].'<br>';
   }else{
  echo $x[$i];
   }
} 

 
?>