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

    private $type_mission = [];

     public function getTitle(): ?string{
        return $this->title;
     }

   public function getFormattedContent(): ?string
   {
      return nl2br(htmlentities($this->content));
   }

     public function getExcerpt(): ?string{
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
     public function getNomdecode (): ?string
     {
        return $this->nom_de_code;
     }
     public function getId(): ?int
     {
        return $this->id;
     }


    
}