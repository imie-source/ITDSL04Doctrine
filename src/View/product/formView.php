<a href="<?= PATH ?>/index.php/product/index" class="btn btn-default">Retour à la liste</a>
<h3><?= $product->getId() ? "Modification" : "Ajout" ?> d'un produit</h3>
<form method="POST">
    <?php if(!empty($msg)): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <?php endif; ?>
    <input type="hidden" name="id" value="<?= $product->getId()?>" />
    <label>
        Nom :
        <input type="text" name="name" value="<?= $product->getName() ?>"/>
    </label>
    <input type="submit" />
</form>
