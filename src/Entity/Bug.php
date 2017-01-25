<?php
// ./src/Entity/Bug.php

namespace Imie\Entity;

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

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
}