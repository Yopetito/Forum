<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Topic extends Entity{

    private $id;
    private $title;
    private $user;
    private $category;
    private $creationDate;
    private $locked;
    private $totalPosts;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    
    public function getTotalPosts(){
        return $this->totalPosts;
    }
    public function setTotalPosts($totalPosts) {
        $this->totalPosts = $totalPosts;
    }
    
    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle(){
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser(){
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function getCategory(){
        return $this->category;
    }

    /**
     * Set the value of Category
     *
     * @return  self
     */ 
    public function setCategory($category){
        $this->category = $category;
        return $this;
    }

    public function getCreationDate(){
        $date = new \DateTime($this->creationDate);
        return $date->format("d/m/y à H:i");
    }

    /**
     * Set the value of creationDate
     *
     * @return  self
     */ 
    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getLocked(){
        return $this->locked;
    }

    /**
     * Set the value of locked
     *
     * @return  self
     */ 
    public function setLocked($locked){
        $this->locked = $locked;
        return $this;
    }


    public function __toString(){
        return $this->title;
    }
}