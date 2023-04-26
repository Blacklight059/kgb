<?php
use App\Helpers\Text;
use App\Models\Post;
use App\Config;
use App\URL;


$title = 'Acceuil';
$pdo = Config::getPDO();


$currentPage = URL::getPositiveInt('page', 1);

$count = (int)$pdo->query('SELECT COUNT(id) FROM missions')->fetch(PDO::FETCH_NUM)[0];
$perPage = 4;
$pages = ceil($count / $perPage);
if ($currentPage > $pages) {
    throw new Exception('Cette page n\'existe pas');
}
$offSet = $perPage * ($currentPage - 1);

$query = $pdo->query("SELECT * FROM missions ORDER BY date_debut DESC LIMIT $perPage OFFSET $offSet");
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class);
?>

<div class="row">
    <?php foreach($posts as $post): ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlentities($post->getSlug()) ?></h5>
                    <p class="text-muted"><?=$post->getDateBegin()->format('d F Y') ?> </p>
                    <p><?= $post->getExcerpt() ?></p>
                    <p>
                        <a href="<?= $router->url('mission', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir plus</a>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <div class="d-flex justify-content-between my-4">
    <?php if ($currentPage > 1): ?>
        <?php
        $link = $router->url('home');
        if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1);
        ?>
        <a href="<?= $link ?>?page = $currentPage - 1" class="btn btn-primary">&laquo; Page précédente</a>
    <?php endif ?>
    <?php if ($currentPage < $pages): ?>
        <a href="<?= $router->url('home') ?>?page = $currentPage + 1" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
    <?php endif ?>
</div>
</div>