<?php
use App\Config;
use App\HTML\Form;
use App\Table\PostTable;
use App\ObjectHelper;
use App\Table\TypeTable;

$pdo = Config::getPDO();
$postTable = new PostTable($pdo);
$typeTable = new TypeTable($pdo);
$types = $typeTable->list();
$item = $postTable->find($params['id']);
$success = false;
$errors = [];
dd($item);
if (!empty($_POST)) {
    ObjectHelper::hydrate($item, $_POST, ['nom_de_code', 'content', 'slug', 'types_mission']);
    if (empty($errors)) {
        $postTable->updatePost($item);
        $success = true;
    }
}

$form = new Form($item, $errors);

?>

<?php if ($success): ?>
    <div class="alert alert-success">
        L'article a été modifié
    </div>
<?php endif ?>

<?php if (isset($_GET['created'])): ?>
    <div class="alert alert-success">
        L'article a été créé
    </div>
<?php endif ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être modifié, merci de corriger les erreurs.
    </div>
<?php endif ?>


<h1>Editer la mission <?= $params['id'] ?></h1>

<?php require ('_form.php'); ?>