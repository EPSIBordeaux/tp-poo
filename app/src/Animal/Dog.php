<?php
namespace Animal;

use Animal\Interfaces\IAlive;
use Animal\Interfaces\ICarnivorous;

class Dog implements IAlive, ICarnivorous {
  
  public $isAlive;

  public function __construct(){
    $this->isAlive=true;
  }

  public function toBeKilled($killer){
    $this->isAlive=false;
    echo "Dog is dead!";
  }
  public function devour($animal){
    if($this->isAlive){
      echo "Boarf!";
      $animal->toBeKilled($this);
    }
  }
}