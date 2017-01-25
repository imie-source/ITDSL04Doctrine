<h2><?= $bug->getId() ? "Modification" : "Ajout" ?> d'un bug :</h2>
<a href="<?= PATH ?>/index.php/bug/index">Retour à la liste</a>
<form method="POST">
    <input type="hidden" name="id" value="<?= $bug->getId()?>" />
    <label>
        Description :
        <textarea name="description"><?= $bug->getDescription() ?></textarea>
    </label>
    <label>
        Déclarant :
        <select name="reporter">
            <?php foreach($users as $user): ?>
                <option value="<?= $user->getId() ?>"><?= $user->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>
        Ingénieur affecté :
        <select name="engineer">
            <?php foreach($users as $user): ?>
                <option value="<?= $user->getId() ?>"><?= $user->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>
        Produits :
        <select name="products[]" multiple>
            <?php foreach($products as $product): ?>
                <option value="<?= $product->getId() ?>"><?= $product->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <input type="submit" />
</form>