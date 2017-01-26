<h2><?= $product->getName() ?></h2>

<h3>Bugs ouverts</h3>
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
    <?php foreach($product->getBugs() as $bug): ?>
        <?php if($bug->getStatus() === 'Ouvert'): ?>
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
                    <?= $bug->getStatus() ?>
                </td>          
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

<h3>Bugs fermés</h3>
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
    <?php foreach($product->getBugs() as $bug): ?>
        <?php if($bug->getStatus() === 'Fermé'): ?>
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
                    <?= $bug->getStatus() ?>
                </td>          
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>