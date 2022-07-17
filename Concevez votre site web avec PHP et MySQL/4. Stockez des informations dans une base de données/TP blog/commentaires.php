<?php
    require_once "function/database.php";

    $billet = isset($_GET["billet"]) ? $_GET["billet"] !== "" ? (int)$_GET["billet"] : null : null;
    if (!$billet || $billet === 0)
        die("Dommage pour vous");
    $query = "select id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr from billets  where id = :id order by date_creation desc";
    $db = getDB();
    $connexion = $db->prepare($query);
    $connexion->execute(["id" => $billet]);
    $resultBillet = $connexion->fetch(PDO::FETCH_OBJ);

    $query = "select id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%imin%ss') AS date_commentaire_fr from commentaires where id_billet = $billet order by date_commentaire desc";
    $connexion = $db->query($query);
    $resultCommentaires = $connexion->fetchAll(PDO::FETCH_OBJ);
    $connexion->closeCursor();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="news">

    <h3>
        <?= $resultBillet->titre ?>
        <em>le <?= $resultBillet->date_creation_fr ?></em>
    </h3>
    <p>
        <?= $resultBillet->contenu ?>
    </p>
</div>
<h2>Commentaires</h2>
<?php
    foreach ($resultCommentaires as $data) {
        ?>
        <p><strong><?= $data->auteur ?></strong>
            le <?= $data->date_commentaire_fr ?></p>
        <p>
            <?= $data->commentaire ?></p>
        <?php
    }
?>
</body>
</html>
