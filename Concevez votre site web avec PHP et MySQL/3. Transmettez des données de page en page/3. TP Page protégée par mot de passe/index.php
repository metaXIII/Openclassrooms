<?php
    $password = htmlspecialchars($_POST["password"]);
    if (isset($password) && $password !== "") {
        $secret = "kangourou";
        if ($password === $secret)
            echo "Vous avez rentré le bon mot de passe";
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
<form action="#" method="post">
    <!-- Le mot de passe est kangourou, et ceci est une très mauvaise pratique-->
    <label for="password">Password :
        <input type="text" name="password" alt="Mot de passe ?"/>
    </label>
    <button type="submit">Envoyer le mot de passe</button>
</form>
</body>
</html>


