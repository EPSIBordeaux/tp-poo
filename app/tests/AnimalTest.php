<?php

namespace Animal\Tests;

use Animal\Pig;
use Animal\Frog;
use Animal\Dog;
use Animal\Plant;

use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase {
	
	protected $pig;
	protected $frog;
	protected $dog;
	protected $plant;

  	public function setUp() {
		$this->pig = new Pig();
		$this->frog = new Frog();
		$this->dog = new Dog();
		$this->plant = new Plant();
	}

	public function testHerbivorusCanEatVegetables() {
		$this->assertInstanceOf('Animal\Interfaces\IHerbivorous', $this->frog);
		$this->assertNotInstanceOf('Animal\Interfaces\ICarnivorous', $this->frog);
		$this->expectOutputString('Nomnomnom!Plant is dead!');
		$this->frog->eat($this->plant);
		$this->assertFalse($this->plant->isAlive);
	}

	/**
	 * @expectedException Error
	 * @expectedExceptionMessage Argument 1 passed to Animal\Frog::eat() must be an instance of Animal\Plant, instance of Animal\Dog given, called in /var/www/tests/AnimalTest.php on line 41
	 */
	public function testHerbivorusCantEatMeat() {
		$this->assertInstanceOf('Animal\Interfaces\IHerbivorous', $this->frog);
		$this->assertNotInstanceOf('Animal\Interfaces\ICarnivorous', $this->frog);
		$this->frog->eat($this->dog);
		$this->assertNotFalse($this->dog->isAlive);
	}

	public function testPigIsHomnivorus() {
		// Ici, la classe Pig peut être considérée comme Herbivore ET Carnivore
		$this->assertInstanceOf('Animal\Pig', $this->pig);
		$this->assertInstanceOf('Animal\Interfaces\IHerbivorous', $this->pig);
		$this->assertInstanceOf('Animal\Interfaces\ICarnivorous', $this->pig);
	}

	public function testFrogIsHerbivorus() {
		// Ici, la classe Frog peut être considérée comme Herbivore seulement
		$this->assertInstanceOf('Animal\Frog', $this->frog);
		$this->assertInstanceOf('Animal\Interfaces\IHerbivorous', $this->frog);
		$this->assertNotInstanceOf('Animal\Interfaces\ICarnivorous', $this->frog);
	}

	public function testDogIsCarnivorous() {
		// Ici, la classe Frog peut être considérée comme Carnivore seulement
		$this->assertInstanceOf('Animal\Dog', $this->dog);
		$this->assertInstanceOf('Animal\Interfaces\ICarnivorous', $this->dog);
		$this->assertNotInstanceOf('Animal\Interfaces\IHerbivorous', $this->dog);
	}

	public function testDogNomFrog() {
		// Les deux animaux sont bien en vie!
		$this->assertNotFalse($this->dog->isAlive);
		$this->assertNotFalse($this->frog->isAlive);

		// En sachant que la grenouille est vénéneuse si le chien la mange alors il devrait mourrir
		$this->expectOutputString('Boarf!Frog is dead!Dog is dead!');
		$this->dog->devour($this->frog);

		// les deux animaux sont bien morts
		$this->assertFalse($this->dog->isAlive);
		$this->assertFalse($this->frog->isAlive);
	}

	public function testDogNomPig() {
		// Les deux animaux sont bien en vie!
		$this->assertNotFalse($this->dog->isAlive);
		$this->assertNotFalse($this->pig->isAlive);

		// Le chien mange le cochon
		$this->expectOutputString('Boarf!Pig is dead!');
		$this->dog->devour($this->pig);

		// Seul le chien est en vie
		$this->assertNotFalse($this->dog->isAlive);
		$this->assertFalse($this->pig->isAlive);
	}

}