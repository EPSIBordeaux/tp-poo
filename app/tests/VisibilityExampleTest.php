<?php

namespace Example\Tests;

use Example\VisibilityExample;

use PHPUnit\Framework\TestCase;

class VisibilityExampleTest extends TestCase {

	protected $instance;

    public function setUp() {
        $this->instance = new VisibilityExample("privé", "protégé", "publique");
    }
	
	/**
	 * @expectedException Error
	 * @expectedExceptionMessage Cannot access private property Example\VisibilityExample::$private_attribute
	 */
	public function testPrivateAttributeAccessibilty() {
		// Le code de ce test génère une erreur php avec le message :
		// "Cannot access private property Example\VisibilityExample::$private_attribute"
		// Car nous essayons d'accéder à un attribut privé depuis l'exterieur de la classe
		$privateAttribute = $this->instance->private_attribute;
	}

	/**
	 * @expectedException Error
	 * @expectedExceptionMessage Call to private method Example\VisibilityExample::privateMethod() from context 'Example\Tests\VisibilityExampleTest'
	 */
	public function testPrivateMethodAccessibilty() {
		// Le code de ce test génère une erreur php avec le message :
		// "Call to private method Example\VisibilityExample::privateMethod() from context 'Example\Tests\VisibilityExampleTest'"
		// Car nous essayons d'accéder à un méthode privé depuis l'exterieur de la classe
		$private = $this->instance->privateMethod();
	}

	/**
	 * @expectedException Error
	 * @expectedExceptionMessage Cannot access protected property Example\VisibilityExample::$protected_attribute
	 */
	public function testProtectedAttributeAccessibilty() {
		// Le code de ce test génère une erreur php avec le message :
		// "Cannot access protected property Example\VisibilityExample::$protected_attribute" 
		// Car un attribut privé ne peut pas être appelé depuis l'exterireur de la classe
		$protectedAttribute = $this->instance->protected_attribute;
	}

	/**
	 * @expectedException Error
	 * @expectedExceptionMessage Call to protected method Example\VisibilityExample::protectedMethod() from context 'Example\Tests\VisibilityExampleTest'
	 */
	public function testProtectedMethodAccessibilty() {
		// Le code de ce test génère une erreur php avec le message :
		// "Call to protected method Example\VisibilityExample::protectedMethod() from context 'Example\Tests\VisibilityExampleTest'"
		// Car nous essayons d'accéder à un méthode protégée depuis l'exterieur de la classe
		$protected = $this->instance->protectedMethod();
	}

	public function testPublicAttributeAccessibilty() {
		// Le code de ce test ne génère aucune erreur, car nous tentons
		// d'acceder a un attribut publique, donc accéssible depuis
		// l'exterieur de la classe
		$protectedAttribute = $this->instance->public_attribute;
		$this->assertEquals($protectedAttribute, 'publique');
	}

	public function testPublicMethodAccessibilty() {
		// Le code de ce test ne génère aucune erreur, car nous tentons
		// d'acceder a une méthode publique, donc accéssible depuis
		// l'exterieur de la classe
		$public = $this->instance->publicMethod();
		$this->assertEquals($public, "I'm a public method");
	}
}