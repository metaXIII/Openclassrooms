<?php
    if (isset($_POST["prenom"]) && $_POST["prenom"] !== "") {
        //attention faille xss possible
        echo "Bonjour " . $_POST["prenom"];
        //Pour protégéer la sortie, on peut utiliser la méthode:
        echo "Bonjour " . htmlspecialchars($_POST["prenom"]);

    }
?>

<form action="#" method="post">
    <input type="text" name="prenom" id="prenom">
    <button type="submit">Envoyer</button>
</form>
