<a href="<?= PATH ?>/index.php/product/add">Ajouter un produit</a>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Nom</th>
    </tr>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getName() ?></td>            
        </tr>
    <?php endforeach; ?>
</table>