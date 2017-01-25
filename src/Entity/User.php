<?php
// ./src/Entity/User.php

namespace Imie\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity
* @Table(name="users")
**/
class User{

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
    * @OneToMany(targetEntity="Bug", mappedBy="reporter")
    **/
    private $reportedBugs;

    /**
    * @OneToMany(targetEntity="Bug", mappedBy="engineer")
    **/
    private $assignedBugs;

    public function __construct(){
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    public function addReportedBug(Bug $bug){
        $this->reportedBugs[] = $bug;
    }

    public function assignToBug(Bug $bug){
        $this->assignedBug[] = $bug;
    }

    public function getReportedBugs(){
        return $reportedBugs;
    }

    public function getAssignedBugs(){
        return $assignedBugs;
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