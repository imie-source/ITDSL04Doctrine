<a href="<?= PATH ?>/index.php/user/add" class="btn btn-success">Ajouter un utilisateur</a>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getName() ?></td>            
            <td>
                <a href="<?= PATH . '/index.php/user/remove/'. $user->getId() ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </a>
                <a href="<?= PATH . '/index.php/user/add/' . $user->getId() ?>" class="btn btn-info">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>            
        </tr>
    <?php endforeach; ?>
</table>