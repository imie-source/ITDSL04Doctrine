<?php
// ./src/Entity/Product.php

namespace Imie\Entity;

/**
* @Entity
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