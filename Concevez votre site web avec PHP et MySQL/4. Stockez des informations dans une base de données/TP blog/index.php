<?php
    require_once "function/database.php";

    $db = getDB();

    $query = "select id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr from billets order by date_creation desc";
    $connexion = $db->query($query);
    $result = $connexion->fetchAll(PDO::FETCH_ASSOC);
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
<?php
    foreach ($result as $data) {
        ?>
        <div class="news">
            <h3>
                <?= $data['titre']; ?>
                <em>le <?php echo $data['date_creation_fr']; ?></em>
            </h3>

            <p>
                <?= nl2br($data['contenu']); ?>
                <br/>
                <em><a href="commentaires.php?billet=<?php echo $data['id']; ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
    }
?>
</body>
</html>
