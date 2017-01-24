<?php
// ./src/Entity/Bug.php

namespace Entity;

/**
* @Entity
* @Table(name="bugs")
**/
class Bug{
    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer")
    **/
    private $id;

    /**
    * @Column(type="string")
    **/
    private $description;

    /**
    * @Column(type="datetime")
    **/
    private $created;

    /**
    * @Column(type="string")
    **/
    private $status;

    public function getId(){
        return $this->id;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getCreated(){
        return $this->created;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    public function setCreated($created){
        $this->created = $created;
        return $this;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
}