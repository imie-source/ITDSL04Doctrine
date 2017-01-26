<a href="<?= PATH ?>/index.php/user/index" class="btn btn-default">Retour à la liste</a>
<h3><?= $user->getId() ? "Modification" : "Ajout" ?> d'un utilisateur :</h3>
<form method="POST">
    <input type="hidden" name="id" value="<?= $user->getId()?>" />
    <label>
        Nom :
        <input type="text" name="name" value="<?= $user->getName() ?>"/>
    </label>
    <input type="submit" />
</form>
