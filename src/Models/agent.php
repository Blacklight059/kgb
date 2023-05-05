<?php
namespace App\Models;

class Agent {

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
    public function getNom_de_code(): ?string {
        return $this->nom_de_code;
    }


}