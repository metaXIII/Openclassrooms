<?php

    function my_autoloader($class)
    {
        include 'model/' . $class . '.php';
    }

    spl_autoload_register('my_autoloader');

    $db = new Database();
    $db = $db->getPdo();
    $query = "select * from minichat";
    $data = $db->query($query);
    $resp = $data->fetchAll(PDO::FETCH_OBJ);

    $pseudo = isset($_POST["pseudo"]) ? htmlspecialchars($_POST["pseudo"]) : null;
    $message = isset($_POST["message"]) ? htmlspecialchars($_POST["message"]) : null;
    if ($pseudo && $message && $pseudo !== "" && $message !== "") {
        $query = "insert into minichat (pseudo, message) values (:pseudo, :message)";
        $data = $db->prepare($query);
        $insert = $data->execute(["pseudo" => $pseudo, "message" => $message]);
        header("location:index.php");
        die();
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
    <style>
        .border {
            border: 1px solid;
        }

        .ml-2 {
            margin-left: 2%;
        }

        .w-20 {
            width: 20%;
            max-width: 20%;
        }
    </style>
</head>
<body>

<?php
    foreach ($resp as $data) {
?>
<div class="border w-20 ml-2">
    <p>Pseudo : <?= $data->pseudo ?></p>
    <p>Message : <?= $data->message ?></p>
</div>
<?php
    }


?>


<form action="index.php" method="post">
    <label for="pseudo">Votre pseudo : </label>
    <input type="text" name="pseudo" id="pseudo">
    <label for="message">Votre message : </label>
    <br>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>
    <button type="submit">Envoyer</button>
</form>


</body>
</html>
