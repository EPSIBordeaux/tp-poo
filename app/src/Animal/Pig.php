<?php
namespace Animal;

use Animal\Interfaces\IAlive;
use Animal\Interfaces\ICarnivorous;
use Animal\Interfaces\IHerbivorous;

class Pig implements IAlive, ICarnivorous, IHerbivorous {
  
  private $isAlive;

  public function __construct(){
    $this->isAlive=true;
  }

  public function toBeKilled($killer){
    $this->isAlive=false;
  }
  public function devour($animal){
    if($this->isAlive){
      echo "Croinc!";
      $animal->toBeKilled($this);
    }
  }
  public function eat($vegetable){
    if($this->isAlive){
      echo "Slurp!";
    }
  }
}