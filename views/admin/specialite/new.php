<?php
use App\Config;
use App\HTML\Form;
use App\Models\Type;
use App\Table\TypeTable;
use App\ObjectHelper;

session_start();
$pdo = Config::getPDO();// ajout connexion bdd 
//si la session n'est pas créé on redirige vers la page d'acceuil
if(!isset($_SESSION['user'])){
    header('Location: ' . $router->url('home'));
    die();
}

$errors = [];
$item = new Type();
if (!empty($_POST)) {
    $pdo = Config::getPDO();
    $table = new TypeTable($pdo);
    ObjectHelper::hydrate($item, $_POST, ['name']);

    if (empty($errors)) {

        $table->create($_POST);
        header('Location: ' . $router->url('admin_types'));
        exit();
    }
}

$form = new Form($item, $errors);

?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        Le type de mission n'a pas pu être enregistré, merci de corriger les erreurs.
    </div>
<?php endif ?>


<h1>Créer le type de mission</h1>
<?php require ('_form.php'); ?>