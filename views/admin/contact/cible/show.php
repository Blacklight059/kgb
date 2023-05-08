<?php
use App\Models\Post;
use App\Config;
use App\Models\Specialite;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Config::getPDO();
$query = $pdo->prepare("SELECT * FROM spécialités WHERE id = :id");
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Specialite::class);
/** @var Post|false */
$spécialite = $query->fetch();

if($spécialite === false) {
    throw new Exception('Aucune spécialite ne correspond à cet ID');
}


if ($cible->getSlug() !== $slug) {
    $url = $router->url('spécialite', ['slug' => $spécialite->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

?>

<h1>Cible : <?= htmlentities($spécialite->getName()) ?></h1>