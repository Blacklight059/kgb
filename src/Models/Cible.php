<?php
namespace App\Models;

use DateTime;

class Cible {

    private $id;
    private $nom;
    private $prenom;
    private $nom_de_code;
    private $date_naissance;

    public function getId (): ?int {
        return $id = $this->id;
    }

    public function getNom (): ?string {
        return $nom = $this->nom;
    }

    public function getPrenom (): ?string {
        return $prenom = $this->prenom;
    }

    public function getNom_de_code (): ?string {
        return $nom_de_code = $this->nom_de_code;
    }

    public function getDate_naissance (): DateTime {
        return new DateTime($this->date_naissance);
    }


}