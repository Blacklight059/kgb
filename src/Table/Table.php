<?php
namespace App\Table;

use App\Config;
use App\Models\Post;
use App\Table\Exception\NotFoundException;
use \PDO;

abstract class Table {

    protected $pdo;
    protected $class = null;
    protected $table = null;

    public function __construct(PDO $pdo)
    {
        if ($this->table === null) {
            throw new \Exception("La class ". get_class($this) . " n'a pas de propriété \$table");
        }
        if ($this->class === null) {
            throw new \Exception("La class ". get_class($this) . " n'a pas de propriété \$class");
        }
        $this->pdo = $pdo;
    }

    public function find (int $id) 
    {

        $pdo = Config::getPDO();
        $query = $pdo->prepare("SELECT * FROM missions WHERE id = :id");
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $result = $query->fetch() ?: null;

        
        if ($result === false) {
            throw new NotFoundException($this->table, $id);
        }
        return $result;
    }

}

?>