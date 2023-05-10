<?php
use App\Config;
use App\HTML\Form;
use App\Models\Post;
use App\Table\PostTable;
use App\ObjectHelper;

$errors = [];
$item = new Post();

if (!empty($_POST)) {
    $pdo = Config::getPDO();
    $table = new PostTable($pdo);
    ObjectHelper::hydrate($item, $_POST, ['nom_de_code', 'content', 'slug']);

    if (empty($errors)) {
        $table->create($_POST);
        header('Location: ' . $router->$url('admin_post', ['id' => $item->getId()]) . '?created=1');
        exit();
    }
}

$form = new Form($item, $errors);

?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être enregistré, merci de corriger les erreurs.
    </div>
<?php endif ?>


<h1>Enregistré la mission</h1>
<?php require ('_form.php'); ?>