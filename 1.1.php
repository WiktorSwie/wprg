<?php

$owoce = array("gruszka", "pietruszka", "pomidor","ananss");


foreach ($owoce as $owoc) {
	echo $owoc;
    echo "\n";
    $dlugosc = strlen($owoc);
    for ($i = $dlugosc - 1; $i >= 0; $i--) {
        echo $owoc[$i];     
    }

    echo "\n";

    if ($owoc[0] == 'p') {
        echo "Zaczyna się na p";
        echo "\n";
    } else {
        echo "Nie zaczyna się na p";
        echo "\n";
    }
}
?>
