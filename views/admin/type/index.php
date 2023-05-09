<?php

use App\Config;

use App\Auth;
use App\Table\TypeTable;

 // Auth::check();

$title = 'Gestion des nationalités';
$pdo = Config::getPDO();


$link = $router->url('admin_types');
$items = (new TypeTable($pdo))->all();
?>

<?php if (isset($_GET['delete'])): ?>
    <div class="alert alert-success">
        L'enregistrement a bien été supprimer
    </div>
<?php endif ?>

<table class="table">
    <thead>
        <th>#</th>
        <th>Nom</th>

        <th><a href="<?= $router->url('admin_type_new') ?>" class="btn btn-primary">Nouveau</a></th>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
        <tr>
            <td>
                #<?= $item->getId() ?>
            </td>
            <td>
                <a href="<?= $router->url('admin_type', ['id' => $item->getId()]) ?>">
                    <?= htmlentities($item->getName()); ?>
                </a>
            </td>

            <td>
                <a href="<?= $router->url('admin_type', ['id' => $item->getId()]) ?>" class="btn btn-primary">
                    Editer
                </a>
                <form action="<?= $router->url('admin_type_delete', ['id' => $item->getId()]) ?>" method="POST"
                onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')" style="display:inline">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>

    </tbody>
</table>
