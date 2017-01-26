<a href="<?= PATH ?>/index.php/product/add" class="btn btn-success">Ajouter un produit</a>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td>
                <a href="<?= PATH . '/index.php/product/detail/' . $product->getId() ?>">
                    <?= $product->getName() ?>
                </a>
            </td>            
            <td>
                <a href="<?= PATH . '/index.php/product/remove/'. $product->getId() ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </a>
                <a href="<?= PATH . '/index.php/product/add/' . $product->getId() ?>" class="btn btn-info">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>            
        </tr>
    <?php endforeach; ?>
</table>