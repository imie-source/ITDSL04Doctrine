<h2>Ajout d'un produit :</h2>
<a href="<?= PATH ?>/index.php/product/index">Retour à la liste</a>
<form method="POST">
    <?php if(!empty($msg)): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <?php endif; ?>
    <label>
        Nom :
        <input type="text" name="name" />
    </label>
    <input type="submit" />
</form>
