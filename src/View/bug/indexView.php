<a href="<?= PATH ?>/index.php/bug/add" class="btn btn-success">Ajouter un bug</a>
<h3>Liste des bugs</h3>
<?php if(empty($bugs)): ?>
    <p class="alert alert-info">Aucun bug</p>
<?php else: ?>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Produits</th>
            <th>Déclaré par </th>
            <th>Ingénieur assigné</th>
            <th>Date de création</th>
            <th>Statut</th>
        </tr>
        <?php foreach($bugs as $bug): ?>
            <tr>
                <td>
                    <?= $bug->getId() ?>
                </td>  
                <td>
                    <?= $bug->getDescription() ?>
                </td>    
                <td>
                    <?php 
                        $products = "";
                        foreach($bug->getProducts() as $product){
                            $products .= $product->getName() . ", ";
                        }
                        echo substr($products, 0, strlen($products) - 2);
                    ?>
                </td>
                <td>
                    <a href="<?= PATH . '/index.php/user/detail/' . $bug->getReporter()->getId() ?>">
                        <?= $bug->getReporter()->getName() ?>
                    </a>
                </td>      
                <td>
                    <a href="<?= PATH . '/index.php/user/detail/' . $bug->getEngineer()->getId() ?>">
                        <?= $bug->getEngineer()->getName() ?>
                    </a>
                </td>          
                <td>
                    <?= $bug->getCreated()->format('d/m/Y H:i:s') ?>
                </td>           
                <td>
                    <a href="<?= PATH . '/index.php/bug/change/' . $bug->getId() ?>">
                        <?= $bug->getStatus() ?>
                    </a>
                </td>          
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>