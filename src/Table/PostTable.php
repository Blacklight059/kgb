<?php

namespace App\Table;

use App\PaginatedQuery;
use App\Models\Post;

final class PostTable extends Table {

    protected $table = "missions";
    protected $class = Post::class;

    public function create (Post $post): void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET slug = :slug, contenu = :contenu ");
        $ok = $query->execute([
            'slug' => $post->getSlug(),
            'contenu' =>$post->getContent()
        ]);
        if ($ok === false)
        {
            throw new \Exception("Impossible de créer l'enregistreemnt dans la table {$this->table}");
        }

        $post->setId($this->pdo->lastInsertId());
    }

    public function update (Post $post): void
    {
        $query = $this->pdo->prepare("UPDATE missions SET slug = :slug, content = :content WHERE id = :id");
        $ok = $query->execute([
            'id' => $post->getId(),
            'slug' => $post->getSlug(),
            'content' =>$post->getContent()

        ]);
        if ($ok === false)
        {
            throw new \Exception("Impossible de modifier l'enregistreemnt dans la table {$this->table}");
        }
    }

    public function delete (int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $ok = $query->execute([$id]);
        if ($ok === false)
        {
            throw new \Exception("Impossible de supprimer l'enregistreemnt $id dans la table {$this->table}");
        }
    }


    public function findPaginated()
    {
        $paginatedQuery = new PaginatedQuery (
            "SELECT * FROM missions ORDER BY date_debut DESC",
            "SELECT COUNT(id) FROM missions",
            Post::class
    
        );

       return;

        $posts = $paginatedQuery->getItems(Post::class);
        $postsbyID = [];
        foreach($posts as $post) {
            $postsbyID[$post->getId()] = $post;
        }
        return [$posts, $paginatedQuery];

    }
}