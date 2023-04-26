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
    ->get('/admin', 'post/admin', 'admin')
    ->run();
    
?>
