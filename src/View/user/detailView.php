<h2><?= $user->getName() ?></h2>

<h3>Bugs rapportés</h3>
<?php if($user->getReportedBugs()->isEmpty()): ?>
    <p class="alert alert-info">Aucun bug rapporté.</p>
<?php else: ?>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Produits</th>
            <th>Ingénieur assigné</th>
            <th>Date de création</th>
            <th>Statut</th>
        </tr>
        <?php foreach($user->getReportedBugs() as $bug): ?>
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
                    <?= $bug->getEngineer()->getName() ?>
                </td>          
                <td>
                    <?= $bug->getCreated()->format('d/m/Y H:i:s') ?>
                </td>           
                <td>
                    <?= $bug->getStatus() ?>
                </td>          
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<h3>Bugs affectés</h3>
<?php if($user->getAssignedBugs()->isEmpty()): ?>
    <p class="alert alert-info">Aucun bug rapporté.</p>
<?php else: ?>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Produits</th>
            <th>Déclaré par </th>
            <th>Date de création</th>
            <th>Statut</th>
        </tr>
        <?php foreach($user->getAssignedBugs() as $bug): ?>
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
                    <?= $bug->getReporter()->getName() ?>
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