<a href="<?= PATH ?>/index.php/product/add">Ajouter un produit</a>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getName() ?></td>            
            <td>
                <a href="<?= PATH . '/index.php/product/remove/'. $product->getId() ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </a>
                <a href="" class="btn btn-info">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>            
        </tr>
    <?php endforeach; ?>
</table>