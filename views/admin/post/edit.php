<?php
use App\Config;
use App\HTML\Form;
use App\Table\PostTable;

$pdo = Config::getPDO();
$postTable = new PostTable($pdo);
$post = $postTable->find($params['id']);
$success = false;
$errors = [];

if (!empty($_POST)) {
    $post
        ->setNomdecode($_POST['nom_de_code'])
        ->setContent($_POST('content'))
        ->setSlug($_POST('slug'));
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

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être modifié, merci de corriger les erreurs.
    </div>
<?php endif ?>


<h1>Editer la mission <?= $params['id'] ?></h1>

<form action="" method="POST">
    <?= $form->input('nom_de_code', 'Titre') ?>
    <?= $form->input('slug', 'URL') ?>
    <?= $form->input('content', 'Contenu') ?>
    <button class="btn btn-primary">Modifier</button>
</form>