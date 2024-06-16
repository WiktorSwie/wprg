<?php

$Od = 100; 
$Do = 125; 

for ($i = $Od; $i <= $Do; $i++) {
    $Pierwsza = true;
    if ($i < 2) {
        $Pierwsza = false;
    } else {
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j == 0) {
                $Pierwsza = false;
                break;
            }
        }
    }
    if ($Pierwsza) {
        echo $i . "\n";
    }
}
?>
