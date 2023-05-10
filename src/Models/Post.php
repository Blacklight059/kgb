<?php
namespace App\Models;

use App\Helpers\Text;
use DateTime;

class Post {

    private $id;
    private $slug;
    private $title;
    private $content;
    private $date_debut;
    private $nom_de_code;
    private $type_mission_id;
    private $specialite_id;

   public function getTitle(): ?string
   {
      return $this->title;
   }
   public function setTitle(string $title): self
   {
      $this->title = $title;
      return $this;   
   }

   public function getFormattedContent(): ?string
   {
      return nl2br(htmlentities($this->content));
   }

     public function getExcerpt(): ?string
     {
        if ($this->content === null) {
            return null;
        }
        return nl2br(htmlentities(Text::excerpt($this->content, 60)));
     }
     public function getDateBegin(): DateTime
     {
        return new DateTime($this->date_debut);
     }
     public function getSlug (): ?string
     {
        return $this->slug;
     }
     public function setSlug (string $slug): self
     {
        $this->slug = $slug;
        return $this;
     }
     public function getNomdecode (): ?string
     {
        return $this->nom_de_code;
     }
     public function setNomdecode (string $nom_de_code): self
     {
        $this->nom_de_code = $nom_de_code;
        return $this;
     }
     public function getContent (): ?string
     {
        return $this->content;
        
     }
     public function setContent (string $content): self
     {
        $this->content = $content;
        return $this;
     }
     public function getId(): ?int
     {
        return $this->id;
     }

     public function setId(int $id): self
     {
      $this->id = $id;
      return $this;     }

      public function getTypesmission (): ?string {
         return $this->type_mission_id;
     }
 
     public function setTypesmission(string $type_mission_id): self
     {
        $this->type_mission_id = $type_mission_id;
        return $this;   
     }

      public function getSpecialite (): ?string {
         return $this->specialite_id;
      }

      public function setSpecialite(string $specialite_id): self
      {
         $this->specialite_id = $specialite_id;
         return $this;   
      }

    
}