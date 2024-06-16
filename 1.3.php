<?php
$N = 10;

$fibonacci = array();

$fibonacci[0] = 0;
$fibonacci[1] = 1;

for ($i = 2; $i <= $N; $i++) {
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
}

echo "Nieparzyste elementy ciągu Fibonacciego:";
echo "\n";
for ($i = 0; $i <= $N; $i++) {
    if ($fibonacci[$i] % 2 != 0) {
        echo $fibonacci[$i];
		echo "\n";
    }
}
?>