<?php
// ./src/Entity/Product.php

namespace Imie\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity(repositoryClass="ProductRepository")
* @Table(name="products")
**/
class Product{

    /** 
    * @Id 
    * @Column(type="integer")
    * @GeneratedValue
    **/
    private $id;
    /** 
    * @Column(type="string")
    **/
    private $name;

    /** 
    * @ManyToMany(targetEntity="Bug", mappedBy="products")
    **/    
    private $bugs;

    public function __construct(){
        $this->products = new ArrayCollection();
    }

    public function getBugs(){
        return $this->bugs;
    }

    public function addBug(Bug $bug){
        $this->bugs[] = $bug;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

}