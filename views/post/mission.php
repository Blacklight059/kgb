<?php

use App\Config;
use App\Models\Post;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Config::getPDO();
$query = $pdo->prepare("SELECT * FROM missions WHERE id = :id");
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Post::class);
$post = $query->fetch();


if($post === false) {
    throw new Exception('Aucun article ne correspond à cet ID');
}

if ($post->getSlug() !== $slug) {
    $url = $router->url('mission', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$pdo->prepare("SELECT * FROM agents WHERE id = :id");

?>

<h1><?= htmlentities($post->getTile) ?></h1>
<p class="text-muted"><?=$post->$date_debut()->format('d F Y') ?></p>
<p><?= $post->getFormattedContent?></p>
