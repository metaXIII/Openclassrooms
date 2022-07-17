<?php
    if (isset($_GET["hello"]) && $_GET["hello"] !== "") {
        echo "Vous avez cliqué sur le lien, bienvenue " . $_GET["hello"] . "<br>";
    }

    echo "<a href='?hello=Gael'>Cliquez sur le lien</a>";

    //Attention, il ne faut jamais faire confiance aux données d'un utilsateur
