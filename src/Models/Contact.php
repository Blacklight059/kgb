<?php
namespace App\Models;

class Contact {

    private $id;
    private $name;
    private $firstname;
    private $nom_de_code;

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
 
    public function getFirstname (): ?string {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
       $this->firstname = $firstname;
       return $this;   
    }

    public function getNomdecode (): ?string {
        return $this->nom_de_code;
    }
    
    public function setNomdecode(string $nom_de_code): self
    {
       $this->nom_de_code = $nom_de_code;
       return $this;   
    }


    
    

}