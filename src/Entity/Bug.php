<?php
// ./src/Entity/Bug.php

namespace Imie\Entity;

use Doctrine\Common\Collections\ArrayCollection;

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

    /**
    * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
    **/
    private $reporter;

    /**
    * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
    **/
    private $engineer;

    /** 
    * @ManyToMany(targetEntity="Product")
    **/
    private $products;

    public function __construct(){
        $this->products = new ArrayCollection();
        $this->created = new \DateTime();
        $this->status = "Ouvert";
    }

    public function addProduct(Product $product){
        $this->products[] = $product;
    }
    public function getProducts(){
        return $this->products;
    }

    public function setReporter(User $user){
        $user->addReportedBug($this);
        $this->reporter = $user;
        return $this;
    }

    public function setEngineer(User $user){
        $user->assignToBug($this);
        $this->engineer = $user;
        return $this;
    }

    public function getReporter(){
        return $this->reporter;
    }

    public function getEngineer(){
        return $this->engineer;
    }

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

    public function close(){
        $this->status = "Fermé";
        return $this;
    }

    public function open(){
        $this->status = "Ouvert";
        return $this;
    }
}