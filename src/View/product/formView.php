<h2>Ajout d'un produit :</h2>
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