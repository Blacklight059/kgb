<?php
use App\Config;
use App\HTML\Form;
use App\Models\Nationalite;
use App\Table\NationaliteTable;
use App\ObjectHelper;

$errors = [];
$item = new Nationalite();
if (!empty($_POST)) {
    $pdo = Config::getPDO();
    $table = new NationaliteTable($pdo);
    ObjectHelper::hydrate($item, $_POST, ['name']);

    if (empty($errors)) {

        $table->create($_POST);
        header('Location: ' . $router->url('admin_nationalites'));
        exit();
    }
}

$form = new Form($item, $errors);

?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        La nationalité n'a pas pu être enregistré, merci de corriger les erreurs.
    </div>
<?php endif ?>


<h1>Créer la nationalité</h1>
<?php require ('_form.php'); ?>