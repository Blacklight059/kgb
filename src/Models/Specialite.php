<?php
namespace App\Models;


class Specialite {

    private $id;
    private $slug;
    private $nom;
  
    public function getId(): ?int {
        return $this->id;
    }
    public function getSlug(): ?String {
        return $this->slug;
    }
    public function getName(): ?string {
        return $this->nom;
    }

}