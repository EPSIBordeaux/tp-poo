<?php
namespace Animal;

use Animal\Interfaces\IAlive;

class Plant implements IAlive {
	
	public $isAlive;

	public function __construct(){
	  $this->isAlive=true;
	}
  
	public function toBeKilled($killer){
	  $this->isAlive=false;
	  echo "Plant is dead!";
	}
}