<?php
//Les variables
//On déclare une variable avec le $ devant

$age = 30;

//On peut ensuite l'afficher avec l'instruction echo
echo "Tu as " . $age . " ans";

//Les variables sont dynamiques
/**
 * On peut ensuite faire des opérations sur les variables
 */

$start = "Tu auras";
$end = " ans dans un an";
$phrase = $start . $end; //Tu auras ans dans un an
$age = $age + 1; //ou $age += 1
$phrase = $start . $age . $end;

