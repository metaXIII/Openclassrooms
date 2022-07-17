<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "First page in php" ?></title>
</head>
<body>
    <?php
    //Commentaire php, ne sera pas affiché dans le code source de la page
    echo "<p>Nous sommes dans la balise PHP</p>";
    ?>
    <!-- commentaire html, sera affiché dans le code source de la page -->
    <p>Nous sommes en dehors de la balise php</p>
    <h1>Ma page web</h1>
    <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
</body>
</html>