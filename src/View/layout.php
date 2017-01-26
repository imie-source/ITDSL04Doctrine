<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/style/style.css">

    <title>Doctrine Land</title>
</head>
<body class="container">

<header>
    <h1>Bienvenue dans un monde merveilleux</h1>
</header>
<hr/>
<nav class="btn-group">
    <a href="<?= PATH . '/index.php' ?>" class="btn btn-default">Accueil</a>
    <a href="<?= PATH . '/index.php/product/index' ?>" class="btn btn-default">Liste des produits</a>
    <a href="<?= PATH . '/index.php/user/index' ?>" class="btn btn-default">Liste des utilisateurs</a>
    <a href="<?= PATH . '/index.php/bug/index' ?>" class="btn btn-default">Liste des bugs</a>
</nav>
<aside>
    <?php
        foreach($flashbag->getMessages() as $message){
            echo '<div class="alert alert-' . $message["type"] . '">' . $message["text"] . '</div>';
        }
    ?>
</aside>
<hr/>
<main>
    <div>
        <?php echo $content ?>
    </div>
</main>
<hr/>
<footer>
    Tous droits réservés pour IMIE
</footer>
</body>
</html>