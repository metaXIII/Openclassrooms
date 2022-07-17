<?php
    $age = 30;

    //On peut insérer du code pour des conditions
    if ($age >= 18)
        echo "Vous êtes majeur";
    else
        echo "Vous êtes mineur";
    echo "<br>";
    //On peut chainer les conditions
    $condition = true;
    if ($condition && $age > 18)
        echo "la condition est vraie et age = $age";
    $condition = false;
    echo "<br>";
    if ($condition || $age > 18)
        echo "la condition est vraie ou \$age > $age";

    //Condition avec un switch
    switch ($age) {
        case 18:
            echo "Vous avez 18 ans";
            break;
        default:
            break;
    }
