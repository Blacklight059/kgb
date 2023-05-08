

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
    ->run();
?>
