<?php
namespace Animal\Interfaces;

use Animal\Plant;

interface IHerbivorous {
  public function eat(Plant $vegetable);
}