

<?php
require '../vendor/autoload.php';
$router = new AltoRouter(); 

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

if (isset($_GET['page']) && $_GET['page'] === '1') {
    //réécrire l'url
    $uri = explode("?", $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if (!empty($query)) {
        $uri = $uri. '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $uri);
    exit();
}

$router = new App\Router(dirname(__DIR__) . '/views');
$router
    ->get('/', 'post/index', 'home')
    ->get('/mission/[*:slug]-[i:id]', 'post/mission', 'mission')
    // ADMIN

    // Gestion des articles
    ->get('/admin', 'admin/post/index', 'admin_posts')
    ->match('/admin/post/[i:id]', 'admin/post/edit', 'admin_post')
    ->post('/admin/post/[i:id]/delete', 'admin/post/delete', 'admin_post_delete')
    ->match('/admin/post/new', 'admin/post/new', 'admin_post_new')
    
    // Gestion des contacts
    ->get('/admin/contacts', 'admin/contact/index', 'admin_contacts')
    ->match('/admin/contact/[i:id]', 'admin/contact/edit', 'admin_contact')
    ->post('/admin/contact/[i:id]/delete', 'admin/contact/delete', 'admin_contact_delete')
    ->match('/admin/contact/new', 'admin/contact/new', 'admin_contact_new')
    
    // Gestion des nationalités
    ->get('/admin/nationalites', 'admin/nationalite/index', 'admin_nationalites')
    ->match('/admin/nationalite/[i:id]', 'admin/nationalite/edit', 'admin_nationalite')
    ->post('/admin/nationalite/[i:id]/delete', 'admin/nationalite/delete', 'admin_nationalite_delete')
    ->match('/admin/nationalite/new', 'admin/nationalite/new', 'admin_nationalite_new')
    
    // Gestion des types
    ->get('/admin/types', 'admin/type/index', 'admin_types')
    ->match('/admin/type/[i:id]', 'admin/type/edit', 'admin_type')
    ->post('/admin/type/[i:id]/delete', 'admin/type/delete', 'admin_type_delete')
    ->match('/admin/type/new', 'admin/type/new', 'admin_type_new')

    ->run();
?>
