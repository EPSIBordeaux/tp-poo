<?php

namespace Animal\Tests;

use Animal\Pig;
use Animal\Frog;
use Animal\Dog;

use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase {
	
	protected $pig;
	protected $frog;
	protected $dog;

    public function setUp() {
		$this->pig = new Pig();
		$this->frog = new Frog();
		$this->dog = new Dog();
	}
	
	public function testPigIsHomnivorus() {
		$this->assertInstanceOf('Animal\Pig', $this->pig);
		$this->assertInstanceOf('Animal\Interfaces\IHerbivorous', $this->pig);
		$this->assertInstanceOf('Animal\Interfaces\ICarnivorous', $this->pig);
	}

	public function testFrogIsHerbivorus() {
		$this->assertInstanceOf('Animal\Frog', $this->frog);
		$this->assertInstanceOf('Animal\Interfaces\IHerbivorous', $this->frog);
	}

	public function testDogIsCarnivorous() {
		$this->assertInstanceOf('Animal\Dog', $this->dog);
		$this->assertInstanceOf('Animal\Interfaces\ICarnivorous', $this->dog);
	}
}