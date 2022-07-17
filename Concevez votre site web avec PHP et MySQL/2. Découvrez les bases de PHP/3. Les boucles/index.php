<?php
    $i = 0;

    while ($i < 10) {
        echo $i;
        $i++;
    }

    do {
        echo $i;
        $i--;
    } while ($i > 0);

    for ($j = 0; $j > $i; $j++) {
        echo $j;
        $i++;
    }
