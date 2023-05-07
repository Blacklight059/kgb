<?php
use App\Config;
use App\HTML\Form;
use App\Table\PostTable;
use App\ObjectHelper;

$pdo = Config::getPDO();
$postTable = new PostTable($pdo);
$post = $postTable->find($params['id']);
$success = false;
$errors = [];

if (!empty($_POST)) {
    ObjectHelper::hydrate($post, $_POST, ['nom_de_code', 'content', 'slug']);

    if (empty($errors)) {
        $postTable->update($post);
        $success = true;
    }
}

$form = new Form($post, $errors);

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