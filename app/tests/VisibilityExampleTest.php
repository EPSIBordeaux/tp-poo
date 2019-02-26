<?php

namespace Example\Tests;

use Example\VisibilityExample;

use PHPUnit\Framework\TestCase;

class VisibilityExampleTest extends TestCase {

	protected $instance;

    public function setUp() {
        $this->instance = new VisibilityExample("privé", "protégé", "publique");
    }
	
	public function testPrivateAttributeAccessibilty() {
		// On s'attends à ce que le code de ce test génère une erreur	
		$this->expectException(\Error::class);

		// Il est impossible d'accéder à private_attribute car cet attribut est privé
		$privateAttribute = $this->instance->private_attribute;
	}

	public function testProtectedAttributeAccessibilty() {
		// On s'attends à ce que le code de ce test génère une erreur	
		$this->expectException(\Error::class);

		// Il est impossible d'accéder à protected_attribute car cet attribut est protégé
		$protectedAttribute = $this->instance->protected_attribute;
	}

	public function testPublicAttributeAccessibilty() {
		// Il est possible d'accéder à public_attribute car cet attribut est publique
		$protectedAttribute = $this->instance->public_attribute;
		$this->assertEquals($protectedAttribute, 'publique');
	}
}