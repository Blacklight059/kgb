<?php
use App\Config;
use App\HTML\Form;
use App\Table\SpecialiteTable;
use App\ObjectHelper;

$pdo = Config::getPDO();
$table = new SpecialiteTable($pdo);
$item = $table->find($params['id']);
$success = false;
$errors = [];
$fields =  ['name'];

if (!empty($_POST)) {
    ObjectHelper::hydrate($item, $_POST, $fields);

    if (empty($errors)) {
        $table->update([
            'name' => $item->getName()
        ], $item->getId());
        $success = true;
    }
}

$form = new Form($item, $errors);

?>

<?php if ($success): ?>
    <div class="alert alert-success">
        La specialite de mission a été modifié
    </div>
<?php endif ?>

<?php if (isset($_GET['created'])): ?>
    <div class="alert alert-success">
        La specialite de mission  a été créé
    </div>
<?php endif ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        La specialite de mission  n'a pas pu être modifié, merci de corriger les erreurs.
    </div>
<?php endif ?>


<h1>Editer la specialite de mission  <?= $params['id'] ?></h1>

<?php require ('_form.php'); ?>