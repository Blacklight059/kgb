<?php
namespace App\Models;

class agent {

    private $id;

    private $name;

    private $firstname;

    private $nom_de_code;

    public function getId(): ?int {
        return $this->id;
    }
    public function getName(): ?string {
        return $this->name;
    }
    public function getFirstname(): ?string {
        return $this->firstname;
    }
    public function getNomdeCode(): ?string {
        return $this->nom_de_code;
    }


}