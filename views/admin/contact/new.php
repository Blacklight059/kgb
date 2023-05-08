<?php
use App\Config;
use App\HTML\Form;
use App\Models\Contact;
use App\Models\Post;
use App\Table\ContactTable;
use App\ObjectHelper;

$errors = [];
$item = new Contact();

if (!empty($_POST)) {
    $pdo = Config::getPDO();
    $table = new ContactTable($pdo);
    ObjectHelper::hydrate($item, $_POST, ['name', 'firstname', 'nom_de_code']);

    if (empty($errors)) {
        $table->create($item);
        header('Location: ' . $router->$url('admin_contacts' . '?created=1'));
        exit();
    }
}

$form = new Form($item, $errors);

?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        Le contact n'a pas pu être enregistré, merci de corriger les erreurs.
    </div>
<?php endif ?>


<h1>Créer le contact</h1>
<?php require ('_form.php'); ?>