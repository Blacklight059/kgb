<?php

namespace App\Table;

use App\PaginatedQuery;
use App\Models\Post;

final class PostTable extends Table {

    protected $table = "missions";
    protected $class = Post::class;

    public function createPost (Post $post): void
    {
        $id = $this->create([
            'slug' => $post->getSlug(),
            'contenu' =>$post->getContent()
        ]);
        $post->setId($id);
    }

    public function updatePost (Post $post): void
    {
        $this->update([
            'id' => $post->getId(),
            'slug' => $post->getSlug(),
            'content' =>$post->getContent()

        ], $post->getId());
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