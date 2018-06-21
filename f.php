<?php
// PHP Program to print Fibonacci
// series in reverse order
 
function reverseFibonacci($n)
{
 
    // assigning first and
    // second elements
    $a[0] = 0;
    $a[1] = 1;
 
    for ($i = 2; $i < $n; $i++)
    {
 
        // storing sum in the
        // preceding location
        $a[$i] = $a[$i - 2] + 
                 $a[$i - 1];
    }
 
    for ($i = $n - 1; $i >= 0; $i--)
    {
 
        // printing array in
        // reverse order
        echo($a[$i] . " ");
    }
}
 
// Driver COde
$n = 10;
reverseFibonacci($n);
 
// This code is contributed by Ajit.
?>