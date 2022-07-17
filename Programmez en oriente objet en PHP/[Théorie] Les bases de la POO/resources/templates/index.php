<?php


    use impl\PersonnageServiceImpl;
    use model\Personnage;

    require "includes/head.php";

    if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
        echo "<div class='alert'>" . $_SESSION["error"] . "</div>";
        $_SESSION["error"] = "";
    }


    /* @var $rightToPlay Personnage */
    $rightToPlay = !empty($_SESSION) ?? is_null($_SESSION["perso"]) ?? $_SESSION["perso"];
?>

<h2>Liste des joueurs en cours</h2>
<ul>
    <?php
        $listPerso = PersonnageServiceImpl::getInstance()->findAll();


        /* @var $perso Personnage */
        foreach ($listPerso as $perso) {
            ?>
            <div class="border">
                <p>Nom du personnage : <span><?= $perso->getName() ?></span></p>
                <p>HP : <span><?= $perso->getHp() ?></span></p>
                <div style="text-align: right">
                    <?php
                        if ($rightToPlay) {
                            ?>
                            <button onclick="window.location.href = '<?= WEBROOT ?>index?url=fight&nom=<?= $perso->getName() ?>'"
                                    type="button"
                                    style="position: relative; right: 0"> Attaquer
                            </button>
                            <?php
                        } ?>
                </div>
            </div>
            <?php
        }
    ?>
</ul>

<form action="play" method="post">
    <p>
        <label for="nom">Nom :
            <input type="text" name="nom" maxlength="50"/>
        </label>
        <input type="submit" value="Créer ce personnage" name="creer"/>
        <input type="submit" value="Utiliser ce personnage" name="utiliser"/>
    </p>
</form>

<?php require "includes/footer.php"; ?>
