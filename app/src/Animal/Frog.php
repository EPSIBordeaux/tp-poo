<?php
namespace Animal;

use Animal\Interfaces\IAlive;
use Animal\Interfaces\IHerbivorous;
use Animal\Interfaces\ICarnivorous;

use Animal\Plant;

class Frog implements IAlive, IHerbivorous {
  
  public $isAlive;

  public function __construct(){
    $this->isAlive=true;
  }

  public function toBeKilled($killer){
    $this->isAlive=false;
    echo "Frog is dead!";
    $killer->toBeKilled($this);
  }
  public function eat(Plant $vegetable){
    if($this->isAlive){
      echo "Nomnomnom!";
      $vegetable->toBeKilled($this);
    }
  }
}