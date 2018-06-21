    <?php
    for($i=0;$i<=5;$i++){
     
        for ($d=4-$i; $d > 0; $d--)  {
     
            echo "&nbsp;&nbsp;";
        }
        for($j=1;$j<=$i;$j++){
     
            echo "&nbsp;".'*'."&nbsp;";
        }
     
        echo "<br>";
     
    }
    ?>