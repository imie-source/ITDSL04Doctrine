<h2><?= $bug->getId() ? "Modification" : "Ajout" ?> d'un bug :</h2>
<a href="<?= PATH ?>/index.php/bug/index">Retour à la liste</a>
<form method="POST">
    <input type="hidden" name="id" value="<?= $bug->getId()?>" />
    <div class="form-group">
        <label>
            Description :
            <textarea name="description" class="form-control"><?= $bug->getDescription() ?></textarea>
        </label>
    </div>
    <div class="form-group">
        <label>
            Déclarant :
            <select name="reporter" class="form-control">
                <?php foreach($users as $user): ?>
                    <option value="<?= $user->getId() ?>"><?= $user->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label>
            Ingénieur affecté :
            <select name="engineer" class="form-control">
                <?php foreach($users as $user): ?>
                    <option value="<?= $user->getId() ?>"><?= $user->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label>
            Produits :
            <select name="products[]" multiple class="form-control">
                <?php foreach($products as $product): ?>
                    <option value="<?= $product->getId() ?>"><?= $product->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
    <input type="submit" class="btn btn-primary"/>
</form>