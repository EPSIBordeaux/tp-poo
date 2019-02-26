<?php
namespace Animal;

use Animal\Interfaces\IAlive;
use Animal\Interfaces\IHerbivorous;

class Frog implements IAlive, IHerbivorous {
  private $isAlive;

  public function __construct(){
    $this->isAlive=true;
  }

  public function toBeKilled($killer){
    $this->isAlive=false;
    $killer->toBeKilled($this);
  }
  public function eat($vegetable){
    if($this->isAlive){
      echo "nomnomnom!";
    }
  }
}