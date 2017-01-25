<h2><?= $user->getId() ? "Modification" : "Ajout" ?> d'un utilisateur :</h2>
<a href="<?= PATH ?>/index.php/user/index">Retour à la liste</a>
<form method="POST">
    <input type="hidden" name="id" value="<?= $user->getId()?>" />
    <label>
        Nom :
        <input type="text" name="name" value="<?= $user->getName() ?>"/>
    </label>
    <input type="submit" />
</form>
