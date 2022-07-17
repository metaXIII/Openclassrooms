<?php
    try {
        $db = new PDO("mysql:host=localhost; dbname=oc_concevez_votre_site_web_avec_php_et_mysql; charset=utf8",
            "root", "root");
    } catch (Exception $exception) {
        die($exception->getMessage());
    }

    //Show all
//    $query = "select * from jeux_video";
//    $resp = $db->query($query);
//    //$resp->fetch n'affichera que le premier résultat, on peut partir sur une boucle while ou fetchAll
//    while ($data = $resp->fetch()) {
//        ?>
    <!--        <p>-->
    <!--            <strong>Jeu</strong> : --><?php //echo $data['nom']; ?><!--<br/>-->
    <!--            Le possesseur de ce jeu est : --><?php //echo $data['possesseur']; ?><!--, et il le vend-->
    <!--            à --><?php //echo $data['prix']; ?><!-- euros !<br/>-->
    <!--            Ce jeu fonctionne sur --><?php //echo $data['console']; ?><!-- et on peut y jouer-->
    <!--            à --><?php //echo $data['nbre_joueurs_max']; ?><!-- au maximum<br/>-->
    <!--            --><?php //echo $data['possesseur']; ?><!-- a laissé ces commentaires sur --><?php //echo $data['nom']; ?><!-- :-->
    <!--            <em>--><?php //echo $data['commentaires']; ?><!--</em>-->
    <!--        </p>-->
    <!--        <hr>-->
    <!--        --><?php
//    }

    $query = "select * from jeux_video where possesseur = :possesseur and prix <= :prix";
    $data = $db->prepare($query);
    $data->execute(["possesseur" => "Michel", "prix" => 20]);

    $resp = $data->fetchAll();
    foreach ($resp as $game) {
        ?>
        <p>
            <strong>Jeu</strong> : --><?php echo $game['nom']; ?><br/>
            Le possesseur de ce jeu est : <?php echo $game['possesseur']; ?>, et il le vend
            à <?php echo $game['prix']; ?> euros !<br/>
            Ce jeu fonctionne sur <?php echo $game['console']; ?> et on peut y jouer
            à <?php echo $game['nbre_joueurs_max']; ?> au maximum<br/>
            <?php echo $game['possesseur']; ?> a laissé ces commentaires sur <?php echo $game['nom']; ?> :
            <em><?php echo $game['commentaires']; ?></em>
        </p>
        <?php
    }

    $data->closeCursor();

