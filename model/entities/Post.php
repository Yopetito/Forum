<?php

namespace Model\Entities;

use App\Entity;

final class Post extends Entity {
    
    private $id;
    private $message;
    private $creationDate;
    private $topic;
    private $user;

    public function __construct($data) {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }
/**
 * @return self
 *
*/ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

 /**
 * @return self
 *
*/ 

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getCreationDate()
    {
        $date = new \DateTime($this->creationDate);
        return $date->format("d/m/y à H:i");
    }

/**
 * @return self
 *
*/ 

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    
    public function getTopic()
    {
        return $this->topic;
    }
    
/**
 * @return self
 *
*/ 
    
    public function setTopic($topic)
    {
        $this->topic = $topic;
        
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }
/**
 * @return self
 *
*/ 


    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    
    
    public function __toString() {
        return $this->message;
    }
}