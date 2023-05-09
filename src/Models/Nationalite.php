<?php
namespace App\Models;

class Nationalite {

    private $id;
    private $name;

    public function getId (): ?int {
        return $this->id;
    }

    public function setId(int $id)
    {
       $this->id = $id;
       return $this;   
    }
 
    public function getName (): ?string {
        return $this->name;
    }

    public function setName(string $name): self
    {
       $this->name = $name;
       return $this;   
    }

}