<?php
    session_start();
    $cookie = $_COOKIE["prenom"];
    $prenom = htmlspecialchars($_POST["prenom"]);
    if (isset($_GET["delete"])) {
        setcookie("prenom", $prenom, time()); //fin de vie du cookie maintenant
        $cookie = null;
    } else
        if (isset($prenom) && $prenom !== "") {
            setcookie("prenom", $prenom, time() + 20); //durée de vie de 20 secondes
            $cookie = $prenom;
        }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

    if (isset($cookie) && $cookie !== "")
        echo "Bonjour " . $cookie;
?>

<form action="index.php" method="post">
    <label for="prenom">Votre nom :</label>
    <input type="text" id="prenom" alt="Votre prenom" name="prenom">
    <button type="submit">Votre nom sera enregistré dans un cookie</button>
</form>

<button type="button" onclick="location.href='?delete'">Supprimer les cookies</button>
<button type="button" onclick="location.href='index.php'">redirect</button>


</body>
</html>
